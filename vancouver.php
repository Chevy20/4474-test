<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
    function is_trip_in_wishlist($connection, $user_id, $trip_id) {
        $query = "SELECT * FROM wishlist WHERE user_id = ? AND trip_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ii", $user_id, $trip_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    
    $trip_id = 1; // replace this with the actual trip ID
    $is_trip_in_wishlist = is_trip_in_wishlist($connection, $user_id, $trip_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Vancouver Trip Information</title>
</head>

<body>
    <style>
        .c-item {
            height: 800px;
        }

        .c-img {
            height: 100%;
            object-fit: cover;
        }
        .buttons-container {
            display: flex;
            gap: 10px;
        }

        .like-btn {
            padding: 6px 10px;
            font-size: 24px;
        }

        .like-btn .fa-heart-o {
            pointer-events: none;
        }

        .like-btn:focus {
            outline: none;
        }

        .like-btn.active {
            color: red;
        }

        .like-btn.active .fa-heart-o {
            content: "\f004";
        }
    </style>
    <!-- Navigation Bar 1 -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/gachi.jpg" alt="Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1"
                aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="row">
                            <a class="nav-link" href="#">
                                <span>
                                    <img src="img/home.png" alt="Home icon" style="width:20px;height:20px">
                                </span>
                                <span>Home </span>

                            </a>

                        </div>

                    </li>
                    <li class="nav-item">



                        <a class="nav-link" href="#">
                            <span>
                                &nbsp; &nbsp;
                                <img src="img/help.png" alt="Help icon" style="width:20px;height:20px">
                            </span>
                            <span>Help</span>
                        </a>


                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
			    <li><a class="dropdown-item" href="a.php">Manage Account</a></li>
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
                    <h1>Vancouver</h1>
                </div>
                <div id="tripImgs" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#tripImgs" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#tripImgs" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#tripImgs" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active c-item">
                            <img src="img/vancouver1.jpg" class="d-block w-100 c-img" alt="Trip Image">
                        </div>
                        <div class="carousel-item c-item">
                            <img src="img/vancouver2.jpg" class="d-block w-100 c-img" alt="Trip Image">
                        </div>
                        <div class="carousel-item c-item">
                            <img src="img/vancouver3.jpg" class="d-block w-100 c-img" alt="Trip Image">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#tripImgs" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#tripImgs" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>
    </section>
    <!--Trip Info-->
    <section class="bg-white text-dark p-3 text-left">
        <div class="container">
            <div class="d-md-flex flex-column justify-content-between align-items-center">
                <h2 class="mb-3 mb-md-0">About the Trip</h2>
                <p>Explore the stunning beauty of Vancouver on a bus trip that takes you through the city's most iconic landmarks and breathtaking natural scenery. 
                    Experience the best of Vancouver, including Stanley Park, Granville Island, and the Capilano Suspension Bridge, as well as the city's vibrant neighborhoods 
                    and diverse cultures. Sit back and relax as your knowledgeable guide shares fascinating insights about the city's history, culture, and unique features. 
                    Whether you're a local or a visitor, this bus tour is an excellent way to discover the charm and beauty of Vancouver.</p>
                <ul>
                    <li>Country: Canada</li>
                    <li>Duration (days): 5</li>
                    <li>Price per Ticket (CAD): $300.00</li>
                </ul>
                <form action="booking.php" method="GET" target="_self">
                    <div class="mb-3">
                        <input type="hidden" name="tripName" value="Vancouver" />
                        <input type="hidden" name="country" value="Canada" />
                        <input type="hidden" name="duration" value="5" />
                        <input type="hidden" name="ticketPrice" value="300.00" />
                        <input type="hidden" name="tripId"  value ="1"/>
                    </div>
                    <div class="buttons-container">
                    <button type="submit" class="btn btn-primary">Book Now!</button>
                    <button type="button" class="btn btn-outline-danger like-btn<?php if ($is_trip_in_wishlist) echo ' active'; ?>">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </button>
                </div>
                    
                </form>

            </div>

        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
        <script>
            const likeBtn = document.querySelector('.like-btn');

            likeBtn.addEventListener('click', function () {
                const tripId = document.querySelector('input[name="tripId"]').value;
                const formData = new FormData();
                formData.append('trip_id', tripId);

                if (this.classList.contains('active')) {
                    this.classList.remove('active');
                    fetch('remove_from_wishlist.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data); // Check for success or error messages from the PHP script
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                } else {
                    this.classList.add('active');
                    fetch('add_to_wishlist.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data); // Check for success or error messages from the PHP script
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        </script>



</body>

</html>
