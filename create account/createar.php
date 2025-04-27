<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الاتصال بقاعدة البيانات
    $conn = new mysqli("localhost", "root", "", "capston_test2");

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    // استقبال البيانات
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // التحقق من عدم وجود الإيميل مسبقًا
    $check_query = "SELECT id FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "⚠️ الإيميل مستخدم من قبل.";
    } else {
        // إضافة المستخدم
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            header("Location: ../login/login.php");
            exit();
        } else {
            echo "حدث خطأ أثناء إنشاء الحساب.";
        }

        $stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" href="../image/Black White Minimalist Initial Name A M Monogram Logo.jpg" type="jpg" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../productpage/css/productstyle.css">
    <link rel="stylesheet" href="../pagesail/css/pagesail.css">
    <link rel="stylesheet" href="../login/css/loginstyle.css">
    <title>Sign_in A&M</title>
</head>

<body>
    <!-- start header -->
    <header class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a href="../index.html" class="navbar-brand d-flex align-items-center">
                <img src="../image/Black White Minimalist Initial Name A M Monogram Logo.jpg" alt="logo"
                    style="height: 70px; width: 90px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a href="../index.html" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="../pagesail/pagesail.html" class="nav-link">Men's</a></li>
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
                <div class="buttons text-center">
                    <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="../login/login.html">
                        <i class="fa fa-sign-in-alt mr-1"></i> Login</a>
                    <a class="btn btn-outline-dark m-2" style="font-family: serif;" href="createar.html">
                        <i class="fa fa-user-plus mr-1"></i> Register</a>
                    <!-- ✅ زر فتح السلة -->
                    <button class="btn btn-outline-dark m-2" style="font-family: serif;" onclick="toggleCartSidebar()">
                        <i class="fa fa-shopping-cart"></i> Cart (0)
                    </button>
                </div>
            </div>


        </div>
    </header>
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
                <a href="../shoppingcart/shoppingcart.html">CHECKOUT</a>
            </div>
        </div>
    </div>
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
                            <span><a href="">Create account</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fuild4">
        <section class="wrapper">
            <!-- Login Section -->
            <div class="form login">
                <h1>Create account</h1>
                <form action="createar.php" method="POST">
                    <input type="text" name="username" id="username" required>
                    <label for="username">User Name</label>
                    <input type="email" name="email" id="email" required>
                    <label for="mail1">E-mail</label>
                    <input type="password" name="password" id="password" required>
                    <label for="pass1">Password</label>
                    <input type="submit" id="sign_up" value="Sign_Up">
                </form>
            </div>

            <!-- Social Login Section -->
            <div class="social-login-wrapper">
                <div class="social-login block">
                    <a href="https://www.facebook.com" class="login-facebook socialauth-button">
                        <img class="icon-login" src="../image/facebook-login.svg">
                        <span>Sign up with Facebook</span>
                    </a>
                    <a href="#" class="login-google socialauth-button">
                        <img class="icon-login" src="../image/login-google.svg">
                        <span>Sign up with Google</span>
                    </a>
                    <span class="account-text">Already have a account?</span>
                    <a href="../login/login.php" class="sign-up">
                        <button class="sign-up2">Sign in here</button>
                    </a>
                </div>
            </div>
        </section>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../java/script.js"></script>
    <script src="js/createjava.js"></script>
    <script src="../java/username.js"></script>
    <script src="../login/js/loginjava.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>