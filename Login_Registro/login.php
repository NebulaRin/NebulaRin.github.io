<?php require "logica_login.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kimetsu No Yiba</title>
    <link rel="stylesheet" href="../Styles/registro_and_login.css">
</head>
<body>
<section>
    
<h1>Welcome To Kimetsu No Yiba!</h1>

<form action= <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> method = "POST" >

<input type="text" placeholder = "Username" name="user">
<input type="password" placeholder = "Password" name ="password">
<input type="submit" value="Send" name = "Login">

</form>


<?php if(isset($_POST["Login"])){?>

<?php if(!empty($error)):?>
<div class="error">
<p> <?php echo "$error"; ?> </p>
</div>
<?php else :?>

<div class="success">
<p> Datos Enviados Correctamente!! </p>
</div>
<?php endif?>

<?php }?>

<a href="./registro.php">¿NO tienes cuenta?</a>

</section>
    
</body>
</html>