<?php require('actions/users/loginAction.php'); ?>
        <link rel="stylesheet" href="main.css" />


<!DOCTYPE html>

<html lang="en">
<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar1.php'; ?>

<body >
    
    <br><br>

    <br><br>

    <br><br>


    <form class="container" method="POST">



        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="contactez-nous" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
        <br><br>
        
        <a href="signup.php"><p>Inscription</p></a>
    </form>

</body>
</html>