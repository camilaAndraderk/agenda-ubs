<x-layout title="Editar Paciente">
    <form action="{{ route('paciente.update', $paciente['id']) }}" class="formulario" method="post">
        @csrf
        @method('PUT')

        <x-formulario-pessoa-fisica :update="true" :dados="$paciente">
        </x-formulario-pessoa-fisica>

        <hr class="formulario__divisor">

        <x-formulario-endereco :update="true" :dados="$paciente">
        </x-formulario-endereco>

        <hr class="formulario__divisor">

        <x-formulario-contato :update="true" :dados="$paciente">
        </x-formulario-contato>

        <hr class="formulario__divisor">

        <x-formulario-paciente :update="true" :dados="$paciente">
        </x-formulario-paciente>

        <x-formulario-botoes>
        </x-formulario-botoes>
    </form>
</x-layout>