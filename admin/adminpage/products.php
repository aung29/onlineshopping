<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16" />
</head>
<body>

    <?php 
        require "../controller/prouductcontroller.php";
    ?>
    <nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 fixed-top sidebars">
                
                    <a href="#" class="navbar-brand d-block text-white text-center py-3 mx-auto mb-4 borderbottoms">Organic Fruity</a>

                <ul class="navbar-nav flex-column mt-4">
                    <li class="nav-item"><a href="dashboard.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-home fa-lg me-3"></i>Dashboard</a></li>
                    <li class="nav-item"><a  class="nav-link text-white p-3 mb-2 currents"><i class="fas fa-cubes fa-lg me-3"></i>Product</a></li>
                    <li class="nav-item"><a href="orderlists.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-cash-register fa-lg me-3"></i>Order-list</a></li>
                    <li class="nav-item"><a href="customers.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-user-friends fa-lg me-3"></i>Customer-lists</a></li>
                    <li class="nav-item"><a href="newproduct.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-shopping-cart fa-lg me-3"></i>New Product</a></li>
                    <!-- <li class="nav-item"><a href="feedback.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-comment-alt fa-lg me-3"></i>Feedback</a></li> -->
                    <li class="nav-item"><a href="membership.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-table fa-lg me-3"></i>Membership</a></li>
                    <li class="nav-item"><a href="../../customer/index.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-user fa-lg me-3"></i>Customer-View</a></li>
                </ul>
            </div>


                   <div class="col-lg-10  py-2 ms-auto py-2 fixed-top backgroundtop">
                            <div class="row">
                        
                                <!-- <div class="col-lg-8 py-2">
                                     <ul class="nav justify-content-end">
                                         <li class="nav-item mt"><i class="fas fa-cog "></i></li>
                                         <li class="nav-item mt"><i class="fa fa-bell"></i></li>
                                         
                                     </ul>
                                </div> -->

                                <div class="col-lg-12">
                                        <div class="d-flex justify-content-end me-3">
                                            <img src="../img/user.jpg" alt="user" class="rounded-circle me-3" width="60px" >
                                            <p class=" text-dark texts" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">Admin Manager<i class="fas fa-arrow-down icon2" ></i></p>
                                            
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                            <li><button class="dropdown-item btnedit" type="button"><a href="#" class="dropdown-item fw-bold" data-bs-toggle="modal" data-bs-target="#signout">Logout</a></button></li>
                                                            
                                          </ul>
                                        </div>
                                </div>


                            </div>
                    </div>
                     
                </div>
            </div>
        
        </nav>
        
        <!-- START PRODUCT SECTION -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 ms-auto mt-5 pt-5 mb-5">
                    <h4 class="text-dark fw-bold">Products</h4>
                        <div class="row">
                            <div class="col-3 mt-3 mb-3">
                            <form id="sorting" method="POST">
                            <select name="category" id="category" class="form-select" style="width : 120px;font-size : 16px;border-radius : 10px;">
                                <option value="0" selected>All</option>
                                <option value="fruits">Fruits</option>
                                <option value="vegetables">Vegetables</option>
                                <option value="meat">Raw Meat</option>
                        </select>
                    </form>
                    </div>

                        
                            <div class="row" id="cart-box">
                                    <?php
                                        
                                   foreach($result as $key => $value){
                                       echo " <div class='col-3'>";
                                       echo  "  <div class='card ms-3 cardbgs m-4'>";
                                       echo " <img src='../../upload/" .$value['image'].  "' alt='strawberry' min-height='230px !important'  class='p-3 imgs'>" ;
                                       echo " <h5 class='card-title ms-2 fw-bold'>".$value['name']."</h5>";
                                       echo " <small class='card-subtitle ms-2 mb-2 text-muted fw-bold'>".$value['p_id']."</small>";
                                       echo " <p class='m-3'>".$value['description']."</p>";
                                       echo "  <small class='card-subtitle ms-2 mb-2 text-primary fw-bold'>".number_format($value['salePrice'])." Ks" ."</small>";
                                       echo "  <div class='d-flex m-2'>";
                                       $rating = $value['rating'];
                                       $count = 5;
                                       for ($i = 0; $i < $rating; $i++) {
                                           echo "<span><i class='fas fa-star fa-sm text-warning'></i> </span>";
                                       };
                                   
                                       if ($rating != 5)
                                           for ($i = 0; $i < $count - $rating; $i++) {
                                               echo "<span><i class='fas fa-star fa-sm'></i> </span>";
                                           };
                                        echo "</div>";
                                        if($value['quantity'] == 0){
                                            echo " <p class='fs-6 m-2 fw-bold'>Quantity : <span class='text-danger'> Out of Stock </span></p>";  

                                            echo "</div>";
                                            echo "<div class='d-flex justify-content-end me-4'>";
                                            echo " <button type='button' class='btn btn-outline-warning'><a href='newproduct.php' class='text-dark fw-bold'>Add Stock</a></button>";
                                            echo "</div>";
                                            echo "</div>";  
                                        }else{
                                            echo " <p class='fs-6 m-2 fw-bold'>Quantity : <span>".$value['quantity']."</span></p>";
                                           
                                            echo "</div>";
                                           
                                            echo "</div>";
                                             
                                        }
                                       
                                   }
                                   
                                      
                                           
                                           
                                            

                                           
                                          
                                          
                                         
                                           
                                   

                                    ?> 
                                    <!-- <div class="col-3">
                                        <div class="card ms-3 cardbgs">
                                            <img src="img/stawberry3.png" alt="greenapple" width="250px" class="img-thumbnail imgs"> 
                                            <h5 class="card-title ms-2 fw-bold">Fresh Green Apple</h5>
                                            <small class="card-subtitle ms-2 mb-2 text-muted fw-bold">F001</small>

                                            <p class="m-3">Fresh fruits are all over the world.</p>
                                            <small class="card-subtitle ms-2 mb-2 text-muted fw-bold">3000$</small>
                                            <div class="d-flex m-2">
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm "></i>
                                            </div>
                                            <p class="fs-6 m-2 fw-bold">Quantity : <span>3</span></p>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-3">
                                        <div class="card ms-3 cardbgs">
                                            <img src="img/fruitdragon.png" alt="greenapple" width="250px" class="img-thumbnail imgs"> 
                                            <h5 class="card-title ms-2 fw-bold">Fresh Green Apple</h5>
                                            <small class="card-subtitle ms-2 mb-2 text-muted fw-bold">F001</small>

                                            <p class="m-3">Fresh fruits are all over the world.</p>
                                            <small class="card-subtitle ms-2 mb-2 text-muted fw-bold">3000$</small>
                                            <div class="d-flex m-2">
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm "></i>
                                            </div>
                                            <p class="fs-6 m-2 fw-bold">Quantity : <span>3</span></p>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-3">
                                        <div class="card ms-3 cardbgs">
                                            <img src="img/watermelon1.png" alt="greenapple" width="250px" class="img-thumbnail imgs"> 
                                            <h5 class="card-title ms-2 fw-bold">Fresh Green Apple</h5>
                                            <small class="card-subtitle ms-2 mb-2 text-muted fw-bold">F001</small>

                                            <p class="m-3">Fresh fruits are all over the world.</p>
                                            <small class="card-subtitle ms-2 mb-2 text-muted fw-bold">3000$</small>
                                            <div class="d-flex m-2">
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                            <i class="fas fa-star fa-sm "></i>
                                            </div>
                                            <p class="fs-6 m-2 fw-bold">Quantity : <span>3</span></p>
                                        </div>
                                    </div> -->
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- END PRODUCT SECTON -->


        <!-- Start Signout Modal -->

        <div id="signout" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Want to leave ?</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">
					<span>Press logout to leave</span>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-bs-dismiss="modal"><a href="#" class="text-light">Cancel</a></button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><a href="../adminLogin.php" class="text-light">Logout</a></button>
				</div>
			</div>
		</div>
	</div>

	<!-- End Signout Modal -->

        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            type="text/javascript"
    ></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="../js/app1.js" type="text/javascript"></script>
    </body>
    </html>