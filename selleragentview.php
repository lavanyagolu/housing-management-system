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
if (isset($_POST['saveDescrip'])) {
    $descrip = $_POST['descrip'];
    if (strlen($descrip) > 0) {
        $sql = "update sa_dash
                set descrip='".$descrip."'
                where username='".$_SESSION['username']."'";
        
        $db->query($sql);
    }   
        
    unset($_POST['saveDescrip']);
    header('Location: selleragentview.php');
}
if (isset($_POST['saveInfo'])) {
    $realty = $_POST['realty'];
    $address = $_POST['address'];
    $phone_no = $_POST['phone_no'];
    $re_license = $_POST['re_license'];
    $fb = $_POST['fb'];
    $twt = $_POST['twt'];
    $ig = $_POST['ig'];
    
    if (strlen($realty) > 0) {
        $sql = "update sa_dash
                set realty='".$realty."'
                where username='".$_SESSION['username']."'";
        
        $db->query($sql);
    }
    
    if (strlen($address) > 0) {
        $sql = "update sa_dash
                set address='".$address."'
                where username='".$_SESSION['username']."'";
        
        $db->query($sql);
    }
    
    if (strlen($phone_no) > 0) {
        $sql = "update sa_dash
                set phone_no='".$phone_no."'
                where username='".$_SESSION['username']."'";
        
        $db->query($sql);
    }
    
    if (strlen($re_license) > 0) {
        $sql = "update sa_dash
                set re_license='".$re_license."'
                where username='".$_SESSION['username']."'";
        
        $db->query($sql);
    }
    
    if (strlen($fb) > 0) {
        $sql = "update sa_dash
                set fb='".$fb."'
                where username='".$_SESSION['username']."'";
        
        $db->query($sql);
    }
    
    if (strlen($twt) > 0) {
        $sql = "update sa_dash
                set twt='".$twt."'
                where username='".$_SESSION['username']."'";
        
        $db->query($sql);
    }
    
    if (strlen($ig) > 0) {
        $sql = "update sa_dash
                set ig='".$ig."'
                where username='".$_SESSION['username']."'";
        
        $db->query($sql);
    }
    
    unset($_POST['saveInfo']);
    header('Location: selleragentview.php');
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
form.upload {
    width: 250px;
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
}
.textbox {
    margin-left:1cm;
    margin-right:1cm;
}
</style>

<title>HOUSING SYSTEM</title>
<!-- ADDING CSS HERE -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/style.css" />

<!-- Header starts here -->
<header class="header">
    <div class="wrapper">
        <h1>HOUSING SYSTEM</h1>
    </div>
</header>
<!--Header ends here -->
</head>

<!--Body starts here -->
<body>
<!-- Menu starts here -->
<nav class="menu">
    <div class="wrapper">
        <ul>
            <a href="index.php"><li>HOME</li></a>
            <a href="message.php"><li>Message</li></a>
            <a style="text-decoration:underline" href="index.php">Log Out</a>
            <a href="#">Welcome <?php  if (isset($_SESSION['username'])) : ?>
            <?php echo $_SESSION['username']; ?>
            <?php endif ?></a>
        </ul>
    </div>
    <br>
<!--Menu ends here -->
<div class="container">
    <div class="row">
      <div class="col-md-3">
        <?php
        $sql = "select * 
                from sa_dash
                where username='".$_SESSION['username']."'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['emp_id'];
                $name = $row['first_name']." ".$row['last_name'];
                $profileimg = $row['profileimg'];
            }
            if ($profileimg == 0) {
                echo '<figure>
                    <img class="center" src="images/profile_imgs/default_profile.png">
                    <figcaption><br><b><p style="font-size:20px">'.$name.'</p></b></figcaption></figure>';
            }
            else {
                echo '<figure>
                <img class="round" src="images/profile_imgs/profile'.$id.'.png">
                <figcaption><br><b><p style="font-size:20px">'.$name.'</p></b></figcaption></figure>';
            }
        }
        ?>

        <form class="upload" action="" method="post" enctype="multipart/form-data">
            <?php
                if(isset($_REQUEST['submit'])) {
                    $sql = "select *
                        from sa_dash
                        where username='".$_SESSION['username']."'";
                    $result = $db->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['emp_id'];
                        }
                    }
                    $target_dir = "images/profile_imgs";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) {
                            echo "File is an image - " . $check["mime"] . ". ";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image. ";
                            $uploadOk = 0;
                        }
                    }
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "File already exists. ";
                        $uploadOk = 0;
                    }
                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 1000000) {
                        echo "Your file is too large. ";
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType
                        != "jpeg" && $imageFileType != "gif" ) {
                        echo "Only JPG, JPEG, PNG & GIF files are allowed. ";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Your file was not uploaded. ";
                    // if everything is ok, try to upload file
                    } else {
                        $fileNameNew = "profile$id.png";
                        $fileDestination = 'images/profile_imgs/'.$fileNameNew;
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                            $fileDestination)) {
                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). "
                            has been uploaded.";
                            echo '<br>';
                            
                            $sql = "update sa_dash
                                    set profileimg = 1
                                    where username='".$_SESSION['username']."'";
                            $result = $db->query($sql);
                            
                        } else {
                            echo "There was an error uploading your file. ";
                            
                            $sql = "update sa_dash
                                    set profileimg = 0
                                    where username='".$_SESSION['username']."'";
                            $result = $db->query($sql);
                        }
                    }
                }
            ?>
            
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
      </div>
      <div class="col-md-6">
        <h3>About Me 
            <a href="#"><span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#myModal"></span></a>
            <?php
                $sql = "select descrip
                        from sa_dash
                        where username='".$_SESSION['username']."'";
            
                $result = $db->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $descrip = $row['descrip'];
                    }
                }
            ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" 
                            data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit About Me</h4>
                    </div>
                    <div class="modal-body">
                        <form class="edit" action="" method="post">
                            <textarea placeholder="<?php echo $descrip ?>" name="descrip" rows="20" cols="40"></textarea>
                            <br>
                            <input type="submit" name="saveDescrip">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" 
                            data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </h3>
                <?php
                    $sql = "select descrip
                            from sa_dash
                            where username='".$_SESSION['username']."'";
                    
                    $result = $db->query($sql);
                    
                    echo '<div class="textbox">';
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $descrip = $row['descrip'];
                        }
                        if (!empty($descrip)) {
                            echo $descrip;
                        }
                        else {
                            echo 'Tell us about yourself!';
                        }
                    }
                    echo '</div>';
                ?>
      </div>
      <div class="col-md-3">
        <h3>Contact Information
        <a href="#"><span class="glyphicon glyphicon-pencil" data-toggle="modal" 
                data-target="#myModal2"></span></a>
            <?php
                $sql = "select realty, address, phone_no, re_license, fb, twt, ig
                        from sa_dash
                        where username='".$_SESSION['username']."'";
        
                $result = $db->query($sql);
        
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $realty = $row['realty'];
                    $address = $row['address'];
                    $phone_no = $row['phone_no'];
                    $re_license = $row['re_license'];
                    $fb = $row['fb'];
                    $twt = $row['twt'];
                    $ig = $row['ig'];
                }
            }
            ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" 
                            data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Contact Information</h4>
                    </div>
                    <div class="modal-body">
                        <form class="edit" action="" method="post">
                            Realty <br><input type="text" name="realty" placeholder="<?php echo $realty ?>"><br><br>
                            Address <br><input type="text" name="address" placeholder="<?php echo $address ?>"><br><br>
                            Phone Number <br><input type="text" name="phone_no" placeholder="<?php echo $phone_no ?>"><br><br>
                            Real Estate License <br><input type="text" name="re_license" placeholder="<?php echo $re_license ?>"><br><br>
                            Facebook <br><input type="text" name="fb" placeholder="<?php echo $fb ?>"><br><br>
                            Twitter <br><input type="text" name="twt" placeholder="<?php echo $twt ?>"><br><br>
                            Instagram <br><input type="text" name="ig" placeholder="<?php echo $ig ?>"><br><br>
                            <input type="submit" name="saveInfo"><br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" 
                            data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </h3>
        <?php
        $sql = "select realty, address, phone_no, re_license, fb, twt, ig
                from sa_dash
                where username='".$_SESSION['username']."'";
        
        $result = $db->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $realty = $row['realty'];
                $address = $row['address'];
                $phone_no = $row['phone_no'];
                $re_license = $row['re_license'];
                $fb = $row['fb'];
                $twt = $row['twt'];
                $ig = $row['ig'];
            }
            if (empty($realty) && empty($address) && empty($phone_no)) {
                echo 'Add your info so you can stay connected.';
            }
            else {
                echo '<div class="row">';
                echo '<div class="column">';
                if (!empty($realty) && !empty($address)) {
                    echo '<b>Broker Address:</b><br><br><br>';
                }
                if (!empty($phone_no)) {
                    echo '<b>Phone:</b><br>';
                }
                if (!empty($re_license)) {
                    echo '<b>Real Estate License:</b><br>';
                }
                echo '</div><div class="column">';
                if (!empty($realty) && !empty($address)) {
                    echo $realty.'<br>'.$address.'<br>';
                }
                if (!empty($phone_no)) {
                    echo $phone_no.'<br>';
                }
                if (!empty($re_license)) {
                    echo $re_license.'<br>';
                }
                echo '</div></div><br>';
            }
            echo '<div class="eqi-container">';
            if (!empty($fb)) {
                echo '<div><a href="'.$fb.'">
                    <img src="assets/fb_logo.png" width="50" height="50"></a>
                    </div>';
            }
            if (!empty($twt)) {
                echo '<div><a href="'.$twt.'">
                    <img src="assets/twt_logo.png" width="50" height="50"></a>
                    </div>';
            }
            if (!empty($ig)) {
                echo '<div><a href="'.$ig.'">
                    <img src="assets/ig_logo.png" width="50" height="50"></a>
                    </div>';
            }
            echo '</div>';
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>My Listings</h3>
                <?php
                $sql = "select house_id, id, date_submit, date_posted, status
                        from sa_listing, sa_dash
                        where sa_dash.username='".$_SESSION['username']."'
                        and sa_listing.emp_id = sa_dash.emp_id";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    echo    '<div class="container" style="overflow-x:auto;">
                                <div class="row">
                                    <table class="center">
                                        <tr>
                                            <th>House ID</th>
                                            <th>User ID</th>
                                            <th>Date Submitted</th>
                                            <th>Date Posted</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                            <th></th>
                                        </tr>
                            ';
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $house_id = $row['house_id'];
                        $user_id = $row['id'];
                        $date_submit = $row['date_submit'];
                        $date_posted = $row['date_posted'];
                        $status = $row['status'];
                        
                        echo        '<tr>
                                        <td>'.$house_id.'</td>
                                        <td>'.$user_id.'</td>
                                        <td>'.$date_submit.'</td>
                                        <td>'.$date_posted.'</td>
                                        <td>'.$status.'</td>';
                        if ($status == 'Pending') {
                            echo '<td><a href="reviewlisting.php?house_id='.$house_id.'">Review</a></td>';
                        }
                        else if ($status == 'Listed') {
                            echo '<td><a href="editlisting.php?house_id='.$house_id.'">Edit</a></td>';
                        }
                        else {
                            echo '<td></td>';
                        }
                    }
                    echo '</tr></table></div></div>';
                }
                else {
                        echo "<center>You have no listings.</center>";
                }
                ?>
        </div>
    </div>
</div>
<!--Main body ends here -->
<!--Footer starts here -->
<br>
<br>
<br>
<footer class="footer">
    <p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</footer>
<!--Footer ends here -->
</body>
</html>