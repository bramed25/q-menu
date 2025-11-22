/**
 * Funciones para la Pantalla KDS (Cocina)
 */

// 1. Pantalla Completa
function toggleFullScreen() {
  if (!document.fullscreenElement) {
    document.documentElement.requestFullscreen();
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    }
  }
}

// 2. Completar Orden (Animación y borrado)
function completeOrder(btn) {
    let ticket = btn.closest('.col-xl-3'); // Buscar la tarjeta padre
    
    // Efecto visual
    ticket.style.transition = "all 0.5s";
    ticket.style.opacity = "0";
    ticket.style.transform = "scale(0.8)";
    
    // Eliminar del DOM
    setTimeout(() => {
        ticket.remove();
    }, 500);
}