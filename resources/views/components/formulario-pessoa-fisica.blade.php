<fildset class="formulario__secao">

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="nome" class="formulario__label">Nome*</label>
            <input type="text"
                    class="formulario__input"
                    name="nome"
                    @if (isset($update))
                        value="{{ $dados['nome'] }}"
                    @else
                        value="{{ old('nome') }}"
                    @endif
                    id="nome">
        </div>
    </div>

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="nascimento" class="formulario__label">Data de nascimento*</label>
            <input type="date"
                    class="formulario__input"
                    name="nascimento"
                    @if (isset($update))
                        value="{{ $dados['nascimento'] }}"
                    @else
                        value="{{ old('nascimento') }}"
                    @endif
                    id="nascimento">
        </div>

        <div class="formulario__grupo">
            <label for="cpf" class="formulario__label">CPF*</label>
            <input type="text"
                    class="formulario__input"
                    name="cpf"
                    @if (isset($update))
                        value="{{ $dados['cpf'] }}"
                        disabled
                    @else
                        value="{{ old('cpf') }}"
                    @endif
                    id="cpf"
                    maxlength="11">
        </div>
    </div>

</fildset>