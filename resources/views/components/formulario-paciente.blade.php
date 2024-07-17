<fildset class="formulario__secao">
    <div class="formulario__linha" data-comorbidades>
        <div class="formulario__grupo">
            <label for="comorbidades" class="formulario__label">Comorbidades</label>
            <textarea
                class="formulario__input"
                name="comorbidades"
                id="comorbidades"
                maxlength="256"
                @if (isset($update))
                    value="{{ $dados['comorbidades'] }}"
                @else
                    value="{{ old('comorbidades') }}"
                @endif
            > </textarea>
        </div>
    </div>
    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="observacao" class="formulario__label">Observação</label>
            <textarea
                type="text"
                class="formulario__input"
                name="observacao"
                id="observacao"
                maxlength="256"
                @if (isset($update))
                    value="{{ $dados['observacao'] }}"
                @else
                    value="{{ old('observacao') }}"
                @endif
            > </textarea>
        </div>
    </div>

</fildset>