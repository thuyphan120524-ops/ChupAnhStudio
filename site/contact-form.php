<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json; charset=UTF-8');

const ADMIN_EMAIL = 'thuylieupham256@gmail.com';
const SITE_FROM   = 'thuylieupham256@gmail.com';
const SITE_NAME   = 'Website - Yêu cầu tư vấn';


$fullname = trim($_POST['fullname'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$email    = trim($_POST['email'] ?? '');
$service  = trim($_POST['service'] ?? '');
$message  = trim($_POST['message'] ?? '');

if ($fullname === '' || $phone === '') {
    echo json_encode(['success' => false, 'message' => 'Vui lòng nhập Họ tên và SĐT.']);
    exit;
}

$subject = '[Website] Liên hệ tư vấn – ' . $fullname;
$html = "<h2>Thông tin liên hệ tư vấn</h2>
<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse'>
  <tr><td><b>Họ tên</b></td><td>".htmlspecialchars($fullname)."</td></tr>
  <tr><td><b>SĐT</b></td><td>".htmlspecialchars($phone)."</td></tr>
  <tr><td><b>Email</b></td><td>".htmlspecialchars($email)."</td></tr>
  <tr><td><b>Dịch vụ</b></td><td>".htmlspecialchars($service)."</td></tr>
  <tr><td><b>Ghi chú</b></td><td>".nl2br(htmlspecialchars($message))."</td></tr>
  <tr><td><b>Thời gian</b></td><td>".date('Y-m-d H:i:s')."</td></tr>
</table>";

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = SITE_FROM;
    $mail->Password   = 'vlehbtkhlyausfei';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom(SITE_FROM, SITE_NAME);
    $mail->addAddress(ADMIN_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail->addReplyTo($email, $fullname);
    }

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $html;

    $mail->send();
    echo json_encode(['success' => true, 'message' => 'Cảm ơn bạn! Yêu cầu đã được gửi.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Không gửi được email.', 'debug' => $mail->ErrorInfo]);
}
