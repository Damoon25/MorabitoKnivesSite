<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <title>Administrador de Morabito Knives</title>
</head>

<body>
    <main>
        <div class="portada">
            <?php include("template/header.php") ?>
            <div class="jumbotron jumbotron-fluid margenAlto ">
                <div class="container">
                    <div class="col-sm-12 paddingTop">
                        <div class="col-xl-6">
                            <h1 class="display-3 subText">Bienvenido al administrador de <strong style="color: var(--color1);" class="fw-bold">MORABITO KNIVES</strong></h1>
                            <p class="lead">Elegí la opción deseada.</p>
                        </div>
                        <hr class="my-2">
                        <div class="col sm 12">
                            <p class="lead">
                                <a class="btnAdmin btn m-3 ms-0" href="productos.php" role="button">ADMINISTRAR PRODUCTOS</a>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>