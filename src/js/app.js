const mobileMenuBtn = document.querySelector('#mobile-menu');
const cerrarMenuBtn = document.querySelector('#cerrar-menu');
const sidebar = document.querySelector('.sidebar');

if(mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', function() {
        sidebar.classList.add('mostrar');
    });
}

if(cerrarMenuBtn) {
    cerrarMenuBtn.addEventListener('click', function() {
        sidebar.classList.add('ocultar');
        setTimeout(() => {
            sidebar.classList.remove('mostrar');
            sidebar.classList.remove('ocultar');
        }, 1000);
    })
}

// Elimina la clase de mostar en un tamaño menor a tablets
const anchoPantalla = document.body.clientWidth;

window.addEventListener('resize', function() {
    const anchoPantalla = document.body.clientWidth;
    if(anchoPantalla >= 768) {
        sidebar.classList.remove('mostrar');
    }
});

(function() {
 
    // Reviso si la clase .btn-eliminar existe, así me evito errores en la consola.
    // Si la clase existe, significa que hay por lo menos 1 proyecto.
 
    if(document.querySelector('.btn-eliminar')) {
        const btnEliminar = document.querySelectorAll('.btn-eliminar');
        
        // Itero sobre todos los resultados
        btnEliminar.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                // Selecciono el formulario del boton
                const formulario = btn.parentNode;
 
                // Lanzo mi alerta sweetalert
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!'
                }).then((result) => {
                    // Valido el resultado, si es true, hago el submit al formulario.
                    if (result.value) {
                        formulario.submit();
                    }
                })
            } );
        } );
        
    }
 
})();