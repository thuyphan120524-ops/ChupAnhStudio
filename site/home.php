<?php require_once "layout/slider.php"; ?>
<?php
$service1 = service_list_limit(0, 5);
$service2 = service_list_limit(5, 5);
$barber = barber_limit(0, 15);
$setting = list_limit_setting();

// Lấy tất cả ảnh gallery của khách hàng (role = 1)
$all_photos = list_all_library(1);

// Nhóm các ảnh theo album_id
$grouped_albums = [];
foreach ($all_photos as $photo) {
    $aid = $photo['album_id'];
    if ($aid === null || $aid === '' || $aid == 0) {
        // Nếu không thuộc album nào, tạo album riêng chỉ chứa 1 ảnh này
        $grouped_albums['none_' . $photo['id']][] = $photo;
    } else {
        // Nhóm theo album_id
        $grouped_albums[$aid][] = $photo;
    }
}

$libraries_with_albums = [];
foreach ($grouped_albums as $album_key => $photos) {
    // Lấy ảnh đầu tiên làm ảnh cover
    $cover = $photos[0];
    
    $album_photos = [];
    foreach ($photos as $p) {
        $album_photos[] = [
            'src' => 'images/sliders/' . $p['images'],
            'title' => htmlspecialchars($p['name'], ENT_QUOTES)
        ];
    }
    
    $libraries_with_albums[] = [
        'id' => $album_key,
        'name' => $cover['name'],
        'cover' => 'images/sliders/' . $cover['images'],
        'photos' => $album_photos
    ];
}
$albums_json = json_encode($libraries_with_albums);
?>

<!-- Premium Global Styling Overrides -->
<style>
/* Modern typography overrides for the homepage */
.about_area, .service_area, .gallery_area, .cutter_muster, .customer_evaluate_area, .find_us_area {
    font-family: 'Montserrat', sans-serif;
}
h1, h2, h3, h4, h5, h6, .section_title h3, .section_title2 h3 {
    font-family: 'Playfair Display', serif;
}

/* Base style resets and layout enhancements */
.section_title_premium {
    margin-bottom: 50px;
}
.section_title_premium span {
    font-family: 'Montserrat', sans-serif;
    color: #b89d70;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 3px;
    display: block;
    margin-bottom: 12px;
}
.section_title_premium h3 {
    font-size: 40px;
    font-weight: 700;
    color: #111111;
    line-height: 1.25;
}
.section_title_premium.text-center h3::after {
    content: '';
    display: block;
    width: 60px;
    height: 2px;
    background: #b89d70;
    margin: 20px auto 0;
}

/* About Section Redesign */
.about_area_premium {
    padding: 120px 0;
    background: #ffffff;
}
.about_image_collage {
    position: relative;
    padding-bottom: 70px;
    padding-right: 50px;
}
.about_image_collage::before {
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    width: 140px;
    height: 140px;
    background-image: radial-gradient(#b89d70 2px, transparent 2px);
    background-size: 15px 15px;
    z-index: 1;
    opacity: 0.35;
}
.about_img_main {
    width: 85%;
    border-radius: 4px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.06);
    position: relative;
    z-index: 2;
    transition: transform 0.4s ease;
    object-fit: cover;
    height: 420px;
}
.about_img_sub {
    width: 50%;
    position: absolute;
    bottom: 0;
    right: 0;
    z-index: 3;
    border-radius: 4px;
    border: 8px solid #ffffff;
    box-shadow: 0 20px 45px rgba(0,0,0,0.12);
    transition: transform 0.4s ease;
    object-fit: cover;
    height: 250px;
}
.about_image_collage:hover .about_img_main {
    transform: translateY(-4px);
}
.about_image_collage:hover .about_img_sub {
    transform: translate(4px, -4px);
}
.about_info_premium {
    padding-left: 20px;
}
.about_info_premium p {
    font-size: 15px;
    color: #555555;
    line-height: 1.8;
    margin-bottom: 25px;
}
.about_features_premium {
    display: flex;
    gap: 20px;
    margin-top: 35px;
    margin-bottom: 35px;
}
.about_feature_item {
    flex: 1;
    background: #faf8f5;
    border-radius: 4px;
    padding: 20px;
    border: 1px solid #f1ece4;
    transition: all 0.3s;
}
.about_feature_item:hover {
    transform: translateY(-3px);
    border-color: #b89d70;
    box-shadow: 0 10px 25px rgba(184, 157, 112, 0.1);
}
.about_feature_item i {
    font-size: 20px;
    color: #b89d70;
    margin-bottom: 12px;
    display: inline-block;
}
.about_feature_item h4 {
    font-family: 'Playfair Display', serif;
    font-size: 16px;
    font-weight: 700;
    color: #111111;
    margin-bottom: 8px;
}
.about_feature_item p {
    font-family: 'Montserrat', sans-serif;
    font-size: 12px;
    color: #666666;
    line-height: 1.5;
    margin: 0;
}

/* Service Section */
.service_area_premium {
    padding: 120px 0;
    background: #faf8f5;
}
.single_service_premium {
    background: #ffffff;
    border: 1px solid #f1ece4;
    border-radius: 4px;
    padding: 20px 25px;
    margin-bottom: 20px;
    transition: all 0.35s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.01);
}
.single_service_premium:hover {
    transform: translateY(-4px);
    border-color: #b89d70;
    box-shadow: 0 12px 30px rgba(184, 157, 112, 0.12);
}
.service_info_premium {
    display: flex;
    align-items: center;
    gap: 18px;
}
.service_img_premium {
    width: 54px;
    height: 54px;
    border-radius: 4px;
    object-fit: cover;
    border: 2px solid #f1ece4;
    transition: border-color 0.3s;
}
.single_service_premium:hover .service_img_premium {
    border-color: #b89d70;
}
.service_title_premium {
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    font-weight: 600;
    color: #111111;
}
.service_price_premium {
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    font-weight: 700;
    color: #b89d70;
    white-space: nowrap;
}

/* Gallery Section */
.gallery_area_premium {
    padding: 120px 0;
    background: #ffffff;
}
.single_gallery_premium {
    position: relative;
    border-radius: 4px;
    overflow: hidden;
    background: #ffffff;
    transition: transform 0.4s ease;
    margin: 15px 5px;
    border: 1px solid #f1ece4;
}
.single_gallery_premium:hover {
    transform: translateY(-5px);
    border-color: #b89d70;
}
.gallery_thumb_premium {
    position: relative;
    overflow: hidden;
    height: 380px;
}
.gallery_thumb_premium img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}
.single_gallery_premium:hover .gallery_thumb_premium img {
    transform: scale(1.06);
}
.gallery_overlay_premium {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(17,17,17,0.55);
    opacity: 0;
    transition: opacity 0.35s;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
}
.single_gallery_premium:hover .gallery_overlay_premium {
    opacity: 1;
}
.gallery_btn_premium {
    background: #b89d70;
    color: #ffffff !important;
    padding: 12px 28px;
    border-radius: 4px;
    font-family: 'Montserrat', sans-serif;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    box-shadow: 0 4px 15px rgba(184, 157, 112, 0.3);
    transform: translateY(15px);
    transition: transform 0.35s, background 0.3s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.single_gallery_premium:hover .gallery_btn_premium {
    transform: translateY(0);
}
.gallery_btn_premium:hover {
    background: #ffffff;
    color: #b89d70 !important;
}
.gallery_info_premium {
    padding: 20px;
    text-align: center;
    border-top: 1px solid #fdfbf7;
}
.gallery_info_premium h4 {
    font-family: 'Playfair Display', serif;
    font-size: 17px;
    font-weight: 700;
    color: #111111;
    margin-bottom: 5px;
}
.gallery_info_premium span {
    font-family: 'Montserrat', sans-serif;
    font-size: 11px;
    color: #b89d70;
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* Photographers Section */
.cutter_muster_premium {
    padding: 120px 0;
    background: #faf8f5;
}
.single_master_premium {
    background: #ffffff;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.02);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    margin: 15px 5px;
    border: 1px solid #f3ece2;
}
.single_master_premium:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(184, 157, 112, 0.12);
    border-color: #b89d70;
}
.master_thumb_premium {
    height: 350px;
    overflow: hidden;
    position: relative;
}
.master_thumb_premium img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
}
.single_master_premium:hover .master_thumb_premium img {
    transform: scale(1.04);
}
.master_info_premium {
    padding: 22px;
    text-align: center;
}
.master_info_premium h3 {
    font-family: 'Playfair Display', serif;
    font-size: 19px;
    font-weight: 700;
    color: #111111;
    margin-bottom: 6px;
    transition: color 0.3s;
}
.master_info_premium h3 a {
    color: inherit;
    text-decoration: none;
}
.single_master_premium:hover .master_info_premium h3 {
    color: #b89d70;
}
.master_info_premium p {
    font-family: 'Montserrat', sans-serif;
    font-size: 11px;
    font-weight: 600;
    color: #888888;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 0;
}

/* Testimonials Section */
.evaluate_area_premium {
    background: #ffffff;
    padding: 120px 0;
}
.evaluate_card_premium {
    background: #ffffff;
    border-radius: 4px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #f1ece4;
    position: relative;
}
.evaluate_card_premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: #b89d70;
    border-radius: 4px 4px 0 0;
    opacity: 0;
    transition: opacity 0.3s;
}
.evaluate_card_premium:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(184, 157, 112, 0.12) !important;
    border-color: #b89d70;
}
.evaluate_card_premium:hover::before {
    opacity: 1;
}

/* Find Us Section */
.find_us_premium {
    padding: 120px 0;
    background: #111111;
    position: relative;
    color: #ffffff;
}
.find_info_premium {
    position: relative;
    z-index: 2;
    background: rgba(30, 30, 30, 0.65);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 4px;
    padding: 50px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
}
.find_info_premium h3.find_info_title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    color: #ffffff;
    margin-bottom: 35px;
    font-weight: 700;
}
.single_find_premium {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 30px;
}
.single_find_premium .icon_premium {
    width: 48px;
    height: 48px;
    background: rgba(184, 157, 112, 0.15);
    border: 1px solid #b89d70;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #b89d70;
    font-size: 18px;
    flex-shrink: 0;
}
.single_find_premium .find_text_premium h3 {
    font-family: 'Montserrat', sans-serif;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #b89d70;
    margin-bottom: 6px;
}
.single_find_premium .find_text_premium p {
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    color: #cccccc;
    margin: 0;
    line-height: 1.6;
}
.find_info_premium .book_btn_premium {
    margin-top: 40px;
}
.find_info_premium .book_btn_premium a {
    display: inline-block;
    font-family: 'Montserrat', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #ffffff !important;
    background: #b89d70;
    padding: 16px 40px;
    border-radius: 4px;
    border: none;
    transition: all 0.3s;
    box-shadow: 0 4px 15px rgba(184, 157, 112, 0.3);
    text-decoration: none;
}
.find_info_premium .book_btn_premium a:hover {
    background: #ffffff;
    color: #b89d70 !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 255, 255, 0.15);
}

/* Contact Popup Form Custom Overlay */
#contact-form-popup {
    max-width: 600px;
    margin: 0 auto;
    background: #ffffff;
    padding: 40px;
    border-radius: 4px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    border-top: 4px solid #b89d70;
}
</style>

<!-- about_area_start -->
<div class="about_area_premium">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 mb-5 mb-lg-0">
                <div class="about_image_collage">
                    <img src="images/about/abc2.jpg" alt="Dake Studio Main" class="about_img_main" />
                    <img src="images/sliders/nangtho2.jpg" alt="Dake Studio Sub" class="about_img_sub" />
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="about_info_premium">
                    <div class="section_title_premium">
                        <span>Về Chúng Tôi</span>
                        <h3><?= $setting['slogan'] ?></h3>
                    </div>
                    <p>
                        Mỗi khoảnh khắc trôi qua đều mang một câu chuyện duy nhất. Tại DakeStudio, chúng tôi không chỉ bấm máy, chúng tôi lưu giữ thanh xuân, đong đầy cảm xúc và bắt trọn những nụ cười tự nhiên nhất của bạn.
                    </p>
                    <p>
                        Bằng sự tận tâm và tư duy nghệ thuật khác biệt, DakeStudio cam kết mang đến những bộ ảnh độc bản, tinh tế, nơi mỗi khung hình là một tác phẩm nghệ thuật kể về chính bạn.
                    </p>
                    
                    <div class="about_features_premium">
                        <div class="about_feature_item">
                            <i class="flaticon-camera"></i>
                            <h4>Nghệ Thuật Độc Bản</h4>
                            <p>Tôn vinh cá tính & phong cách riêng biệt của bạn.</p>
                        </div>
                        <div class="about_feature_item">
                            <i class="flaticon-clock"></i>
                            <h4>Giờ Hoạt Động</h4>
                            <p>T2 - T6: 8:30 - 20:00<br>T7 - CN: 9:00 - 18:00</p>
                        </div>
                    </div>
                    
                    <div>
                        <a href="#test-form" class="hero_btn_premium popup-with-form" style="color:#111 !important; border-color:#b89d70; text-decoration:none;">Đặt Lịch Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->

<!-- service_area_start -->
<div class="service_area_premium">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title_premium text-center">
                    <span>Bảng Giá</span>
                    <h3>Dịch Vụ Của Chúng Tôi</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <?php foreach ($service1 as $s1) : ?>
                    <div class="single_service_premium">
                        <div class="service_info_premium">
                            <img src="images/products/<?= $s1['images'] ?>" class="service_img_premium" alt="<?= htmlspecialchars($s1['name']) ?>" />
                            <span class="service_title_premium"><?= $s1['name'] ?></span>
                        </div>
                        <span class="service_price_premium"><?= number_format($s1['price'], 0, ',', '.') . ' đ' ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-xl-6">
                <?php foreach ($service2 as $s2) : ?>
                    <div class="single_service_premium">
                        <div class="service_info_premium">
                            <img src="images/products/<?= $s2['images'] ?>" class="service_img_premium" alt="<?= htmlspecialchars($s2['name']) ?>" />
                            <span class="service_title_premium"><?= $s2['name'] ?></span>
                        </div>
                        <span class="service_price_premium"><?= number_format($s2['price'], 0, ',', '.') . ' đ' ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="text-center">
                    <a class="hero_btn_premium popup-with-form" href="#test-form" style="color:#111 !important; border-color:#b89d70;">Đặt lịch ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service_area_end -->

<!-- gallery_area_start -->
<div class="gallery_area_premium">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title_premium text-center">
                    <span>Kho Báu Khoảnh Khắc</span>
                    <h3>Hình Ảnh Khách Hàng Trải Nghiệm</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="gallery_active owl-carousel" id="gallery-album-owl">
                    <?php foreach ($libraries_with_albums as $album) : ?>
                        <div class="single_gallery_premium">
                            <div class="gallery_thumb_premium">
                                <img src="<?= $album['cover'] ?>" alt="<?= htmlspecialchars($album['name']) ?>" />
                                <div class="gallery_overlay_premium">
                                    <a class="gallery_btn_premium service-album-trigger" href="#" data-service-id="<?= $album['id'] ?>">
                                        <i class="ti-zoom-in" style="font-size:12px;"></i>
                                        <span>Xem Album</span>
                                    </a>
                                </div>
                            </div>
                            <div class="gallery_info_premium">
                                <h4><?= htmlspecialchars($album['name']) ?></h4>
                                <span><?= count($album['photos']) ?> hình ảnh</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- gallery_area_end -->

<script>
// Dữ liệu album theo dịch vụ từ PHP
var serviceAlbums = <?= $albums_json ?>;

window.addEventListener('load', function() {
    if (typeof jQuery !== 'undefined') {
        jQuery(document).ready(function($) {
            if (!serviceAlbums || !serviceAlbums.length) return;

            // Click vào album gói chụp
            $(document).on('click', '.service-album-trigger', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var serviceId = $(this).data('service-id');
                var album = null;
                
                for (var i = 0; i < serviceAlbums.length; i++) {
                    if (serviceAlbums[i].id == serviceId) {
                        album = serviceAlbums[i];
                        break;
                    }
                }

                if (album && album.photos && album.photos.length) {
                    $.magnificPopup.open({
                        items: album.photos,
                        type: 'image',
                        gallery: {
                            enabled: true,
                            navigateByImgClick: true,
                            preload: [0, 1],
                            tCounter: '<span class="mfp-counter">%curr% / %total%</span>'
                        },
                        image: {
                            titleSrc: function(item) {
                                return item.title ? item.title : '';
                            }
                        }
                    }, 0);
                }
            });
        });
    }
});
</script>

<!-- photographers_area_start -->
<div class="cutter_muster_premium">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title_premium text-center">
                    <span>Đội Ngũ Sáng Tạo</span>
                    <h3>Thợ Chụp Của Chúng Tôi</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="barber_active owl-carousel">
                    <?php foreach ($barber as $b) : ?>
                        <div class="single_master_premium">
                            <div class="master_thumb_premium">
                                <a href="index.php?page=barber-detail&id=<?= $b['id'] ?>">
                                    <img src="images/users/<?= $b['images'] ?>" alt="<?= htmlspecialchars($b['name']) ?>" />
                                </a>
                            </div>
                            <div class="master_info_premium">
                                <h3><a href="index.php?page=barber-detail&id=<?= $b['id'] ?>"><?= $b['name'] ?></a></h3>
                                <p>Thợ Chụp Ảnh</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- photographers_area_end -->

<!-- customer_evaluate_start -->
<?php
$home_evaluates = evaluate_list_home(6);
?>
<div class="evaluate_area_premium">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title_premium text-center">
                    <span>Đánh Giá Từ Khách Hàng</span>
                    <h3>Chia Sẻ Từ Khách Hàng Trải Nghiệm</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($home_evaluates as $eval) : ?>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                    <div class="evaluate_card_premium">
                        <div>
                            <div class="d-flex align-items-center mb-3">
                                <img src="images/users/<?= !empty($eval['user_images']) ? $eval['user_images'] : 'user.svg' ?>" alt="<?= htmlspecialchars($eval['user_name']) ?>" class="rounded-circle" style="width: 48px; height: 48px; object-fit: cover; margin-right: 15px; border: 2px solid #f1ece4;" />
                                <div>
                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0; color: #111111;"><?= htmlspecialchars($eval['user_name']) ?></h4>
                                    <span style="font-size: 11px; color: #b89d70; display: block; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 2px;">@<?= htmlspecialchars($eval['type_name']) ?></span>
                                </div>
                            </div>
                            <p style="font-size: 14px; color: #555555; line-height: 1.6; font-style: italic; margin-bottom: 20px;">
                                "<?= htmlspecialchars($eval['content']) ?>"
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center" style="border-top: 1px solid #f5f0e8; padding-top: 15px; margin-top: auto;">
                            <div style="color: #f1c40f; font-size: 12px; letter-spacing: 2px;">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?= $i < $eval['rating'] ? '★' : '☆' ?>
                                <?php endfor; ?>
                            </div>
                            <span style="font-size: 11px; color: #aaaaaa; font-weight: 500;"><?= date('d.m.Y', strtotime($eval['created_at'])) ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row mt-4">
            <div class="col-xl-12 text-center">
                <a href="<?= ROOT ?>?page=evaluate" class="hero_btn_premium" style="color:#111 !important; border-color:#b89d70; text-decoration:none;">Xem Tất Cả Đánh Giá</a>
            </div>
        </div>
    </div>
</div>
<!-- customer_evaluate_end -->

<!-- find_us_area start -->
<div class="find_us_premium">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 mb-5 mb-lg-0">
                <div class="map_container" style="position: relative; width: 100%; height: 420px; border-radius: 4px; overflow: hidden; border: 1px solid rgba(255,255,255,0.08); box-shadow: 0 15px 35px rgba(0,0,0,0.3);">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9242784534726!2d105.79589791440751!3d21.03571999291775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3a9fa93905%3A0xe54fb7a213e4b449!2zMTU0IEPhuqd1IEdp4bqleSwgUXVhbiBIb2EsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1684999999999!5m2!1sen!2s" 
                            width="100%" height="100%" style="border:0; filter: grayscale(1) invert(0.95) contrast(1.2);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="find_info_premium">
                    <h3 class="find_info_title" style="margin-bottom: 25px;">Chúng Tôi Ở Đâu?</h3>
                    <div class="single_find_premium" style="margin-bottom: 20px;">
                        <div class="icon_premium">
                            <i class="flaticon-placeholder"></i>
                        </div>
                        <div class="find_text_premium">
                            <h3>Địa Chỉ Studio</h3>
                            <p>154, Cầu Giấy, Hà Nội</p>
                        </div>
                    </div>
                    <div class="single_find_premium" style="margin-bottom: 20px;">
                        <div class="icon_premium">
                            <i class="flaticon-phone-call"></i>
                        </div>
                        <div class="find_text_premium">
                            <h3>Hotline Đặt Lịch</h3>
                            <p>+84 78 478 8768</p>
                        </div>
                    </div>
                    <div class="single_find_premium" style="margin-bottom: 20px;">
                        <div class="icon_premium">
                            <i class="flaticon-paper-plane"></i>
                        </div>
                        <div class="find_text_premium">
                            <h3>Thư Điện Tử</h3>
                            <p>studiochup3@gmail.com</p>
                        </div>
                    </div>
                    <div class="book_btn_premium" style="margin-top: 25px;">
                        <a class="popup-with-form" href="#test-form">Đặt Lịch Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $allServices = array_merge($service1, $service2); ?>
<div id="contact-form-popup" class="white-popup-block mfp-hide">
    <div class="section_title mb-20px" style="text-align:center;">
        <h3 style="margin-bottom:8px; font-family:'Playfair Display', serif; font-weight:700;">Liên hệ tư vấn dịch vụ</h3>
        <p style="font-family:'Montserrat', sans-serif; font-size:13px; color:#666;">Điền thông tin, chúng tôi sẽ gọi lại ngay.</p>
    </div>

    <form method="post" action="" id="contactOnlyForm" novalidate style="font-family:'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label style="font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; color:#444;">Họ và tên <span style="color:#e74c3c">*</span></label>
                <input type="text" name="fullname" class="form-control" placeholder="Nguyễn Văn A" required minlength="2" maxlength="100" style="font-size:14px; border-radius:4px;">
            </div>
            <div class="col-md-6 mb-3">
                <label style="font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; color:#444;">Số điện thoại <span style="color:#e74c3c">*</span></label>
                <input type="tel" name="phone" class="form-control" placeholder="09xxxxxxxx"
                    required pattern="^(0|\+84)(\d){8,10}$" title="Nhập SĐT hợp lệ (bắt đầu 0 hoặc +84)" style="font-size:14px; border-radius:4px;">
            </div>
            <div class="col-md-12 mb-3">
                <label style="font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; color:#444;">Email</label>
                <input type="email" name="email" class="form-control" placeholder="you@example.com" style="font-size:14px; border-radius:4px;">
            </div>
            <div class="col-md-12 mb-3">
                <label style="font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; color:#444;">Chọn dịch vụ</label>
                <select name="service" class="form-control" style="font-size:14px; border-radius:4px; height:auto; padding:10px;">
                    <option value="">— Chọn dịch vụ quan tâm —</option>
                    <?php foreach ($allServices as $sv): ?>
                        <option value="<?= htmlspecialchars($sv['name']) ?>">
                            <?= htmlspecialchars($sv['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label style="font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; color:#444;">Ghi chú</label>
                <textarea name="message" class="form-control" rows="4" placeholder="Nội dung cần tư vấn..." style="font-size:14px; border-radius:4px;"></textarea>
            </div>
        </div>
        <input type="hidden" name="hp_token" value="<?= md5(date('Y-m-d') . '_contact_form') ?>">
        <div class="d-flex justify-content-between align-items-center mt-3 pt-2">
            <small style="color:#777;"><em>Chúng tôi bảo mật thông tin của bạn.</em></small>
            <button type="submit" class="hero_btn_premium" style="background:#b89d70; color:#fff !important; border:none; border-radius:4px; font-size:12px; padding:12px 30px;">Gửi yêu cầu</button>
        </div>
    </form>
</div>

<script>
window.addEventListener('load', function() {
    if (typeof jQuery !== 'undefined') {
        setTimeout(function() {
            jQuery.magnificPopup.open({
                items: {
                    src: '#contact-form-popup'
                },
                type: 'inline',
                preloader: false,
                focus: 'input[name="fullname"]'
            });
        }, 1000);
    }
});
</script>

<script>
window.addEventListener('load', function() {
    if (typeof jQuery !== 'undefined') {
        jQuery(function($) {
            // Đảm bảo có vùng hiển thị thông báo trong form
            function ensureAlertBox($form) {
                if (!$form.find('.contact-alert').length) {
                    $form.prepend('<div class="contact-alert" style="margin-bottom:10px; display:none; padding:8px; border-radius:5px; font-size:14px;"></div>');
                }
                return $form.find('.contact-alert');
            }

            $('#contactOnlyForm').on('submit', function(e) {
                e.preventDefault();

                var $form = $(this);
                var $btn = $form.find('button[type="submit"]');
                var $alert = ensureAlertBox($form);

                // Lấy dữ liệu
                var fullname = $.trim($form.find('input[name="fullname"]').val());
                var phone = $.trim($form.find('input[name="phone"]').val());

                if (!fullname || !phone) {
                    $alert.css({
                            display: 'block',
                            background: '#fbeaea',
                            color: '#c0392b',
                            border: '1px solid #e74c3c'
                        })
                        .html('⚠️ Vui lòng nhập <b>Họ tên</b> và <b>SĐT</b>.');
                    return;
                }

                var url = $form.attr('action') || 'site/contact-form.php';

                // Disable nút gửi
                var oldText = $btn.html();
                $btn.prop('disabled', true).html('⏳ Đang gửi...');

                $.ajax({
                        url: url,
                        type: 'POST',
                        data: $form.serialize(),
                        dataType: 'json'
                    })
                    .done(function(res) {
                        if (res.success) {
                            $alert.css({
                                    display: 'block',
                                    background: '#eafaf1',
                                    color: '#27ae60',
                                    border: '1px solid #27ae60'
                                })
                                .html('✅ ' + res.message);
                            $form[0].reset();

                            // Đóng popup sau 2 giây
                            setTimeout(function() {
                                if ($.magnificPopup) $.magnificPopup.close();
                            }, 2000);
                        } else {
                            $alert.css({
                                    display: 'block',
                                    background: '#fbeaea',
                                    color: '#c0392b',
                                    border: '1px solid #e74c3c'
                                })
                                .html('❌ ' + (res.message || 'Có lỗi xảy ra, vui lòng thử lại.'));
                        }
                    })
                    .fail(function() {
                        $alert.css({
                                display: 'block',
                                background: '#fbeaea',
                                color: '#c0392b',
                                border: '1px solid #e74c3c'
                            })
                            .html('❌ Không kết nối được tới máy chủ. Vui lòng thử lại.');
                    })
                    .always(function() {
                        $btn.prop('disabled', false).html(oldText);
                    });
            });
        });
    }
});
</script>
<!-- find_us_area_end -->