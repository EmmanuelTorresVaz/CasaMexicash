<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlArticulosDAO.php");

?>
<script>

    function Validar() {
        var txt;
        var res = confirm("Press a button!");
        if (res == true) {

        } else {
        }
       
    }
    
    function eliminarArticulo($id) {
        var idArticulo = $id;
        $.ajax({
            type:"POST",
            url: '../../../com.Mexicash/Controlador/Articulo.php',
            data:,
            success:function () {

            }
        })

    }
</script>
<div class="row">
    <div class="col col-lg-12">
        <table class="table table-responsive table-hover table-condensed table-bordered">
            <thead>
            <tr>
                <th>Marca</th>
                <th>Estado</th>
                <th>Modelo</th>
                <th>Préstamo</th>
                <th>Avalúo</th>
                <th>Observaciones</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql = new sqlArticulosDAO();
                $data = $sql->buscarArticulo();
                for ($i = 0; $i < count($data); $i++) {
                ?>
            <tr id="<?php echo $data[$i]['id_Articulo']; ?>">
                <td><?php echo $data[$i]['id_Cliente']; ?></td>
                <td><?php echo $data[$i]['marca']; ?></td>
                <td><?php echo $data[$i]['estado']; ?></td>
                <td><?php echo $data[$i]['modelo']; ?></td>
                <td><?php echo $data[$i]['prestamo']; ?></td>
                <td><?php echo $data[$i]['avaluo']; ?></td>
                <td><?php echo $data[$i]['detalle']; ?></td>
                <td><button class="btn btn-danger" onclick="Validar()"; >Eliminar</td>
            </tr>
            <?php } ?>


            </tr>
            </tbody>
        </table>
    </div>
</div>