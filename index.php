<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="System Monitor">

    <title>System Monitor</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/media-queries.css">
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body id="body">

    <div class="container">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="card wow fadeIn">
                        <form action="view/dashboard.php" class="was-validated" method="post" id="login-container">
                            <div class="card-header text-center">
                                <img src="assets/img/dashboard.svg" alt="usrImg" style="width: 30%; height: 30%;">
                                <h2 class="pt-2">System Monitor</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="un">Username:</label>
                                    <input type="text" class="form-control" id="un" placeholder="Enter username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                                </div>
                                <div class="form-group form-check">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch1" name="example">
                                        <label class="custom-control-label" for="switch1">Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" name="action" value="login" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p id="copyright" class="wow fadeIn">&copy; <a href="https://github.com/saltrupiao/SysMonitor">Tux Rules</a> Project Group</p>
            </div>
        </div>
    </div>


    <!-- Javascript -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/loginScripts.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
</body>
</html>