<?php 

require('function.php');

if(!login()){

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-awesome bootstrap custom css -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <title>Login With Cookie</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-white my-5">Login With Cookie</h2>
        <div class="row">
            <div class="col-4 m-auto w-50">
                <div class="card shadow bg-dark text-white">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login</h3>
                        <br>
                        <form action="#" method="POST" id="login-form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                    </div>
                                    <input type="text" name="username" id="username" placeholder="Username"
                                        class="form-control rounded-right">
                                    <div class="invalid-feedback" id="invalid-username"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" placeholder="Password"
                                        class="form-control rounded-right">
                                    <div class="invalid-feedback" id="invalid-password"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-block" onclick="login()">Login</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border text-primary text-center" role="status" id="loading"
                                    style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/master.js"></script>
    <script>
        function login() {
            $('#loading').toggleClass('d-block');
            $('#password').removeClass('is-invalid');
            $('#username').removeClass('is-invalid');
            $('#invalid-username').html('');
            $('#invalid-password').html('');
            $.ajax({
                url: 'login.php',
                type: 'post',
                data: $('#login-form').serialize(),
                success: function (response) {
                    if (response == 'username_error') {
                        $('#loading').toggleClass('d-block');
                        $('#username').addClass('is-invalid');
                        $('#invalid-username').html('invalid username');
                    }
                    if (response == 'empty_username') {
                        $('#loading').toggleClass('d-block');
                        $('#username').addClass('is-invalid');
                        $('#invalid-username').html('required');
                    }
                    if (response == 'password_error') {
                        $('#loading').toggleClass('d-block');
                        $('#password').addClass('is-invalid');
                        $('#invalid-password').html('invalid password');
                    }
                    if (response == 'empty_password') {
                        $('#loading').toggleClass('d-block');
                        $('#password').addClass('is-invalid');
                        $('#invalid-password').html('required');
                    }
                    if (response == 'success') {
                        window.location.href = "http://localhost/login/home.php";
                    }
                }
            });
        }
    </script>
</body>

</html>

<?php }else{
     header('location:home.php');
} ?>