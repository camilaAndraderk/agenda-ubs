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
            "rota"   => "recepcionistas.index"
            // "rota"   => "agenda.pacientes"
        ];
        
        $menuPrincipal[] = [
            "label" => "Agendar Médicos",
            "rota"   => "recepcionistas.index"
            // "rota"   => "agenda.medicos"
        ];

        $menuPrincipal[] = [
            "label" => "Recepcionistas",
            "rota"   => "recepcionistas.index"
            // "rota"   => "recepcionistas.index"
        ];

        $menuPrincipal[] = [
            "label" => "Médicos",
            "rota"   => "recepcionistas.index"
            // "rota"   => "medicos.index"
        ];

        $menuPrincipal[] = [
            "label" => "Pacientes",
            "rota"   => "recepcionistas.index"
            // "rota"   => "pacientes.index"
        ];

        $menuPrincipal[] = [
            "label" => "Unidades Básicas de Saúde",
            "rota"   => "recepcionistas.index"
            // "rota"   => "ubs.index"
        ];

        return view('components.layout', compact('menuPrincipal'));
    }
}
