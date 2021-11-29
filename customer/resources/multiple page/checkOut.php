<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link href="../img/logo.png" rel="icon" type="image/png" sizes="16x16" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awasome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">

     <!-- custom css  -->
     <link href="../css/checkOut.css" rel="stylesheet" type="text/css" />

     <!-- jquery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>

    <!--    sweetalert2 js-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- custom js  -->
    <script src="../js/checkOut.js" type="text/javascript" defer></script>

    <!-- For Rating -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</head>
<body>
    <script>
        let showData = <?php echo $result ?>;
    </script>

    <section class="main_container">

        <!-- left_container starts-->
        <div class="left_container">
            <h2 class="shopName">Organic Fruity!</h2>
            <h3 class="deliInfo">Delivery Information</h3>

            <div class="container">
                <!-- Personal Info Form starts-->
                <div class="info">
                <form action="../../../adminview/customerInsertController.php" method="POST"  class="infoForm">
                    <div class="input-container">
                        <label class="label pt-2" for="name">Name : </label>
                        <input type="text" name="name" id="name" class="boxStyle" placeholder="Name...">
                    </div>
                    <div class="input-container">
                        <label class="label pt-2" for="email">Email : </label>
                        <input type="email" name="name" id="email" class="boxStyle" placeholder="Email...">
                    </div>
                    <div class="input-container">
                        <label class="label pt-2" for="phnumber">Phone : </label>
                        <input type="tel" name="phoneNum"  id="phnumber" class="boxStyle" placeholder="888-888-888" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" maxlength="11" required>
                    </div>
                    <div class="input-container">
                        <label class="label pt-2" for="address">Address : </label>
                        <textarea rows="4" name="address" id="address" class="boxStyle" placeholder="Address.."></textarea>
                    </div>
                </form>
                </div>
                <!-- Personal Info Form ends-->

                <!-- Payment Form starts-->
<!--                <div class="paymethod">-->
<!--                    <h3 class="payInfo">Payment Method</h3>-->
<!--                    <div class="cardMethod" >-->
<!--                        <img src="../resources/img/mc.png" alt="" class="cardPic">-->
<!--                        <img src="../resources/img/pp.png" alt=""  class="cardPic1">-->
<!--                        <img src="../resources/img/vi.png" alt=""  class="cardPic2">-->
<!--                    </div>-->
<!--                    <form action=" " class="payForm">-->
<!--                        <h3 class="cardNum">CARD NUMBER</h3>-->
<!--                        <input type="text" name="number" class="cardBox" placeholder="8881 2545 2545 2245">-->
<!--                        <div class="dateBox">-->
<!--                             <div class="leftBox">-->
<!--                                <h3 class="expiry">Expiry</h3>-->
<!--                                <input type="text" name="number" placeholder="MM / YY" class="expiryBox">-->
<!--                             </div>-->
<!--                             <div class="rightBox">-->
<!--                                <h3 class="cvv">CVV/CVC</h3>-->
<!--                                <input type="text" name="number"  placeholder="123" class="cvvBox">-->
<!--                             </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
                <!-- Payment Form ends-->
            </div>
        </div>
        <!-- left_container ends -->

        <!-- right_container starts -->
        <div class="right_container">
            <img src="../resources/img/fruit border.png" class="grpPic" alt="">

            <div class="itemBoxContainer">
            </div>

            <!-- Amount Show starts-->
            <div class="priceBox">
                <div class="subtotal">
                    <p class="priceName">Subtotal</p>
                    <p class="priceAmount"><span id="price"></span> Ks</p>
                </div>
                <div class="deliFee">
                    <p class="deliName">Delivery Fee</p>
                    <p class="deliAmount"><span id="deliveryprice">2,000</span> Ks</p>
                </div>
            </div>
            <div class="total">
                <p class="deliName">Total</p>
                <p class="deliAmount"><span id="totalprice"></span> Ks</p>
            </div>
            <!-- Amount Show ends-->

            <!-- Order btn starts-->
            <div class="btnBox">
                <a class="btn cancelbtn">Cancel</a>
                <a class="btn orderbtn" >Order</a>
            </div>
            <!-- Order btn ends-->
            <!-- right_container ends -->
        </div>
    </section>

    <section class="rating-container">
    </section>

    <!-- For Rating View-->
    <div id="ratingBox">
        <div class="forms loading">
            <h5 >Loading</h5>
        </div>
        <div class="forms complete">
            <h4 class="text-center">Your order had completed successfully!</h4>
            <div class="text-center">
                <button class="btn btn-danger btn-lg me-5 surveys">Take the Survey</button>
                <a class="btn btn-success btn-lg homes">Go to Home Page</a>
            </div>
        </div>
        <div class="forms survey">
            <h6>Hi <span id="user"></span></h6>
            <span>Thanks for buying fruit from Organic Fruity.We really appericate you choosing Organic Fruity.</span>
            <span>To help us improve,we'd like to ask a few question  about your experience so far.Your answers will help us make Oragnic Fruity even better for you and other guests.</span>
            <span>Thanks,</span>
            <span>Organic Fruity Team</span>
            <div class="text-center next">
                <button class="btn btn-success btn-lg nextbtn">Next</button>
            </div>
        </div>
        <form class="forms feedbackform">
            <div class="container-fluid">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Rating</label>
                    <div id="rateYo"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fname">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Any Feedback</label>
                    <textarea class="form-control" id="feedback" rows="3"></textarea>
                    <input type="hidden" name="rating" id="rating">
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" class="btn btn-success btn-lg submitbtn" value="Submit">
                </div>
            </div>
        </form>
        <div class=" forms response">
            <i class="fas fa-heart fa-3x text-danger mb-2"></i>
            <p>Thank You !</p>
            <p>We'll use your feedback to improve our customer support</p>
            <a class="btn btn-success btn-lg okbtn">OK</a>
        </div>
    </div>
    <!-- Latest compiled and minified For Rating JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function () {
            $("#rateYo").rateYo({
                fullStar: true,
                spacing   : "5px",
                onSet:function(rating,rateYoInstance){
                    $("#rating").val(rating);
                },
            });
        });
    </script>


</body>
</html>