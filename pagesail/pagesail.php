<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" href="image/Black White Minimalist Initial Name A M Monogram Logo.jpg" type="jpg" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/pagesail.css">
    <link rel="stylesheet" href="../productpage/css/productstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+IE+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>A&M_ShoppingOnline</title>
    
</head>
<style>
    .sort-options {
        list-style: none;
        padding: 8px;
        margin: 0;
        background: #fff;
        border: 1px solid #ccc;
        position: absolute;
        z-index: 999;
        width: 180px;
        box-shadow: 0px 3px 8px rgba(0,0,0,0.1);
    }

    .sort-options li {
        padding: 8px;
        cursor: pointer;
    }

    .sort-options li:hover {
        background-color: #f2f2f2;
    }

    .sort-dropdown {
        position: relative;
    }
</style>

<body>
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
                    <li class="nav-item"><a href="pagesail.php" class="nav-link">Men's</a></li>
                    <li class="nav-item"><a href="pagesail.php" class="nav-link">Women's</a></li>
                    <li class="nav-item"><a href="pagesail.php" class="nav-link">Kid's</a></li>
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
                <a href="shoppingcart/shoppingcart.html">CHECKOUT</a>
            </div>
        </div>
    </div>
    <!-- End sidebar cart -->

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
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="pagesail.php">Men</a></li>
                        <li class="breadcrumb-item2 active" aria-current="page">
                            <span><a href="">New collection</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--  -->

    <div class="sider-main">
        <aside>
            <div class="Wrapper">
                <div class="row" style="margin-left: 10px; ">
                    <div class="col-lg-3" style="width:100%; margin-top: 40xp;">
                        <div class="sidebar">
                            <div class="widget">
                                <ul class="list-unstyled">
                                    <li><a href="#"><span>View All</span></a></li>
                                    <li><a href="#">Clothes</a></li>
                                    <li><a href="#">Shoes & Accessories</a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Offers</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">Best Styles</a></li>
                                    <li><a href="#">30% Discount</a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">New Collection</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">View All</a></li>
                                    <li><a href="#">T-shirts & tanks</a></li>
                                    <li><a href="#">Shoes & Accessories</a></li>
                                    <li><a href="#">Hoodies</a></li>
                                    <li><a href="#">SwimWear</a></li>
                                    <li><a href="#">Shorts</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Premium Selection</a></li>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Coats & Jackets</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </aside>
    </div>
    <main>
    <div class="section4 plp-header">
        <div class="text-wrapper">
            <h3>New Collection</h3>
        </div>
        <div class="sticky-filters-wrapper">
    <ul class="filters-body">
        <!-- Sort by -->
        <li aria-label="Sort by" class="page-filters sort-dropdown">
            <span class="main-filter-title-span" id="sortByButton">Sort by</span>
            <ul id="sortOptions" class="sort-options" style="display: none;">
                <li>Newest</li>
                <li>Price: Low to High</li>
                <li>Price: High to Low</li>
                <li>Best Sellers</li>
            </ul>
        </li>

        <!-- باقي الفلاتر -->
        <li aria-label="Price" class="page-filters"><span class="main-filter-title-span">Price</span></li>
        <li aria-label="Size" class="page-filters"><span class="main-filter-title-span">Size</span></li>
        <li aria-label="Color" class="page-filters"><span class="main-filter-title-span">Color</span></li>
        <li aria-label="Product-type" class="page-filters"><span class="main-filter-title-span">Product type</span></li>

        <li class="filters-icon d-flex"><span class="all-filters-text">All Filters</span></li>
        <li class="item-count-container d-flex">
            <div class="result-count">
                <p id="count-of-found-items-on-main">500 items</p>
            </div>
            <div class="grid-layout-selectors d-flex">
                <div class="three-column-grid">
                    <span><img src="../image/three-column-grid-secondary.svg" alt="" loading="lazy"></span>
                </div>
                <div class="four-column-grid selected">
                    <span><img src="../image/four-column-grid-primary.svg" alt="" loading="lazy"></span>
                </div>
            </div>
        </li>
    </ul>
</div>

    <div class="product-container columns-4" id="product-container">
        <!-- المنتجات هنا -->
    </div> 
    <div class="container">
        <div class="text-end">
            <button>See More</button>
        </div>
    </div>
</main>



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


    <a href="#" class="btn-primary"><i class="fa fa-angle-double-up"></i></a>
  
  <script>
    // التبديل بين عرض وإخفاء القائمة
    function toggleSortOptions() {
        const sortList = document.getElementById('sortOptions');
        sortList.style.display = (sortList.style.display === 'none' || sortList.style.display === '') ? 'block' : 'none';
    }

    // تطبيق الترتيب حسب الخيار
    function applySort(order) {
        // تعديل الرابط حسب نوع الترتيب
        fetch(`../php/load-products.php?sort=${order}`)
            .then(res => res.json())
            .then(data => {
                displayProducts(data); // دالة عرض المنتجات
                document.getElementById('sortOptions').style.display = 'none';
            })
            .catch(err => {
                console.error("خطأ في جلب البيانات:", err);
            });
    }

    // إغلاق القائمة لو ضغطت بره
    window.addEventListener('click', function(e) {
        const sort = document.querySelector('.sort-dropdown');
        if (!sort.contains(e.target)) {
            document.getElementById('sortOptions').style.display = 'none';
        }
    });

    // عرض المنتجات (دالة مثالية)
    function displayProducts(products) {
        const productContainer = document.getElementById('product-container');
        productContainer.innerHTML = ''; // تنظيف المحتوى الحالي
        products.forEach(product => {
            const productItem = document.createElement('div');
            productItem.classList.add('product-item');
            productItem.innerHTML = `
                <div class="product-item-info">
                    <h5>${product.name}</h5>
                    <p>Price: ${product.price} EGP</p>
                </div>
            `;
            productContainer.appendChild(productItem);
        });
    }
</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../java/script.js"></script>
    <script src="js/script.js"></script>
    <script src="../create account/js/createjava.js"></script>
    <script src="../productpage/js/productjava.js"></script>
    <script src="../login/js/loginjava.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>