<?php
session_start();

$status = 'fail';
$code   = $_GET['vnp_ResponseCode'] ?? '';
if ( $code === '00') $status = 'success';
?>
<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8" />
<title>Kết quả thanh toán</title>
<style>
  body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;
       margin:0;display:flex;align-items:center;justify-content:center;height:100vh;background:#f6f8fa}
  .card{background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:24px;box-shadow:0 6px 20px rgba(0,0,0,.06);text-align:center;max-width:420px}
  .ok{color:#16a34a}.fail{color:#dc2626}
</style>
</head>
<body>
  <div class="card">
    <?php if ($status==='success'): ?>
      <h2 class="ok">✅ Thanh toán thành công vui lòng đặt lịch</h2>
      <p>Mã phản hồi: 00</p>
      <p>Cửa sổ sẽ tự đóng sau 3s...</p>
    <?php else: ?>
      <h2 class="fail">❌ Thanh toán không thành công</h2>
      <p>Mã phản hồi: <?= htmlspecialchars($code ?: '--') ?></p>
      <p>Cửa sổ sẽ tự đóng...</p>
    <?php endif; ?>
  </div>

<script>
// Gửi tín hiệu về trang mở popup (nếu có)
try {
  if (window.opener) {
    window.opener.postMessage({
      type: 'VNPAY_RESULT',
      status: '<?= $status ?>',
      code:   '<?= $code ?>'
    }, '*'); // khi deploy thật, nên thay '*' bằng origin của bạn
  }
} catch(e) {}

// Đóng cửa sổ sau 5s (trình duyệt chỉ cho đóng nếu cửa sổ do script mở)
setTimeout(function(){ window.close(); }, 3000);
</script>
</body>
</html>
