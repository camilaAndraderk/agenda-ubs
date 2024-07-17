<x-layout title="Recepcionistas">

    <link rel="stylesheet" href="{{ asset('/css/view/index.css') }}">

    @isset($mensagemSucesso)
        <div class="aviso aviso--verde">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <button class="botao"><a href="{{ route('recepcionista.create') }}">Cadastrar</a></button>
    
    <table class="tabela">
        <thead class="tabela__cabecalho">
            <tr class="tabela__cabecalho__linha">
                <th class="tabela__cabecalho__coluna">
                    Nome Fantasia
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
                <th class="tabela__cabecalho__coluna">
                    Apagar
                </th>
            </tr>
        </thead>
        <tbody class="tabela__corpo">
            @if(!empty($recepcionistas))
                @foreach ($recepcionistas as $recepcionista)
                    <tr class="tabela__corpo__linha">
                        <td class="tabela__corpo__coluna">
                            {{ $recepcionista['nome'] }}
                        </td>
                        <td class="tabela__corpo__coluna">
                            {{ $recepcionista['cpf'] }}
                        </td>
                        <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                            <a href="{{ route('ubs.show', $recepcionista['id']) }}">
                                <span class="tag tag--icone tag--azul">
                                <i class="fa-solid fa-info"></i>
                                </span>
                            </a>
                        </td>
                        <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                            <a href="{{ route('ubs.edit', $recepcionista['id']) }}" class="tag tag--icone tag--verde-agua">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                        </td>
                        <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                            <form action="{{ route('ubs.destroy', $recepcionista['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tag tag--icone tag--vermelho">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
            
                    </tr>
                @endforeach
            @else
                <tr class="tabela__corpo__linha">
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone" colspan="5">
                        Não existem recepcionistas cadastradas
                    </td>            
                </tr>
            
            @endif
        </tbody>
    </table>    


</x-layout>