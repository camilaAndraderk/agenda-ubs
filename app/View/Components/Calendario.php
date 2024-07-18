<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\View;
use Illuminate\View\Component;

class Calendario extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $inicioDoMes   = null,
        public $mesAtual    = null,
        public $anoAtual    = null,
        public $consultas  = null

    )
    {
    //   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calendario');
    }

	
}
