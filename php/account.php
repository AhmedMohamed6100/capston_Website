<?php
session_start();

// التحقق إذا كان المستخدم مسجل دخول
if (!isset($_SESSION['user_id'])) {
    // إعادة التوجيه إلى صفحة تسجيل الدخول إذا لم يكن مسجل
    header("Location: login.php");
    exit();
}

// بيانات المستخدم من الجلسة
$username = $_SESSION['username'];
$email = $_SESSION['email'];

// تحديد مسار الصورة الافتراضية
$default_image = "../image/defultimage.jpg"; // المسار للصورة الافتراضية
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Info</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" href="image/Black White Minimalist Initial Name A M Monogram Logo.jpg" type="jpg" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../pagesail/css/pagesail.css">
    <link rel="stylesheet" href="../productpage/css/productstyle.css">
</head>

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
                        <a class="btn btn-secondary m-2" style="font-family: serif;" href="../php/account.php">
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
                        <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                        <li class="breadcrumb-item2 active" aria-current="page">
                            <span><a href="">info account</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="text-center mb-4">👤 Account Information</h2>

            <div class="text-center mb-4">
                <!-- مكان صورة الحساب -->
                <img src="<?php echo isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : $default_image; ?>"
                    alt="Profile Picture" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            </div>

            <div class="mb-3">
                <strong>Username:</strong>
                <p><?php echo htmlspecialchars($username); ?></p>
            </div>

            <div class="mb-3">
                <strong>Email:</strong>
                <p><?php echo htmlspecialchars($email); ?></p>
            </div>

            <div class="text-center">
                <a href="logout.php" class="btn btn-danger">Log Out</a>
            </div>
        </div>
    </div>
</body>

</html>
