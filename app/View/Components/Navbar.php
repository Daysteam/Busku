<?php

namespace App\View\Components;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $brand;
    public $links;

    public function __construct($brand = 'BusKu')
    {
        $this->brand = $brand;
        $this->links = [
            ['url' => '#', 'label' => 'Home'],
            ['url' => '#features', 'label' => 'Features'],
            ['url' => '#bus', 'label' => 'Bus']
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}