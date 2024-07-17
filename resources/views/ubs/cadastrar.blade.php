<x-layout title="Cadastrar Unidade Básica de Saúde">

    <form action="{{ route('ubs.store') }}" class="formulario" method="post">
        @csrf
        
        <x-formulario-pessoa-juridica>
        </x-formulario-pessoa-juridica>

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