let allProducts = [];

document.addEventListener('DOMContentLoaded', () => {
    const productContainer = document.getElementById('product-container');
    const sortDropdown = document.getElementById('sort-dropdown');

    if (!productContainer) {
        console.error("❌ لم يتم العثور على عنصر 'product-container'");
        return;
    }

    function displayProducts(products) {
        productContainer.innerHTML = '';

        products.forEach(product => {
            const productItem = document.createElement('div');
            productItem.classList.add('product-item1');

            productItem.innerHTML = `
                <div class="product-image-container2">
                    <div class="item-images">
                        <a href="${product.product_link}">
                            <img src="${product.image_url}" alt="${product.name}" class="clone">
                        </a>
                    </div>
                    <div class="wishlist-button-wrapper">
                        <div class="wishlist-icon"></div>
                    </div>

                    <div class="product-item-info">
                        <h6>${product.name}</h6>
                        <div class="product-item-price">
                            <p class="item-price">EGP ${product.price}</p>
                        </div>
                    </div>

                </div>
            `;

            productContainer.appendChild(productItem);
        });
    }

    // جلب البيانات
    fetch('../php/load-products.php')
        .then(res => res.json())
        .then(data => {
            allProducts = data;
            displayProducts(allProducts);
        })
        .catch(err => console.error("خطأ في جلب البيانات:", err));

    // حدث اختيار ترتيب الأسعار
    if (sortDropdown) {
        sortDropdown.addEventListener('change', () => {
            let sortedProducts = [...allProducts]; // ننسخ الأصل عشان ماندمرهوش

            if (sortDropdown.value === 'asc') {
                sortedProducts.sort((a, b) => a.price - b.price);
            } else if (sortDropdown.value === 'desc') {
                sortedProducts.sort((a, b) => b.price - a.price);
            }

            displayProducts(sortedProducts);
        });
    }
});
