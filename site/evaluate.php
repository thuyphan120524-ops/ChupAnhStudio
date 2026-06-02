<?php
// Lấy tất cả đánh giá từ thư viện
$evaluates = evaluate_list_public();
?>

<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg_1" style="background-image: url('images/about/abc2.jpg'); background-size: cover; background-position: center; padding: 120px 0; position: relative;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3 style="color: #fff; font-size: 50px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">Đánh Giá Từ Khách Hàng</h3>
                    <p style="color: #eee; font-size: 16px; margin-top: 10px; font-style: italic;">Sự hài lòng của bạn là động lực lớn nhất của DakeStudio</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bradcam_area_end -->

<style>
.evaluate_grid_card {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.3s ease;
    border: 1px solid #f5f0e8;
}
.evaluate_grid_card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(184, 157, 112, 0.15);
    border-color: #b89d70;
}
.avatar-img {
    width: 55px;
    height: 55px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 15px;
    border: 2.5px solid #f1ece4;
}
</style>

<div class="evaluate_list_section" style="background: #faf8f5; padding: 80px 0;">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6 col-md-7">
                <div class="section_title mb-20px">
                    <span style="color: #b89d70; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">Cảm nhận thực tế</span>
                    <h3 style="font-size: 32px; font-weight: 700; color: #2c2c2c; margin-top: 5px;">Khách hàng nói gì về chúng tôi</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 text-md-right text-left mt-3 mt-md-0">
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="<?= ROOT ?>?page=profile&action=booking" class="boxed-btn3" style="border-radius: 30px; font-size: 14px; padding: 12px 30px;">Viết đánh giá của bạn</a>
                <?php else: ?>
                    <a href="#test-form" class="boxed-btn3 popup-with-form" style="border-radius: 30px; font-size: 14px; padding: 12px 30px;">Đăng nhập để đánh giá</a>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($evaluates)): ?>
            <div class="row">
                <?php foreach ($evaluates as $eval): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="evaluate_grid_card">
                            <div>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="images/users/<?= !empty($eval['user_images']) ? $eval['user_images'] : 'user.svg' ?>" alt="<?= htmlspecialchars($eval['user_name']) ?>" class="avatar-img" />
                                    <div>
                                        <h4 style="font-size: 16px; font-weight: 700; margin: 0; color: #b89d70;"><?= htmlspecialchars($eval['user_name']) ?></h4>
                                        <span style="font-size: 12px; color: #888; font-weight: 500;">@<?= htmlspecialchars($eval['type_name']) ?></span>
                                    </div>
                                </div>
                                <p style="font-size: 14.5px; color: #4a4a4a; line-height: 1.7; font-style: italic; margin-bottom: 25px;">
                                    "<?= htmlspecialchars($eval['content']) ?>"
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="border-top: 1px solid #f3ebe0; padding-top: 15px; margin-top: auto;">
                                <div style="color: #f1c40f; font-size: 13px;">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <?= $i < $eval['rating'] ? '★' : '☆' ?>
                                    <?php endfor; ?>
                                </div>
                                <span style="font-size: 12px; color: #999; font-weight: 500;"><?= date('d.m.Y', strtotime($eval['created_at'])) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12 text-center py-5" style="background: #fff; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px dashed #ddd;">
                    <div style="font-size: 40px; color: #ccc;" class="mb-3">💬</div>
                    <h3 style="font-size: 20px; font-weight: 600; color: #666;">Chưa có đánh giá nào</h3>
                    <p style="color: #999; font-size: 14px;">Hãy trở thành khách hàng đầu tiên chia sẻ cảm nhận!</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
