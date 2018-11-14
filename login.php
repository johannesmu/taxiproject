<?php
session_start();

include('includes/database.php');
$page_title = "Login to your account";

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    //handle login here
}
?>
<html>
    <?php include('includes/head.php')?>
    <body>
        <?php include('includes/navigation.php'); ?>
        <div class="container">
            <div class="row">
            
            <form class="col-md-4 offset-md-4" id="login-form" method="post" action="login.php">
                <h1>Login to your account</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="your password">
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">
                        Login
                    </button>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>