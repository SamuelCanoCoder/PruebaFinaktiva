$(document).ready(function () {
    $("#searchForm").submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: "./controllers/fetch_events.php",
            type: "GET",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                renderResults(response);
            },
            error: function (xhr, status, error) {
                console.error("Error al obtener los datos:", status, error);
                $("#resultsContainer").html("<p class='text-danger'>Error al obtener los datos. Inténtalo de nuevo.</p>");
                $("#resultsModal").modal("show");
            }
        });
    });

    /**
     * Renderiza los resultados obtenidos en la modal.
     * @param {Array} events - Lista de eventos recibidos del servidor.
     */
    function renderResults(events) {
        let output = "";

        if (events.length > 0) {
            output = `
                <ul class='list-group'>
                    ${events.map(event => `
                        <li class='list-group-item'>
                            <strong>${event.event_type}</strong> - ${event.description} <br>
                            <small>${event.event_date}</small>
                        </li>`).join('')}
                </ul>`;
        } else {
            output = "<p class='text-muted'>No se encontraron resultados.</p>";
        }

        $("#resultsContainer").html(output);
        $("#resultsModal").modal("show"); // Abre el modal
    }
});
