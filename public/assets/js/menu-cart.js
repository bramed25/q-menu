/**
 * Lógica del Carrito de Compras (Cliente)
 * Archivo: assets/js/menu-cart.js
 */

let cart = [];

// 1. Agregar producto al carrito
function addToCart(id, name, price, image) {
    // Buscar si ya existe para solo sumar cantidad
    let existingItem = cart.find(item => item.id === id);
    
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ id: id, name: name, price: price, image: image, quantity: 1 });
    }
    
    updateCartUI();

    // Feedback visual
    var bsOffcanvas = new bootstrap.Offcanvas(document.getElementById('cartSidebar'));
    bsOffcanvas.show();
    
    // Opcional: Abrir el carrito automáticamente al agregar
    // var bsOffcanvas = new bootstrap.Offcanvas(document.getElementById('cartSidebar'));
    // bsOffcanvas.show();
    
    // Feedback visual simple (Toast o alerta)
    // alert("Agregado: " + name); 
}

// 2. Eliminar o restar producto
function removeFromCart(name) {
    let itemIndex = cart.findIndex(item => item.name === name);
    if (itemIndex > -1) {
        cart[itemIndex].quantity--;
        if (cart[itemIndex].quantity === 0) {
            cart.splice(itemIndex, 1); // Borrar si llega a 0
        }
    }
    updateCartUI();
}

// 3. Renderizar el HTML del carrito y actualizar totales
function updateCartUI() {
    const container = document.getElementById('cart-items-wrapper');
    const emptyMsg = document.getElementById('empty-cart-msg');
    const totalElement = document.getElementById('cart-total');
    const floatingTotal = document.getElementById('floating-total');

    // Limpiar lista visual
    container.innerHTML = '';

    let total = 0;
    let count = 0;

    if (cart.length === 0) {
        if(emptyMsg) container.appendChild(emptyMsg);
        container.innerHTML = `
            <div class="text-center text-muted mt-5" id="empty-cart-msg">
                <i class="bi bi-basket2 display-1 opacity-25"></i>
                <p class="mt-3">Tu canasta está vacía</p>
            </div>`;
    } else {
        cart.forEach(item => {
            total += item.price * item.quantity;
            count += item.quantity;

            // Plantilla del Item en el Carrito
            let itemHTML = `
            <div class="d-flex align-items-center mb-3 bg-white p-2 rounded border shadow-sm">
                <img src="${item.image}" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="ms-3 flex-grow-1">
                    <h6 class="mb-0 fw-bold text-dark">${item.name}</h6>
                    <small class="text-muted">$${item.price} c/u</small>
                </div>
                <div class="d-flex align-items-center bg-light rounded-pill border px-1">
                    <button class="btn btn-sm text-danger p-1" onclick="removeFromCart('${item.name}')"><i class="bi bi-dash-lg"></i></button>
                    <span class="mx-2 fw-bold small">${item.quantity}</span>
                    <button class="btn btn-sm text-success p-1" onclick="addToCart('${item.name}', ${item.price}, '${item.image}')"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>`;
            container.innerHTML += itemHTML;
        });
    }

    // Formatear dinero
    totalElement.innerText = `$${total.toFixed(2)}`;
    
    // Actualizar botón flotante
    if(floatingTotal) floatingTotal.innerText = `${count} ítems • $${total.toFixed(2)}`;
}

// 4. Simular Envío a Cocina
// 4. Enviar Orden Real a Laravel
function sendOrder() {
    if(cart.length === 0) {
        alert("¡Tu carrito está vacío!");
        return;
    }
    
    const note = document.getElementById('kitchenNotes').value;
    // Obtener la mesa seleccionada del select (si no existe, usa "1")
    const mesaSelect = document.querySelector('select.form-select');
    const mesa = mesaSelect ? mesaSelect.value : "1";
    
    // Calcular total limpio
    const totalText = document.getElementById('cart-total').innerText.replace('$', '');
    const total = parseFloat(totalText);

    // Preparar datos para la API
    const orderData = {
        mesa: "Mesa " + mesa,
        total: total,
        nota_general: note,
        detalles: cart // Enviamos el array del carrito directo
    };

    // Confirmación
    if(!confirm(`¿Confirmar pedido para Mesa ${mesa} por $${total}?`)) return;

    // Petición AJAX (Fetch)
    fetch('/api/ordenar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(orderData)
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert("✅ ¡Orden Recibida en Cocina! ID: #" + data.orden_id);
            // Limpiar todo
            cart = [];
            document.getElementById('kitchenNotes').value = "";
            updateCartUI();
            var bsOffcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('cartSidebar'));
            bsOffcanvas.hide();
        } else {
            alert("❌ Error: " + (data.message || "No se pudo procesar"));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("❌ Error de conexión con el servidor");
    });
}