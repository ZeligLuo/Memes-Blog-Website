<?php
include 'inc/head.php';
include 'func/loginHandler.php';
if (isset($_POST['login'])) {
    validateLogin($_POST, $login_user);
 }
?>

<div class="container py-5 my-5">
        <?php
        // to set use the setMsg() fn
          if(!empty($message)) {
            echo "<div class='alert alert-{$message['class']}'>
              {$message['msg']}
            </div>";
          }
        ?>
        <div class="col-md-6 pl-5">
            <h3 class="font-weight-light">Login to Account</h3>
            <hr>
            <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control"  placeholder="Enter a username..." name="username"  autocomplete="off">
                <div class="invalid-feedback">
                Username invalid
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control"  placeholder="Enter a password" name="password">
                <div class="invalid-feedback">
                Password invalid!
                </div>
            </div>
            <button class="btn btn-success btn-block" type="submit" name="login" value="true"><i class="fa-solid fa-circle-plus mr-2"></i>Login</button>
            </form>
        </div>
</div>

<?php
include 'inc/footer.php';
?>