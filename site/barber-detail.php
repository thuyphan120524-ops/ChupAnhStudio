<?php
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);
$barber_detail = barber_list_one($id);

if (!$barber_detail) {
    echo "<div class='container text-center' style='padding: 100px 0;'><h3>Không tìm thấy thợ chụp ảnh này!</h3><a href='index.php' class='btn btn-primary mt-3'>Quay lại Trang chủ</a></div>";
    return;
}

$profile = [];
if (!empty($barber_detail['profile_data'])) {
    $profile = json_decode($barber_detail['profile_data'], true);
}

// Full comprehensive fallback template containing all 8 checklist items
if (empty($profile)) {
    $profile = [
        'stage_name' => 'Nhiếp ảnh gia Chuyên nghiệp',
        'birthday' => '31 Tháng Năm 1998',
        'website' => 'https://dake.studio',
        'socials' => [
            'facebook' => '#',
            'instagram' => '#',
            'behance' => '#',
            'twitter' => '#'
        ],
        'bio' => [
            'story' => 'Tôi là một Nhiếp ảnh gia chuyên nghiệp với niềm đam mê sâu sắc trong việc ghi lại những khoảnh khắc chân thực và nhiều cảm xúc nhất. Hành trình nghệ thuật của tôi bắt đầu từ mong muốn tôn vinh vẻ đẹp tự nhiên và cá tính của mỗi con người.',
            'style' => 'Tập trung vào ánh sáng tự nhiên, góc máy Cinematic và tông màu ấm áp mang chiều sâu điện ảnh.',
            'philosophy' => 'Mỗi bức ảnh không chỉ là một khung hình tĩnh, mà là cả một câu chuyện đầy cảm xúc được kể bằng ngôn ngữ của ánh sáng và chất liệu cuộc sống.',
            'difference' => 'Khả năng khơi gợi cảm xúc tự nhiên, giúp khách hàng luôn cảm thấy thoải mái và tự tin nhất trước ống kính.'
        ],
        'services' => [
            [
                'title' => 'Chụp ảnh Chân dung', 
                'description' => 'Bắt trọn thần thái và cá tính độc bản của bạn qua từng góc máy.',
                'packages' => [
                    ['name' => 'Gói Cá nhân Basic', 'price' => '1.500.000đ', 'features' => '60 phút chụp - 15 ảnh chỉnh sửa chuyên sâu - Trả toàn bộ ảnh gốc'],
                    ['name' => 'Gói Cá nhân Premium', 'price' => '3.000.000đ', 'features' => '120 phút chụp - 35 ảnh chỉnh sửa chuyên sâu - Hỗ trợ trang điểm & làm tóc']
                ]
            ],
            [
                'title' => 'Chụp ảnh Cưới & Đôi', 
                'description' => 'Lưu giữ những khoảnh khắc ngọt ngào và thiêng liêng nhất của tình yêu.',
                'packages' => [
                    ['name' => 'Gói Couple/Pre-Wedding', 'price' => '4.500.000đ', 'features' => 'Chụp ngoại cảnh nửa ngày - 40 ảnh chỉnh sửa - Tặng 1 ảnh cổng lớn'],
                    ['name' => 'Gói Phóng sự ngày cưới', 'price' => '8.000.000đ', 'features' => 'Chụp suốt ngày cưới - 2 thợ chụp - Bàn giao 150 ảnh đã tối ưu hóa màu sắc']
                ]
            ]
        ],
        'workflow' => [
            ['step' => '1. Tư vấn & Lên Concept', 'detail' => 'Lắng nghe nhu cầu, thảo luận ý tưởng độc đáo, tư vấn trang phục và địa điểm chụp phù hợp.'],
            ['step' => '2. Thực hiện Buổi chụp', 'detail' => 'Tiến hành chụp trong không khí thoải mái, nhiếp ảnh gia hướng dẫn tạo dáng tự nhiên nhất.'],
            ['step' => '3. Hậu kỳ & Bàn giao', 'detail' => 'Lựa chọn các góc ảnh đẹp nhất, retouch chuyên nghiệp và bàn giao album hoàn chỉnh đúng hẹn.']
        ],
        'experience' => [
            'years' => '5 năm kinh nghiệm',
            'projects' => ['Triển lãm ảnh cá nhân "Ký ức Phố" (2022)', 'Chiến dịch Lookbook Thu Đông cho Dake Brand (2023)'],
            'awards' => ['Top 10 Nhiếp ảnh gia Trẻ tiêu biểu (2021)', 'Giải nhất tác phẩm chân dung xuất sắc nhất tại Fine Art Contest (2023)'],
            'clients' => ['Dake Studio', 'Tạp chí Đẹp', 'L’Officiel Việt Nam'],
            'media' => ['Tác phẩm đăng tải trên tạp chí Heritage Việt Nam (Số tháng 10/2023)', 'Báo VnExpress đưa tin về triển lãm nghệ thuật chân dung']
        ],
        'portfolio_categories' => [
            [
                'name' => 'Chân dung (Portrait)',
                'images' => ['t1.jpg', 't2.jpg']
            ],
            [
                'name' => 'Cưới & Đôi (Wedding)',
                'images' => ['t3.jpg', 't4.jpg']
            ]
        ],
        'before_after' => [
            ['title' => 'Cân bằng sáng & Retouch chân dung', 'before' => 't1.jpg', 'after' => 't2.jpg'],
            ['title' => 'Phối tông màu Cinematic', 'before' => 't3.jpg', 'after' => 't4.jpg']
        ],
        'skills' => ['Bố cục nghệ thuật (Composition)', 'Ánh sáng Studio (Studio Lighting)', 'Hậu kỳ nâng cao (Retouching)'],
        'software' => ['Adobe Photoshop', 'Adobe Lightroom Classic', 'Capture One Pro'],
        'equipment' => [
            'cameras' => ['Sony Alpha 7R V', 'Canon EOS R5'],
            'lenses' => ['FE 85mm f/1.4 GM', 'FE 24-70mm f/2.8 GM II', 'RF 50mm f/1.2L'],
            'lighting' => ['Profoto A10 AirTTL', 'Godox AD600 Pro', 'Softbox Bát giác 120cm']
        ],
        'education' => [
            ['degree' => 'Cử nhân Nghệ thuật & Thiết kế', 'school' => 'Đại học Mỹ thuật', 'year' => '2020']
        ],
        'certifications' => [
            'Chứng nhận Nhiếp ảnh gia chuyên nghiệp do Hiệp hội Nghệ thuật cấp (2021)',
            'Chứng chỉ Hậu kỳ Chuyên nghiệp Capture One (2022)'
        ],
        'testimonials' => [
            ['client_name' => 'Daniel Lewis', 'avatar' => 't1.jpg', 'comment' => 'Tôi vô cùng hài lòng với bộ ảnh chân dung của mình. Góc chụp rất độc đáo và chuyên nghiệp.', 'rating' => 5],
            ['client_name' => 'Jessica Miller', 'avatar' => 't2.jpg', 'comment' => 'Nhiếp ảnh gia vô cùng tận tâm, hướng dẫn tạo dáng rất tự nhiên và vui vẻ.', 'rating' => 5]
        ],
        'case_studies' => [
            [
                'title' => 'Lookbook Thời trang hè cho Dake Brand',
                'challenge' => 'Chụp 40 bộ trang phục ngoại cảnh trong điều kiện thời tiết nắng gắt và thay đổi liên tục.',
                'solution' => 'Sử dụng kỹ thuật High-Speed Sync kết hợp tấm tản sáng lớn để cân bằng ánh sáng tự nhiên.',
                'result' => 'Bộ ảnh hoàn thành trước thời hạn, album sắc nét giúp nhãn hàng tăng 25% doanh số bán hàng online.'
            ]
        ]
    ];
}

// Default fallbacks for newly added fields to prevent errors on existing profiles
if (!isset($profile['workflow'])) $profile['workflow'] = [];
if (!isset($profile['experience']['media'])) $profile['experience']['media'] = [];
if (!isset($profile['portfolio_categories'])) $profile['portfolio_categories'] = [];
if (!isset($profile['before_after'])) $profile['before_after'] = [];
if (!isset($profile['software'])) $profile['software'] = [];
if (!isset($profile['certifications'])) $profile['certifications'] = [];
if (!isset($profile['case_studies'])) $profile['case_studies'] = [];
?>

<!-- Stylesheets for Light Mode comprehensive profile detail page -->
<style>
    .barber-profile-section {
        background-color: #f6f8fb;
        padding: 60px 0;
        font-family: 'Outfit', 'Inter', sans-serif;
    }
    
    /* Sidebar styling */
    .profile-sidebar {
        background: #ffffff;
        border-radius: 8px;
        padding: 40px 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.04);
        text-align: center;
        margin-bottom: 30px;
    }
    
    .profile-sidebar .avatar-container {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 25px;
    }
    
    .profile-sidebar .avatar-container img {
        width: 100%;
        height: 100%;
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 8px 24px rgba(188, 147, 33, 0.12);
        border: 3px solid #ffffff;
    }
    
    .profile-sidebar h2 {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
    }
    
    .profile-sidebar .stage-name {
        background: #fef3c7;
        color: #d97706;
        font-size: 13px;
        font-weight: 600;
        padding: 6px 16px;
        border-radius: 4px;
        display: inline-block;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .profile-sidebar .contact-info-list {
        text-align: left;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding-top: 25px;
        margin-bottom: 25px;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 18px;
    }
    
    .contact-item .icon-box {
        width: 38px;
        height: 38px;
        background: #fef3c7;
        color: #d97706;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        margin-right: 15px;
        flex-shrink: 0;
    }
    
    .contact-item .contact-detail label {
        display: block;
        font-size: 10px;
        color: #94a3b8;
        text-transform: uppercase;
        margin-bottom: 1px;
        font-weight: 600;
    }
    
    .contact-item .contact-detail span, 
    .contact-item .contact-detail a {
        font-size: 14px;
        color: #334155;
        font-weight: 500;
        word-break: break-all;
    }
    
    .profile-sidebar .social-links {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 25px;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding-top: 25px;
    }
    
    .profile-sidebar .social-links a {
        width: 38px;
        height: 38px;
        border-radius: 4px;
        background: #f1f5f9;
        color: #475569;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    
    .profile-sidebar .social-links a:hover {
        background: #BC9321;
        color: #ffffff;
        transform: translateY(-3px);
    }
    
    /* Main Content Area styling */
    .profile-main-content {
        background: #ffffff;
        border-radius: 8px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.04);
        min-height: 550px;
    }
    
    .profile-nav-tabs {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        padding-bottom: 20px;
        margin-bottom: 35px;
        flex-wrap: wrap;
    }
    
    .profile-nav-tabs .nav-tab-btn {
        background: transparent;
        border: none;
        outline: none;
        color: #64748b;
        font-size: 15px;
        font-weight: 600;
        padding: 10px 24px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .profile-nav-tabs .nav-tab-btn:hover {
        color: #BC9321;
        background: #fdf6e2;
    }
    
    .profile-nav-tabs .nav-tab-btn.active {
        background: #BC9321;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(188, 147, 33, 0.2);
    }
    
    .tab-content-panel {
        display: none;
        animation: fadeInTab 0.4s ease forwards;
    }
    
    .tab-content-panel.active {
        display: block;
    }
    
    @keyframes fadeInTab {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        margin: 30px 0 20px;
        position: relative;
        padding-bottom: 12px;
    }
    
    .section-title:first-of-type {
        margin-top: 0;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 35px;
        height: 3px;
        background: #BC9321;
        border-radius: 2px;
    }
    
    .bio-text {
        font-size: 15px;
        line-height: 1.8;
        color: #475569;
        margin-bottom: 25px;
    }
    
    .bio-bullets {
        background: #f8fafc;
        border-radius: 8px;
        padding: 25px;
        border: 1px solid rgba(0, 0, 0, 0.03);
        margin-bottom: 30px;
    }
    
    .bio-bullet-item {
        margin-bottom: 15px;
    }
    
    .bio-bullet-item:last-child {
        margin-bottom: 0;
    }
    
    .bio-bullet-item strong {
        color: #1e293b;
        display: block;
        margin-bottom: 4px;
        font-size: 14px;
    }
    
    .bio-bullet-item span {
        font-size: 14px;
        color: #475569;
    }
    
    /* Services & Packages */
    .service-block {
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        padding: 24px;
        margin-bottom: 20px;
        background: #ffffff;
        transition: all 0.3s ease;
    }
    
    .service-block:hover {
        border-color: rgba(188, 147, 33, 0.25);
        box-shadow: 0 5px 20px rgba(0,0,0,0.02);
    }
    
    .service-block-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .service-block-header .icon-box {
        width: 44px;
        height: 44px;
        background: #fdf6e2;
        color: #BC9321;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-right: 15px;
    }
    
    .service-block-header h4 {
        font-size: 17px;
        font-weight: 600;
        color: #1e293b;
        margin: 0;
    }
    
    .package-item {
        background: #f8fafc;
        border-radius: 6px;
        padding: 15px 20px;
        margin-top: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .package-info h5 {
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 4px;
    }
    
    .package-info p {
        font-size: 12px;
        color: #64748b;
        margin: 0;
    }
    
    .package-price {
        font-size: 16px;
        font-weight: 700;
        color: #BC9321;
    }
    
    /* Workflow (Quy trình) */
    .workflow-timeline {
        display: flex;
        gap: 20px;
        margin-top: 15px;
    }
    
    @media (max-width: 768px) {
        .workflow-timeline {
            flex-direction: column;
        }
    }
    
    .workflow-step-card {
        flex: 1;
        background: #f8fafc;
        border-radius: 8px;
        padding: 20px;
        border: 1px solid rgba(0,0,0,0.03);
    }
    
    .workflow-step-card h4 {
        font-size: 15px;
        font-weight: 700;
        color: #BC9321;
        margin-bottom: 10px;
    }
    
    .workflow-step-card p {
        font-size: 13px;
        color: #475569;
        line-height: 1.6;
        margin: 0;
    }
    
    /* Timelines */
    .timeline {
        border-left: 2px solid rgba(188, 147, 33, 0.2);
        padding-left: 25px;
        margin-left: 10px;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 25px;
    }
    
    .timeline-item:last-child {
        margin-bottom: 0;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -33px;
        top: 5px;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #ffffff;
        border: 3px solid #BC9321;
    }
    
    .timeline-item h4 {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 4px;
    }
    
    .timeline-item .timeline-meta {
        font-size: 12px;
        color: #BC9321;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }
    
    .timeline-item p {
        font-size: 13px;
        color: #475569;
        line-height: 1.6;
        margin: 0;
    }
    
    /* Skills Tags & Software tags */
    .skills-software-box {
        background: #f8fafc;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 25px;
        border: 1px solid rgba(0,0,0,0.03);
    }
    
    .skills-software-box h4 {
        font-size: 15px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 15px;
    }
    
    .skill-tag {
        display: inline-block;
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.08);
        border-radius: 4px;
        padding: 6px 12px;
        font-size: 13px;
        color: #475569;
        font-weight: 500;
        margin-right: 8px;
        margin-bottom: 10px;
    }
    
    .skill-tag.software-tag {
        background: #f0fdf4;
        color: #15803d;
        border-color: #bbf7d0;
    }
    
    /* Portfolio Category Tabs */
    .portfolio-cat-nav {
        display: flex;
        gap: 10px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }
    
    .portfolio-cat-btn {
        background: #f1f5f9;
        border: none;
        outline: none;
        font-size: 13px;
        font-weight: 600;
        padding: 8px 18px;
        border-radius: 4px;
        color: #475569;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .portfolio-cat-btn.active, .portfolio-cat-btn:hover {
        background: #BC9321;
        color: #ffffff;
    }
    
    .portfolio-cat-content {
        display: none;
    }
    
    .portfolio-cat-content.active {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .portfolio-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        aspect-ratio: 1;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    }
    
    .portfolio-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .portfolio-item:hover img {
        transform: scale(1.08);
    }
    
    .portfolio-item .overlay-zoom {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .portfolio-item:hover .overlay-zoom {
        opacity: 1;
    }
    
    /* Before / After section */
    .ba-slider-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 15px;
    }
    
    @media (max-width: 768px) {
        .ba-slider-container {
            grid-template-columns: 1fr;
        }
    }
    
    .ba-card {
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 8px;
        padding: 20px;
    }
    
    .ba-card h5 {
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 12px;
    }
    
    .ba-images {
        display: flex;
        gap: 10px;
    }
    
    .ba-img-box {
        flex: 1;
        position: relative;
        border-radius: 6px;
        overflow: hidden;
        aspect-ratio: 1.15;
    }
    
    .ba-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .ba-img-box .label {
        position: absolute;
        bottom: 8px;
        left: 8px;
        background: rgba(0,0,0,0.6);
        color: #fff;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 2px;
        font-weight: 600;
    }
    
    /* Case Studies */
    .case-card {
        background: #f8fafc;
        border-radius: 8px;
        padding: 24px;
        margin-bottom: 15px;
        border: 1px solid rgba(0,0,0,0.03);
    }
    
    .case-card h4 {
        font-size: 15px;
        font-weight: 700;
        color: #BC9321;
        margin-bottom: 15px;
    }
    
    .case-meta {
        font-size: 13px;
        color: #475569;
        margin-bottom: 10px;
        line-height: 1.6;
    }
    
    .case-meta strong {
        color: #1e293b;
        display: block;
        font-size: 12px;
        text-transform: uppercase;
        margin-bottom: 2px;
    }

    /* Testimonials styling */
    .testimonial-item {
        background: #f8fafc;
        border-radius: 8px;
        padding: 20px;
        border: 1px solid rgba(0, 0, 0, 0.03);
        height: 100%;
    }
    
    .testimonial-header {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        gap: 12px;
    }
    
    .testimonial-header img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        flex-shrink: 0;
    }
    
    .testimonial-header h5 {
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 3px 0;
    }
    
    .testimonial-header .rating {
        color: #BC9321;
        font-size: 11px;
    }
    
    .testimonial-item p {
        font-size: 13px;
        color: #475569;
        line-height: 1.6;
    }
</style>
<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay">
    <h3>Chi tiết Thợ chụp</h3>
</div>
<!-- bradcam_area_end -->

<section class="barber-profile-section">
    <div class="container">
        <div class="row">
            
            <!-- Left Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <div class="profile-sidebar">
                    <div class="avatar-container">
                        <img src="images/users/<?= htmlspecialchars($barber_detail['images']) ?>" alt="<?= htmlspecialchars($barber_detail['name']) ?>">
                    </div>
                    
                    <h2><?= htmlspecialchars($barber_detail['name']) ?></h2>
                    <span class="stage-name"><?= htmlspecialchars($profile['stage_name']) ?></span>
                    
                    <div class="contact-info-list">
                        <!-- Email -->
                        <div class="contact-item">
                            <div class="icon-box">
                                <i class="ti-email"></i>
                            </div>
                            <div class="contact-detail">
                                <label>Email</label>
                                <span><?= htmlspecialchars($barber_detail['email']) ?></span>
                            </div>
                        </div>
                        
                        <!-- Điện thoại -->
                        <div class="contact-item">
                            <div class="icon-box">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="contact-detail">
                                <label>Số điện thoại</label>
                                <span><?= htmlspecialchars($barber_detail['phone']) ?></span>
                            </div>
                        </div>
                        
                        <!-- Ngày sinh -->
                        <div class="contact-item">
                            <div class="icon-box">
                                <i class="ti-gift"></i>
                            </div>
                            <div class="contact-detail">
                                <label>Ngày sinh</label>
                                <span><?= htmlspecialchars($profile['birthday']) ?></span>
                            </div>
                        </div>
                        
                        <!-- Địa chỉ -->
                        <div class="contact-item">
                            <div class="icon-box">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="contact-detail">
                                <label>Địa chỉ</label>
                                <span><?= htmlspecialchars($barber_detail['address']) ?></span>
                            </div>
                        </div>

                        <!-- Website/Portfolio -->
                        <?php if (!empty($profile['website'])): ?>
                            <div class="contact-item">
                                <div class="icon-box">
                                    <i class="ti-world"></i>
                                </div>
                                <div class="contact-detail">
                                    <label>Website</label>
                                    <a href="<?= htmlspecialchars($profile['website']) ?>" target="_blank" style="color: #BC9321;"><?= htmlspecialchars($profile['website']) ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="social-links">
                        <?php if (!empty($profile['socials']['facebook']) && $profile['socials']['facebook'] !== '#'): ?>
                            <a href="<?= htmlspecialchars($profile['socials']['facebook']) ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($profile['socials']['instagram']) && $profile['socials']['instagram'] !== '#'): ?>
                            <a href="<?= htmlspecialchars($profile['socials']['instagram']) ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($profile['socials']['behance']) && $profile['socials']['behance'] !== '#'): ?>
                            <a href="<?= htmlspecialchars($profile['socials']['behance']) ?>" target="_blank"><i class="fa fa-behance"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($profile['socials']['twitter']) && $profile['socials']['twitter'] !== '#'): ?>
                            <a href="<?= htmlspecialchars($profile['socials']['twitter']) ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Right Content Area -->
            <div class="col-lg-8 col-xl-9">
                <div class="profile-main-content">
                    
                    <!-- Navigation Tabs -->
                    <div class="profile-nav-tabs">
                        <button class="nav-tab-btn active" onclick="switchProfileTab('about-tab', this)">Giới thiệu</button>
                        <button class="nav-tab-btn" onclick="switchProfileTab('resume-tab', this)">Lý lịch & Thiết bị</button>
                        <button class="nav-tab-btn" onclick="switchProfileTab('portfolio-tab', this)">Portfolio & Tác phẩm</button>
                    </div>
                    
                    <!-- Tab 1: About Me -->
                    <div id="about-tab" class="tab-content-panel active">
                        <h3 class="section-title">Giới thiệu bản thân</h3>
                        <p class="bio-text"><?= nl2br(htmlspecialchars($profile['bio']['story'])) ?></p>
                        
                        <div class="bio-bullets">
                            <div class="row">
                                <div class="col-md-6 bio-bullet-item">
                                    <strong>Phong cách đặc trưng</strong>
                                    <span><?= htmlspecialchars($profile['bio']['style']) ?></span>
                                </div>
                                <div class="col-md-6 bio-bullet-item">
                                    <strong>Triết lý nghệ thuật</strong>
                                    <span><?= htmlspecialchars($profile['bio']['philosophy']) ?></span>
                                </div>
                                <div class="col-md-12 bio-bullet-item mt-3">
                                    <strong>Điểm khác biệt của tôi</strong>
                                    <span><?= htmlspecialchars($profile['bio']['difference']) ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="section-title">Dịch vụ & Gói cung cấp</h3>
                        <div class="services-container">
                            <?php foreach ($profile['services'] as $ser): ?>
                                <div class="service-block">
                                    <div class="service-block-header">
                                        <div class="icon-box"><i class="ti-camera"></i></div>
                                        <h4><?= htmlspecialchars($ser['title']) ?></h4>
                                    </div>
                                    <p class="bio-text" style="margin-bottom: 15px; font-size: 14px;"><?= htmlspecialchars($ser['description']) ?></p>
                                    
                                    <?php if (!empty($ser['packages'])): ?>
                                        <?php foreach ($ser['packages'] as $pkg): ?>
                                            <div class="package-item">
                                                <div class="package-info">
                                                    <h5><?= htmlspecialchars($pkg['name']) ?></h5>
                                                    <p><?= htmlspecialchars($pkg['features']) ?></p>
                                                </div>
                                                <div class="package-price"><?= htmlspecialchars($pkg['price']) ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <?php if (!empty($profile['workflow'])): ?>
                            <h3 class="section-title">Quy trình làm việc</h3>
                            <div class="workflow-timeline">
                                <?php foreach ($profile['workflow'] as $flow): ?>
                                    <div class="workflow-step-card">
                                        <h4><?= htmlspecialchars($flow['step']) ?></h4>
                                        <p><?= htmlspecialchars($flow['detail']) ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($profile['testimonials'])): ?>
                            <h3 class="section-title">Đánh giá từ khách hàng</h3>
                            <div class="row mt-3">
                                <?php foreach ($profile['testimonials'] as $test): ?>
                                    <div class="col-md-6 mb-3">
                                        <div class="testimonial-item">
                                            <div class="testimonial-header">
                                                <img src="images/users/<?= htmlspecialchars($test['avatar']) ?>" onerror="this.src='images/users/t1.jpg'" alt="<?= htmlspecialchars($test['client_name']) ?>">
                                                <div>
                                                    <h5><?= htmlspecialchars($test['client_name']) ?></h5>
                                                    <div class="rating">
                                                        <?php for ($i = 0; $i < $test['rating']; $i++): ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>"<?= htmlspecialchars($test['comment']) ?>"</p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Tab 2: Resume & Skills & Equipment -->
                    <div id="resume-tab" class="tab-content-panel">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="section-title">Kinh nghiệm & Thành tích</h3>
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <h4>Số năm hoạt động</h4>
                                        <span class="timeline-meta"><?= htmlspecialchars($profile['experience']['years']) ?></span>
                                        <p>Thời gian gắn bó và sáng tạo không ngừng nghỉ với ống kính nghệ thuật.</p>
                                    </div>
                                    <?php if (!empty($profile['experience']['projects'])): ?>
                                        <div class="timeline-item">
                                            <h4>Dự án nổi bật</h4>
                                            <p><?= implode('<br>', array_map('htmlspecialchars', $profile['experience']['projects'])) ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($profile['experience']['awards'])): ?>
                                        <div class="timeline-item">
                                            <h4>Giải thưởng đạt được</h4>
                                            <p><?= implode('<br>', array_map('htmlspecialchars', $profile['experience']['awards'])) ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($profile['experience']['clients'])): ?>
                                        <div class="timeline-item">
                                            <h4>Khách hàng tiêu biểu</h4>
                                            <p><?= implode(', ', array_map('htmlspecialchars', $profile['experience']['clients'])) ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($profile['experience']['media'])): ?>
                                        <div class="timeline-item">
                                            <h4>Truyền thông / Báo chí đưa tin</h4>
                                            <p><?= implode('<br>', array_map('htmlspecialchars', $profile['experience']['media'])) ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h3 class="section-title">Học vấn & Chứng chỉ</h3>
                                <div class="timeline">
                                    <?php foreach ($profile['education'] as $edu): ?>
                                        <div class="timeline-item">
                                            <h4><?= htmlspecialchars($edu['degree']) ?></h4>
                                            <span class="timeline-meta"><?= htmlspecialchars($edu['school']) ?> (<?= htmlspecialchars($edu['year']) ?>)</span>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php if (!empty($profile['certifications'])): ?>
                                        <div class="timeline-item">
                                            <h4>Chứng chỉ chuyên môn</h4>
                                            <p><?= implode('<br>', array_map('htmlspecialchars', $profile['certifications'])) ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="skills-software-box">
                                    <h4>Kỹ năng chuyên môn</h4>
                                    <div>
                                        <?php foreach ($profile['skills'] as $skill): ?>
                                            <span class="skill-tag"><?= htmlspecialchars($skill) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="skills-software-box">
                                    <h4>Phần mềm sử dụng</h4>
                                    <div>
                                        <?php foreach ($profile['software'] as $soft): ?>
                                            <span class="skill-tag software-tag"><?= htmlspecialchars($soft) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="skills-software-box" style="background: #ffffff; border: 1px solid rgba(0,0,0,0.05);">
                                    <h4 style="border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 10px; margin-bottom: 15px;"><i class="fa fa-camera" style="color: #BC9321;"></i> Trang thiết bị sử dụng</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h5 style="font-size: 13px; font-weight: 700; color: #222; margin-bottom: 8px;">Thân máy (Cameras)</h5>
                                            <?php foreach ($profile['equipment']['cameras'] as $cam): ?>
                                                <div class="gear-list-item"><i class="fa fa-circle"></i> <?= htmlspecialchars($cam) ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 style="font-size: 13px; font-weight: 700; color: #222; margin-bottom: 8px;">Ống kính & Ánh sáng</h5>
                                            <?php foreach (array_merge($profile['equipment']['lenses'], $profile['equipment']['lighting']) as $lens): ?>
                                                <div class="gear-list-item"><i class="fa fa-circle"></i> <?= htmlspecialchars($lens) ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tab 3: Portfolio & Before After & Case Studies -->
                    <div id="portfolio-tab" class="tab-content-panel">
                        
                        <h3 class="section-title">Bộ sưu tập tác phẩm tiêu biểu</h3>
                        
                        <!-- Categorized Sub-tabs -->
                        <div class="portfolio-cat-nav">
                            <button class="portfolio-cat-btn active" onclick="filterPortfolio('all', this)">Tất cả tác phẩm</button>
                            <?php if (!empty($profile['portfolio_categories'])): ?>
                                <?php foreach ($profile['portfolio_categories'] as $index => $cat): ?>
                                    <button class="portfolio-cat-btn" onclick="filterPortfolio('cat-<?= $index ?>', this)"><?= htmlspecialchars($cat['name']) ?></button>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Grid Items -->
                        <div id="portfolio-all" class="portfolio-cat-content active">
                            <?php 
                            // Merge all images from all categories to show in "All" view
                            $all_images = [];
                            if (!empty($profile['portfolio_categories'])) {
                                foreach ($profile['portfolio_categories'] as $cat) {
                                    $all_images = array_merge($all_images, $cat['images']);
                                }
                            }
                            // Unique
                            $all_images = array_values(array_unique($all_images));
                            foreach ($all_images as $img): ?>
                                <a href="images/users/<?= htmlspecialchars($img) ?>" class="popup-image portfolio-item">
                                    <img src="images/users/<?= htmlspecialchars($img) ?>" alt="Portfolio Work" onerror="this.src='images/users/t1.jpg'">
                                    <div class="overlay-zoom">
                                        <i class="ti-zoom-in"></i>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        
                        <?php if (!empty($profile['portfolio_categories'])): ?>
                            <?php foreach ($profile['portfolio_categories'] as $index => $cat): ?>
                                <div id="portfolio-cat-<?= $index ?>" class="portfolio-cat-content">
                                    <?php foreach ($cat['images'] as $img): ?>
                                        <a href="images/users/<?= htmlspecialchars($img) ?>" class="popup-image portfolio-item">
                                            <img src="images/users/<?= htmlspecialchars($img) ?>" alt="Portfolio Work" onerror="this.src='images/users/t1.jpg'">
                                            <div class="overlay-zoom">
                                                <i class="ti-zoom-in"></i>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                        <?php if (!empty($profile['before_after'])): ?>
                            <h3 class="section-title">So sánh Hậu kỳ (Before & After)</h3>
                            <div class="ba-slider-container">
                                <?php foreach ($profile['before_after'] as $ba): ?>
                                    <div class="ba-card">
                                        <h5><?= htmlspecialchars($ba['title']) ?></h5>
                                        <div class="ba-images">
                                            <div class="ba-img-box">
                                                <img src="images/users/<?= htmlspecialchars($ba['before']) ?>" onerror="this.src='images/users/t3.jpg'" alt="Before">
                                                <span class="label">Before (Ảnh gốc)</span>
                                            </div>
                                            <div class="ba-img-box">
                                                <img src="images/users/<?= htmlspecialchars($ba['after']) ?>" onerror="this.src='images/users/t4.jpg'" alt="After">
                                                <span class="label">After (Hậu kỳ)</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($profile['case_studies'])): ?>
                            <h3 class="section-title">Case Studies tiêu biểu</h3>
                            <div class="row">
                                <?php foreach ($profile['case_studies'] as $cs): ?>
                                    <div class="col-md-12">
                                        <div class="case-card">
                                            <h4><?= htmlspecialchars($cs['title']) ?></h4>
                                            <div class="row">
                                                <div class="col-md-4 case-meta">
                                                    <strong>Thử thách (Challenge)</strong>
                                                    <span><?= htmlspecialchars($cs['challenge']) ?></span>
                                                </div>
                                                <div class="col-md-4 case-meta">
                                                    <strong>Giải pháp (Solution)</strong>
                                                    <span><?= htmlspecialchars($cs['solution']) ?></span>
                                                </div>
                                                <div class="col-md-4 case-meta">
                                                    <strong>Kết quả (Result)</strong>
                                                    <span><?= htmlspecialchars($cs['result']) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Tab Switcher Script -->
<script>
    function switchProfileTab(tabId, btnElement) {
        // Hide all tabs
        var tabs = document.querySelectorAll('.tab-content-panel');
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });
        
        // Remove active class from buttons
        var buttons = document.querySelectorAll('.nav-tab-btn');
        buttons.forEach(function(btn) {
            btn.classList.remove('active');
        });
        
        // Show selected tab and active button
        document.getElementById(tabId).classList.add('active');
        btnElement.classList.add('active');
    }
    
    function filterPortfolio(catId, btnElement) {
        // Hide all category grids
        var contents = document.querySelectorAll('.portfolio-cat-content');
        contents.forEach(function(grid) {
            grid.classList.remove('active');
        });
        
        // Remove active class from category buttons
        var buttons = document.querySelectorAll('.portfolio-cat-btn');
        buttons.forEach(function(btn) {
            btn.classList.remove('active');
        });
        
        // Show selected grid and activate button
        if (catId === 'all') {
            document.getElementById('portfolio-all').classList.add('active');
        } else {
            document.getElementById(catId).classList.add('active');
        }
        btnElement.classList.add('active');
    }
</script>
