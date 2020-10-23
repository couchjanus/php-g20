'use strict';

const sidebar = document.querySelector(".sidebar");
const cartItems = document.querySelector(".cart-items");
const clearCart = document.querySelector(".clear-cart");

class Storage {
    static saveStorageItem(key, item) {
        localStorage.setItem(key, JSON.stringify(item));
    }

    static getStorageItem(key) {
        return JSON.parse(localStorage.getItem(key));
    }

    static getProduct(id) {
        let products = JSON.parse(localStorage.getItem("products"));
        return products.find(product => product.id === +(id));
    }
    static getProducts() {
        let products = JSON.parse(localStorage.getItem("products"));
        return products;
    }
    static saveCart(cart) {
        localStorage.setItem("basket", JSON.stringify(cart));
    }
    static getCart() {
        return localStorage.getItem("basket")
            ? JSON.parse(localStorage.getItem("basket"))
            : [];
    }
}
class Product {
    makeModel(products) {
        return products.map(item => {
            const name = item.name;
            const price = item.price;
            const id = item.id;
            const image = "/assets/images/products/"+item.picture;
            const category = item.categoryName;
            return { name, price, id, image, category };
        });
    }
}

class Category {
    makeModel(categories) {
        return categories.map(item => {
            const id = item.id;
            const name = item.name;
            const image = "/assets/images/products/categories/"+item.picture;
            return {
                id,
                name,
                image
            };
        });
    }
}

class App {
    cart = [];
    countItems = document.querySelector('.count-items');
    cartTotal = document.querySelector(".cart-total");

    // constructor
    constructor() {
        const toggleBtn = document.querySelector(".cart-toggle");
        const closeBtn = document.querySelector(".close-btn");
        const socialGroup = [
            {
                liClass: '',
                aClass: 'footer-link twitter',
                icon: 'fab fa-twitter',
                capture: 'Twitter'
            },
            {
                liClass: '',
                aClass: 'footer-link facebook',
                icon: 'fab fa-facebook',
                capture: 'Facebook'
            },
            {
                liClass: '',
                aClass: 'footer-link finstagram',
                icon: 'fab fa-instagram',
                capture: 'Instagram'
            },
            {
                liClass: '',
                aClass: 'footer-link google-plus',
                icon: 'fab fa-google-plus',
                capture: 'Google'
            },
        ];
        closeBtn.addEventListener("click", () => this.closeCart());
        toggleBtn.addEventListener("click", () => this.openCart());
        this.navbarToggle();
        document.querySelector('footer div.row').lastElementChild.innerHTML = this.makeLiGroup(socialGroup, 'list-unstyled footer-socials social-icon', '<h6 class="text-uppercase">Social media</h6>');
        this.cart = Storage.getCart();
    }

    // methods

    openCart() {
        document.querySelector(".overlay").classList.add("active");
        sidebar.classList.toggle("show-sidebar");
        cartItems.innerHTML = '';
        this.cart = Storage.getCart();
        this.populateCart(this.cart);
        this.setCartTotal(this.cart);
    }

    closeCart() {
        sidebar.classList.remove("show-sidebar");
        document.querySelector(".overlay").classList.remove("active");
    }

    makeShowcase(products) {
        let result = '';
        products.forEach(item => {
            result += this.createProductMarkup(item);
        });
        document.querySelector('.showcase').innerHTML = result;
    }

    navbarToggle() {
        const navToggle = document.querySelector(".nav-toggle");
        const linksContainer = document.querySelector(".links-container");
        const links = document.querySelector(".links");

        navToggle.addEventListener("click", function () {
            const linksHeight = links.getBoundingClientRect().height;
            const containerHeight = linksContainer.getBoundingClientRect().height;
            if (containerHeight === 0) {
                linksContainer.style.height = `${linksHeight}px`;
            } else {
                linksContainer.style.height = 0;
            }
        });
    }

    makeLiGroup = (group, ulClass, header = '') => {
        let lis = '';
        group.forEach(function (item) {
            lis += `<li class="${item.liClass}">
                <a class="${item.aClass}" href="#">
                    <i class="${item.icon}"></i> ${item.capture}
                </a>
            </li>`;
        });

        return `
            ${header}
            <ul class="${ulClass}">
                ${lis}
            </ul>`;
    }

    createProductMarkup(data) {
        const overlayGroup = [
            {
                liClass: 'list-inline-item m-0 p-0 like-this',
                aClass: 'btn btn-sm btn-outline-dark',
                icon: 'fas fa-heart',
                capture: ''
            },
            {
                liClass: 'list-inline-item m-0 p-0 add-to-cart',
                aClass: 'btn btn-sm btn-outline-dark',
                icon: 'fas fa-dolly-flatbed',
                capture: 'Add to cart'
            },
            {
                liClass: 'list-inline-item m-0 p-0 view-this',
                aClass: 'btn btn-sm btn-outline-dark',
                icon: 'fas fa-expand',
                capture: ''
            },
        ];

        return `
        <div class="col-lg-4 col-sm-6">
               <div class="product text-center" data-id="${data.id}">
                   <div class="position-relative mb-3">
                       <a class="d-block" href="detail.html">
                           <img class="img-fluid w-100 product-img" src="${data.image}" alt="...">
                        </a>
                        <div class="product-overlay">${this.makeLiGroup(overlayGroup, 'mb-0 list-inline')}</div>
                   </div>
                   <h6><a class="reset-anchor product-name" href="detail.html">${data.name}</a></h6>
                   <p class="small text-muted product-price" data-price="${data.price}">${data.price}</p>
               </div>
           </div>
        `
    }

    addCartItem(item) {
        const div = document.createElement("div");
        div.classList.add("cart-item");
        div.setAttribute('id', item.id);
        div.innerHTML = `<!-- cart item -->
            <div class="picture product-img">
                <img src="${item.image}" alt="${item.name}" class="img-fluid w-100">
            </div>
            <div class="product-name p-auto">${item.name}</div>
            <div class="remove-btn text-right">
                <a class="reset-anchor m-auto" href="#">
                    <i class="fas fa-trash-alt" data-id=${item.id}></i>
                </a>
            </div>
            <div class="quantity">
                <div class="border d-flex justify-content-around mx-auto">
                    <i class="fas fa-caret-left inc-dec-btn" data-id=${item.id}></i>
                    <span class="border-1 p-1 amount">${item.amount}</span>
                    <i class="fas fa-caret-right inc-dec-btn" data-id=${item.id}></i>
                </div>
            </div>
            <div class="price">
                $<span class="product-price">${item.price}</span>
            </div>
        `;
        cartItems.appendChild(div);
    }
    getProduct = (id) => Storage.getProducts().find(product => product.id === +(id));

    addToCarts() {
        const addToCartButtons = [...document.querySelectorAll(".add-to-cart")];
        addToCartButtons.forEach(button => {
            button.addEventListener("click", event => {
                let product = this.getProduct(event.target.closest('.product').getAttribute('data-id'));

                let exist = this.cart.some(elem => elem.id === product.id);
                if (exist) {
                    this.cart.forEach(elem => {
                        if (elem.id === product.id) {
                            elem.amount += 1;
                        }
                    })
                } else {
                    let cartItem = { ...product, amount: 1 };
                    this.cart = [...this.cart, cartItem];
                }
                Storage.saveCart(this.cart);
                this.setCartTotal(this.cart);
            });
        });
    }

    clear() {
        this.cart = [];
        while (cartItems.children.length > 0) {
            cartItems.removeChild(cartItems.children[0]);
        }
        this.setCartTotal(this.cart);
        Storage.saveCart(this.cart);
    }

    filterItem = (cart, curentItem) => cart.filter(item => item.id !== +(curentItem.dataset.id));

    findItem = (cart, curentItem) => cart.find(item => item.id === +(curentItem.dataset.id));

    renderCart() {

        clearCart.addEventListener("click", () => this.clear());

        cartItems.addEventListener("click", event => {
            if (event.target.classList.contains("fa-trash-alt")) {
                this.cart = this.filterItem(this.cart, event.target);
                this.setCartTotal(this.cart);
                Storage.saveCart(this.cart);
                cartItems.removeChild(event.target.parentElement.parentElement.parentElement);
            } else if (event.target.classList.contains("fa-caret-right")) {
                let tempItem = this.findItem(this.cart, event.target);
                tempItem.amount = tempItem.amount + 1;
                this.setCartTotal(this.cart);
                Storage.saveCart(this.cart);
                event.target.previousElementSibling.innerText = tempItem.amount;
            } else if (event.target.classList.contains("fa-caret-left")) {
                let tempItem = this.findItem(this.cart, event.target);
                tempItem.amount = tempItem.amount - 1;
                if (tempItem.amount > 0) {
                    event.target.nextElementSibling.innerText = tempItem.amount;
                } else {
                    this.cart = this.filterItem(this.cart, event.target);
                    cartItems.removeChild(event.target.parentElement.parentElement.parentElement);
                }
                this.setCartTotal(this.cart);
                Storage.saveCart(this.cart);
            }
        });

        
    }

    // new code
    setCartTotal(cart) {
        this.cartTotal.textContent = parseFloat(cart.reduce((previous, current) => previous + current.price * current.amount, 0).toFixed(2));
        this.countItems.textContent = cart.reduce((previous, current) => previous + current.amount, 0);
    }

    populateCart(cart) {
        cart.forEach(item => this.addCartItem(item));
    }

    fetchData(resource, model) {
        const baseUrl = `/api/${resource}`;

        fetch(baseUrl)
            .then((response) => {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' + response.status);
                    return;
                }
                response.json().then((dataJson) => {
                    Storage.saveStorageItem(resource, model.makeModel(dataJson))
                });
            })
            .catch((err) => {
                console.log('Fetch Error :-S', err);
            });

    }

    createCategory(category) {
        return `
        <a class="category-item" data-category="${category.name}" href="#">
            <img class="img-fluid category-img" src="${category.image}" alt="${category.name}"><strong class="category-item-title category-item" data-category="${category.name}">${
            category.name.replace(category.name[0], category.name[0].toUpperCase())}</strong>
        </a>`;
    }

    makeCategories1(categories) {
        let categoryLength = (categories.length>3)? 3: categories.length;  
        for (let i = 0; i < categoryLength; i++) {
            let div = document.createElement('div');
            div.className = "col-md-4";
            if (i < 2) {
                div.classList.add(['mb-4', 'mb-md-0']);
            }
            if (i == 0) {
                div.innerHTML = this.createCategory(categories[i]);
            } else if (i == 1) {
                div.innerHTML = this.createCategory(categories[i]) + this.createCategory(categories[i + 1]);
            } else if (i == 2) {
                div.innerHTML = this.createCategory(categories[i + 1]);
            }
            document.querySelector('.categories').append(div);
        }
    }

    makeCategories(categories) {
        for (let i = 0; i < categories.length; i++) {
            let div = document.createElement('div');
            div.classList.add(['col-md-4']);
            div.innerHTML = this.createCategory(categories[i]);
            document.querySelector('.categories').append(div);
        }
    }

    renderCategory() {
        const categories = document.querySelector('.categories');
        if(categories){
            categories.addEventListener('click', (event) => {
                event.preventDefault();
                const target = event.target;

                if (target.classList.contains('category-item')) {
                    const category = target.dataset.category;
                    const categoryFilter = items => items.filter(item => item.category.includes(category));
                    this.makeShowcase(categoryFilter(Storage.getStorageItem("products")));
                } else {
                    this.makeShowcase(Storage.getStorageItem("products"));
                }
                this.addToCarts();
                this.renderCart();
            });
        }
    }

}
// ==============================
(function () {
    const app = new App();
    
    if (document.querySelector('.collections')) {
        app.fetchData("categories", new Category());
        app.makeCategories(Storage.getStorageItem("categories"));
    }

    app.fetchData("products", new Product());
    if(document.querySelector('.showcase')) {
        app.makeShowcase(Storage.getStorageItem("products"));
    }
    app.addToCarts();
    app.renderCart();
    app.renderCategory();

    // checkout__now
    if (document.querySelector(".checkout__now")) {
        document.querySelector(".checkout__now").addEventListener("click", () => {
            let inCart = [];
            app.cart.forEach(item => {
                inCart.push({
                id: item.id,
                amount: item.amount
                });
            });
            console.log(inCart);
            fetch("/api/cart", {
                method: "POST", // *GET, POST, PUT, DELETE, etc.
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                cart: inCart,
                })
            })
            .then(function(response) {
                app.clear();
                document.location.replace("/profile");
            })
            .catch(function(error) {
                console.log(error);
            });
        });
    }

})();
