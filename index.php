<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="System Monitor">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <title>System Monitor</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body id="body">

    <div class="container">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="card">
                        <form action="view/dashboard.php" class="was-validated" method="post" id="login-container">
                            <div class="card-header text-center">
                                <img src="assets/img/backgrounds/dashboard.svg" alt="usrImg" style="width: 30%; height: 30%;">
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
                <p id="copyright">&copy; <a href="https://github.com/saltrupiao/SysMonitor">Tux Rules</a> Project Group</p>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>

</html>
