<?php

session_start();
//require codepluck file

require_once __DIR__ . "/app/Codepluck.php";
  require 'config.php';
// initializing variables
$userid="";
$houseid="";
$first_name = "";
$last_name = "";
$email = "";
$ph_no = "";
$address = "";
$user_name = "";
$house_description = "";
$address = "";
$city = "";
$state = "";
$street="";
$house_id = "";
$zipcode = "";
$bedrooms = "";
$bathrooms = "";
$price = "";
$sqft = "";
$emp_id = "";
$employee_name = "";
$email_id = "";
$password = "";
$password1 = "";
$admin = "";
$agent = "";
$errors = array();
$info = "";
$soldproperties="";
$seller_name="";
$username="";
// connect to the database
$db = mysqli_connect('localhost', 'root','', 'realestate');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $ph_no = mysqli_real_escape_string($db, $_POST['ph_no']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $user_type = mysqli_real_escape_string($db, 'Buyer');
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($first_name)) {
        array_push($errors, "FirstName is required");
    }
    if (empty($last_name)) {
        array_push($errors, "LastName is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($ph_no)) {
        array_push($errors, "Phone number is required");
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }
    if (empty($user_name)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM buyer WHERE user_name='$user_name' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists 
        if ($user['user_name'] == $user_name) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] == $email) {
            array_push($errors, "email already exists");
        }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO user (first_name, last_name, email, ph_no, address,user_name,password,user_type) 
  			  VALUES('$first_name','$last_name','$email','$ph_no', '$address','$user_name','$password','$user_type')";

        mysqli_query($db, $query);
        $message = "you are registered successfully please login to proceed!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $_SESSION['username'] = $user_name;
        $_SESSION['success'] = "You are registered successfully please login";
        header('location: login1.php');
    }
}


// REGISTER seller
if (isset($_POST['reg_seller'])) {
    // receive all input values from the form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $ph_no = mysqli_real_escape_string($db, $_POST['ph_no']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    //$user_type = mysqli_real_escape_string($db, 'Seller');
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($first_name)) {
        array_push($errors, "FirstName is required");
    }
    if (empty($last_name)) {
        array_push($errors, "LastName is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($ph_no)) {
        array_push($errors, "Phone number is required");
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }
    if (empty($user_name)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE user_name='$user_name' OR email='$email' LIMIT 1";

    $result = mysqli_query($db, $user_check_query);
    if ($result && $result != null):
        $user = mysqli_fetch_assoc($result);
        if ($user) { // if user exists 
            if ($user['user_name'] == $user_name) {
                array_push($errors, "Username already exists");
            }
            if ($user['email'] == $email) {
                array_push($errors, "email already exists");
            }
        }
    endif;

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        array_push($errors, "test");
        $ph_no = (int) $ph_no;
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO user (first_name,last_name, email, ph_no, address,user_name,password,user_type) 
  			  VALUES('$first_name','$last_name','$email', $ph_no, '" . $address . "','$user_name','$password','Seller')";


        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) > 0) {
            $message = "you are registered successfully please login to proceed!";
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $username;
            $_SESSION['success'] = "You are registered successfully please login";
            echo "<script type='text/javascript'>alert('$message');</script>";
//            header('location: sellerlogin.php');
        } else {
            array_push($errors, "not saved");
        }
    } else {
        array_push($errors, "not saved");
    }
    header('location: sellerlogin.php');
}


// Agent login
if (isset($_POST['login_agent'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($username)) {
        array_push($errors, "Agent name is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $query = "SELECT * FROM employees WHERE employee_name='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) > 0) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            if ($username == "admin") {
                $_SESSION['user_type'] = "admin";
                header('location: adminview.php');
            } elseif ($username == "buyeragent") {
                $_SESSION['user_type'] = "bagent";
                header('location: buyeragentview.php');
            } else {
                $_SESSION['user_type'] = "sagent";
                header('location: selleragentview.php');
            }
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

// seller login
if (isset($_POST['login_seller'])) {


    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($username)) {
        array_push($errors, "Agent name is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE user_name='$username' AND password='$password' and user_type='Seller'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) > 0) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['username'] = $username;
             $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['success'] = "You are now logged in";
            header('location: sellerview.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE user_name='$username' AND password='$password' AND user_type='Buyer'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) > 0) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['success'] = "You are now logged in";
            if ($username == "admin") {
                header('location: managerview.php');
            } else {
                header('location: loginindex.php');
            }
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

// book_house
if (isset($_POST['book_house'])) {
    if (count($errors) == 0) {
//encrypt the password before saving in the database
        $user_name = $_SESSION['username'];
        $query = "INSERT INTO book_home (user_name,house_id) 
  			  VALUES('$user_name','house_id')";

        mysqli_query($db, $query);
        $message = "your booking details are sent to agent!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $_SESSION['success'] = "Your booking details are sent to agent!";
        header('location: book.php');
    }
}

// REGISTER New Agent
if (isset($_POST['add_agent'])) {
    // receive all input values from the form
    $emp_id = mysqli_real_escape_string($db, $_POST['emp_id']);
    $employee_name = mysqli_real_escape_string($db, $_POST['employee_name']);
    $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $admin = mysqli_real_escape_string($db, $_POST['admin']);
    $agent = mysqli_real_escape_string($db, $_POST['agent']);
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($emp_id)) {
        array_push($errors, "Employee id is required");
    }
    if (empty($employee_name)) {
        array_push($errors, "Employee name is required");
    }
    if (empty($admin)) {
        array_push($errors, "Please specify if it is a admin by yes or no");
    }
    if (empty($agent)) {
        array_push($errors, "Please specify if it is a agent by yes or no");
    }
    if (empty($email_id)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM employees WHERE employee_name='$employee_name' OR email_id='$email_id' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists 
        if ($user['employee_name'] == $employee_name) {
            array_push($errors, "Employee already exists");
        }
        if ($user['email_id'] == $email_id) {
            array_push($errors, "email already exists");
        }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO employees (emp_id, employee_name, email_id,password,admin,agent) 
  			  VALUES('$emp_id','$employee_name','$email_id','$password1','$admin',$agent)";

        mysqli_query($db, $query);
        $message = "you are registered successfully please login to proceed!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $_SESSION['username'] = $user_name;
        $_SESSION['success'] = "You are registered successfully please login";
        header('location: login.php');
    }
}

if (isset($_POST['post_ad'])) {
    // receive all input values from the form
    $house_name= mysqli_real_escape_string($db, $_POST['house_name']);
    $house_description = mysqli_real_escape_string($db, $_POST['house_description']);
    $house_id = mysqli_real_escape_string($db, $_POST['house_id']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
    $bedrooms = mysqli_real_escape_string($db, $_POST['bedrooms']);
    $bathrooms = mysqli_real_escape_string($db, $_POST['bathrooms']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $sqft = mysqli_real_escape_string($db, $_POST['sqft']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($house_name)) {
        array_push($errors, "house_name is required");
    }
    if (empty($house_description)) {
        array_push($errors, "house_description is required");
    }
    if (empty($house_id)) {
        array_push($errors, "house_id is required");
    }
    if (empty($address)) {
        array_push($errors, "address is required");
    }
    if (empty($city)) {
        array_push($errors, "state is required");
    }
    if (empty($state)) {
        array_push($errors, "Phone number is required");
    }
    if (empty($zipcode)) {
        array_push($errors, "zipcode is required");
    }
    if (empty($bedrooms)) {
        array_push($errors, "number of bedrooms is required");
    }
    if (empty($bathrooms)) {
        array_push($errors, " number of bathrooms is required");
    }
    if (empty($price)) {
        array_push($errors, "Estimated price is required");
    }
    if (empty($sqft)) {
        array_push($errors, "square feet is required");
    }



    $_SESSION['house_name'] = $house_name;
    $_SESSION['house_description'] = $house_description;
    $_SESSION['address'] = $address;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['zipcode'] = $zipcode;
    $_SESSION['bedrooms'] = $bedrooms;
    $_SESSION['bathrooms'] = $bathrooms;
    $_SESSION['price'] = $price;
    $_SESSION['sqft'] = $sqft;



 
    require_once __DIR__ . "/app/Codepluck.php";
    $updateClass = new Codepluck\Codepluck();
    $userID = $updateClass->getIdByUsername($_SESSION['username']);
    $dataHouseForm = array(
        'house_name' => $house_name,
        'house_description' => $house_description,
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'zipcode' => $zipcode,
        'bedrooms' => $bedrooms,
        'bathrooms' => $bathrooms,
        'price' => $price,
        'sqft' => $sqft,
		 'property_type' => 'rental',
        'user_id' => $userID,
        'date_posted' => date('Y-m-d'),
        'employee_name' => $_SESSION['username'],
        'status' => 'active',
		'property_image' => '',
    );
   
    $updateClass->propertyUpdateHouse($dataHouseForm);

    if ($results) {
        echo "Success";
    } else {
        echo "Error";
    }
    header('location: sellerview.php');
}

// add agent
if (isset($_POST['add_agents'])) {
    // receive all input values from the form
    $emp_id = mysqli_real_escape_string($db, $_POST['emp_id']);
    $employee_name = mysqli_real_escape_string($db, $_POST['employee_name']);
    $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $admin = 'no';
    $agent = 'yes';
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($emp_id)) {
        array_push($errors, "FirstName is required");
    }
    if (empty($employee_name)) {
        array_push($errors, "LastName is required");
    }
    if (empty($email_id)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Phone number is required");
    }
    if (empty($password1)) {
        array_push($errors, "Address is required");
    }
    //if (empty($admin)) { array_push($errors, "Username is required"); }
    //if (empty($agent)) { array_push($errors, "Username is required"); }
    if ($password != $password1) {
        array_push($errors, "The two passwords do not match");
    }
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM employees WHERE employee_name='$employee_name' OR email_id='$email_id' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $employee = mysqli_fetch_assoc($result);

    if ($employee) { // if user exists 
        if ($employee['employee_name'] == $employee_name) {
            array_push($errors, "Employee already exists");
        }
        if ($employee['email_id'] == $email_id) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO employees (emp_id, employee_name, email_id,password,admin,agent) 
  			  VALUES('$emp_id','$employee_name','$email_id','$password', '$admin','$agent')";


        mysqli_query($db, $query);
        header('location: adminview.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user1'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE user_name='$username' AND password='$password' AND user_type='Buyer'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            if ($username == "admin") {
                header('location: managerview.php');
            } else {
                header('location: index1.php');
            }
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
// LOGIN USER1
if (isset($_POST['login_user1'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE user_name='$username' AND password='$password' AND user_type='Buyer'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            if ($username == "admin") {
                header('location: managerview.php');
            } else {
                header('location: index1.php');
            }
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>