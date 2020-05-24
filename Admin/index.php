<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Login Form</title>
</head>
<body style="background:#CCC;">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-dark mt-5">
                    <div class="card-title bg-primary text-white mt-5">
                        <h3 class="text-center py-3">Client Login Form </h3>
                    </div>

                    <?php
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
                    <?php
                        }
                    ?>


                    <?php
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
                    <?php
                        }
                    ?>

                    <div class="card-body" align="center">
                        <form action="process.php" method="post">
                            <input type="text" name="UName" placeholder=" User Name" class="form-control mb-3">
                            <input type="password" name="Password" placeholder=" Password" class="form-control mb-3">
                            <button class="btn btn-success mt-3" name="Login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
