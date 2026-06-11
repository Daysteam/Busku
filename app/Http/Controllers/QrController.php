<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function __invoke(Pemesanan $pemesanan)
    {
        return view('customer.qr.show',compact('pemesanan'));
    }
}
