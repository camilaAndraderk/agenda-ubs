<fildset class="formulario__secao">

    <div class="formulario__linha">
         <div class="formulario__grupo">
            <label for="nome" class="formulario__label">Nome Fantasia*</label>
            <input type="text"
                    class="formulario__input"
                    name="nome"
                    @isset($update) value="{{ $ubs['nome'] }}" @endisset
                    id="nome">
        </div>

        <div class="formulario__grupo">
            <label for="razao_social" class="formulario__label">Razão Social</label>
            <input type="text"
                    class="formulario__input"
                    @isset($update) value="{{ $ubs['razao_social'] }}" @endisset
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
                    @isset($update) value="{{ $ubs['cnpj'] }}" @endisset
                    id="cnpj"
                    maxlength="14">
        </div>

        <div class="formulario__grupo">
            <label for="situacao" class="formulario__label">Situação</label>
            <!--  @isset($update) value="{{ $ubs['situacao'] }}" @endisset -->
            <select class="formulario__seletor" name="situacao" id="situacao">
                <option value="Ativa">Ativa</option>
                <option value="Inativa">Inativa</option>
            </select>
        </div>
    </div>

</fildset>