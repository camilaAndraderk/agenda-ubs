<fildset class="formulario__secao">

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="email" class="formulario__label">E-mail</label>
            <input type="email"
                    class="formulario__input"
                    name="email"
                    @isset($update) value="{{ $ubs['email'] }}" @endisset
                    id="email">
        </div>

        <div class="formulario__grupo">
            <label for="telefone" class="formulario__label">Telefone</label>
            <input type="text"
                    class="formulario__input"
                    name="telefone"
                    @isset($update) value="{{ $ubs['telefone'] }}" @endisset
                    id="telefone"
                    maxlength="15">
        </div>
    </div>

</fildset>