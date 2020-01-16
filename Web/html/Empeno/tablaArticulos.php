<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlArticulosDAO.php");
?>
<div class="row">
    <div class="col col-lg-12">
        <table class="table table-responsive table-hover table-condensed table-bordered" width="100%">
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
            <tbody id="idTBodyArticulos">
            </tbody>
        </table>
    </div>
</div>