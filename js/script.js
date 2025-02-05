let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

document.getElementById("login-btn").addEventListener("click", function (event) {
    event.stopPropagation(); // Ngăn sự kiện lan đến document
    const userMenu = document.getElementById("user-menu");
    const loginMenu = document.getElementById("login-menu");

    if (userMenu) {
        userMenu.style.display = userMenu.style.display == "block" ? "none" : "block";
    } else if (loginMenu) {
        loginMenu.style.display = loginMenu.style.display == "block" ? "none" : "block";
    }
});

document.addEventListener("click", function (event) {
    const userMenu = document.getElementById("user-menu");
    const loginMenu = document.getElementById("login-menu");

    if (userMenu && !userMenu.contains(event.target) && event.target.id != "login-btn") {
        userMenu.style.display = "none";
    }

    if (loginMenu && !loginMenu.contains(event.target) && event.target.id != "login-btn") {
        loginMenu.style.display = "none";
    }
});

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    //cartItem.classList.remove('active');
}

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    //cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    //cartItem.classList.remove('active');
}

