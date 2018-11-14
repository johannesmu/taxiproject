<?php
//create array of navigation items
$nav_array = array(
    'Home' => 'index.php',
    'Login' => 'login.php',
    'Register' => 'register.php'
    );
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
  if( isset( $_SESSION['name'] ) ){
    echo "<div> Hello ". $_SESSION['name'] ."</div>";
  }
  ?>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="nav navbar-nav ml-auto">
        <?php
        foreach( $nav_array as $nav_item => $nav_link ){
            echo "<a href=\"$nav_link\" class=\"nav-link\">$nav_item</a>";
        }
        ?>
    </div>
  </div>
</nav>