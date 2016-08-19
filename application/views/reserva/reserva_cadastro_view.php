<div class="div_formularios" style="width: 55%">
    <div class="cabecalho_formulario_listas">
        <h2>CADASTRO DE RESERVAS</h2>
    </div>

    <?php echo form_open('reserva/salvar_reserva'); ?>
    <input id='campo0' type='hidden' name='idReserva' value="" />
    <div  style="position: relative; width: 100%"  >  
        <div style=" width: 100%; " class="div_input_formulario" >
            <label for='campo1'>Descrição:</label>
            <input class="input_formulario" id='campo1' type='text' name='descricao' value="<?php echo set_value('descricao'); ?>" />      
        </div>
        <div style=" width: 30%; " class="div_input_formulario" >
            <label for='campo1'>Sala:</label>
            <select name="idSala" >
                <option value="0">Selecione</option>
                <?php foreach ($salas as $sala){ ?>
                 <option value="<?php echo $sala->idSala; ?>"><?php echo $sala->nomeSala; ?></option>   
                <?php } ?>

            </select>
        </div>
        <div style=" width: 30%; " class="div_input_formulario" >
            <label for='campo1'>Data:</label>
            <input class="input_formulario" id='data' type='text' name='data' value="<?php echo set_value('data'); ?>" />      
        </div>
        <div style=" width: 30%; " class="div_input_formulario" >
            <label for='campo1'>Horários disponíveis:</label>
             <select name="idSala" >
                <option value="0">Selecione</option>
                <?php for ($i=8; $i<=18; $i++){ ?>
                 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
                <?php } ?>

            </select>      
        </div>

        <div style="clear: both"></div>
    </div>


    <div style="text-align: center">          
        <a class="btn btn-primary" href="<?php echo base_url(); ?>reserva" >&laquo; Voltar</a>
        <input type='submit' value='Inserir' class="btn btn-primary" />
    </div>

</div>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        
        $("#data").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            changeMonth: true,
            numberOfMonths: 1,
            beforeShow: function () {
                $(".ui-datepicker").css('font-size', 16)
            },
            onClose: function (selectedDate) {
                $("#dataDevol").datepicker("option", "minDate", selectedDate);
            }
        });
    });
        </script>