<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/main.js"></script>
<?php
include("dbconnect.php");
$data = [
    'tasknr' => "RowTaskNr",
    'stat' => $_POST['updatestatus'],
    ];
    $sql1 = "UPDATE TABLE tbltasks
    SET fkStatus = :stat WHERE fldTaskNr = :tasknr";
    $stmt1 = $connection->prepare($sql1);
    if ($stmt1->execute($data)){
    echo '<p class="success">Records updated successfully!</p><style>p {font-weight:bold; font-size:20px;}</style>';
    echo '<script type="text/javascript">setTimeout(function () {
            window.location.href = "index.php";}, 2000);</script>';
        }
?>