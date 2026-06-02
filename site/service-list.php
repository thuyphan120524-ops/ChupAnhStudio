<?php 
if(isset($_GET['id'])){
    $type_id = $_GET['id'];
    $service = service_list_cate($type_id);
    $i = 0;
    $length = count($service);
    $current_type = list_one_type('id', $type_id);
}
?>

<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay">
    <h3><?= isset($current_type['name']) ? htmlspecialchars($current_type['name']) : 'Dịch vụ' ?></h3>
</div>
<!-- bradcam_area_end -->

<style>
/* ========== SERVICE DETAIL LAYOUT ========== */
.service-page-wrap { background: #fafafa; padding: 50px 0 70px; }

/* Sidebar nav */
.service-nav .nav-link {
    display: flex; align-items: center; gap: 10px;
    padding: 12px 18px; margin-bottom: 6px;
    border-radius: 8px; color: #444;
    font-weight: 500; font-size: 14px;
    border: 1px solid #eee;
    background: #fff;
    transition: all 0.25s ease;
}
.service-nav .nav-link:hover,
.service-nav .nav-link.active {
    background: #4A3600;
    color: #fff;
    border-color: #4A3600;
    box-shadow: 0 4px 12px rgba(74,54,0,0.2);
}
.service-nav .nav-link img {
    width: 36px; height: 36px; border-radius: 50%;
    object-fit: cover; flex-shrink: 0;
    border: 2px solid rgba(255,255,255,0.3);
}

/* Info table */
.service-info-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 20px rgba(0,0,0,0.06);
    overflow: hidden;
    margin-bottom: 36px;
}
.service-info-card .card-heading {
    padding: 20px 28px;
    border-bottom: 1px solid #f0f0f0;
    display: flex; align-items: center; gap: 16px;
}
.service-info-card .card-heading h2 {
    font-size: 22px; font-weight: 700;
    color: #2c1e00; margin: 0;
}
.service-info-card .service-avatar {
    width: 72px; height: 72px; border-radius: 12px;
    object-fit: cover;
    border: 3px solid #f0e8d0;
    flex-shrink: 0;
}

/* Info rows */
.service-info-table { width: 100%; }
.service-info-table tr {
    border-bottom: 1px solid #f5f5f5;
}
.service-info-table tr:last-child { border-bottom: none; }
.service-info-table td {
    padding: 16px 28px; vertical-align: top;
    font-size: 14.5px;
}
.service-info-table .label-col {
    font-weight: 700; color: #2c1e00;
    white-space: nowrap; width: 160px;
}
.service-info-table .value-col { color: #333; }
.price-highlight {
    font-size: 20px; font-weight: 700;
    color: #2c1e00;
}
.price-highlight .sale-badge {
    display: inline-block;
    background: #e74c3c; color: #fff;
    font-size: 11px; font-weight: 700;
    padding: 2px 7px; border-radius: 20px;
    margin-left: 8px; vertical-align: middle;
}
.price-old { text-decoration: line-through; color: #999; font-size: 14px; margin-left: 6px; }

/* Contact row */
.contact-icons { display: flex; gap: 24px; flex-wrap: wrap; }
.contact-icons .ci-item {
    display: flex; align-items: center; gap: 8px;
    color: #333; font-size: 14px;
}
.contact-icons .ci-item i { color: #4A3600; font-size: 18px; }
.contact-icons .ci-item strong { display: block; font-size: 15px; color: #2c1e00; }
.contact-icons .ci-item span { font-size: 12px; color: #888; }

/* Gallery grid */
.service-gallery-section { margin-top: 10px; }
.service-gallery-section h4 {
    font-size: 18px; font-weight: 700;
    color: #2c1e00; margin-bottom: 20px;
    display: flex; align-items: center; gap: 8px;
}
.service-gallery-section h4::after {
    content: ''; flex: 1; height: 2px;
    background: linear-gradient(to right, #c9a84c, transparent);
}
.service-gallery-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}
.gallery-grid-item {
    position: relative; overflow: hidden;
    border-radius: 8px; cursor: pointer;
    aspect-ratio: 3/4;
    background: #eee;
}
.gallery-grid-item img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
    display: block;
}
.gallery-grid-item:hover img { transform: scale(1.06); }
.gallery-grid-item .hover-overlay {
    position: absolute; inset: 0;
    background: rgba(0,0,0,0.35);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity 0.3s;
}
.gallery-grid-item:hover .hover-overlay { opacity: 1; }
.gallery-grid-item .hover-overlay i {
    color: #fff; font-size: 28px;
    width: 52px; height: 52px;
    border: 2px solid #fff; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
}
/* Avatar item (larger, spans 2 rows) */
.gallery-grid-item.avatar-item {
    aspect-ratio: auto;
    grid-row: span 2;
}
.gallery-grid-item.avatar-item img {
    height: 100%;
}

.empty-gallery {
    grid-column: 1/-1;
    text-align: center; padding: 40px;
    color: #aaa; font-size: 14px;
}

@media (max-width: 991px) {
    .service-gallery-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 767px) {
    .service-gallery-grid { grid-template-columns: repeat(2, 1fr); }
    .service-info-table .label-col { width: 110px; }
}
@media (max-width: 480px) {
    .service-gallery-grid { grid-template-columns: repeat(2, 1fr); }
}
</style>

<section class="service-page-wrap">
    <div class="container">
        <?php if(empty($service)): ?>
            <!-- Hộp thông báo khi chưa có dịch vụ nào trong mục này -->
            <div class="row justify-content-center">
                <div class="col-md-8 text-center py-5">
                    <div class="p-5 rounded bg-white shadow-sm border" style="border-radius: 16px !important;">
                        <i class="fas fa-camera fa-4x mb-3" style="color: #4A3600; opacity: 0.85;"></i>
                        <h3 class="font-weight-bold mb-3" style="color: #2c1e00; font-family: 'Outfit', sans-serif;">
                            Chưa có gói dịch vụ
                        </h3>
                        <p class="text-muted" style="font-size: 15px; line-height: 1.6;">
                            Danh mục <strong>"<?= htmlspecialchars($current_type['name'] ?? 'này') ?>"</strong> hiện tại chưa được đăng tải gói chụp nào trên hệ thống. 
                            Studio đang chuẩn bị cập nhật các concept chụp độc quyền mới nhất. Vui lòng quay lại sau hoặc liên hệ Hotline để được hỗ trợ báo giá nhanh!
                        </p>
                        <hr class="my-4" style="border-top: 1px dashed #ddd;">
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="<?= ROOT ?>" class="boxed-btn3 m-1">
                                <i class="fas fa-home mr-1"></i> Quay lại Trang chủ
                            </a>
                            <a href="<?= ROOT ?>?page=contact" class="boxed-btn3 bg-dark text-white m-1 border-dark">
                                <i class="fas fa-phone-alt mr-1"></i> Liên hệ Hotline
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <!-- Sidebar: danh sách dịch vụ -->
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="service-nav">
                        <div class="nav flex-column nav-pills" id="service-tab" role="tablist">
                            <?php $i = 0; foreach($service as $s): ?>
                                <a class="nav-link <?= ($i == 0) ? 'active' : '' ?>"
                                   id="tab-<?= $s['id'] ?>"
                                   data-toggle="pill"
                                   href="#panel-<?= $s['id'] ?>"
                                   role="tab">
                                    <img src="images/products/<?= $s['images'] ?>"
                                         alt="<?= htmlspecialchars($s['name']) ?>">
                                    <?= htmlspecialchars($s['name']) ?>
                                </a>
                            <?php $i++; endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content" id="service-tabContent">
                        <?php $i = 0; foreach($service as $s):
                            // Tính giá sau giảm
                            $price_final = $s['price'] - ($s['price'] * $s['sale']);
                            // Lấy gallery ảnh của dịch vụ
                            $gallery_photos = function_exists('service_gallery_get') ? service_gallery_get($s['id']) : [];
                        ?>
                        <div class="tab-pane fade <?= ($i == 0) ? 'show active' : '' ?>"
                             id="panel-<?= $s['id'] ?>"
                             role="tabpanel">

                            <!-- Card thông tin chi tiết -->
                            <div class="service-info-card">
                                <!-- Header: tên + avatar -->
                                <div class="card-heading">
                                    <img src="images/products/<?= $s['images'] ?>"
                                         alt="<?= htmlspecialchars($s['name']) ?>"
                                         class="service-avatar">
                                    <div>
                                        <h2><?= htmlspecialchars($s['name']) ?></h2>
                                        <span class="badge badge-warning text-dark">
                                            <?= isset($s['name_type']) ? htmlspecialchars($s['name_type']) : 'Dịch vụ chụp ảnh' ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- Bảng thông tin -->
                                <table class="service-info-table">
                                    <!-- Giá gói -->
                                    <tr>
                                        <td class="label-col">Giá gói</td>
                                        <td class="value-col">
                                            <span class="price-highlight">
                                                <?= number_format($price_final, 0, ',', '.') ?>đ
                                                <?php if($s['sale'] > 0): ?>
                                                    <span class="sale-badge">-<?= ($s['sale']*100) ?>%</span>
                                                <?php endif; ?>
                                            </span>
                                            <?php if($s['sale'] > 0): ?>
                                                <span class="price-old"><?= number_format($s['price'], 0, ',', '.') ?>đ</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <!-- Thời gian -->
                                    <tr>
                                        <td class="label-col">Thời gian</td>
                                        <td class="value-col">
                                            <i class="far fa-clock text-warning mr-1"></i>
                                            <?= date('H\h i\p', strtotime($s['time'])) ?> dự kiến
                                        </td>
                                    </tr>

                                    <!-- Mô tả / Chi tiết -->
                                    <tr>
                                        <td class="label-col">Mô tả dịch vụ</td>
                                        <td class="value-col"><?= $s['detail'] ?></td>
                                    </tr>

                                    <!-- Liên hệ -->
                                    <tr>
                                        <td class="label-col">Liên hệ</td>
                                        <td class="value-col">
                                            <div class="contact-icons">
                                                <div class="ci-item">
                                                    <i class="fas fa-phone-alt"></i>
                                                    <div>
                                                        <span>Hotline</span>
                                                        <strong>0784 788 768</strong>
                                                    </div>
                                                </div>
                                                <div class="ci-item">
                                                    <i class="fab fa-facebook"></i>
                                                    <div>
                                                        <span>Facebook</span>
                                                        <strong>
                                                            <a href="https://facebook.com/chupanhstudio" target="_blank" class="text-dark">
                                                                DakeStudio
                                                            </a>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Nút đặt lịch -->
                            <div class="mb-4">
                                <a href="#test-form" class="boxed-btn3 popup-with-form mr-2">
                                    <i class="far fa-calendar-check mr-1"></i> Đặt lịch ngay
                                </a>
                            </div>

                            <!-- Gallery ảnh dịch vụ -->
                            <div class="service-gallery-section">
                                <h4>
                                    <i class="fas fa-images mr-2" style="color:#c9a84c"></i>
                                    Hình ảnh dịch vụ
                                </h4>
                                <div class="service-gallery-grid" id="gallery-<?= $s['id'] ?>">
                                    <!-- Avatar dịch vụ luôn là ảnh đầu tiên -->
                                    <div class="gallery-grid-item avatar-item"
                                         data-gallery-id="<?= $s['id'] ?>"
                                         data-src="images/products/<?= $s['images'] ?>">
                                        <img src="images/products/<?= $s['images'] ?>"
                                             alt="<?= htmlspecialchars($s['name']) ?>">
                                        <div class="hover-overlay">
                                            <i class="ti-zoom-in"></i>
                                        </div>
                                    </div>

                                    <?php if(!empty($gallery_photos)): ?>
                                        <?php foreach($gallery_photos as $gp): ?>
                                            <div class="gallery-grid-item"
                                                 data-gallery-id="<?= $s['id'] ?>"
                                                 data-src="images/services/<?= $gp['images'] ?>">
                                                <img src="images/services/<?= $gp['images'] ?>"
                                                     alt="<?= htmlspecialchars($gp['title'] ?? $s['name']) ?>">
                                                <div class="hover-overlay">
                                                    <i class="ti-zoom-in"></i>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="empty-gallery">
                                            <i class="fas fa-camera fa-2x mb-2 d-block"></i>
                                            Chưa có ảnh minh họa cho dịch vụ này
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Magnific Popup for gallery lightbox -->
<script>
jQuery(document).ready(function($) {
    // Build gallery items per service when clicked
    $(document).on('click', '.gallery-grid-item', function(e) {
        e.preventDefault();
        var galleryId = $(this).data('gallery-id');
        var clickedSrc = $(this).data('src');

        var items = [];
        $('[data-gallery-id="' + galleryId + '"]').each(function() {
            items.push({ src: $(this).data('src') });
        });

        var startIndex = 0;
        for (var i = 0; i < items.length; i++) {
            if (items[i].src === clickedSrc) { startIndex = i; break; }
        }

        $.magnificPopup.open({
            items: items,
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1],
                tCounter: '<span class="mfp-counter">%curr% / %total%</span>'
            }
        }, startIndex);
    });
});
</script>
