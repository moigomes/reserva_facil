
<!DOCTYPE html>
<html lang="en">
    <head>

<script>
    //Desabilita op��o voltar
//window.history.forward(1);
</Script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.">
        <title>Reserva Fácil - Tela de Login</title>
        
        
         <!--Padrao (js)-->
        <script src="<?php echo base_url(); ?>assets/padrao/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/padrao/js/jquery.mask.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/padrao/js/jquery.maskMoney.js" type="text/javascript"></script>

        
        <!--Padrao (css)----------------------------------------------------------------------------------------->
        <link href="<?php echo base_url(); ?>assets/padrao/css/cabecalho.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/padrao/css/padrao.css" rel="stylesheet" type="text/css"/>
        

       
        <!--Bootstrap (css)----------------------------------------------------------------------------------------->
        <link href="<?php echo base_url(); ?>assets/bootstrap3/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css"/>

        
        <!--Bootstrap (js)-->
        <script src="<?php echo base_url(); ?>assets/bootstrap3/js/bootstrap.js" type="text/javascript"></script>

        <!--Jquery UI (css)-------------------------------------------------------------------------------------------------->
        <link href="<?php echo base_url(); ?>assets/jquery-ui/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/jquery-ui/css/jquery-ui.structure.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/jquery-ui/css/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <!--Jquery UI (js)-->
        <script src="<?php echo base_url(); ?>assets/jquery-ui/js/jquery-ui.js" type="text/javascript"></script>


        <!--Datatables (css)----------------------------------------------------------------------------------------->
        <link href="<?php echo base_url(); ?>assets/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/datatables/css/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css"/>
        <!--Datatables (js)----------------------------------------------------------------------------------------->
        <script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/datatables/js/demo.js" type="text/javascript"></script>

        
        
        
        <script language="javascript">
            window.history.forward(1);
        </script>
        
        
        <style type="text/css"> <!-- // CRIAR UM ARQUIVO CSS PARA ESTAS REGRAS!! -->
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                //background-color: #f5f5f5;
                background: #a7cfdf; /* Old browsers */
background: -moz-linear-gradient(top, #a7cfdf 0%, #23538a 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a7cfdf), color-stop(100%,#23538a)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #a7cfdf 0%,#23538a 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #a7cfdf 0%,#23538a 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #a7cfdf 0%,#23538a 100%); /* IE10+ */
background: linear-gradient(to bottom, #a7cfdf 0%,#23538a 100%); /* W3C */

            }
h1 {
font-size: 55px;
padding-bottom: 30px;

}

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }

        </style>
        <?php include 'includes/mensagens_alert.php'; ?> 
        <!-- Fav and touch icons -->
        <?php echo $this->session->flashdata('mensagem_sessao'); ?>
    </head>
    <body style="background: #a7cfdf; /* Old browsers */
background: -moz-linear-gradient(top, #a7cfdf 0%, #23538a 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a7cfdf), color-stop(100%,#23538a)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #a7cfdf 0%,#23538a 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #a7cfdf 0%,#23538a 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #a7cfdf 0%,#23538a 100%); /* IE10+ */
background: linear-gradient(to bottom, #a7cfdf 0%,#23538a 100%); /* W3C */
">
        <div style="color: #fff; text-align: center; margin-bottom: 50px;  margin-top: 20px">
            <h1>Reserva Fácil</h1>
            <h2>Sistema de fila virtual para uso de salas de reuniões.</h2>
        </div>
        <div class="container">
            <!-- Abre o formulario! -->
            <?php echo form_open('login/logar', array('class' => 'form-signin')); ?>
            <h3 class="form-signin-heading">Identifique-se</h3>
            <input type="text" class="form-control" placeholder="email" name="email" style="width: 100%;">
            <input type="password" class="form-control" placeholder="Senha" name="senha">          
            <label class="checkbox">
                <a href="#myModal"  data-toggle="modal">Esqueceu sua senha?</a>
            </label>
            <div style="width: 100%; text-align: center">
            <button   class="btn btn-large btn-primary" style="width: 100%;  type="submit">Acessar</button>
            </div>
        </form>
    </div> 
   

    <!-- Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">

            <h3 id="myModalLabel">Recuperar senha:</h3>
        </div>
        <div class="modal-body">
            <p><h4>Informe seu E-mail:</h4></p>
            <?php
            echo form_open('login/recupera_senha');
            ?>
            <input type="text" name="email"/>
            <p>Sua senha ser� enviada para o e-mail cadastrado.</p>

        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            <input type="submit" class="btn btn-primary " value="Enviar"/>

        </div>
    </div>
    </form>



<div class="form-actions" style="margin-bottom: 0px; text-align: right; color: #000; padding-top: 5px; padding-bottom: 5px; ">
    © Copyright <?php echo date('Y'); ?> - Moisés Gomes</b>
    
</div>
</body>
</html>
