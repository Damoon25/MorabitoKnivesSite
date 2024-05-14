<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.14/dist/css/uikit.min.css" />
    <title>Morabito Knives | Contacto</title>
</head>

<body>

    <main>
        <?php include("template/header2.php") ?>
        <div class="home paddingTop paddingBottom">
            <div class="container">
                <div class="section col-sm-12 text-center text-md-start justify-content-center justify-content-md-start paddingTop paddingBottom">
                    <div data-aos="zoom-in" class="container">
                        <h2 data-aos="zoom-in-left" class="titleContact mb-4 mt-4 text-center text-md-start">
                            CONTACTO
                        </h2>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 align-self-center">
                                <h2 class="titleSection mb-4 mt-4 text-center text-md-start">
                                    Contactanos
                                </h2>
                                <p class="subText fw-lighter">
                                    Para más información, comunicate con nosotros y te asistimos en tu diseño
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="container">
                                    <div class="row">
                                        <form id="contactForm" action="enviar.php" method="post">
                                            <div class="row">
                                                <div class="mb-4 text-start col-md-6">
                                                    <label for="nombre" class="form-label">Nombre </label>
                                                    <input type="text" class="form-control bottom-border" id="nombre" name="nombre" required>
                                                </div>
                                                <div class="mb-4 text-start col-md-6">
                                                    <label for="apellido" class="form-label">Apellido</label>
                                                    <input type="text" class="form-control bottom-border" id="apellido" name="apellido" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-4 text-start col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control bottom-border" id="email" name="email" required>
                                                </div>
                                                <div class="mb-4 text-start col-md-6">
                                                    <label for="asunto" class="form-label">Asunto</label>
                                                    <input type="text" class="form-control bottom-border" id="asunto" name="asunto" required>
                                                </div>
                                            </div>
                                            <div class="mb-4 text-start col-12">
                                                <label for="message" class="form-label">Mensaje</label>
                                                <textarea class="form-control bottom-border" id="mensaje" name="mensaje" required rows="5"></textarea>
                                            </div>
                                            <div class="col-sm-12 justify-content-end text-end paddingForm">
                                                <button type="submit" class="btn2">Enviar</button>
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
    </main>
    <footer>
        <?php include("template/footer.php") ?>
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
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