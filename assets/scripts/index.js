window.onload = function () {
    GetTask();
};

var container = document.getElementById('container_tareas');


var FormTask = document.getElementById('CreateTask');

function CreateTask(event) {
    event.preventDefault();
    var Tarea = document.getElementById('TextTask').value;

    console.log(Tarea);

    fetch('./controllers/taskControllers.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'TextTask=' + encodeURIComponent(Tarea),
    })
        .then(response => response.text())
        .then(data => {
            console.log('Respuesta del servidor:', data);
            GetTask();
        })
        .catch(error => {
            console.error('Error en la petición:', error);
        });
}


function GetTask() {
    fetch('./controllers/TaskControllers.php')
        .then(response => response.json())
        .then(data => {
            console.log('Tareas:', data);


            var container = document.getElementById('container_tareas');

            container.innerHTML = '';


            if (data.length > 0) {
                data.forEach(task => {
                    var tareaElement = document.createElement('div');
                    tareaElement.classList.add('tarea');

                    var nombreDiv = document.createElement('div');
                    nombreDiv.textContent = task.Nombre;
                    var NameContainer = 'Estado'
                    var estadoDiv = document.createElement('div');
                    estadoDiv.className = "EstadoTask"
                    
                    var estadoP = document.createElement('p');
                    var terminadaP = document.createElement('p');
                    var IfCompleta = "Terminada"
                    if (task.Completada == 0) {
                        IfCompleta = "Sin termintar "
                    }
                    terminadaP.textContent = IfCompleta;
                    estadoDiv.textContent = "Estado"
                    var accionesDiv = document.createElement('div');
                    accionesDiv.className = "ActionTask"
                    var finishButton = document.createElement('p');
                    
                    finishButton.textContent = 'Terminar';
                    finishButton.onclick = function () { FinishTask(task.Id); };
                    var deleteButton = document.createElement('p');
                    deleteButton.textContent = 'Eliminar';
                    finishButton.className = "termina"
                    deleteButton.className = "delete"
                    deleteButton.onclick = function () { DeleteTask(task.Id); };

                    estadoDiv.appendChild(estadoP);
                    estadoDiv.appendChild(terminadaP);
                    accionesDiv.appendChild(finishButton);
                    accionesDiv.appendChild(deleteButton);
                    tareaElement.appendChild(nombreDiv);
                    tareaElement.appendChild(estadoDiv);
                    tareaElement.appendChild(accionesDiv);

                    container.appendChild(tareaElement);
                });
            } else {
                container.innerHTML = 'No se encontraron tareas.';
            }

        })
        .catch(error => {
            console.error('Error al obtener las tareas:', error);
        });
}

function DeleteTask(IdTask) {
    console.log("eliminada")
    fetch('./controllers/taskControllers.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'Delete_Id=' + encodeURIComponent(IdTask),
    })
        .then(response => response.text())
        .then(data => {
            console.log('Respuesta del servidor:', data);
            GetTask();
        })
        .catch(error => {
            console.error('Error en la petición:', error);
        });
}


function FinishTask(IdTask) {
    fetch('./controllers/taskControllers.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'Finish_Id=' + encodeURIComponent(IdTask),
    })
        .then(response => response.text())
        .then(data => {
            console.log('Respuesta del servidor:', data);
            GetTask();
        })
        .catch(error => {
            console.error('Error en la petición:', error);
        });
}


if (FormTask) {
    FormTask.addEventListener('submit', CreateTask);
}
