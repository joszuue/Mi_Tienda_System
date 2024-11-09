<!DOCTYPE html>
<?php require "views/templates/menu.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">GESTIÓN DE PRODUCTOS</h1>
  </div>

  <!-- Formulario Ingresar/Modificar producto-->
  <div class="container mt-4">
    <h1 class="display-4 text-center" id="titulo"><b>Agregar Producto</b></h1>
    <h6><?php echo $this->success ?></h6>
    <br>
    <form action="<?php echo constant("URL") ?>Producto/nuevoProducto" method="POST" id="formPrincipal" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-sm">
          <label for="nombre">
            <h6>Nombre:</h6>
          </label>
          <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" id="nombre" name="nombre">
          <input type="hidden" name="codigo" id="codigo">
          <input type="hidden" name="codOferta" id="codOferta">
        </div>
        <div class="col-sm-7">
          <label for="descripcion">
            <h6>Descripción:</h6>
          </label>
          <input type="text" class="form-control" placeholder="Ingrese una descripción" id="descripcion" name="descripcion">
        </div>
        <div class="col-sm">
          <label for="precio">
            <h6>Precio:</h6>
          </label>
          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" id="precio" placeholder="0.00" name="precio">
          </div>
        </div>
      </div>
      <br>
      <div class="row g-3">
        <div class="col-sm">
          <label for="genero">
            <h6>Producto para:</h6>
          </label>
          <select class="form-select" id="genero" name="sexo">
            <option value="Mujer" selected>Mujer</option>
            <option value="Hombre">Hombre</option>
            <option value="Unisex">Unisex</option>
          </select>
        </div>
        <div class="col-sm-7" id="img-class">
          <label for="input-imagen">
            <h6>Seleccionar imagen:</h6>
          </label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="input-imagen" accept="image/*" name="imagen">
          </div>
        </div>
        <div class="col-sm">
          <label for="stock">
            <h6>Stock:</h6>
          </label>
          <input type="number" class="form-control" placeholder="Ingrese el stock" id="stock" name="stock">
        </div>
      </div>
      <br>
      <div class="row g-3">
        <div class="col-sm">
          <label for="categoria">
            <h6>Categoría:</h6>
          </label>
          <select class="form-select" id="categoria" name="codCategoria">
            <?php
            foreach ($this->listaCategorias as $lista) {
            ?>
              <option value="<?php echo $lista->getCodCategoria(); ?>"><?php echo $lista->getNombre(); ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="col-sm">
          <label for="estado">
            <h6>Estado del producto:</h6>
          </label>
          <select class="form-select" id="estado" name="estado">
            <option value="No mostrar" selected>No mostrar</option>
            <option value="Mostrar">Mostrar</option>
          </select>
        </div>
        <div class="col-sm">
          <label for="oferta">
            <h6>Producto en oferta:</h6>
          </label>
          <select class="form-select" id="oferta" onchange="toggleOfertaPrecio()" name="oferta">
            <option value="No" selected>No</option>
            <option value="Sí">Sí</option>
          </select>
        </div>
      </div>
      <br>
      <div class="row g-3" style="display: none;" id="formOferta">
        <div class="col-sm">
          <label for="precioOferta">
            <h6>Precio de oferta:</h6>
          </label>
          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" id="precioOferta" placeholder="0.00" name="nuevoPrecio">
          </div>
        </div>

        <div class="col-sm">
          <label for="startDate">
            <h6>Fecha y hora de inicio:</h6>
          </label>
          <div class="input-group mb-3">
            <input type="datetime-local" id="startDate" class="form-control" placeholder="Fecha de inicio" name="fechaInicio">
          </div>
        </div>

        <div class="col-sm">
          <label for="endDate">
            <h6>Fecha y hora de Fin:</h6>
          </label>
          <div class="input-group mb-3">
            <input type="datetime-local" id="endDate" class="form-control" placeholder="Fecha de fin" name="fechaFin">
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center text-center gap-3">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#agregarModal" id="botonProducto" onclick="mostrarValor()">Agregar Nuevo Producto</button>
        <a href="<?php echo constant("URL")?>Producto/Show" class="btn btn-outline-danger" style="display: none;" id="cancelar">Cancelar</a>
      </div>
    </form>
  </div>
  <br>
  <hr class="my-4">
  <h1 class="display-4 text-center"><b>Listado de Productos</b></h1>
  <button type="button" class="btn btn-outline-dark float-end" data-bs-toggle="modal" data-bs-target="#imagenesModal">Agregar Más Imágenes</button>
  <br><br><br>

  <!-- Buscador y Filtro-->
  <div class="row g-7">
    <div class="col-sm">
      <input class="form-control mb-4" id="searchInput" type="text" placeholder="Buscar por código, nombre, categoria y estado. ">
    </div>
    <div class="col-sm-3">
      <select class="form-select" id="filterSelect">
        <option value="" selected>Todos los productos</option>
        <option value="" disabled>Estados...</option>
        <option value="Mostrar">Mostrar</option>
        <option value="No mostrar">No mostrar</option>
        <option value="" disabled>Categorias...</option>
        <?php
          foreach ($this->listaCategoriasRelacionadas as $cateR) {
        ?>
          <option value="<?php echo $cateR->getNombre(); ?>"><?php echo $cateR->getNombre(); ?></option>
        <?php
         }
        ?>
      </select>
    </div>
  </div>
  <br>
  <!-- Tabla de Productos -->
  
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    
    <?php
    foreach ($this->listaProductos as $listaP) {
    ?>
      <div class="col" data-cate="<?php echo $listaP->getCategoria()->getNombre(); ?>" data-name="<?php echo $listaP->getNombre(); ?>" data-status="<?php echo $listaP->getEstado(); ?>" data-cod="<?php echo $listaP->getCodProducto(); ?>">
        <div class="card">
          <div id="carousel<?php echo $listaP->getCodProducto(); ?>" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
              <?php
              $cont = 0;
              $coincidencias = false; // Variable para comprobar si hubo coincidencias

              foreach ($this->listaImagenes as $listaI) {
                if ($listaP->getCodProducto() == $listaI->getCodProducto()) {
                  $coincidencias = true; // Se encontró una coincidencia
              ?>
              <style>


              </style>
                  <div class="carousel-item <?php echo ($cont === 0) ? "active" : "" ?>">
                    <img src="<?php echo constant("URL_IMG") . $listaI->getImagen() ?>" class="d-block w-100 card-img-top" alt="..." width="200px">
                    <form action="<?php echo constant("URL") ?>Imagen/deleteImagen" method="POST">
                    <input type="hidden" value="<?php echo $listaI->getIdImagen() ?>" name="idImagen">
                    <input type="hidden" value="<?php echo "public/imgProductos/" . $listaI->getImagen() ?>" name="nombreImagen">
                    <input type="submit" class="btn btn-outline-danger eliminar-btn" value="Eliminar Imagen">
                    </form>
                  </div>
                <?php
                  $cont++;
                }
              }
              // Si no hubo coincidencias, mostrar no_foto
              if (!$coincidencias) {
                $cont++;
                ?>
                <div class="carousel-item active">
                  <img src="<?php echo constant("URL_IMG") . "no_foto.png" ?>" class="d-block w-100 card-img-top" alt="..." width="200px">
                </div>
              <?php
              }
              ?>
            </div>

            <?php
              if($cont != 1){
                ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $listaP->getCodProducto(); ?>" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $listaP->getCodProducto(); ?>" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                <?php
              }
            ?>
          </div>
          <div class="card-body">
            <h5 class="card-title text-center"><b><?php echo $listaP->getNombre(); ?></b></h5>
            <p class="card-text"><?php echo $listaP->getDescripcion(); ?></p>
            <h6><b>Estado:</b> <span class="badge  <?php echo ($listaP->getEstado() == 'Mostrar') ? 'bg-success' : 'bg-warning'; ?>"><?php echo $listaP->getEstado(); ?></span></h6>
            <div class="row">
              <div class="col">
                <h6><b>Código:</b> <?php echo $listaP->getCodProducto(); ?></h6>
              </div>
              <div class="col">
                <h6><b>Categoria:</b> <?php echo $listaP->getCategoria()->getNombre(); ?></h6>
              </div>
            </div>
            <br>
            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Eliminar Producto">
              <a href="#" class="hover-text mx-2" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $listaP->getCodProducto(); ?>"><i class="fa-solid fa-trash fa-xl" style="color: #15181E;"></i></a>
            </span>
            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Modificar Producto">
              <a href="#" class="hover-text mx-2" onclick="modificarProducto('<?php echo $listaP->getCodProducto(); ?>','<?php echo $listaP->getNombre(); ?>','<?php echo $listaP->getDescripcion(); ?>',<?php echo $listaP->getPrecio(); ?>,'<?php echo $listaP->getSexo(); ?>',<?php echo $listaP->getStock(); ?>,'<?php echo $listaP->getCategoria()->getCodCategoria(); ?>','<?php echo $listaP->getEstado(); ?>','<?php echo $listaP->getOferta()->getPrecioOferta() . '/'. $listaP->getOferta()->getFechaFin() . '/' . $listaP->getOferta()->getFechaInicio().'/'.$listaP->getOferta()->getCodOferta()?>')"><i class="fa-solid fa-pencil fa-xl" style="color: #15181E;"></i></a>
            </span>
            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Ver detalles del producto">
              <a href="#" class="hover-text mx-2" data-bs-toggle="modal" data-bs-target="#detallesModal<?php echo $listaP->getCodProducto(); ?>"><i class="fa-solid fa-eye fa-xl" style="color: #15181E;"></i></a>
            </span>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</main>
<!-- Modal Productos-->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación de productoss</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
          <h6>A continuación se muestra los detalles del nuevo producto:</h6><br>
          <h6><b>Nombre: </b> <span id="nombreEP"></span></h6>
          <h6><b>Descripción: </b> <span id="descri"></span></h6>
          <h6><b>Precio: </b> $<span id="preciop"></span></h6>
          <h6><b>Producto para: </b> <span id="tipo"></span></h6>
          <h6><b>Stock: </b> <span id="stockp"></span></h6>
          <h6><b>Categoria: </b> <span id="cate"></span></h6>
          <h6><b>Estado del producto: </b> <span id="esta"></span></h6>
          <h6><b>Oferta: </b> <span id="ofer"></span></h6>
          <h6><b>Precio de oferta: </b> $<span id="oferPre"></span></h6>
          <h6><b>Imagen:</b></h6>
          <div id="contenedor-miniatura">
            <img id="miniatura" class="miniatura" src="#" alt="Miniatura de imagen" width="245px" height="345px">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="confirmarIngreso">Confirmar ingreso de producto</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Imagenes-->
<div class="modal fade" id="imagenesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Imagenes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo constant("URL") ?>Imagen/agregarImagen" method="POST" id="formPrincipal" enctype="multipart/form-data">
        <div class="modal-body">
          <label for="input-imagen">
            <h6>Imagen:</h6>
          </label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="input-imagen" accept="image/*" name="imagen">
          </div>
          <label for="codProducto">
            <h6>Seleccione el producto al que pertenecerán las imagenes:</h6>
          </label>
          <select class="form-select" id="codProducto" name="codProdu" onchange="mostrarValorSeleccionado()">
            <option value="" disabled selected>Seleccione un código</option>
            <?php
            foreach ($this->listaCodProductos as $listaC) {
            ?>
            <option value="<?php echo $listaC->getCodProducto(); ?>" ><?php echo $listaC->getCodProducto(); ?> - <?php echo $listaC->getNombre(); ?></option>
            <?php
            }
            ?>
          </select>
          <script>
            function mostrarValorSeleccionado() {
              const select = document.getElementById("codProducto");
              const valorSeleccionado = select.value;
              document.getElementById("valorSeleccionado").textContent = valorSeleccionado;
            }
          </script>
          <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Imagenes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  foreach ($this->listaProductos as $listaP) {
?>
  <!-- Modal Eliminar-->
  <div class="modal fade" id="eliminarModal<?php echo $listaP->getCodProducto(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>¿Realmente deseas eliminar el producto '<?php echo $listaP->getNombre(); ?>'?</p>
        </div>
        <form action="<?php echo constant("URL") ?>Producto/eliminarProducto" method="POST">
          <input type="hidden" name="codigo" value="<?php echo $listaP->getCodProducto(); ?>">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Detalles-->
  <div class="modal fade" id="detallesModal<?php echo $listaP->getCodProducto(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalles del producto: <?php echo $listaP->getNombre(); ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="">
          <div class="modal-body">
            <h6><b>Nombre: </b><?php echo $listaP->getNombre(); ?></h6>
            <h6><b>Descripción: </b><?php echo $listaP->getDescripcion(); ?></h6>
            <h6><b>Precio: </b> $<?php echo $listaP->getPrecio(); ?></h6>
            <h6><b>Producto para: </b><?php echo $listaP->getSexo(); ?></h6>
            <h6><b>Stock: </b><?php echo $listaP->getStock(); ?></h6>
            <h6><b>Categoria: </b><?php echo $listaP->getCategoria()->getNombre(); ?></h6>
            <h6><b>Estado del producto: </b><?php echo $listaP->getEstado(); ?></h6>
            <h6><b>Oferta: </b> <?php echo ($listaP->getOferta()->getPrecioOferta() != 0) ? "Sí" : "No"; ?></h6>
            <?php
            if($listaP->getOferta()->getPrecioOferta() != 0){
              ?>
                <h6><b>Precio de oferta: </b> $<?php echo $listaP->getOferta()->getPrecioOferta(); ?></h6>
                <h6><b>Fecha de creación de la oferta: </b> <?php echo $listaP->getOferta()->getFechaCreacion(); ?></h6>
                <h6><b>Fecha de inicio: </b> <?php echo $listaP->getOferta()->getFechaInicio(); ?></h6>
                <h6><b>Fecha de fin: </b> <?php echo $listaP->getOferta()->getFechaFin(); ?></h6>
              <?php
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php
  }
?>
<script src="<?php echo constant('URL') ?>public/js/productos.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo constant('URL') ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>

</html>