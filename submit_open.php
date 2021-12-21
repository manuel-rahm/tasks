<?php
include("dbconnect.php");


if( !isset($_POST['inputTask'], $_POST['inputRITM']) ) {
    exit("Please fill in Task and RITM number");
    echo '<script type="text/javascript">setTimeout(function () {
         window.location.href = "index.php";}, 2000);</script>';
} else {
        $data = [
        'tasknr' => $_POST['inputTask'],
        'ritmnr' => $_POST['inputRITM'],
        'chgnr' => $_POST['inputCHG'],
        'gxp' => $_POST['inputGxP'],
       // 'requester' => $_POST['inputRequester'],
        'stat' => $_POST['inputStatus'],
        'descr' => $_POST['inputDescription'],
        'responsible' => $_POST['inputResponsible'],
       // 'location' => $_POST['inputLocation'],
        ];
        $ci = [
        'ci' => $_POST['inputCI'],
        'ci2'=> $_POST['inputCI'],
        ];
                $sql = "INSERT INTO tbltasks (fldTaskNr, fldRITMNr, fldCHGNr, fkGxP, fkStatus, fldDescription, fkResponsible)
                VALUES (:tasknr, :ritmnr, :chgnr, :gxp, :stat, :descr, :responsible)";
                $stmt = $connection->prepare($sql);

               // $sql1 = "INSERT INTO tblci (fldci)
               // VALUES (:ci)";
                //$stmt1 = $connection->prepare($sql1);
                //SELECT * FROM `tblci` WHERE fldci = :ci2 LIMIT 1
                $sql1 = "INSERT INTO tblci (fldci) 
                VALUES (:ci)";
                $stmt1 = $connection->prepare($sql1);
                $stmt1->execute($ci);

        if ($stmt->execute($data)) {
                echo "New record created successfully!";
                echo '<script type="text/javascript">setTimeout(function () {
                        window.location.href = "index.php";}, 2000);</script>';
        } else {
                echo "New record wasn't created, please fill in all fields!";
               // echo '<script type="text/javascript">setTimeout(function () {
               //         window.location.href = "index.php";}, 2000);</script>';
        }

        
} 

?>