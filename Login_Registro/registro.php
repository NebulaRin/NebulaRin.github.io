<?php require "logica_registro.php"; ?>
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
<input type="email" placeholder = "Email" name = "email">
<input type="password" placeholder = "Password" name ="password">
<input type="password" placeholder = "Repeat password" name = "password2">

<label for="region" class = "form_region"><h2>Region </h2>

<select name="region" id="region">
    <option value="europa">Europa</option>
    <option value="brasil">America</option>
    <option value="brasil">Asia</option>
</select>

</label>

<input type="submit" value="Send" name = "Registrarse">

</form>

<?php if(isset($_POST["Registrarse"])){?>

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


<a href="./login.php">¿Ya tienes cuenta?</a>

</section>
    
</body>
</html>