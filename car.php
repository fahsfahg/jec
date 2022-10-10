<?php
$pdo = new PDO("mysql:host=localhost;dbname=carbooking;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h1 style="text-align: center; padding-top:15px">Car details</h1>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM car");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
    ?><div style="display:flex">
            <div style="padding: 15px">
                <img src='carimg/<?= $row["car_id"] ?>.jpg' width='400'><br>
                <h2><?= $row["car_year"] ?> <?= $row["car_brand"] ?> <?= $row["car_model"] ?></h2>
                ประเภทเกียร์ : <?= $row["car_gear"] ?><br>
                ระยะทางล่าสุด : <?= $row["car_miles"] ?><br>
                สี : <?= $row["color"] ?><br>
                <h3 style="color: red;"><?= $row["price"] ?> บาท</h3>
                <hr>
            </div>
        </div>
    <?php } ?>


</html>