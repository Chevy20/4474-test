
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    $user_id = $_SESSION['user_id'];
    include 'connection.php'; 

    // Fetch wishlist items for the current user
    $sql = "SELECT Trips.trip_id, Trips.trip_name, Trips.pic, Trips.description
            FROM wishlist
            JOIN Trips ON wishlist.trip_id = Trips.trip_id
            WHERE wishlist.user_id = ?";

    // Prepare and execute the SQL statement
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
      die("Prepare failed: " . $connection->error);
    }
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Store the result
    $result = $stmt->get_result();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wishlist Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
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
  <div class="wishlist banner mx-auto p-2" style="width:700px">
    <h1 class="display-1">My Wishlisted Trips</h1>
  </div>
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-auto">
        <div class="search bar" style="width:1000px">
          <div class="form-outline">
            <input type="search" id="form1" class="form-control" placeholder="Searching Wishlist..."
              aria-label="Search" />
          </div>
        </div>
      </div>
      <div class="col-auto">
        <div class="edit button">
        <button type="button" class="btn btn-primary justify-content-md-center" data-bs-toggle="modal"
          data-bs-target="#exampleModal" id="edit_btn">
          Edit Wishlist
        </button>
        
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Would you like to enter editing mode?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Editing mode allows you to rearrange, and remove your wishlisted items.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="liveToastBtn">Yes</button>
                  <button type="button" class="btn btn-danger" id="modal_no">No</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-auto">
        <div class="options menu">
          <div class="btn-group">
          <button type="button" class="btn btn-success justify-content-md-center" id="confirm_btn" style="display: none;">
            Confirm Changes
          </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="wishlist items">
  <div class="row justify-content-center">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="col-md-8 p-3">
        <div id="card-<?php echo $row['trip_id']; ?>" draggable="true" class="card p-3">
          <div class="row g-0">
            <div class="col-auto">
              <img src="<?php echo $row['pic']; ?>" class="card-img" style="width:300px;height:150px;">
            </div>
            <div class="col-md-9 justify-content-center">
              <div class="card-header">
                <span class="badge text-bg-dark">Item</span>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['trip_name']; ?></h5>
                <p class="card-text"><?php echo $row['description']; ?></p>
              </div>
            </div>
          </div>
          <div class="d-grid gap-2 m-1">
            <a href="#" class="btn btn-primary">View Trip Details</a>
          </div>
          <div class="d-grid m-1">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-primary">
                ʌ
              </button>
              <button type="button" class="btn btn-outline-primary">
                v
              </button>
              <button type="button" class="btn btn-danger" disabled>
                <img src="img/542724.png" class="card-img-top" style="width:20px;height:20px;">
              </button>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
  <script src="https://kit.fontawesome.com/358b3891c8.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script>
    let isEditModeEnabled = false;
    document.getElementById('liveToastBtn').addEventListener('click', function () {
    isEditModeEnabled = true;
    document.getElementById('edit_btn').disabled = true;
    document.getElementById('confirm_btn').style.display = 'block';
  });

  document.getElementById('modal_no').addEventListener('click', function () {
    isEditModeEnabled = false;
    document.getElementById('edit_btn').disabled = false;
    document.getElementById('confirm_btn').style.display = 'none';
    modalInstance.hide();
  });

  // Add this event listener for the "Confirm Changes" button
  document.getElementById('confirm_btn').addEventListener('click', function () {
    isEditModeEnabled = false;
    document.getElementById('edit_btn').disabled = false;
    document.getElementById('confirm_btn').style.display = 'none';
    // Add any functionality you want to happen when "Confirm Changes" is clicked
  });
    document.querySelectorAll('.card').forEach((card) => {
      card.addEventListener('dragstart', (e) => {
        if (!isEditModeEnabled) return;

        e.dataTransfer.setData('text/plain', card.id);
        setTimeout(() => {
          card.classList.add('invisible');
        }, 0);
      });

      card.addEventListener('dragend', (e) => {
        if (!isEditModeEnabled) return;

        e.preventDefault();
        card.classList.remove('invisible');
      });

      card.addEventListener('dragenter', (e) => {
        if (!isEditModeEnabled) return;

        e.preventDefault();
      });

      card.addEventListener('dragover', (e) => {
        if (!isEditModeEnabled) return;

        e.preventDefault();
      });

      card.addEventListener('drop', (e) => {
        if (!isEditModeEnabled) return;

        e.preventDefault();
        const cardId = e.dataTransfer.getData('text/plain');
        const cardColumn = document.getElementById(cardId).closest('.col-md-8');
        const dropTargetColumn = e.target.closest('.col-md-8');

        if (cardColumn !== dropTargetColumn) {
          const wishlistItems = document.querySelector('.wishlist.items .row');
          const dropTargetIndex = Array.from(wishlistItems.children).indexOf(dropTargetColumn);

          if (Array.from(wishlistItems.children).indexOf(cardColumn) < dropTargetIndex) {
            wishlistItems.insertBefore(cardColumn, dropTargetColumn.nextSibling);
          } else {
            wishlistItems.insertBefore(cardColumn, dropTargetColumn);
          }
        }
      });
    });
  </script>
</body>

</html>