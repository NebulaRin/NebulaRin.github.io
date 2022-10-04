<?php

session_start();

if(isset($_SESSION["user"])) header("location: ../vista.html");
  

 if(isset($_POST["Login"])){
    
    //Elementos del DOM;

    $user = $_POST["user"];
    $password = md5($_POST["password"]);

    //Validaciones

    $error = "";

    if(!empty($user)){
         //valido el user

         $user = trim($user);
         $user = strtolower($user);
         $user = filter_var($user, FILTER_SANITIZE_STRING);
    } 
    
    else  $error = $error . " Ingrese Usuario  <br>";

    
    if(empty($password)) $error = $error . "Ingrese contraseña <br>";
        

    if(empty($error)){

        //Preparamos la consulta oara ver si existe el user y el email;

        try{

            $link = new PDO("mysql:host=localhost;dbname=juan","root","");
            $SQL = "SELECT * FROM users WHERE nombre = :user AND clave = :pass";
            $query = $link->prepare($SQL);
            $query->execute( array(":user" => $user, ":pass"=>$password) );

            //almaceno el resultado de la consulta

            $result = $query->fetch();


            if($result){
                 $_SESSION["user"] = $user;
                 header("location: ../vista.html");
        }

            else{
                $error = "El usuario y el correo ya existen";
            }

        } catch(PDOExeption $e){
            
            $error = "Error en sistema, por favor, consulte con el equipo técnico";
        }
    }

 }


?>