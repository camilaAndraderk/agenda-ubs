<x-layout title="Editar Médico">
    <form action="{{ route('medico.update', $medico['id']) }}" class="formulario" method="post">
        @csrf
        @method('PUT')

        <x-formulario-pessoa-fisica :update="true" :dados="$medico">
        </x-formulario-pessoa-fisica>

        <hr class="formulario__divisor">



        
        <hr class="formulario__divisor">

        <x-formulario-endereco :update="true" :dados="$medico">
        </x-formulario-endereco>

        <hr class="formulario__divisor">

        <x-formulario-contato :update="true" :dados="$medico">
        </x-formulario-contato>

        <hr class="formulario__divisor">

        <label class="formulario__texto-destaque">Unidades Básicas de Saúde*</label>              
        <div class="formulario__grupo-checkbox">
            @foreach($ubs as $cadaUbs)
                <div class="formulario__linha-checkbox">
                    <input type="checkbox" name="ubs[]" id="ubs_{{ $cadaUbs['id'] }}"
                        value="{{ $cadaUbs['id'] }}"
                        @if ( in_array($cadaUbs['id'], $ubsJaCadastrados) )
                                checked
                            @endif
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