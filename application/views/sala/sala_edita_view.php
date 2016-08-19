<?php
if (isset($sala))
{
    $idSala = $sala->idSala;
    $nomeSala = $sala->nomeSala;
    
}
 else {
   $idSala = set_value('idSala');
    $nomeSala= set_value('nomeSala');
    
 }
    
    

?>



<div class="div_formularios" style="width: 55%">

    <div class="cabecalho_formulario_listas">
        <h2>ALTERAR SALA</h2>
    </div>

    <?php echo form_open('sala/salvar_sala'); ?>
    <input id='campo0' type='hidden' name='idSala' value="<?php echo $idSala; ?>" />



   <div  style="position: relative; width: 100%"  >  
        <div style=" width: 100%; " class="div_input_formulario" >
            <label for='campo1'>Nome:</label>
            <input class="input_formulario" id='campo1' type='text' name='nomeSala' value="<?php echo $nomeSala; ?>" />      
        </div>
        
        <div style="clear: both"></div>
    </div>


    <div style="text-align: center">          
        <a class="btn btn-primary" href="<?php echo base_url();  ?>sala" >&laquo; Voltar</a>
        <input type='submit' value='Atualizar' class="btn btn-primary" />
    </div>

</div>
</form>