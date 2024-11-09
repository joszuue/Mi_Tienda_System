<!DOCTYPE html>
<?php require "views/templates/menu.php"; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">REPORTES</h1>
  </div>

  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Reporte de Ventas</button>
      <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Productos más vendidos</button>
    </div>
  </nav>

  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <h1 class="text-center display-4">Reporte de Ventas</h1>
      <br>
      <!-- Filtros -->
      <div class="row g-7 justify-content-end">
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
      <!-- Tabla de Productos -->
      <div class="table-responsive table-container">
        <table class="table table-striped table-sm text-center">
          <thead>
            <tr>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Código Compra</th>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Fecha de Compra</th>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Cantidad de Productos
              </th>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Total de compra</th>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Opciones</th>
            </tr>
          </thead>
          <tbody id="comprasTable">
            <tr>
              <td>CLIE201</td>
              <td>Josué Vásquez</td>
              <td>10</td>
              <td>$20</td>
              <td><a href="#">Ver detalles</a></td>
            </tr>
            <tr>
              <td>CLIE202</td>
              <td>Maria Méndez</td>
              <td>15</td>
              <td>$10</td>
              <td><a href="#">Ver detalles</a></td>
            </tr>
            <tr>
              <td>CLIE203</td>
              <td>Manuel Pachado</td>
              <td>1</td>
              <td>$5</td>
              <td><a href="#">Ver detalles</a></td>
            </tr>
          </tbody>
        </table>
      </div>
      <br><br>
      <h1 class="display-4 text-center">Gráfica de Ventas</h1>
      <br>
      <div class="row g-7 d-flex justify-content-center align-items-center">
        <div class="col-sm-6 mb-3">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <h1 class="text-center display-4">Productos más vendidos</h1>
      <br>
      <!-- Tabla de Productos -->
      <div class="table-responsive table-container">
        <table class="table table-striped table-sm text-center">
          <thead>
            <tr>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Código Compra</th>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Fecha de Compra</th>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Cantidad de Productos
              </th>
              <th scope="col" style="background-color: #15181E; color: #E7EEFF;">Total de compra</th>
            </tr>
          </thead>
          <tbody id="comprasTable">
            <tr>
              <td>CLIE201</td>
              <td>Josué Vásquez</td>
              <td>10</td>
              <td>$20</td>
            </tr>
            <tr>
              <td>CLIE202</td>
              <td>Maria Méndez</td>
              <td>15</td>
              <td>$10</td>
            </tr>
            <tr>
              <td>CLIE203</td>
              <td>Manuel Pachado</td>
              <td>1</td>
              <td>$5</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      datasets: [{
        label: 'Ventas Anuales',
        data: [12, 10, 3, 5, 2, 3, 2, 52, 58, 30, 62, 23],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script src="<?php echo constant('URL') ?>public/js/clientes.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo constant('URL') ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>

</html>