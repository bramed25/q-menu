/**
 * Lógica del Panel Administrativo
 * Archivo: assets/js/admin-logic.js
 */

// 1. Botón Nuevo Platillo
const btnNew = document.querySelector('button i.bi-plus-lg').closest('button');
if(btnNew) {
    btnNew.addEventListener('click', () => {
        // En el futuro, esto abrirá un Modal de Bootstrap
        alert("🛠️ Próximamente: Abrir formulario 'Crear Platillo'");
    });
}

// 2. Botones de Eliminar (Confirmación)
const deleteButtons = document.querySelectorAll('.btn-outline-danger');
deleteButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        // Confirmación nativa (Salvavidas en Laravel)
        if(confirm("¿Estás seguro de eliminar este platillo? Esta acción no se puede deshacer.")) {
            // En Laravel aquí haremos submit de un formulario oculto
            const row = this.closest('tr');
            row.style.opacity = '0.5'; // Feedback visual temporal
            setTimeout(() => row.remove(), 500);
        }
    });
});

// 3. Botones de Editar
const editButtons = document.querySelectorAll('.btn-outline-secondary');
editButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        alert("🛠️ Próximamente: Cargar datos en el formulario de edición");
    });
});