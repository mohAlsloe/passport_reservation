<?php
session_start();
include 'connect.php';
if(isset($_SESSION['email'])){
    header("location:services.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $stmt = $con->prepare("SELECT user_id , email , pass from users where email =? and pass = ? ");
    $stmt->execute(array($email,$pass));
    $get = $stmt->fetch();
    $count = $stmt->rowCount();
    if($count > 0)
    { 
        $_SESSION['email'] = $email;
        $_SESSION['uid'] = $get['user_id'];
        
        header("location:services.php");
    }


} 
?>


    <html>

    <head>
        <meta charset="utf-8">
        <title>login</title>
        <link rel="stylesheet" href="css/login.css">

    </head>

    <body>
        <div class="img">

            <div class="content">
                <h2>تسجـــــــيل دخــــــول</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                    <div class="filed">
                        <input type="text" name="email" required placeholder=" أدخل البريد الالكتروني ">

                    </div>

                    <div class="filed space">
                        <input type="password" name="pass" class="pass-key" required placeholder="كلمه المرور">
                        <span class="show">  ظهور </span>

                    </div>


                    <div class="field1">
                        <input type="submit" name="submit" value="دخــــــول" >
                    </div>


                </form>
                <div class="signup"> ليس لدي حساب
                    <a href="sign-up.php"> تسجيل جديد</a><br><br>
                    <a  href="#">  نسيت كلمة المرور </a>
                </div>

            </div>

        </div>
    
        <script type="text/javascript" src="js/login.js"></script>
    </body>

    </html>