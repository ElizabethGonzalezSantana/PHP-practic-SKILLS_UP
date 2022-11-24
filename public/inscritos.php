<?php
require "../modules/requiere/config.php";
htmlspecialchars($_SERVER['PHP_SELF']);
$_SERVER['REQUEST_METHOD'] == null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Datos</title>
    <link rel="stylesheet" href="StyleTabla.css">
</head>
<body>
<main>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <button type="submit" name="miboton">*ENVIAR*</button>
</form>
<?php else : ?>
    <?php 
    echo "<div class='wrapper'>";
    //requiere_DIR_ . '/inc/post.php';
    $sql = "SELECT * FROM news_reg";
    $stmt = $conn->prepare($sql);
    $stmt -> execute();

    if ($result = $stmt->setFetchMode(PDO::FETCH_ASSOC)){
        echo"<table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Domicilio</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>Código postal</th>
            <th>Noticias</th>
            <th>Formatos</th>
            <th>Comentarios</th>
        </tr>
        <thead>";
    foreach(($rows = $stmt->fetchAll()) as $row){
        echo "<tr>
            <td>".$row["fullname"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["phone"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["city"]."</td>
            <td>".$row["state"]."</td>
            <td>".$row["zipcode"]."</td>
            <td>".$row["newsletters"]."</td>
            <td>".$row["format_news"]."</td>
            <td>".$row["suggestion"]."</td>
        </tr>";
    }
    echo "</tr>
    </table>";
} else{
    echo "<p> 0 results, no found data.</p><br>";
}
    $conn = null;
    ?>
    <?php endif ?>
</div>
</main>

</main>
</body>
</html>