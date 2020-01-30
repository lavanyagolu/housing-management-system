<?php
    require 'config.php';
    require 'server.php';
    
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }
    
    $house_id = $_GET['house_id'];

    $sql = "select first_name,last_name,email,ph_no,user_name
            from user
            where id=
                (select id
                 from house_table
                 where house_id='".$house_id."')";
    
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $seller_name = $row['first_name']." ".$row['last_name'];
            $email = $row['email'];
            $ph_no = $row['ph_no'];
            $username = $row['user_name'];
        }
    }
    
    $phone_no = sprintf("(%s) %s-%s",substr($ph_no, 0, 3),substr($ph_no, 3, 3),substr($ph_no, 6, 4));
    
    $sql = "select house_description,address,city,state,zipcode,bedrooms,bathrooms,price,sqft
            from house_table
            where house_id='".$house_id."'";
    
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $house_description = $row['house_description'];
            $street = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $zipcode = $row['zipcode'];
            $bedrooms = $row['bedrooms'];
            $bathrooms = $row['bathrooms'];
            $price = "$"."".number_format($row['price'], 0);
            $sqft = number_format($row['sqft'], 0);
        }
    }
    
    $address = $street.", ".$city.", ".$state." ".$zipcode;
    
    if (isset($_POST['accept'])) {
        $sql = "update sa_listing
        set status='Listed'
        where house_id='".$house_id."'";
        
        $result = $db->query($sql);
        
        header('location: selleragentview.php');
    }
    
    if (isset($_POST['reject'])) {
        $sql = "delete from sa_listing
        where house_id='".$house_id."'";
        
        $result = $db->query($sql);
        
        header('location: selleragentview.php');
    }
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<meta name="author" content="Lavanya Goluguri" />
<meta name="description" content="HOUSING SYSTEM" />
<meta name="keywords" content="Give your key words for SEO" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style>
table {
    width: 100%;
}
table.center {
    margin-left:auto;
    margin-right:auto;
}
th {
    border-bottom: 1px solid #ddd;
    text-align: left;
}
td {
    border-bottom: 1px solid #ddd;
}
h3 {
    text-align:center;
}
img.round {
    border-radius: 100%;
}
figure {
    display:inline-block;
    text-align:center;
}
form.myForm {
    border: none;
}
.column {
    float: left;
    width: 50%;
}
.row:after {
    content: "";
    display: table;
    clear: both;
}
.eqi-container {
    display: flex;
    justify-content: space-between;
    width: 200px;
    margin:auto;
}
.textbox {
    margin-left:3cm;
    margin-right:3cm;
}
</style>

<title>HOUSING SYSTEM</title>
<!-- ADDING CSS HERE -->
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
<!-- Header starts here -->
<header class="header">
    <div class="wrapper">
        <h1>HOUSING SYSTEM</h1>
    </div>
</header>
<!--Header ends here -->
<!-- Menu starts here -->
<nav class="menu">
    <div class="wrapper">
        <ul>
            <a href="selleragentview.php"><li>HOME</li></a>
            <a href="message.php"><li>Message</li></a>
            <a style="text-decoration:underline" href="index.php">Log Out</a>
            <a href="selleragentview.php">Welcome <?php  if (isset($_SESSION['username'])) : ?>
            <?php echo $_SESSION['username']; ?>
            <?php endif ?></a>
        </ul>
    </div>
    <br>
</nav>
<!--Menu ends here -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h3>Property Images</h3>
            <img class="center-block" src="images/1.jpg">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h3>Seller Information</h3>
            <p style="font-size:18px"><?php echo $seller_name." ".'('.$username.')'; ?></p>
            <p style="font-size:16px"><?php echo $email; ?></p>
            <p style="font-size:16px"><?php echo $phone_no; ?></p>
        </div>
        <div class="col-md-8">
            <h3>House Information</h3>
            <div class="textbox">
                <div class="row">
                    <div class="column">
                        <b><p style="font-size:16px">Address</p></b>
                        <b><p style="font-size:16px">Asking Price</p></b>
                        <b><p style="font-size:16px">Square Footage</p></b>
                        <b><p style="font-size:16px">Bedrooms</p></b>
                        <b><p style="font-size:16px">Bathrooms</p></b>
                        <b><p style="font-size:16px">Additional Comments</p></b>
                    </div>
                    <div class="column">
                        <p style="font-size:16px"><?php echo $address; ?></p>
                        <p style="font-size:16px"><?php echo $price; ?></p>
                        <p style="font-size:16px"><?php echo $sqft; ?></p>
                        <p style="font-size:16px"><?php echo $bedrooms; ?></p>
                        <p style="font-size:16px"><?php echo $bathrooms; ?></p>
                        <p style="font-size:16px"><?php echo $house_description; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        <p>Contact the seller before you accept or reject a contract.</p>
            <div class="eqi-container">
                <div>
                    <form class="myForm" action="" method="post">
                        <input type="submit" value="Accept" name="accept">
                    </form>
                </div>
                <div>
                    <form class="myForm" action="" method="post">
                        <input type="submit" value="Reject" name="reject">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>

<!--Main body ends here -->
<!--Footer starts here -->
<br>
<br>
<br>
<footer class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

</body>
</html>