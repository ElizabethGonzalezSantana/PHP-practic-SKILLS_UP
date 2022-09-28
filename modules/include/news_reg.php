<?php
require"../require/config.php";

//define y inicializa las variables que se van a usar del formulario.
$name = $email = $phone = $street = $city = $state = $zip = $other = $news = $newscheck="";

//Si (llega datos)Entonces

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!empty($_POST["name"]) || !empty($_POST["email"]) || !empty($_POST["phone"])){
    echo "<br><strong>name post hay datos</strong><br>";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $other = $_POST["other"];
    $news = $_POST["news"];
    $newscheck = $_POST["newscheck"];
    
    function limpiar_dato($dato){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }

    function validar_name($name){
        if (!preg_match("/^[a-zA-Z-']*$/",$name)){
            return false;
        } else {
            return true;
        }
    }

 

    }
}
?>