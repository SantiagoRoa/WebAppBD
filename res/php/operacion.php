<?php

$BD = new PDO('sqlite:../db/tienda.db');

print_r($_POST);

if ($_POST["ident"] == 1) { //Crear
    switch ($_POST["b_tablas"]) {
        case "zonas":
            $sql = "INSERT INTO 'tbl_zonas' (zona, descripcion)
            VALUES ('" . $_POST['id_zonas'] . "', '" . $_POST['desc_zonas'] . "');";
            break;
        case "clientes":
            $sql = "INSERT INTO 'tbl_clientes' (id, nombre, direccion, codpostal, ciudad, telefono, email, descuento, zonaventas)
                VALUES ('" . $_POST['cod_clien'] . "', '" . $_POST['nombre_clien'] . "', '" . $_POST['dir_clien'] . "', '" . $_POST['postal_clien'] . "', '" . $_POST['ciudad_clien'] . "', '" . $_POST['tel_clien'] . "', '" . $_POST['email_clien'] . "', '" . $_POST['desc_clien'] . "', '" . $_POST['zonaV_clien'] . "');";
            break;
        case "pedidos":
            $sql = "INSERT INTO 'tbl_pedidos' (id, cod_cliente, cod_articulo, fecha, unidades)
            VALUES ('" . $_POST['num_ped'] . "', '" . $_POST['num_clien'] . "', '" . $_POST['num_artic'] . "', '" . $_POST['fecha_ped'] . "', '" . $_POST['unidades'] . "');";
            break;
        case "articulos":
            $sql = "INSERT INTO 'tbl_articulos' (id, nombre, precio)
           VALUES ('" . $_POST['cod_artic'] . "', '" . $_POST['desc_artic'] . "', '" . $_POST['precio_artic'] . "');";
            break;
        default:
            break;
    }
    $query = $BD->prepare($sql);
    $query->execute();
} else if ($_POST["ident"] == 2) { //Actualizar
    switch ($_POST["b_tablas"]) {
        case "zonas":
            $sql = "UPDATE 'tbl_zonas' SET zona='" . $_POST["id_zonas"] . "', descripcion ='" . $_POST["desc_zonas"] . "' WHERE zona=" . $_POST["radio_zona"];
            break;
        case "clientes":
            $sql = "UPDATE 'tbl_clientes' SET id='" . $_POST["cod_clien"] . "', nombre ='" . $_POST["nombre_clien"] . "', direccion ='" . $_POST["dir_clien"] . "', codpostal ='" . $_POST["postal_clien"] . "', ciudad ='" . $_POST["ciudad_clien"] . "', telefono ='" . $_POST["tel_clien"] . "', email ='" . $_POST["email_clien"] . "', descuento ='" . $_POST["desc_clien"] . "', zonaventas ='" . $_POST["zonaV_clien"] . "' WHERE id=" . $_POST["radio_clientes"];
            break;
        case "pedidos":
            $sql = "UPDATE 'tbl_pedidos' SET id='" . $_POST["num_ped"] . "', cod_cliente ='" . $_POST["num_clien"] . "', cod_articulo ='" . $_POST["num_artic"] . "', fecha ='" . $_POST["fecha_ped"] . "', unidades ='" . $_POST["unidades"] . "' WHERE id=" . $_POST["radio_pedidos"];
            break;
        case "articulos":
            $sql = "UPDATE 'tbl_articulos' SET id='" . $_POST["cod_artic"] . "', nombre ='" . $_POST["desc_artic"] . "', precio ='" . $_POST["precio_artic"] . "' WHERE id=" . $_POST["radio_articulos"];
            break;
        default:
            break;
    }
    $query = $BD->prepare($sql);
    $query->execute();
} else if ($_POST["ident"] == 3) { //Borrar
    switch ($_POST["b_tablas"]) {
        case "zonas":
            $sql = "DELETE FROM 'tbl_zonas' WHERE zona=" . $_POST["radio_zona"];
            break;
        case "clientes":
            $sql = "DELETE FROM 'tbl_clientes' WHERE id=" . $_POST["radio_clientes"];
            break;
        case "pedidos":
            $sql = "DELETE FROM 'tbl_pedidos' WHERE id=" . $_POST["radio_pedidos"];
            break;
        case "articulos":
            $sql = "DELETE FROM 'tbl_articulos' WHERE id=" . $_POST["radio_articulos"];
            break;
        default:
            break;
    }
    $query = $BD->prepare($sql);
    $query->execute();
}

header('Location: http://localhost/webappbd/index.php');
