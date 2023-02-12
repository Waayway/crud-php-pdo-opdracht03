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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            var_dump($_POST);
            $sql = "INSERT INTO achtbaan VALUES (null, :acbn, :ptpk, :lnd, :tpsnl, :hgt, :dtm, :cfr)";
            $stmnt = $pdo->prepare($sql);

            $stmnt->bindValue(":acbn", $_POST["achtbaan"], PDO::PARAM_STR);
            $stmnt->bindValue(":ptpk", $_POST["pretpark"], PDO::PARAM_STR);
            $stmnt->bindValue(":lnd",  $_POST["land"], PDO::PARAM_STR);
            $stmnt->bindValue(":tpsnl", $_POST["topsnelheid"], PDO::PARAM_INT);
            $stmnt->bindValue(":hgt",  $_POST["hoogte"], PDO::PARAM_INT);
            $stmnt->bindValue(":dtm",  $_POST["datum"], PDO::PARAM_STR);
            $stmnt->bindValue(":cfr",  $_POST["cijfer"], PDO::PARAM_INT);

            $stmnt->execute();
            header("Refresh: 0");
        }
    ?>
    <h1>Invoer Achtbaan</h1>
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
        <button type="submit">Sla Op</button>
    </form>
    <?php 
        $sql = "SELECT * FROM achtbaan";
        $stmnt = $pdo->prepare($sql);
        $stmnt->execute();
        $data = $stmnt->fetchAll(PDO::FETCH_OBJ);
    ?>
    <table>
        <thead>
            <tr>
                <th>Naam Achtbaan</th>
                <th>Naam pretpark</th>
                <th>Land</th>
                <th>Top Snelheid</th>
                <th>Hoogte</th>
                <th>Datum</th>
                <th>Cijfer</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($data as $value) {
                    echo "<tr>";
                    echo "<td>$value->naamAchtbaan</td>";
                    echo "<td>$value->naamPretpark</td>";
                    echo "<td>$value->land</td>";
                    echo "<td>$value->topsnelheid</td>";
                    echo "<td>$value->hoogte</td>";
                    echo "<td>$value->datum</td>";
                    echo "<td>$value->cijfer</td>";
                    echo "<td><a href='update.php?id=$value->id'>Update</a></td>";
                    echo "<td><a href='delete.php?id=$value->id'>Delete</a></td>";
                    echo "</tr>";
                }            
            ?>
        </tbody>
    </table>
    <script src="script.js"></script>
</body>

</html>