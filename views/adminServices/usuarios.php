<!DOCTYPE html>
<?php require "views/templates/menu.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">GESTIÓN DE EMPLEADOS</h1>
  </div>

  <h1 class="text-center display-4" id="titulo">Agregar Empleado</h1>
  <form action="<?php echo constant("URL") ?>Empleado/nuevoEmpleado" method="POST" id="formPrincipal" enctype="multipart/form-data" class="container">
    <div class="row g-3">
      <div class="col-sm">
        <label for="nombre">
          <h6>Primer Nombre:</h6>
        </label>
        <input type="text" class="form-control" placeholder="Ingrese el primer nombre" id="nombre1" name="nombre1">
        <input type="hidden" name="codEmple" id="codigo">
      </div>
      <div class="col-sm-7">
        <label for="descripcion">
          <h6>Segundo Nombre:</h6>
        </label>
        <input type="text" class="form-control" placeholder="Ingrese el segundo nombre" id="nombre2" name="nombre2">
      </div>
    </div>
    <br>
    <div class="row g-3">
      <div class="col-sm">
        <label for="nombre">
          <h6>Apellido Paterno:</h6>
        </label>
        <input type="text" class="form-control" placeholder="Ingrese el apellido paterno" id="apellido1" name="apellido1">
        <input type="hidden" name="codigo" id="codigo">
      </div>
      <div class="col-sm-7">
        <label for="descripcion">
          <h6>Apellido Materno:</h6>
        </label>
        <input type="text" class="form-control" placeholder="Ingrese el apellido materno" id="apellido2" name="apellido2">
      </div>
    </div>
    <br>
    <div class="row g-3">
      <div class="col-sm">
        <label for="genero">
          <h6>Cargo:</h6>
        </label>
        <select class="form-select" id="cargo" name="cargo">
          <option value="Catalogador" selected>Catalogador</option>
          <option value="Administrador">Administrador</option>
        </select>
      </div>
    </div>
    <br>
    <div class="d-flex justify-content-center text-center gap-3">
      <button type="submit" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#agregarModal" id="botonEmpleado" >Agregar Empleado</button>
      <a href="<?php echo constant("URL") ?>Empleado/Show" class="btn btn-outline-danger" style="display: none;" id="cancelar">Cancelar</a>
    </div>
  </form>
  <br><br>
  <!-- Filtros -->
  <div class="row g-7">
    <div class="col-sm">
      <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre o código">
    </div>
  </div>
  <br>
  <!-- Tabla de Productos -->
  <div class="table-responsive table-container">
    <table class="table table-striped table-sm text-center">
      <thead>
        <tr>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Código Empleado</th>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Nombre y Apellido</th>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Cargo</th>
          <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Opciones</th>
        </tr>
      </thead>
      <tbody id="comprasTable">
        <?php
        foreach($this->listaEmpleados as $empleado){
        ?>
        <tr>
          <td><?php echo $empleado->getCodOperadores();?></td>
          <td><?php echo $empleado->getNombre1() . " ". $empleado->getApellido1();?></td>
          <td><?php echo $empleado->getRol();?></td>
          <td>
            <a href="#" class="hover-text mx-2" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $empleado->getCodOperadores();?>"><i class="fa-solid fa-trash fa-xl" style="color: #15181E;"></i></a>
            <a href="#" class="hover-text mx-2" onclick="modificarEmpleado('<?php echo $empleado->getCodOperadores();?>', '<?php echo $empleado->getNombre1();?>', '<?php echo $empleado->getNombre2();?>', '<?php echo $empleado->getApellido1();?>', '<?php echo $empleado->getApellido2();?>', '<?php echo $empleado->getRol();?>')"><i class="fa-solid fa-pencil fa-xl" style="color: #15181E;"></i></a>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <br>
<?php
  foreach ($this->listaEmpleados as $empleado) {
?>
<!-- Modal Eliminar-->
<div class="modal fade" id="eliminarModal<?php echo $empleado->getCodOperadores();?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Realmente deseas eliminar al empleado '<?php echo $empleado->getNombre1() . " ". $empleado->getApellido1();?>'?</p>
      </div>
      <form action="<?php echo constant("URL")?>Empleado/eliminarEmpleado" method="POST">
        <input type="hidden" name="codigo" value="<?php echo $empleado->getCodOperadores();?>">
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
</main>
<script src="<?php echo constant('URL') ?>public/js/usuarios.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo constant('URL') ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>

</html>