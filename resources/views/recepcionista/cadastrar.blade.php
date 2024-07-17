<x-layout title="Cadastrar Recepcionistas">
    <form action="recepcionistas.store" class="formulario" method="post">
        @csrf 
        
        <x-formulario-pessoa-fisica>
        </x-formulario-pessoa-fisica>

        <hr class="formulario__divisor">

        <div class="formulario__linha">
            <div class="formulario__grupo">
                <label for="situacao" class="formulario__label">Unidade Básica de Saúde*</label>
                <select class="formulario__seletor" name="situacao" id="situacao">
                    <option value="">Selecione</option>
                    <option value="1">Posto 1</option>
                    <option value="2">Posto 2</option>
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