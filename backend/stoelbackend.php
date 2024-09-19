<?php
include('./db/db_connect.php');

$z_id = 2;

$sqli_stoel = $con->prepare("SELECT koppel_z_s.id, stoelen.stoel_Nr FROM koppel_z_s
INNER JOIN stoelen on stoelen.id = koppel_z_s.s_id
 WHERE z_id = ?");
$sqli_stoel->bind_param("i", $z_id);

if ($sqli_stoel == false) {
    echo mysqli_error($con);
} else {
    if ($sqli_stoel->execute()) {
        $sqli_stoel->bind_result($id, $stoel_Nr);
        while ($sqli_stoel->fetch()) {
            echo $id . "<br>";
            echo $stoel_Nr . "<br>";
        }
        $sqli_stoel->close();
    }
}

$con->close();
