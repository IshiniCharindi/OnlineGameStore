document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('gameForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        form.classList.add('was-validated');

        if (form.checkValidity()) {
            const formData = new FormData(form);

            axios.post('../Controller/AddGameController.php', formData)
                .then(response => {
                    console.log('Success:', response.data);
                    alert('Game added successfully');
                    form.reset();
                    form.classList.remove('was-validated');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding the game');
                });
        } else {
            console.log("Form not complete");
            event.stopPropagation();
        }
    }, false);
});

document.addEventListener("DOMContentLoaded", function() {
    const btnCart = document.getElementById("btnCart");
    const myModal = new bootstrap.Modal("#myModal");
    const cartCount = document.querySelector(".cart-count");
    const modalDiv = document.getElementById("myModal");
    const tbody = document.getElementById("tbody");

    let cartItems = [];

    btnCart.addEventListener("click", function() {
        myModal.show();
    });

    function addToCart(event) {
        const btn = event.target;
        btn.disabled = true;
        btn.innerHTML = 'Added to Cart';
        const id = btn.dataset.id;

        // Get game details from PHP
        const gameElement = btn.closest('.service-box');
        const title = gameElement.querySelector('h4').innerText;
        const price = parseFloat(gameElement.querySelector('h5').innerText.replace('LKR ', ''));
        const image = gameElement.querySelector('img').src;

        const product = {
            id: id,
            name: title,
            image: image,
            price: price,
            quantity: 1,
            amount: price,
        };

        cartItems.push(product);
        cartCount.textContent = cartItems.length;
        updateTotal();
    }

    modalDiv.addEventListener("shown.bs.modal", () => {
        let output = '';
        cartItems.forEach((product) => {
            output += `
                <tr>
                    <td><img src='${product.image}' class='img-fluid' width="100px"></td>
                    <td>${product.name}</td>
                    <td>${product.price.toFixed(2)}</td>
                    <td><input type='number' style='width:80px' class='form-control txtQty' value='${product.quantity}' min=1 data-id='${product.id}'></td>
                    <td>${product.amount.toFixed(2)}</td>
                    <td><button class='btn btn-danger btn-sm btnDelete' data-id='${product.id}'>
                       <img width="24" height="24" src="https://img.icons8.com/material-outlined/24/000000/waste.png" alt="waste"/>
                    </button></td>
                </tr>
            `;
        });

        tbody.innerHTML = output;

        const removeBtns = document.querySelectorAll(".btnDelete");
        removeBtns.forEach((btn) => {
            btn.addEventListener("click", removeFromCart);
        });

        const txtQtys = document.querySelectorAll(".txtQty");
        txtQtys.forEach((txt) => {
            txt.addEventListener("change", updateQty);
        });

        const proceedToPaymentBtn = document.getElementById("proceedToPayment");
        proceedToPaymentBtn.addEventListener("click", function() {
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            window.location.href = 'payment.php';
        });
    });

    function removeFromCart() {
        const id = this.dataset.id;
        const tr = this.closest("tr");
        cartItems = cartItems.filter((product) => product.id != id);
        tr.remove();
        updateTotal();
    }

    function updateQty() {
        const id = this.dataset.id;
        const newQty = this.value;
        const amountTd = this.parentElement.nextElementSibling;

        const productIndex = cartItems.findIndex((product) => product.id == id);

        cartItems[productIndex].quantity = newQty;
        cartItems[productIndex].amount = newQty * cartItems[productIndex].price;
        amountTd.textContent = (newQty * cartItems[productIndex].price).toFixed(2);
        updateTotal();
    }

    modalDiv.addEventListener("hidden.bs.modal", () => {
        cartCount.textContent = cartItems.length;
    });

    function updateTotal() {
        const total = cartItems.reduce((total, product) => total + product.amount, 0);
        const totalText = document.querySelector(".total");
        totalText.textContent = `Total Rs : ${total.toFixed(2)}`;
    }

    const addToCartButtons = document.querySelectorAll(".btnProduct");
    addToCartButtons.forEach((btn) => {
        btn.addEventListener("click", addToCart);
    });
});




