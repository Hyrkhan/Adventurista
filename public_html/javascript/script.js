const navbarMenu = document.querySelector(".navbar .links")
const menuBtn = document.querySelector(".menu-btn");
const hideMenuBtn = navbarMenu.querySelector(".close-btn");
const showPopupBtn = document.querySelector(".log");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = document.querySelector(".form-popup .close-btn");
const loginSignupLink = document.querySelectorAll(".form-box .bottom-link a");




// showing the menu on mobile phone
menuBtn.addEventListener("click", () => {
        navbarMenu.classList.toggle("show-menu");
});

hideMenuBtn.addEventListener("click", () => menuBtn.click());


// it will show the login form popup
showPopupBtn.addEventListener("click", () => {
        // console.log("Button clicked");
    document.body.classList.toggle("show-popup");

});

// it will hide the login form popup
hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

loginSignupLink.forEach(link => {
        link.addEventListener("click", (e) => {
                e.preventDefault();
                console.log(link.id);
               formPopup.classList[link.id === "signup-link" ? 'add' : 'remove'] ("show-signup");
        }); 
});

function validation() {

     const name = document.getElementById("name").value;
     const username = document.getElementById("username").value;
     const password = document.getElementById("pass").value;
     const password2 = document.getElementById("pass2").value;

     document.getElementById("name-error").innerHTML = "";
     document.getElementById("username-error").innerHTML = "";
     document.getElementById("password-error").innerHTML = "";
     document.getElementById("password2-error").innerHTML = "";


let isValid = true; 

if (name === "") {
        document.getElementById("name-error").innerHTML = "* Some fields are still empty";
        isValid = false;
}

if (username === "") {
        document.getElementById("username-error").innerHTML = "* Some fields are still empty";
        isValid = false;
}

if (password === "") {
        document.getElementById("password-error").innerHTML = "* Some fields are still empty";
        isValid = false;
}

if (password2 !== password) {
        document.getElementById("password2-error").innerHTML = "Password do not match.";
        isValid = false;
}
return isValid;

}





// document.getElementById("button").addEventListener("click", function(){

//         document.querySelector(".form-popup").style.display = "flex";
// });

// const showPopupBtn = document.querySelector(".log");
// const popup = document.getElementById("popup");

// showPopupBtn.addEventListener("click", () => {
//     popup.style.display = "block";
// });

// function closePopup() {
//     popup.style.display = "none";
// }