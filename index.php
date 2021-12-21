<!DOCTYPE html>
<html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cilag IT Tasks</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-weight: bold;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: rgb(81,141,198);">
        <div class="container-fluid"><a class="navbar-brand" href="#">Cilag IT - Tasks</a>
            <div class="collapse navbar-collapse text-center" id="navcol-1"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="dropdown d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center"
                    style="width: 139px;height: 40px;padding: 8px 18px;color: rgb(0,0,0);"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(0,0,0);">Tasks</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item disabled" role="presentation" href="index.php" style="background-color: #e3e3e3;">Tasks - Open</a><a class="dropdown-item" role="presentation" href="tasks_closed.php">Tasks - Closed</a></div>
                </div><a href="decommission.php" style="color: rgb(0,0,0);">Decommission</a>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"></li>
                </ul><a href="logout.php"><button class="btn btn-primary border rounded border-dark" type="button" style="background-color: rgb(0,0,0);">Log out</button></a></div>
        </div>
    </nav>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr style="background-color: #b5dbff;">
                    <th>Task Nr.</th>
                    <th>RITM Nr.</th>
                    <th>CHG Nr.</th>
                    <th>CI</th>
                    <th>GxP</th>
                    <th>Task Requester</th>
                    <th>Task Status</th>
                    <th>Description</th>
                    <th>Responsible</th>
                    <th style="width: 201px;">Location</th>
                </tr>
            </thead>
            <tbody><form action="submit_open.php" method="POST">
                <tr>
                    <td style="font-weight: bold;">TASK000021564459</td>
                    <td>RITM000019418666</td>
                    <td>CHG000010782114</td>
                    <td>WCILCHS4MS5605</td>
                    <td>Yes</td>
                    <td>Valdet Murtaj</td>
                    <td><select><optgroup label="Status"><option value="12" selected="">WIP</option><option value="13">Pending</option><option value="14">Closed</option><option value="15">Canceled</option></optgroup></select></td>
                    <td>Take image</td>
                    <td>mrahm</td>
                    <td>78.03.18</td>
                </tr>
                <tr>
                    <td><input type="text" name="inputTask"></td>
                    <td><input type="text" name="inputRITM"></td>
                    <td><input type="text" name="inputCHG"></td>
                    <td><input type="text" name="inputCI"></td>
                    <td><select name="inputGxP"><optgroup label="GxP"><option value="1" selected="">Yes</option><option value="2">No</option></optgroup></select></td>
                    <td><input type="text" name="inputRequester"></td>
                    <td><select name="inputStatus"><optgroup label="Status"><option value="1" selected="">WIP</option><option value="2">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td>
                    <td><input type="text" name="inputDescription"></td>
                    <td><select name="inputResponsible"><optgroup label="Person"><option value="2" selected="">kwinzel1</option><option value="3">nwindler</option><option value="1">mrahm</option></optgroup></select></td>
                    <td><input type="text" name="inputLocation"></td>
                </tr>
                <tr></tr>
            </tbody>
        </table>
    </div>
    <div class="d-xl-flex justify-content-xl-end"><button class="btn btn-primary border rounded border-dark d-xl-flex" type="button" style="margin: 20px;background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Add new row</button><button class="btn btn-primary border rounded border-dark d-xl-flex"
            type="submit" style="margin: 20px;background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Submit</button></div>
    <script src="assets/js/jquery.min.js"></script></form>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>