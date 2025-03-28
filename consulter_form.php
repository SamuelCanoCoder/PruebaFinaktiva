<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Eventos</title>
    <link rel="stylesheet" href="styles/consulter_form.css?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container w-50 p-5 mt-5 bg-white rounded shadow-sm">
        <h2 class="text-center">Consultar Eventos</h2>

        <form id="searchForm">
            <div class="mb-3 mt-4">
                <label class="form-label">Tipo de evento:</label>
                <select name="event_type" class="form-select">
                    <option selected disabled value="">Tipo de evento a consultar</option>
                    <option value="">Todos</option>
                    <option value="API">API</option>
                    <option value="Formulario">Formulario</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha inicio:</label>
                <input type="date" name="start_date" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha fin:</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn_consulter">Consultar</button>
            </div>

        </form>

    </div>

    <!-- En la siguiente modal se mostraran los resultados de la busqueda -->
    <div class="modal fade" id="resultsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Resultados de la consulta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="resultsContainer">Cargando...</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Js/consulter_form.js"></script>
</body>

</html>