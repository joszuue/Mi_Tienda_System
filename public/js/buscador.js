
//Captura de evento del buscador
document.getElementById('searchInput').addEventListener('keyup', function() {
    filterTable();
});

//Captura del evento del filtro
document.getElementById('filterSelect').addEventListener('change', function() {
    filterTable();
});

//normalizar el texto para que no se tomen en cuenta las tildes y los acentos diacríticos
function normalizeText(text) {
    return text.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toUpperCase();
}

function filterTable() {
    // Declarando variables
    var input, select, filter, selectFilter, table, tr, td, i, j, txtValue;

    // Captura los valores
    input = document.getElementById('searchInput');
    select = document.getElementById('filterSelect');
    filter = normalizeText(input.value);
    selectFilter = normalizeText(select.value);
    table = document.getElementById('productTable');
    tr = table.getElementsByTagName('tr');

    // Recorre todas las filas de la tabla (tr)
    for (i = 0; i < tr.length; i++) {
        // Asegúrate de que las filas que no contienen `td` sean omitidas
        if (tr[i].getElementsByTagName('td').length === 0) continue;

        td = tr[i].getElementsByTagName('td');
        var matchesSearch = false;
        var matchesFilter = false;

        // Verifica si la fila cumple con el filtro de texto y el filtro de selección
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = normalizeText(td[j].textContent || td[j].innerText);

                // Verifica el filtro de búsqueda de texto
                if (txtValue.indexOf(filter) > -1 || filter === "") {
                    matchesSearch = true;
                }

                // Verifica el filtro de selección de categoría en las columnas 2 y 3
                if (j === 2 || j === 3) {
                    if (selectFilter === "" || normalizeText(td[j].textContent).indexOf(selectFilter) > -1) {
                        matchesFilter = true;
                    }
                }
            }
        }

        // Determina si la fila debe ser visible
        if (matchesSearch && matchesFilter) {
            tr[i].style.display = "";  // Muestra la fila si cumple ambos criterios
        } else {
            tr[i].style.display = "none";  // Oculta la fila si no cumple
        }
    }
}


