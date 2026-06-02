<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Cấu hình tài khoản VNPAY
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/ChupAnhStudio/site/vnpay_return.php";
$vnp_TmnCode = "44HSQHSP"; // Mã website tại VNPAY
$vnp_HashSecret = "F0EDRCHEZW6MJ3H9QJO36K8LMI0V1SU1"; // Chuỗi bí mật

// Nhận dữ liệu tổng tiền từ yêu cầu (GET hoặc POST)
$data['total'] = isset($_GET['amount']) ? intval($_GET['amount']) : 0;

// Tạo thông tin đơn hàng
$vnp_TxnRef = mt_rand(100000, 999999); // Mã đơn hàng
$vnp_OrderInfo = 'Thanh toán đơn hàng';
$vnp_OrderType = 'billpayment';
$vnp_Amount = $data['total'] * 100; // Nhân 100 vì VNPAY yêu cầu đơn vị là VND * 100
$vnp_Locale = 'vn';
$vnp_BankCode = '';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

// Tạo mảng dữ liệu gửi đi
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
);

// Thêm mã ngân hàng nếu có
if (!empty($vnp_BankCode)) {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

// Sắp xếp mảng
ksort($inputData);
$hashdata = "";
$query = "";
$i = 0;

foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

// Tạo chuỗi hash
$vnp_SecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

// Tạo URL thanh toán
$vnp_Url = $vnp_Url . "?" . $query . "vnp_SecureHash=" . $vnp_SecureHash;

// Nếu được gọi bằng form với nút submit
if (isset($_GET['redirect'])) {
    header('Location: ' . $vnp_Url);
    exit;
} else {
    // Trả về JSON nếu không redirect
    $returnData = array(
        'code' => '00',
        'message' => 'success',
        'data' => $vnp_Url
    );
    header('Content-Type: application/json');
    echo json_encode($returnData);
}
?>