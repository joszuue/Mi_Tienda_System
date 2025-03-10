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
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>img/logotipo.png" type="image/x-icon">
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
      <form action="<?php echo constant('URL') ?>Login/login" method="POST">
        <img class="mb-4 animate__animated animate__rubberBand" src="<?php echo constant('URL') ?>public/img/logoLogin.png" alt="" width="200" height="70">
        <h1 class="display-4 text-center animate__animated animate__bounce">Inicio de Sesión</h1>
        <hr class="my-4">
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Código" name="codigo">
          <label for="floatingInput" style="color: black;">Código de Usuario</label>
        </div>
        <br>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="contra">
          <label for="floatingPassword" style="color: black;">Contraseña</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
      </form>
    </main>
  </div>
</body>

</html>