document.addEventListener('DOMContentLoaded', function() {
    fetchPuntuaciones();
});

function fetchPuntuaciones() {
    fetch('crud.php')
    .then(response => response.json())
    .then(data => {
        let tableBody = document.getElementById('puntuacionesTable');
        tableBody.innerHTML = '';

        data.forEach((alumno, index) => {
            let row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${alumno.nombre} ${alumno.apellido}</td>
                <td>${alumno.puntuacion}</td>
            `;
            tableBody.appendChild(row);
        });
    });
}
