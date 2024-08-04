document.addEventListener('DOMContentLoaded', function() {
    fetchProducts();
    fetchCart();
});

function fetchProducts() {
    fetch('https://127.0.0.1:8000/api/products')
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('product-list');
            productList.innerHTML = ''; // Clear existing products before appending new ones
            if (data['hydra:member']) {
                data['hydra:member'].forEach(product => {
                    const productDiv = document.createElement('div');
                    productDiv.classList.add('product');
                    productDiv.innerHTML = `
                        <h3>${product.name}</h3>
                        <p>${product.description}</p>
                        <p>Price: ${product.price}</p>
                        <p>Grade: ${product.grade}</p>
                        <img src="${product.image}" alt="${product.name}">
                        <br>
                        <label for="rating-${product.id}">Rate:</label>
                        <select id="rating-${product.id}" onchange="rateProduct(${product.id}, this.value)">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button onclick="addToCart(${product.id})">Add to Cart</button>
                    `;
                    productList.appendChild(productDiv);
                });
            } else {
                productList.innerHTML = '<p>No products found.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching products:', error);
            const productList = document.getElementById('product-list');
            productList.innerHTML = '<p>Error fetching products. Check the console for details.</p>';
        });
}

function fetchCart() {
    fetch('https://127.0.0.1:8000/api/order_products')
        .then(response => response.json())
        .then(data => {
            const cartList = document.getElementById('cart-list');
            cartList.innerHTML = ''; // Clear existing cart items before appending new ones
            if (data['hydra:member'].length > 0) {
                data['hydra:member'].forEach(item => {
                    fetch(`https://127.0.0.1:8000${item.product}`)
                        .then(response => response.json())
                        .then(product => {
                            const cartItemDiv = document.createElement('div');
                            cartItemDiv.classList.add('cart-item');
                            cartItemDiv.innerHTML = `
                                <h4>${product.name}</h4>
                                <p>Quantity: ${item.quantity}</p>
                                <button onclick="removeFromCart(${item.id})">Remove</button>
                            `;
                            cartList.appendChild(cartItemDiv);
                        });
                });
            } else {
                cartList.innerHTML = '<p>Your cart is empty.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching cart:', error);
            const cartList = document.getElementById('cart-list');
            cartList.innerHTML = '<p>Error fetching cart. Check the console for details.</p>';
        });
}

function rateProduct(productId, grade) {
    fetch(`https://127.0.0.1:8000/api/products/${productId}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/merge-patch+json'
        },
        body: JSON.stringify({ grade: parseInt(grade) })
    })
    .then(response => response.json())
    .then(data => {
        alert(`Product rated with grade ${grade}`);
        fetchProducts(); // Refresh product list
    });
}

function addToCart(productId) {
    fetch('https://127.0.0.1:8000/api/order_products', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/ld+json'
        },
        body: JSON.stringify({
            product: `/api/products/${productId}`,
            quantity: 1,
            order: '/api/orders/1' // Assuming you have an order with ID 1
        })
    })
    .then(response => response.json())
    .then(data => {
        alert('Product added to cart');
        fetchCart(); // Refresh cart list
    });
}

function removeFromCart(orderProductId) {
    fetch(`https://127.0.0.1:8000/api/order_products/${orderProductId}`, {
        method: 'DELETE'
    })
    .then(response => {
        if (response.ok) {
            alert('Product removed from cart');
            fetchCart(); // Refresh cart list
        } else {
            alert('Failed to remove product from cart');
        }
    });
}
