<?php
include('includes/database.php');
$page_title = "Register For Account";

//PROCESS REGISTRATION FORM
$request_type = $_SERVER['REQUEST_METHOD'];
if( $request_type == 'POST' ){
    //array to store errors
    $errors = array();
    $first_name = $_POST['firstname'];
    if( strlen( $first_name ) !== strlen( trim($first_name) ) ){
        $errors['firstname'] = 'cannot contain spaces';
    }
    //echo "firstname=$first_name";
    $last_name = $_POST['lastname'];
    if( strlen( $last_name ) !== strlen( trim($last_name) ) ){
        $errors['lastname'] = 'cannot contain spaces';
    }
    //echo "lastname=$last_name";
    $address = $_POST['address'];
    //echo "address=$address";
    $city = $_POST['city'];
    //echo "city=$city";
    $phone = $_POST['phone'];
    //echo "phone=$phone";
    $email = $_POST['email'];
    if( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
      $errors['email'] = 'please enter a valid email address'; 
    }
    //echo "email=$email";
    $password = $_POST['password'];
    if( strlen( $password ) < 6 ){
        $errors['password'] = 'must be longer than 6 characters';
    }
    //check if there are errors
    if( count($errors) == 0 ){
        $query = 'INSERT INTO customer 
        (first_name,last_name,address,city,phone,email,active,password) 
        VALUES
        (?,?,?,?,?,?,1,?)';
        $hash = password_hash( $password, PASSWORD_DEFAULT);
        
        $statement = $connection -> prepare( $query );
        $statement -> bind_param('sssssss', $first_name, $last_name, $address, $city, $phone, $email, $hash);
        if( $statement -> execute() ){
            //success
            //redirect to booking page
        }
        else{
            $errors['registration'] = 'Oops something went wrong!';
        }
       
    }
} 

?>
<html>
    <?php include('includes/head.php')?>
    <body>
        <?php include('includes/navigation.php'); ?>
        <div class="container">
            <div class="row">
                <form id="register-form" method="post" action="register.php" class="col-md-4 offset-md-4">
                    <h2>Register For Your Account</h2>
                    <?php 
                    if( $errors['firstname'] ){
                        $message = $errors['firstname'];
                        $firstname_class = 'is-invalid';
                    }
                    $class = ( $firstname_class ) ? $firstname_class : '';
                    ?>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text"
                            class="form-control <?php echo $class;?>"
                            name="firstname"
                            id="firstname"
                            placeholder="Jane" 
                            required
                            value=<?php echo $first_name; ?>>
                        <div class="invalid-feedback">
                            <?php echo $message; ?>
                        </div>
                    </div>
                    <?php 
                    if( $errors['lastname'] ){
                        $message = $errors['lastname'];
                        $lastname_class = 'is-invalid';
                    }
                    $class = ( $lastname_class ) ? $lastname_class : '';
                    ?>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text"
                            class="form-control <?php echo $class;?>"
                            name="lastname"
                            id="lastname"
                            placeholder="Smith" 
                            required
                            value="<?php echo $last_name; ?>"
                            >
                            
                        <div class="invalid-feedback">
                            <?php echo $message; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text"
                            class="form-control"
                            name="address"
                            id="address"
                            placeholder="30 High Street" required
                            value="<?php echo $address; ?>"
                            >
                    </div>
                    <div class="form-group">
                        <label>City / Suburb</label>
                        <input type="text"
                            class="form-control"
                            name="city"
                            id="city"
                            placeholder="Woolloomooloo" 
                            required
                            value="<?php echo $city; ?>"
                            >
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text"
                            class="form-control"
                            name="phone"
                            id="phone"
                            placeholder="029000000" 
                            required
                            value="<?php echo $phone; ?>"
                            >
                    </div>
                    <?php 
                    if( $errors['email'] ){
                        $message = $errors['email'];
                        $email_class = 'is-invalid';
                    }
                    $class = ( $email_class ) ? $email_class : '';
                    ?>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email"
                            class="form-control <?php echo $class; ?>"
                            name="email"
                            id="email"
                            placeholder="jane.smith@domain.com" 
                            required
                            value="<?php echo $email; ?>"
                            >
                        <div class="invalid-feedback">
                            <?php echo $message; ?>
                        </div>
                    </div>
                    <?php 
                    if( $errors['password'] ){
                        $message = $errors['password'];
                        $password_class = 'is-invalid';
                    }
                    $class = ( $password_class ) ? $password_class : '';
                    ?>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"
                            class="form-control <?php echo $class; ?>"
                            name="password"
                            id="password"
                            placeholder="minimum 6 characters" required>
                        <div class="invalid-feedback">
                            <?php echo $message; ?>
                        </div>
                    </div>
                    <div class="buttons-row">
                        <button type="reset" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>