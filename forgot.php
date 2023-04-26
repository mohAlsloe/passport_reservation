<?php
session_start();
include 'connect.php';
if(isset($_SESSION['email'])){
    header("location:reservation.php");
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$fname  = $_POST['f_name'];
$lname  =  $_POST['l_name'];
$email  = $_POST['email'];
$pass   = $_POST['pass'];
$pass2  = $_POST['conf-pass'];
$sex    =  $_POST ['sex'];

$stmt = $con->prepare("SELECT * FROM users where email =? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();

$formError =array();
if($fname ==''){
    $formError[]=' حقل الاسم الاول فارغ';
    }
    if($lname ==''){
    $formError[]='حقل الاسم الثاني فارغ ';
    }
    if($email ==''){
    $formError[]='حقل البريد الالكتروني فارغ ';
    }
    if($pass ==''){
    $formError[]='حقل كلمة المرور فارغ ';
    }
    if($pass2 ==''){
    $formError[]='حقل تاكيد كلمة المرور';
    }
    if(strlen($fname)<3){
    $formError[]='الحد الادني للاسم الاول 3 احرف ';
    }
    if(strlen($fname)>10){
    $formError[]='الحد الاقصى للاسم الاول 10 احرف ';
    }
    if(strlen($lname)<3){
    $formError[]='الحد الادني للاسم الثاني 3 احرف';
    }
    if(strlen($lname)>20){
    $formError[]='الحد الاقصى للاسم الثاني 15 احرف';
    }
    if(strlen($email)<5){
    $formError[]='الحد الادنى للبريد الالكتروني 5 احرف ';
    }
    
    if(strlen($pass)<6){
    $formError[]='كلمة المرور ضعيفة يجب استخدام 6 احرف على الاقل';
    }
    if(strlen($pass)<6){
    $formError[]='كلمة المرور ضعيفة يجب استخدام 6 احرف على الاقل';
    }
    
    if($count > 0 )
    {
    $formError[] ="هذ البريد الالكتروني مستخدم من قبل";
    }
    if($pass !== $pass2){
        $formError[] ="كلمة المرور غير مطابق ";
    
    }
if(empty($formError)){
$stmt   = $con->prepare("  
INSERT INTO `users` (`f_name`, `l_name`, `email`, `pass`, `sex`)
 VALUES (:f_name, :l_name,:email,:pass,:sex)");
$stmt->execute(array(
    'f_name'  => $fname,
    'l_name'  => $lname,
    'email'  => $email,
    'pass'   => $pass,
    'sex'    => $sex
));

if($stmt)
{
header("location:login.php");
}
} 

}

?>
    <html>

    <head>
        <meta charset="utf-8">
        <title>sign-up</title>
        <link rel="stylesheet" href="css/sign-up.css">

    </head>

    <body>
        <div class="img">

            <div class="content">
                <h2>انشاء حساب جديد </h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="filed space">
                        <input type="text" name="f_name" required placeholder=" لاسم الاول">

                    </div>
                    <div class="filed space">
                        <input type="text" name="l_name" required placeholder=" لاسم الثاني">

                    </div>
                    <div class="filed space">

                        <input type="email" name="email" required placeholder="أدخل البريد الالكتروني">
                    </div>

                    <div class="filed space">
                        <input type="password" name="pass" class="pass-key" required placeholder="كلمه المرور">
                        <span class="show">  ظهور </span>

                    </div>
                    <div class="filed space">
                        <input type="password" name="conf-pass" class="pass-key" required placeholder="تاكيد المرور">
                        <span class="show">  ظهور </span>

                    </div>
                    
                    <select class="filed space sex" name="sex">
                    <?php
                        $male ='ذكر';
                        $fmale ='أنثى';
                    ?>
                    <option value="<?php echo $male ?>">ذكر </option>
                    <option  value="<?php echo $fmale ?>">انثى </option>
                </select>

                    <div class="field1">
                        <input type="submit" name="submit" value="دخــــــول">
                    </div>
                    <?php  if(!empty($formError)){
                         
                         foreach($formError as $error){
                        ?>
                    <div class="error">
                        <p>
                            <?php echo $error ?>
                            <p>
                    </div>
            </div>
            <?php 
                         }
                       }?>

            </form>
            <div class="signup">
                <a href="login.php"> الدخول من الحساب الحالي </a>

            </div>

        </div>

        </div>

        <script type="text/javascript" src="js/login.js"></script>
    </body>

    </html>