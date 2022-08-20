<?php
include "database/pdo_connection.php";
$error="";
if(
    isset($_POST['kodmelli']) && $_POST['kodmelli'] !==''
    && isset($_POST['email']) && $_POST['email'] !==''
    && isset($_POST['password']) && $_POST['password'] !==''
    && isset($_POST['passwordd']) && $_POST['passwordd'] !=='')
    {
        if($_POST['password']=== $_POST['passwordd']){
          if(strlen($_POST['password']) >4){
                if(isset($_POST['input-field button'])){
                    $kodmelli=$_POST['kodmelli'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $result=$conn->prepare("INSERT INTO users SET kodmelli=? , email=? , password=?");
                    $result->bindValue(2,$kodmelli);
                    $result->bindValue(3,$email);
                    $result->bindValue(4,$password);
                    $result->execute();
                }
          }
          else{
            $error="رمز عبور حداقل چهار کارکتر باشد";
          }
        }

        else{
            $error="رمز عبور یکسان نیست";
        }
    }
   else{
          $error="فرم را پر کنید";
   }
?>
<!DOCTYPE html>

<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/rigester.css">
    <script src="https://kit.fontawesome.com/644ee7e176.js" crossorigin="anonymous"></script>
    <title>ورود/ثبت نام</title>
</head>
<body>
  <div class="container">
    <div class="forms">
        <div class="form login">
            <span class="title">ورود به حساب کاربری
            </span>

            <form action="#">
                <div class="input-field">
                    <input type="text" placeholder=" نام کاربری خود را وارد کنید" required>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="password" placeholder="رمز عبور خود را وارد کنید" required>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text">مرا به خاطر بسپار</label>
                    </div>
                    
                </div>

                <div class="input-field button2">
                    <input type="button" value="ورود">
                </div>
            </form>

            <div class="login-signup">
                <span class="text">حساب کاربری ندارید ؟
                    <a href="#" class="text signup-link">ثبت نام</a>
                </span>
            </div>
        </div>

        <!-- Registration Form -->
        <div class="form signup">
            <span class="title">ثبت نام</span>

            <form action="#" method="POST">
                <div class="input-field">
                    <input name="id" type="text" placeholder="نام کاربری (کد ملی)"" required>
                    <i class="uil uil-user"></i>
                </div>
                <div class="input-field">
                    <input name="email" type="text" placeholder="ایمیل" required>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-field">
                    <input name="password" type="password" class="password" placeholder="رمز عبور" required>
                    <i class="uil uil-lock icon"></i>
                </div>
                <div class="input-field">
                    <input name="passwordd" type="password" class="password" placeholder="تکرار رمز عبور" required>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>
                <div class="input-field button">
                    <input type="submit" value="ثبت نام">
                </div>
            </form>

            <div class="login-signup">
                <span class="text">قبلا ثبت نام کرده اید ؟
                    <a href="#" class="text login-link">ورود به حساب</a>
                </span>
            </div>
        </div>
    </div>
</div>
  <script src="./js/login.js"></script>
</body>
</html>