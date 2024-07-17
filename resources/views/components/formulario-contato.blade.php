<fildset class="formulario__secao">

    <div class="formulario__linha">
        <div class="formulario__grupo">
            <label for="email" class="formulario__label">E-mail</label>
            <input type="email"
                    class="formulario__input"
                    name="email"
                    @if (isset($update))
                        value="{{ $dados['email'] }}"
                    @else
                        value="{{ old('email') }}"
                    @endif
                    
                    id="email">
        </div>

        <div class="formulario__grupo">
            <label for="telefone" class="formulario__label">Telefone</label>
            <input type="text"
                    class="formulario__input"
                    name="telefone"
                    @if (isset($update))
                        value="{{ $dados['telefone'] }}"
                    @else
                        value="{{ old('telefone') }}"
                    @endif
                    
                    id="telefone"
                    maxlength="15">
        </div>
    </div>

</fildset>