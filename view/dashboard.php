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
<body>
    
<!---------------------------------------------------
    SIDEBAR
----------------------------------------------------->
    
    <div class="wrapper">
        
        <!-- Sidebar  -->
        <nav id="sidebar" class="bg-dark">
            <div class="sidebar-header text-center">
                <img src="../assets/img/backgrounds/dashboard.svg" alt="usrImg" style="width: 30%; height: 30%;">
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
            
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
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
                <div class="card-deck">
                    <div class="card bg-primary">
                        <div class="card-body text-center">
                            <p class="card-text">CLIENTS(#)</p>
                            <p class="card-text">CLIENTS(#)</p>
                            <p class="card-text">CLIENTS(#)</p>
                            <p class="card-text">CLIENTS(#)</p>
                        </div>
                    </div>
                    <div class="card bg-warning">
                        <div class="card-body text-center">
                            <p class="card-text">CPU</p>
                        </div>
                    </div>
                    <div class="card bg-success">
                        <div class="card-body text-center">
                            <p class="card-text">MEMORY</p>
                        </div>
                    </div>
                    <div class="card bg-danger">
                        <div class="card-body text-center">
                            <p class="card-text">NETWORK</p>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="line"></div>

            <div class="container-fluid">
                <h2>CPU</h2>
                <div id="cpuAccordion">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#cpuCollapseOne">
                                Cores
                            </a>
                        </div>
                        <div id="cpuCollapseOne" class="collapse show" data-parent="#cpuAccordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#cpuCollapseTwo">
                                Disk
                            </a>
                        </div>
                        <div id="cpuCollapseTwo" class="collapse" data-parent="#cpuAccordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
                            <a class="card-link" data-toggle="collapse" href="#memCollapseOne">
                                Summary
                            </a>
                        </div>
                        <div id="memCollapseOne" class="collapse show" data-parent="#memAccordion">
                            <canvas id="myChart" width="400" height="150"></canvas>
                            
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
                            <a class="card-link" data-toggle="collapse" href="#netCollapseOne">
                                Addresses
                            </a>
                        </div>
                        <div id="netCollapseOne" class="collapse show" data-parent="#netAccordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#netCollapseTwo">
                                Interfaces
                            </a>
                        </div>
                        <div id="netCollapseTwo" class="collapse" data-parent="#netAccordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="card card-fluid">
                      <h6 class="card-header"> Account </h6>
                      <!-- .card-body -->
                      <div class="card-body">
                        <!-- form -->
                        <form method="post">
                          <!-- form row -->
                          <div class="form-row">
                            <!-- form column -->
                            <div class="col-md-6 mb-3">
                              <label for="input01">First Name</label>
                              <input type="text" class="form-control" id="input01" value="Beni" required=""> </div>
                            <!-- /form column -->
                            <!-- form column -->
                            <div class="col-md-6 mb-3">
                              <label for="input02">Last Name</label>
                              <input type="text" class="form-control" id="input02" value="Arisandi" required=""> </div>
                            <!-- /form column -->
                          </div>
                          <!-- /form row -->
                          <!-- .form-group -->
                          <div class="form-group">
                            <label for="input03">Email</label>
                            <input type="email" class="form-control" id="input03" value="bent10@looper.com" required=""> </div>
                          <!-- /.form-group -->
                          <!-- .form-group -->
                          <div class="form-group">
                            <label for="input04">New Password</label>
                            <input type="password" class="form-control" id="input04" value="secret" required=""> </div>
                          <!-- /.form-group -->
                          <!-- .form-group -->
                          <div class="form-group">
                            <label for="input05">Username</label>
                            <input type="text" class="form-control" id="input05" value="bent10" required="">
                            <small class="text-muted">Dolores reiciendis, eos accusamus nobis at omnis consequuntur culpa tempore saepe animi.</small>
                          </div>
                          <!-- /.form-group -->
                          <hr>
                          <!-- .form-actions -->
                          <div class="form-actions">
                            <!-- enable submit btn when user type their current password -->
                            <input type="password" class="form-control ml-auto mr-3" id="input06" placeholder="Enter Current Password" required="">
                            <button type="submit" class="btn btn-primary" disabled="">Update Account</button>
                          </div>
                          <!-- /.form-actions -->
                        </form>
                        <!-- /form -->
                      </div>
                      <!-- /.card-body -->
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
    <script src="../assets/js/dashboardScripts.js"></script>
    <script src="../assets/js/dynamic-graph.js"></script>
    

    
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    
    
</body>
</html>
