<x-layout title="Agendar Consulta">
    <form action="{{ route('agendamento_paciente.store') }}" class="formulario" method="post">
        @csrf
        <fildset class="formulario__secao">
    
            <div class="formulario__linha">
                <div class="formulario__grupo">
                    <label for="comparecimento" class="formulario__label">O paciente compareceu à consulta?</label>
                    <select name="" id="" class="formulario__seletor" id="comparecimento">
                        <option value="concluido" class="formulario__option">Sim</option>
                        <option value="falta" class="formulario__option">Faltou</option>
                        <option value="cancelado" class="formulario__option">Cancelou</option>
                    </select>
                </div>
            </div>
            <div class="formulario__linha">
                <div class="formulario__grupo">
                    <label for="avaliacao" class="formulario__label">Avaliação Médica</label>
                    <textarea class="formulario__input" name="avaliacao" id="avaliacao"> </textarea>
                </div>
            </div>

        </fildset>
        
    </form>
</x-layout>