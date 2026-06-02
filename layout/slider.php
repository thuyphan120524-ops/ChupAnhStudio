<?php
$slider = slider_list_limit(0, 5);
$i = 0;
?>
<!-- slider_area_start -->
<style>
/* Premium Hero Slider Styling */
.slider_area {
    position: relative;
    overflow: hidden;
    background: #0f0f0f;
}
.slider_area .carousel-item {
    height: 100vh;
    min-height: 600px;
}
.slider_area .carousel-item img {
    height: 100% !important;
    width: 100% !important;
    object-fit: cover;
    transform: scale(1.03);
    transition: transform 6s ease-out;
}
.slider_area .carousel-item.active img {
    transform: scale(1);
}
.slider_area .overlay_premium {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(15,15,15,0.3) 0%, rgba(15,15,15,0.75) 100%);
    z-index: 1;
}
.slider_area .slider_text_premium {
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    max-width: 900px;
    text-align: center;
    z-index: 10;
    color: #fff;
}
.slider_area .slider_text_premium span.sub {
    font-family: 'Montserrat', sans-serif;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 4px;
    color: #b89d70;
    display: block;
    margin-bottom: 20px;
    animation: fadeInUp 1s both;
}
.slider_area .slider_text_premium h2 {
    font-family: 'Playfair Display', serif;
    font-size: 56px;
    font-weight: 700;
    line-height: 1.2;
    color: #fff;
    margin-bottom: 30px;
    text-shadow: 0 4px 15px rgba(0,0,0,0.4);
    animation: fadeInUp 1.2s both 0.2s;
}
@media(max-width: 768px) {
    .slider_area .slider_text_premium h2 {
        font-size: 36px;
    }
}
.slider_area .hero_btn_group {
    animation: fadeInUp 1.4s both 0.4s;
}
.slider_area .hero_btn_premium {
    display: inline-block;
    font-family: 'Montserrat', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #fff !important;
    background: transparent;
    padding: 16px 40px;
    border: 2px solid #b89d70;
    border-radius: 4px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(184, 157, 112, 0.15);
}
.slider_area .hero_btn_premium:hover {
    background: #b89d70;
    box-shadow: 0 8px 25px rgba(184, 157, 112, 0.4);
    transform: translateY(-2px);
}

/* Modern Slider Controls */
.slider_area .carousel-control-prev,
.slider_area .carousel-control-next {
    width: 60px;
    height: 60px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.7;
    z-index: 20;
    transition: all 0.3s;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 4px;
    margin: 0 20px;
}
.slider_area .carousel-control-prev:hover,
.slider_area .carousel-control-next:hover {
    opacity: 1;
    background: rgba(184, 157, 112, 0.9);
    border-color: #b89d70;
}
.slider_area .carousel-control-prev-icon,
.slider_area .carousel-control-next-icon {
    width: 20px;
    height: 20px;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
<div class="slider_area">
    <div class="container-fluid p-0">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="6000">
            <div class="carousel-inner">
                <?php foreach ($slider as $s) : ?>
                    <div class="carousel-item <?= ($i === 0) ? 'active' : '' ?>">
                        <a href="<?= ROOT ?>?page=detail&id=40">
                            <img src="images/sliders/<?= $s['images'] ?>" class="d-block w-100" alt="<?= htmlspecialchars($s['name']) ?>">
                        </a>
                        <div class="overlay_premium"></div>
                        <div class="slider_text_premium">
                            <span class="sub">Studio Chụp Ảnh Chuyên Nghiệp</span>
                            <h2><?= $s['name'] ?></h2>
                            <div class="hero_btn_group">
                                <a class="hero_btn_premium popup-with-form" href="#test-form">Đặt Lịch Ngay</a>
                            </div>
                        </div>
                    </div>
                <?php $i++; endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- slider_area_end -->