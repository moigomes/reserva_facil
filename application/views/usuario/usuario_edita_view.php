<?php
if ($usuario)
{
    $idUsuario = $usuario->idUsuario;
    $idPessoa = $usuario->idPessoa;
    $nivelAcesso = $usuario->nivelAcesso;
    $login = $usuario->login;
    $senha = $usuario->senha;
}
else
{
    $idUsuario = set_value('idUsuario');
    $idPessoa = set_value('idPessoa');
    $nivelAcesso = set_value('nivelAcesso');
    $login = set_value('login');
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
            <label for='campo1'>Funcionário:</label>


            <select name='idPessoa' class="input_formulario">
                <option value="<?php echo $usuario->idPessoa; ?>"><?php echo $usuario->nome; ?></option>
                    


            </select>

        </div>

        <div class="div_input_formulario" style="width: 40%">
            <label for='campo1'>Nível de acesso:</label>


            <select name='nivelAcesso' class="input_formulario_ultimo">
                <option value="" <?php if ($nivelAcesso === "") echo 'selected="selected"'; ?>>Selecione</option>
                <option value="1" <?php if ($nivelAcesso === '1') echo 'selected="selected"'; ?>>Acesso total</option>
                <option value="0" <?php if ($nivelAcesso === '0') echo 'selected="selected"'; ?>>Acesso limitado</option>


            </select>

        </div>
        <div style="clear: both"></div>
    </div>
    <hr>
    <div >

        <label for='campo1'>Login:</label>

        <input id='campo1' type='text' class="input_formulario" name='login' value="<?php echo $login; ?>"  />      
    </div>
    <div >
        <label for='campo2'>Senha:</label>

        <input id='campo2' type='password' class="input_formulario" name='senha' value="<?php echo $senha; ?>" />      
    </div>

    <div style = "text-align: center; margin-top: 30px">
        <input type = 'submit' value = 'SALVAR' class = "btn btn-primary" />
    </div>

</form>
</div>




