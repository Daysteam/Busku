<?php

namespace App\View\Components;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $links;
    public $home_link;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        if(auth()->user()->role === RoleEnum::ADMIN->value){
            $this->home_link = route('dashboard-admin');
            $this->links = [
                ['url' => route('dashboard-admin'), 'label' => 'Dashboard', 'route' => 'admin.*', 'icon' => 'bi-speedometer2'],
                ['url' => route('bus.index'), 'label' => 'Kelola Bus', 'route' => 'bus.*', 'icon' => 'bi-bus-front'],
                ['url' => route('user.index'), 'label' => 'Kelola User', 'route' => 'user.*', 'icon' => 'bi-people'],
                ['url' => route('rute.index'), 'label' => 'Kelola Rute', 'route' => 'rute.*', 'icon' => 'bi-geo-alt'],
                ['url' => route('pemesanan.index'), 'label' => 'Kelola Tiket', 'route' => 'pemesanan.*', 'icon' => 'bi-ticket'],
                ['url' => route('account.edit'), 'label' => 'Akun Saya', 'route' => 'account.*', 'icon' => 'bi-people'],
            ];
        } elseif(auth()->user()->role === RoleEnum::PETUGAS->value){
            $this->links = [
                ['url' => 'dashboard', 'label' => 'dashboard'],
                ['url' => 'scan', 'label' => 'Scan'],
                ['url' => 'jadwal', 'label' => 'Jadwal']
            ];
        } elseif(auth()->user()->role === RoleEnum::CUSTOMER->value) {
            $this->links = [
                ['url' => 'dashboard', 'label' => 'Dashbaord'],
                ['url' => 'Cari bus', 'label' => 'Cari Bus'],
                ['url' => 'Pemesanan', 'label' => 'Pemesanan']
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
