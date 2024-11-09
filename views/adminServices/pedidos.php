<!DOCTYPE html>
<?php require "views/templates/menu.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">GESTIÓN DE PEDIDOS</h1>
  </div>

  <div class="row g-7">
    <div class="col-sm">
      <label for="searchInput"> </label>
      <input type="text" id="searchInput" class="form-control" placeholder="Buscar por código de cliente, orden o estado">
    </div>
    <div class="col-sm-3">
      <label for="filterSelect"> </label>
      <select class="form-select" id="filterSelect">
        <option value="" disabled selected>Filtrar por estado</option>
        <option value="">Todos los pedidos</option>
        <option value="Pendiente">Pendientes</option>
        <option value="Confirmado">Confirmados</option>
        <option value="Procesado">Procesados</option>
        <option value="Enviado">Enviados</option>
        <option value="Entregado">Entregados</option>
      </select>
    </div>
  </div>
  <br>
  <div class="row g-7">
    <div class="col-sm-2">
      <label for="startDate">Fecha de inicio</label>
      <input type="datetime-local" id="startDate" class="form-control" placeholder="Fecha de inicio">
    </div>
    <div class="col-sm-2">
      <label for="endDate">Fecha de fin</label>
      <input type="datetime-local" id="endDate" class="form-control" placeholder="Fecha de fin">
    </div>
    <div class="col-sm-2">
      <br>
      <button id="resetButton" class="btn btn-secondary">Reinciar Filtros</button>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-sm-4" data-order="ORDEN201" data-customer="Denis Vásquez" data-status="Pendiente" data-date="2024-01-15 11:14" data-cod="CLI001">
      <div class="card mb-3">
        <div class="card-body">
          <h2 class="card-title text-center">ORDEN201</h2>
          <h6 class="card-text"><b>Fecha de pedido: </b><span>2024-01-15 11:14:02</span></h6>
          <h6 class="card-text"><b>Cliente: </b><span>Denis Vásquez</span></h6>
          <h6 class="card-text"><b>Código de Cliente: </b><span>CLI001</span></h6>
          <h6 class="card-text"><b>Estado: </b><span class="badge bg-info text-dark">Pendiente</span></h6>
          <form action="" method="post">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Lista de Productos
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Fecha de entrega</label>
            </div>
            <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmarModal">Asignar fecha</button></center>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-4" data-order="ORDEN202" data-customer="Denis Rodriguez" data-status="Pendiente" data-date="2024-02-15 11:14" data-cod="CLI002">
      <div class="card mb-3">
        <div class="card-body">
          <h2 class="card-title text-center">ORDEN202</h2>
          <h6 class="card-text"><b>Fecha de pedido: </b><span>2024-02-15 11:14:00</span></h6>
          <h6 class="card-text"><b>Cliente: </b><span>Denis Rodriguez</span></h6>
          <h6 class="card-text"><b>Código de Cliente: </b><span>CLI002</span></h6>
          <h6 class="card-text"><b>Estado: </b><span class="badge bg-info text-dark">Pendiente</span></h6>
          <form action="" method="post">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Lista de Productos
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Fecha de entrega</label>
            </div>
            <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmarModal">Asignar fecha</button></center>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-4" data-order="ORDEN203" data-customer="Josue Vásquez" data-status="Procesado" data-date="2024-03-15 11:14" data-cod="CLI003">
      <div class="card mb-3">
        <div class="card-body">
          <h2 class="card-title text-center">ORDEN203</h2>
          <h6 class="card-text"><b>Fecha de pedido: </b><span>2024-03-15 11:14:00</span></h6>
          <h6 class="card-text"><b>Cliente: </b><span>Josue Vásquez</span></h6>
          <h6 class="card-text"><b>Código de Cliente: </b><span>CLI003</span></h6>
          <h6 class="card-text"><b>Estado: </b><span class="badge bg-info text-dark">Pendiente</span></h6>
          <form action="" method="post">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Lista de Productos
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Fecha de entrega</label>
            </div>
            <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmarModal">Asignar fecha</button></center>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-4" data-order="ORDEN204" data-customer="Josué Rodríguez" data-status="Enviado" data-date="2024-04-15 11:14" data-cod="CLI004">
      <div class="card mb-3">
        <div class="card-body">
          <h2 class="card-title text-center">ORDEN204</h2>
          <h6 class="card-text"><b>Fecha de pedido: </b><span>2024-04-15 11:14:00</span></h6>
          <h6 class="card-text"><b>Cliente: </b><span>Josué Rodríguez</span></h6>
          <h6 class="card-text"><b>Código de Cliente: </b><span>CLI004</span></h6>
          <h6 class="card-text"><b>Estado: </b><span class="badge bg-info text-dark">Pendiente</span></h6>
          <form action="" method="post">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Lista de Productos
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Fecha de entrega</label>
            </div>
            <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmarModal">Asignar fecha</button></center>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-4" data-order="ORDEN205" data-customer="Denis Josué Vásquez Rodríguez" data-status="Entregado" data-date="2024-05-15 11:14" data-cod="CLI005">
      <div class="card mb-3">
        <div class="card-body">
          <h2 class="card-title text-center">ORDEN205</h2>
          <h6 class="card-text"><b>Fecha de pedido: </b><span>2024-05-15 11:14:00</span></h6>
          <h6 class="card-text"><b>Cliente: </b><span>Denis Josué Vásquez Rodríguez</span></h6>
          <h6 class="card-text"><b>Código de Cliente: </b><span>CLI005</span></h6>
          <h6 class="card-text"><b>Estado: </b><span class="badge bg-info text-dark">Pendiente</span></h6>
          <form action="" method="post">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Lista de Productos
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Fecha de entrega</label>
            </div>
            <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmarModal">Asignar fecha</button></center>
          </form>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- Modal Categorias-->
<div class="modal fade" id="confirmarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación de categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="">
        <div class="modal-body">
          <h6>A continuación se muestra los detalles de la nueva categoria:</h6><br>
          <h6><b>Nombre: </b> <span id="nombreEP"></span></h6>
          <h6><b>Descripción: </b> <span id="descri"></span></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Confirmar ingreso de categoria</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo constant('URL') ?>public/js/pedidos.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo constant('URL') ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>

</html>