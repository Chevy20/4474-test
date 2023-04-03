<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HCI Search Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

    <?php include 'connection.php';?> <!-- b onnect to db -->

    <?php
    session_start();
    $user_id = $_SESSION['user_id'];

    ?>  


    <div class="header">
      <!-- Navigation Bar 1 -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/gachi.jpg" alt="Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="row">
                          <a class="nav-link" href="HomePage.php">
                            <span>
                              <i class="fa-solid fa-house fa-lg"></i>
                              
                            </span>
                            <span>Home </span>

                          </a>
                          
                        </div>
                        
                    </li>
                    <li class="nav-item">
                      


                        <a class="nav-link" href="help.php"> 
                          <span>
                            &nbsp; &nbsp;
                            <i class="fa-sharp fa-regular fa-circle-question fa-lg"></i>
                          </span>
                          <span>help</span>
                        </a>


                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="Wishlist.php">Wishlist</a></li>
                            <li><a class="dropdown-item" href="#">Manage Booking</a></li>
                            <li><a class="dropdown-item" href="a.php">Account Settting</a></li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <div class="search param">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card border-info m-3">
                    <div class="card-body">
                        <div class="row justify-content-evenly">
                            <div class="col-auto">


                            <?php 
                            if (isset($_POST['destination'])) {
                                    $temp1 = $_POST['destination'];
            
                                    //$result2 = $connection->query('');
                                    //header('Location: Search.php');
                            
                            }                     
                            
                            
                            ?>

                            <form action="search.php" method="post">
                            <div class="searchbar">
                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="destination" placeholder="Choose a destination..." style="width:600px">
                            <datalist id="datalistOptions">
                            <option value="Emerald Lake, BC">
                            <option value="Venice, Italy">
                            <option value="Reykjavík, Iceland">
                            </datalist>
                            </div>
                            <div class="d-grid gap-2 m-2">
                            <button type="submit" class="btn btn-primary">Start Searching!</button>
                            </div>
                            </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="results">
        <div class="row justify-content-evenly">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="col-auto m-1">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Sort By...</option>
                                <option value="1">Date</option>
                                <option value="2">Price</option>
                                <option value="3">Duration</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-auto m-1">
                                <h2><span class="badge text-bg-light">Results: 3</span></h2>
                            </div>
                            <div class="row justify-content-start">
                                <div class="card m-1">
                                    <div class="row g-0 justify-content-evenly">
                                        <div class="col-auto m-1">
                                            <img src="emerald-lake-yoho-national-park-british-columbia-canada-wallpaper-1920x1080-wallpaper.jpg" class="card-img" style="width:300px;height:150px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-header">
                                                <h5 class="card-title">Emerald Lake, BC</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Emerald Lake is a freshwater lake located in Yoho National Park, British Columbia, Canada. Yoho National Park is one of the 4 contiguous National Parks in the heart of Canada's Rocky Mountains, along the boundary of British Columbia and Alberta Provinces, the other Parks are Kootenay, Jasper, and Banff.</p>
                                                <a href="#" class="btn btn-primary">View Trip Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="card m-1">
                                    <div class="row g-0 justify-content-evenly">
                                        <div class="col-auto m-1">
                                            <img src="804395.jpg" class="card-img" style="width:300px;height:150px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-header">
                                                <h5 class="card-title">Reykjavík, Iceland</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Reykjavík is a city of bold contrasts: it is both cosmopolitan and small-town; vibrant and sophisticated; young-at-heart and yet full of history. Many monuments, new and old, are also worth a peek, including the newly built oceanfront music and conference centre, Harpa.</p>
                                                <a href="#" class="btn btn-primary">View Trip Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card m-1">
                                    <div class="row g-0 justify-content-evenly">
                                        <div class="col-auto m-1">
                                            <img src="1000163-sea-city-cityscape-Italy-Venice-Tourism-evening-coast-town-canal-vacation-waterway-geographical-feature.jpg" class="card-img" style="width:300px;height:150px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-header">
                                                <h5 class="card-title">Venice, Italy</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Venice, known also as the “City of Canals,” “The Floating City,” and “Serenissima,” is arguably one of Italy's most picturesque cities. With its winding canals, striking architecture, and beautiful bridges, Venice is a popular destination for travel.</p>
                                                <a href="#" class="btn btn-primary">View Trip Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/358b3891c8.js" crossorigin="anonymous"></script>
    <script>$('.datepicker').datepicker();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>