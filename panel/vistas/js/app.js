var tabla = document.querySelector('#dataTable');
var dataTable = new DataTable(tabla, {
    // Cantidad de registros a mostrar
    perPage: 5,
    perPageSelect: [5, 15, 30, 45],
    labels: {
        placeholder: "Buscar...",
        perPage: "{select} registros por página",
        noRows: "No se encontraron registros",
        info: "Mostrando {start} a {end} de {rows} registros",
    }
});