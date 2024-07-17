<x-layout title="Médicos">

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

   <a class="botao" href="{{ route('medico.create') }}">Cadastrar</a>
    
    <table class="tabela">
        <thead class="tabela__cabecalho">
            <tr class="tabela__cabecalho__linha">
                <th class="tabela__cabecalho__coluna">
                    Nome
                </th>
                <th class="tabela__cabecalho__coluna">
                    CPF
                </th>
                <th class="tabela__cabecalho__coluna">
                    Ver +
                </th>
                <th class="tabela__cabecalho__coluna">
                    Editar
                </th>
                <!-- <th class="tabela__cabecalho__coluna">
                    Apagar
                </th> -->
            </tr>
        </thead>
        <tbody class="tabela__corpo">
            @if(!empty($medicos))
                @foreach ($medicos as $medico)
                    <tr class="tabela__corpo__linha">
                        <td class="tabela__corpo__coluna">
                            {{ $medico['nome'] }}
                        </td>
                        <td class="tabela__corpo__coluna">
                            {{ $medico['cpf'] }}
                        </td>
                        <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                            <a href="{{ route('medico.show', $medico['id']) }}">
                                <span class="tag tag--icone tag--azul">
                                <i class="fa-solid fa-info"></i>
                                </span>
                            </a>
                        </td>
                        <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                            <a href="{{ route('medico.edit', $medico['id']) }}" class="tag tag--icone tag--verde-agua">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                        </td>
                        <!-- <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                            <form action="{{ route('medico.index', $medico['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tag tag--icone tag--vermelho">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td> -->
            
                    </tr>
                @endforeach
            @else
                <tr class="tabela__corpo__linha">
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone" colspan="4">
                        Não existem médicos cadastrados
                    </td>            
                </tr>
            
            @endif
        </tbody>
    </table>    


</x-layout>