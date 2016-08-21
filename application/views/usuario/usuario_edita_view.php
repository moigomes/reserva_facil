<?php
if ($usuario) {
    $idUsuario = $usuario->idUsuario;
    $nomeUsuario = $usuario->nomeUsuario;
    $nivelAcesso = $usuario->nivelAcesso;
    $email = $usuario->email;
    $senha = $usuario->senha;
} else {
    $idUsuario = set_value('idUsuario');
    $nomeUsuario = set_value('nomeUsuario');
    $nivelAcesso = set_value('nivelAcesso');
    $email = set_value('email');
    $senha = set_value('senha');
}
?>
<div class="div_formularios" style="width: 40%">
    <div class="cabecalho_formulario_listas" >
        <h2>ALTERAR USUÁRIO</h2>
    </div>


<?php
echo form_open('usuario/salvar_usuario');
?>

    <input id='campo0' type='hidden' name='idUsuario' value="<?php echo $idUsuario; ?>" />

    <div >
        <div class="div_input_formulario" style="width: 60%">
            <label for='campo1'>Nome:</label>
            <input id='campo1' type='text' name='nomeUsuario' value="<?php echo $usuario->nomeUsuario; ?>"  />

        </div>

        <div class="div_input_formulario" style="width: 40%">
            <label for='campo1'>Nível de acesso:</label>


            <select name='nivelAcesso' class="input_formulario_ultimo">
                <option value="" <?php if ($nivelAcesso === "") echo 'selected="selected"'; ?>>Selecione</option>
                <option value="1" <?php if ($nivelAcesso === '1') echo 'selected="selected"'; ?>>Admin</option>
                <option value="0" <?php if ($nivelAcesso === '0') echo 'selected="selected"'; ?>>Usuário</option>


            </select>

        </div>
        <div style="clear: both"></div>
    </div>
    <hr>
    <div >

        <label for='campo1'>E-mail:</label>

        <input id='campo1' type='text' class="input_formulario" name='email' value="<?php echo $email; ?>"  />      
    </div>
    <div >
        <label for='campo2'>Senha:</label>

        <input id='campo2' type='password' class="form-control" name='senha' value="" />      
    </div>

    <div style = "text-align: center; margin-top: 30px">
        <input type = 'submit' value = 'SALVAR' class = "btn btn-primary" />
    </div>

</form>
</div>




