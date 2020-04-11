<?php
$servername = "localhost";
$username = "user";
$password = "GuoJ1RaadXHf";
$dbname = "sysmonitor";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!---------------------------------------------------
    SIDEBAR - https://bootstrapious.com/p/bootstrap-sidebar

    Copyright (c) 2015 Ondrej
    ---------------------------------------------------->
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="System Monitor">

    <title>System Monitor</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/media-queries.css">
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    
</head>
<body id="body">
    
<!---------------------------------------------------
    SIDEBAR
----------------------------------------------------->
    
    <div class="wrapper">
        
        <!-- Sidebar  -->
        <nav id="sidebar" class="bg-dark">
            <div class="sidebar-header text-center">
                <img src="../assets/img/dashboard.svg" alt="usrImg" style="width: 30%; height: 30%;">
                <h3>System Monitor</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Command Center</p>
                <li class="active">
                    <a href="#clientSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Clients</a>
                    <ul class="collapse list-unstyled" id="clientSubmenu">
                        <li>
                            <a href="#">Client 1</a>
                        </li>
                        <li>
                            <a href="#">Client 2</a>
                        </li>
                        <li>
                            <a href="#">Client 3</a>
                        </li>
                        <li>
                            <a href="#">Client 4</a>
                        </li>
                        <li>
                            <a href="#">Client 5</a>
                        </li>
                    </ul>
                </li>
		<li>
		    <a href="logmgmt.php" target="_blank">Manage System Logs</a>
		</li>
		<li>
                    <a href="#" data-toggle="modal" data-target="#pcMgmtModal">Manage Inventory</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#profileModal">Profile</a>
                </li>
                <li>
                    <a href="#">Help</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://github.com/saltrupiao/SysMonitor/archive/master.zip" class="download">Download source</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            
            <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item pr-4 pt-2">
                                <p><img src="../assets/img/user.jpg" alt="usrImg" style="width: 40px; height: 40px; border-radius: 50%;">&nbsp;&nbsp;Welcome, User!</p>
                            </li>
                            <li class="nav-item pt-2">
                                <button onclick="location.href='../index.php';" id="logBtn" class="btn btn-primary">
                                    Logout
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <h2>Systems Overview</h2>
                <div id="overviewAccordion">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#overviewCollapse">
                                Summary
                            </a>
                        </div>
                        <div id="overviewCollapse" class="collapse show" data-parent="#overviewAccordion">
                            <div class="card-body">
                                <canvas id="doughnutChart" class="mx-auto" style="max-width: 50%; min-width: 45%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="line"></div>
            
            <div class="container-fluid">
                <h2>Storage</h2>
                <div id="diskAccordion">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#diskCollapse">
                                Disk
                            </a>
                        </div>
                        <div id="diskCollapse" class="collapse show" data-parent="#diskAccordion">
                            <div class="card-body">
                                <canvas id="diskBarChart" width="400" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="line"></div>

            <div class="container-fluid">
                <h2>CPU</h2>
                <div id="coresAccordion">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#coresCollapse">
                                Logical Cores
                            </a>
                        </div>
                        <div id="coresCollapse" class="collapse show" data-parent="#coresAccordion">
                            <div class="card-body">
                                <canvas id="coresBarChart" width="400" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="line"></div>

            <div class="container-fluid">
                <h2>Memory</h2>
                <div id="memAccordion">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#memCollapse">
                                Summary
                            </a>
                        </div>
                        <div id="memCollapse" class="collapse show" data-parent="#memAccordion">
                            <div class="card-body">
                                <canvas id="memoryBarChart" width="400" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="line"></div>

            <div class="container-fluid">
                <h2>Network</h2>
                <div id="netAccordion">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#netCollapse">
                                Summary
                            </a>
                        </div>
                        <div id="netCollapse" class="collapse show" data-parent="#netAccordion">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                    <table class="table table-dark table-striped" >
                                        <thead>
                                            <tr>
                                                <th>Interface</th>
                                                <th>Ipv4</th>
                                                <th>Ipv6</th>
                                                <th>Mac</th>
                                            </tr>
                                        </thead>
                                        <tbody id="networkTable">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <!-- Manage Computers Modal -->
<div class="modal fade" id="pcMgmtModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Manage Computer Inventory</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="../controller/manageClient.php" method="post">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="input01">PC Name</label>
                            <?php
                                //Sourced from: https://www.w3schools.com/php/php_mysql_select.asp
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT cli_hostname, cli_nic_addrv4 FROM client";
                                $result = $conn->query($sql);
                                $i = 1;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        echo "<input type='text' class='form-control' name='name{$i}' value='{$row["cli_hostname"]}' placeholder='Name of PC 1' disabled>";
                                        $i = $i + 1;
                                    }
                                }
                                else {
                                    echo "no results";
                                }
                                $conn->close();
                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="input02">IP Address</label>
                            <?php
                            //Sourced from: https://www.w3schools.com/php/php_mysql_select.asp
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT cli_hostname, cli_nic_addrv4 FROM client";
                            $result = $conn->query($sql);
                            $i = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<input type='text' class='form-control' name='ip{$i}' value='{$row["cli_nic_addrv4"]}' placeholder='IP of PC 1'>";
                                    $i = $i + 1;
                                }
                                echo "<input type='text' class='form-control' name='ipn' value='' placeholder='IP of New PC'>";
                            }
                            else {
                                echo "no results";
                            }
                            $conn->close();
                            ?>
                        </div>
                        <div class="col-md-4">
                            <label for="input03">Delete</label><br>
                            <?php

                            //Sourced from: https://www.w3schools.com/php/php_mysql_select.asp
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT cli_id, cli_hostname FROM client";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<input type='hidden' name='cliID' value='{$row["cli_id"]}'>";
                                    echo "<button type='submit' class='btn btn-danger' name='delBtn' value='{$row["cli_hostname"]}'>Delete</button>";
                                }
                            }
                            else {
                                echo "no results";
                            }
                            $conn->close();
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="form-actions">
                        <button type="submit" name="action" value="updateProfile" class="btn btn-primary mt-3">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Profile Settings</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="input01">First Name</label>
                                <input type="text" class="form-control" id="input01" value="" placeholder="first name" required> 
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="input02">Last Name</label>
                                <input type="text" class="form-control" id="input02" value="" placeholder="last name" required> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input03">Email</label>
                            <input type="email" class="form-control" id="input03" value="" placeholder="email address" required> 
                        </div>
                        <div class="form-group">
                            <label for="input04">New Password</label>
                            <input type="password" class="form-control" id="input04" value="" placeholder="new password" required> 
                        </div>
                        <div class="form-group">
                            <label for="input05">Username</label>
                            <input type="text" class="form-control" id="input05" value="" placeholder="username" required>
                        </div>
                        <hr>
                        <div class="form-actions">
                            <input type="password" class="form-control" id="input06" placeholder="Enter Current Password" required>
                            <button type="submit" name="action" value="updateProfile" class="btn btn-primary mt-3">Update Account</button>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/jquery-migrate-3.0.0.min.js"></script>
    <script src="../assets/js/jquery.backstretch.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/Chart.bundle.js"></script>
    <script src="../assets/js/sideNavbar.js"></script>
    <script src="../assets/js/overviewDoughnutChart.js"></script>
    <script src="../assets/js/memoryBarChart.js"></script>
    <script src="../assets/js/diskBarChart.js"></script>
    <script src="../assets/js/coresBarChart.js"></script>
    <script src="../assets/js/networkTable.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    
</body>
</html>
