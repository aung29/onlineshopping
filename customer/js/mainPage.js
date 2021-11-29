// UI
const navbuttons = document.querySelector(".navbuttons");

const navbar = document.querySelector(".navbar");

const lines1 = document.querySelector(".lines1"),
    lines2 = document.querySelector(".lines2"),
    lines3 = document.querySelector(".lines3");

// product
const productlists = document.querySelectorAll(".product-lists");
const fruits = document.querySelectorAll(".categorys.fruits"),
    vegetables = document.querySelectorAll(".categorys.vegetables"),
    meats = document.querySelectorAll(".categorys.meat");

const home = document.querySelector(".homes"),
    shop = document.querySelector(".shops"),
    about = document.querySelector(".abouts"),
    signin = document.querySelector(".signin");

const cartI = document.querySelector(".cart-i"),
    back = document.querySelector(".back");

const cartDetails = document.querySelector(".cart-details");
const cardContainers = document.querySelector(".cart-container");
const count = document.querySelector(".count");
const productDelete = document.querySelector(".delete");

const carts = document.querySelectorAll(".cart");


let ordername = document.getElementsByClassName("ordername");
let orderqyantity = document.getElementsByClassName("cart-number");

const proceedbutton = document.querySelector(".proceedbutton");
const warntext = document.querySelector(".warntext");

let qunatity = 1;
let currentquantity;
let minus = 1;
let countJs = 0;
let orignalQuantity = 0;
let alreadyhave = false;
let cid;
let incorrect = 0,
    minutes = 4;

let stringdata;
let customerinfor = [];

// inital state check login

let checklogin = () => {
    let email = localStorage.getItem("email"),
        password = localStorage.getItem("password");
    console.log(email, password);
    if (email != null && password != null) {
        document.getElementById("signin").style.display = "none";
        document.getElementById("nav-signin").style.display = "none";
        document.getElementById("user").style.display = "block";
        let customer = {
            "loginuseremail": email,
            "loginPassword": password
        };

        $.ajax({
            type: "POST",
            url: "controller/initiallogincontroller.php",
            data: { send: JSON.stringify(customer) },
            success: function(res) {
                let data = JSON.parse(res);
                customerinfor.push(data[0][0]);
                console.log(customerinfor);
                document.getElementById("profile-name").innerText = customerinfor[0].name;
                document.getElementById("profile-email").innerText = customerinfor[0].email;
                document.getElementById("profile-phone").innerText = customerinfor[0].phone;
            },
            error: function(err) {
                console.log(err);
            }
        });
    } else {
        document.getElementById("signin").style.display = "flex";
        document.getElementById("nav-signin").style.display = "block";
        document.getElementById("user").style.display = "none";
    }
}

// call back
checklogin();


// .............................Start Navbar Section

navbuttons.addEventListener("click", () => {
    lines1.classList.toggle("changes");
    lines2.classList.toggle("changes");
    lines3.classList.toggle("changes");
});

// navbar
window.addEventListener("scroll", (e) => {
    const getScrollY = window.scrollY;
    if (getScrollY >= 360) {
        navbar.classList.add("scroll");
    } else {
        navbar.classList.remove("scroll");
    }
});

// link
window.addEventListener("scroll", () => {
    const getScrollY = window.scrollY;
    if (getScrollY >= 0 && getScrollY <= 530) {
        home.classList.add("actives");
        shop.classList.remove("actives");
        about.classList.remove("actives");
        signin.classList.remove("actives");
    } else if (getScrollY >= 950 && getScrollY <= 2050) {
        home.classList.remove("actives");
        shop.classList.add("actives");
        about.classList.remove("actives");
        signin.classList.remove("actives");
    } else if (getScrollY >= 2050 && getScrollY <= 3200) {
        home.classList.remove("actives");
        shop.classList.remove("actives");
        about.classList.add("actives");
        signin.classList.remove("actives");
    } else if (getScrollY >= 3200 && getScrollY <= 3900) {
        home.classList.remove("actives");
        shop.classList.remove("actives");
        about.classList.remove("actives");
        signin.classList.add("actives");
    } else {
        home.classList.remove("actives");
        shop.classList.remove("actives");
        about.classList.remove("actives");
        signin.classList.remove("actives");
    }
});

// .............................End Navbar Section

// ..............start cart
let checkCount = () => {
    if (count.innerText == 0) {
        count.style.display = "none";
    } else {
        count.style.display = "block";
    }
}

// cart append
carts.forEach((cart) => {
    cart.addEventListener("click", (e) => {
        let productname = e.path[2].childNodes[2].childNodes[0].innerHTML,
            price = e.path[2].childNodes[2].childNodes[2].innerHTML,
            pid = e.path[2].childNodes[2].childNodes[4].innerHTML,
            img = e.path[2].childNodes[1].childNodes[0].currentSrc;
        alreadyhave = false;
        warntext.classList.remove("show");

        // check same product
        for (let i = 0; i < ordername.length; i++) {
            if (productname == ordername[i].innerHTML) {
                orderqyantity[i].innerText = ++orderqyantity[i].innerText;
                alreadyhave = true;
            };
        };
        // append cart .
        if (alreadyhave == false) {
            cardContainers.innerHTML += `
                <div id="${countJs}" class='buycart d-flex justify-content-around align-items-center'>
                        <div>
                            <img src='${img}' class='cart-img' width='50px' />
                        </div>
                        <p class="ordername mt-3" >${productname}</p>
                        <p class="mt-3"><span>${price}</span> Ks</p>
                        <div class="d-flex align-items-center">
                            <i class='fas fa-minus '></i>
                            <p class='cart-number text-center mx-2 mt-3'>1</p>
                            <i class='fas fa-plus '></i>
                        </div>
                        <p class="d-none">${pid}</p>
                        <div>
                            <i class='fas fa-times delete'></i>
                        </div>
                </div>
            `;
            count.innerText = ++count.innerText;
            checkCount();
            countJs++;
        };
    });
});

// cart delete
$(document).on("click", ".delete", function(e) {
    let cartId = e.originalEvent.path[2].id;
    count.innerText = --count.innerText;
    checkCount();
    $(`#${cartId}`).remove();
    if (ordername.length == 0) {
        countJs = 0;
    }
})

// cart quantity minus
$(document).on("click", ".fa-minus", function(e) {
    currentquantity = e.originalEvent.path[1].childNodes[3].innerText;
    if (currentquantity > 1) {
        e.originalEvent.path[1].childNodes[3].innerText = --currentquantity;
    }
})

// cart quantity plus
$(document).on("click", ".fa-plus", function(e) {
    currentquantity = e.originalEvent.path[1].childNodes[3].innerText;
    if (currentquantity < 15) {
        e.originalEvent.path[1].childNodes[3].innerText = ++currentquantity;
    }
})


// cart toggle
cartI.addEventListener("click", () => {
    warntext.classList.remove("show");
    cartDetails.classList.toggle("appear");
});

// cart disapper
back.addEventListener("click", () => {
    warntext.classList.remove("show");
    cartDetails.classList.remove("appear");
})

// proceedbutton
const buycart = document.querySelectorAll(".buycart");

proceedbutton.addEventListener("click", (e) => {
    let itemcount = 1;
    let items = [];
    let buycartlength = e.path[2].childNodes[5].childElementCount;
    if (buycartlength > 0) {
        warntext.classList.remove("show");
        for (let i = 1; i <= buycartlength; i++) {
            let item = {
                'img': `${e.path[2].childNodes[5].childNodes[itemcount].childNodes[1].childNodes[1].currentSrc}`,
                'pname': `${e.path[2].childNodes[5].childNodes[itemcount].childNodes[3].innerText}`,
                'pid': `${e.path[2].childNodes[5].childNodes[itemcount].childNodes[9].innerText}`,
                'price': `${e.path[2].childNodes[5].childNodes[itemcount].childNodes[5].childNodes[0].innerText}`,
                'quantity': `${e.path[2].childNodes[5].childNodes[itemcount].childNodes[7].childNodes[3].innerText}`,
            };
            items.push(item);
            itemcount += 2;
        }
        items.push(customerinfor);
        stringdata = JSON.stringify(items);
        window.location.href = `controller/checkoutcontroller.php?data=${stringdata}`;
    } else {
        warntext.classList.add("show");
    }
})


// ..............end cart

// ..............start profile

document.querySelector(".fa-user").addEventListener("click", () => {
    document.querySelector(".profile").classList.toggle("show");
})

document.querySelector(".exits").addEventListener("click", () => {
    customerinfor = [];
    document.querySelector(".profile").classList.add("show");
    document.getElementById("signin").style.display = "flex";
    document.getElementById("nav-signin").style.display = "block";
    document.getElementById("user").style.display = "none";
    localStorage.removeItem("email");
    localStorage.removeItem("password");
    localStorage.removeItem("customerid");
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: 'Signed Out successfully'
    })
})

// ..............end profile

//.............................Start Product Section

productlists.forEach((productlist) => {
    productlist.addEventListener("click", (e) => {
        let datafilter = productlist.getAttribute("data-filter");
        console.log(datafilter);
        productlists.forEach((productlist) => {
            productlist.classList.remove("actives");
        });
        e.target.classList.add("actives");
        switch (datafilter) {
            case "all":
                console.log("hay");
                fruits.forEach((fruit) => {
                    fruit.style.display = "inline-block";
                });
                vegetables.forEach((vegetable) => {
                    vegetable.style.display = "inline-block";
                });
                meats.forEach((meat) => {
                    meat.style.display = "inline-block";
                });
                break;
            case "fruit":
                fruits.forEach((fruit) => {
                    fruit.style.display = "inline-block";
                });
                vegetables.forEach((vegetable) => {
                    vegetable.style.display = "none";
                });
                meats.forEach((meat) => {
                    meat.style.display = "none";
                });
                break;
            case "vegetable":
                fruits.forEach((fruit) => {
                    fruit.style.display = "none";
                });
                vegetables.forEach((vegetable) => {
                    vegetable.style.display = "inline-block";
                });
                meats.forEach((meat) => {
                    meat.style.display = "none";
                });
                break;
            case "meat":
                fruits.forEach((fruit) => {
                    fruit.style.display = "none";
                });
                vegetables.forEach((vegetable) => {
                    vegetable.style.display = "none";
                });
                meats.forEach((meat) => {
                    meat.style.display = "inline-block";
                });
                break;
        }
    })
})

//.............................End Product Section

//............................. START REVIEW SECTION

function initParadoxWay() {
    "use strict";

    if ($(".testimonials-carousel").length > 0) {
        var j2 = new Swiper(".testimonials-carousel .swiper-container", {
            preloadImages: false,
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            mousewheel: false,
            centeredSlides: true,
            pagination: {
                el: '.tc-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.listing-carousel-button-next',
                prevEl: '.listing-carousel-button-prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                },

            }
        });
    }
}

setInterval(function() {
    var size = Math.floor(Math.random() * 100 + 1);
    $('.bubbles').append('<div class="individual-bubble" style="left: ' + Math.floor(Math.random() * 100 + 1) + 'px; width: ' + size + 'px; height:' + size + 'px;"></div>');
    $('.individual-bubble').animate({
        'bottom': '100%',
        'opacity': '-=0.7'
    }, 4000, function() {
        $(this).remove()
    });
}, 350);


//   Init All ------------------
$(document).ready(function() {
    initParadoxWay();
});

/*-------------------// START REVIEW SECTION-------------------------------------- */

// ......................START CUSTOMER LOGIN PAGE .....................................

// UI
const logintoggle = document.querySelector(".logintoggle"),
    signtoggle = document.querySelector(".signtoggle");

const overLayer = document.querySelector(".overlayer-green"),
    overlayerwhite = document.querySelector(".overlayer-white"),
    overlayerwhite2 = document.querySelector(".overlayer-white2");

const containerFirst = document.querySelector(".container-first"),
    continerSecond = document.querySelector(".container-second");

const signup = document.querySelectorAll(".signup"),
    login = document.querySelectorAll(".login");

const loginEye = document.querySelector(".login-eye"),
    eye = document.querySelector(".fa-eye"),
    eyeSlash = document.querySelector(".fa-eye-slash");
const loginPassword = document.querySelector("#loginPassword");

const signEye = document.querySelector(".sign-eye"),
    signeyei = document.querySelector(".signeyei"),
    signeyeSlashi = document.querySelector(".signeyeslashi");
const signPassword = document.querySelector("#singuppassword");

// sign form
signtoggle.addEventListener("click", () => {
    overLayer.classList.add("ani");
    overLayer.classList.remove("anirev");
    overlayerwhite.classList.add("active");
    overlayerwhite.classList.add("ani");
    overlayerwhite2.classList.remove("active");
    overlayerwhite2.classList.remove("ani");
    containerFirst.classList.add("sign");
    continerSecond.classList.add("sign");
    signup[0].style.display = "block";
    signup[1].style.display = "block";
    login[0].style.display = "none";
    login[1].style.display = "none";
    document.getElementById("loginuseremail").value = "";
    document.getElementById("loginPassword").value = "";
});

// login form
logintoggle.addEventListener("click", () => {
    overLayer.classList.remove("ani");
    overLayer.classList.add("anirev");
    overlayerwhite.classList.remove("active");
    overlayerwhite.classList.remove("ani");
    overlayerwhite2.classList.add("active");
    overlayerwhite2.classList.add("ani");
    containerFirst.classList.remove("sign");
    continerSecond.classList.remove("sign");
    signup[0].style.display = "none";
    signup[1].style.display = "none";
    login[0].style.display = "block";
    login[1].style.display = "block";
    document.getElementById("singupusername").value = "";
    document.getElementById("singupemail").value = "";
    document.getElementById("singupphnumber").value = "";
    document.getElementById("singuppassword").value = "";
});


// logineye password input
loginEye.addEventListener("click", () => {
    if (eye.classList.contains("active")) {
        eye.classList.remove("active");
        eyeSlash.classList.add("active");
        loginPassword.setAttribute("type", "text");
    } else {
        eye.classList.add("active");
        eyeSlash.classList.remove("active");
        loginPassword.setAttribute("type", "password");
    }
});

// sign password input
signEye.addEventListener("click", () => {
    if (signeyei.classList.contains("active")) {
        signeyei.classList.remove("active");
        signeyeSlashi.classList.add("active");
        signPassword.setAttribute("type", "text");
    } else {
        signeyei.classList.add("active");
        signeyeSlashi.classList.remove("active");
        signPassword.setAttribute("type", "password");
    }
});
// ......................END CUSTOMER LOGIN PAGE .....................................




//  ......................START  CUSTOMER LOGIN Database .....................................
$('#signUpForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "./controller/accountController.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            document.getElementById("signupbtn").disabled = true;
        },
        success: function(res) {
            document.getElementById("signupbtn").disabled = false;
            if (res != 1) {
                document.getElementById("singupemail").classList.remove("fill");
                document.getElementById("singupusername").value = "";
                document.getElementById("singupemail").value = "";
                document.getElementById("singupphnumber").value = "";
                document.getElementById("singuppassword").value = "";
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Successfully!!! Sign Up',
                    showConfirmButton: false,
                    timer: 2500
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Your email already has been created!',
                });
                document.getElementById("singupemail").classList.add("fill");
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
});

$(".forgot").click(function(e) {
    e.preventDefault();
    $(".userlogin .container").css("display", "none");
    $(".forgot-container").removeClass("show");
    $("#loginuseremail").val("");
    $("#loginPassword").val("");
    $("#loginuseremail").removeClass("fill");
    $("#loginPassword").removeClass("fill");
})

$(".forgot-form").on("submit", function(e) {
    e.preventDefault();
    let femail = $("#femail").val(),
        fphone = $("#fphone").val(),
        count = sessionStorage.getItem("count");
    let data = {
        "femail": `${femail}`,
        "fphone": `${fphone}`,
        "count": `${count}`
    }
    $.ajax({
        type: "POST",
        url: "controller/forgotcontroller.php",
        data: { send: JSON.stringify(data) },
        success: function(res) {
            cid = JSON.parse(res);
            if (cid.length == 1) {
                incorrect = 0;
                sessionStorage.removeItem("count");
                $("#femail").val("");
                $("#fphone").val("");
                $(".forgot-form").addClass("show");
                $(".recovery-form").removeClass("show");
            } else {
                if (incorrect >= 3) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Too many wrong !',
                        footer: `Please Try again 4 minutes!`
                    });
                    setTimeout(function() {
                        incorrect = 0;
                        sessionStorage.removeItem("count");
                    }, minutes * 60000);

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: 'Please Try again !'
                    });
                    incorrect++;
                    sessionStorage.setItem("count", incorrect);
                }
            }

        },
        error: function(err) {
            console.log(err);
        }
    })
})

$(".delrecovery").click(function (){
    $("#femail").val("");
    $("#fphone").val("");
    $(".userlogin .container").css("display", "flex");
    $(".forgot-container").addClass("show");
    $(".forgot-form").removeClass("show");
});

$(".recovery-form").on("submit", function(e) {
    e.preventDefault();
    let nfpwd = $("#nfpwd").val(),
        cfpwd = $("#cfpwd").val();
    if (nfpwd == cfpwd) {
        let pwds = {
            "id": `${cid[0].customer_id}`,
            "pwd": `${$('#cfpwd').val()}`
        };
        console.log(pwds);
        $.ajax({
            type: "POST",
            url: "controller/recoveryacccontroller.php",
            data: { send: JSON.stringify(pwds) },
            success: function(res) {
                Swal.fire({
                    icon: 'success',
                    text: 'Your password is successfully changed',
                });
                $("#cfpwd").removeClass("fill");
                $("#nfpwd").val("");
                $("#cfpwd").val("");
                $(".userlogin .container").css("display", "flex");
                $(".forgot-container").addClass("show");
                $(".forgot-form").removeClass("show");
                $(".recovery-form").addClass("show");
            },
            error: function(err) {
                console.log(err);
            }
        });
    } else {
        $("#cfpwd").addClass("fill");
    }
})

$(".login-form").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "controller/logincontroller.php",
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            let returndata = JSON.parse(res);

            if (returndata.login == true) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
                })
                document.getElementById("loginuseremail").classList.remove("fill");
                document.getElementById("loginPassword").classList.remove("fill");
                document.getElementById("signin").style.display = "none";
                document.getElementById("nav-signin").style.display = "none";
                document.getElementById("user").style.display = "block";
                localStorage.setItem("email", document.getElementById("loginuseremail").value);
                localStorage.setItem("password", document.getElementById("loginPassword").value);
                localStorage.setItem("customerid", returndata[0][0].customer_id);
                sessionStorage.removeItem("count");
                customerinfor = [];
                customerinfor.push(returndata[0][0]);
                document.getElementById("profile-name").innerText = customerinfor[0].name;
                document.getElementById("profile-email").innerText = customerinfor[0].email;
                document.getElementById("profile-phone").innerText = customerinfor[0].phone;
                document.getElementById("loginuseremail").value = "";
                document.getElementById("loginPassword").value = "";
            } else if (returndata.login == "your gmail does not exit") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Your email does not exit',
                });
                document.getElementById("loginuseremail").classList.add("fill");
                document.getElementById("loginPassword").classList.remove("fill");
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Your password is wrong',
                });
                document.getElementById("loginuseremail").classList.remove("fill");
                document.getElementById("loginPassword").classList.add("fill");
            }
        },
        error: function(err) {
            console.log(err);
        }
    })
})

