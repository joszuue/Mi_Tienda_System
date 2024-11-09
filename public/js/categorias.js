//Envia todos los datos al formulario para modificar
document.getElementById('confirmarIngreso').addEventListener('click', function() {
    document.getElementById('formPrincipal').submit();
});

//Envia todos los datos al formulario para modificar
function modificarCategoria(nombre, descripcion, codigo){
    document.getElementById('titulo').innerHTML = "<b>Modificar Categoria</b>";
    document.getElementById('textModal').innerText = "A continuación se muestra los detalles a modificar de la categoria:";
    document.getElementById('confirmarIngreso').innerText = "Confirmar modificación de la categoria";
    document.getElementById('nombre').value = nombre;
    document.getElementById('descripcion').value = descripcion;
    document.getElementById('codigo').value = codigo;
    document.getElementById('boton').innerText = "Modificar Categoria"; // Reemplaza el texto del botón
    document.getElementById('formPrincipal').action = window.location.href.split('/Show')[0] + "/modificarCategoria";
    document.getElementById('cancelar').style.display = 'block';
}

//Muestra los datos de confirmación en el modal
function mostrarValor() {
    document.getElementById('nombreEP').innerText = document.getElementById('nombre').value;
    document.getElementById('descri').innerText = document.getElementById('descripcion').value;
};

//Envia el formulario si la confirmacion es afirmativa
document.getElementById('confirmarIngreso').addEventListener('click', function() {
    document.getElementById('formPrincipal').submit();
});


function normalizeText(text) {
    return text.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toUpperCase();
}

// Buscador y filtro
document.getElementById('searchInput').addEventListener('keyup', filterTable);
document.getElementById('filterSelect').addEventListener('change', filterTable);

function filterTable() {
    var input, select, filter, selectFilter, table, tr, td, i, j, txtValue;
    input = document.getElementById('searchInput');
    select = document.getElementById('filterSelect');
    filter = normalizeText(input.value);
    selectFilter = select.value;
    table = document.getElementById('cateTable');
    tr = table.getElementsByTagName('tr');

    for (i = 0; i < tr.length; i++) {
        tr[i].style.display = "none";
        td = tr[i].getElementsByTagName('td');
        var matchesSearch = false;
        var matchesFilter = false;

        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = normalizeText(td[j].textContent || td[j].innerText);
                if (txtValue.indexOf(filter) > -1 || filter === "") {
                    matchesSearch = true;
                }
            }
        }

        var totalProductos = parseInt(td[3].textContent || td[3].innerText, 10);
        if (selectFilter === "" || 
            (selectFilter === "mayor" && totalProductos > 0) || 
            (selectFilter === "igual" && totalProductos === 0)) {
            matchesFilter = true;
        }

        if (matchesSearch && matchesFilter) {
            tr[i].style.display = "";
        }
    }
}

