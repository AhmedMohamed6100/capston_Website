// let username = document.querySelector("#username");
// let email = document.querySelector("#email");
// let password = document.querySelector("#password");
// let register_btn = document.querySelector("#sign_up");

// register_btn.addEventListener("click", function (e) {
//     e.preventDefault();
//     if (username.value === "" || email.value === "" || password.value === "") {
//         alert("Please fill all fields.");
//     } else {
//         // تخزين بيانات المستخدم في LocalStorage
//         localStorage.setItem("username", username.value.trim());
//         localStorage.setItem("email", email.value.trim());
//         localStorage.setItem("password", password.value);

//         // مسح الحقول بعد التسجيل
//         username.value = "";
//         email.value = "";
//         password.value = "";

//         // عرض رسالة نجاح والتبديل إلى نموذج تسجيل الدخول
//         alert("Registration successful! Please log in now.");
//         window.location = "../../login/login.html"// التبديل إلى واجهة تسجيل الدخول
//     }
// });