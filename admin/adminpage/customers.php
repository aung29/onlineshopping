<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16" />
   
</head>
<body>

    <nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 fixed-top sidebars">
                
                    <a href="#" class="navbar-brand d-block text-white text-center py-3 mx-auto mb-4 borderbottoms">Organic Fruity</a>

                <ul class="navbar-nav flex-column mt-4">
                    <li class="nav-item"><a href="dashboard.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-home fa-lg me-3"></i>Dashboard</a></li>
                    <li class="nav-item"><a href="products.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-cubes fa-lg me-3"></i>Product</a></li>
                    <li class="nav-item"><a href="orderlists.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-cash-register fa-lg me-3"></i>Order-list</a></li>
                    <li class="nav-item"><a  class="nav-link text-white p-3 mb-2 currents"><i class="fas fa-user-friends fa-lg me-3"></i>Customer-lists</a></li>
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

            
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 ms-auto mt-5 pt-5 mb-5">
                        <h4 class="text-dark fw-bold">Customer-Lists</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card cards">
                                    <div class="card-title d-flex justify-content-end">
                                        <form action="#" method="">
                                            <div class="mt-3 mb-3 me-3">
                                                <input type="text" name="search1" id="search1" class="form-control mx-4" placeholder="Search Name.." autocomplete="off" />
                                                
                                            </div> 
                                        </form>

                                            
                                            <!-- <div class="mt-3 mb-3">
                                                <button type="button" class="btn mx-4 btns"><i class="fas fa-plus pluss"></i>New Customers</button>
                 
                                            </div>  -->
                                        
                                    </div>

                                    <div class="card-body">
                                        <table class="table bg-light  text-center table-hover tables" id="table2">
                                          
                                            <thead class="fontsizes">
                                               
                                                <tr class="tablescolor2">
                                                 
                                                    <td>No</td>
                                                    <td>Name</td>
                                                    <td>Email</td>
                                                    <td>Phone</td>
                                                    <td>Address</td>
                                                    <td>Member</td>
                                                    <td>Total Price</td>
                                                    <td>Rating</td>
                                                    <td>Feedback</td>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody class="fontsizes2">
                                            <?php  
                                               require_once "../controller/customerListController.php" ;  
                                              
                                               $count = 1;
                                               foreach ($result as $key=>$value) {
                                                   

                                                 if($value['feedback'] == NULL || $value['feedback'] == ""){
                                                     $value['feedback'] = "-";
                                                 }
                                                   echo "<tr class='tablerow'>";
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


                                        ?>
                                                 <!-- <tr>
                                                
                                                <td>A001</td>
                                                <td>Jason</td>
                                                <td>Martin</td>
                                                <td>No.43,building 301,4th Street,Manhattan</td>
                                                <td>7/11/2021</td>
                                                <td>3</td>
                                                <td>9000$</td>
                                                <td>
                                                <i class="fas fa-ellipsis-v     ellpisicon " id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                                
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                            <li><button class="dropdown-item btnedit" type="button">Edit</button></li>
                                                             <li><button class="dropdown-item btndelete" type="button">Delete</button></li>
                                                                                     </ul>
                                                </td>
                                                </tr>
                                          
                                            
                                                <tr>
                                               
                                                <td>A002</td>
                                                <td>Math</td>
                                                <td>Austion</td>
                                                <td>No.11A,8th Street and St. Mark's Place</td>
                                                <td>15/11/2021</td>
                                                <td>10</td>
                                                <td>11000$</td>
                                                <td>
                                                <i class="fas fa-ellipsis-v     ellpisicon " id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                                
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <li><button class="dropdown-item btnedit" type="button">Edit</button></li>
                                                             <li><button class="dropdown-item btndelete" type="button">Delete</button></li>
                                                                                     </ul>
                                                </td>
                                                </tr>
                                          
                                          
                                                <tr>    
                                              
                                                <td>A003</td>
                                                <td>Louis</td>
                                                <td>Tailon</td>
                                                <td>Bryant Park(1C , 15P)</td>
                                                <td>20/11/2021</td>
                                                <td>3</td>
                                                <td>5000$</td>
                                                <td>
                                                <i class="fas fa-ellipsis-v     ellpisicon " id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                                
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                                            <li><button class="dropdown-item btnedit" type="button">Edit</button></li>
                                                             <li><button class="dropdown-item btndelete" type="button">Delete</button></li>
                                                                                     </ul>
                                                
                                                </td>
                                                </tr>
        
                                            
                                           
                                                <tr>
                                                
                                                <td>A004</td>
                                                <td>Denial</td>
                                                <td>Aoth</td>
                                                <td>Central Park West Historic District‎ (28 P)</td>
                                                <td>7/11/2021</td>
                                                <td>6</td>
                                                <td>12000$</td>
                                                <td>
                                                <i class="fas fa-ellipsis-v     ellpisicon " id="dropdownMenu4" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                                
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                                            <li><button class="dropdown-item btnedit" type="button">Edit</button></li>
                                                             <li><button class="dropdown-item btndelete" type="button">Delete</button></li>
                                                                                     </ul>
                                                
                                                </td>
                                                </tr>

                                                <tr>
                                                   
                                                    <td>A001</td>
                                                    <td>Jason</td>
                                                    <td>Martin</td>
                                                    <td>No.43,building 301,4th Street,Manhattan</td>
                                                    <td>7/11/2021</td>
                                                    <td>3</td>
                                                    <td>9000$</td>
                                                    <td>
                                                    <i class="fas fa-ellipsis-v     ellpisicon " id="dropdownMenu5" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                                
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu5">
                                                            <li><button class="dropdown-item btnedit" type="button">Edit</button></li>
                                                             <li><button class="dropdown-item btndelete" type="button">Delete</button></li>
                                                                                     </ul>
                                                    
                                                    </td>
                                                    </tr> -->

                                                   
                                                  
    
    
                                               
                                            </tbody> 
                                     
                                        </table>
                                    </div>


                                    <!-- <nav class="">
                                        <ul class="pagination pagination-sm justify-content-center">
                                            <li class="page-item"><a href="#" class="page-link px-3 py-2 text-dark"><span>&laquo;</span></a></li>
                                            <li class="page-item active"><a href="#" class="page-link px-3 py-2 text-dark"><span>1</span></a></li>
                                            <li class="page-item"><a href="#" class="page-link px-3 py-2 text-dark"><span>2</span></a></li>
                                            <li class="page-item"><a href="#" class="page-link px-3 py-2 text-dark"><span>3</span></a></li>
                                            <li class="page-item"><a href="#" class="page-link px-3 py-2 text-dark"><span>&raquo;</span></a></li>
                                        </ul>
                                    </nav> -->
                                </div>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                                               
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