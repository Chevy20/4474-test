<?php
  session_start();
  $user_id = $_SESSION['user_id'];
  include 'connection.php'
?>
<!doctype html>
<html lang="en">
  <link>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"></link>
    
  </head>
<body>
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
                    <a class="nav-link" href="HomePage.php">
                        <span>
                            <i class="fa-solid fa-house fa-lg"></i>
                        </span>
                        <span>Home </span>
                    </a>
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
                        <span><i class="fa-regular fa-circle-user"></i></span>
                        <span>Account</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item nav-link" href="Wishlist.php">Wishlist</a></li>
                        <li><a class="dropdown-item nav-link" href="managebooking.php">Manage Bookings</a></li>
                        <li><a class="dropdown-item nav-link" href="a.php">Account Settting</a></li>
                        <li><a class="dropdown-item nav-link" href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
       <!--Change image and text to show side by side-->
    <!--Showcase-->
    <section class="bg-white text-dark p-lg-0 text-center">
        <div class="container">
            <div class="d-sm-flex flex-column">
                <div>
                    <h1>Manage Boookings</h1>
                    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Booking #</th>
            <th scope="col">User ID</th>
            <th scope="col">Trip ID</th>
            <th scope="col">Trip Name</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Cost</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $result1 = $connection->query("SELECT booking_num, user_id, trip_id, trip_name, startDate, endDate, Cost FROM Travelled_trip WHERE user_id = $user_id" );
            $tripper = 1;
            while ($row1 = $result1->fetch_assoc()) {
                echo '<tr>';
                echo '<th scope="row">' . $tripper . '</th>';
                echo '<td>' . $row1["booking_num"] . '</td>';
                echo '<td>' . $row1["user_id"] . '</td>';
                echo '<td>' . $row1["trip_id"] . '</td>';
                echo '<td>' . $row1["trip_name"] . '</td>';
                echo '<td>' . $row1["startDate"] . '</td>';
                echo '<td>' . $row1["endDate"] . '</td>';
                echo '<td>' . $row1["Cost"] . '</td>';
                echo '<td>
                        <form action="delete_trip.php" method="post">
                            <input type="hidden" name="booking_num" value="' . $row1["booking_num"] . '">
                            <button type="submit" class="btn btn-danger">
                            <img src="img/542724.png" class="card-img-top" style="width:20px;height:20px;">
                          </button>
                        </form>
                      </td>';
                echo '</tr>';
                $tripper = $tripper + 1;
            }
        ?>
    </tbody>
</table>

                </div>


        </div>
    </section>
</body>
