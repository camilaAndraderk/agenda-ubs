<x-layout title="Cadastrar Recepcionistas">
    <form action="{{ route('recepcionista.store') }}" class="formulario" method="post">
        @csrf 
        
        <x-formulario-pessoa-fisica>
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
                        >
                            {{ $cadaUbs['nome'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr class="formulario__divisor">

        <x-formulario-endereco>
        </x-formulario-endereco>

        <hr class="formulario__divisor">

        <x-formulario-contato>
        </x-formulario-contato>

        <x-formulario-botoes>
        </x-formulario-botoes>
        
    </form>
</x-layout>