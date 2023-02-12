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
        $sql = "UPDATE achtbaan SET 
                naamAchtbaan=:acbn,
                naamPretpark=:ptpk,
                land=:lnd,
                topsnelheid=:tpsnl,
                hoogte=:hgt,
                datum=:dtm,
                cijfer=:cfr
                WHERE id=:id";
        $stmnt = $pdo->prepare($sql);

        $stmnt->bindValue(":id",  $_POST["id"]);

        $stmnt->bindValue(":acbn", $_POST["achtbaan"], PDO::PARAM_STR);
        $stmnt->bindValue(":ptpk", $_POST["pretpark"], PDO::PARAM_STR);
        $stmnt->bindValue(":lnd",  $_POST["land"], PDO::PARAM_STR);
        $stmnt->bindValue(":tpsnl", $_POST["topsnelheid"], PDO::PARAM_INT);
        $stmnt->bindValue(":hgt",  $_POST["hoogte"], PDO::PARAM_INT);
        $stmnt->bindValue(":dtm",  $_POST["datum"], PDO::PARAM_STR);
        $stmnt->bindValue(":cfr",  $_POST["cijfer"], PDO::PARAM_STR);

        $stmnt->execute();
        header("Location: index.php");
    }
    ?>
    <h1>Update je pizza</h1>
    <form action="" method="post">
        <h4>Naam Achtbaan:</h4>
        <input type="text" name="achtbaan" value="<?=$data->naamAchtbaan?>">
        <h4>Naam Pretpark:</h4>
        <input type="text" name="pretpark" value="<?=$data->naamPretpark?>">
        <h4>Naam Land:</h4>
        <input type="text" name="land" value="<?=$data->land?>">
        <h4>Topsnelheid (km/u):</h4>
        <input type="number" name="topsnelheid" min="1" max="200" value="<?=$data->topsnelheid?>">
        <h4>Hoogte (m):</h4>
        <input type="number" name="hoogte" min="1" max="200" value="<?=$data->hoogte?>">
        <h4>Datum eerste opening:</h4>
        <input type="date" name="datum" value="<?=$data->datum?>">
        <h4>Cijfer voor achtbaan: </h4>
        <div class="flex">
            <input type="range" name="cijfer" min="0" max="10" step="0.1" value="<?=$data->cijfer?>">
            <span id="rangeOutput">5.0</span>
        </div>
        <input type="hidden" name="id" value="<?=$_GET["id"]?>">
        <button type="submit">Update atractie</button>
    </form>
    <script src="script.js"></script>
</body>

</html>