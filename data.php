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

    <h1 style="text-align: center; padding-top:15px">Car details</h1>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM car");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
    ?><div style="display:flex">
            <div style="padding: 15px">
                <img src='carimg/<?= $row["car_id"] ?>.jpg' width='500'><br>
                <h2><?= $row["car_year"] ?> <?= $row["car_brand"] ?> <?= $row["car_model"] ?></h2>
                ประเภทเกียร์ : <?= $row["car_gear"] ?><br>
                ระยะทางล่าสุด : <?= $row["car_miles"] ?><br>
                สี : <?= $row["color"] ?><br>
                <h3 style="color: red;"><?= $row["price"] ?> บาท</h3>
                <hr>
            </div>
        </div>
    <?php } ?>

    <h1 style="text-align: center; padding-top:15px">Booking</h1>
    <div style="padding-left: 39%;">
        <table border='1'>
            <tr>
                <th>car_id</th>
                <th>booking_id</th>
                <th>booking_numb</th>
                <th>store</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM booking");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
            ?>
                <tr>
                    <td><?= $row["car_id"] ?></td>
                    <td><?= $row["booking_id"] ?></td>
                    <td><?= $row["booking_numb"] ?></td>
                    <td><?= $row["store"] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <h1 style="text-align: center; padding-top:15px">Confirmation</h1>
    <div style="padding-left: 42%;">
        <table border='1'>
            <tr>
                <th>booking_id</th>
                <th>booking_date</th>
                <th>user_id</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM confirmation");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
            ?>
                <tr>
                    <td><?= $row["booking_id"] ?></td>
                    <td><?= $row["booking_date"] ?></td>
                    <td><?= $row["user_id"] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>