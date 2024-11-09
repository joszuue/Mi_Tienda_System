<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Login - AdminServices</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Bootstrap core CSS -->
  <link href="<?php echo constant('URL') ?>public/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/img/logotipo.png" type="image/x-icon">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="<?php echo constant('URL') ?>public/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <div class="container">
    <main class="form-signin">
      <form action="dashboard.html">
        <img class="mb-4 animate__animated animate__rubberBand" src="<?php echo constant('URL') ?>public/img/logoLogin.png" alt="" width="200" height="70">
        <h1 class="display-4 text-center animate__animated animate__bounce">Cambiar Contraseña</h1>
        <hr class="my-4">
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput" style="color: black;">Contraseña nueva</label>
        </div>
        <br>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword" style="color: black;">Repita su contraseña</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
      </form>
    </main>
  </div>
</body>

</html>