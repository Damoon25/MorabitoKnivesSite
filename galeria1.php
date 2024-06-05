<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/css/uikit.min.css" />
    <title>Morabito Knives | Acero Damasco</title>
</head>

<body>

    <main>
        <div class="home">
            <?php include("portadaGaleria1.php") ?>
            <div class="header">
                <?php include("template/header2.php") ?>
            </div>
            <div class="col-sm-12 text-center text-md-start">
                <div id="galeria" class="container p-0">
                    <h2 class="titleSection paddingTop m-0">Galería</h2>
                </div>
            </div>
            <div class="container">
                <div class="section">
                    <div class="row justify-content-center align-items-center">
                        <div class="container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-sm-12 pb-4">
                                    <div class="col-sm-12">
                                        <!-- Carousel -->
                                        <!-- Botones de navegación personalizados -->
                                        <div class="d-flex justify-content-center justify-content-md-end">
                                            <div class="p-3 ps-0">
                                                <button id="btnPrev">
                                                    <img style="transform: rotate(180deg) !important;" src="./public/img/Buttons/buttonForward.svg" alt="Anterior">
                                                </button>
                                            </div>
                                            <div class="p-3 ps-0">
                                                <button id="btnNext">
                                                    <img src="./public/img/Buttons/buttonForward.svg" alt="Siguiente">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="carouselNovedades" class="owl-carousel owl-theme">
                                        <?php
                                        try {
                                            include("administrador/config/conexion.php");
                                            $sql = $conexion->prepare("SELECT * FROM productos WHERE tipo = 'Acero Damasco' ORDER BY id DESC");
                                            $sql->execute();
                                            $listarProductos = $sql->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($listarProductos as $item) {
                                        ?>
                                                <div class="item m-3">
                                                    <div style="box-shadow: none !important;" class="card border-0 rounded-0 mx-auto">
                                                        <!-- Contenido de la tarjeta -->
                                                        <div class="card-body p-0 position-relative">
                                                            <img src="./public/img/cards/<?= $item['imagen'] ?>" class="imgKnife imagenProducto" alt="Imagen">
                                                            <!-- Contenido del cuerpo de la tarjeta -->
                                                            <div class="col-sm-12">
                                                                <div class="d-flex justify-content-center paddingBottom">
                                                                    <div class="btn-container">
                                                                        <div class="col-sm-12 d-flex justify-content-center text-center mb-3">
                                                                            <h5 class="nombreProducto card-title text-center"><?php echo $item['producto'] ?></h5>
                                                                        </div>
                                                                        <div class="col-sm-12 d-flex justify-content-center text-center">
                                                                            <p class="minText text-center"><?php echo substr($item['descripcion'], 0, 200) . '...' ?></p>
                                                                        </div>
                                                                        <?php if ($item['destacado'] == 'si') { ?>
                                                                            <div class="col-sm-12 d-flex justify-content-center text-center">
                                                                                <p class="precioProducto minText fw-bolder mb-2">
                                                                                    <?php
                                                                                    if (empty($item['precio'])) {
                                                                                        echo "N/A";
                                                                                    } else {
                                                                                        echo "$ " . $item['precio'];
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        <?php } ?>
                                                                        <a href="https://wa.me/542216255399" target="_blank" class="btn3">Contactame</a>
                                                                        <?php if ($item['destacado'] == 'si') { ?>
                                                                            <button id="botonMercadoPago" data-bs-toggle="modal" data-bs-target="#modalCompra" class="mt-2" data-producto="<?php echo $item['producto']; ?>" data-precio="<?php echo $item['precio']; ?>" data-imagen="<?php echo $item['imagen']; ?>">
                                                                                <img class="mercadoPago me-1" src="./public/img/Buttons/mercadoPago.svg">
                                                                                <span style="display: none;"><?php echo $item['producto']; ?></span>
                                                                                <span style="display: none;"><?php echo $item['precio']; ?></span>
                                                                                <span style="display: none;"><?php echo $item['imagen']; ?></span>
                                                                                Comprar
                                                                            </button>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } catch (Exception $e) {
                                            echo '<script>console.log(' . json_encode($e->getMessage()) . ')</script>';
                                            echo "Error al recuperar los productos: " . $e->getMessage();
                                        }
                                        ?>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="modalCompraLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title" id="modalCompraLabel">Completa tus Datos</h5>
                                                    <button type="button" class="btnClose" data-bs-dismiss="modal" aria-label="Close">
                                                        <img src="./public/img/Buttons/close.svg" alt="Cerrar">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="formularioCompra" class="paddingTop" method="POST">
                                                        <div class="col-sm-12 text-start">
                                                            <h2 class="subText mb-3">Desea comprar :</h2>
                                                        </div>
                                                        <div class="col-sm-12 mb-3 d-flex align-items-center justify-content-center">
                                                            <div class="text-center">
                                                                <img id="imagenProducto" class="imagenProducto" src="" alt="Producto">
                                                                <p class="nombreProducto minText">Producto: <strong><span style="color: var(--color6) !important;"></span></strong></p>
                                                                <p class="precioProducto minText mt-2">Precio: <strong><span style="color: var(--color6) !important;"></span></strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="nombre" class="form-label">Nombre:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="Email" class="form-label">Email:</label>
                                                                <input type="email" class="form-control" id="Email" name="Email" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="cantidad" class="form-label">Cantidad:</label>
                                                                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="CP" class="form-label">Código Postal:</label>
                                                                <input type="number" class="form-control mb-2" id="cp" name="cp" required>
                                                                <a class="textLink" target="_blank" href="https://www.correoargentino.com.ar/formularios/cpa">Quieres consultar el CP?</a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-5">
                                                                <label for="direccion" class="form-label">Dirección de Envío:</label>
                                                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <div class="d-flex justify-content-end paddingBottom">
                                                                <button type="submit" class="btn3">Comprar</button>
                                                            </div>
                                                        </div>
                                                        <div id="mensajeError" style="display: none;" class="alert alert-danger" role="alert">
                                                            ¡Ups! Hubo un error al procesar tu solicitud. Por favor, inténtalo de nuevo más tarde.
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include("template/footer.php") ?>
    </footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-9aIt25oAoS06iXEsgg6D7/KRmVdd9J8Itz2gV+UQhhH2tdy8Q/D5J3DkM2cMNp0C" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
<script src="./public/js/mercadoPago.js"></script>
<script>
    var lastScrollTop = 0;
    var header = document.querySelector(".header");

    window.addEventListener("scroll", function() {
        var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // Scroll hacia abajo
            header.style.top = "0"; // Fijar el encabezado en la parte superior
        } else {
            // Scroll hacia arriba
            if (currentScroll <= 0) {
                header.style.top = "-100px"; // Ocultar completamente el encabezado
            } else {
                header.style.top = "0"; // Mostrar el encabezado
            }
        }
        lastScrollTop = currentScroll;
    }, false);
</script>
<script>
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        if (window.scrollY > 50) { // Cambiar 50 por la cantidad de scroll que desees antes de aplicar la transparencia
            navbar.classList.add('transparent');
        } else {
            navbar.classList.remove('transparent');
        }
    });
</script>
<script>
    $(document).ready(function() {
        $("#carouselNovedades").owlCarousel({
            loop: false,
            margin: 0,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 4
                }
            },
            dots: false
        });

        // Botón para avanzar
        $('#btnNext').click(function() {
            $('#carouselNovedades').trigger('next.owl.carousel');
        })
        // Botón para retroceder
        $('#btnPrev').click(function() {
            $('#carouselNovedades').trigger('prev.owl.carousel');
        })
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/js/uikit-icons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Control de Responsive Design !-->
<script>
    AOS.init();
</script>

</html>