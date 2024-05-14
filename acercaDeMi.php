<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/css/uikit.min.css" />
    <title>Morabito Knives | Sobre Mí</title>
</head>

<body>

    <main>
        <div class="home">
            <?php include("portadaBio.php") ?>
            <div class="header">
                <?php include("template/header2.php") ?>
            </div>
            <div class="col-sm-12 flex-column flex-md-row paddingTop paddingBottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 order-md-2 align-self-start">
                            <img data-aos="zoom-in-left" class="imageBio aos-init aos-animate" src="./public/img/imgPortadas/img_acerca_de_mi.jpg" alt="Biografía">
                        </div>
                        <div class="col-sm-12 col-md-6 order-md-1 align-self-start textBio">
                            <p class="minText mb-2">
                                Desde tiempos inmemorables, el hombre forjó su destino creando herramientas;
                                una de ellas y la más importante, fue sin duda el cuchillo,
                                Inicialmente de piedra volcánica, luego de bronce, hierro y acero,
                                cada cuchillo es el reflejo de una época y de una cultura. <br><br>
                                La forja, oficio milenario como ningún otro, se desarrolla al ritmo del yunque y el martillo,
                                para poner ante usted una obra de arte en su cocina.
                                Me llamo Nahuel Morabito y soy maestro herrero. <br><br>
                                Toda mi vida fue plasmada en torno al yunque y las artes.
                                Me desempeñé como músico en el imponente Teatro Argentino de La Plata,
                                y actualmente me dedico en tiempo completo a este maravilloso arte que es la forja,
                                dejando en cada trabajo un pedazo de mi ser,
                                plasmado entre las míticas capas del legendario acero de damasco.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include("template/footer.php") ?>
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
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
<script src="public/js/control.js"></script>
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