<fildset class="formulario__secao">

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="nome" class="formulario__label">Nome*</label>
            <input type="text"
                    class="formulario__input"
                    name="nome"
                    @isset($update) value="{{ $ubs['nome'] }}" @endisset
                    id="nome">
        </div>
    </div>

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="nascimento" class="formulario__label">Data de nascimento*</label>
            <input type="text"
                    class="formulario__input"
                    name="nascimento"
                    @isset($update) value="{{ $ubs['nascimento'] }}" @endisset
                    id="nascimento">
        </div>

        <div class="formulario__grupo">
            <label for="cpf" class="formulario__label">CPF*</label>
            <input type="text"
                    class="formulario__input"
                    name="cpf"
                    @isset($update) value="{{ $ubs['cpf'] }}" @endisset
                    id="cpf"
                    maxlength="11">
        </div>
    </div>

</fildset>