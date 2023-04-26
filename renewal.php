<?php
session_start();
include 'connect.php';   
if(isset($_SESSION['email'])){
   
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $card_number =$_POST['card_number'];
    $phone =$_POST['phone'];




$stmt = $con->prepare("
INSERT INTO `renewing_passport` (`card_number`, `phone`) 
VALUES (:card_number,:phone)");

$stmt->execute(array(
   
    'card_number'=>$card_number,
    'phone' =>$phone
   
));

if($stmt)
{
header("location:services.php");
}
}
  


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/reservation.css">
        <title>تجديد جواز</title>
    </head>

    <body dir="rtl" class="imageback">
        <div class="home">
            <h2>بيانات الجواز السابق </h2>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="inform">
                    <div id="lab1">
                        <fieldset id="in1">

                            <div class="main">
                                <label> *رقم الجواز السابق</label>
                                <input type="text" name="card_number" required placeholder="رقم الجواز السابق ">
                               <!-- <label> * نوع الجواز   :</label>
                                <select name="card_type" class="main">
                                <?php
                                $ade = 'عادي ';
                                $dob = 'دبلوماسي  ';
                              
                                ?>
                                <option value="<?php echo $ade ?>"> عادي </option>
                                <option value="<?php echo $dob ?>"> دبلوماسي </option>
                                
                            </select> -->
                                <label> * رقم الجوال</label>
                                <input type="text" name="phone" required placeholder="رقم الجوال">

                            </div><br>
                            <!-- <button id="btn" type="button" value="lab1" onclick="lab1()">التالي </button> -->

                        </fieldset>

                    </div>


            </form><br>
            <div id="lab7">
                <div class="signup">
                    <!-- <button id="btn" type="button" value="lab6" onclick="lab66()">السابق </button> -->

                    <input type="submit" name="submit" value="إرســــــال">
                    <!-- <a href="logout.php" id="btn">خـــــروج</a> -->
                </div>
            </div>

            </div>

        </div>
        <script type="text/javascript" src="js/reservation.js"></script>

    </body>

    </html>
    <?php }else{
           header("location:login.php");
      }
    ?>