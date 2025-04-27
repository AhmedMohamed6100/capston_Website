<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" href="image/Black White Minimalist Initial Name A M Monogram Logo.jpg" type="jpg" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>A&M_ShoppingOnline</title>
    <link rel="stylesheet" href="css/productstyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../pagesail/css/pagesail.css">
</head>

<body>
    <!-- Start header -->
    <?php session_start(); ?>
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
                    <button class="btn btn-outline-dark m-2" style="font-family: serif;" onclick="toggleCartSidebar()">
                        <i class="fa fa-shopping-cart"></i> Cart (0)
                    </button>
                </div>
            </div>
        </div>
    </header>


    <!-- ✅ السلة الجانبية -->
    <div class="cart" id="cartSidebar">
        <h2>CART</h2>
        <div class="listCart">
            <!-- المنتجات هتضاف هنا -->
        </div>

        <div id="emptyCartMessage" class="empty-cart-message">
            <h4>🛒 Cart is empty</h4>
            <button onclick="goShopping()">Go Shopping</button>
        </div>


        <div class="buttons">
            <div class="btn btn-outline-dark m-2" style="font-family: serif;" class="close"
                onclick="toggleCartSidebar()">CLOSE</div>
            <div class="checkout">
            <a href="../php/shoppingcart.php">CHECKOUT</a>
            </div>
        </div>
    </div>
    <!-- End sidebar cart -->

    <div class="container-fuiled-info">
        <div class="imag-container d-flex">
            <div class="imgs">
                <div class="image-container">
                    <img src="../image/chair.webp" alt="One Life Graphic T-shirt">
                    <img src="../image/chair1.webp" alt="One Life Graphic T-shirt">
                    <img src="../image/chair2.webp" alt="One Life Graphic T-shirt">
                    <img src="../image/chair3.webp" alt="One Life Graphic T-shirt">
                </div>
            </div>
            <div class="imginfo">
                <h3>Relaxed Fit Hoodie</h3>
                <h5>$212</h5>
                <br>
                <div class="pdp-swatches__field">
                    <div class="pdp-swatches__field__label">
                        <span class="pdp-swatches__field__label--text">Colors:</span>
                    </div>
                    <div class="pdp-swatches__options1">
                        <div class="dropin-text-swatch__container1">
                            <input type="radio" id="color-red" name="color">
                            <label for="color-red" style="color: red;"></label>
                        </div>
                        <div class="dropin-text-swatch__container1">
                            <input type="radio" id="color-blue" name="color">
                            <label for="color-blue" style="color: blue;"></label>
                        </div>
                        <div class="dropin-text-swatch__container1">
                            <input type="radio" id="color-green" name="color">
                            <label for="color-green" style="color: green;"></label>
                        </div>
                        <div class="dropin-text-swatch__container1">
                            <input type="radio" id="color-yellow" name="color">
                            <label for="color-yellow" style="color: yellow;"></label>
                        </div>
                        <div class="dropin-text-swatch__container1">
                            <input type="radio" id="color-black" name="color">
                            <label for="color-black" style="color: black;"></label>
                        </div>
                    </div>
                </div>

                <div class="pdp-swatches__field">
                    <div class="pdp-swatches__field__label">
                        <span class="pdp-swatches__field__label--text">Size:</span>
                    </div>
                    <div class="pdp-swatches__options">
                        <div class="dropin-text-swatch__container">
                            <input type="radio" id="size-xs" name="size">
                            <label for="size-xs">XS</label>
                        </div>
                        <div class="dropin-text-swatch__container">
                            <input type="radio" id="size-s" name="size">
                            <label for="size-s">S</label>
                        </div>
                        <div class="dropin-text-swatch__container">
                            <input type="radio" id="size-m" name="size">
                            <label for="size-m">M</label>
                        </div>
                        <div class="dropin-text-swatch__container">
                            <input type="radio" id="size-l" name="size">
                            <label for="size-l">L</label>
                        </div>
                        <div class="dropin-text-swatch__container">
                            <input type="radio" id="size-xl" name="size">
                            <label for="size-xl">XL</label>
                        </div>
                        <div class="dropin-text-swatch__container">
                            <input type="radio" id="size-xxl" name="size">
                            <label for="size-xxl">XXL</label>
                        </div>
                    </div>
                </div>

                <div class="counter-container">
                    <button class="counter-btn" onclick="decrement()">-</button>
                    <span class="counter-value" id="counter">1</span>
                    <button class="counter-btn" onclick="increment()">+</button>
                </div>

                <div class="pdp-product__buttons modified-flex">
                    <div>
                        <form>
                            <input type="hidden" name="product_name" value="chair">
                            <input type="hidden" name="product_price" value="400">
                            <input type="hidden" name="product_image" value="../image/chair.webp">
                            <input type="hidden" name="quantity" id="product-quantity" value="1">

                            <button id="cartMessage" class="dropin-button" type="button" onclick="addToCart()">
                                <span>ADD TO CART</span>
                            </button>
                            <div id="cartMessageId">✅ Added to cart</div>
                        </form>

                    </div>
                    <div>
                        <div class="dropin-button-bar">
                            <div class="dropin-button-bar2">
                                <button aria-label="ADD TO FAVOURITES">
                                    <span class="icon4">
                                        <img src="../image/heart.png" alt="wishlist-empty-pdp">
                                    </span>
                                    <span class="wishlist-label">ADD TO FAVOURITES</span>
                                </button>
                            </div>
                            <button class="dropin-button2">
                                <a class="social-share-link" href="#">
                                    <span class="icon4 icon-share">
                                        <img src="../image/share.png" alt="share">
                                    </span>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section3 py-5">
        <div class="container-fluid">
            <!-- العناوين العلوية -->
            <div class="section-heading text-center mb-4">
                <h2 class="mb-3 text-danger" style="font-family:Arial, Helvetica, sans-serif; font-size: xx-large;">You
                    might also like</h2>
                <div class="category-buttons d-flex justify-content-center gap-3">
                    <button class="btn btn-outline-dark active">For you</button>
                    <button class="btn btn-outline-dark">Women</button>
                    <button class="btn btn-outline-dark">Men</button>
                    <button class="btn btn-outline-dark">Kids</button>
                    <button class="btn btn-outline-dark">Baby</button>
                    <button class="btn btn-outline-dark">Home</button>
                    <button class="btn btn-outline-dark">Sport</button>
                    <button class="btn btn-outline-dark">Sale</button>
                </div>
            </div>
            <!-- Carousel -->
            <div id="productCarousel" class="container-fluid">
                <div class="carousel-inner">
                    <!-- المجموعة الأولى -->
                    <div class="carousel-item active">
                        <div class="row ">
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <a href="#"> <img src="../image/product1.webp" alt="Relaxed Fit Hoodie"
                                            class="img-fluid rounded mb-3"></a>
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,199.00</p>
                                    <p class="text-danger fw-bold">EGP 839.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <a href="#"> <img src="../image/product2.webp" alt="Relaxed Fit Hoodie"
                                            class="img-fluid rounded mb-3"></a>
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,099.00</p>
                                    <p class="text-danger fw-bold">EGP 769.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <a href="#"> <img src="../image/product3.webp" alt="Relaxed Fit Hoodie"
                                            class="img-fluid rounded mb-3"></a>
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,099.00</p>
                                    <p class="text-danger fw-bold">EGP 769.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <a href="#"> <img src="../image/product4.webp" alt="Relaxed Fit Hoodie"
                                            class="img-fluid rounded mb-3"></a>
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,099.00</p>
                                    <p class="text-danger fw-bold">EGP 769.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <img src="../image/product5.webp" alt="Relaxed Fit Hoodie"
                                        class="img-fluid rounded mb-3">
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,199.00</p>
                                    <p class="text-danger fw-bold">EGP 839.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <img src="../image/product6.webp" alt="Relaxed Fit Hoodie"
                                        class="img-fluid rounded mb-3">
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,099.00</p>
                                    <p class="text-danger fw-bold">EGP 769.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <img src="../image/product7.webp" alt="Relaxed Fit Hoodie"
                                        class="img-fluid rounded mb-3">
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,099.00</p>
                                    <p class="text-danger fw-bold">EGP 769.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <img src="../image/product8.webp" alt="Relaxed Fit Hoodie"
                                        class="img-fluid rounded mb-3">
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,099.00</p>
                                    <p class="text-danger fw-bold">EGP 769.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <img src="../image/product1.webp" alt="Relaxed Fit Hoodie"
                                        class="img-fluid rounded mb-3">
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,199.00</p>
                                    <p class="text-danger fw-bold">EGP 839.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <img src="../image/product1.webp" alt="Relaxed Fit Hoodie"
                                        class="img-fluid rounded mb-3">
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,199.00</p>
                                    <p class="text-danger fw-bold">EGP 839.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <img src="../image/product7.webp" alt="Relaxed Fit Hoodie"
                                        class="img-fluid rounded mb-3">
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,099.00</p>
                                    <p class="text-danger fw-bold">EGP 769.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="product-item text-center">
                                    <img src="../image/product7.webp" alt="Relaxed Fit Hoodie"
                                        class="img-fluid rounded mb-3">
                                    <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <h5>Relaxed Fit Hoodie</h5>
                                    <p class="text-muted text-decoration-line-through">EGP 1,099.00</p>
                                    <p class="text-danger fw-bold">EGP 769.00</p>
                                    <p class="text-success">(SAVE 30%)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <!-- End header -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../login/js/loginjava.js"></script>
    <script src="js/productjava.js"></script>
    <script src="../java/aloneofindex.js"></script>
    <script src="../pagesail/js/script.js"></script>
    <script src="../create account/js/createjava.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>