<?php
    require 'config.php';
    session_start();
    
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
    
    if (isset($_POST['saveEdit'])) {
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $sqft = $_POST['sqft'];
        $price = $_POST['price'];
        $bedrooms = $_POST['bedrooms'];
        $bathrooms = $_POST['bathrooms'];
        $house_description = $_POST['house_description'];
        
        if (strlen($address) > 0) {
            $sql = "update house_table
            set address='".$address."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        if (strlen($city) > 0) {
            $sql = "update house_table
            set city='".$city."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        if (strlen($state) > 0) {
            $sql = "update house_table
            set state='".$state."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        if (strlen($zipcode) > 0) {
            $sql = "update house_table
            set zipcode='".$zipcode."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        if (strlen($price) > 0) {
            $sql = "update house_table
            set price='".$price."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        if (strlen($sqft) > 0) {
            $sql = "update house_table
            set sqft='".$sqft."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        if (strlen($bedrooms) > 0) {
            $sql = "update house_table
            set bedrooms='".$bedrooms."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        if (strlen($bathrooms) > 0) {
            $sql = "update house_table
            set bathrooms='".$bathrooms."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        if (strlen($house_description) > 0) {
            $sql = "update house_table
            set house_description='".$house_description."'
            where house_id='".$house_id."'";
            
            $db->query($sql);
        }
        
        unset($_POST['saveEdit']);
        header('Location: editlisting.php?house_id='.$house_id.'');
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
form.edit {
    width: auto;
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
            <img class="center-block" src="images/3.jpg">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h3>Seller Information</h3>
            <?php
                $sql = "select first_name,last_name,email,ph_no,user_name
                from user
                where id=
                (select user_id
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
            ?>
            <p style="font-size:18px"><?php echo $seller_name." ".'('.$username.')'; ?></p>
            <p style="font-size:16px"><?php echo $email; ?></p>
            <p style="font-size:16px"><?php echo $phone_no; ?></p>
        </div>
        <div class="col-md-8">
            <h3>House Information
            <a href="#"><span class="glyphicon glyphicon-pencil" data-toggle="modal"
                data-target="#myModal"></span></a>
            <?php
                $sql = "select house_description,address,city,state,zipcode,bedrooms,bathrooms,price,sqft
                from house_table
                where house_id='".$house_id."'";
                
                $result = $db->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $house_description = $row['house_description'];
                        $address = $row['address'];
                        $city = $row['city'];
                        $state = $row['state'];
                        $zipcode = $row['zipcode'];
                        $bedrooms = $row['bedrooms'];
                        $bathrooms = $row['bathrooms'];
                        $price = "$"."".number_format($row['price'], 0);
                        $sqft = number_format($row['sqft'], 0);
                    }
                }
            ?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Listing</h4>
            </div>
            <div class="modal-body">
                <form class="edit" action="" method="post">
Address <br><input type="text" name="address" placeholder="<?php echo $address; ?>"><br><br>
                City <br><input type="text" name="city" placeholder="<?php echo $city; ?>"><br><br>
                State <br><input type="text" name="state" placeholder="<?php echo $state; ?>"<br><br><br>
                Zip Code <br><input type="text" name="zipcode" placeholder="<?php echo $zipcode; ?>"><br><br>
                Asking Price <br><input type="text" name="price" placeholder="<?php echo $price; ?>"><br><br>
                Square Footage <br><input type="text" name="sqft" placeholder="<?php echo $sqft; ?>"><br><br>
                Bedrooms <br><input type="text" name="bedrooms" placeholder="<?php echo $bedrooms; ?>"><br><br>
                Bathrooms <br><input type="text" name="bathrooms" placeholder="<?php echo $bathrooms; ?>"><br><br>
Additional Comments <br><textarea placeholder="<?php echo $house_description; ?>" name="house_description" rows="10" cols="40"></textarea>
                <br><br><input type="submit" name="saveEdit"><br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        </h3>
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
                        <p style="font-size:16px"><?php echo $address.", ".$city.", ".$state." ".$zipcode; ?></p>
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