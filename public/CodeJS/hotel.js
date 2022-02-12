const nombre = document.getElementById('name')
const address = document.getElementById('direccion')
const email = document.getElementById('correo')
const foto = document.getElementById('imgen')
const password = document.getElementById('password')
const password2 = document.getElementById('password2')
const descripcion = document.getElementById('descripcion')
const mensaje = ""
const form = document.getElementById('form')

form.addEventListener('submit', validate => {
    if (nombre.value.length <= 0) {
        mensaje = "nombre del hotel"
    }
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '¡Debe escribir el!' + mensaje
    })
})