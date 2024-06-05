<?php
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$email = (isset($_POST['email'])) ? $_POST['email'] : "";
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : "";
$producto = (isset($_POST['producto'])) ? $_POST['producto'] : "";
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "";
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
$cp = (isset($_POST['cp'])) ? $_POST['cp'] : "";

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("config/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("template/meta.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>

    <?php include("template/header.php") ?>

    <main class="container">
        <?php
        switch ($accion) {

            case "enviado":
                $sql = $conexion->prepare("UPDATE pagos
                                            SET realizado = 'ENVIADO'
                                            WHERE id = :registro");
                $sql->bindParam(':registro', $txtID);
                $sql->execute();
                echo '
                <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                Solicitud Nro: <strong>$txtID</strong> cambió de estado a ENVIADO correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
                break;

            case "no_enviado":
                $sql = $conexion->prepare("UPDATE pagos
                                            SET realizado = 'NO ENVIADO'
                                            WHERE id = :registro");
                $sql->bindParam(':registro', $txtID);
                $sql->execute();
                echo '
                <div class="alert alert-primary alert-dismissible fade show mt-4" role="alert">
                Solicitud Nro: <strong>$txtID</strong> cambió de estado a NO ENVIADO correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
                break;

            case "eliminar":

                $sql = $conexion->prepare("DELETE FROM pagos WHERE id = :id");
                $sql->bindParam(':id', $txtID);
                $sql->execute();
                echo '
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                        Solicitud Nro: <strong>$txtID</strong> Eliminada correctamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                break;

            case "seleccionar":
                $sql = $conexion->prepare("SELECT * FROM pagos WHERE id = $txtID");
                $sql->execute();
                $elemento = $sql->fetch(PDO::FETCH_LAZY);

                $txtID = $elemento['id'];
                $nombre = $elemento['nombre'];
                $cantidad = $elemento['cantidad'];
                $email = $elemento['email'];
                $producto = $elemento['producto'];
                $precio = $elemento['precio'];
                $direccion = $elemento['direccion'];
                $fecha = $elemento['fecha'];
                $cp = $elemento['cp'];
                break;

            case "cancelar":
                break;
        }
        ?>
        <?php
        $sql = $conexion->prepare("SELECT * FROM pagos ORDER BY id DESC");
        $sql->execute();
        $listar = $sql->fetchAll();
        ?>
        <div class="container">
            <div class="row col-sm-12 d-md-flex d-sm-flex flex-sm-column flex-xs-column">
                <div class="container mt-3">
                    <h2 class="tituloNormal fs-4">ADMINISTRACIÓN DE PAGOS</h2>
                </div>
                <div class="col-sm col-xs-12 d-flex flex-column mt-4 mb-4">
                    <table id="example" class="table table-responsive  mt-3">
                        <thead class="card-header border-4 rounded-0">
                            <tr align="center">
                                <th class="text-center">Acciones</th>
                                <th class="text-center">Cambiar Estado</th>
                                <th class="text-center">Estado</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="text-center">Email</th>
                                <th>Cantidad</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Dirección</th>
                                <th>Fecha</th>
                                <th>CP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listar as $item) { ?>
                                <tr>
                                    <td>
                                        <form method="post" class="container d-md-flex">
                                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $item['id'] ?>">
                                            <button type="submit" value="seleccionar" name="accion" style="border: none; background: none;">
                                                <i class="fa-solid fa-magnifying-glass" style="color: var(--btn-action) !important;" title="Ver"></i>
                                            </button>
                                            <button type="submit" value="eliminar" name="accion" style="border: none; background: none;">
                                                <i class="fa-solid fa-trash" style="color: var(--btn-action) !important;" title="Eliminar"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="p-0">
                                        <form method="post" class="row col-sm-12 col-md-12 d-flex flex-sm-column flex-md-row justify-content-sm-center align-items-sm-center mb-2">
                                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $item['id'] ?>">
                                            <div class="d-sm-flex flex-sm-column flex-md-row col-sm-12 col-md-4 mt-1 ">
                                                <button type="submit" value="enviado" name="accion" style="border: 1px solid #707070; border-radius: 50%; background: none;">
                                                    <i class="fa fa-circle p-1" style="color: var(--color2)" title="ENVIADO"></i>
                                                </button>
                                            </div>
                                            <div class="d-sm-flex flex-sm-column flex-md-row col-sm-12 col-md-4 mt-1">
                                                <button type="submit" value="no_enviado" name="accion" style="border: 1px solid #707070; border-radius: 50%; background: none;">
                                                    <i class="fa fa-circle p-1" style="color: var(--color6)" title="NO ENVIADO"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo $item['realizado'] ?>
                                    </td>
                                    <td><?php echo $item['nombre'] ?></td>
                                    <td><?php echo $item['email'] ?></td>
                                    <td><?php echo $item['cantidad'] ?></td>
                                    <td><?php echo $item['producto'] ?></td>
                                    <td><?php echo $item['precio'] ?></td>
                                    <td><?php echo $item['direccion'] ?></td>
                                    <td><?php echo $item['fecha'] ?></td>
                                    <td><?php echo $item['cp'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php include("template/footer.php") ?>
</body>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        const estado = $('#colorEstado').text()
        $('#example').DataTable({
            "drawCallback": function(settings) {
                $('ul.pagination').addClass("pagination-sm");
            },
            language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sLoadingRecords": "Cargando...",
                "infoFiltered": true,
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            },
            "oPaginate": true,
            "iDisplayLength": 100,
            "bFilter": true,
            "aaSorting": [
                [2, "desc"]
            ],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                console.log(aData[2])
                if (aData[2] === "ENVIADO") {
                    $('td', nRow).css('background-color', 'var(--color2)');
                } else if (aData[2] === "NO ENVIADO") {
                    $('td', nRow).css('background-color', 'var(--color6)');
                }
            },
            ordering: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: true,
            // para usar los botones
            responsive: "true",
            dom: 'Blfrtip',
            buttons: [{
                extend: 'excelHtml5',
                text: 'EXPORTAR A EXCEL <i class="fas fa-file-excel fs-4 p-1"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btnExcel btn rounded-4 m-0 mb-3',
            }, ],

        })
    })
</script>
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