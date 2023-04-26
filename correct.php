
<?php
include 'connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
    $hash = $_POST['code'];

    $stmt  = $con->prepare("SELECT hash_code FROM users WHERE hash_code=? ");
    $stmt->execute(array($hash));
    $count = $stmt->rowCount(); 
    if($count > 0)
    {
        
        $_SESSION['code']=$hash;
        header("location:services.php");
    }
   

}


?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <title>check</title>


</head>

<body>

    <div class="img">

        <div class="content">
            <h2>  ادخل رمز التحقق    </h2>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">


                <div class="filed space">
               
                    <input type="text" name="code" required placeholder="ادخل الــــرمــز  "><br>
                </div>

                <div class="field1">
                    <input type="submit" name="submit" value="تحقق ">
                </div>


            </form>

        </div>
    </div>





</body>

</html>