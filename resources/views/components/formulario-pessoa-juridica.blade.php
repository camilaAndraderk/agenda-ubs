<fildset class="formulario__secao">

    <div class="formulario__linha">
         <div class="formulario__grupo">
            <label for="nome" class="formulario__label">Nome Fantasia*</label>
            <input type="text"
                    class="formulario__input"
                    name="nome"
                    @if (isset($update))
                        value="{{ $ubs['nome'] }}"
                    @else
                        value="{{ old('nome') }}"
                    @endif
                    id="nome">
        </div>

        <div class="formulario__grupo">
            <label for="razao_social" class="formulario__label">Razão Social</label>
            <input type="text"
                    class="formulario__input"
                    @if (isset($update))
                        value="{{ $ubs['razao_social'] }}"
                    @else
                        value="{{ old('razao_social') }}"
                    @endif
                    name="razao_social"
                    id="razao_social">
        </div>
    </div>
        
    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="cnpj" class="formulario__label">CPNJ*</label>
            <input type="text"
                    class="formulario__input"
                    name="cnpj"
                    @if (isset($update))
                        value="{{ $ubs['cnpj'] }}"
                    @else
                        value="{{ old('cnpj') }}"
                    @endif
                    id="cnpj"
                    maxlength="14">
        </div>

        <div class="formulario__grupo">
            <label for="situacao" class="formulario__label">Situação</label>
    
            <select class="formulario__seletor" name="situacao" id="situacao">
                <option 
                    value="Ativa" 
                    @if (isset($update))
                        {{ 'Ativa' == $ubs['situacao'] ? 'selected' : '' }}
                    @else
                        {{ "Ativa" == old('situacao') ? 'selected' : '' }}
                    @endif
                >                    
                    Ativa
                </option>
                
                <option
                    value="Inativa" 
                    @if (isset($update))
                        {{ "Inativa" == $ubs['situacao'] ? 'selected' : '' }}
                    @else
                        {{ "Inativa" == old('situacao') ? 'selected' : '' }}
                    @endif
                >
                    Inativa
                </option>
            </select>
        </div>
    </div>

</fildset>