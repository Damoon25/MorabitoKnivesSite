document.addEventListener('DOMContentLoaded', function() {
    // Ventana Modal
    var modal = new bootstrap.Modal(document.getElementById('modalCompra'));

    // Escuchando el evento 'click' en todos los botones de compra
    document.querySelectorAll('#botonMercadoPago').forEach(button => {
        button.addEventListener('click', function() {
            console.log("Botón clickeado");
            var producto = this.getAttribute('data-producto');
            var precio = this.getAttribute('data-precio');
            var imagen = this.getAttribute('data-imagen');

            // Seleccionamos los elementos dentro del modal utilizando el contexto adecuado
            var modalContent = document.querySelector('#modalCompra');
            modalContent.querySelector('.imagenProducto').src = './public/img/cards/' + imagen;
            modalContent.querySelector('.precioProducto span').textContent = '$' + precio;
            modalContent.querySelector('.nombreProducto span').textContent = producto;

            modal.show();
        });
    });

    document.getElementById('formularioCompra').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe de forma predeterminada

        // Obtener los datos del formulario
        var nombre = document.getElementById('nombre').value;
        var email = document.getElementById('Email').value;
        var cantidad = document.getElementById('cantidad').value;
        var codigoPostal = document.getElementById('CP').value;
        var direccion = document.getElementById('direccion').value;
        var precio = document.querySelector('.precioProducto') ? document.querySelector('.precioProducto').textContent : '';
        var producto = document.querySelector('.nombreProducto') ? document.querySelector('.nombreProducto').textContent : '';

        if (precio && producto) {
            // Crear el objeto de preferencia de Mercado Pago
            var preference = {
                items: [
                    {
                        title: producto,
                        quantity: parseInt(cantidad),
                        currency_id: 'ARS',
                        unit_price: parseFloat(precio.replace('$', '').replace(',', ''))
                    }
                ],
                payer: {
                    name: nombre,
                    email: email
                }
            };

            // Hacer una solicitud POST a la API de Mercado Pago para crear la preferencia de pago
            fetch('https://api.mercadopago.com/checkout/preferences', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer TEST-3511157771262264-050717-e0de109b5a683e01e45895824e071f6f-341701681'
                },
                body: JSON.stringify(preference)
            })
            .then(response => response.json())
            .then(data => {
                // Redirigir al usuario a la página de Mercado Pago para completar el pago
                window.location.href = data.init_point;

                // Enviar correo electrónico al comprador
                fetch('/correo_comprador.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        nombre: nombre,
                        email: email,
                        cantidad: cantidad,
                        producto: producto,
                        precio: precio,
                        direccion: direccion,
                        cp: cp
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al enviar el correo electrónico al comprador');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                // Guardar en la base de datos
                fetch('/transaccion.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        nombre: nombre,
                        email: email,
                        cantidad: cantidad,
                        producto: producto,
                        precio: precio,
                        direccion: direccion,
                        cp: cp
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al guardar en la base de datos');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                // Enviar correo electrónico al vendedor
                fetch('/correo_vendedor.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        nombre: nombre,
                        email: email,
                        cantidad: cantidad,
                        producto: producto,
                        precio: precio,
                        direccion: direccion
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al enviar el correo electrónico al vendedor');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            })
            .catch(error => {
                console.error('Error al crear la preferencia de pago:', error);
                // Mostrar el mensaje de error en la pantalla
                document.getElementById('mensajeError').style.display = 'block';
            });
        } else {
            console.error('No se pudieron obtener los datos necesarios para crear la preferencia de pago.');
            // Mostrar el mensaje de error en la pantalla
            document.getElementById('mensajeError').style.display = 'block';
        }
    });
});