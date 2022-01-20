<!DOCTYPE html>
<html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
include("dbconnect.php");
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cilag IT Tasks closed</title>
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
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="index.php">Tasks - Open</a><a class="dropdown-item disabled" role="presentation" href="tasks_closed.php" style="background-color: #e3e3e3;">Tasks - Closed</a></div>
                </div><a href="decommission.php" style="color: rgb(0,0,0);">Decommission</a>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"></li>
                    <p class="greeting" style="margin: auto; margin-right: 20px;">Greetings <?php echo  $_SESSION['username']?></p>
                </ul><a href="logout.php"><button class="btn btn-primary border rounded border-dark" type="button" style="background-color: rgb(0,0,0);" href="logout.php">Log out</button></a></div>
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
            <tbody>
                <?php
                        $data = "SELECT tbltasks.fldTaskNr AS 'TASK_NR'
                        ,tbltasks.fldRITMNr AS 'RITMNR'
                        ,tbltasks.fldCHGNr AS 'CHGNR'
                        ,tblci.fldCI AS 'FLDCI'
                        ,tblgxp.fldGxP AS 'GXP'
                        ,tblrequester.fldRequester AS 'REQUESTER'
                        ,tblstatus.fldStatus AS 'FLD_STATUS'
                        ,tbltasks.fldDescription AS 'FLD_DESCRIPTION'
                        ,tblresponsible.fldResponsible AS 'RESPONSIBLE'
                        ,tbllocation.fldLocation AS 'LOCATION' FROM tbltasks
                    LEFT JOIN tblCI ON tblci.pkCI = tbltasks.fkCI
                    LEFT JOIN tblgxp ON tblgxp.pkGxP = tbltasks.fkGxP
                    LEFT JOIN tblrequester ON tblrequester.pkRequester = tbltasks.fkRequester
                    LEFT JOIN tblstatus ON tblstatus.pkStatus = tbltasks.fkStatus
                    LEFT JOIN tblresponsible ON tblresponsible.pkResponsible = tbltasks.fkResponsible
                    LEFT JOIN tbllocation ON tbllocation.pkLocation = tbltasks.fkLocation";
                    
                    foreach ($connection->query($data) as $row) {
                        if ($row['FLD_STATUS'] == "Closed" || $row['FLD_STATUS'] == "Canceled")
                        {
                        echo '<tr>';
                        echo '<td>'.$row['TASK_NR'].'</td>';
                        echo '<td>'.$row['RITMNR'].'</td>';
                        echo '<td>'.$row['CHGNR'].'</td>';
                        echo '<td>'.$row['FLDCI'].'</td>';
                        if ($row['GXP'] == 1){
                            echo '<td>Yes</td>'; 
                        } else { 
                            echo '<td>No</td>';
                        }
                        echo '<td>'.$row['REQUESTER'].'</td>';
                        echo '<td>'.$row['FLD_STATUS'].'</td>';
                        echo '<td>'.$row['FLD_DESCRIPTION'].'</td>';
                        echo '<td>'.$row['RESPONSIBLE'].'</td>';
                        echo '<td style="width: 201px;">'.$row['LOCATION'].'</td>';
                        echo '</tr>';
                    }
                    else {}
                    } 

                    ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="d-xl-flex justify-content-xl-end"><button class="btn btn-primary border rounded border-dark d-xl-flex" type="button" style="margin: 20px;background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Submit</button></div> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>