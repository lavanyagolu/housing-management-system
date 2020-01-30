<?php
include('server.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Question Answer Page </title>
        <link rel="stylesheet" type="text/css" href="style.css">
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
                    <a href="sellerview.php"><li>HOME</li></a>
                    <a href="aboutus.php"><li>About Us</li></a>
                    <a href="contact.php"><li>Contact Us</li></a>
                    <a href="message.php"><li>Message</li></a>
                    <a style="text-decoration:underline" href="index.php">Log Out</a>
                    <a href="archive.php"><li>Archive</li></a>
                </ul>
                <br/>
            </div>
            <br/>

        <form method="post" action=""  enctype="multipart/form-data">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>House Name</label>
                <input type="text" name="house_name">
            </div>
            <div class="input-group">
                <label>House Description</label>
                <input type="text" name="house_description" value="<?php echo $house_description; ?>">
            </div>
            <div class="input-group">
                <label>House ID</label>
                <input type="text" name="house_id" value="<?php echo $house_id; ?>">
            </div>
            <div class="input-group">
                <label>address</label>
                <input type="text" name="address" value="<?php echo $address; ?>">
            </div>
            <div class="input-group">
                <label>city</label>
                <input type="text" name="city" value="<?php echo $city; ?>">
            </div>
            <div class="input-group">
                <label>state</label>
                <input type="text" name="state" value="<?php echo $state; ?>">
                <div class="input-group">
                    <div class="input-group">
                        <label>zipcode</label>
                        <input type="number" name="zipcode" value="<?php echo $zipcode; ?>">
                    </div>
                    <div class="input-group">
                        <label>bedrooms</label>
                        <input type="number" name="bedrooms" value="<?php echo $bedrooms; ?>">
                    </div>
                    <div class="input-group">
                        <label>bathrooms</label>
                        <input type="number" name="bathrooms" value="<?php echo $bathrooms; ?>">
                    </div>
                    <div class="input-group">
                        <label>Price Expected</label>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </div>
                    <div class="input-group">
                        <label>sqft</label>
                        <input type="number" name="sqft" value="<?php echo $sqft; ?>">
                    </div>	

                </div>
                <input type="hidden" name="size" value="1000000">
                
                <div class="input-group">
                    <label>Upload image</label>
                    <input type="file" name="image[]"  multiple>
                </div>
                <div>
                    <textarea 
                        id="text" 
                        cols="40" 
                        rows="4" 
                        name="image_text" 
                        placeholder="Describe the House , enter intersting details..."></textarea>
                </div>
                <input type="hidden" name="SellerData" value="SellerData" />
                <button type="submit" class="btn" name="post_ad">Add Property</button>
        </form>
    </body>
</html>  