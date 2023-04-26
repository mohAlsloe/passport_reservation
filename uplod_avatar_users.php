<?php

session_start();
include 'connect.php';  
if(isset($_SESSION['email'])){



if($_SERVER['REQUEST_METHOD'] == 'POST')
{       
        $name = $_FILES['avatar']['name'];
        $type = $_FILES['avatar']['type'];
        $tmp = $_FILES['avatar']['tmp_name'];
        $size = $_FILES['avatar']['size'];

        $allowed = array("jpg","png","jpeg","gif");
        //=======================
 

        //========================

     $explode  = explode('.', $name);
     $filetype = strtolower(end($explode));
     if(!in_array($filetype,$allowed))
     {
         $error = "هذا الملف غير مدعوم ";
     }
     else
     {
        $neName = rand(0,1000) . '_' . $name; 
        move_uploaded_file($tmp,'upload-avatar-users/avatar//'.$neName );
      
       $myId = $_SESSION['uid'];
       $stmt =$con->prepare("
       INSERT INTO `avatar_users`(`avatar`, `avatar_date`, `user_id`)
        VALUES (:avatar,now(),:uiseid)");
       $stmt->execute(array(
        'avatar' =>$neName,
        'uiseid' =>$myId
       ));
       if($stmt){
        $success = "تم رفع الصورة بنجاح ";
       }
     }


}
$myId = $_SESSION['uid'];
$stmt =$con->prepare("SELECT * FROM avatar_users WHERE user_id =$myId order by avatar_chil_id desc limit 1 ");
$stmt->execute();
$avatar = $stmt->fetch();
 
 ?>
    
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title> الصورة الشخصية </title>
        <link rel="stylesheet" href="css/success.css">
    </head>

    <body dir="rtl" class="imageback">
        <div class="home">
            <h2> ~ الصورة الشخصية ~ </h2>
            <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <div class="inform">
                    <fieldset id='in1'>

                        <legend>الصورة  </legend>
                       
                        <br>
                            <div class="main">    
                                <?php
                                if($avatar == ''){
                                     echo '<img style="width:30%; height:40%; " src="image//default-user-img.png">';
                                }else{
                                    echo '<img style="width:30%; height:40%; " src="upload-avatar-users/avatar//'. $avatar['avatar'].'">';
                                }
                                 ?><br>
                                 <input type="file" name="avatar">
                                 <br>

                                <?php if(isset($error)){ ?>  
                                <div class="main"><?php echo $error ?> </div>
                                <?php }elseif(isset($success)){?>
                                <div class="main"><?php echo $success ?></div>
                                <?php }?><br>

                                <button type="submit" id="btn">تحميل</button>
                                <a href="myprofile.php" id="btn">خـــــروج</a>
                            </div>
                           
                            
                    </fieldset>

            </form><br>
            
            </div>

        </div>

    </body>

    </html>
   <?php } else{
    header("location:login");
   } ?>