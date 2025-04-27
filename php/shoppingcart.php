<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="website icon" href="../image/Black White Minimalist Initial Name A M Monogram Logo.jpg" type="jpg" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../pagesail/css/pagesail.css">
<style>
    body {
        font-family: Arial, sans-serif;
        padding: 30px;
        background-color: #f9f9f9;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }


    .item-info {
        flex: 1;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantity-controls button {
        padding: 4px 8px;
        font-size: 16px;
        cursor: pointer;
    }

    .remove-btn {
        background-color: red;
        color: white;
        border: none;
        padding: 6px 10px;
        margin-top: 8px;
        cursor: pointer;
    }

    body {
        font-family: Arial, sans-serif;
        padding: 30px;
        background-color: #f9f9f9;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }

    .cart-header {
        display: grid;
        grid-template-columns: 2fr 1fr 2fr 1fr;
        font-weight: bold;
        padding: 10px 0;
        border-bottom: 2px solid #ccc;
        margin-bottom: 10px;
    }

    .cart-item {
        display: grid;
        grid-template-columns: 2fr 1fr 2fr 1fr;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        gap: 10px;
    }

    .remove-btn-icon {
        background: none;
        border: none;
        color: red;
        font-size: 16px;
        cursor: pointer;
        margin-right: 5px;
    }

    .cart-product {
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
    }

    .cart-product img {
        width: 60px;
        height: auto;
        border-radius: 6px;
    }


    .cart-product img {
        width: 60px;
        height: auto;
        border-radius: 6px;
    }


    .cart-item img {
        width: 80px;
        height: auto;
        margin-right: 15px;
        border-radius: 8px;
    }


    .form-container {
        flex: 1;
        min-width: 300px;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    .form-container h3 {
        margin-bottom: 20px;
        font-size: 22px;
    }

    .form-container label {
        display: block;
        margin-bottom: 6px;
        margin-top: 12px;
        font-weight: bold;
    }

    .form-container input,
    .form-container textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .form-container button {
        background-color: #111;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px;
    }

    .form-container button:hover {
        background-color: #333;
    }

    .total {
        margin-top: 20px;
        font-size: 18px;
        font-weight: bold;
        margin-left: 80%;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantity-controls button {
        padding: 4px 8px;
        font-size: 16px;
        cursor: pointer;
    }

    .remove-btn {
        background-color: red;
        color: white;
        border: none;
        padding: 6px 10px;
        margin-top: 8px;
        cursor: pointer;
    }

    .empty-cart-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70vh;
        width: 100%;
    }

    .empty-cart-message {
        text-align: center;
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .empty-cart-message h2 {
        font-size: 26px;
        margin-bottom: 20px;
    }

    .empty-cart-message a {
        display: inline-block;
        padding: 12px 20px;
        background-color: #111;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .empty-cart-message a:hover {
        background-color: #444;
    }


    .hidden {
        display: none !important;
    }

    input[type="radio"] {
        accent-color: #111;
        margin-right: 5px;
    }
</style>

<body>

    <header class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a href="../index.php" class="navbar-brand d-flex align-items-center">
                <img src="../image/Black White Minimalist Initial Name A M Monogram Logo.jpg" loading="lazy" alt="logo"
                    style="height: 70px; width: 90px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a href="../index.php" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="../pagesail/pagesail.php" class="nav-link">Men's</a></li>
                    <li class="nav-item"><a href="../pagesail.php" class="nav-link">Women's</a></li>
                    <li class="nav-item"><a href="../pagesail.php" class="nav-link">Kid's</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="pagesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <li><a href="#" class="dropdown-item">About Us</a></li>
                            <li><a href="#" class="dropdown-item">Products</a></li>
                            <li><a href="#" class="dropdown-item">Single Product</a></li>
                            <li><a href="#" class="dropdown-item">Contact Us</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="featuresDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Features</a>
                        <ul class="dropdown-menu" aria-labelledby="featuresDropdown">
                            <li><a href="#" class="dropdown-item">Features Page 1</a></li>
                            <li><a href="#" class="dropdown-item">Features Page 2</a></li>
                            <li><a href="#" class="dropdown-item">Features Page 3</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- ✅ زر الحساب / تسجيل الدخول -->
                <div class="buttons text-center">
                    <?php if (isset($_SESSION['username'])): ?>
                        <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="../php/account.php">
                            <i class="fa fa-user-circle mr-1"></i> <?php echo htmlspecialchars($_SESSION['username']); ?>
                        </a>
                        <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="../php/logout.php">
                            <i class="fa fa-sign-out-alt mr-1"></i> Logout
                        </a>
                    <?php else: ?>
                        <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="../login/login.php">
                            <i class="fa fa-sign-in-alt mr-1"></i> Login</a>
                        <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="../create account/createar.php">
                            <i class="fa fa-user-plus mr-1"></i> Register</a>
                    <?php endif; ?>

                    <!-- ✅ زر السلة دايمًا ظاهر -->
                    <button class="btn btn-secondary m-2" style="font-family: serif;" onclick="toggleCartSidebar()">
                        <i class="fa fa-shopping-cart"></i> Cart (0)
                    </button>
                </div>
            </div>
        </div>
    </header>
    <section class="top-sheet">
        <div class="group">
            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                <g>
                    <path
                        d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                    </path>
                </g>
            </svg>
            <input placeholder="Search For Products..." type="search" class="input" id="searchInput">
        </div>
        <div class="container-fuiled">
            <div class="wrap">
                <div class="breadcrumb list-inline">
                    <ul>
                        <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Men</a></li>
                        <li class="breadcrumb-item2 active" aria-current="page">
                            <span><a href="">Checkout</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
    <div class="container">
        <!-- السلة -->
        <!-- السلة -->
        <div class="cart-items" id="cartItemsContainer">
            <h3>Your Cart </h3>
            <!-- الهيدر الثابت -->
            <div class="cart-header">
                <span>Product</span>
                <span>Price</span>
                <span>Quantity</span>
                <span>Total</span>
            </div>
            <!-- المنتجات ستضاف هنا -->
        </div>


        <!-- فورم الدفع -->
        <div class="form-container">
            <h3>Billing Details</h3>
            <form action="../php/submit_order.php" method="post">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullName" name="fullName" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>

                <label for="address">Address</label>
                <textarea id="address" name="address" required></textarea>

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="note">Note (Optional)</label>
                <textarea id="note" name="note"></textarea>
                <label for="paymentMethod">Payment Method</label>
                <div style="display: flex; gap: 20px; margin-bottom: 10px;">
                    <label>
                        <input type="radio" name="paymentMethod" value="cash" checked> Cash
                    </label>
                    <label>
                        <input type="radio" name="paymentMethod" value="visa"> Visa
                    </label>
                </div>

                <!-- خانات الفيزا (مخفيين بالبداية) -->
                <div id="visaFields" class="hidden">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" name="cardNumber" maxlength="16" pattern="\d{16}" placeholder="1234 5678 9012 3456">

                    <label for="expiry">Expiry Date</label>
                    <input type="text" id="expiry" name="expiry" placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/?([0-9]{2})">

                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" maxlength="3" pattern="\d{3}" placeholder="123">
                </div>


                <button type="submit">Place Order</button>
            </form>
        </div>
    </div>
    <footer>
        <div class="footerLeft">
            <div class="footerMenu">
                <h1 class="fMenuTitle">About Us</h1>
                <ul class="fList">
                    <li class="fListItem">Company</li>
                    <li class="fListItem">Contact</li>
                    <li class="fListItem">Careers</li>
                    <li class="fListItem">Affiliates</li>
                    <li class="fListItem">Stores</li>
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Useful Links</h1>
                <ul class="fList">
                    <li class="fListItem">Support</li>
                    <li class="fListItem">Refund</li>
                    <li class="fListItem">FAQ</li>
                    <li class="fListItem">Feedback</li>
                    <li class="fListItem">Stories</li>
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Products</h1>
                <ul class="fList">
                    <li class="fListItem">Air Force</li>
                    <li class="fListItem">Air Jordan</li>
                    <li class="fListItem">Blazer</li>
                    <li class="fListItem">Crater</li>
                    <li class="fListItem">Hippie</li>
                </ul>
            </div>
        </div>
        <div class="footerRight">
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
                <div class="fMail">
                    <input type="text" placeholder="your@email.com" class="fInput">
                    <button class="fButton">Join!</button>
                </div>
            </div>
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Payment Methods:</h1>
                <div class="links1">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-paypal"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-apple-pay"></i>
                    <i class="fab fa-bitcoin"></i>
                </div>
                <h1 class="fMenuTitle">Follow Us:</h1>
                <div class="fIcons">
                    <img src="../image/facebook.png" alt="" class="fIcon">
                    <img src="../image/twitter.png" alt="" class="fIcon">
                    <img src="../image/instagram.png" alt="" class="fIcon">
                    <img src="../image/whatsapp.png" alt="" class="fIcon">
                </div>
            </div>
        </div>
        <div class="footerRightMenu2">
            <span class="copyright">@Design by:<span class="hover-Ahmed"> Ahmed Goda</span></span>
        </div>
    </footer>

<script>
        // عرض المنتجات من localStorage
        let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
        const cartContainer = document.getElementById("cartItemsContainer");

        function updateCartDisplay() {
            if (cartItems.length === 0) {
                cartContainer.innerHTML = `
                <div class="empty-cart-wrapper">
                    <div class="empty-cart-message">
                        <h2>🛒 Your cart is empty</h2>
                        <a href="../index.php">← Back to Shop</a>
                        </div>
                </div>`;
                document.querySelector(".form-container").classList.add("hidden");
                return;
            }

            // لو في منتجات، كمّل عرضهم
            cartContainer.innerHTML = `
                         <h3>Your Cart</h3>
              <div class="cart-header">
            <span>Product</span>
            <span>Price</span>
            <span>Quantity</span>
            <span>Total</span>
          </div>
          `;

            document.querySelector(".form-container").classList.remove("hidden");

            let total = 0;

            cartItems.forEach((item) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                const itemDiv = document.createElement("div");
                itemDiv.className = "cart-item";

                itemDiv.innerHTML = `
            <div class="cart-product">
                <button onclick="removeItem('${item.name}')" class="remove-btn-icon">
                    <i class="fas fa-trash-alt"></i>
                </button>
                <img src="${item.image}" alt="${item.name}">
                <span>${item.name}</span>
            </div>
            <span>$${item.price}</span>
            <div class="quantity-controls">
                <button onclick="changeQuantity('${item.name}', -1)">-</button>
                <span>${item.quantity}</span>
                <button onclick="changeQuantity('${item.name}', 1)">+</button>
            </div>
            <span><strong>$${itemTotal.toFixed(2)}</strong></span>
             `;

                cartContainer.appendChild(itemDiv);
            });

            const totalElement = document.createElement("div");
            totalElement.className = "total";
            totalElement.innerText = `Total: $${total.toFixed(2)}`;
            cartContainer.appendChild(totalElement);
                   }


        function changeQuantity(productName, amount) {
            const index = cartItems.findIndex((item) => item.name === productName);
            if (index !== -1) {
                cartItems[index].quantity += amount;
                if (cartItems[index].quantity <= 0) {
                    cartItems.splice(index, 1);
                }
                localStorage.setItem("cartItems", JSON.stringify(cartItems));
                updateCartDisplay();
            }
        }

        function removeItem(productName) {
            cartItems = cartItems.filter((item) => item.name !== productName);
            localStorage.setItem("cartItems", JSON.stringify(cartItems));
            updateCartDisplay();
        }

        // عند تحميل الصفحة
        window.onload = () => {
            updateCartDisplay();

            document.querySelector("form").addEventListener("submit", function(e) {
                const hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "cartItems";
                hiddenInput.value = JSON.stringify(cartItems);
                this.appendChild(hiddenInput);
            });
        };
        // ////////////////
        // عند تغيير طريقة الدفع
        const paymentRadios = document.querySelectorAll('input[name="paymentMethod"]');
        const visaFields = document.getElementById("visaFields");

        paymentRadios.forEach(radio => {
            radio.addEventListener("change", () => {
                if (radio.value === "visa" && radio.checked) {
                    visaFields.classList.remove("hidden");
                } else {
                    visaFields.classList.add("hidden");
                }
            });
        });

        // عند الإرسال، لو تم اختيار كاش نترك الحقول فارغة
        document.querySelector("form").addEventListener("submit", function() {
            const selectedPayment = document.querySelector('input[name="paymentMethod"]:checked').value;
            if (selectedPayment !== "visa") {
                document.getElementById("cardNumber").value = "";
                document.getElementById("expiry").value = "";
                document.getElementById("cvv").value = "";
            }
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../java/script.js"></script>
    <script src="../login/js/loginjava.js"></script>
    <script src="../product.json"></script>
    <script src="js/productjava.js"></script>
    <script src="../create account/js/createjava.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>