<!-- footer_premium start -->
<style>
.footer_premium {
    background: #111111;
    color: #888888;
    padding-top: 80px;
    padding-bottom: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    font-family: 'Montserrat', sans-serif;
}
.footer_premium .footer_widget_premium {
    margin-bottom: 40px;
}
.footer_premium .footer_title_premium {
    font-family: 'Playfair Display', serif;
    font-size: 18px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 12px;
}
.footer_premium .footer_title_premium::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 35px;
    height: 1.5px;
    background: #b89d70;
}
.footer_premium .footer_text_premium {
    font-size: 14px;
    line-height: 1.8;
    color: #888888;
}
.footer_premium .footer_text_premium a {
    color: #b89d70;
    text-decoration: none;
    transition: color 0.3s;
}
.footer_premium .footer_text_premium a:hover {
    color: #ffffff;
}
.footer_premium ul {
    padding: 0;
    list-style: none;
    margin: 0;
}
.footer_premium ul li {
    margin-bottom: 12px;
}
.footer_premium ul li a {
    font-size: 14px;
    color: #888888;
    text-decoration: none;
    transition: all 0.3s;
    display: inline-block;
}
.footer_premium ul li a:hover {
    color: #b89d70;
    transform: translateX(4px);
}
.footer_premium .socail_links_premium ul {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    padding: 0;
    list-style: none;
}
.footer_premium .socail_links_premium ul li a {
    width: 38px;
    height: 38px;
    border-radius: 4px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #888888 !important;
    font-size: 16px;
    transition: all 0.3s;
    text-decoration: none;
}
.footer_premium .socail_links_premium ul li a:hover {
    background: #b89d70;
    border-color: #b89d70;
    color: #ffffff !important;
    transform: translateY(-3px);
}
.footer_premium .newsletter_form_premium {
    position: relative;
    margin-top: 20px;
}
.footer_premium .newsletter_form_premium input {
    width: 100%;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    padding: 12px 18px;
    padding-right: 100px;
    color: #ffffff;
    font-size: 13px;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.3s;
}
.footer_premium .newsletter_form_premium input:focus {
    border-color: #b89d70;
}
.footer_premium .newsletter_form_premium button {
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    background: #b89d70;
    border: none;
    color: #ffffff;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 0 20px;
    border-radius: 0 4px 4px 0;
    transition: background 0.3s;
    cursor: pointer;
}
.footer_premium .newsletter_form_premium button:hover {
    background: #ffffff;
    color: #111111;
}
.footer_premium .copy_right_premium {
    border-top: 1px solid rgba(255,255,255,0.05);
    padding-top: 25px;
    margin-top: 40px;
    text-align: center;
    font-size: 13px;
    color: #666666;
}
</style>

<footer class="footer_premium">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="footer_widget_premium">
                    <h3 class="footer_title_premium">Đặt Lịch Hẹn</h3>
                    <p class="footer_text_premium">
                        Hãy để DakeStudio lưu giữ những khoảnh khắc tuyệt vời của bạn.<br/><br/>
                        <a class="popup-with-form" href="#test-form" style="font-weight:600; text-transform:uppercase; letter-spacing:1px; border-bottom:1.5px solid #b89d70; padding-bottom:2px;">Đặt Lịch Ngay</a>
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="footer_widget_premium">
                    <h3 class="footer_title_premium">Liên Hệ</h3>
                    <p class="footer_text_premium">
                        154, Cầu Giấy, Hà Nội <br />
                        Hotline: <a href="tel:+84784788768">+84 78 478 8768</a> <br />
                        Email: <a href="mailto:studiochup3@gmail.com">studiochup3@gmail.com</a>
                    </p>
                    <div class="socail_links_premium">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-lg-2">
                <div class="footer_widget_premium">
                    <h3 class="footer_title_premium">Menu</h3>
                    <ul>
                        <li><a href="<?= ROOT ?>">Trang Chủ</a></li>
                        <li><a href="<?= ROOT ?>?page=introduce">Giới Thiệu</a></li>
                        <li><a href="<?= ROOT ?>?page=service">Dịch Vụ</a></li>
                        <li><a href="<?= ROOT ?>?page=blog">Tin Tức</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-lg-4">
                <div class="footer_widget_premium">
                    <h3 class="footer_title_premium">Bản Tin</h3>
                    <p class="footer_text_premium" style="margin-bottom: 0;">
                        Đăng ký để nhận tin tức ưu đãi và các concept chụp ảnh mới nhất từ chúng tôi.
                    </p>
                    <form action="#" class="newsletter_form_premium">
                        <input type="email" placeholder="Nhập địa chỉ email của bạn" required />
                        <button type="submit">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="copy_right_premium">
                    <p>
                        Copyright &copy;<?= date('Y') ?> DakeStudio. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer_premium end -->
<!-- link that opens popup -->
<div id="test-form" class="white-popup-block mfp-hide">
    <div class="popup_box">
        <h3>Đặt lịch hẹn</h3>
        <h4>Yêu cầu: nhập số điện thoại đúng với tài khoản đăng ký</h4>
        <form class="needs-validation form-contact" action="" method="POST" novalidate>
            <div class="row">
                <div class="col-xl-6 col-md-6 form-group">
                    <label>Nhân viên</label>
                    <select class="form-control" name="id_barber" id="default-select" required>
                        <option value="">Chọn nhân viên</option>
                        <?php foreach ($barber as $b) : ?>
                            <option value="<?= $b['id'] ?>"><?= $b['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Vui lòng chọn nhân viên
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 form-group">
                    <input type="date" name="day" id="day" class="form-control" min="<?= date('Y-m-d') ?>" required>
                    <div class="invalid-feedback">
                        Vui lòng chọn ngày hẹn
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Chọn dịch vụ (single) -->
                <div class="col-xl-6 col-md-6 select-service form-group">
                    <label>Dịch vụ</label>
                    <select class="form-control" name="id_service" id="id_service" required>
                        <option value="">Chọn dịch vụ</option>
                        <?php foreach ($service as $s): ?>
                            <option
                                value="<?= (int)$s['id'] ?>"
                                data-price="<?= (float)$s['price'] ?>">
                                <?= htmlspecialchars($s['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($errors['errors_service'])): ?>
                        <p class="text-danger mt-2"><?= $errors['errors_service'] ?></p>
                    <?php endif; ?>
                    <div class="invalid-feedback">Vui lòng chọn dịch vụ</div>
                </div>

                <!-- Chọn giờ -->
                <div class="col-xl-6 col-md-6 form-group" id="result">
                    <label>Giờ hẹn</label>
                    <select name="id_time" id="id_time" class="form-control" required>
                        <option value="">Chọn giờ hẹn</option>
                        <?php foreach ($time as $t): ?>
                            <option value="<?= (int)$t['id'] ?>"><?= htmlspecialchars($t['time']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Vui lòng chọn giờ hẹn</div>
                </div>

                <!-- Giá dịch vụ -->
                <div class="col-xl-6 col-md-6 form-group">
                    <label>Giá dịch vụ</label>
                    <input type="text" id="service_price_display" class="form-control" value="0" readonly>
                    <input type="hidden" name="service_price" id="service_price">
                </div>

                <!-- Hình thức thanh toán -->
                <div class="col-xl-6 col-md-6 form-group">
                    <label>Hình thức thanh toán</label>
                    <select name="payment_method" id="payment_method" class="form-control">
                        <option value="100" data-rate="100">CK full</option>
                        <option value="20" data-rate="20">Đặt cọc 20%</option>
                        <option value="30" data-rate="30">Đặt cọc 30%</option>
                        <option value="50" data-rate="50">Đặt cọc 50%</option>
                    </select>
                </div>

                <!-- Số tiền cần thanh toán -->
                <div class="col-12 col-xl-12 col-md-12 form-group">
                    <label>Số tiền cần thanh toán</label>
                    <input type="text" id="due_amount_display" class="form-control" value="0" readonly>
                    <input type="hidden" name="due_amount" id="due_amount">
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-6 form-group">
                    <label>Họ tên</label>
                    <input type="text" name="name" value="<?= isset($name) ? $name : '' ?>" placeholder="Tên của bạn" class="form-control" title="Họ tên không bao gồm số" pattern="[a-zA-Z\s'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽêẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ? ?ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ? ??ÊỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]{1,20}" required />
                    <div class="invalid-feedback">
                        Họ tên không đúng định dạng
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" value="<?= isset($phone) ? $phone : '' ?>" placeholder="Số điện thoại" class="form-control" pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" required />
                    <?php if (isset($errors['errors_phone'])) : ?>
                        <p class="text-danger mt-2"><?= $errors['errors_phone'] ?></p>
                    <?php endif; ?>
                    <div class="invalid-feedback">
                        SĐT không hợp lệ
                    </div>
                </div>
            </div>
            <div class="row mt-3" id="vnpay" style="margin-top: 20px; text-align: center;">
                <div class="col-xl-12">

                    <a href="" style="
            display: flex;
            justify-content: center;
            gap: 12px;
            background-color: #0066b3;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        " onmouseover="this.style.backgroundColor='#005099'" onmouseout="this.style.backgroundColor='#0066b3'" target="_blank">
                        <img src="images/vnpay.jpg" alt="VNPAY" style="width: 5%">
                        <span style="font-size: 15px">Thanh toán qua VNPAY</span>
                    </a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-xl-12">
                    <button type="submit" name="btnBooking" class="boxed-btn3">Đặt lịch</button>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- form itself end-->

<!-- form itself end -->
<!-- form-login -->
<div id="login-form" class="white-popup-block mfp-hide">
    <div class="popup_box pb-3">
        <div class="popup_inner">
            <div class="flip">
                <div class="card border-0">
                    <div class="face front">
                        <form class="needs-validation form-contact" action="" method="POST" novalidate>
                            <h3>Đăng nhập</h3>
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <img src="images/ba.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-xd-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Tên đăng nhập" value="<?= isset($phone) ? $phone : '' ?>" autofocus required>
                                        <?php if (isset($error['phone'])) : ?>
                                            <p class="text-danger mt-2"><?= $error['phone'] ?></p>
                                        <?php endif; ?>
                                        <div class="invalid-feedback">
                                            Vui lòng nhập tên đăng nhập
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Mật khẩu"
                                            title="Mật khẩu chứa ít nhất 6 ký tự" name="password" minlength="6" value="<?= isset($password) ? $password : '' ?>" required>
                                        <?php if (isset($error['password'])) : ?>
                                            <p class="text-danger mt-2"><?= $error['password'] ?></p>
                                        <?php endif; ?>
                                        <div class="invalid-feedback">
                                            Mật khẩu chứa ít nhất 6 ký tự
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input style="width:auto;height:auto; margin-right: 10px;" id="my-input" type="checkbox"
                                            name="rebarber"><label for="my-input">Nhớ đăng nhập</label>
                                    </div>
                                    <button type="submit" name="btnLogin" class="boxed-btn3 mb-3">Đăng nhập</button>
                                    <a href="<?= ROOT ?>site/forgot-password.php">Quên mật khẩu?</a>
                                    <button type="button" class="btn rounded-0 border-0" data-toggle="flip">Bạn chưa có tài khoản? Đăng ký</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="face back">
                        <form class="needs-validation form-contact" action="" method="POST" novalidate enctype="multipart/form-data">
                            <h3>Đăng ký</h3>
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" pattern="[a-zA-Z\s'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽêẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ? ?ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ? ??ỀÊỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]{1,20}" title="Họ tên không bao gồm số"
                                            placeholder="Nhập họ tên" value="<?= isset($name) ? $name : '' ?>" required>
                                        <div class="invalid-feedback">
                                            Họ tên không bao gồm số
                                        </div>
                                        <?php if (isset($errors['errors_name'])) : ?>
                                            <p class="text-danger mt-2"><?= $errors['errors_name'] ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="tel" name="phone" id="phone" class="form-control" pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" placeholder="Nhập số điện thoại" value="<?= isset($phone) ? $phone : '' ?>" required>
                                        <div class="invalid-feedback">
                                            Số điện thoại không đúng định dạng
                                        </div>
                                        <?php if (isset($errors['errors_phone'])) : ?>
                                            <p class="text-danger mt-2"><?= $errors['errors_phone'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file border" id="images" name="images">
                                        <?php if (isset($errors['errors_img'])) : ?>
                                            <p class="text-danger mt-2"><?= $errors['errors_img'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xd-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" title="Mật khẩu chứa ít nhất 6 ký tự" minlength="6" placeholder="Nhập mật khẩu" value="<?= isset($password) ? $password : '' ?>" required>
                                        <div class="invalid-feedback">
                                            Mật khẩu chứa ít nhất 6 ký tự
                                        </div>
                                        <?php if (isset($errors['errors_password'])) : ?>
                                            <p class="text-danger mt-2"><?= $errors['errors_password'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" value="<?= isset($email) ? $email : '' ?>" required>
                                        <div class="invalid-feedback">
                                            Địa chỉ email không đúng định dạng
                                        </div>
                                        <?php if (isset($errors['errors_email'])) : ?>
                                            <p class="text-danger mt-2"><?= $errors['errors_email'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="account" id="account" class="form-control" placeholder="Nhập tên tài khoản" value="<?= isset($account) ? $account : '' ?>" required>
                                        <div class="invalid-feedback">
                                            Vui lòng nhập tên tài khoản
                                        </div>
                                        <?php if (isset($errors['errors_account'])) : ?>
                                            <p class="text-danger mt-2"><?= $errors['errors_account'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" minlength="15" name="address" rows="2" placeholder="Địa chỉ..." required><?= isset($address) ? $address : '' ?></textarea>
                                        <div class="invalid-feedback">
                                            Địa chỉ tối thiểu 15 ký tự
                                        </div>
                                        <?php if (isset($errors['errors_address'])) : ?>
                                            <p class="text-danger mt-2"><?= $errors['errors_address'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnRegister" class="boxed-btn3 mb-3">Đăng ký</button>
                            <button type="button" class="btn rounded-0 border-0" data-toggle="flip">Bạn đã có tài khoản? Đăng nhập</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- form-login -->

<script src="content/js/vendor/jquery-2.1.3.min.js"></script>
<!-- JS here -->
<script src="content/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- <script src="content/js/vendor/jquery-1.12.4.min.js"></script> -->
<script src="content/js/popper.min.js"></script>
<script src="content/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="content/js/owl.carousel.min.js"></script>
<script src="content/js/isotope.pkgd.min.js"></script>
<script src="content/js/ajax-form.js"></script>
<script src="content/js/waypoints.min.js"></script>
<script src="content/js/jquery.counterup.min.js"></script>
<script src="content/js/imagesloaded.pkgd.min.js"></script>
<script src="content/js/scrollIt.js"></script>
<script src="content/js/jquery.scrollUp.min.js"></script>
<script src="content/js/wow.min.js"></script>
<script src="content/js/nice-select.min.js"></script>
<script src="content/js/jquery.slicknav.min.js"></script>
<script src="content/js/jquery.magnific-popup.min.js"></script>
<script src="content/js/plugins.js"></script>
<script src="content/js/gijgo.min.js"></script>
<script src="content/js/pgwslideshow.min.js"></script>
<script src="content/js/toastr.min.js"></script>
<script src="content/js/jquery.rateit.min.js"></script>
<!--contact js-->
<script src="content/js/contact.js"></script>
<script src="content/js/jquery.ajaxchimp.min.js"></script>
<script src="content/js/jquery.form.js"></script>
<script src="content/js/jquery.validate.min.js"></script>
<script src="content/js/mail-script.js"></script>
<script src="content/js/bootstrap-input-spinner.js"></script>

<script src="content/js/main.js"></script>
<?php if (isset($_SESSION['message'])) {
    $mes = $_SESSION['message'];
    echo "<script>
    $(function () {
        toastr.success('$mes');
    });
</script>";
} ?>

<script>
    $(document).ready(function() {
        $(".mul-select").select2({
            placeholder: "Chọn dịch vụ",
            tags: true,
            tokenSeparators: ['/', ',', ',', " "]
        });
        $('#default-select').change(function() {
            var id = $('#default-select').val();
            var day = $('#day').val();
            $.post("site/xulyTime.php", {
                id: id,
                day: day
            }, function(data) {
                $('#result').html(data);
            });
        });
        $('#day').change(function() {
            var id = $('#default-select').val();
            var day = $('#day').val();
            $.post("site/xulyTime.php", {
                id: id,
                day: day
            }, function(data) {
                $('#result').html(data);
            });
        });
        $('#sort').change(function() {
            var sort = $('#sort').val();
            $.post("site/xulySort.php", {
                sort: sort
            }, function(data) {
                $('#list_pro').html(data);
            });
        });
        $('#sortCate').change(function() {
            var sort = $('#sortCate').val();
            var id = $('#id_cate').val();
            $.post("site/xulySortCate.php", {
                sort: sort,
                id: id
            }, function(data) {
                $('#list_pro_cate').html(data);
            });
        });
        $('.flip [data-toggle="flip"]').click(function() {
            $('.card').toggleClass('flipped');

        });
    });
    //Validate form
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    jQuery(function($) {
        function formatVND(n) {
            return Number(n || 0).toLocaleString('vi-VN') + 'đ';
        }

        function recalc() {
            var $opt = $('#id_service option:selected');
            var price = parseFloat($opt.data('price')) || 0;
            var rate = parseFloat($('#payment_method option:selected').data('rate')) || 100;
            var due = Math.round(price * rate / 100);

            $('#service_price_display').val(price ? formatVND(price) : '0');
            $('#due_amount_display').val(due ? formatVND(due) : '0');

            $('#service_price').val(price);
            $('#due_amount').val(due);
        }

        $('#id_service, #payment_method').on('change', recalc);
        recalc(); // chạy lần đầu
    });
</script>

<script>
    jQuery(function($) {
        // Hàm đọc số từ hidden (không format)
        function getDueAmount() {
            var v = $('#due_amount').val(); // hidden bạn đã có
            return parseInt(v || '0', 10);
        }

        // Cập nhật link VNPAY động
        $('#vnpay a').on('click', function(e) {
            var amount = getDueAmount();
            if (!amount || amount <= 0) {
                e.preventDefault();
                alert('Vui lòng chọn dịch vụ / hình thức thanh toán để có số tiền cần thanh toán.');
                return false;
            }
            // cập nhật href với amount
            var base = 'site/vnpay.php';
            // bạn có thể truyền thêm mô tả/txnRef ở đây nếu muốn
            var url = base + '?amount=' + encodeURIComponent(amount) + '&redirect=true';
            this.href = url;
        });
    });
</script>


</body>

</html>