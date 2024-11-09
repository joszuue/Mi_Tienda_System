<!DOCTYPE html>
<?php require "views/templates/menu.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <br><br>
  <div class="container-md">
    <main class="form-signin">
      <form action="dashboard.html">
        <h1 class="display-4 text-center">Cambiar Contraseña</h1>
        <hr class="my-4">
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput" style="color: black;">Contraseña antigua</label>
        </div>
        <br>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword" style="color: black;">Contraseña nueva</label>
        </div>
        <br>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword" style="color: black;">Repetir contraseña</label>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Cambiar Contraseña</button>
      </form>
    </main>
  </div>
</main>
<script src="../js/clientes.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>

</html>