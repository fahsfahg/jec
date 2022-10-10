<?php
$pdo = new PDO("mysql:host=localhost;dbname=carbooking;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h1 style="text-align: center; padding-top:15px">User details</h1>
    <div style="display:flex">

        <?php
        $stmt = $pdo->prepare("SELECT * FROM user");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
        ?>
            <div style="padding: 15px">
                <img src='img/<?= $row["user_id"] ?>.jpg' width='100'><br>
                <h2><?= $row["username"] ?></h2>
                ชื่อสมาชิก : <?= $row["name"] ?><br>
                รหัสผ่าน : <?= $row["password"] ?><br>
                อีเมล์ : <?= $row["email"] ?><br>
                หมายเลขโทรศัพท์ : <?= $row["phone_number"] ?><br>
                อายุ : <?= $row["age"] ?><br>
                Booking ID : <?= $row["booking_id"] ?> <br>
                <hr>
            </div>
        <?php } ?>

    </div>

</html>