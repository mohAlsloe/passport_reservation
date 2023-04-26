<?php
session_start();
include 'connect.php';   
$session = $_SESSION['uid'];

$stmt = $con->prepare("SELECT * FROM users WHERE user_id = $session");
$stmt->execute();
$info = $stmt->fetch();


$myId = $_SESSION['uid'];
$stmt =$con->prepare("SELECT * FROM avatar_users WHERE user_id =$myId order by avatar_chil_id desc limit 1 ");
$stmt->execute();
$avatar = $stmt->fetch();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/success.css">
        <title>الصفحةالشخصية</title>
    </head>

    <body  dir="rtl" class="imageback"> 
        
        <div class="home">
            <h2>المعلومات الشخصية</h2>
            <div class="inform">
               
                <fieldset id="in1">
                 <a class="uploade-avatar-link" style="text-decoration:none;" href="uplod_avatar_users.php" > 
                 <p>تحميل الصورة الشخصية </p>
                </a>
                            <?php
                             if($avatar == ''){
                                     echo '<img style="width:30%; height:40%; " src="image//default-user-img.png">';
                                }else{
                                    echo '<img style="width:30%; height:40%; " src="upload-avatar-users/avatar//'. $avatar['avatar'].'">';
                                } ?><br>
                    <label>_____________________________________</label>
                    <h3><?php echo $info['f_name']  ?></h3>
                    <h3 ><?php echo $info['email']  ?>  </h3>
                    <h3> <?php echo $info['sex']  ?></h3>
                    <label>_____________________________________</label>
                </fieldset>
                    <div class="signup">

                    <a href="services.php" id="btn">خـــــروج</a>
                    </div>
            </div>
              
        </div>
    </body>

    </html>