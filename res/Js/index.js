window.onload = function () { //Funciones a cargar después de la carga de la página
    cargarBotones();
    mostrarTabla();
}

function cargarBotones() {
    id("b_crear").addEventListener("click", crear);
    id("b_actualizar").addEventListener("click", actualizar);
    id("b_borrar").addEventListener("click", borrar);
    id("b_Tzonas").addEventListener("click", mostrarTabla);
    id("b_Tclientes").addEventListener("click", mostrarTabla);
    id("b_Tpedidos").addEventListener("click", mostrarTabla);
    id("b_Tarticulos").addEventListener("click", mostrarTabla);
}

function mostrarTabla() {
    if (id("b_Tzonas").checked) mostrarTablaZonas();
    if (id("b_Tclientes").checked) mostrarTablaClientes();
    if (id("b_Tpedidos").checked) mostrarTablaPedidos();
    if (id("b_Tarticulos").checked) mostrarTablaArticulos();
}

function mostrarTablaZonas() {
    ocultarTablas();
    mostrarTablas(1);
}

function mostrarTablaClientes() {
    ocultarTablas();
    mostrarTablas(2);
}

function mostrarTablaPedidos() {
    ocultarTablas();
    mostrarTablas(3);
}

function mostrarTablaArticulos() {
    ocultarTablas();
    mostrarTablas(4);
}

function mostrarTablas(tabla) {
    let tZonas = id("t_zonas");
    let tClientes = id("t_clientes");
    let tArticulos = id("t_articulos");
    let tPedidos = id("t_pedidos");
    let fZonas = id("f_zonas");
    let fClientes = id("f_clientes");
    let fArticulos = id("f_articulos");
    let fPedidos = id("f_pedidos");
    switch (tabla) {
        case 1:
            tZonas.style.display = 'block';
            fZonas.style.display = 'block';
            break;
        case 2:
            tClientes.style.display = 'block';
            fClientes.style.display = 'block';
            break;
        case 3:
            tPedidos.style.display = 'block';
            fPedidos.style.display = 'block';
            break;
        case 4:
            tArticulos.style.display = 'block';
            fArticulos.style.display = 'block';
            break;
    }
}

function ocultarTablas() {
    let tZonas = id("t_zonas");
    let tClientes = id("t_clientes");
    let tArticulos = id("t_articulos");
    let tPedidos = id("t_pedidos");
    let fZonas = id("f_zonas");
    let fClientes = id("f_clientes");
    let fArticulos = id("f_articulos");
    let fPedidos = id("f_pedidos");

    tZonas.style.display = 'none';
    fZonas.style.display = 'none';
    tClientes.style.display = 'none';
    fClientes.style.display = 'none';
    tArticulos.style.display = 'none';
    fArticulos.style.display = 'none';
    tPedidos.style.display = 'none';
    fPedidos.style.display = 'none';
}

function comprobarCampos() {
    let a = document.forms["formulario"]["id_zonas"].value;
    let b = document.forms["formulario"]["desc_zonas"].value;

    let c = document.forms["formulario"]["cod_clien"].value;
    let d = document.forms["formulario"]["nombre_clien"].value;
    let e = document.forms["formulario"]["dir_clien"].value;
    let f = document.forms["formulario"]["postal_clien"].value;
    let g = document.forms["formulario"]["ciudad_clien"].value;
    let h = document.forms["formulario"]["tel_clien"].value;
    let i = document.forms["formulario"]["email_clien"].value;
    let j = document.forms["formulario"]["desc_clien"].value;
    let k = document.forms["formulario"]["zonaV_clien"].value;

    let l = document.forms["formulario"]["num_ped"].value;
    let m = document.forms["formulario"]["num_clien"].value;
    let o = document.forms["formulario"]["num_artic"].value;
    let p = document.forms["formulario"]["unidades"].value;
    let q = document.forms["formulario"]["fecha_ped"].value;

    let r = document.forms["formulario"]["cod_artic"].value;
    let s = document.forms["formulario"]["desc_artic"].value;
    let t = document.forms["formulario"]["precio_artic"].value;
    switch (comprobarcheck()) {
        case 1:
            if (a == null || a == "" || b == null || b == "") return false;
            break;
        case 2:
            if (c == null || c == "" || d == null || d == "" || e == null || e == "" || f == null || f == "" ||
                g == null || g == "" || h == null || h == "" || i == null || i == "" || j == null || j == "" || k == null || k == "") return false;
            break;
        case 3:
            if (l == null || l == "" || m == null || m == "" || o == null || o == "" || p == null || p == "" || q == null || q == "") return false;
            break;
        case 4:
            if (r == null || r == "" || s == null || s == "" || t == null || t == "") return false;
            break;
    }
    return true;
}

function comprobarcheck() {
    let t_zonas = id("b_Tzonas");
    let t_clientes = id("b_Tclientes");
    let t_pedidos = id("b_Tpedidos");
    let t_articulos = id("b_Tarticulos");
    if (t_zonas.checked) {
        return 1;
    } else if (t_clientes.checked) {
        return 2;
    } else if (t_pedidos.checked) {
        return 3;
    } else if (t_articulos.checked) {
        return 4;
    }
}


function crear(tabla) {
    if (comprobarCampos()) {
        $("#ident").val(1);
        $("#formulario").submit();
    } else alert("Debe llenar todos los campos");
}

function actualizar(tabla) {
    if (comprobarCampos()) {
        $("#ident").val(2);
        $("#formulario").submit();
    } else alert("Debe llenar todos los campos");
}

function borrar(tabla) {
    $("#ident").val(3);
    $("#formulario").submit();
}

//Funciones miscelaneas

function id(ident) {
    return document.getElementById(ident);
}

function cambiarTexto(ident, mensaje) {
    id(ident).innerHTML = mensaje;
}