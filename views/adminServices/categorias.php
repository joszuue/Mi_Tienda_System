<!DOCTYPE html>
<?php require "views/templates/menu.php"; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">GESTIÓN DE CATEGORIAS</h1>
  </div>

  <!-- Formulario Ingresar/Modificar producto-->
  <div class="container mt-4">
    <h1 class="display-4 text-center" id="titulo"><b>Agregar Categoria</b></h1>
    <br>
    <form action="<?php echo constant("URL")?>Categoria/nuevaCategoria" method="POST" id="formPrincipal">
      <div class="row g-7">
        <div class="col-sm">
          <label for="nombre">
            <h6>Nombre:</h6>
          </label>
          <input type="hidden" name="codigo" id="codigo">
          <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" id="nombre" name="nombre">
        </div>
      </div>
      <br>
      <div class="row g-7">
        <div class="col-sm">
          <label for="descripcion">
            <h6>Descripción:</h6>
          </label>
          <input type="text" class="form-control" placeholder="Ingrese una descripción" id="descripcion" name="descripcion">
        </div>
      </div>
      <br><br>
      <div class="d-flex justify-content-center text-center gap-3">
        <button type="button" class="btn btn-outline-primary" id="boton" data-bs-toggle="modal" data-bs-target="#agregarModal" onclick="mostrarValor()">Agregar Nueva Categoria</button>
        <a href="<?php echo constant("URL")?>Categoria/Show" class="btn btn-outline-danger" style="display: none;" id="cancelar">Cancelar</a>
      </div>
    </form>
  </div>
  <br>
  <hr class="my-4">
  <h1 class="display-4 text-center"><b>Lista de Categorias</b></h1>
  <br><br>

  <!-- Buscador y filtros-->
  <div class="row g-7">
    <div class="col-sm">
      <input class="form-control mb-4" id="searchInput" type="text" placeholder="Buscar en la tabla...">
    </div>
    <div class="col-sm-3">
      <select class="form-select" id="filterSelect">
        <option value="">Todas las categorías</option>
        <option value="mayor">Tienen productos asociados</option>
        <option value="igual">No tienen productos asociados</option>
      </select>
    </div>
  </div>
  <br>
  <!-- Tabla de Productos -->
  <div class="table-responsive table-container">
    <table class="table table-striped table-sm text-center">
      <thead>
        <tr>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Código <?php echo $this->success;?></th>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Nombre</th>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Descripción</th>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Total de productos</th>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Opciones</th>
        </tr>
      </thead>
      <tbody id="cateTable">
        <?php 
          foreach ($this->listaCategorias as $lista) {
        ?>
        <tr>
          <td><?php echo $lista->getCodCategoria(); ?></td>
          <td><?php echo $lista->getNombre(); ?></td>
          <td><?php echo $lista->getDescripcion(); ?></td>
          <td><?php echo $lista->getCantidadProductos(); ?></td>
          <td>
            <a href="#" class="hover-text mx-2" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $lista->getCodCategoria(); ?>"><i class="fa-solid fa-trash fa-xl" style="color: #15181E;"></i></a>
            <a href="#" class="hover-text mx-2" onclick="modificarCategoria('<?php echo $lista->getNombre(); ?>', '<?php echo $lista->getDescripcion(); ?>', '<?php echo $lista->getCodCategoria(); ?>')"><i class="fa-solid fa-pencil fa-xl" style="color: #15181E;"></i></a>
          </td>
        </tr>
        <?php
         }
        ?>
      </tbody>
    </table>
  </div>
</main>

<!-- Modal Categorias-->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación de categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <input type="hidden" name="nombre" value="">
        <div class="modal-body">
          <h6 id="textModal">A continuación se muestra los detalles de la nueva categoria:</h6><br>
          <h6><b>Nombre: </b> <span id="nombreEP"></span></h6>
          <h6><b>Descripción: </b> <span id="descri"></span></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="confirmarIngreso">Confirmar ingreso de categoria</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
    foreach ($this->listaCategorias as $lista) {
?>

<!-- Modal Eliminar-->
<div class="modal fade" id="eliminarModal<?php echo $lista->getCodCategoria(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Realmente deseas eliminar la categoria '<?php echo $lista->getNombre(); ?>'?</p>
      </div>
      <form action="<?php echo constant("URL")?>Categoria/eliminarCategoria" method="POST">
        <input type="hidden" name="codigo" value="<?php echo $lista->getCodCategoria(); ?>">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  }
?>
<script src="<?php echo constant('URL') ?>public/js/categorias.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo constant('URL') ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script>
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
</script>
</body>

</html>