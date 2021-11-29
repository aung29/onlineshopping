<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css" type="text/css">
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
                    <li class="nav-item"><a href="customers.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-user-friends fa-lg me-3"></i>Customer-lists</a></li>
                    <li class="nav-item"><a href="newproduct.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-shopping-cart fa-lg me-3"></i>New Product</a></li>
                    <li class="nav-item"><a class="nav-link text-white p-3 mb-2 currents"><i class="fas fa-comment-alt fa-lg me-3"></i>Feedback</a></li>
                    <li class="nav-item"><a  class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-table fa-lg me-3"></i>Membership</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-user fa-lg me-3"></i>Customer-View</a></li>
                </ul>
            </div>


            <div class="col-lg-10  py-2 ms-auto py-2 fixed-top backgroundtop">
                <div class="row">
                            
                    <div class="col-lg-8 py-2">
                        <ul class="nav justify-content-end">
                            <li class="nav-item mt"><i class="fas fa-cog "></i></li>
                            <li class="nav-item mt"><i class="fa fa-bell"></i></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-center">
                            <img src="img/user.jpg" alt="user" class="rounded-circle me-3" width="50px" >
                            <p class=" text-dark texts">Admin Manager<i class="fas fa-arrow-down icon2"></i></p>
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
                        <h4 class="text-dark fw-bold">Feedback</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-title d-flex justify-content-end">
                                        <form action="#" method="">
                                            <div class="mt-3 mb-3">
                                                <input type="text" name="search" id="search" class="form-control mx-4" placeholder="search....." autocomplete="off" />
                 
                                            </div> 
                                        </form>

                                        
                                           
                                        
                                    </div>

                                    <div class="card-body">
                                        <table class="table bg-light  text-center tables">
                                            <form action="" method="">
                                            <thead class="fontsizes">
                                                <tr class="tablescolor2">
                                                  
                                                    <td>Rating Id</td>
                                                    <td>Full Name</td>
                                                    <td>Feedback</td>
                                                    <td>Rating</td>
                                                    <td>Customer ID</td>
                                                    <td>Rating Date</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody class="fontsizes3">
                                               
                                            <?php
                                                 require "../dbconnect/dbConnection.php";
                                                 require "searchRating.php" ;  

                                                    $count = 1;
                                                    foreach ($result as $key=>$value) {
                                                        echo "<tr>";
                                                        echo "<td>".$count++."</td>";
                                                        echo "<td>".$value['name']."</td>";
                                                        echo "<td>".$value['feedback']."</td>";
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

                                                        echo "<td>".$value['customer_id']."</td>";
                                                        echo "<td>".$value['rating_date']."</td>";
                                                        echo "<td>".
                                                        '<i class="fas fa-ellipsis-v  ellpisicon " id="dropdownMenu5" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu5">
                                                                <li><button class="dropdown-item btnedit" type="button">Edit</button></li>
                                                                <li><button class="dropdown-item btndelete" type="button">Delete</button></li>
                                                            </ul>'."</td>";
                                                        echo "</tr>";
                                                    }
                                            ?>
        
                                            
                                           
                                                
                                            </tbody>
                                        </form>
                                        </table>
                                    </div>


                                    <nav class="">
                                        <ul class="pagination pagination-sm justify-content-center">
                                            <li class="page-item"><a href="#" class="page-link px-3 py-2 text-dark"><span>&laquo;</span></a></li>
                                            <li class="page-item active"><a href="#" class="page-link px-3 py-2 text-dark"><span>1</span></a></li>
                                            <li class="page-item"><a href="#" class="page-link px-3 py-2 text-dark"><span>2</span></a></li>
                                            <li class="page-item"><a href="#" class="page-link px-3 py-2 text-dark"><span>3</span></a></li>
                                            <li class="page-item"><a href="#" class="page-link px-3 py-2 text-dark"><span>&raquo;</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="js/app1.js" type="text/javascript"></script>
  </body>
</html> -->
