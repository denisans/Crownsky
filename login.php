<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Crown Sky</title>

    <!--Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap"
        rel="stylesheet">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/dist/css/fontawesome.css">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="assets/dist/css/login.css">
</head>

<body>
    <!-- 02 Main page -->
    <section class="page-section login-page">
        <div class="full-width-screen">
            <div class="container-fluid p-0">
                <div class="particles-bg" id="particles-js">

                    <div class="content-detail">
                    
                        <!-- Login form -->
                        <form class="login-form" action="periksa_login.php" method="post">
                        <center>

                        <br>
                        <br/>

                        <?php 
                        if(isset($_GET['alert'])){
                            if($_GET['alert'] == "gagal"){
                                echo "<div class='alert alert-danger'>Login failed! Invalid username or password.</div>";
                            }else if($_GET['alert'] == "logout"){
                                echo "<div class='alert alert-success'>You have successfully logged out.</div>";
                            }else if($_GET['alert'] == "belum_login"){
                                echo "<div class='alert alert-warning'>You need to log in to access the admin page.</div>";
                            }
                        }

                        ?>
                        </center>
                        <p class="login-box-msg" style="font-weight: bold; font-size: 20px; color: black;">LOGIN</p>

                            <div class="imgcontainer">
                            <video width="320" height="240" style="pointer-events: none;" controls playsinline loop autoplay muted>
                            <source src="gambar/Crown Sky_3.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                            </video>
                            </div>
                            <div class="input-control">
                                <input type="text" placeholder="Enter Username" name="username" required>
                                <span class="password-field-show">
                                    <input type="password" placeholder="Enter Password" name="password"
                                        class="password-field" value="" required>
                                    <span data-toggle=".password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </span>

                                <div class="login-btns">
                                    <button type="submit">Login</button>
                                </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- latest jquery-->
    <script src="assets/dist/js/jquery-3.5.1.min.js"></script>
    <!-- theme particles script -->
    <script src="assets/dist/js/particles.min.js"></script>
    <script src="assets/dist/js/app.js"></script>
    <!-- Theme js-->
    <script src="assets/dist/js/script.js"></script>
</body>

</html>