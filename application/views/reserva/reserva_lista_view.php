<div class="div_listas" style="width: 95%">

    <div style="text-align: left" class="cabecalho_formulario_listas">
        <h2>MINHAS RESERVAS</h2>
    </div>
    <div  style="width: 100%; margin-bottom: 5px;">
        <a  class="btn" href="<?php echo base_url() . 'reserva/form_reserva'; ?>">Nova reserva</a>
    </div>


    <div class="container" style="background-color: #f5f5f5; width: 100%;">
        <table class="table table-striped" >
            <thead>
                <tr>
                    <td> Descrição	</td>
                    <td> Sala	</td>
                    <td> Data	</td>
                    <td> Hora	</td>


                    <td style="width: 5%; "> EXCLUIR </td>
                </tr>   
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva) { ?>
                    <tr>
                        <td style="width: 20%"> <?php echo $reserva->descricao; ?></td>
                        <td style="width: 20%"> <?php echo $reserva->nomeSala; ?></td>
                        <td style="width: 20%"> <?php echo $reserva->data; ?></td>
                        <td style="width: 20%"> <?php echo $reserva->horaInicial; ?></td>


                        <td>
                <center> <a  href="javascript:confirmacao('<?php echo base_url() . 'reserva/excluir_reserva/' . $reserva->idReserva; ?>')"> <i class="glyphicon glyphicon-remove"></i></a> </center>
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>