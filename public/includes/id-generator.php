<?php
include('../../config/connection.php');
function getID($tableName, $prefix)
{
    include('../../config/connection.php');
    $count = mysqli_query($con, 'SELECT COUNT(*) AS NumberOfData FROM ' . $tableName . '');
    $row = mysqli_fetch_assoc($count);
    $num = $row['NumberOfData'];
    ++$num;
    $len = strlen($num);
    for ($i = $len; $i < 4; ++$i) {
        $num = '0' . $num;
    }
    return $prefix . $num;
}
