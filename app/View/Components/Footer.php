<?php

namespace App\View\Components;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $links;
    public $brand;
    /**
     * Create a new component instance.
     */
    public function __construct($brand = 'BusKu')
    {
        $this->brand = $brand;

        if(auth()->check()){
            if(auth()->user()->role === RoleEnum::ADMIN->value){
                $this->links = [
                    // ini ganti
                    ['url' => '#dashboard', 'label' => 'Dashbaord'],
                    ['url' => '#kelolaBus', 'label' => 'Kelola Bus'],
                    ['url' => '$kelolaJadwal', 'label' => 'Kelola Jadwal'],
                    ['url' => '#kelolaTiket', 'label' => 'Kelola Tiket'],
                    ['url' => '#kelolaPenumpnag', 'label' => 'Kelola Penumpang'],
                    ['url' => '#tambahPetugas', 'label' => 'Kelola Petugas'],
                    ['url' => '#laporan', 'label' => 'Laporan']
                ];
            } elseif (auth()->user()->role === RoleEnum::PETUGAS->value) {
                $this->links = [
                    ['url' => 'dashboard', 'label' => 'dashboard'],
                    ['url' => 'scan', 'label' => 'Scan'],
                    ['url' => 'jadwal', 'label' => 'Jadwal']
                ];
            } elseif(auth()->user()->role === RoleEnum::CUSTOMER->value){
                $this->links = [
                    ['url' => 'dashboard', 'label' => 'Dashbaord'],
                    ['url' => 'Cari bus', 'label' => 'Cari Bus'],
                    ['url' => 'Pemesanan', 'label' => 'Pemesanan']
                ];
            }
        }else {
            $this->links = [
                ['url' => '#hero', 'label' => 'Home'],
                ['url' => '#features', 'label' => 'Features'],
                ['url' => '#listBus', 'label' => 'Bus']
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
