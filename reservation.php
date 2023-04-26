<?php
session_start();
include 'connect.php';   
if(isset($_SESSION['email'])){
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $card_type = $_POST['card_type'];
   $card_number = $_POST['card_number'];
   $issuer = $_POST['issuer'];
   $date_issue = $_POST['date_issue'];
   $f_name = $_POST['f_name'];
   $s_name = $_POST['s_name'];
   $t_name = $_POST['t_name'];
   $l_name = $_POST['l_name'];
   $profession = $_POST['profession'];
   $nationality = $_POST['nationality'];
   $marital_status = $_POST['marital_status'];
   $city_birth = $_POST['city_birth'];
   $zone_birth = $_POST['zone_birth'];
   $blood_type = $_POST['blood_type'];
   $birth_date = $_POST['birth_date'];
   $sex = $_POST['sex'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $zone = $_POST['zone'];
   $address_work = $_POST['address_work'];
   $working_institution = $_POST['working_institution'];
   $phone = $_POST['phone'];
   $mother = $_POST['mother'];
   $mother_nationality = $_POST['mother_nationality'];

   $near_name_one = $_POST['near_name_one'];
   $near_type_one = $_POST['near_type_one'];
   $near_address_one = $_POST['near_address_one'];
   $near_phone_one = $_POST['near_phone_one'];

   $near_name_two = $_POST['near_name_two'];
   $near_type_two = $_POST['near_type_two'];
   $near_address_two = $_POST['near_address_two'];
   $near_phone_two = $_POST['near_phone_two'];
//    $image = $_POST['image'];
//    $figerprint = $_POST['figerprint'];
   $order_date = $_POST['order_date'];

$stmt = $con->prepare("SELECT id_persons , card_number from newpassport where card_number =? ");
$stmt->execute(array($card_number));
$get =$stmt->fetch();
$count = $stmt->rowCount();
if($count > 0)
{ 
   $_SESSION['card_number']=$card_number;
   $_SESSION['per_id']=$get['id_persons'];
   header("location:uplod_avatar_newpassport.php");
}

$stmt =$con->prepare("
INSERT INTO  `newpassport` (`card_type`, `card_number`, `issuer`, `date_issue`, 
`f_name`, `s_name`, `t_name`, `l_name`, `profession`, `nationality`, `marital_status`, 
`city_birth`, `zone_birth`, `blood_type`, `birth_date`, `sex`, `address`, `city`, 
`zone`,`address_work`, `working_institution`, `phone`, `mother`, `mother_nationality`,
`near_name_one`, `near_type_one`, `near_address_one`, `near_phone_one`, `near_name_two`,
`near_type_two`, `near_address_two`, `near_phone_two`, `order_date`)

VALUES (:card_type,:card_number,:issuer,:date_issue,:f_name,:s_name,:t_name,:l_name,:profession,:nationality,:marital_status,:city_birth,
:zone_birth,:blood_type,:birth_date,:sex,:address,:city,:zone,
:address_work,:working_institution,:phone,:mother,:mother_nationality,
:near_name_one,:near_type_one,:near_address_one,:near_phone_one,:near_name_two,
:near_type_two,:near_address_two,:near_phone_two,:order_date)");

$stmt->execute(array(
    'card_type' =>$card_type,
    'card_number'=>$card_number,
    'issuer' => $issuer,
    'date_issue' =>$date_issue,
    'f_name' =>$f_name,
    's_name' =>$s_name,
    't_name' =>$t_name,
    'l_name' =>$l_name,
    'profession' =>$profession,
    'nationality' =>$nationality,
    'marital_status' =>$marital_status,
    'city_birth' =>$city_birth,
    'zone_birth' =>$zone_birth,
    'blood_type' =>$blood_type,
    'birth_date' =>$birth_date,
    'sex' =>$sex,
    'address' =>$address,
    'city' =>$city,
    'zone'=>$zone,
    'address_work'=>$address_work,
    'working_institution'=>$working_institution,
    'phone' =>$phone,
    'mother' =>$mother,
    'mother_nationality' =>$mother_nationality,
    'near_name_one' =>$near_name_one,
    'near_type_one' =>$near_type_one,
    'near_address_one' =>$near_address_one,
    'near_phone_one' =>$near_phone_one,
    'near_name_two'=>$near_name_two,
    'near_type_two' =>$near_type_two,
    'near_address_two' =>$near_address_two,
    'near_phone_two' =>$near_phone_two,
    'order_date' =>$order_date
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
        <title>إصدار جواز</title>
    </head>

    <body dir="rtl" class="imageback">
        <div class="home">
            <h2>يرجئ ادخال البيانات التالية: </h2>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="inform">
                    <div id="lab1">
                        <fieldset id="in1">
                            <legend>بيانات الهوية</legend>
                            <div class="main">
                                <label> * نوع الهوية  :</label>
                                <select name="card_type" class="main">
                                <?php
                                $pers_card = 'بطاقة شخصية';
                                $passport = 'جواز سفر ';
                                $family_card = 'بطاقة شخصية';
                                $seat_num = 'بطاقة شخصية';
                                ?>
                                <option value="<?php echo $pers_card ?>">بطاقة شخصية</option>
                                <option value="<?php echo $passport ?>">جواز سفر</option>
                                <option value="<?php echo $family_card ?>">بطاقةعائلية</option>
                                <option value="<?php echo $seat_num ?>">رقم جلوس</option>
                            </select>
                                <label> *رقم الهوية</label>
                                <input type="text" name="card_number" required placeholder="ادخل رقم الهوية ">
                                <label> *جهة الإصدار </label>
                                <input type="text" name=" issuer" required placeholder="جهة الاصدار"> <br><br>
                                <label> *تاريخ الإصدار</label>
                                <input type="date" name="date_issue">
                                <label> * تاريخ تقديم الطلب</label>
                                <input type="date" name="order_date">
                            </div><br>
                            <button id="btn" type="button" value="lab1" onclick="lab1()">التالي </button>

                        </fieldset>

                    </div>

                    <div id="lab2">
                        <fieldset id="in1">
                            <legend>البيانات الشخصية</legend>

                            <div class="main">
                                <label> * الاسم الاول</label>
                                <input type="text" name="f_name" required placeholder="  ادخل الاسم الاول">
                                <label> *  الاسم الثاني</label>
                                <input type="text" name="s_name" required placeholder="  ادخل الاسم الثاني">
                                <label> *  الاسم الثالث</label>
                                <input type="text" name="t_name" required placeholder="  ادخل الاسم الثالث">
                                <br><br>
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
                        </select>
                                <label> *  الجنسية</label>
                                <input type="text" name="nationality" required placeholder="الجنسية">
                            </div>
                            <br>
                            <div class="main">
                                <label> * المهنة</label>
                                <input type="text" name="profession" required placeholder="المهنة">
                                <label> * الحالة الاجتماعية</label>
                                <select name="marital_status" class="main">
                        <?php
                        $married = 'متزوج';
                        $single = 'عازب';
                        $widowr = 'ارمل';
                        
                        ?>
                            <option value="<?php echo $married ?>"> متزوج </option>
                            <option value="<?php echo $single ?>">عازب</option>
                            <option value="<?php echo $widowr ?>">ارمل</option>
                        </select>

                                <?php
                            $O1 = '-O';
                            $O2 = '+O';
                            $A1 = '-A';
                            $A2 = '+A';
                            $B1 = '-B';
                            $B2 = '+B';
                            $AB1 = '-B';
                            $AB2 = '+B';
                            ?>

                                    <label> * فصيلة الدم </label>
                                    <select name="blood_type">
                        <option value="<?php echo $O1?>">-O</option>
                        <option value="<?php echo $O2?>">+O</option>
                        <option value="<?php echo $A1?>">-A</option>
                        <option value="<?php echo $A2?>">+A</option>
                        <option value="<?php echo $B1?>">-B</option>
                        <option value="<?php echo $B2?>">+B</option>
                        <option value="<?php echo $AB1?>">-AB</option>
                        <option value="<?php echo $AB2?>">+AB</option>
                        </select>
                            </div> <br>
                            <button id="btn" type="button" value="lab1" onclick="lab11()">السابق </button>
                            <button id="btn" type="button" value="lab2" onclick="lab2()">التالي </button>
                        </fieldset>
                        <!-- ////////////////////////////////////////////////////////////////// -->
                    </div>
                    <div id="lab3">

                        <fieldset id="in1">
                            <legend> مكان وتاريخ الميلاد</legend>
                            <div class="main">
                                <label> * محافظة</label>
                                <input type="text" name="city_birth" required placeholder="محافظة">
                                <label> * مديرية</label>
                                <input type="text" name="zone_birth" required placeholder="مديرية">
                                <label> * تاريخ الميلاد </label>
                                <input type="date" name="birth_date">
                            </div><br>
                            <button id="btn" type="button" value="lab2" onclick="lab22()">السابق </button>
                            <button id="btn" type="button" value="lab3" onclick="lab3()">التالي </button>
                        </fieldset>
                    </div>
                    <div id="lab4">
                        <fieldset id="in1">
                            <legend>عنوان الإقامة والعمل </legend>
                            <div class="main">
                                <label> * الشارع /الحارة </label>
                                <input type="text" name="address" required placeholder="شارع / حارة">
                                <label> * المديرية</label>
                                <input type="text" name="zone" required placeholder="المديرية">
                                <label> * المحافظة </label>
                                <input type="text" name="city" required placeholder="المحافظة">
                            </div><br>
                            <div class="main">
                                <label> * عنوان العمل </label>
                                <input type="text" name="address_work" required placeholder="عنوان العمل">
                                <label> * جهة العمل </label>
                                <input type="text" name="working_institution" required placeholder="جهة العمل">
                                <label> * رقم الجوال</label>
                                <input type="text" name="phone" required placeholder="رقم الجوال">
                            </div>
                            <button id="btn" type="button" value="lab3" onclick="lab33()">السابق </button>
                            <button id="btn" type="button" value="lab4" onclick="lab4()">التالي </button>
                        </fieldset>
                    </div>

                    <div id="lab5">
                        <fieldset id="in1">
                            <legend> بيانات الام</legend>
                            <div class="main">
                                <label> *  اسم الام الثلاثي   </label>
                                <input type="text" name="mother" required placeholder="اسم الام الثلاثي">
                                <label>_____________________</label>

                                <label> *  جنسية الام  </label>
                                <input type="text" name="mother_nationality" required placeholder="جنسية الام">
                            </div><br>
                            <button id="btn" type="button" value="lab4" onclick="lab44()">السابق </button>
                            <button id="btn" type="button" value="lab5" onclick="lab5()">التالي </button>
                        </fieldset>
                    </div>

                    <div id="lab6">
                        <fieldset id="in1">
                            <legend> بيانات الأقارب</legend>
                            <div class="main">
                                <label> 1 -  *  الاسم الثلاثي </label>
                                <input type="text" name="near_name_one" required placeholder="الاسم الثلاثي">
                                <label> *  صلة القرابة </label>
                                <input type="text" name="near_type_one" required placeholder="صلة القرابة">
                                <label> *  العنوان</label>
                                <input type="text" name="near_address_one" required placeholder=" العنوان "><br><br>
                                <label> *  رقم الجوال </label>
                                <input type="text" name="near_phone_one" required placeholder="رقم الجوال">
                            </div>
                            <br>
                            <div class="main">
                                <label>  2 - * الاسم الثلاثي</label>
                                <input type="text" name="near_name_two" required placeholder="الاسم الثلاثي">
                                <label> *  صلة القرابة </label>
                                <input type="text" name="near_type_two" required placeholder="صلة القرابة">
                                <label> *  العنوان</label>
                                <input type="text" name="near_address_two" required placeholder=" العنوان">
                            </div><br>
                            <div class="main">
                                <label> *  رقم الجوال</label>
                                <input type="text" name="near_phone_two" required placeholder="رقم الجوال">

                            </div><br>
                            <button id="btn" type="button" value="lab5" onclick="lab55()">السابق </button>
                            <button id="btn" type="button" value="lab6" onclick="lab6()">التالي </button>
                        </fieldset>
                    </div>


            
                

            </form><br>
            <div id="lab7">
                <div class="signup">
                    <button id="btn" type="button" value="lab6" onclick="lab66()">رجوع </button>

                    <input type="submit" name="submit" value="إرســــــال">
                
                </div>
              
                     
            </div>

            </div>

        </div>
        <script type="text/javascript" src="js/reservation.js"></script>

    </body>

    </html>
    <?php  }else{
    header("location:login.php");
         }
   
   ?>