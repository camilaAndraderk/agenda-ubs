<fildset class="formulario__secao">

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="especialidade" class="formulario__label">Especialidade</label>
            <input type="text" class="formulario__input" name="especialidade" id="especialidade">
        </div>

        <div class="formulario__grupo">
            <label for="crm" class="formulario__label">CRM</label>
            <input type="text" class="formulario__input" name="crm" id="crm">
        </div>
    </div>

    <p>Em quais Unidades Básicas de Saúde o médico atende</p>
    <table class="tabela">
        <thead class="tabela__cabecalho">
            <tr class="tabela__cabecalho__linha">
                <th class="tabela__cabecalho__coluna">
                    Médico
                </th>
                <th class="tabela__cabecalho__coluna">

                </th>
            </tr>
        </thead>
        <tbody class="tabela__corpo">
            @foreach ($ubs as $cadaUbs)

                <tr class="tabela__corpo__linha">
                    <td class="tabela__corpo__coluna">
                        <label for="ubs_{{ $cadaUbs['id'] }}" class="formulario__label">{{ $cadaUbs['nome'] }}</label>
                        
                    </td>
                    <td class="tabela__corpo__coluna">
                        {{ $cadaUbs['cpf'] }}
                        <input type="checkbox" name="ubs[]" id="ubs_{{ $cadaUbs['id'] }}" :value="$cadaUbs['id']">
                    </td>                    
                </tr>
            @endforeach
        </tbody>


</table>    

    <div class="formulario__linha">
        <div class="formulario__grupo">
        </div>
    </div>


</fildset>