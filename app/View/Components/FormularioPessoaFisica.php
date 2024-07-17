<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\View;
use Illuminate\View\Component;

class FormularioPessoaFisica extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $dados = null,
        public $update = null
    )
    {
    //   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {


        return view('components.formulario-pessoa-fisica');
    }
}
