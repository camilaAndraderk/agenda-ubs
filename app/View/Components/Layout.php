<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
    )
    {
    //   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menuPrincipal[] = [
            "label" => "Agendar Pacientes",
            "url"   => "agenda/pacientes"
        ];
        
        $menuPrincipal[] = [
            "label" => "Agendar Médicos",
            "url"   => "agenda/medicos"
        ];

        $menuPrincipal[] = [
            "label" => "Recepcionistas",
            "url"   => "recepcionistas/index"
        ];

        $menuPrincipal[] = [
            "label" => "Médicos",
            "url"   => "medicos/index"
        ];

        $menuPrincipal[] = [
            "label" => "Pacientes",
            "url"   => "pacientes/index"
        ];

        $menuPrincipal[] = [
            "label" => "Unidades Básicas de Saúde",
            "url"   => "ubs/index"
        ];

        // print_r($menuPrincipal);
        return view('components.layout', compact('menuPrincipal'));
    }
}
