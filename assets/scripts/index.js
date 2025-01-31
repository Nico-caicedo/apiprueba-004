

var container = document.getElementById('container_tareas')


container = document.write('hola mundo desde js')

var Tarea = document.getElementById('text')
var FormTask = documenbt.getElementById('CreateTask')

function CreateTask(){
   FormTask =  e.preventDefault()

   
    console.log('hola mundo')
    fetch('controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'text=' + encodeURIComponent(Tarea),
    })
    .then(response => response.text()) // Si el controlador devuelve texto
    .then(data => {
        console.log('Respuesta del servidor:', data);
    })
    .catch(error => {
        console.error('Error en la petición:', error);
    });
}





FormTask.addEventListener('submit', CreateTask);