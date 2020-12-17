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
    $("#ident").val(1);
    $("#formulario").submit();
}

function actualizar(tabla) {
    $("#ident").val(2);
    $("#formulario").submit();
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