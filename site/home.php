 <?php require_once "layout/slider.php"; ?>
 <?php
    $service1 = service_list_limit(0, 5);
    $service2 = service_list_limit(5, 5);
    $gallery = library_list_limit(0, 5);
    $barber = barber_limit(0, 4);
    $setting = list_limit_setting();
    ?>
 <!-- about_area_start -->
 <style>
     #contact-form-popup {
         max-width: 640px;
         margin: 0 auto;
         background: #fff;
         padding: 30px;
         border-radius: 10px;
         box-shadow: #ddd;
     }
 </style>
 <div class="about_area">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-xl-6 col-lg-6">
                 <div class="about_thumb">
                     <img src="images/about/abc2.jpg" alt="" />
                     <div class="opening_hour text-center">
                         <i class="flaticon-clock"></i>
                         <h3>Giờ hoạt động</h3>
                         <p>
                             Mon-Fri (8.30-20.00) <br />
                             Sat (9.00-5.00)
                         </p>
                     </div>
                 </div>
             </div>
             <div class="col-xl-6 col-lg-6">
                 <div class="about_info">
                     <div class="section_title mb-20px">
                         <span>Về chúng tôi</span>
                         <h3><?= $setting['slogan'] ?></h3>
                     </div>
                     <p>
                         Mỗi khoảnh khắc trôi qua đều mang một câu chuyện duy nhất. Tại DakeStudio, chúng tôi không chỉ bấm máy, chúng tôi lưu giữ thanh xuân, đong đầy cảm xúc và bắt trọn những nụ cười tự nhiên nhất của bạn. 
                         Bằng sự tận tâm và tư duy nghệ thuật khác biệt, DakeStudio cam kết mang đến những bộ ảnh độc bản, tinh tế, nơi mỗi khung hình là một tác phẩm nghệ thuật kể về chính bạn.

                     </p>
                     <a href="#test-form" class="boxed-btn3 popup-with-form">Đặt Lịch Ngay</a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- about_area_end -->
 <div class="service_area">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="section_title2 text-center mb-90">

                     <h3>Dịch vụ của chúng tôi</h3>
                 </div>
             </div>
         </div>
         <div class="white_bg_pos">
             <div class="row">
                 <div class="col-xl-6">
                     <?php foreach ($service1 as $s1) : ?>
                         <div class="single_service d-flex justify-content-between align-items-center">
                             <div class="service_inner d-flex align-items-center">
                                 <div class="thumb">
                                     <img src="images/products/<?= $s1['images'] ?>" class="rounded-circle" alt="" width="58" height="58" />
                                 </div>
                                 <span><?= $s1['name'] ?></span>
                             </div>
                             <p>……………………….<?= number_format($s1['price'], 0, ',', '.') . 'đ' ?></p>
                         </div>
                     <?php endforeach; ?>
                 </div>
                 <div class="col-xl-6">
                     <?php foreach ($service2 as $s2) : ?>
                         <div class="single_service d-flex justify-content-between align-items-center">
                             <div class="service_inner d-flex align-items-center">
                                 <div class="thumb">
                                     <img src="images/products/<?= $s2['images'] ?>" class="rounded-circle" alt="" width="58" height="58" />
                                 </div>
                                 <span><?= $s2['name'] ?></span>
                             </div>
                             <p>……………………….<?= number_format($s2['price'], 0, ',', '.') . 'đ' ?></p>
                         </div>
                     <?php endforeach; ?>
                 </div>
             </div>
             <div class="row">
                 <div class="col-xl-12">
                     <div class="book_btn text-center">
                         <a class="boxed-btn3 popup-with-form" href="#test-form">Đặt lịch ngay</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- gallery_area_start -->
 <div class="gallery_area">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="section_title2 text-center mb-90">

                     <h3>Hình ảnh khách hàng trải nghiệm</h3>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-xl-12">
                 <div class="gallery_active owl-carousel">
                     <?php foreach ($gallery as $g) : ?>
                         <div class="single_gallery">
                             <div class="thumb">
                                 <img src="images/sliders/<?= $g['images'] ?>" alt="" height="426" />
                                 <div class="image_hover">
                                     <a class="popup-image" href="images/sliders/<?= $g['images'] ?>">
                                         <i class="ti-plus"></i>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     <?php endforeach; ?>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- gallery_area_end -->

 <!-- cutter_muster_start -->
 <div class="cutter_muster">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="section_title2 text-center mb-90">

                     <h3>Thợ chụp của chúng tôi</h3>
                 </div>
             </div>
         </div>
         <div class="row">
             <?php foreach ($barber as $b) : ?>
                 <div class="col-xl-3 col-md-6 col-lg-3">
                     <div class="single_master">
                         <div class="thumb">
                             <img src="images/users/<?= $b['images'] ?>" alt="" />
                         </div>
                         <div class="master_name text-center">
                             <h3><?= $b['name'] ?></h3>
                             <p>Thợ chụp ảnh</p>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
     </div>
 </div>
 <!-- cutter_muster_end -->

 <!-- find_us_area start -->
 <div class="find_us_area find_bg_1">
     <div class="container">
         <div class="row">
             <div class="col-xl-5 offset-xl-7 col-lg-6 offset-lg-6">
                 <div class="find_info">
                     <h3 class="find_info_title">Chúng tôi ở đâu?</h3>
                     <div class="single_find d-flex">
                         <div class="icon">
                             <i class="flaticon-placeholder"></i>
                         </div>
                         <div class="find_text">
                             <h3>Địa chỉ</h3>
                             <p>154, Cầu giấy, Hà Nội</p>
                         </div>
                     </div>
                     <div class="single_find d-flex">
                         <div class="icon">
                             <i class="flaticon-phone-call"></i>
                         </div>
                         <div class="find_text">
                             <h3>Gọi cho chúng tôi</h3>
                             <p>+84 78 478 8768</p>
                         </div>
                     </div>
                     <div class="single_find d-flex">
                         <div class="icon">
                             <i class="flaticon-paper-plane"></i>
                         </div>
                         <div class="find_text">
                             <h3>Gửi thư cho chúng tôi</h3>
                             <p>studiochup3@gmail.com</p>
                         </div>
                     </div>
                     <div class="single_find">
                         <div class="book_btn">
                             <a class="popup-with-form" href="#test-form">Đặt lịch ngay</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <?php $allServices = array_merge($service1, $service2); ?>
 <div id="contact-form-popup" class="white-popup-block mfp-hide">
     <div class="section_title mb-20px" style="text-align:center;">
         <h3 style="margin-bottom:8px;">Liên hệ tư vấn dịch vụ</h3>
         <p>Điền thông tin, chúng tôi sẽ gọi lại ngay.</p>
     </div>

     <form method="post" action="" id="contactOnlyForm" novalidate>
         <div class="row">
             <div class="col-md-6 mb-3">
                 <label>Họ và tên <span style="color:#e74c3c">*</span></label>
                 <input type="text" name="fullname" class="form-control" placeholder="Nguyễn Văn A" required minlength="2" maxlength="100">
             </div>
             <div class="col-md-6 mb-3">
                 <label>Số điện thoại <span style="color:#e74c3c">*</span></label>
                 <input type="tel" name="phone" class="form-control" placeholder="09xxxxxxxx"
                     required pattern="^(0|\+84)(\d){8,10}$" title="Nhập SĐT hợp lệ (bắt đầu 0 hoặc +84)">
             </div>
             <div class="col-md-12 mb-3">
                 <label>Email</label>
                 <input type="email" name="email" class="form-control" placeholder="you@example.com">
             </div>
             <div class="col-md-12 mb-3">
                 <label>Chọn dịch vụ</label>
                 <select name="service" class="form-control">
                     <option value="">— Chọn dịch vụ quan tâm —</option>
                     <?php foreach ($allServices as $sv): ?>
                         <option value="<?= htmlspecialchars($sv['name']) ?>">
                             <?= htmlspecialchars($sv['name']) ?>
                         </option>
                     <?php endforeach; ?>
                 </select>
             </div>
             <div class="col-md-12 mb-3">
                 <label>Ghi chú</label>
                 <textarea name="message" class="form-control" rows="4" placeholder="Nội dung cần tư vấn..."></textarea>
             </div>
         </div>
         <input type="hidden" name="hp_token" value="<?= md5(date('Y-m-d') . '_contact_form') ?>">
         <div class="d-flex justify-content-between align-items-center mt-2">
             <small><em>Chúng tôi bảo mật thông tin của bạn.</em></small>
             <button type="submit" class="boxed-btn3">Gửi yêu cầu</button>
         </div>
     </form>
 </div>
 <!-- jQuery  -->
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

 <!-- Magnific Popup -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

 <script>
     jQuery(window).on('load', function() {
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
     });
 </script>

 <script>
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
 </script>

 <!-- find_us_area_end -->