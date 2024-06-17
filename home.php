<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Tabla de Puntuaciones</title>
</head>
<body>

<div class="table">
    <h1>Tabla de Puntuaciones</h1>
    <table>
        <thead>
            <tr>
                <th>Posición</th>
                <th>Nombre</th>
                <th>Puntuación</th>
            </tr>
        </thead>
        <tbody id="puntuacionesTable">
            <!-- Las puntuaciones se cargarán aquí dinámicamente con JavaScript -->
        </tbody>
    </table>
</div>

<div id="registroRapido">
    <h3>Registrar alumno rapidamente</h3>
    <form id="registroRapidoForm">
        <label for="nombreRapido">Nombre:</label>
        <input type="text" id="nombreRapido" name="nombreRapido" required>
        <label for="apellidoRapido">Apellido:</label>
        <input type="text" id="apellidoRapido" name="apellidoRapido" required>
        <label for="boletaRapido">Boleta:</label>
        <input type="text" id="boletaRapido" name="boletaRapido" required>
        <button type="submit">Registrar</button>
    </form>
</div>

<script src="js/registro_rapido.js"></script>
<script src="js/puntuaciones.js"></script>

</body>
</html>
