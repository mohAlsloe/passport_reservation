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
       
        move_uploaded_file($tmp,'avatar-newpassport//'.$neName );
      
       $myId = $_SESSION['uid'];
       $stmt =$con->prepare("
       INSERT INTO `avatar_newpassport`(`avatar`, `avatar_date`, `user_id`)
        VALUES (:avatar,now(),:usid)");
       $stmt->execute(array(
        'avatar' =>$neName,
        'usid' =>$myId
       ));
       if($stmt){
        $success = "تم رفع المرفقات بنجاح ";
       }
     }


}
  
 
 ?>
    
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title> المرفقات   </title>
        <link rel="stylesheet" href="css/success.css">
    </head>

    <body dir="rtl" class="imageback">
        <div class="home">
            <h2>  المرفقات المطلوبة  </h2>
            <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <div class="inform">
                    <fieldset id='in1'>

                        <legend>الصورة  </legend>
                        <!-- <div class="main">
                        <label> *  الصورة</label>
                        <input type="file" name="" >
                        <img src="" name="figerprint" alt="">
                    </div> -->
                    
                    <div class="main" >    
                                 <label> 1-  صورة الهوية (بطاقة / جواز) :_______________________</label> 
                                 <input type="file" name="avatar"><br>
                                 <label> 2- صورة شخصية ( خلفية بيضاء صورة واضحة 4*6 ) :____</label>
                                 <input type="file" name="avatar"><br>
                                 <label> 3-   صورة شخصية مع الهوية حسب الصورة التوضحية :_______________ </label>
                                 <a><img src="image/cat.jpg"  style="width:20%;heigth:20%;float:left;"></a><br><br>

                                <?php if(isset($error)){ ?>  
                                <div class="main"><?php echo $error ?> </div>
                                <?php }elseif(isset($success)){?>
                                <div class="main"><?php echo $success ?></div>
                                <?php }?><br><br>

                                <button type="submit" id="btn">إرســــــال</button>
                                <a href="logout.php" id="btn">خـــــروج</a>
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