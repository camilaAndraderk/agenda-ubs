<x-layout title="Cadastrar Paciente">
    <form action="{{ route('paciente.store') }}" class="formulario" method="post">
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

        <x-formulario-paciente>
        </x-formulario-paciente>

        <x-formulario-botoes>
        </x-formulario-botoes>
        
    </form>
</x-layout>