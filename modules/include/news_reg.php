<?php
require"../requiere/config.php";     



//define y inicializa las variables que se van a usar del formulario.
$name = $email = $phone = $street = $city = $state = $zip = $other = $news = $newscheck="";

function limpiar_dato($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//Si (llega datos)Entonces

if($_SERVER["REQUEST_METHOD"] == "POST"){
    print_r ($_POST);
    

    if(!empty($_POST["name"]) || !empty($_POST["email"]) || !empty($_POST["phone"]) || !empty($_POST["street"]) || !empty($_POST["city"]) || !empty($_POST["state"]) || !empty($_POST["zip"]) || !empty($_POST["other"]) || !empty($_POST["news"]) || !empty($_POST["newscheck"])) {
    echo "<br><strong>name post hay datos</strong><br>";

    $name = limpiar_dato ($_POST["name"]);
    echo "<strong> Nombre:</strong>" . $name. "<br>";
    $email = limpiar_dato ($_POST["email"]);
    echo "<strong> Email:</strong>" . $email. "<br>";
    $phone = limpiar_dato ($_POST["phone"]);
    echo "<strong> Telefono:</strong>" . $phone. "<br>";
    $street = limpiar_dato ($_POST["street"]);
    echo "<strong> Street:</strong>" . $Street. "<br>";
    $city = limpiar_dato ($_POST["city"]);
    echo "<strong> City:</strong>" . $citye. "<br>";
    $state = limpiar_dato($_POST["state"]);
    echo "<strong> State:</strong>" . $State. "<br>";
    $zip = limpiar_dato ($_POST["zip"]);
    echo "<strong> Zip:</strong>" . $Zip. "<br>";
    $other = limpiar_dato($_POST["other"]);
    echo "<strong> Other:</strong>" . $other. "<br>";
    $news = limpiar_dato($_POST["news"]);
    echo "<strong> News:</strong>" . $news. "<br>";
    $newscheck = limpiar_dato($_POST["newscheck"]);
    echo "<strong> Newscheck:</strong>" . $newscheck. "<br>";
    
    function validar_name($name){
        if (!preg_match("/^[a-zA-Z-']*$/",$name)){
            return false;
        } else {
            return true;
        }
    }

    function validar_email($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
            }else{
                return true;
                }
        }
        
        function validar_phone($phone){
            if(preg_match('(/^[0-9]{10}+$/)',$phone)) {
                echo"valid phone number";
            } else {
                echo "invalid phone number";
            }
        }

 

    }
}
?>