
// زر العودة إلى الأعلى
let upp = document.querySelector("footer>a:last-of-type");

window.onscroll = function () {
    if (this.scrollY >= 600) upp.classList.add("show");
    else upp.classList.remove("show");
};
//////////////////////////////

document.querySelectorAll('.carousel-control-next, .carousel-control-prev').forEach(button => {
    button.addEventListener('click', function () {
        console.log('Carousel changed!');
    });
});

// ////////////////////////
document.querySelectorAll('.dropdown-item').forEach((item) => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        const selectedValue = e.target.innerText;
        document.querySelector('.sort-list .value').innerText = selectedValue;
    });
});
//////////////////////
// Toggle السلة
function toggleCartSidebar() {
    document.getElementById("cartSidebar").classList.toggle("show");
}
// //////////////////////

///////////////////////////////////
let cartItems = JSON.parse(localStorage.getItem("cartItems")) || []; // استرجاع السلة من localStorage أو تهيئتها كمصفوفة فارغة

// تحديث السلة بالكامل
function updateCartDisplay() {
    const cartList = document.querySelector(".listCart");
    const checkoutSection = document.querySelector(".cart .checkout");
    const emptyMessage = document.getElementById("emptyCartMessage");

    cartList.innerHTML = "";
    checkoutSection.innerHTML = "";

    if (cartItems.length === 0) {
        emptyMessage.style.display = "block";  // عرض الرسالة
    } else {
        emptyMessage.style.display = "none";  // إخفاء الرسالة

        let total = 0;
        cartItems.forEach(item => {
            total += item.price * item.quantity;

            const cartItem = document.createElement("div");
            cartItem.classList.add("item");

            cartItem.innerHTML = `
                <img src="${item.image}" alt="Product Image">
                <div class="content">
                    <div class="name">${item.name}</div>
                    <div class="price">$${item.price} / ${item.quantity} product${item.quantity > 1 ? 's' : ''}</div>
                </div>
                <div class="quantity">
                    <button onclick="changeQuantity('${item.name}', -1)">-</button>
                    <span class="value">${item.quantity}</span>
                    <button onclick="changeQuantity('${item.name}', 1)">+</button>
                </div>
            `;

            cartList.appendChild(cartItem);
        });

        checkoutSection.innerHTML = `
            <a href="/task2/php/shoppingcart.php">CHECKOUT ($${total})</a>
        `;
    }


    updateCartIcon();
}

function updateCartIcon() {
    const cartCount = cartItems.reduce((total, item) => total + item.quantity, 0);  // إجمالي الكميات
    document.querySelector(".btn.btn-outline-dark.m-2 i.fa-shopping-cart").parentElement.innerHTML =
        `<i class="fa fa-shopping-cart"></i> Cart (${cartCount})`;  // تحديث الكارت مع العدد الإجمالي
}
function addToCart() {
    const name = document.querySelector('input[name="product_name"]').value;
    const price = parseFloat(document.querySelector('input[name="product_price"]').value);
    const image = document.querySelector('input[name="product_image"]').value;
    
    const quantity = parseInt(document.getElementById("counter").innerText);  // من العداد

    const item = {
        name,
        price, 
        quantity,
        image
    };

    const existingIndex = cartItems.findIndex(i => i.name === name);
    if (existingIndex !== -1) {
        cartItems[existingIndex].quantity += quantity;
    } else {
        cartItems.push(item);
    }

    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    updateCartDisplay();
    showAddToCartMessage();
}


// تغيير كمية المنتج
function changeQuantity(productName, amount) {
    const index = cartItems.findIndex(i => i.name === productName);
    if (index !== -1) {
        cartItems[index].quantity += amount;
        if (cartItems[index].quantity <= 0) {
            cartItems.splice(index, 1);
        }


        localStorage.setItem("cartItems", JSON.stringify(cartItems));

        updateCartDisplay();
    }
}


// عداد المنتج
function increment() {
    const counter = document.getElementById("counter");
    counter.innerText = parseInt(counter.innerText) + 1;
}

function decrement() {
    const counter = document.getElementById("counter");
    const current = parseInt(counter.innerText);
    if (current > 1) counter.innerText = current - 1;
}

// زر الرجوع للتسوق
function goShopping() {
    window.location.href = "/task2/pagesail/pagesail.php"; // ← غيّرها حسب صفحة المنتجات عندك
}

// عند تحميل الصفحة، استرجاع السلة وعرضها
window.onload = function () {
    updateCartDisplay();
};
// /////////////////////////
function showAddToCartMessage() {
    const message = document.getElementById("cartMessageId");
    message.classList.add("show");

    setTimeout(() => {
        message.classList.remove("show");
    }, 2500);
}
/////////////////////