//console.log("Starting");

const botones = document.querySelectorAll('.bEliminar');

botones.forEach(boton => {
    boton.addEventListener('click', function () {
        const matricula = this.dataset.matricula;

        const confirm = window.confirm('Are you sure you want to continue?');

        if (confirm) {
            //Solicitud AJAX
            HttpRequest("http://localhost/mvc/consulta/deleteAlumno/"+matricula, function(){
                //console.log("🚀 ~ file: main.js ~ line 15 ~ HttpRequest ~ responseText", this.responseText)
                var divRespuesta = document.getElementById('respuesta');
                divRespuesta.innerHTML = this.responseText;

                const tbody = document.querySelector("#tbody-alumnos");
                const fila = document.querySelector("#fila-"+matricula);

                tbody.removeChild(fila);
            });
        }

    });
});

function HttpRequest(url,callback) {
    const http = new XMLHttpRequest();
    http.open('GET', url);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(http);
        }
    }

}