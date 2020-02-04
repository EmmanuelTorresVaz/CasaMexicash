<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Articulo</title>
</head>
<body>
<div class="modal fade " id="modalAgregarTipo" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                    <table width="100%" >
                        <tr>
                            <td>
                                <label>Tipo:</label>
                            </td>
                            <td>
                                <input type="text" id="idTipoAgregar" name="tipoAgregar" size="20" value=""/>
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-success " data-dismiss="modal"
                       onclick="agregarTipoE();"  value="Agregar Tipo">
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="modalAgregarMarca" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <table width="100%" >
                    <tr>
                        <td>
                            <label>Tipo:</label>
                        </td>
                        <td>
                            <input type="text" id="idTipoModMarcaDes" name="tipoAgregar" size="20"  disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Marca:</label>
                        </td>
                        <td>
                            <input type="text" id="idMarcaAgregar" name="tipoAgregar" size="20" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" id="idTipoModMarca"  size="20" class="invisible"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-success " data-dismiss="modal"
                       onclick="agregarMarcaE();"  value="Agregar Marca">
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="modalAgregarModelo" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <table width="100%" >
                    <tr>
                        <td>
                            <label>Tipo:</label>
                        </td>
                        <td>
                            <input type="text" id="idTipoModDes" name="tipoAgregar" size="20"  disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Marca:</label>
                        </td>
                        <td>
                            <input type="text" id="idMarcaModDes" name="tipoAgregar" size="20"  disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Modelo:</label>
                        </td>
                        <td>
                            <input type="text" id="idModeloAgregar" name="tipoAgregar" size="20" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <input type="text" id="idTipoModModelo"  size="5" class="invisible"/>
                        </td>
                        <td >
                            <input type="text" id="idMarcaModModelo"  size="5" class="invisible"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-success " data-dismiss="modal"
                       onclick="agregarModeloE();"  value="Agregar Marca">
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="modalAgregarProducto" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <table width="100%" >
                    <tr>
                        <td>
                            <label>Tipo:</label>
                        </td>
                        <td>
                            <input type="text" id="idTipoDescP" name="tipoP" size="15"  disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Marca:</label>
                        </td>
                        <td>
                            <input type="text" id="idMarcaDescP" name="marcaP" size="15"  disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Modelo:</label>
                        </td>
                        <td>
                            <input type="text" id="idModeloDescP" name="modeloP" size="15"  disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Precio:</label>
                        </td>
                        <td>
                            <input type="text" id="idPrecio" name="precioMod" size="15"  onkeypress="isNumberDecimal()" style="text-align: right"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Vitrina:</label>
                        </td>
                        <td>
                            <input type="text" id="idVitrina" name="vitrinaMod" size="15"  onkeypress="isNumberDecimal()" style="text-align: right"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Caracteristicas:</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                               <textarea rows="4" cols="25" id="idCaracteristica" class="textArea" style="text-align: left">
                                    </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <input type="text" id="idTipoModP"  size="5" class="invisible"/>
                        </td>
                        <td >
                            <input type="text" id="idMarcaModP"  size="5" class="invisible"/>
                            <input type="text" id="idModeloModP"  size="5" class="invisible"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-success " data-dismiss="modal"
                       onclick="agregarProducto();"  value="Agregar Marca">
            </div>
        </div>
    </div>
</div>
</body>
</html>
