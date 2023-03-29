<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    
</head>
<body>

<?php include 'connection.php';?> <!-- b onnect to db -->
  
  
    <!-- Navigation Bar 1 -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="gachi.jpg" alt="Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="row">
                          <a class="nav-link" href="#">
                            <span>
                              <i class="fa-solid fa-house fa-lg"></i>
                              
                            </span>
                            <span>Home </span>

                          </a>
                          
                        </div>
                        
                    </li>
                    <li class="nav-item">
                      


                        <a class="nav-link" href="#"> 
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
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Full Screen Image -->
    <a href="#" class="d-block bg-image hover-zoom" data-bs-toggle="popover" data-bs-placement="top" title="Return to Home Page"> </a>
    <style>
      /* Custom CSS */
      .bg-image {
          background-image: url("james.jpg");
          background-size: cover;
          background-position: center;
          height: 30vh;
      }
      
  </style>

    
    <div class="container-fluid bg-light">
        <div class="row justify-content-center mt-5">
          <div class="col-md-8 col-lg-100 border rounded p-4 bg-white">
            <h1 class="text-center mb-4">My Account</h1>
            
            <h2>Welcome Back</h2>
            <h4>Account Number: 219312931</h4><br>
  
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-fill " role="tablist">
              <li class="nav-item" role="presentation" >
                
                <a class="nav-link active align-items-center"  data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true" data-bs-toggle="tooltip" data-bs-placement="top" title="View General information with Account">
                  <span>
                    <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                    
                  </span>
                  <span>&nbsp; Overview</span>
                </a>
              </li>
              
              <li class="nav-item" role="presentation">
                <button class="nav-link  align-items-center" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Check stored credit card (add or remove)">
                  <span>
                    <i class="fa-solid fa-wallet fa-xl" style="color: #ad590b;"></i>
                    
                  </span>
                  <span> &nbsp; Payment Information</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link  align-items-center" id="trips-tab" data-bs-toggle="tab" data-bs-target="#trips" type="button" role="tab" aria-controls="trips" aria-selected="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Check trips travelled">
                  <span>
                    <i class="fa-solid fa-bus fa-xl" style="color: #ffd814;"></i>
                  </span>
                  <span> &nbsp; Past Trips</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link  align-items-center" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
                  <span>
                    <i class="fa-solid fa-gear fa-xl" style="color: #47494d;"></i>
                  </span>
                  <span> &nbsp; Settings</span>
                </button>
              </li>
              
            </ul>


            

            
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">

                <br>
                <h2>Details</h2><hr>
                                               
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Contact Information</h5>
                          <p class="card-text">First Name: James</p>
                          <p class="card-text">Last Name: dad </p>
                          <p class="card-text">Phone: 923123219 </p>
                          <p class="card-text">email: jasd@gmail.com </p>

                          <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="changepassword.html"  >Edit Information</a>
                        </div>
                      </div>
                      

                    <br><br>
                    
    
                    <div class="card">
                      <div class="card-body">
                        <h2 class="card-title">Address</h2>
                        <hr>
                        <div class="row">
                          <div class="col-md-6">
                            <span>Street Name: 192 CookieCream street</span><br><br>
                            <span>City: Mana</span><br><br>
                            <a href="updateaddress.html" class="btn btn-primary">Edit Address</a>
                          </div>
                          
                          <div class="col-md-6">
                            <span>Province:AZ</span><br><br>
                            <span>Country:Earth Core</span><br><br>
                            <span>Postal Code:A21 A9B</span>
                          </div>
                        </div>
                      </div>
                    </div>
  
                  <br>
                  
                  

              </div>
              <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">

            
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <img src="visa.jpg" alt="Image" height = "30" width = "50">Credit Card Information
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <p>Card Number: 1234 5678 9012 3456</p>
                          <p>Expiration Date: 01/23</p>
                          <p>CVC: 123</p>
                          <p>Name on Card: John Doe</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="#" class="btn btn-primary">Add New card</a>
                  



              </div>
              <div class="tab-pane fade" id="trips" role="tabpanel" aria-labelledby="trips-tab">
                <table class="table table-striped">
                    <thead>
                    
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Trip Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Cost</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                    $result1 = $connection -> query("SELECT user_id,trip_id, myDate, Cost FROM Travelled_trip");
                    if (!$result1) {
                      //die("databases query didn't succeed.");
                    }

                    
                      
                    ?>
                      
                    </tbody>
                  </table>
              </div>



              <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab" id="setting">

                <div class="row">
                    <div class="col-4">
                      <nav id="navbar" class="h-100 flex-column align-items-stretch pe-4 border-end">
                        <nav class="nav nav-pills flex-column">

                          <a class="nav-link" data-bs-toggle="pill" href="#privacy">Privacy and Security</a>
                          <a class="nav-link" data-bs-toggle="pill" href="#notifications">Notifications</a>
                          <a class="nav-link" data-bs-toggle="pill" href="#changepassword">Change Password</a>             
                          <a class="nav-link" data-bs-toggle="pill" href="#updatecontact"  >Update Contact Info.</a>
                          <a class="nav-link" data-bs-toggle="pill" href="#updateaddress"  >Update Address</a>
                          <a class="nav-link text-danger" id="ddbut" data-bs-toggle="pill" href="#deleteaccount"  >Delete Account</a>

                          <style>
                            #ddbut.nav-link.active {
                                background-color: #ff9999;
                                color: white;
                            }
                            </style>
                            



                          
                        </nav>
                      </nav>
                    </div>
                    <div class="col-8">
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="privacy">
                          <h3>Privacy Settings</h3>
                          <!-- Rounded switch -->
                          <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="travel-history">
                            <label class="form-check-label" for="travel-history">Allow Company to collect recent travel history information</label>
                            
                          </div>
                          
                          <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="email-deals">
                            <label class="form-check-label" for="email-deals">Allow Company to send out limited deals and discount to your email</label>
                          </div>
                          
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="disclose-info">
                            <label class="form-check-label" for="disclose-info">Allow your information to be disclosed to third party company</label>
                          </div>
                          
                        </div>

                        <div class="tab-pane fade" id="notifications">
                          <h3>Notification Settings</h3>
                          <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="travel-history">
                            <label class="form-check-label" for="travel-history">Notify me when the wishlist trip is on Sale</label>
                            
                          </div>
                          
                          <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="email-deals">
                            <label class="form-check-label" for="email-deals">Notify me when with Seasonal Limited Deals</label>
                          </div>
                        </div>

                        <div class="tab-pane fade" id="changepassword">
                          
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Change Password</h5>
                              <p class="card-text">Forgot your passwords?</p>
                              <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="changepassword.html"  >Change Passowrd</a>


                              
                              
                            </div>
                          </div>
                        </div>

                        <div class="tab-pane fade" id="deleteaccount">
                          <h5 class="card-title">Delete Account</h5>


                          <div class="card" style="max-height: 50px; ">
                            <div class="card-body">
                              
                              <span> 
                                <i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ff0000;"></i>
                                <span class="text-danger"> Are you certain of this action, your account will be deleted permanently!!!</span>
                              </span>
                            </div>
                          </div>

                          
                          <br>  
                          <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleting">
                            Delete Account
                          </a>

                          <!-- Modal -->
                          <div class="modal fade" id="deleting" tabindex="-1" aria-labelledby="deletingLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deletingLabel">Delete Account</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Are you sure you want to delete your account?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                              </div>
                            </div>
                          </div>    
                        </div>

                        <div class="tab-pane fade" id="updatecontact">
                          <h3>Update Contact Information</h3>
                          <p>Click here to update your address</p>
                          <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="updatecontact.html"  >Update Address</a>
                          
                        </div>


                        <div class="tab-pane fade" id="updateaddress">
                          <h3>Update Address</h3>
                          <p>Click here to update your address</p>
                          <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="updateaddress.html"  >Update Address</a>
                          
                        </div>




                        

                        

                        




                      </div>

                    </div>
 
                </div>
                
    
              </div>

            </div>
          
        </div>
      </div>


      



    <!-- Bootstrap Bundle with Popper and jQuery -->
    <script src="https://kit.fontawesome.com/358b3891c8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    

</body>
</html>
