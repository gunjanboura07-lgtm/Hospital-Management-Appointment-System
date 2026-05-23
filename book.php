<?php

include 'config.php';

require_once('fpdf/fpdf.php');  // FIX: prevents "class already in use" error

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// ========================
// GET FORM DATA
// ========================
$name   = $_POST['name'];
$email  = $_POST['email'];
$phone  = $_POST['phone'];
$doctor = $_POST['doctor'];
$date   = $_POST['date'];


// ========================
// SAVE TO DATABASE
// ========================
$sql = "INSERT INTO appointments 
(name, email, phone, doctor, appointment_date)
VALUES 
('$name', '$email', '$phone', '$doctor', '$date')";

mysqli_query($conn, $sql);


// ========================
// CREATE PDF (APPOINTMENT SLIP)
// ========================
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(190, 10, 'CityCare Hospital', 0, 1, 'C');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 14);

$pdf->Cell(100, 10, "Patient Name: $name", 0, 1);
$pdf->Cell(100, 10, "Email: $email", 0, 1);
$pdf->Cell(100, 10, "Phone: $phone", 0, 1);
$pdf->Cell(100, 10, "Doctor: $doctor", 0, 1);
$pdf->Cell(100, 10, "Appointment Date: $date", 0, 1);

$pdf->Ln(10);

$pdf->Cell(100, 10, "Please arrive 15 minutes early.", 0, 1);


// SAVE PDF FILE
$pdfFile = "pdf/appointment_" . time() . ".pdf";
$pdf->Output('F', $pdfFile);


// ========================
// SEND EMAIL WITH PDF
// ========================
$mail = new PHPMailer(true);

try {

    // SMTP SETTINGS
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gunjanboura07@gmail.com';       // CHANGE
    $mail->Password = 'xvkv mroh eqsg rijr';         // CHANGE
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // EMAIL DETAILS
    $mail->setFrom('yourgmail@gmail.com', 'CityCare Hospital');
    $mail->addAddress($email);

    $mail->Subject = "Appointment Confirmation";
    $mail->Body    = "Your appointment is confirmed. Please find attached PDF.";

    // ATTACH PDF
    $mail->addAttachment($pdfFile);

    $mail->send();

    echo "
    <script>
        alert('Appointment Booked Successfully & Email Sent');
        window.location.href = 'index.html';
    </script>
    ";

} catch (Exception $e) {

    echo "Mail Error: " . $mail->ErrorInfo;
}

?>