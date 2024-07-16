<fildset class="formulario__secao">

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="logradouro" class="formulario__label">Logradouro</label>
            <input type="text"
                    class="formulario__input"
                    name="logradouro"
                    @isset($update) value="{{ $ubs['logradouro'] }}" @endisset
                    id="logradouro">
        </div>
    </div>

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="bairro" class="formulario__label">Bairro</label>
            <input type="text"
                    class="formulario__input"
                    name="bairro"
                    @isset($update) value="{{ $ubs['bairro'] }}" @endisset
                    id="bairro">
        </div>

        <div class="formulario__grupo">
            <label for="numero" class="formulario__label">Número</label>
            <input type="number"
                    class="formulario__input"
                    name="numero"
                    @isset($update) value="{{ $ubs['numero'] }}" @endisset
                    id="numero">
        </div>

        <div class="formulario__grupo">
            <label for="cep" class="formulario__label">CEP</label>
            <input type="text"
                    class="formulario__input"
                    name="cep"
                    @isset($update) value="{{ $ubs['cep'] }}" @endisset
                    id="cep"
                    maxlength="10">
        </div>
    </div>

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="cidade" class="formulario__label">Cidade</label>
            <input type="text"
                    class="formulario__input"
                    name="cidade"
                    @isset($update) value="{{ $ubs['cidade'] }}" @endisset
                    id="cidade">
        </div>

        <div class="formulario__grupo">
            <label for="estado" class="formulario__label">Estado (Sigla)</label>
            <input type="text"
                    class="formulario__input"
                    name="estado"
                    @isset($update) value="{{ $ubs['estado'] }}" @endisset
                    id="estado"
                    maxlength="2">
        </div>
    </div>

</fildset>