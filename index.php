<?php
$conn = new mysqli("localhost", "root", "", "capston_test1");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM products");
$products = [];

while($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$chunked = array_chunk($products, 4); // كل مجموعة 4 منتجات
?>
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="productpage/css/productstyle.css">
    <title>A&M_ShoppingOnline</title>
</head>

<body>
    <?php session_start(); ?>
    <header class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a href="../index.php" class="navbar-brand d-flex align-items-center">
                <img src="image/Black White Minimalist Initial Name A M Monogram Logo.jpg" loading="lazy" alt="logo"
                    style="height: 70px; width: 90px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="pagesail/pagesail.php" class="nav-link">Men's</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Women's</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Kid's</a></li>
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
                        <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="php/account.php">
                            <i class="fa fa-user-circle mr-1"></i> <?php echo htmlspecialchars($_SESSION['username']); ?>
                        </a>
                        <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="php/logout.php">
                            <i class="fa fa-sign-out-alt mr-1"></i> Logout
                        </a>
                    <?php else: ?>
                        <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="login/login.php">
                            <i class="fa fa-sign-in-alt mr-1"></i> Login</a>
                        <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="create account/createar.php">
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
                <a href="productpage/shoppingcart.php">CHECKOUT</a>
            </div>
        </div>
    </div>
    <!-- End sidebar cart -->
    <!-- start home -->
    <home>
        <div class="container-fulid">
            <div class="Home">
                <div class="overlay-home">
                    <div class="Details1">
                        <div class="parent-home">
                            <div class="title-home">
                                <h4>We Are A&M Shop</h4>
                                <span>DENIM FOR ALL TIME &amp; FIND THE BEST STYLES</span>
                            </div>
                            <div class="button2">
                                <a href="#">Purchase Now!</a>
                                <a href="pagesail/pagesail.php">Shop Now</a>
                            </div>
                        </div>
                    </div> <!-- /parent-home -->
                </div> <!--/overlay-home-->
            </div> <!-- /Home -->
        </div>
    </home>
    <!-- End home -->
    <!-- start secction1 -->
    <section>
        <div class="banner" id="top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-content">
                            <div class="Details1">
                                <div class="inner-content">
                                    <h4>We Are A&M Shop</h4>
                                    <span>DENIM FOR ALL TIME &amp; FIND THE BEST STYLES</span>
                                    <div class="button2">
                                        <a href="#">Purchase Now!</a>
                                    </div>
                                </div>
                                <img src="image/left-banner-image.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="Details1">
                                            <div class="inner-content">
                                                <h4>Women</h4>
                                                <span>Best Clothes For Women</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Women</h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit
                                                        incid.</p>
                                                    <div class="button2">
                                                        <a href="#">Discover More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="image/baner-right-image-01.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="Details1">
                                            <div class="inner-content">
                                                <h4>Men</h4>
                                                <span>Best Clothes For Men</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Men</h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit
                                                        incid.</p>
                                                    <div class="button2">
                                                        <a href="#">Discover More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="image/baner-right-image-02.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="Details1">
                                            <div class="inner-content">
                                                <h4>Kids</h4>
                                                <span>Best Clothes For Kids</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Kids</h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit
                                                        incid.</p>
                                                    <div class="button2">
                                                        <a href="#">Discover More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="image/baner-right-image-03.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="Details1">
                                            <div class="inner-content">
                                                <h4>Accessories</h4>
                                                <span>Best Trend Accessories</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Accessories</h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit
                                                        incid.</p>
                                                    <div class="button2">
                                                        <a href="#">Discover More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="image/baner-right-image-04.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End section1 -->
    <!-- start secti0n2 -->
    <section class="section2">
        <div class="container mx-auto my-2">
            <div class="content">
                <div class="Details2">
                    <div class="image-wrapper">
                        <img src="image/cover2.webp" width="1060vh" height="1000px" alt="">
                        <div class="content-info">
                            <h2>The Wellness Edit</h2>
                            <p>Make self-care a daily ritual with elevated essentials</p>
                            <div class="button1">
                                <a href="pagesail/pagesail.html">Shop Now</a>
                                <a href="#">More_info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End section2 -->
    <!-- start section3 -->
    <section class="section3 py-5">
        <div class="container-fluid">
            <!-- العناوين العلوية -->
            <div class="section-heading text-center mb-4">
                <h2 class="mb-3">Trending Now</h2>
                <div class="category-buttons d-flex justify-content-center gap-3">
                    <button class="btn btn-outline-dark active">For you</button>
                    <button class="btn btn-outline-dark">Women</button>
                    <button h class="btn btn-outline-dark">Men</button>
                    <button class="btn btn-outline-dark">Kids</button>
                    <button class="btn btn-outline-dark">Baby</button>
                    <button class="btn btn-outline-dark">Home</button>
                    <button class="btn btn-outline-dark">Sport</button>
                    <button class="btn btn-outline-dark">Sale</button>
                </div>
            </div>
            <!-- Carousel -->
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($chunked as $index => $group): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="row justify-content-center">
                                <?php foreach ($group as $product):
                                    $className = strtolower(str_replace(' ', '-', $product['name']));
                                ?>
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="product-item text-center <?php echo $className; ?>">
                                            <img src="<?php echo $product['image_url']; ?>"
                                                alt="<?php echo htmlspecialchars($product['name']); ?>"
                                                class="img-fluid rounded mb-3">
                                            <div class="icons">
                                                <i class="fas fa-heart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="far fa-eye"></i>
                                            </div>
                                            <h5><?php echo htmlspecialchars($product['name']); ?></h5>
                                            <p class="text-muted text-decoration-line-through">EGP 1,199.00</p>
                                            <p class="text-danger fw-bold">EGP 839.00</p>
                                            <p class="text-success">(SAVE 30%)</p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- أزرار التمرير -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- End section3 -->
    <div class="container-fluid d-flex" style="margin-left: 170px;">
        <div class="feature">
            <img src="image/icons8-free-shipping-50.png" alt="" loading="lazy" class="featureIcon">
            <span class="featureTitle">FREE SHIPPING</span>
            <span class="featureDesc">Free worldwide shipping on all orders.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="image/icons8-return-order-24.png" loading="lazy" alt="">
            <span class="featureTitle">30 DAYS RETURN</span>
            <span class="featureDesc">No question return and easy refund in 14 days.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="image/icons8-gift-card-50.png" loading="lazy" alt="">
            <span class="featureTitle">GIFT CARDS</span>
            <span class="featureDesc">Buy gift cards and use coupon codes easily.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="image/icons8-contact-us-50.png" loading="lazy" alt="">
            <span class="featureTitle">CONTACT US!</span>
            <span class="featureDesc">Keep in touch via email and support system.</span>
        </div>
    </div>
    <!-- start section4 -->
    <section class="section4">
        <div class="container-fluid2">
            <div class="gallery">
                <div class="galleryItem">
                    <h1 class="galleryTitle">Be Yourself!</h1>
                    <img src="image/women-02.jpg" alt="" loading="lazy" class="galleryImg">
                </div>
                <div class="galleryItem">
                    <img src="image/product7.webp" alt="" loading="lazy" class="galleryImg">
                    <h1 class="galleryTitle">This is the First Day of Your New Life</h1>
                </div>
                <div class="galleryItem">
                    <h1 class="galleryTitle">Just Do it!</h1>
                    <img src="image/product8.webp" alt="" loading="lazy" class="galleryImg">
                </div>
            </div>
            <div class="newSeason">
                <div class="nsItem">
                    <img src="image/pexels-alipazani-2836486.jpg" loading="lazy" alt="" class="nsImg">
                </div>
                <div class="nsItem">
                    <h3 class="nsTitleSm">WINTER NEW ARRIVALS</h3>
                    <h1 class="nsTitle">New Season</h1>
                    <h1 class="nsTitle">New Collection</h1>
                    <a href="#nav">
                        <button class="nsButton">CHOOSE YOUR STYLE</button>
                    </a>
                </div>
                <div class="nsItem">
                    <img src="image/pexels-blitzboy-1040945.jpg" loading="lazy" alt="" class="nsImg">
                </div>
            </div>
        </div>
    </section>
    <!-- End section4 -->
    <!-- start footer -->
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
                    <img src="image/facebook.png" alt="" class="fIcon">
                    <img src="image/twitter.png" alt="" class="fIcon">
                    <img src="image/instagram.png" alt="" class="fIcon">
                    <img src="image/whatsapp.png" alt="" class="fIcon">
                </div>
            </div>
        </div>
        <div class="footerRightMenu2">
            <span class="copyright">@Design by:<span class="hover-Ahmed"> Ahmed Goda</span></span>
        </div>
    </footer>
    <a href="#" class="btn-primary"><i class="fa fa-angle-double-up"></i></a>
    <!-- End footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="java/script.js"></script>
    <script src="login/js/loginjava.js"></script>
    <script src="product.json"></script>
    <script src="productpage/js/productjava.js"></script>
    <script src="create account/js/createjava.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>