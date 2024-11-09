<!DOCTYPE html>
<?php require "views/templates/menuTienda.php"; ?>
<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>



<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categorias</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Género
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Hombre</a></li>
                        <li><a class="text-decoration-none" href="#">Mujer</a></li>
                        <li><a class="text-decoration-none" href="#">Unisex</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Descuento
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <?php if ($this->listaOfertas != null) { ?>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <?php
                            foreach ($this->listaOfertas as $oferta) {
                            ?>
                                <li><a class="text-decoration-none" href="#"><?php echo $oferta->getNombre() ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php } ?>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Categorias Relacionadas
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <?php
                        foreach ($this->listaCategorias as $cate) {
                        ?>
                            <li><a class="text-decoration-none" href="#"><?php echo $cate->getNombre() ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">Todos los productos</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($this->listaProductos as $produ) {
                ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <?php 
                                    $cont = 0;
                                    foreach ($this->listaImagenes as $listaI) {
                                        if ($produ->getCodProducto() == $listaI->getCodProducto()) {
                                            if($cont == 0){
                                    ?>
                                                <img class="card-img rounded-0 img-fluid" src="<?php echo constant("URL_IMG") . $listaI->getImagen() ?>" alt="">
                                    <?php
                                                $cont++;
                                            }
                                        }
                                    }
                                ?>
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none"><b><?php echo $produ->getNombre(); ?></b></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li><?php echo $produ->getDescripcion(); ?></li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$<?php echo $produ->getPrecio(); ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Categorias</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <?php
                    foreach ($this->listaCategorias as $categoria) {
                        echo "<li><a class='text-decoration-none' href='#'>" . $categoria->getNombre() . "</a></li>";
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
<script src="<?php echo constant('URL') . 'public/' ?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo constant('URL') . 'public/' ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo constant('URL') . 'public/' ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo constant('URL') . 'public/' ?>assets/js/templatemo.js"></script>
<script src="<?php echo constant('URL') . 'public/' ?>assets/js/custom.js"></script>
<!-- End Script -->
</body>

</html>