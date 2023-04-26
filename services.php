<?php
include 'connect.php';
session_start();
if(isset($_SESSION['email'])){

$session = $_SESSION['uid'];
$stmt = $con->prepare("SELECT * FROM users where user_id =$session ");
$stmt ->execute();
$info =$stmt->fetch();

$myId = $_SESSION['uid'];
$stmt =$con->prepare("SELECT * FROM avatar_users WHERE user_id =$myId order by avatar_chil_id desc limit 1 ");
$stmt->execute();
$avatar = $stmt->fetch();
?>

    <html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/From.css">
        <link rel="icon" href="image/3.icon">
        <title> بوابة الخدمات الالكترونية </title>

    </head>

    <body>
        
    
        <header>
        <div class="container" >
        <li class="dropdown" style="float:left;margin: 30px; width:15%; height:5%;">

        <a href="#" class="drop-btn" > <?php
        if($avatar == ''){
        echo '<img style="height: 30px; width: 30px; border-radius: 30px; margin:5px;"  src="image//default-user-img.png"> <br>';
        }else{
        echo '<img style="height: 30px; width: 30px; border-radius: 30px; margin:5px;" src="upload-avatar-users/avatar//'. $avatar['avatar'].'">   <br>';
        }


        echo ucfirst($info['f_name']).' '.ucfirst( $info['l_name']);

        ?> 
        </a>
        <div class="dropdown-content" style="float:right;margin-bottom:10px;display: fixed;" >
        <a href="myprofile.php" style="float:right;margin-bottom:10px;">  الصفحة الشخصية</a>
        <a href="logout.php" style="float:right;margin-bottom:10px;"> خروج </a>

        </div>
        </li>
        </div>

                
            <dir class="logo">
                <img src="image/5.png">
            </dir><br>

            

            <div id="brand">
                <h2> الخــدمـــات الالـكتـرونـيـة </h2>
                  
            </div>
            
            
        <br><br>
           
            <div class="container">
                
         
                <nav class='menu'>
                    <ul>
                        <li class="current"> <a href="index.php"><i class="fa fa-home"></i> الرئيسية</a> </li>

                        <li class="dropdown">
                            <a href="#" class="drop-btn">  إصدار جواز سفر </a>
                            <div class="dropdown-content">
                                <a href="reservation.php">إصدار جواز لاول مرة </a>
                                <a href="reserv_child.php"> إصدار جواز للمواليد</a>


                            </div>
                        </li>
                        <li><a href="renewal.php">   تجديد جواز سفر   </a></li>

                    </ul>


                </nav>

            </div>

        </header><br>
       



    </body>
    <footer>
        <p> حقوق النشر جميع الحقوق محفوظة &copy; 2023 الموقع الرسمي لمصلحة الهجرة والجوازات والجنسية في الجمهورية اليمنية </p>
        <p> تصميم وتطوير Moh-Technology</p>
    </footer>

    </html>
    <?php }else{
           header("location:login.php");
      }
    ?>