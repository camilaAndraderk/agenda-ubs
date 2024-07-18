<x-layout title="Agendamentos">

    <link rel="stylesheet" href="{{ asset('/css/view/index.css') }}">

    @isset($mensagemSucesso)
        <div class="aviso aviso--verde">
            {{ $mensagemSucesso }}
        </div>
    @endisset
    
    @isset($mensagemErro)
        <div class="aviso aviso--vermelho">
            {{ $mensagemErro }}
        </div>
    @endisset
    
    <table class="tabela">
        <thead class="tabela__cabecalho">
            <tr class="tabela__cabecalho__linha">
                <th class="tabela__cabecalho__coluna">
                    Paciente
                </th>
                <th class="tabela__cabecalho__coluna">
                    Médico
                </th>
                <th class="tabela__cabecalho__coluna">
                    Categoria
                </th>
                <th class="tabela__cabecalho__coluna">
                    Situação
                </th>
            </tr>
        </thead>
        <tbody class="tabela__corpo">
            @if(!empty($agendamentos))
                @foreach ($agendamentos as $agendamento)
                    <tr class="tabela__corpo__linha">
                        <td class="tabela__corpo__coluna">
                            {{ $agendamento->nome_paciente }}
                        </td>
                        <td class="tabela__corpo__coluna">
                            {{ $agendamento->nome_medico }}
                        </td>
                        <td class="tabela__corpo__coluna">
                            {{ $agendamento->situacao_consulta }}
                        </td>
                        <td class="tabela__corpo__coluna">
                            {{ $agendamento->categoria_paciente }}
                        </td>   
                    </tr>
                @endforeach
            @else
                <tr class="tabela__corpo__linha">
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone" colspan="4">
                        Não existem agendamentos
                    </td>            
                </tr>
            
            @endif
        </tbody>
    </table>    


</x-layout>