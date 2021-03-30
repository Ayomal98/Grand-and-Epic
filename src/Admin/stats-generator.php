<?php
include('../../config/vendor/autoload.php');

include("../../config/connection.php");
if (isset($_POST['print'])) {
    echo '<script>alert("Hii")</script>';
    $html = '';
    $html .= '<p>Thank you for trusting us on Selecting as us your holiday destination.We are Looking Forward to having you Again & hopefully you did aslo have great time here.Given below are the brief payment details which you have made. </p>';
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output("mystats.pdf", 'D');
}
