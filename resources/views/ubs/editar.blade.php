<x-layout title="Editar Unidade Básica de Saúde">
    <form action="{{ route('ubs.update', $ubs['id']) }}" class="formulario" method="post">
        @csrf
        @method('PUT')
        
        <x-formulario-pessoa-juridica :update="true" :ubs="$ubs">
        </x-formulario-pessoa-juridica>

        <hr class="formulario__divisor">

        <x-formulario-endereco :update="true" :ubs="$ubs">
        </x-formulario-endereco>

        <hr class="formulario__divisor">

        <x-formulario-contato :update="true" :ubs="$ubs">
        </x-formulario-contato>

        <x-formulario-botoes>
        </x-formulario-botoes>
    </form>
</x-layout>