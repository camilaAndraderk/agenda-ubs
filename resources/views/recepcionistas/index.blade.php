<x-layout title="Recepcionistas">
    
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
                <th class="tabela__cabecalho__coluna">
                    Apagar
                </th>
            </tr>
        </thead>
        <tbody class="tabela__corpo">
            @foreach ($recepcionistas as $recepcionista)

                <tr class="tabela__corpo__linha">
                    <td class="tabela__corpo__coluna">
                        {{ $recepcionista['nome'] }}
                    </td>
                    <td class="tabela__corpo__coluna">
                        {{ $recepcionista['cpf'] }}
                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <span class="etiqueta-icone etiqueta-icone--azul">
                            <i class="fa-solid fa-info"></i>
                        </span>
                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <span class="etiqueta-icone etiqueta-icone--verde-agua">
                            <i class="fa-solid fa-pencil"></i>
                        </span>
                    </td>
                    <td class="tabela__corpo__coluna tabela__corpo__coluna--icone">
                        <span class="etiqueta-icone etiqueta-icone--verde">
                            <i class="fa-solid fa-trash-can"></i>
                        </span>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>


</table>    


</x-layout>