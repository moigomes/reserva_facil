<div class="div_listas" style="width: 95%">

    <div style="text-align: left" class="cabecalho_formulario_listas">
        <h2>MINHAS RESERVAS</h2>
    </div>
    <div  style="width: 100%; margin-bottom: 5px;">
        <a  class="btn btn-primary" href="<?php echo base_url() . 'reserva/form_reserva'; ?>"><i class="glyphicon glyphicon-plus"></i> Nova reserva</a>
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
                <?php foreach ($reservas as $reserva) {
                    $data = explode('-', $reserva->data);
                    $data = $data[2].'/'.$data[1].'/'.$data[0]
                    
                    ?>
                    <tr>
                        <td style="width: 20%; text-align: left;"> <?php echo $reserva->descricao; ?></td>
                        <td style="width: 20%"> <?php echo $reserva->nomeSala; ?></td>
                        <td style="width: 20%"> <?php echo $data; ?></td>
                        <td style="width: 20%"> <?php echo $reserva->horaInicial.':00 às '.($reserva->horaInicial+1).':00'; ?></td>


                        <td>
                <center> <a  href="javascript:confirmacao('<?php echo base_url() . 'reserva/excluir_reserva/' . $reserva->idReserva; ?>')"> <i class="glyphicon glyphicon-remove"></i></a> </center>
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>