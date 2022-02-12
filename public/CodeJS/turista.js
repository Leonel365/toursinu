const nombre = document.getElementById('name')
const firstName = document.getElementById('firstName1')
const firstName2 = document.getElementById('firstName2')
const email = document.getElementById('email')
const password = document.getElementById('password')
const password2 = document.getElementById('password2')
const form = document.getElementById('form')

form.addEventListener('submit', validate => {
    if (nombre.value.length <= 0) {
        alert('Debe poner un nombre')
    }
})