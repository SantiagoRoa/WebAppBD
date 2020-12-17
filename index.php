<?php
$BD = new PDO('sqlite:res/db/tienda.db');

$tabla_zonas = "SELECT * FROM tbl_zonas";
$tabla_clientes = "SELECT * FROM tbl_clientes";
$tabla_articulos = "SELECT * FROM tbl_articulos";
$tabla_pedidos = "SELECT * FROM tbl_pedidos";

$queryZonas = $BD->prepare($tabla_zonas);
$queryZonas->execute();
$queryClientes = $BD->prepare($tabla_clientes);
$queryClientes->execute();
$queryArticulos = $BD->prepare($tabla_articulos);
$queryArticulos->execute();
$queryPedidos = $BD->prepare($tabla_pedidos);
$queryPedidos->execute();
?>


<div>

</div>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, shrink-to-fit=no, minimun-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Recursos -->

    <link rel="stylesheet" href="res/Estilos/styles.css">
    <script type="text/javascript" src="res/js/index.js"></script>
    <link rel="icon" type="image/png" href="res/Img/favicon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">

    <Title>
        Base de Datos
    </Title>
</head>

<body>
    <div class="contenedor">
        <header id="cabezera">
            <div class="logo">
                <img class="img-fluid" src="res/Img/logo.png" width="100" alt="Logo UD">
                <a href='#'>Operaciones CRUD</a>
            </div>
        </header>

        <div class="cuerpo">
            <aside>
                <div>Operaciones</div><br>
                <button type="button" id="b_crear" name="b_crear">Crear</button>
                <button type="button" id="b_actualizar" name="b_actualizar">Actualizar</button>
                <button type="button" id="b_borrar" name="b_borrar">Borrar</button>
            </aside>
            <article>
                <form method="POST" action="res/php/operacion.php" id="formulario">
                    <div id="botones">
                        <input type="radio" id="b_Tzonas" name="b_tablas" checked value="zonas">
                        <label for="zonas">Zonas</label>
                        <input type="radio" id="b_Tclientes" name="b_tablas" value="clientes">
                        <label for="zonas">Clientes</label>
                        <input type="radio" id="b_Tpedidos" name="b_tablas" value="pedidos">
                        <label for="zonas">Pedidos</label>
                        <input type="radio" id="b_Tarticulos" name="b_tablas" value="articulos">
                        <label for="zonas">Artículos</label>
                    </div>
                    <input type="hidden" id="ident" name="ident">;
                    <div class="campos">
                        <div id="f_zonas">
                            <input type="text" id="id_zonas" name="id_zonas" placeholder="ID">
                            <input type="text" id="desc_zonas" name="desc_zonas" placeholder="Descripción">
                        </div>
                        <div id="f_clientes" ">
                            <input type="text" id="cod_clien" name="cod_clien" placeholder="Código Cliente">
                            <input type="text" id="nombre_clien" name="nombre_clien" placeholder="Nombre">
                            <input type="text" id="dir_clien" name="dir_clien" placeholder="Dirección">
                            <input type="text" id="postal_clien" name="postal_clien" placeholder="Código Postal">
                            <input type="text" id="pobla_clien" name="ciudad_clien" placeholder="Ciudad">
                            <input type="text" id="tel_clien" name="tel_clien" placeholder="Teléfono">
                            <input type="text" id="fax_clien" name="email_clien" placeholder="email">
                            <input type="text" id="desc_clien" name="desc_clien" placeholder="Descuento">
                            <input type="text" id="zonaV_clien" name="zonaV_clien" placeholder="Zona Ventas">
                        </div>
                        <div id="f_pedidos">
                            <input type="text" id="num_ped" name="num_ped" placeholder="Número de Pedido">
                            <input type="text" id="num_clien" name="num_clien" placeholder="Código Cliente">
                            <input type="text" id="num_artic" name="num_artic" placeholder="Código Artículo">
                            <input type="text" id="unidades" name="unidades" placeholder="Unidades">
                            <input type="date" id="fecha_ped" name="fecha_ped" placeholder="Fecha Pedido">
                        </div>
                        <div id="f_articulos">
                            <input type="text" id="cod_artic" name="cod_artic" placeholder="Código Artículo">
                            <input type="text" id="desc_artic" name="desc_artic" placeholder="Descripción">
                            <input type="text" id="precio_artic" name="precio_artic" placeholder="Precio">
                        </div>
                    </div>
                    <div class="tabla">
                        <div class="info" id="t_zonas">
                            <table>
                                <tr>
                                    <th></th>
                                    <th>Zona</th>
                                    <th>Descripción</th>
                                </tr>
                                <?php
                                while ($fila = $queryZonas->fetch()) {
                                ?>
                                    <tr>
                                        <td><input type="radio" id="radio_zona" name="radio_zona" value="<?php print $fila["zona"] ?>"></td>
                                        <td> <?php print($fila["zona"]) ?> </td>
                                        <td> <?php print($fila["descripcion"]) ?> </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="info" id="t_clientes">
                            <table>
                                <tr>
                                    <th></th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Código Postal</th>
                                    <th>Ciudad</th>
                                    <th>Teléfono</th>
                                    <th>email</th>
                                    <th>Descuento</th>
                                    <th>Zona Ventas</th>
                                </tr>
                                <?php
                                while ($fila = $queryClientes->fetch()) {
                                ?>
                                    <tr>
                                        <td><input type="radio" id="radio_clientes" name="radio_clientes" value="<?php print $fila["id"] ?>"></td>
                                        <td> <?php print($fila["id"]) ?> </td>
                                        <td> <?php print($fila["nombre"]) ?> </td>
                                        <td> <?php print($fila["direccion"]) ?> </td>
                                        <td> <?php print($fila["codpostal"]) ?> </td>
                                        <td> <?php print($fila["ciudad"]) ?> </td>
                                        <td> <?php print($fila["telefono"]) ?> </td>
                                        <td> <?php print($fila["email"]) ?> </td>
                                        <td> <?php print($fila["descuento"]) ?> </td>
                                        <td> <?php print($fila["zonaventas"]) ?> </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="info" id="t_pedidos">
                            <table>
                                <tr>
                                    <th></th>
                                    <th>Número</th>
                                    <th>Código Cliente</th>
                                    <th>Código Artículo</th>
                                    <th>Unidades</th>
                                    <th>Fecha</th>
                                </tr>
                                <?php
                                while ($fila = $queryPedidos->fetch()) {
                                ?>
                                    <tr>
                                        <td><input type="radio" id="radio_pedidos" name="radio_pedidos" value="<?php print $fila["id"] ?>"></td>
                                        <td> <?php print($fila["id"]) ?> </td>
                                        <td> <?php print($fila["cod_cliente"]) ?> </td>
                                        <td> <?php print($fila["cod_articulo"]) ?> </td>
                                        <td> <?php print($fila["unidades"]) ?> </td>
                                        <td> <?php print($fila["fecha"]) ?> </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="info" id="t_articulos">
                            <table>
                                <tr>
                                    <th></th>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                </tr>
                                <?php
                                while ($fila = $queryArticulos->fetch()) {
                                ?>
                                    <tr>
                                        <td><input type="radio" id="radio_articulos" name="radio_articulos" value="<?php print $fila["id"] ?>"></td>
                                        <td> <?php print($fila["id"]) ?> </td>
                                        <td> <?php print($fila["nombre"]) ?> </td>
                                        <td> <?php print($fila["precio"]) ?> </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </div>

    <!-- jQuery y Popper.js-->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>

</html>