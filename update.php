<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak zelf je pizza</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    require "connect.php";

    $sql = "SELECT * FROM achtbaan WHERE id=:id";
    $stmnt = $pdo->prepare($sql);
    $stmnt->bindValue(":id", $_GET["id"], PDO::PARAM_STR);
    $stmnt->execute();

    $data = $stmnt->fetch(PDO::FETCH_OBJ);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "UPDATE pizza SET 
                bodem=:bdm, 
                saus=:ss, 
                topping=:tpn,
                kruiden=:krd 
                WHERE id=:id";
        $stmnt = $pdo->prepare($sql);

        $stmnt->bindValue(":id", $_POST["id"]);
        $stmnt->bindValue(":bdm", $_POST["bodem"], PDO::PARAM_STR);
        $stmnt->bindValue(":ss", $_POST["saus"], PDO::PARAM_STR);
        $stmnt->bindValue(":tpn", $_POST["topping"], PDO::PARAM_STR);
        $kruiden = $_POST["kruiden"];

        $kruidOutput = "";
        foreach ($_POST["kruiden"] as $value) {
            $kruidOutput .= $value . ",";
        }
        $stmnt->bindValue(":krd", $kruidOutput, PDO::PARAM_STR);

        $stmnt->execute();
        header("Location: index.php");
    }
    ?>
    <h1>Update je pizza</h1>
    <form action="" method="post">
        <h4>Naam Achtbaan:</h4>
        <input type="text" name="achtbaan">
        <h4>Naam Pretpark:</h4>
        <input type="text" name="pretpark">
        <h4>Naam Land:</h4>
        <input type="text" name="land">
        <h4>Topsnelheid (km/u):</h4>
        <input type="number" name="topsnelheid" min="1" max="200">
        <h4>Hoogte (m):</h4>
        <input type="number" name="hoogte" min="1" max="200" >
        <h4>Datum eerste opening:</h4>
        <input type="date" name="datum">
        <h4>Cijfer voor achtbaan: </h4>
        <div class="flex">
            <input type="range" name="cijfer" min="0" max="10" step="0.1" value="5">
            <span id="rangeOutput">5.0</span>
        </div>
        <button type="submit">Update atractie</button>
    </form>
</body>

</html>