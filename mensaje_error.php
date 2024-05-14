<?php
$error_message = "";
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error === 'missing_fields') {
        $error_message = "Por favor, complete todos los campos del formulario.";
    } elseif ($error === 'invalid_email') {
        $error_message = "La dirección de correo electrónico proporcionada no es válida.";
    } elseif ($error === 'email_send_error') {
        $error_message = "Se produjo un error al enviar el correo electrónico. Por favor, inténtelo de nuevo más tarde.";
    } elseif ($error === 'invalid_request_method') {
        $error_message = "El método de solicitud no es válido.";
    } else {
        $error_message = "Se ha producido un error desconocido.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("./template/meta.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Morabito Knives | Mensaje</title>
</head>

<body>

    <?php include("./template/header2.php") ?>
    <main>
        <div class="container">
            <div class="col col-sm-12">
                <div class="col-sm-12">
                    <div class="col-sm-12 d-flex justify-content-start">
                        <h1 class="titleSection paddingTop paddingBottom text-left mt-5">Morabito Knives | Fabricante de Cuchillos</h1>
                    </div>
                    <div class="container paddingBottom">
                        <div class="alert alert-danger mt-5 mb-3 text-center" role="alert">
                            <p class="parrafo fs-5">
                                Hubo un error al enviar el mensaje, intentelo nuevamente.
                            </p>
                            <div class="col-sm-12 mt-3 mb-3 text-center">
                                <?php echo $error_message; ?>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-center align-items-center">
                                <button type="button" class="btn3 btnAdmin btn-lg rounded-pill" style="width: 40%;"><a class="text-decoration-none" href="index.php" style="color: #ffff;"><i class="fas fa-left-to-line" style="color: #ffff;"></i> VOLVER</a></button>
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
</body>
<script>
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 768px)").matches) {
            $dropdown.hover(
                function() {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function() {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>


</html>