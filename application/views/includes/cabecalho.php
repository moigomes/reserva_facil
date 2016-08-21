<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titulo_pagina; ?></title>

        <!--Padrao (css)----------------------------------------------------------------------------------------->
        <link href="<?php echo base_url(); ?>assets/padrao/css/cabecalho.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/padrao/css/padrao.css" rel="stylesheet" type="text/css"/>
        
        <!--Padrao (js)-->
        <script src="<?php echo base_url(); ?>assets/padrao/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/padrao/js/jquery.mask.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/padrao/js/jquery.maskMoney.js" type="text/javascript"></script>

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


        <script>
            $(document).ready(function () {
        $( "input:text, select, textarea" ).addClass('form-control');
            });
            //Desabilita opção voltar
            //window.history.forward(1);
            
       
        </Script>


        <?php include 'mensagens_alert.php';
        ?> 
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('inicio'); ?>">Reserva Fácil</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reservas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><?php echo anchor('reserva', 'Minhas reservas'); ?></li>
                                <li><?php echo anchor('reserva/form_reserva', 'Nova reserva'); ?></li>  
                                    
                                    
                            </ul>
                        </li> 
                        
                        <?php if($this->session->userdata('nivelAcesso') == 0) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><?php echo anchor('sala', 'Salas'); ?></li>
                                <li><?php echo anchor('usuario/listar_usuarios', 'Usuarios'); ?></li>  
                                    
                                    
                            </ul>
                        </li>
                        <?php } ?> 
                        
                    </ul>
                    <ul class="nav pull-right" style="margin-right:7px; margin-top: 9px;">
                            <li><div class="btn-group">
                                    <a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo $this->session->userdata('nomeUsuario'); ?></a>
                                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#" ><span class="caret" style="border-top-color: white"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url() . 'usuario/form_alterar_senha/'.$this->session->userdata('idUsuario'); ?>"><i class="icon-wrench"></i> Alterar senha</a></li>
                                        <li><a href="<?php echo base_url() . 'login/sair'; ?>"><i class="icon-off"></i> Sair</a></li>
                                    </ul>
                                </div></li>
                        </ul>
                    
                    
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        