<?php
session_start();

if(isset($_SESSION["user"])) header("location: ../vista.html");
  

 if(isset($_POST["Registrarse"])){
    
    //Elementos del DOM;

    $user = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $region = $_POST["region"];

    //Validaciones

    $error = "";

    if(!empty($user)){
         //valido el user

         $user = trim($user);
         $user = strtolower($user);
         $user = filter_var($user, FILTER_SANITIZE_STRING);
    } 
    
    else  $error = $error . " Ingrese Usuario  <br>";

    if(!empty($email)){
        
        $email = trim($email);
        $emial = strtolower($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    } else $error = $error . " Ingrese Email <br>";
    
    
    if(!empty($password)){

        if($password === $password2){

            $password = md5($password);
        }

        else{
            $error = $error . "Las contraseñas NO coinciden <br>";
        }
    
    } else $error = $error . "Ingrese contraseña";


    if(empty($error)){

        //Preparamos la consulta oara ver si existe el user y el email;

        try{

            $link = new PDO("mysql:host=localhost;dbname=juan","root","");
            $SQL = "SELECT * FROM users WHERE nombre = :user AND email = :email";
            $query = $link->prepare($SQL);
            $query->execute( array(":user" => $user, ":email"=>$email) );

            //almaceno el resultado de la consulta

            $result = $query->fetch();


            if(!$result){

                $SQL_2 = "INSERT INTO users VALUES (:user, :email, :pass, :region)";
                $query_2 = $link->prepare($SQL_2);
                $query_2->execute( array(":user"=>$user, ":email" => $email, ":pass" => $password, ":region" => $region));

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