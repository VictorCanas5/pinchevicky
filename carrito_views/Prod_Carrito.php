
<?php
include_once "funciones.php";
$productos = obtenerProductosEnCarrito();
if (count($productos) <= 0) {
?>
    <div class="columns">
        <div class="column">
            <h2 class="is-size-2">Mi carrito de compras</h2>
            <strong>Ver carrito <?php
            $conteo = count(obtenerIdsDeProductosEnCarrito());
            if ($conteo > 0) {
                printf("(%d)", $conteo);
            }
            ?>&nbsp;<i class="fa fa-shopping-cart"></i></strong>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Tipo de prenda</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($productos as $registros) {
                        $total += $registros->precio;
                    ?>
                        <tr>
                            <td><?php $registros->nombre ?></td>
                            <td>$<?php $registros->precio?></td>
                            <td></td>
                            <td>
                                <form action="eliminar_del_carrito.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?= $registros->id_per?>">
                                    <input type="hidden" name="redireccionar_carrito">
                                    <button class="button is-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                        <td colspan="2" class="is-size-4">
                            $<?php $total += $registros->precio ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <a href="terminar_compra.php" class="button is-success is-large"><i class="fa fa-check"></i>&nbsp;Terminar compra</a>
        </div>
    </div>
<?php } ?>