<div class="div_listas" style="width: 95%">

    <div style="text-align: left" class="cabecalho_formulario_listas">
        <h2>LISTA DE SALAS</h2>
    </div>
    <div  style="width: 100%; margin-bottom: 5px;">
        <a  class="btn btn-primary" href="<?php echo base_url() . 'sala/form_sala'; ?>"><i class="glyphicon glyphicon-plus"></i> Nova sala</a>
    </div>


    <div class="container" style="background-color: #f5f5f5; width: 100%;">
        <table class="table table-striped" >
            <thead>
                <tr>
                    <td> Sala	</td>
                    
                    <td style="width: 5%; text-align: center; "> ALTERAR </td>
                    <td style="width: 5%; text-align: center; "> EXCLUIR </td>
                </tr>   
            </thead>
            <tbody>
                <?php foreach ($salas as $sala) { ?>
                    <tr>

                        <td style="width: 20%; text-align: left;"> <?php echo $sala->nomeSala; ?> 					</td>
                        				</a></td>
                         					</td>
                        <td style=" text-align: center;">
                <center> <a href="sala/form_editar_sala/<?php echo $sala->idSala; ?>" style="text-align: center"><i class="glyphicon glyphicon-edit" ></i></a> </center>
                </td>
                <td>
                <center> <a  href="javascript:confirmacao('<?php echo base_url() . 'sala/excluir_sala/' . $sala->idSala; ?>')"> <i class="glyphicon glyphicon-remove"></i></a> </center>
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>