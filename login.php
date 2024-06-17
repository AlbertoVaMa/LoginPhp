<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Administrador</title>
</head>
<body>

    <h1>Bienvenido Admin!</h1>
    <h2>Administracion de alumnos</h2>

    <form id="alumnoForm">
        <input type="hidden" name="action">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <label for="boleta">Boleta:</label>
        <input type="text" id="boleta" name="boleta" required>
        <label for="puntuacion">Puntuación:</label>
        <input type="number" id="puntuacion" name="puntuacion" required>
        <button type="submit">Guardar</button>
        <button type="button" onclick="resetForm()">Cancelar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Boleta</th>
                <th>Puntuación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="alumnosTable">
            <!-- Los datos de los alumnos se cargarán aquí -->
        </tbody>
    </table>


    <script src="js/crud.js"></script>

</body>
</html>
