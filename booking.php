<?php
$pdo = new PDO("mysql:host=localhost;dbname=carbooking;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h1 style="text-align: center; padding-top:15px">Booking</h1>
    <div style="padding-left: 29%;">
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
    <div style="padding-left: 32%;">
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

</html>