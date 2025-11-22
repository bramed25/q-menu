document.addEventListener('DOMContentLoaded', function() {
    
    const menuContainer = document.getElementById('menu-container');
    const loadingSpinner = document.getElementById('loading-spinner');

    // Usar la variable apiUrl definida en el Blade, o fallback
    const rutaApi = (typeof apiUrl !== 'undefined') ? apiUrl : '/api/menu';

    // 1. Cargar Datos
    fetch(rutaApi)
        .then(response => response.json())
        .then(response => {
            renderMenu(response.data);
        })
        .catch(error => {
            console.error('Error:', error);
            if(menuContainer) menuContainer.innerHTML = '<p class="text-center text-danger">Error al cargar menú.</p>';
        });

    // 2. Renderizar
    function renderMenu(platillos) {
        if(loadingSpinner) loadingSpinner.remove();
        if(menuContainer) menuContainer.innerHTML = '';

        platillos.forEach(item => {
            const cardHtml = `
            <div class="col platillo-item" data-category="${item.categoria}">
                <div class="card food-card h-100 shadow-sm">
                    <div class="food-img-wrap" style="height: 200px; overflow: hidden;">
                        <img src="${item.imagen}" alt="${item.nombre}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title fw-bold mb-0">${item.nombre}</h5>
                            <h5 class="text-primary fw-bold mb-0">$${item.precio}</h5>
                        </div>
                        <p class="card-text small text-muted flex-grow-1">${item.descripcion || ''}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <button class="btn btn-sm btn-light rounded-circle btn-tts"><i class="bi bi-volume-up"></i></button>
                            <button class="btn btn-primary btn-add rounded-circle" style="width:40px;height:40px;background-color:var(--accent-color);border:none;"
                                onclick="addToCart(${item.id}, '${item.nombre}', ${item.precio}, '${item.imagen}')">
                                <i class="bi bi-plus text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
            if(menuContainer) menuContainer.innerHTML += cardHtml;
        });
        
        // Activar filtros
        activateFilters();
    }

    function activateFilters() {
        const buttons = document.querySelectorAll('.category-pill');
        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                buttons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const category = btn.innerText.replace(/^[^\w\s]+ /, '').trim();
                const items = document.querySelectorAll('.platillo-item');
                items.forEach(item => {
                    const itemCat = item.getAttribute('data-category');
                    item.style.display = (category === 'Todo' || btn.innerText.includes('Todo') || itemCat === category) ? 'block' : 'none';
                });
            });
        });
    }
});