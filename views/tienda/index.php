<!DOCTYPE html>
<?php require "views/templates/menuTienda.php"; ?>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php 
            $cont = 0;
            foreach($this->listaProductos as $producto){
            ?>
            <div class="carousel-item <?php echo ($cont === 0) ? "active" : "" ?>">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <?php 
                            $cont = 0;
                            foreach ($this->listaImagenes as $listaI) {
                                if ($producto->getCodProducto() == $listaI->getCodProducto()) {
                                    if($cont == 0){
                            ?>
                                        <img class="img-fluid" src="<?php echo constant("URL_IMG") . $listaI->getImagen() ?>" alt="" width="400px" height="400px">
                            <?php
                                        $cont++;
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b><?php echo $producto->getNombre();?></b></h1>
                                <p><?php  echo $producto->getDescripcion();?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $cont++;
            }
            ?>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Productos destacados</h1>
                    <p>
                    ¡No te pierdas lo mejor de nuestra tienda! Descubre nuestro producto destacado, una selección especial de artículos de alta calidad, ideales para ti.
                    </p>
                </div>
            </div>
            <div class="row">
                <?php 
                $cont = 0;
                foreach($this->listaProductos as $producto){
                ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <?php 
                                $cont = 0;
                                foreach ($this->listaImagenes as $listaI) {
                                    if ($producto->getCodProducto() == $listaI->getCodProducto()) {
                                        if($cont == 0){
                                ?>
                                            <img class="card-img-top" src="<?php echo constant("URL_IMG") . $listaI->getImagen() ?>" alt="">
                                <?php
                                            $cont++;
                                        }
                                    }
                                }
                            ?>
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right"> $<?php echo $producto->getPrecio()?></li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark"><?php echo $producto->getNombre()?></a>
                            <p class="card-text"><?php echo $producto->getDescripcion()?></p>
                        </div>
                    </div>
                </div>
                <?php
                $cont++;
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Categorias</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <?php 
                            foreach($this->listaCategorias as $categoria){
                                echo "<li><a class='text-decoration-none' href='#'>".$categoria->getNombre()."</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light text-center">
                            Backend by Josué Vásquez | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="<?php echo constant('URL') . 'public/'?>assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo constant('URL') . 'public/'?>assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo constant('URL') . 'public/'?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo constant('URL') . 'public/'?>assets/js/templatemo.js"></script>
    <script src="<?php echo constant('URL') . 'public/'?>assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>