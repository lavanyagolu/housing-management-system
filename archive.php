<?php
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
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="Lavanya Goluguri" />
        <meta name="description" content="HOUSING SYSTEM" />
        <meta name="keywords" content="Give your key words for SEO" />

        <title>HOUSING SYSTEM-Archive</title>
        <!-- ADDING CSS HERE -->
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
        <script type="text/javascript" src="slider/engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
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
                    <a href="sellerad.php"><li>Post House Ad</li></a>
                </ul>
                <br/>
            </div>
            <br/>
            <!--Menu ends here -->
                 
            <!-- Main Body starts here -->
            <div class="main">
                <div class="wrapper">
                    <h3>Active Houses</h3>
                    <!-- Displaying Recently added houses-->
                    <div class="clearfix">
                        <?php
                        require_once __DIR__ . "/app/Codepluck.php";
                        $updateClass = new Codepluck\Codepluck();
                        $Activeproperties = $updateClass->getPropertyByStatus('active');
                        if (is_array($Activeproperties) && !empty($Activeproperties)):
                            foreach ($Activeproperties as $property):
                                $address = $property['address'] . ', ' . $property['city'] . ', ' . $property['state'] . ', ' . $property['zipcode'];

                                $image = $updateClass->getPropertyImage($property['house_id']);
                                $seller = $updateClass->getPropertyBuyer($property['user_id']);
                                ?>
                                <div class="houses"> 
                                    <img src="<?php echo $image; ?>" />
                                    <span class="house-title"><?php echo $property['house_name']; ?> </span><br/>
                                    <span class="house-description"><?php echo $property['house_description']; ?> </span><br/>
                                    <span class="house-price">Price: <?php echo $property['price']; ?> </span><br/>
                                    <span class="house-bedrooms">Bedrooms: <?php echo $property['bedrooms']; ?> </span><br/>
                                    <span class="house-bathrooms">Bathrooms: <?php echo $property['bathrooms']; ?> </span><br/>
                                    <span class="house-area">Area: <?php echo $property['sqft']; ?>sqft </span><br/>
                                    <span class="house-laddress">Address: <?php echo $address; ?></span><br/>
                                    <span class="house-submit-date">Posted Date :<?php echo $property['date_posted']; ?></span></span><br/>
                                    <span class="house-seller">Seller Name: <?php echo $seller['first_name']; ?> <?php echo $seller['last_name']; ?></span><br/>
                                </div>
                                <?php
                            endforeach;
                        else:
                            for ($index = 1; $index <= 4; $index++) {
                                ?>
                                <div class="houses"> 
                                    <img src="images/house<?php echo $index; ?>.jpg" />
                                    <span class="house-title">Single Family Home </span><br/>
                                    <span class="house-added">Added on:09/15/2019</span></span><br/>
                                    <span class="house-location">Locaton: Burlington, NC</span><br/>
                                </div>
                                <?php
                            }
                            ?>
                        <?php
                        endif;
                        ?>
                    </div>
                    <h3>Sold Out Houses</h3>
                    <!-- Displaying Luxorious houses-->
                    <div class="clearfix">
                        <?php
                        $soldproperties = $updateClass->getPropertyByStatus('sold');
                        if (is_array($soldproperties) && !empty($soldproperties)):
                            foreach ($soldproperties as $property):
                                $address = $property['address'] . ', ' . $property['city'] . ', ' . $property['state'] . ', ' . $property['zipcode'];
                                $image = $updateClass->getPropertyImage($property['house_id']);
                                $seller = $updateClass->getPropertyBuyer($property['user_id']);
                                $houseorderdata = $updateClass->getPropertySoldDate($property['house_id']);
                                $buyer = $updateClass->getPropertyBuyer($houseorderdata['UserId']);
//                                echo '<pre>';
//                                print_r($buyer);
//                                echo '</pre>';
                                ?>
                                <div class="houses"> 
                                    <img src="<?php echo $image; ?>" />
                                    <span class="house-title"><?php echo $property['house_name']; ?> </span><br/>
                                    <span class="house-description"><?php echo $property['house_description']; ?> </span><br/>
                                    <span class="house-price">Price: <?php echo $property['price']; ?> </span><br/>
                                    <span class="house-bedrooms">Bedrooms: <?php echo $property['bedrooms']; ?> </span><br/>
                                    <span class="house-bathrooms">Bathrooms: <?php echo $property['bathrooms']; ?> </span><br/>
                                    <span class="house-area">Area: <?php echo $property['sqft']; ?>sqft </span><br/>
                                    <span class="house-laddress">Address: <?php echo $address; ?></span><br/>
                                    <span class="house-submit-date">Sold Date :<?php echo $houseorderdata['UpdatedAt']; ?></span></span><br/>
                                    <span class="house-seller">Buyer Name: <?php echo $buyer['first_name']; ?> <?php echo $buyer['last_name']; ?></span><br/>
                                </div>
                                <?php
                            endforeach;
                        else :
                            for ($index = 1; $index <= 4; $index++) {
                                ?>
                                <div class="houses"> 
                                    <img src="images/propertypics/house<?php echo $index; ?>.jpg" />
                                    <span class="house-title">Single Family Home </span><br/>
                                    <span class="house-added">Added on:09/15/2019</span></span><br/>
                                    <span class="house-location">Locaton: Burlington, NC</span><br/>
                                </div>
                                <?php
                            }
                            ?>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <!--Main body ends here -->
        </div>
    </div>
</div>
<!--Main body ends here -->
<!--Footer starts here -->

<br /><br /><br /><br /><br /><br /><br /><br /><br />
<footer  class="footer">
    <div class="wrapper">
        <p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
    </div>
</footer>
<!--Footer ends here -->

</body>
</html>