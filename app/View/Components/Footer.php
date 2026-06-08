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
                ['url' => route('dashboard-admin'), 'label' => 'Dashboard'],
                ['url' => route('bus.index'), 'label' => 'Kelola Bus'],
                ['url' => route('user.index'), 'label' => 'Kelola User'],
                ['url' => route('rute.index'), 'label' => 'Kelola Rute'],
                ['url' => route('pemesanan.index'), 'label' => 'Kelola Tiket'],
                ['url' => route('account.edit'), 'label' => 'Akun Saya'],
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
