<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\View;
use Illuminate\View\Component;
use App\Models\Funcionalidade;

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
        $menuPrincipal = Funcionalidade::all(); // buscando todas as funcionalidades


        return view('components.layout', compact('menuPrincipal'));
    }
}
