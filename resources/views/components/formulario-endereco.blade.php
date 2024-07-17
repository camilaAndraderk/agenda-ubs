<fildset class="formulario__secao">

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="logradouro" class="formulario__label">Logradouro</label>
            <input type="text"
                    class="formulario__input"
                    name="logradouro"
                    @if (isset($update))
                        value="{{ $dados['logradouro'] }}"
                    @else
                        value="{{ old('logradouro') }}"
                    @endif
                    id="logradouro">
        </div>
    </div>

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="bairro" class="formulario__label">Bairro</label>
            <input type="text"
                    class="formulario__input"
                    name="bairro"
                    @if (isset($update))
                        value="{{ $dados['bairro'] }}"
                    @else
                        value="{{ old('bairro') }}"
                    @endif
                    id="bairro">
        </div>

        <div class="formulario__grupo">
            <label for="numero" class="formulario__label">Número</label>
            <input type="number"
                    class="formulario__input"
                    name="numero"
                    @if (isset($update))
                        value="{{ $dados['numero'] }}"
                    @else
                        value="{{ old('numero') }}"
                    @endif
                    id="numero">
        </div>

        <div class="formulario__grupo">
            <label for="cep" class="formulario__label">CEP</label>
            <input type="text"
                    class="formulario__input"
                    name="cep"
                    @if (isset($update))
                        value="{{ $dados['cep'] }}"
                    @else
                        value="{{ old('cep') }}"
                    @endif
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
                    @if (isset($update))
                        value="{{ $dados['cidade'] }}"
                    @else
                        value="{{ old('cidade') }}"
                    @endif
                    id="cidade">
        </div>

        <div class="formulario__grupo">
            <label for="estado" class="formulario__label">Estado (Sigla)</label>
            <input type="text"
                    class="formulario__input uppercase"
                    name="estado"
                    @if (isset($update))
                        value="{{ $dados['estado'] }}"
                    @else
                        value="{{ old('estado') }}"
                    @endif
                    id="estado"
                    maxlength="2">
        </div>
    </div>

</fildset>