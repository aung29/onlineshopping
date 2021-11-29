<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" type="image/png" href="img/logo.png" sizes="16x16" />
</head>
<body>
    
     <nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 bg-light">
                        <div class="row">
                            <div class="col-6">
                                    <img src="img/fruit.png" alt="logo" width='60px' class="img-thumbnail rounded-circle ms-3 mb-2 mt-2 " style="border : none;box-shadow : 3px 3px 4px black">
                            </div>

                            <div class="col-6 text-end">
                                    <h3 class="fs-4 fw-bold text-success mt-3 ">Organic Fruity</h3>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </nav>


    <section>

        <div class="container-fluid">
                <div class="row">
                        <div class="col-12 ">
                                <div class="form-container" >
                                        <div class="box">

                                        <form action="controller/loginController.php" method="POST">
                                            <h3 class="text-light fs-4 fw-bold">Admin Manager</h3>
                                            <div class="form-group">
                                                <label for="name" class="col-form-label text-light">Username</label>
                                                
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name....">
                                            </div>


                                            <div class="form-group">
                                                <label for="password" class="col-form-label text-light">Password</label>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password....">
                                            </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" name="submit" class="btn mt-3 me-3 bg-light text-dark fw-bold">Login</button>
                                            </div>
                                        </form>
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
</html>