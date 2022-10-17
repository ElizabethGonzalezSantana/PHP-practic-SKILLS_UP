<?php
require "../requiere/config.php";

//define y inicializa las variables que se van a usar del formulario.
$name = $email = $phone = $address = $city = $province = $zip = $other = $news = $newscheck = "";
$name_err = $email_err = $phone_err = false;
$checkNewscheck;
/**
 * Función para limpiar un dato procedente de un formulario.
 * 
 * @param $data
 * @return $data
 */

function limpiar_dato($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//nombre, email y nº de telefono.
/**
 * Función para validar nombre que solo contenga letras min y MAY, y espacio en blanco.
 *
 * @param $name
 * @return boolean
 */

function validar_name($name)
{
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        return false;
    } else {
        return true;
    }
}

function validar_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

//TODO:documentar función.
/**
 * Validar un número de telefono.
 * @param $phone
 * @return Boolean
 */

function validar_phone($phone)
{
    if (!preg_match('(/^[0-9]+$/)', $phone)) {
        return false;
    } else {
        return true;
    }
}


//Si (llega datos)Entonces

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);

    if (!empty($_POST["name"]) || !empty($_POST["email"]) || !empty($_POST["phone"])) {
        echo "<br><strong>name post hay datos</strong><br>";
        //Variables requeridas para enviar a BBDD:name,email y phone.
        $name = limpiar_dato($_POST["name"]);
        echo "$name <br>";
        $email = limpiar_dato($_POST["email"]);
        echo "$email <br>";
        $phone = limpiar_dato($_POST["phone"]);
        echo "$phone<br>";

            if (validar_name($name)) {
                } else {
                    $name_err = true;
                }

            if (validar_email($email)) {
                } else {
                    $email_err = true;
                }

            if (validar_phone($phone)) {
                } else {
                    $phone_err = true;
                }

        if (validar_name($name) && validar_email($email) && validar_phone($phone)) {
        } else {
            if ($name_err == true) {
                echo "la validación de name ha fallado";
            } elseif ($email_err == true) {
                echo "La validación de email ha fallado";
            } elseif ($phone_err == true) {
                echo "La validación de phone ha fallado";
            }
        }


        if (isset($_POST["address"])) {
            $address = limpiar_dato($_POST["address"]);
        } else {
            $address = NULL;
        }

        if (isset($_POST["city"])) {
            $city = limpiar_dato($_POST["city"]);
        } else {
            $city = NULL;
        }

        if (isset($_POST["province"])) {
            $province = limpiar_dato($_POST["province"]);
        } else {
            $province = NULL;
        }

        if (isset($_POST["zip"])) {
            $zip = limpiar_dato($_POST["zip"]);
        } else {
            $zip = NULL;
        }

/*         if (isset($_POST["newscheck"])) {
            $newscheck = limpiar_dato($_POST["newscheck"]);
        } else {
            $newscheck = NULL;
        } */




       if (isset($_POST["newscheck"])) {
            $news = limpiar_dato($_POST["newscheck"]);
            /* La base de datos no aceptan letras hay que cambiarlos para que te muestren números es decir
            te muestre esas letras en números */
        } else {
            $news = NULL;
        }

        if (isset($_POST["other"])) {
            $other = limpiar_dato($_POST["other"]);
        } else {
            $other = NULL;
        }

        $newsletter = filter_input(
            INPUT_POST,
            'news',
            FILTER_SANITIZE_SPECIAL_CHARS,
            FILTER_REQUIRE_ARRAY
        );
        var_dump($news);
        //echo "<br>Longitud de newsletter: ". count($newsletter). ".";
        //echo "<br>";

        $lengArray = count ($newscheck);
        switch($lengArray){
            case 1:
                if ($newscheck[0] == "HTML"){

                    $checkNewscheck = 100;
                }elseif($newscheck[0] == "CSS"){

                    $checkNewscheck = 010;
                }else{

                    $checkNewscheck = 001;
                }
                break;
            case 2:

                if($newscheck[0] != "HTML"){

                    $checkNewscheck = 011;
                }elseif($newscheck[0] != "CSS"){

                    $checkNewscheck = 101;
                } else{

                    $checkNewscheck = 110;
                }
                break;
            case 3:

                $checkNewscheck = 111;
                    break;
            default:

                $checkNewscheck = 100;
        }

        echo "código a enviar " .$checkNewscheck;

        $string = implode(", ", $newsletter);
        echo $string;
        echo "<br>";

        $other = limpiar_dato($_POST["other"]);
        echo "<strong>Noticias que quiere recibir: $newscheck";
        var_dump($name);

        echo "<br><strong>Name:</strong> $name <br>";
        echo "<strong>Telefono:</strong> $phone <br>";
        echo "<strong>Email: </strong> $email <br>";
        echo "<strong>Adress </strong> $address <br>";
        echo "<strong>City: </strong> $city <br>";
        echo "<strong>Province: </strong> $province <br>";
        echo "<strong>Zip: </strong> $zip <br>";
        echo "<strong>Other: </strong> $other <br>";
        echo "<strong>News: </strong> $news <br>";
        echo "<strong>Newscheck: </strong> $newscheck <br>";




    if (validar_name($name)) {
            echo "validada";
        } else {
            echo "no valida";
        };
        }else{
            echo "No hemos recibido el metodo POST";
        }

}

/*Envia los datos y si llega todos correctos luego se tratan y si esta estan todos los datos correctos lo limpia
y si no llegan no se limpia*/

/*Inicialización de las variables 
Si (llega datos) Entonces
    tratamos datos
        Si si hay información Entonces
        Si no llegan variables?**
                limpiar la información. check!!
                validar la informacinon.
                Si datos necesarios Entonces
                    asegurar de que están bien escrito.
                SiNo
                    mandamos dato tal cual.
                Fin Si
                Mostrar que todos los datos son correctos para enviar a BBDD.
        SiNo
            enviar datos necesarios
        Fin Si
SiNo
    avisar no han llegado.
Fin Si */