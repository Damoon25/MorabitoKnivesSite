<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/css/uikit.min.css" />
    <title>Morabito Knives | Home</title>
</head>

<body>

    <main>
        <div class="home">
            <?php include("portadaHome.php") ?>
            <div class="header">
                <?php include("template/header2.php") ?>
            </div>
            <div class="col-sm-12 text-center text-md-start">
                <div id="galeria" class="container">
                    <h2 class="titleSection paddingTop paddingBottom">Mi Galería</h2>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center align-items-center align-self-start">
                    <div class="col-sm-12 col-md-4 d-flex justify-content-center align-items-center ">
                        <div data-aos="zoom-in" class="card">
                            <div class="card-body">
                                <img src="./public/img/imgPortadas/cuchillo-acero-damasco.jpeg" class="portadaGaleriaHome" alt="Acero de Damasco">
                                <div class="col-sm-12 pt-4 pb-4">
                                    <h3 class="card-title text-center">Acero Damasco</h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-center paddingBottom">
                                        <a href="galeria1.php" class="btn2">Ver Galería</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex justify-content-center align-items-center ">
                        <div data-aos="zoom-in" class="card">
                            <div class="card-body">
                                <img src="./public/img/imgPortadas/cuchillo-cocina-acero.jpeg" alt="Monoacero">
                                <div class="col-sm-12 pt-4 pb-4">
                                    <h3 class="card-title text-center">
                                        Monoacero
                                    </h3>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-center paddingBottom">
                                        <a href="galeria2.php" class="btn2">Ver Galería</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex justify-content-center align-items-center ">
                        <div data-aos="zoom-in" class="card">
                            <div class="card-body">
                                <img src="./public/img/imgPortadas/san-mai-gyuto.jpeg" class="portadaGaleriaHome" alt="San Mai">
                                <div class="col-sm-12 pt-4 pb-4">
                                    <h3 class="card-title text-center">San Mai</h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-center paddingBottom">
                                        <a href="galeria3.php" class="btn2">Ver Galería</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 paddingTop paddingBottom d-flex justify-content-center text-center">
                    <a href="https://wa.me/542216255399" target="_blank" class="btn3">
                        Cuchillos a pedido</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include("template/footer.php") ?>
    </footer>
    <script>
        var lastScrollTop = 0;
        var header = document.querySelector(".header");

        window.addEventListener("scroll", function() {
            var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                // Scroll hacia abajo
                header.style.top = "0";
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
        const text = "Nano Morabito ";
        const speed = 150; // Velocidad de escritura en milisegundos
        const pauseTime = 1500; // Tiempo de pausa en milisegundos después de completar el texto

        let i = 0;
        let reverse = false; // Variable para controlar si se está escribiendo o borrando

        function typeWriter() {
            if (!reverse && i < text.length) {
                document.getElementById("typedText").innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            } else {
                setTimeout(resetText, pauseTime);
            }
        }

        function resetText() {
            if (!reverse) {
                reverse = true;
                setTimeout(typeWriter, speed);
            } else {
                if (i > 0) {
                    document.getElementById("typedText").innerHTML = text.substring(0, i - 1);
                    i--;
                    setTimeout(resetText, speed);
                } else {
                    reverse = false;
                    setTimeout(typeWriter, speed);
                }
            }
        }

        window.onload = function() {
            typeWriter();
        };
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/js/uikit-icons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Control de Responsive Design !-->
<script>
    AOS.init();
</script>

</html>