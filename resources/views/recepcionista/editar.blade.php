<x-layout title="Editar Recepcionista">
    <form action="{{ route('recepcionista.update', $recepcionista['id']) }}" class="formulario" method="post">
        @csrf
        @method('PUT')

        <x-formulario-pessoa-fisica :update="true" :dados="$recepcionista">
        </x-formulario-pessoa-fisica>

        <hr class="formulario__divisor">

        <div class="formulario__linha">
            <div class="formulario__grupo">
                <label for="ubs" class="formulario__label">Unidade Básica de Saúde*</label>
                <select class="formulario__seletor" name="ubs" id="ubs">
                    <option value="">Selecione</option>                   
                    @foreach($ubs as $cadaUbs)
                        <option
                            value="{{ $cadaUbs['id'] }}"
                            @if ($recepcionista['ubs'] ==  $cadaUbs['id'] )
                                selected
                            @endif
                        >
                            {{ $cadaUbs['nome'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr class="formulario__divisor">

        <x-formulario-endereco :update="true" :dados="$recepcionista">
        </x-formulario-endereco>

        <hr class="formulario__divisor">

        <x-formulario-contato :update="true" :dados="$recepcionista">
        </x-formulario-contato>

        <x-formulario-botoes>
        </x-formulario-botoes>
    </form>
</x-layout>