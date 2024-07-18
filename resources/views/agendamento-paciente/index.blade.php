<x-layout title="Cadastrar Paciente">
    <form action="{{ route('agendamento_paciente.store') }}" class="formulario" method="post">
        @csrf 
        
        <x-formulario-cosulta>

        </x-formulario-cosulta>
        
        
    </form>
</x-layout>