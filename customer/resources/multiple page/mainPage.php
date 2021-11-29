<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Organic Fruity</title>

    <link rel="shortcut icon" href="resources/img/logo.png" type="image/x-icon" />

    <!-- font-awasome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font api -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet" />
    <!-- Bootstrap css 1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- custom css  -->
    <link href="./css/mainPage.css" rel="stylesheet" type="text/css" />
    <!-- jquery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    <!-- Bootstrap js 1 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--    sweetalert2 js-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- custom js -->
    <script src="./js/mainPage.js" type="text/javascript" defer></script>

    <!-- using icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- slick-theme.css -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css" />

    <!-- review section-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16" />

    <!--Aos scroll animation-->
    <link rel="stylesheet" href="aos-by-red.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <div>

        <!-- Start navbar  section-->
        <div class="navbar navbar-expand-lg fixed-top ">
            <div>
                <img src="./resources/img/logo.png" width="50px" alt="logo" class="logo" />
            </div>
            <a href="#home" class="brand">
                <span>Organic Fruity</span>
            </a>

            <button class="navbar-toggler bg-dark mx-3 navbuttons" data-bs-toggle="collapse" data-bs-target="#nav">
                <div class="bg-light lines1"></div>
                <div class="bg-light lines2"></div>
                <div class="bg-light lines3"></div>
            </button>

            <div class="navbar-collapse collapse justify-content-end text-uppercase fw-bolder" id="nav">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="#home" class="nav-link text-dark mx-4 menuitems actives homes">Home</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#shop" class="nav-link text-dark mx-4 menuitems shops">Shop</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#about" class="nav-link text-dark mx-4 menuitems abouts">About</a>
                    </li>
                    <li class="navbar-item" id="nav-signin">
                        <a href="#signin" class="nav-link text-dark mx-4 menuitems signin">Sign in</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#reviews"> <i class="fas fa-heart text-dark mx-3 py-2 icons"></i></a>
                    </li>
                    <li class="navbar-item cart-i">
                        <i class="fas fa-shopping-cart text-dark mx-3 py-2 icons"></i>
                        <span class="count">0</span>
                    </li>
                    <li class="navbar-item" id="user">
                        <i class="fas fa-user text-dark mx-3 py-2 icons logins"></i>
                    </li>
                </ul>
            </div>
            <div class="cart-details">
                <div class="d-flex justify-content-around align-items-center mb-2">
                    <i class="fas fa-arrow-left back"></i>
                    <p>Shopping Cart</p>
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <!--start cart -->
                <div class="cart-container m-auto">
                </div>
                <!--end cart -->

                <p class="warntext">Please first buy an item.</p>
                <div class="mt-2 delivery">
                    <p>Delivery fee, taxes, and discounts will be calculated at checkout.</p>
                </div>
                <div class="text-right proceed">
                    <a class="proceedbutton">Proceed To Checkout</a>
                </div>

            </div>

            <div class="profile show">
                <div class="profile-img"></div>
                <div class="profile-body">
                    <div>
                        <p>Name :</p>
                        <p>Email : </p>
                        <p>Phone :</p>
                    </div>
                    <div>
                        <p id="profile-name"></p>
                        <p id="profile-email"></p>
                        <p id="profile-phone"></p>
                    </div>
                </div>
                <i class="fas fa-sign-out-alt exits"></i>
            </div>
        </div>
        <!-- End navbar  -->

        <!-- home section starts  -->
        <section class="home" id="home">
            <div class="fruitCover" data-aos="fade-right">
                <img src="./resources/img/headerCover.png" alt="" width="400px" height="300px" style="margin-top: -30px;">
            </div>
            <div class="content" data-aos="fade-down-left">
                <h3>Fresh and <span>Organic</span> products for your</h3>
                <p>
                    Clean, ethical, sustainable and free range choices to suit any dietary needs.
                </p>
                <a href="#shop" class="btn">shop now</a>
            </div>
        </section>
        <!-- home section ends  -->

        <!-- features section starts  -->
        <section class="features" id="features" data-aos="fade-up">
            <h1 class="text-center  heading">Our <span>features</span></h1>

            <div class="box-container">

                <div class="box" data-aos="fade-up">
                    <img src="./resources/img/feature-img-1.png" alt="" />
                    <h3>fresh and organic</h3>
                    <p>
                        All of our fruits & vegetables are airflown over weekly from Myanmar.
                    </p>
                </div>

                <div class="box" data-aos="fade-up">
                    <img src="./resources/img/feature-img-2.png" alt="" />
                    <h3>Fast delivery</h3>
                    <p>
                        We can deliver your fruits & veggies directly to your door at 24 hours!
                    </p>
                </div>

                <div class="box" data-aos="fade-up">
                    <img src="./resources/img/feature-img-3.png" alt="" />
                    <h3>easy payments</h3>
                    <p>
                        Accept all type of payments like mastercard,paypal, visa and direct deposits.
                    </p>
                </div>

            </div>
        </section>
        <!-- features section ends -->

        <!--START PRODUCT SECTION-->
        <section id="shop" data-aos="fade-up">
            <div class="container-fluid  py-3" >
                <h1 class="heading1">Our <span style="color: orange;">Products</span></h1>
                <ul class="list-inline text-uppercase text-center fw-bold py-5" style="padding-top: 21px !important; padding-bottom: 2px !important;">
                    <li class="list-inline-item product-lists actives" data-filter="all">
                        All<span class="text-secondary mx-3">/</span>
                    </li>
                    <li class="list-inline-item product-lists" data-filter="fruit">
                        Fruit<span class="text-secondary mx-3">/</span>
                    </li>
                    <li class="list-inline-item product-lists" data-filter="vegetable">
                        Vegetable<span class="text-secondary mx-3">/</span>
                    </li>
                    <li class="list-inline-item product-lists" data-filter="meat">
                        Meat
                    </li>
                </ul>
                <div class="container-fluid">

                    <div class="d-flex justify-content-center flex-wrap pb-5">
                        <!--Start Show product from database -->
                        <?php
                        for ($i = 0; $i < count($result); $i++) {
                            echo "<div class='product-item categorys " . $result[$i]['category'] . " mb-4'>";
                            echo " <div class='product-img'>";
                            echo  "<img src='../upload/" . $result[$i]["image"] . "' id='img'/>";
                            echo  "</div>";
                            echo  "<div class='text-center product-label'>";
                            echo  "<span>" . $result[$i]["name"] . "</span><br />";
                            echo  "<span>" . number_format($result[$i]["salePrice"]) . "</span>";
                            echo  "<span>Ks</span>";
                            echo  "<span class='d-none' id='pid'>" . $result[$i]["p_id"] . "</span>";
                            echo  "</div>";
                            echo  "<div class='cart-button'>";
                            echo  "<button type='submit' class='cart'>";
                            echo  "<i class='fas fa-shopping-cart'></i> ADD TO CART";
                            echo  "</button>";
                            echo  "</div>";
                            echo  "</div>";
                        };
                        ?>
                        <!--Start Show product from database -->
                    </div>
                </div>
            </div>
        </section>
        <!--END PRODUCT SECTION-->

        <section class="about-reviews" id="about" data-aos="fade-up">
            <!-- START ABOUT COMPANY-->
            <div class="our-company">
                <h1 class="text-center pb-3 heading2">
                    Our <span style="color: orange">Company</span>
                </h1>
                <div class="container">
                    
                    <div class="left-container" >
                         <img src="./resources/img/shop owner.png" alt=""  data-aos="fade-right"/>
                    </div>
                    <div class="right-container" data-aos="fade-left" >
                        <h3 class="text-center quote">We Give The Lowest Price On Grocery Items</h3>
                        <p class="text-center sentences">
                        All our products are certified organic in Myanmar. We believe that eating organic food is the safest way to reduce our exposure to pesticides, chemical fertilizers and heavy metals.  All crops are tested every year by independent organisms. The organic certification is only obtained after two years of cleaning the soil, bans usage of synthetic fertiliser and limits organic fertiliser. 
                        </p>
                    </div>
                </div>
            </div>
            <!-- END ABOUT COMPANY-->

            
             <!--START SIGN IN-->
             
        <section class="userlogin" id="signin" data-aos="fade-up" >
        <h1 class="text-center pb-3 heading2" style="margin-top: 100px;">
                    Registration<span style="color: orange">Form</span>
                </h1>
            <div class="container">
            <!-- Start First container  -->
            <div class="container-first" data-aos="zoom-in">
                <!-- start sign up  -->
                <div class="signup">
                    <p class="welcome-header">Welcome Back!</p>
                    <p class="welcome-body">
                        TO keep connected with us please login with your person info
                    </p>
                    <p class="logintoggle">SIGN IN</p>
                </div>
                <!-- end sign up  -->

                <!-- start login   -->
                <div class="login">
                    <p class="header">Sign in to Fruity</p>
                    <div class="connect-link">
                        <div class="link-icon">
                            <a href="#"> <i class="fab fa-facebook"></i></a>
                            <a href="#"> <i class="fab fa-google"></i></a>
                            <a href="#"> <i class="fab fa-twitter"></i></a>
                        </div>
                        <p>or use your email account</p>
                    </div>
                    <form class="login-form">
                        <div class="data-input">
                            <input type="text" class="input" id="loginuseremail" name="loginuseremail" placeholder="Email" autocomplete="off" required />
                            <div class="placeholder">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="data-input">
                            <input type="password" class="input" id="loginPassword" name="loginPassword" placeholder="Password" autocomplete="off" required />
                            <div class="placeholder">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="eye login-eye">
                                <i class="fas fa-eye active"></i>
                                <i class="fas fa-eye-slash"></i>
                            </div>
                        </div>
                        <a href="#" class="forgot">Forgot your password?</a>
                        <!--<button type="submit" id="loginform" class="button">SIGN IN</button>-->
                        <input type="submit" class="button" value="SIGN IN">
                    </form>
                </div>
                <!-- end login   -->
            </div>
            <!-- End First container  -->

    <!-- Start Second container  -->
            <div class="container-second" data-aos="zoom-in" >
                <!-- start sign up  -->
                <div class="signup">
                    <p class="header">Create Account</p>
                    <div class="connect-link">
                        <div class="link-icon">
                            <a href="#"> <i class="fab fa-facebook"></i></a>
                            <a href="#"> <i class="fab fa-google"></i></a>
                            <a href="#"> <i class="fab fa-twitter"></i></a>
                        </div>
                        <p>or use your email for registration</p>
                    </div>
                    <form id="signUpForm" method="post" class="login-form">

                        <div class="data-input">
                            <input type="text" class="input" id="singupusername" name="singupusername" placeholder="Name" autocomplete="off" required />
                            <div class="placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="data-input">
                            <input type="email" class="input" id="singupemail" name="singupemail" placeholder="Email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2, 4}$" required/>
                            <div class="placeholder">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="data-input">
                            <input type="tel" class="input" id="singupphnumber" name="singupphnumber" placeholder="888-888-888" autocomplete="off" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" maxlength="11" required/>
                            <div class="placeholder">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                        <div class="data-input">
                            <input type="password" class="input" id="singuppassword" name="singuppassword"  placeholder="Password" autocomplete="off" required/>
                            <div class="placeholder">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="eye sign-eye">
                                <i class="fas fa-eye signeyei active"></i>
                                <i class="fas fa-eye-slash signeyeslashi"></i>
                            </div>
                        </div>

                        <input type="submit" id="signupbtn" name="submit" class="button" value="Sign Up">
                    </form>
                </div>
                <!-- end sign up  -->

                <!-- start login -->
                <div class="login">
                    <p class="welcome-header">Hello Friend !</p>
                    <p class="welcome-body">
                        Enter your personal details and start journey with us
                    </p>
                    <p class="signtoggle">SIGN UP</p>
                </div>
                <!-- end login -->
            </div>
            <!-- End Second container  -->
            <!-- Start Layer -->
            <div class="overlayer-green"></div>
            <div class="overlayer-white"></div>
            <div class="overlayer-white2"></div>
            <!-- End Layer  -->
        </div>

            <!-- start forgot container -->
            <div class="forgot-container show">
                <h2 class="mb-4">Recovery your account ?</h2>
                <i class='fas fa-times delrecovery'></i>
                <form class="forgot-form">
                    <div class="data-input">
                        <input type="text" class="input" id="femail" name="femail" placeholder="Email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2, 4}$" required />
                        <div class="placeholder">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <div class="data-input">
                        <input type="tel" class="input" id="fphone" name="fphone"  placeholder="888-888-888" autocomplete="off" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" maxlength="11" required />
                        <div class="placeholder">
                            <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    <input type="submit" class="button fbutton" value="submit">
                </form>

                <form class="recovery-form show">
                    <div class="data-input">
                        <input type="text" class="input" id="nfpwd" name="nfpwd" placeholder="New Password" autocomplete="off" required />
                        <div class="placeholder">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <div class="data-input">
                        <input type="text" class="input" id="cfpwd" name="cfpwd" placeholder="Confirm Password" autocomplete="off" required />
                        <div class="placeholder">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <input type="submit" class="button fbutton" value="confirm">
                </form>

            </div>
            <!-- end forgot container -->
        </section>
        <!--END SIGN IN-->
                </section>
        <!--START REVIEW SECTION-->
        <section id="reviews" class="reviewSection" data-aos="fade-up">
                        <div class="section-title">
                            <h1 class="text-center mt-5 py-3 heading3">
                                Customer's <span style="color: orange">Review</span>
                            </h1>
                            <br>
                        </div>

                        <div class="testimonials-carousel-wrap">
                            <div class="listing-carousel-button listing-carousel-button-next">
                                <i class="fa fa-caret-right" style="color: #fff"></i>
                            </div>
                            <div class="listing-carousel-button listing-carousel-button-prev">
                                <i class="fa fa-caret-left" style="color: #fff"></i>
                            </div>
                            <div class="testimonials-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testi-item">
                                                <div class="testi-avatar">
                                                    <img src="./resources/img/pic-2.png" />
                                                </div>
                                                <div class="testimonials-text-before">
                                                    <i class="fa fa-quote-right"></i>
                                                </div>
                                                <div class="testimonials-text">
                                                    <div class="listing-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        
                                                    </div>
                                                    <p>
                                                    Every week we feel all the love  
                                                    love for fresh produce, love for environment (no plastic and returnable bag, yay!) and 
                                                    love for the members. Thank you
                                                    </p>

                                                    <div class="testimonials-avatar">
                                                        <h3>Alice</h3>
                                                    </div>
                                                </div>
                                                <div class="testimonials-text-after">
                                                    <i class="fa fa-quote-left"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--second--->
                                        <div class="swiper-slide">
                                            <div class="testi-item">
                                                <div class="testi-avatar">
                                                    <img src="./resources/img/pic-3.png" />
                                                </div>
                                                <div class="testimonials-text-before">
                                                    <i class="fa fa-quote-right"></i>
                                                </div>
                                                <div class="testimonials-text">
                                                    <div class="listing-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        
                                                    </div>
                                                    <p>
                                            It’s fresh, 
                                            it’s organic and hasn’t travled halfway around the world to reach us. Keep up the good work!!
                                                    </p>

                                                    <div class="testimonials-avatar">
                                                        <h3>Doe Boe</h3>
                                                    </div>
                                                </div>
                                                <div class="testimonials-text-after">
                                                    <i class="fa fa-quote-left"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!--third-->

                                        <div class="swiper-slide">
                                            <div class="testi-item">
                                                <div class="testi-avatar">
                                                    <img src="./resources/img/pic-4.png" />
                                                </div>
                                                <div class="testimonials-text-before">
                                                    <i class="fa fa-quote-right"></i>
                                                </div>
                                                <div class="testimonials-text">
                                                    <div class="listing-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        
                                                    </div>
                                                    <p>
                                                    I​ started shopping the Organic fruity a year ago​​. It offers a good mix of organic &  compliant fruit & veggies.
                                                    I love the quality, flavours and the variety of its produces.”
                                                    </p>

                                                    <div class="testimonials-avatar">
                                                        <h3>Phyu Phyu</h3>
                                                    </div>
                                                </div>
                                                <div class="testimonials-text-after">
                                                    <i class="fa fa-quote-left"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--fourth-->
                                        <div class="swiper-slide">
                                            <div class="testi-item">
                                                <div class="testi-avatar">
                                                    <img src="./resources/img/pic-1.png" />
                                                </div>
                                                <div class="testimonials-text-before">
                                                    <i class="fa fa-quote-right"></i>
                                                </div>
                                                <div class="testimonials-text">
                                                    <div class="listing-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p>
                                                    Happy to receive this box of healthy fruits & veggie on Thur! 😊
                                                    Thanks organic fruity  for delivering out the orders!
                                                    </p>

                                                    <div class="testimonials-avatar">
                                                        <h3>Doe John</h3>
                                                    </div>
                                                </div>
                                                <div class="testimonials-text-after">
                                                    <i class="fa fa-quote-left"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi end-->
                                    </div>
                                </div>
                            </div>

                            <div class="tc-pagination"></div>
                        </div>
                    </section>
                    <!--END REVIEW SECTION-->
            

        <!--START  FOOTER SECTION    -->
        
        <section class="about-section">
            <div class="endSection">
                <div class="company">
                    <h4 class="pb-2">Company Information</h4>
                    <div class="d-flex">
                        <div class="address">
                            <i class="fas fa-map-marker-alt"></i>
                            <i class="fas fa-phone-alt"></i>
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="address">
                            <a href="https://goo.gl/maps/NzjxSiSTFjvkcsLY8" target="_blank">No-3.building-111.San Chaung Street,San Chaung Road,Yangon</a>
                            <a href="tel:+9509770393327">+9509770393327</a>
                            <a href="mailto:exbrainprojectteam2@info.com">exbrainprojectteam2@info.com</a>
                        </div>
                    </div>
                </div>
                <div class="company">
                    <h4>Company</h4>
                    <div class="about-link">
                        <a href="#home">HOME</a>
                        <a href="#shop">SHOP</a>
                        <a href="#about">ABOUT</a>
                        <a href="#signin">SIGN IN</a>
                    </div>
                </div>

                <div class="company">
                    <h4>Need help?</h4>
                    <div class="about-link">
                        <a href="#">CUSTOMER SERVICE</a>
                        <a href="#">ONLINE CHAT</a>
                        <a href="#">SUPPORT</a>
                    </div>
                </div>

                <div class="company">
                    <h4>Power By</h4>
                    <div class="about-link">
                        <p>Aung Min Khant</p>
                        <p>Min Khant</p>
                        <p>Cherry Phoo Phoo Khine</p>
                        <p>Phu Pwint</p>
                    </div>
                </div>
            </div>
            <footer>
                <p class="text-center py-3">
                    &copy; <span class="time">2021</span> Copyright, All Right Reserved
                </p>
            </footer>
        </section>
        <!--END FOOTER SECTION    -->

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
        AOS.init({
            duration: 2500,
            once: true,
        });
        </script>
</body>

</html>