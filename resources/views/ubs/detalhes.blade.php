<x-layout title="Informações da Unidade Básica de Saúde">
    
    <div class="detalhes">
        <ul class="detalhes__lista">
            @foreach ($ubs as $informacao)
                <li class="detalhes__item">
                    <span class="detalhes__label"> {{ $informacao['label'] }}: </span>
                    <span class="detalhes__valor"> {{ $informacao['valor'] }} </span>
                </li>
            @endforeach
        </ul>
    </div>
    <a href="{{ url()->previous() }}" class="botao">Voltar</a>
</x-layout>