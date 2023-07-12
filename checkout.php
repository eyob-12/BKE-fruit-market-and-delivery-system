<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="css/headerStyle.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
    <header>
        <div class="headerClass">
            <div>
                <div ><a href="home.html">
                    <img class="logo-img"src="/img/logo-white.png" alt="logo">
                      </a>
                    <h1 id="h1Float">BKE-FRUIT <br> MARKET AND <br> DELIVERY</h1>
                </div>
                <div class="tourism-news-carousal-div">
                    <div id="slider">
                        <figure>
                            <img class="slider"src="img/logo-black.png">
                            <img class="slider"src="img/logo-color.png">
                            <img class="slider"src="img/logo-white.png">
                            <img class="slider"src="img/logo-color.png">
                        </figure>
                    </div>
                </div>

                <div class="shop-icon">
                    <div class="dropdown">
                        <img src="img/account.png">
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="account.html">My Account</a></li>
                                <li><a href="orders.html">My Orders</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                        <img src="img/heart.png">
                        <div class="dropdown-menu wishlist-item">
                            <table border="8">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="img/product/img1.jpg"></td>
                                    <td>AVOCADO</td>
                                </tr>
                                <tr>
                                    <td><img src="img/product/img2.jpg"></td>
                                    <td>MANGO</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- shop icons -->
            </div> <!-- brand -->

            <div class="menu-bar">
                <div class="menu">
                    <ul>
                        <li><a href="home.html">HOME</a></li>
                        <li><a href="about.html">ABOUT US</a></li>
                        <li><a href="home.html#features">SERVICES</a></li>
                        <li><a href="login.html">SIGN IN</a></li>
                    </ul>
                </div>
                <div class="search-bar">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                           <a href="home.html"><img src="img/search.png"></a> 
                        </div>
                    </form>
                </div>
            </div> <!-- menu -->
        </div>
    </header>

    <div class="container">
        <main>
            <div class="breadcrumb">
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li> /</li>
                    <li><a href="market.html">Market</a></li>
                    <li> /</li>
                    <li><a href="cart.php">Cart</a></li>
                    <li> /</li>
                    <li>Checkout</li>
                </ul>
            </div> <!-- End of Breadcrumb-->
    
            <h2>Billing Detail</h2>
            <details open>
                <div class="checkout-page">
                    <div class="billing-detail">
                        <form class="checkout-form" action="checkout.php" method="post" >
                            <h4>Shipping Detail</h4>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" id="fname" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" id="lname" name="lname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Company Name (Optional)</label>
                                <input type="text" id="cname" name="cname">
                            </div>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select id="country" name="country">
                                        <option>---Select a Country---</option>
                                        <option>Ethiopia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <select id="cityy" name="city">
                                        <option>---Select a City---</option>
                                        <option>Addis Ababa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea style="resize:none" id="address" name="address" rows="3"
                                          minlength="10"></textarea>
                            </div>
                            <h4>Login Detail</h4>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="email" name="email" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" autocomplete="off">
                                </div>
                            </div>
                            <h4>Contact Detail</h4>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" id="phone" name="phone" minlength="11" maxlength="11">
                                </div>
                            </div>
                            <h4>Additional Information (Optional)</h4>
                            <div class="form-group">
                                <label for="note">Order Note</label>
                                <textarea style="resize:none" id="note" name="orderNote" rows="3"></textarea>
                            </div>

                    
                             <div class="order-summary">

                            <div class="checkout-total">
                                <h3>Order Summary</h3>
                                <ul>
                                    <li>Total Amount:  <span name="total"  id="total"></span></li>
                                    <hr>
                                    <li><input type="radio" name="payment"> Cash on Delivery</li>
                                    <li><input type="radio" id="easypaisa" name="payment" value="telebirr"> Telebirr
                                        Account
                                    </li>
                                    <li>
                                        <textarea id="telebirrText" rows="5" disabled="disable">Please deposit the payment in our telebirr account# 251-XXXXXXX after confirm payment kindly send us payment slip and order transaction id on above number.</textarea>
                                    </li>
                                    <li><input type="radio" name="payment"> Bank Transferred</li>
                                    <hr>
                                    <li><input type="submit" name="order" value="Place Order"></li>
                                </ul>
                            </div>
                        </form> <!-- End of Checkout Form -->
                    
                      </div>
                    </div>
                </div>
            </details>
            <h2>Shipping</h2>
            <details></details>
            <hr>
            <h2>Payment</h2>
            <details></details>
            <hr>
            <h2>Customer</h2>
            <details>
            </details>
        </main> <!-- Main Area -->
    </div>
     <script>
      var totalprice=localStorage.getItem("myvalue");
      var total=document.getElementById("total");
      total.innerText=totalprice;
        var resetvalue=0;
        localStorage.setItem("myvalue",resetvalue);
        
     </script>
<footer>
    <div class="container">
        <div class="footer-widget">
            <div class="widget">
                <div class="widget-heading">
                    <h3>Important Link</h3>
                </div>
                <div class="widget-content">
                    <ul>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="refund.html">Refund Policy</a></li>
                        <li><a href="terms.html">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="widget">
                <div class="widget-heading">
                    <h3>Information</h3>
                </div>
                <div class="widget-content">
                    <ul>
                        <li><a href="account.html">My Account</a></li>
                        <li><a href="order.html">My Orders</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <div class="widget">
                <div class="widget-heading">
                    <h3>Follow us</h3>
                </div>
                <div class="widget-content">
                    <div class="follow">
                        <ul>
                            <li><a href="#"><img src="img/facebook.png"></a></li>
                            <li><a href="#"><img src="img/twitter.png"></a></li>
                            <li><a href="#"><img src="img/instagram.png"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget-heading">
                    <h3>Subscribe </h3>
                </div>
                <div class="widget-content">
                    <div class="subscribe">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subscribe" placeholder="Email">
                                <img src="img/paper_plane.png">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- Footer Widget -->
        <div class="footer-bar">
            <div class="copyright-text">
                <p>bke-fruit.com <br>
                    Copyright &copy; AMIT 2023 All Rights Reserved.</p>
            </div>
        </div> <!-- Footer Bar -->
    </div>
</footer> <!-- Footer Area -->

    
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['order'])) {
    // Retrieve form data
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $companyName = $_POST['cname'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $orderNote = $_POST['orderNote'];
    $paymentMethod = $_POST['payment'];
    $totalAmount = $_POST['total'];

    // Process the form data (you can add your own logic here)

    // Example: Save the form data to a database
    
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO checkout (firstName, lastName, companyName, country, city, address, email, password, phone, orderNote, paymentOption, totalAmount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $firstName, $lastName, $companyName, $country, $city, $address, $email, $password, $phone, $orderNote,  $paymentMethod, $totalAmount);
    
    // Execute the statement
    $stmt->execute();
    echo"<script> alert('Your order will be delivered soon.')</script>";
    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to a thank you page or display a success message
    
    exit();
}
?>
