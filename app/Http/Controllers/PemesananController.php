<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PemesananController extends Controller
{
    public function index(Request $request){
        try {
            $pemesanans = Pemesanan::with(['user','rute'])
                ->whereHas('user', function ($query) use ($request) {
                    $query->where('username', 'LIKE', '%' . $request->nama . '%');
                })
                ->when($request->date, function ($query) use ($request) {
                    $query->whereDate('created_at', $request->date);
            })
            ->latest()
            ->paginate(5);
            return view('admin.pemesanan.index', compact('pemesanans'));
        } catch (\Exception $e) {
            return back()->with('error','Gagal mengambil data tiket');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'rute_id' => 'required|exists:rutes,id',
                'jumlah_tiket' => 'required|integer|min:1|max:3',
                'nama_penumpang.*' => 'required',
                'umur.*' => 'required|integer|min:1',
                'jenis_kelamin.*' => 'required|in:pria,wanita',
            ]);

            $kode = 'BK-' . strtoupper(Str::random(8));

            $qrImage = QrCode::format('svg')
                ->size(250)
                ->generate($kode);

            $fileName = 'qr/' . $kode . '.svg';

            Storage::disk('public')->put($fileName, $qrImage);

            $rute = \App\Models\Rute::findOrFail($request->rute_id);
            $total = $request->jumlah_tiket * $rute->harga;

            $status = 'pending';

            if($request->metode_pembayaran === 'ewallet'){
                $status = 'dibayar';
            };

            $pemesanan = Pemesanan::create([
                'user_id' => auth()->id(),
                'rute_id' => $request->rute_id,
                'jumlah_tiket' => $request->jumlah_tiket,
                'kode_pemesanan' => $kode,
                'qr_code' => $kode,
                'total_harga' => $total,
                'status' => $status,
            ]);

            foreach ($request->nama_penumpang as $i => $nama) {
                DetailPemesanan::create([
                    'pemesanan_id' => $pemesanan->id,
                    'nama_penumpang' => $nama,
                    'umur' => $request->umur[$i],
                    'jenis_kelamin' => $request->jenis_kelamin[$i],
                ]);
            }

            return redirect()
                ->route('search-bus.index')
                ->with('success', 'Pemesanan berhasil dibuat!');
        } catch(\Exception $e) {
            return back()->withInput()->with('error','Gagal Menmabahkan pesanan');
        }
    }

    public function confirm(Pemesanan $pemesanan){

        try {
             if ($pemesanan->status === 'dibayar'){
                return back()->with('error','Tiket sudah dibayar');
            }

            $pemesanan->status = 'dibayar';
            $pemesanan->save();

            return back()->with('success','Berhasil mengubah status tiket');
        } catch(\Exception $e) {
            return back()
            ->with('error','Gagal mengubah status tiket');
        }
    }

    public function cancelled(Pemesanan $pemesanan){
        try {
            if($pemesanan->status === 'batal'){
                return back()->with('error','Tiket sudah dibatalkan');
            }
    
            $pemesanan->status = 'batal';
            $pemesanan->save();

            return back()->with('success','Berhasil membatalkan tiket');
        } catch(\Exception $e) {
            return back()
            ->with('error','Gagal membatalkan tiket');
        }
    }

    public function show(Pemesanan $pemesanan){
        $detailPemesanans = DetailPemesanan::where('pemesanan_id', $pemesanan->id)->get();
        return view('admin.pemesanan.show', compact(['pemesanan','detailPemesanans']));
    }

    public function destroy(Pemesanan $pemesanan)
    {
        try {
            $pemesanan->delete();

            $fileName = 'qr/' . $pemesanan->kode_pemesanan . '.svg';

            if (Storage::disk('public')->exists($fileName)) {
                Storage::disk('public')->delete($fileName);
            }

            return redirect()->route('pemesanan.index')->with('success','Berhasil menghapus tiket');
        } catch(\Exception $e) {
            return back()
            ->with('error','Gagal menghapus tiket');
        }
    }

    public function myTicket(){
        $user = auth()->user();

        $pemesanans = Pemesanan::with('rute.bus')->where('user_id', $user->id)->latest()->paginate(5);

        return view('customer.pemesanan.index',compact('pemesanans'));

    }    
}
