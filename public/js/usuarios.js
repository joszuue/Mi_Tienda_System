document.getElementById('searchInput').addEventListener('keyup', function() {
  const filter = this.value.toLowerCase();
  const rows = document.querySelectorAll('#comprasTable tr');
  
  rows.forEach(row => {
    const codigo = row.cells[0].textContent.toLowerCase();
    const nombre = row.cells[1].textContent.toLowerCase();
    const compras = row.cells[2].textContent.toLowerCase();
    if (codigo.includes(filter) || nombre.includes(filter) || compras.includes(filter)) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
});

//Envia todos los datos al formulario para modificar
function modificarEmpleado(codigo, nombre1, nombre2, apellido1, apellido2, cargo){
  document.getElementById('titulo').innerHTML = "<b>Modificar Empleado</b>";
  document.getElementById('codigo').value = codigo;
  document.getElementById('nombre1').value = nombre1;
  document.getElementById('nombre2').value = nombre2;
  document.getElementById('apellido1').value = apellido1;
  document.getElementById('apellido2').value = apellido2;
  document.getElementById('cargo').value = cargo;
  document.getElementById('botonEmpleado').innerText = "Modificar Empleado"; // Reemplaza el texto del botón
  document.getElementById('formPrincipal').action = window.location.href.split('/Show')[0] + "/modificarEmpleado";
  document.getElementById('cancelar').style.display = 'block';
}