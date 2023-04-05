<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Confirmation page</title>
</head>
<body>
    <?php include 'connection.php';?> <!-- connect to db -->
    <?php
        $PassFName = $_POST['PassFName'];
        $PassLName = $_POST['PassLName'];
        $tripName = $_POST['tripName'];
        $country = $_POST['country'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $total = $_POST['total'];
        $bNum = $_POST['bNum'];
        $tripId = $_POST['tripId'];

        $stmt = $connection->prepare("INSERT INTO Travelled_trip (booking_num, user_id, trip_id, trip_name, startDate, endDate, Cost) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("iiisssd", $bNum, $user_id, $tripId, $tripName, $startDate, $endDate, $total);

        // Execute the statement
        $result = $stmt->execute();

        if (!$result) {
            header("Location: bookerror.php");
            exit();
        }


        // Close the statement
        $stmt->close();

        // Close the connection (optional)
        $connection->close();
    ?>

    <!-- Navigation Bar 1 -->
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
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><i class="fa-regular fa-circle-user"></i></span>
                            <span>Account</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item nav-link" href="Wishlist.php">Wishlist</a></li>
                            <li><a class="dropdown-item nav-link" href="#">Manage Bookings</a></li>
                            <li><a class="dropdown-item nav-link" href="a.php">Account Settting</a></li>
                            <li><a class="dropdown-item nav-link" href="logout.php">Log Out</a></li>
                        </ul>
                    </li>
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
                </ul>
            </div>
        </div>
    </nav>
    <style>
        #pageTitle {
            text-align: center;
        }
        .input-error {
            border-color: #dc3545;
        }

        .input-error ~ .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 12px;
        }
        .confirm{
            font-size: 14px;
        }
        .clbl{
            font-size: 16px;
        }
      
   
    </style>
    <h1 id="pageTitle"> Confirmation Information<h1>
    
    <div class="container-fluid bg-light">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 col-lg-100 border rounded p-4 bg-white">
                <h4> Payment succeeded! Below you will find your confirmation information: <h3>
                <h5> An email copy will be sent to the email associated with your account. <h3>
                <!-- All fields below will be populated with php using post--> 
                <p class="clbl">Booking Number: <?php echo htmlspecialchars($bNum); ?> </p>   
                <p class="clbl">Passenger Name: <?php echo htmlspecialchars($PassFName); ?> <?php echo htmlspecialchars($PassLName); ?></span></p>
                <p class="clbl">Start Date: <?php echo htmlspecialchars($startDate); ?> </p>
                <p class="clbl">End Date: <?php echo htmlspecialchars($endDate); ?></p>
                <p class="clbl">Trip Name: <?php echo htmlspecialchars($tripName); ?></p>
                <p class="clbl">Country: <?php echo htmlspecialchars($country); ?></p>
                <p class="clbl">Total: $<?php echo htmlspecialchars($total); ?> CAD</p>
                <a href="HomePage.php" class="btn btn-primary">Return to Home</a>      <!--Change href to whatever home page is called-->

            </div>
        </div>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
</body>
