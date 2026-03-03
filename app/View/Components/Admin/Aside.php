<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    public $routes;

    public function __construct()
    {
        $this->routes = [
            [
                "label" => "Dashboard",
                "icon" => "fas fa-laptop",
                "route_name" => "dashboard",
                "route_active" => "dashboard",
                "is_dropdown" => false
            ],

            [
                "label" => "Admins",
                "icon" => "fas fa-users-cog",
                "route_name" => "users.index",
                "route_active" => "users.*",
                "is_dropdown" => false
            ],

            [
                "label" => "Data Pasien",
                "icon" => "fas fa-user-injured",
                "route_active" => "data-master.*",
                "is_dropdown" => true,
                "dropdown" => [
                    [
                        "label" => "Pasien",
                        "route_active" => "data-master.pelanggan.*",
                        "route_name" => "data-master.pelanggan.index",
                    ],

                ]
            ],

            [
                "label" => "Rekam Medis",
                "icon" => "fas fa-notes-medical",
                "route_active" => "rekam-medis.*", 
                "is_dropdown" => true,
                "dropdown" => [
                    [
                        "label" => "Diagnosa",
                        "route_active" => "rekam-medis.diagnosa.*",
                        "route_name" => "rekam-medis.diagnosa.index",
                    ],
                    [
                        "label" => "Rekam Medis",
                        "route_active" => "rekam-medis.pemeriksaan.*",
                        "route_name" => "rekam-medis.pemeriksaan.index", 
                    ],
                ]
            ],

        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.aside');
    }
}
