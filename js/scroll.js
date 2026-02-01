// Seleccionar todos los servicios
const services = document.querySelectorAll('.service');

// Agregar un controlador de eventos de desplazamiento a la ventana del navegador
window.addEventListener('scroll', () => {
    // Obtener la posición actual de desplazamiento
    const scrollPosition = window.scrollY;

    // Iterar a través de cada servicio
    services.forEach(service => {
        // Verificar si el servicio está visible en la ventana del navegador
        if (service.offsetTop - window.innerHeight < scrollPosition) {
            // Verificar si el servicio ya se ha mostrado
            if (!service.classList.contains('is-visible')) {
                // Agregar la clase CSS para mostrar el servicio
                service.classList.add('is-visible');

                // Animate el servicio con requestAnimationFrame()
                let opacity = 0;
                const start = performance.now();
                const duration = 500;
                const animate = timestamp => {
                    opacity = Math.min(1, (timestamp - start) / duration);
                    service.style.opacity = opacity;
                    if (opacity < 1) {
                        requestAnimationFrame(animate);
                    }
                };
                requestAnimationFrame(animate);
            }
        } else {
            // Verificar si el servicio ya se ha ocultado
            if (service.classList.contains('is-visible')) {
                // Eliminar la clase CSS para ocultar el servicio

                // Animate el servicio con requestAnimationFrame()
                let opacity = 1;
                const start = performance.now();
                const duration = 100;
                const animate = timestamp => {
                    opacity = Math.max(0, 1 - (timestamp - start) / duration);
                    service.style.opacity = opacity;
                    if (opacity > 0) {
                        requestAnimationFrame(animate);
                    } else {
                        service.classList.remove('is-visible');
                    }
                };
                requestAnimationFrame(animate);
            }
        }
    });
});
