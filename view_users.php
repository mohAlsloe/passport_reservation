<?php
session_start();
include 'connect.php';   

$stmt =$con->prepare("SElECT * FROM users");
$stmt->execute();
$info = $stmt->fetchAll();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/reservation.css">
        <title>الصفحةالشخصية</title>
    </head>

    <body>
        <div class="home">
            <h2>المعلومات الشخصية</h2>
            <div class="inform">
                <?php foreach($info as $info ) {?>
                <fieldset id="in1">
                    <?php  echo '<a href="profile.php?uid='.$info['user_id'].'">';?>
                    <img src="image/default-user-img.png" alt=...>
                       </a>
                    <h3 class="txt-center"><strong> <?php echo $info['f_name'].'  '. $info['l_name']  ?> </strong></h3>
                    <h3 class="txt-center"><strong> <?php echo $info['sex']  ?> </strong></h3>
                </fieldset>
            <?php }?>
            </div>
        </div>
    </body>

    </html>