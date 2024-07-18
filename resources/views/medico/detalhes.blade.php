<x-layout title="Informações do Médico">
    
    <div class="detalhes">
        <ul class="detalhes__lista">
            @foreach ($medico as $informacao)
                <li class="detalhes__item">
                    <span class="detalhes__label"> {{ $informacao['label'] }}: </span>
                    <span class="detalhes__valor"> {{ $informacao['valor'] }} </span>
                </li>
            @endforeach
        </ul>
        <span class="detalhes__label"> Unidades Básicas de Saúde </span>
        <ul class="detalhes__lista">
            @foreach ($ubs as $informacao)
                <li class="detalhes__item">
                    <span class="detalhes__valor"> {{ $informacao->nome_ubs }} </span>
                </li>
            @endforeach
        </ul>
    </div>

    <x-calendario :inicioDoMes="$inicioDoMes" :mesAtual="$mesAtual" :anoAtual="$anoAtual" :consultas="$consultas" :totalDiasMes="$totalDiasMes">
    </x-calendario>



    <a href="{{ url()->previous() }}" class="botao">Voltar</a>
</x-layout>