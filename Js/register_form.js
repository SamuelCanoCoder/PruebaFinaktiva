$(document).ready(function () {
    const notyf = new Notyf();
    const $eventForm = $('#eventForm');

    // Manejador del formulario de registro de eventos
    $eventForm.submit(function (e) {
        e.preventDefault();
        registerEvent();
    });

    /**
     * Envía el formulario mediante AJAX y maneja la respuesta.
     */
    function registerEvent() {
        $.ajax({
            url: './controllers/register_event.php',
            type: 'POST',
            data: $eventForm.serialize(),
            dataType: 'json',
            success: handleResponse,
            error: function (xhr) {
                console.error("Error en la solicitud AJAX:", xhr.responseText);
                notyf.error('Error al registrar el evento: ' + (xhr.responseText || "Desconocido"));
            }
        });
    }

    /**
     * Maneja la respuesta del servidor y muestra notificaciones.
     * @param {Object} response - Respuesta del servidor.
     */
    function handleResponse(response) {
        if (response.message) {
            notyf.success(response.message);
            $eventForm[0].reset();
        } else if (response.error) {
            notyf.error(response.error);
        }
    }

    // Aplicación del efecto de gradiente dinámico
    const gradient = document.querySelector('.gradient-overlay');
    document.addEventListener("mousemove", updateGradient);

    /**
     * Actualiza la posición del gradiente según la posición del mouse.
     * @param {MouseEvent} e - Evento del mouse.
     */
    function updateGradient(e) {
        const x = (e.clientX / window.innerWidth) * 100;
        const y = (e.clientY / window.innerHeight) * 100;
        requestAnimationFrame(() => {
            gradient.style.background = `radial-gradient(circle at ${x}% ${y}%, rgba(141, 255, 201, 0.5) 0%, black 80%)`;
        });
    }
});
