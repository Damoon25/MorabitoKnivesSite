<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("templateEN/meta.php") ?>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/css/uikit.min.css" />
    <title>Morabito Knives | About Me</title>
</head>

<body>

    <main>
        <div class="home">
            <?php include("portadaBio.php") ?>
            <div class="header">
                <?php include("templateEN/header2.php") ?>
            </div>
            <div class="col-sm-12 flex-column flex-md-row paddingTop paddingBottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 order-md-2 align-self-start">
                            <img data-aos="zoom-in-left" class="imageBio aos-init aos-animate" src="../public/img/imgPortadas/img_acerca_de_mi.jpg" alt="Biography">
                        </div>
                        <div class="col-sm-12 col-md-6 order-md-1 align-self-start textBio">
                            <p class="minText mb-2">
                                Since time immemorial, man forged his destiny creating tools;
                                one of them, and the most important, was undoubtedly the knife,
                                Initially made of volcanic stone, then of bronze, iron, and steel,
                                each knife is a reflection of an era and a culture. <br><br>
                                Blacksmithing, an ancient craft like no other, develops to the rhythm of the anvil and hammer,
                                to present you with a work of art in your kitchen.
                                My name is Nahuel Morabito and I am a master blacksmith. <br><br>
                                My whole life has been shaped around the anvil and the arts.
                                I worked as a musician at the impressive Teatro Argentino in La Plata,
                                and currently, I dedicate myself full-time to this wonderful art of blacksmithing,
                                leaving a piece of my soul in every piece of work,
                                embodied among the mythical layers of the legendary damascus steel.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include("templateEN/footer.php") ?>
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