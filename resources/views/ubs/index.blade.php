<x-layout title="Unidades Básicas de Saúde">

    @isset($mensagemSucesso)
        <div class="aviso aviso--verde">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <dutton class="botao"><a href="{{ route('ubs.create') }}">Cadastrar</a></dutton>
    
    <table class="tabela">
        <thead class="tabela__cabecalho">
            <tr class="tabela__cabecalho__linha">
                <th class="tabela__cabecalho__coluna">
                    Nome Fantasia
                </th>
                <th class="tabela__cabecalho__coluna">
                    CNPJ
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
            @foreach ($ubs as $cadaUbs)

                <tr class="tabela__corpo__linha">
                    <td class="tabela__corpo__coluna">
                        {{ $cadaUbs['nome'] }}
                    </td>
                    <td class="tabela__corpo__coluna">
                        {{ $cadaUbs['cnpj'] }}
                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <a href="">
                            <span class="tag tag--icone tag--azul">
                            <i class="fa-solid fa-info"></i>
                            </span>
                        </a>
                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <span class="tag tag--icone tag--verde-agua">
                            <i class="fa-solid fa-pencil"></i>
                        </span>
                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <form action="{{ route('ubs.destroy', $cadaUbs['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tag tag--icone tag--vermelho">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>    


</x-layout>