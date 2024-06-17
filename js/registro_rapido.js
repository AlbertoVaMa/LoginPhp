document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registroRapidoForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        fetch('save_petition.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert('Alumno registrado correctamente');
                this.reset();
            } else {
                alert('Hubo un error al registrar el alumno');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
