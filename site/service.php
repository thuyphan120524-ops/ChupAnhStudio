<?php
// Tự động tìm ID loại dịch vụ đầu tiên và chuyển hướng đến trang danh sách dịch vụ thuộc loại đó
$types = list_all_type();
$first_type_id = !empty($types) ? $types[0]['id'] : 0;

if ($first_type_id > 0) {
    header("Location: " . ROOT . "?page=service-list&id=" . $first_type_id);
    exit;
} else {
    // Fallback if no types exist
    ?>
    <div class="bradcam_area breadcam_bg overlay">
        <h3>Dịch vụ</h3>
    </div>
    <div class="container text-center py-5">
        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
        <h3 class="text-muted">Chưa có loại dịch vụ nào được cấu hình trên hệ thống</h3>
        <a href="<?= ROOT ?>" class="btn btn-warning mt-3 text-dark">Quay lại trang chủ</a>
    </div>
    <?php
}
?>
