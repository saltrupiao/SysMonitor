
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#logTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

    <style>
        body {
            background-color:#3d3d3d;
        }
    </style>


</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <h1 class="text-center" style="color:white">System Log Management Portal</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <input id="myInput" type="text" placeholder="Search...">
        </div>
        <div class="col-sm float-right">
            <form method="get" action="../controller/compress.php">
                <input type="submit" class="float-right" value="Compress Logs">
            </form>
        </div>
    </div>
    <table class="table table-striped table-secondary">
        <thead>
        <tr>
            <th scope="col">File Name</th>
            <th scope="col">Last Modified</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody id="logTable">
        <?php
        $dir = "/usr/local/share/sysInfo/";
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                echo "<tr><td>";
                if (is_dir($file)) {
                    echo "<b><a href='/logs/$file' target='_blank'>$file</a></b>";
                } else{
                    echo "<a href='/logs/$file' target='_blank'>$file</a>";
                }
                echo "</td><td>";
                echo date("F d Y H:i:s", filemtime("$dir$file"));
                echo "</td>";
                echo "<form method='get' action='../controller/delete.php'>";
                echo "<td><input type='hidden' name='getFileName' value='$file'>";
                echo "<button class='btn btn-danger' type='submit'>Delete</button></td>";
                echo "</form>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm">
            <a class="btn btn-light" href="dashboard.php" role="button" target="_blank"> <-- Return to Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>