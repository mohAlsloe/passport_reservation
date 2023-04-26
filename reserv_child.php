<?php
session_start();
include 'connect.php';   
 if(isset($_SESSION['email']))
 {

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $card_number =$_POST['card_number'];
    $f_name  = $_POST['f_name'];
    $s_name =$_POST['s_name'];
    $t_name  =$_POST['t_name'];
    $l_name =$_POST['l_name'];
    $birth_date= $_POST['birth_date'];
    $sex =$_POST['sex'];
    $city_birth =$_POST['city_birth'];
    $zone_birth =$_POST['zone_birth'];
    $mother_name =$_POST['mother_name'];
    $father_name =$_POST['father_name'];
    $father_phone =$_POST['father_phone'];
    $near_name =$_POST['near_name'];
    $near_type =$_POST['near_type'];
    $near_address =$_POST['near_address'];
    $near_phone =$_POST['near_phone'];
//    $image = $_POST['image'];
//    $figerprint = $_POST['figerprint'];
  

$stmt = $con->prepare("SELECT chil_id , card_number from child_newpassport where card_number =? ");
$stmt->execute(array($card_number));
$get =$stmt->fetch();
$count = $stmt->rowCount();
if($count > 0)
{ 
   $_SESSION['card_number']=$card_number;
   $_SESSION['child_id']=$get['chil_id'];
   header("location:uplod_avatar_newpassport.php");
}

$stmt =$con->prepare("
INSERT INTO
 `child_newpassport` (`card_number`, `f_name`, `s_name`, `t_name`, `l_name`, `birth_date`,
 `sex`, `city_birth`, `zone_birth`, `mother_name`, `father_name`, `father_phone`, `near_name`, 
 `near_type`,`near_address`, `near_phone`) 
VALUES 
(:card_number,:f_name,:s_name,:t_name,:l_name,:birth_date,
:sex,:city_birth,:zone_birth,:mother_name,:father_name,:father_phone,:near_name,
:near_type,:near_address,:near_phone)");

$stmt->execute(array(
    'card_number' =>$card_number,
    'f_name' =>$f_name,
    's_name' =>$s_name,
    't_name' =>$t_name,
    'l_name' =>$l_name,
    'birth_date'=>$birth_date,
    'sex' =>$sex,
    'city_birth' =>$city_birth,
    'zone_birth' =>$zone_birth,
    'mother_name' =>$mother_name,
    'father_name' =>$father_name,
    'father_phone' =>$father_phone,
    'near_name' =>$near_name,
    'near_type' =>$near_type,
    'near_address' =>$near_address,
    'near_phone' =>$near_phone

));

if($stmt)
{
header("location:uplod_avatar_newpassport.php");
}


}



?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/reservation.css">
        <title>إصدار جواز للمواليد</title>
    </head>

    <body dir="rtl" class="imageback">
        <div class="home">
            <h2>يرجئ ادخال البيانات التالية: </h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="inform">
                    <div id="lab1">
                        <fieldset id="in1">
                            <legend>البيانات الشخصية</legend>
                            <div class="main">
                            <label> * رقم شهادة الميلاد</label>
                                <input type="text" name="card_number" required placeholder=" ادخل رقم شهادة الميلاد ">
                                <label> * الاسم الاول</label>
                                <input type="text" name="f_name" required placeholder="  ادخل الاسم الاول">
                                <label> *  الاسم الثاني</label>
                                <input type="text" name="s_name" required placeholder="  ادخل الاسم الثاني"><br><br>
                                <label> *  الاسم الثالث</label>
                                <input type="text" name="t_name" required placeholder="  ادخل الاسم الثالث">
                                <label> *  الاسم الرابع  </label>
                                <input type="text" name="l_name" required placeholder="  ادخل الاسم الرابع">
                                <label> * الجنس </label>
                             <select name="sex" class="main">
                                    <?php
                                    $male ='ذكر';
                                    $fmale ='أنثى';
                                    ?>
                                    <option value="<?php echo $male ?>">ذكر </option>
                                    <option  value="<?php echo $fmale ?>">انثى </option>
                              </select> <br><br>

                                <label> * محافظة</label>
                                <input type="text" name="city_birth" required placeholder="محافظة">
                                <label> * مديرية</label>
                                <input type="text" name="zone_birth" required placeholder="مديرية">
                                <label> * تاريخ الميلاد </label>
                                <input type="date" name="birth_date"><br><br>                           
                                <label> *  اسم الام الثلاثي   </label>
                                <input type="text" name="mother_name" required placeholder="اسم الام الثلاثي">
                            
                                <label> *   اسم ولي الامر الثلاثي   </label>
                                <input type="text" name="father_name" required placeholder=" ولي الامر">
                                <label> *  رقم الجوال </label>
                                <input type="text" name="father_phone" required placeholder="رقم الجوال">

                            </div> <br>
                        
                            <button id="btn" type="button" value="lab2" onclick="lab1()">التالي </button>
                        </fieldset>
                   
                    </div>
            

                    <div id="lab2">
                        <fieldset id="in1">
                            <legend> بيانات الأقارب</legend>
                            <div class="main">
                                <label> 1 -  *  الاسم الثلاثي </label>
                                <input type="text" name="near_name" required placeholder="الاسم الثلاثي">
                                <label> *  صلة القرابة </label>
                                <input type="text" name="near_type" required placeholder="صلة القرابة">
                                <label> *  العنوان</label>
                                <input type="text" name="near_address" required placeholder=" العنوان "><br><br>
                                <label> *  رقم الجوال </label>
                                <input type="text" name="near_phone" required placeholder="رقم الجوال">
                            </div>
                            <br>
                            <button id="btn" type="button" value="lab5" onclick="lab11()">السابق </button>
                            <button id="btn" type="button" value="lab6" onclick="lab2()">التالي </button>
                        </fieldset>
                    </div>


                    <!-- <fieldset id='in1'>
            <legend>المرفقات  </legend>
                    <div class="main">
                        <label> *  البصمة</label>
                        <input type="file" name="" >
                        <img src="" name="figerprint" alt="">
                    </div>
                    <br>
                    <div class="main">
                        <label> *  الصورة</label>
                        <img src=""  name="image"alt="">

                    </div>
                    
                </fieldset>
                -->

            </form><br>
            <div id="lab3">
                <div class="signup">
                    <button id="btn" type="button" value="lab6" onclick="lab22()">رجوع </button>

                    <input type="submit" name="submit" value="إرســــــال">
                
                </div>
              
                     
            </div>

            </div>

        </div>
        <script type="text/javascript" src="js/reservation.js"></script>

    </body>

    </html>
   <?php }else {
              header("location:login.php");
              }
   ?>