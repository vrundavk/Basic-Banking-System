<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <script type="text/javascript">
        function preback(){window.history.forward();}
        setTimeout("preback()",0);
        window.onunload = function(){null};
    </script>
</head>
<body>

    <?php
    include 'navbar.php';
    ?>

    
    <header class="heading">
    
            <div class="row row-header justify-content-center align-items-center "  style="background-color: #2b6777; ">
                <div class="col-12 col-sm-6 " id="fade" style="padding:50px">
                
                    <h1>My Bank</h1>
                    <p>Welcome to My Bank, Ideal destination for Personal Banking need!</p>
                    <p>We offers wide range of consumer banking services like savings account,checking account, fixed deposit, debit and credit cards, loans and various other services.</p>
                
                    
                </div>
                <div class="col-12 col-sm-6 text-center"  style="background-color: #c8d8e4;padding:50px">
                    <img src="img/logo.png" id="fade" class="img-fluid " width="430px" height="420px" >    
                </div>
                
            </div>
             
    </header>
    
    <div class="container">
        <div class="card-deck" style="padding: 20px;">
            <div class="card">
                <img class="card-img-top" src="img/a.jpg" alt="Card image cap" height="200px">
                <div class="card-body">
                <h5 class="card-title">Services</h5>
                <p class="card-text">INTERNET BANKING Carry out your banking transactions safely with My Bank. INSURANCE Designed to meet your different needs. MUTUAL FUNDS Create your ocean of wealth with investments in mutual funds.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/c.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Transfer Money</h5>
                <p class="card-text">The Fastest Growing Money Transfer Company.Sending so much more than money. Uniting People with Possibilities.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/b.jfif" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">View Customers</h5>
                <p class="card-text">View all the customers, select the customer you want to transfer money from which redirects you to a page where you select the reciever and complete the transaction.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>


    <div class="row row-header" style="background-color: #ab6777;">
        <div class="col-12 col-sm-6 " style="padding: 20px;"> 
            <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel" data-interval="1500">
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="img/about1.jpg" alt="First slide" >
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="img/about2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="img/about3.jpg" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 text-center my-auto " > 
            <h4>About Us</h4>
            <p>It is a story scripted in corporate wisdom and social pride. It is a story crafted in private capital, princely patronage and state ownership. It is a story of ordinary bankers and their extraordinary contribution in the ascent of Bank of Baroda to the formidable heights of corporate glory. It is a story that needs to be shared with all those millions of people - customers, stakeholders, employees & the public at large - who in ample measure, have contributed to the making of an institution.</p>
            <h4>Our Mission</h4>
            <p>To be a top ranking National Bank of International Standards committed to augmenting stake holders' value through concern, care and competence.</p>
        </div>
    </div>



    <?php
    include 'footer.php';
    ?>







<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>