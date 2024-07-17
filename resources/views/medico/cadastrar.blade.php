<x-layout title="Cadastrar Médico">
    <form action="{{ route('medico.store') }}" class="formulario" method="post">
        @csrf 
        
        <x-formulario-pessoa-fisica>
        </x-formulario-pessoa-fisica>

        <hr class="formulario__divisor">

        <x-formulario-endereco>    
        </x-formulario-endereco>

        <hr class="formulario__divisor">
        
        <x-formulario-contato>
        </x-formulario-contato>
                
        <hr class="formulario__divisor">

        <label class="formulario__texto-destaque">Unidades Básicas de Saúde*</label>              
        <div class="formulario__grupo-checkbox">
            @foreach($ubs as $cadaUbs)
                <div class="formulario__linha-checkbox">
                    <input type="checkbox" name="ubs[]" id="ubs_{{ $cadaUbs['id'] }}"
                        value="{{ $cadaUbs['id'] }}"
                    >
                    </input>
                    <label class="formulario__label" for="ubs_{{ $cadaUbs['id'] }}"> {{ $cadaUbs['nome'] }} </label>
                </div>
            @endforeach
        </div>

        <x-formulario-botoes>
        </x-formulario-botoes>
        
    </form>
</x-layout>