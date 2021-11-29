<?php 
  require_once "../controller/dashboardcontroller.php";
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
     <!-- boot strap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- logo -->
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16" />
   
      
    <!--    sweetalert2 js-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
       

        <script>
            var costs = '<?= $total_costs ?>';
            var sales = '<?= $total_sales ?>';
          
            </script>
   
    <nav>
    <div class="container-fluid">
        <!-- START TOP SIDEBAR  && LEFT SIDEBAR-->
        <div class="row">
            <div class="col-lg-2 fixed-top sidebars">
                
                    <a class="navbar-brand d-block text-white text-center py-3 mx-auto mb-4 borderbottoms">Organic Fruity</a>

                <ul class="navbar-nav flex-column mt-4" id="click">
                    <li class="nav-item"><a  class="nav-link text-white p-3 mb-2 currents"><i class="fas fa-home fa-lg me-3"></i>Dashboard</a></li>
                    <li class="nav-item"><a href="products.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-cubes fa-lg me-3"></i>Product</a></li>
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
                                
                                <!-- <div class="col-lg-8 py-2"> -->
                                     <!-- <ul class="nav justify-content-end">
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
            <!-- END TOP SIDEBAR  && LEFT SIDEBAR-->
        </nav>
        
        <!-- START DASHBOARD  -->
        <section>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 ms-auto  mt-5 pt-5 mb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="text-info fs-5 fw-bold">Dashboard</h3>
                            </div>
                            <!-- <div class="col-lg-3 mx-auto mb-3">
                               <form action="" method="">
                               <select name="dating" id="dating" class="form-select">
                                    <option value="">Today</option>
                                    <option value="">Yesterday</option>
                                    <option value="">Last 2 days</option>
                                </select>
                                </form>
                             </div> -->
                        </div> 
                        <div class="row ">
                            <div class="col-lg-3 p-2">
                                <div class="card cardcommons p-1">
                                    <div class="card-body d-flex">
                                        <i class="fas fa-chart-bar baricon1"></i>
                                        <div class="text-end tags1">
                                            <p class="tagmoney"><?php 
                                                echo number_format($total_sales)." KS"
                                            ?></p>
                                            <span class="tagcontact">Total Sales</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-lg-3 p-2">
                                <div class="card cardcommons p-1">
                                    <div class="card-body d-flex">
                                        <i class="fas fa-dollar-sign baricon2"></i>
                                        <div class="text-end tags2">
                                            <p class="tagmoney">
                                            <?php 
                                                 echo  number_format($total_costs)." KS"
                                            ?>
                                            </p>
                                        
                                            <span class="tagcontact">Total Cost</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="col-lg-3 p-2">
                                <div class="card cardcommons p-1">
                                    <div class="card-body d-flex">
                                        <i class="fas fa-cube baricon3"></i>
                                        <div class="text-end tags1">
                                            <p class="tagmoney"><?php
                                                echo number_format($count2);
                                            ?></p>
                                            <span class="tagcontact">Products Sold</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="col-lg-3 p-2">
                                <div class="card cardcommons  p-1">
                                    <div class="card-body d-flex">
                                        <i class="fas fa-coins baricon4"></i>
                                        <div class="text-end tags2">
                                            <p class="tagmoney">
                                            <?php
                                                echo number_format($count1);
                                            ?></p>
                                            </p>
                                            <span class="tagcontact tag">Stock on Hand</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END DASHBOARD  -->


       <!-- START CHART SECTION --> 
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 ms-auto">
                        <div class="row">
                            <div class="col-6" >
                                <div class="card mx-3" style="width : 530px">
                                    <div class="card-title mx-3 mt-3">Daily Sales</div>
                                    <div class="card-body">
                                        <canvas id="mylinechart1"></canvas>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="card mx-3" style="width : 540px">
                                    <div class="card-title mx-3 mt-3">Revenue vs Cost</div>
                                    <div class="card-body">
                                        <canvas id="mylinechart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-10 ms-auto">
                        <div class="row">
                            <div class="col-7 mt-5">
                                <div class="card mx-3" style="width : 600px">
                                    <div class="card-title mx-3 mt-3">Number of Units Sold</div>
                                    <div class="card-body">
                                        <canvas id="mylinechart3"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-5 mt-5">
                                <div class="card mx-3" style="width : 400px; height: 450px; background: transparent; border: none;">
                                    <div class="card-title mx-3 mt-3">Most Sales Item</div>
                                    <div class="card-body">
                                        <canvas id="mylinechart4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END CHART SECTION -->


        <!-- START ORDER LIST TABLE -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 ms-auto">
                        <div class="row">
                            <div class="col-12 mt-5">
                                <h3 class="card-title mx-4">Order Sales</h3>
                                <table class="table table-striped bg-light text-center table-hover">
                                    <thead class="fontsizes">
                                        <tr class="tablescolor">
                                            <td>No</td>
                                            <td>Order_id</td>
                                            <td>Name</td>
                                            <td>Product Name</td>
                                            <td>Quantity</td>
                                            <td>Sale Price</td>
                                            <td>Total Price</td>
                                            <td>Buy Date</td>
                                        </tr>
                                    </thead>
                                    <tbody class="fontsizes2">
                                    <?php
                                                
                                                require_once "../controller/orderDetailController.php" ;  

                                                   $count = 1;

                                                   foreach ($result as $key=>$value) {
                                                        if($count < 5){
                                                            $Price = $value['quantity'] * $value['total_price'];
                                                     
                                                            echo "<tr>";
                                                            echo "<td>".$count++."</td>";
                                                            echo "<td>".$value['order_id']."</td>";
                                                            echo "<td>".$value['customer_name']."</td>";
                                                            echo "<td>".$value['name']."</td>";
                                                            echo "<td>".$value['quantity']."</td>";
     
                                                            echo "<td>".number_format($Price)."</td>";
                                                           echo "<td>" .number_format($value['grandPrice'])."</td>";
                                                            echo "<td>".$value['buy_date']."</td>";
                                                            echo "</tr>";
                                                        }
                                                      
                                                   }
                                           ?>
                                       
                                        <!-- <tr>
                                        <td>A001</td>
                                        <td>1121</td>
                                        <td>Jason</td>
                                        <td>Martin</td>
                                        <td>No.43,building 301,4th Street,Manhattan</td>
                                        <td>7/11/2021</td>
                                        <td>3</td>
                                        <td>9000$</td>
                                        </tr>
                                    
                                        <tr>
                                        <td>A002</td>
                                        <td>5222</td>
                                        <td>Math</td>
                                        <td>Austion</td>
                                        <td>No.11A,8th Street and St. Mark's Place</td>
                                        <td>15/11/2021</td>
                                        <td>10</td>
                                        <td>11000$</td>
                                        </tr>
                                  
                                        <tr>                                      
                                        <td>A003</td>
                                        <td>5521</td>
                                        <td>Louis</td>
                                        <td>Tailon</td>
                                        <td>Bryant Park(1C , 15P)</td>
                                        <td>20/11/2021</td>
                                        <td>3</td>
                                        <td>5000$</td>
                                        </tr>

                                   
                                        <tr>
                                        <td>A004</td>
                                        <td>2112</td>
                                        <td>Denial</td>
                                        <td>Aoth</td>
                                        <td>Central Park West Historic District‎ (28 P)</td>
                                        <td>7/11/2021</td>
                                        <td>6</td>
                                        <td>12000$</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end me-3 p-3">
                                    <button class="btn text-right btn-rounded  seemorebtns"><a href="orderlists.php" class="text-light">See More</a></button>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <!-- END ORDER LIST TABLE -->



        <!-- START CUSTOMER LIST TABLE -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 ms-auto">
                        <div class="row">
                            <div class="col-12 mt-5">
                                <h3 class="card-title mx-4">Customers</h3>
                                <table class="table table-striped bg-muted text-center table-hover">
                                    <thead class="fontsizes">
                                        <tr class="tablescolor2">
                                            <td>No</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Phone</td>
                                            <td>Address</td>
                                          
                                            <td>Membership</td>
                                            <td>Total Price</td>
                                            <td>Rating</td>
                                            <td>Feedback</td>
                                        </tr>
                                    </thead>
                                    <tbody class="fontsizes3">

                                    <?php  
                                               require_once "../controller/customerListController.php" ;  

                                               $count = 1;
                                               foreach ($result as $key=>$value) {
                                                   if($count < 5){
                                                  

                                                 if($value['feedback'] == NULL){
                                                     $value['feedback'] = "-";
                                                 }
                                                   echo "<tr>";
                                                   echo "<td>".$count++."</td>";
                                                   echo "<td>".$value['name']."</td>";
                                                   echo "<td>".$value['email']."</td>";
                                                   echo "<td>".$value['phone']."</td>";
                                                   echo "<td>".$value['address']."</td>";
                                                 if($value['membership'] == 0){
                                                    echo "<td>No</td>";
                                                 }else{
                                                    echo "<td>Yes</td>";
                                                 }
                                                 
                                                  echo "<td>" .number_format($value['total_price'])."</td>";
                                                  echo "<td>";
                                                  $rating =$value['rating'] ;
                                                  $counting = 5;
                                                  for ($i = 0; $i < $rating; $i++) {
                                                      echo "<span><i class='fa fa-star text-warning'></i> </span>";
                                                  }
                                              
                                                  if ($rating != 5)
                                                      for ($i = 0; $i < $counting - $rating; $i++) {
                                                          echo "<span><i class='fa fa-star'></i> </span>";
                                                      };
                                                  echo "</td>";
                                                   echo "<td>".$value['feedback']."</td>";
                                                   echo "</tr>";
                                                   }
                                                  
                                               }


                                        ?>
                                        <!-- <tr>
                                        <td>0A1A2</td>
                                        <td>2211</td>
                                        <td>Jason</td>
                                        <td>Martin</td>
                                        <td>jasonM12@gmail.com</td>
                                        <td>No.43,building 301,4th Street,Manhattan</td>
                                        <td>7/11/2021</td>
                                        <td><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star"></i></td>
                                        <td>9000$</td>
                                        </tr>
                                      <tr>      
                                        <td>0A1A4</td>
                                        <td>2213</td>
                                        <td>Math</td>
                                        <td>Austion</td>
                                        <td>mathaut84@gmail.com</td>
                                        <td>No.11A,8th Street and St. Mark's Place</td>
                                        <td>15/11/2021</td>
                                        <td><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i></td>
                                        <td>11000$</td>
                                        </tr>
                                        <tr>
                                        <td>0B1A2</td>
                                        <td>2331</td>
                                        <td>Louis</td>
                                        <td>Tailon</td>
                                        <td>louistail@gmail.com</td>
                                        <td>Bryant Park(1C , 15P)</td>
                                        <td>20/11/2021</td>
                                        <td><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                        <td>5000$</td>
                                        </tr>

                                        <tr>
                                        <td>0B1A4</td>
                                        <td>2441</td>
                                        <td>Denial</td>
                                        <td>Aoth</td>
                                        <td>ddnialaa@gmail.com</td>
                                        <td>Central Park West Historic District‎ (28 P)</td>
                                        <td>7/11/2021</td>
                                        <td><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star"></i></td>
                                        <td>12000$</td>
                                    </tr> -->
                                    </tbody>
                                </table>
                               <div class="d-flex justify-content-end me-3 p-3">
                                <button class="btn text-right btn-rounded seemorebtns2"><a href="customers.php" class="text-light">See More</a></button>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
          <!-- END CUSTOMER LIST TABLE -->
                                               

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
        
        <!-- jquery -->
          <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            type="text/javascript"
    >   </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- js -->
    <script src="../js/app1.js" type="text/javascript"></script>
    <script src="../js/app.js" type="text/javascript"></script>

         
    <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    

   
</body>


</html>

         