<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <style>
        .register {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            margin-top: 3%;
            padding: 3%;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
    </style>
</head>
<?php
include('connection.php');
session_start();
if(isset($_POST['login'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email='$email' AND password = '$password'";
    $run = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($run);

    if(!$row)
    {
        ?>
        <script>
        alert('Username or Password not match !!');
        window.open('login','_self');
        </script>
        <?php
    }
    else
    {
        if($row['status'] == 'active')
        {
            $usersID= $row['id']; 
            $_SESSION['usersID'] = $usersID;
            $_SESSION['userEmail'] = $email;
            $_SESSION['name']= $row['name'];
            $_SESSION['phone']= $row['phone'];
            // $_SESSION['id']= $row['id'];
            // echo $_SESSION['phone'];
            // exit();
            
            header('location:./users/dashboard');
        }
        elseif ($row['status'] == 'reject')
        {
            ?>
            <script>
            alert('Your account has been rejected. Please contact support for further assistance.');
            window.open('login','_self');
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
            alert('Your account is not yet verified. Please wait for verification. This may take up to 24 hours.');
            window.open('login','_self');
            </script>
            <?php
        }
    }
}
?>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>BuyCheaptrip Travels!</p>
                <button class="btnRegister btn "><a href="login">Register</a></button><br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Now</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Login Here</h3>
                        <form action="" id="registrationForm" method="post">
                            <div class="row register-form">
                                <div class="col-md-9 offset-2">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
                                        <div class="error-message text-danger" id="email-error"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" name="password" />
                                        <div class="error-message text-danger" id="password-error"></div>
                                    </div>
                                    <input type="submit" class="btnRegister" value="Login" name="login" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#registrationForm").submit(function(event) {
            $(".error-message").text(""); 
            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();


            if (email.trim() === "") {
                $("#email-error").text("Please enter your email.");
                event.preventDefault();
            } else if (!isValidEmail(email.trim())) {
                $("#email-error").text("Please enter a valid email address.");
                event.preventDefault();
            }

            if (password === "") {
                $("#password-error").text("Please enter a password.");
                event.preventDefault();
            }
        });

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });
</script>