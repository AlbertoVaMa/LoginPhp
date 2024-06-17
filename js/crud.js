document.addEventListener('DOMContentLoaded', function() {
    fetchAlumnos();

    document.getElementById('alumnoForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let boleta = formData.get('boleta');
        formData.append('action', boleta ? 'update' : 'create');

        fetch('crud.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            fetchAlumnos();
            resetForm();
        })
        .catch(error => console.error('Error:', error));
    });
});

function fetchAlumnos() {
    fetch('crud.php')
    .then(response => response.json())
    .then(data => {
        let tableBody = document.getElementById('alumnosTable');
        tableBody.innerHTML = '';

        data.forEach(alumno => {
            let row = document.createElement('tr');
            row.innerHTML = `
                <td>${alumno.nombre}</td>
                <td>${alumno.apellido}</td>
                <td>${alumno.boleta}</td>
                <td>${alumno.puntuacion}</td>
                <td>
                    <button onclick="editAlumno('${alumno.nombre}', '${alumno.apellido}', '${alumno.boleta}', ${alumno.puntuacion})">Editar</button>
                    <button onclick="deleteAlumno('${alumno.boleta}')">Eliminar</button>
                </td>
            `;
            tableBody.appendChild(row);
        });
    });
}

function editAlumno(nombre, apellido, boleta, puntuacion) {
    document.getElementById('nombre').value = nombre;
    document.getElementById('apellido').value = apellido;
    document.getElementById('boleta').value = boleta;
    document.getElementById('puntuacion').value = puntuacion;
}

function deleteAlumno(boleta) {
    let formData = new FormData();
    formData.append('action', 'delete');
    formData.append('boleta', boleta);

    fetch('crud.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        fetchAlumnos();
    })
    .catch(error => console.error('Error:', error));
}

function resetForm() {
    document.getElementById('alumnoForm').reset();
}
