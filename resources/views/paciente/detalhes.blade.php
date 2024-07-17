<x-layout title="Informações do paciente">
    
    <div class="detalhes">
        <ul class="detalhes__lista">
            @foreach ($paciente as $informacao)
                <li class="detalhes__item">
                    <span class="detalhes__label"> {{ $informacao['label'] }}: </span>
                    <span class="detalhes__valor"> {{ $informacao['valor'] }} </span>
                </li>
            @endforeach
        </ul>
    </div>
    <a href="{{ url()->previous() }}" class="botao">Voltar</a>
</x-layout>