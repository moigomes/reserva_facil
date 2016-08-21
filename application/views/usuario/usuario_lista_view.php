
<style>
    .table thead td{
        text-align: center;
    }    



</style>



<div class="div_listas" style="width: 80%;">
    <div class="cabecalho_formulario_listas" style="width: 100%;">
        <h2>LISTA DE USUARIOS</h2>

    </div>
    <div style="width: 100%; margin-bottom: 5px;">
        <div style="float: left; ">
            <a  class="btn btn-primary" href="<?php echo base_url() . 'usuario/form_usuario'; ?>"><i class="glyphicon glyphicon-plus"></i> Novo usuario</a>

        </div>
        <div style="clear: both" ></div>
    </div>





    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>
                    NOME USUÁRIO
                </td>
                <td style="width: 20%">
                    E-MAIL
                </td>
                <td style="width: 20%">
                    NIVEL ACESSO
                </td>

                <td style="width: 10%; text-align: center">
                    SITUAÇÃO
                </td>
                <td style="width: 10%;">
                    ALTERAR
                </td>

            </tr>   
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) {
                ?>
                <tr>
                    <td>
                        <?php echo $usuario->nomeUsuario; ?>
                    </td>
                    
                    <td style="text-align: center">
                        <?php echo $usuario->email; ?>
                    </td>
                    <td style="text-align: center">
                        <?php
                        if ($usuario->nivelAcesso == '0') {


                            echo 'Admin';
                        } else {
                            echo 'Usuário';
                        }
                        ?>
                    </td>
                    <td style="text-align: center">
                        <?php
                        if ($usuario->situacao == '0') {


                            echo 'Ativo';
                        } else {
                            echo 'Bloqueado';
                        }
                        ?>
                    </td>
                    <td style=" text-align: center">

                        <a  href="<?php echo base_url() . 'usuario/form_editar_usuario/' . $usuario->idUsuario; ?>"> <i class="glyphicon glyphicon-edit"></i></a>
                    </td>


                </tr>
<?php } ?>
        </tbody>
    </table>
</div>



