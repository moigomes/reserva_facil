<?php
$tipoMensagem = '';
if ($this->session->flashdata('mensagem') != NULL)
    $tipoMensagem = 1;
if (validation_errors() != NULL)
    $tipoMensagem = 2;
?>

<script>
    function confirmacao(caminho) {
        //alert(cod);
        $('#ModalConfirmacao').modal('show');
        $('#sim').attr('href', caminho);

    }


    $(document).ready(function() {
        var tipoMensagem = '<?php echo $tipoMensagem; ?>';
        if (tipoMensagem == 1)
            $('#ModalMensagem').modal('show');
        if (tipoMensagem == 2)
            $('#ModalValidacao').modal('show');





    });
</script>

<div class="modal fade" id="ModalValidacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atenção!!!</h4>
            </div>
            <div class="modal-body">
<?php echo validation_errors(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="ModalConfirmacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmação!</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esse registro?
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>

                <a class="btn btn-primary" id="sim" href="">Sim</a>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalMensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmação!</h4>
            </div>
            <div class="modal-body">
<?php
echo $this->session->flashdata('mensagem');
$this->session->set_flashdata('mensagem', '');
?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalMensagemReserva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atenção!</h4>
            </div>
            <div class="modal-body">
                <h5>Desculpa mas voce já reservou outra sala para esta mesma data e horário!</h5>
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>


<!-- Modal recupera email (INDEX) -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Recuperar Senha!</h4>
            </div>
            <div class="modal-body">
            <p><h4>Informe seu E-mail:</h4></p>
            <?php
            echo form_open('login/recupera_senha');
            ?>
            <input type="text" class="form-control" name="email"/>
            <p>Sua senha será enviada para o e-mail cadastrado.</p>

        </div>
             <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            <input type="submit" class="btn btn-primary " value="Enviar"/>
 </form>

        </div>
        </div>
    </div>
</div>





