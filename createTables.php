<?php


function executeTableCreate(PDO $pdo)
{
    $sql = "CREATE TABLE IF NOT EXISTS achtbaan (
        id              INT PRIMARY KEY AUTO_INCREMENT,
        naamAchtbaan    VARCHAR(255) NOT NULL,
        naamPretpark    VARCHAR(255) NOT NULL,
        land            VARCHAR(255) NOT NULL,
        topsnelheid     INT NOT NULL,
        hoogte          INT NOT NULL,
        datum           DATE NOT NULL,
        cijfer          DECIMAL(3,1) NOT NULL
    )";
    $pdo->exec($sql);
}
