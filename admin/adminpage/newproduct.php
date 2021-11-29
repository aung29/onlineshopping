<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
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

                <ul class="navbar-nav flex-column mt-4" id="click">
                    <li class="nav-item"><a href="dashboard.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-home fa-lg me-3"></i>Dashboard</a></li>
                    <li class="nav-item"><a href="products.php" class="nav-link text-white p-3 mb-2 sidebarlinks "><i class="fas fa-cubes fa-lg me-3"></i>Product</a></li>
                    <li class="nav-item"><a href="orderlists.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-cash-register fa-lg me-3"></i>Order-list</a></li>
                    <li class="nav-item"><a href="customers.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-user-friends fa-lg me-3"></i>Customer-lists</a></li>
                    <li class="nav-item"><a  class="nav-link text-white p-3 mb-2 currents"><i class="fas fa-shopping-cart fa-lg me-3"></i>New Product</a></li>
                    <!-- <li class="nav-item"><a href="feedback.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-comment-alt fa-lg me-3"></i>Feedback</a></li> -->
                    <li class="nav-item"><a href="membership.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-table fa-lg me-3"></i>Membership</a></li>
                    <li class="nav-item"><a href="../../customer/index.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-user fa-lg me-3"></i>Customer-View</a></li>
                </ul>
            </div>


                   <div class="col-lg-10  py-2 ms-auto py-2 fixed-top backgroundtop">
                            <div class="row">
                               
 
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
        <form id="productform" enctype="multipart/form-data" >
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-10 ms-auto mt-5 pt-5 mb-5">
                         <h4 class="text-dark fw-bold">Add Product</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <h3 class="card-title p-3">Basic Information</h3>
                                    <h6 class="card-subtitle px-3 mb-2">Fill all information below</h6>
                                   
                                            <div class="card-body">
                                               
                                                <div class="row">
                                                
                                                 <div class="col-6">
                                               
                                                <div class="form-group">
                                                    <label for="productname">Product Name</label>
                                                    <input type="text" name="productname" id="productname" class="form-control mt-2" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                               
                                               <div class="form-group">
                                                   <label for="category">Product Category</label>
                                                    <select name="category" id="category" class="form-control mt-2">
                                                        <option value="choose" selected disabled>Choose Category</option>
                                                        <option value="fruits">Fruits</option>
                                                        <option value="vegetables">Vegetables</option>
                                                        <option value="meat">Meat</option>
                                                    </select>
                                               </div>
                                           </div>

                                             <div class="col-6">
                                                <div class="form-group mt-3">
                                                    <label for="productid">Product Id</label>
                                                    <input type="text" name="productid" id="productid" class="form-control mt-2" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group mt-3">
                                                    <label for="productprice">Product Sale Price</label>
                                                    <input type="number" name="productprice" id="prouductprice" class="form-control mt-2" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group mt-3">
                                                    <label for="productinitprice">Product Initial Price</label>
                                                    <input type="number" name="productinitprice" id="productinitprice" class="form-control mt-2" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group mt-3">
                                                    <label for="productrating">Rating</label>
                                                    <input type="number" name="productrating" id="productrating" class="form-control mt-2" required>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6">
                                                <div class="form-group mt-3">
                                                    <label for="quantity">Product Quantity</label>
                                                    <input type="number" name="quantity" id="productmanu" class="form-control mt-2"required >
                                                </div>
                                            </div>
                                           

                                            <div class="col-6">
                                                <div class="form-group mt-3">
                                                    <label for="productimage" class="text-dark">Product Image</label>
                                                    <input type="file" name="productimage"  id="productimage" class="form-control" required accept=".jpg,.png,.gif,.jpeg">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group mt-3">
                                                    <label for="productdesc">Product Description</label>
                                                    <textarea type="text" name="productdesc" id="productdesc" class="form-control mt-2" rows="3"> </textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-7 mt-5">
                                                     <input type="submit" name="submit" class="btn btn1" value="Save Changes">
                                                     <button type="cancel" class="btn btn2">Cancel</button>
                                                
                                            </div>
                                        </div>
                                      
                                      
                                      </div>
                                </div>
                               
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
             </form>
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
        