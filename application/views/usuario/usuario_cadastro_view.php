
<div class="div_formularios" style="width: 40%">
    <div class="cabecalho_formulario_listas" >
        <h2>CADASTRO DE USUÁRIO</h2>
    </div>


    <?php
    echo form_open('usuario/salvar_usuario');
    ?>

    <input id='campo0' type='hidden' name='idUsuario' value="" />

    <div >
        <div class="div_input_formulario" style="width: 60%">
            <label for='campo1'>Nome:</label>
            <input id='campo1' type='text' name='nomeUsuario' value="<?php echo set_value('nomeUsuario'); ?>"  />

        </div>

        <div class="div_input_formulario" style="width: 40%">
            <label for='campo1'>Nível de acesso:</label>


            <select name='nivelAcesso' class="input_formulario_ultimo">
                <option value="" <?php if (set_value('nivelAcesso') === '') echo 'selected="selected"'; ?>>Selecione</option>
                <option value="0" <?php if (set_value('nivelAcesso') === '0') echo 'selected="selected"'; ?>>Admin</option>
                <option value="1" <?php if (set_value('nivelAcesso') === '1') echo 'selected="selected"'; ?>>Usuário</option>


            </select>

        </div>
        <div style="clear: both"></div>
    </div>
    <hr>
    <div >
        <label for='campo1'>E-mail:</label>

        <input id='campo1' type='text' name='email' value="<?php echo set_value('email'); ?>"  />      
    </div>
    <div >
        <label for='campo1'>Senha:</label>

        <input id='campo1' class="form-control" type='password' name='senha' value="<?php echo set_value('senha'); ?>" />      
    </div>

    <div style = "text-align: center; margin-top: 30px">
        <input type = 'submit' value = 'SALVAR' class = "btn btn-primary" />
    </div>

</form>
</div>




