# 📸 Chụp Ảnh Studio - Website Booking Thợ Chụp Studio Cho Công Ty Cổ Phần Dake

![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-blue?style=flat&logo=bootstrap)
![PHP](https://img.shields.io/badge/PHP-7.4-blue?style=flat&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange?style=flat&logo=mysql)

## 📖 Mục lục

- [Giới thiệu](#-giới-thiệu)
- [Tính năng chính](#-tính-năng-chính)
- [Công nghệ sử dụng](#-công-nghệ-sử-dụng)
- [Yêu cầu hệ thống](#-yêu-cầu-hệ-thống)
- [Cấu trúc thư mục](#-cấu-trúc-thư-mục)
- [Hướng dẫn cài đặt](#-hướng-dẫn-cài-đặt)
- [Trạng thái hoàn thành](#-trạng-thái-hoàn-thành)
- [Đóng góp](#-đóng-góp)
- [Giấy phép](#-giấy-phép)

---

## ✨ Giới thiệu

Dự án **Chụp Ảnh Studio** là một website PHP thuần dành cho dịch vụ studio chụp ảnh, bao gồm:

- Trang giới thiệu dịch vụ, portfolio, blog và thông tin liên hệ.
- Trang danh sách dịch vụ, sản phẩm, đánh giá và trang chi tiết.
- Khu vực quản trị admin để quản lý dịch vụ, tin tức, khách hàng, lịch hẹn và đánh giá.
- Hỗ trợ đặt lịch chụp, liên hệ và quản lý thông tin người dùng.

Dự án sử dụng PHP, MySQL, HTML/CSS/JS và thư viện PHPMailer để gửi email.

---

## 🚀 Tính năng chính

### 🧑‍💻 Frontend (Khách hàng)

- Trang chủ, giới thiệu, dịch vụ, blog và liên hệ.
- Xem chi tiết sản phẩm/dịch vụ và blog.
- Tìm kiếm sản phẩm, dịch vụ, bài viết.
- Trang profile người dùng.
- Chức năng đăng nhập/đăng xuất và đánh giá.
- Hiển thị portfolio và hình ảnh studio.

### 🔧 Backend (Admin)

- Quản lý tin tức / blog.
- Quản lý dịch vụ và sản phẩm.
- Quản lý loại dịch vụ và thời gian.
- Quản lý người dùng và tài khoản.
- Quản lý lịch hẹn, đơn hàng, chi tiết lịch và đánh giá.
- Quản lý liên hệ khách hàng.
- Cấu hình website và thống kê.

---

## 🛠 Công nghệ sử dụng

- PHP
- MySQL
- HTML / CSS / JavaScript
- Bootstrap (CSS frameworks trong `content/css` / `admin/resource/css`)
- PHPMailer (`phpmailer/`)
- Composer
- XAMPP / Apache + MySQL

---

## ⚙️ Yêu cầu hệ thống

- PHP 7.x / 8.x
- MySQL
- Composer
- XAMPP hoặc môi trường Apache + MySQL
- Trình duyệt web hiện đại

---

## 📁 Cấu trúc thư mục

```
chupanhstudio/
├── admin/                 # Khu vực quản trị
│   ├── account/           # Quản lý tài khoản
│   ├── appointments/      # Quản lý lịch hẹn
│   ├── feedback/          # Phản hồi, liên hệ, đánh giá
│   ├── home/              # Trang dashboard/home admin
│   ├── news/              # Quản lý tin tức/blog
│   ├── resource/          # CSS, JS, ảnh, vendor cho admin
│   ├── services/          # Quản lý dịch vụ
│   ├── setting/           # Cài đặt website
│   ├── statistic/         # Thống kê
│   ├── thochup/           # Quản lý thợ chụp
│   ├── times/             # Quản lý khung giờ
│   ├── types/             # Quản lý loại dịch vụ
│   ├── users/             # Quản lý người dùng
│   └── template/          # Header/footer admin
├── content/               # Frontend assets
├── images/                # Ảnh sản phẩm, slider, user...
├── layout/                # Layout chính frontend
├── libs/                  # Các thư viện xử lý dữ liệu
├── phpmailer/             # Thư viện gửi email
├── resetPass/             # Reset mật khẩu
├── site/                  # Trang frontend khách hàng
├── vendor/                # Thư viện Composer
├── composer.json
├── composer.lock
├── golbal.php             # Cấu hình chung, session, helper
├── index.php              # Router chính frontend
├── chupanhstudio2.sql     # File SQL import dữ liệu
└── README.md
```

---

## 🚀 Hướng dẫn cài đặt

### 1. Sao chép dự án vào thư mục web server

Đặt toàn bộ thư mục `chupanhstudio` vào `htdocs` của XAMPP hoặc thư mục web tương đương.

### 2. Cài đặt Composer

Chạy trong thư mục dự án:

```bash
composer install
```

### 3. Tạo database và import dữ liệu

- Tạo database mới trong phpMyAdmin hoặc MySQL.
- Import file `chupanhstudio2.sql`.

### 4. Cấu hình môi trường

Mở file `golbal.php` nếu cần chỉnh sửa đường dẫn `ROOT`:

```php
if (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost:8000') !== false) {
    define('ROOT', 'http://localhost:8000/');
} else {
    define('ROOT', 'http://localhost/ChupAnhStudio/');
}
```

Điều chỉnh `ROOT` theo tên thư mục hoặc host của bạn.

### 5. Chạy ứng dụng

Khởi động Apache và MySQL bằng XAMPP, sau đó truy cập:

- Frontend: `http://localhost/ChupAnhStudio/`
- Admin: `http://localhost/ChupAnhStudio/admin/`

---

## ✅ Trạng thái hoàn thành

### Đã hoàn thành

- [x] Trang chủ và trang dịch vụ
- [x] Danh sách sản phẩm/dịch vụ
- [x] Trang chi tiết sản phẩm và dịch vụ
- [x] Blog / tin tức
- [x] Chức năng tìm kiếm
- [x] Đăng nhập/đăng xuất
- [x] Quản trị admin
- [x] Quản lý người dùng
- [x] Quản lý lịch hẹn
- [x] Quản lý tin tức, dịch vụ, loại dịch vụ
- [x] Quản lý phản hồi / đánh giá
- [x] Gửi email với PHPMailer

### Có thể cải thiện

- [ ] Xây dựng hệ thống phân quyền nâng cao
- [ ] Thêm chức năng thanh toán online
- [ ] Cải thiện responsive mobile
- [ ] Hoàn thiện trang profile khách hàng
- [ ] Tối ưu câu trúc code và bảo mật

---

## 🤝 Đóng góp

Mọi đóng góp đều được hoan nghênh:

1. Fork repository
2. Tạo branch mới: `git checkout -b feature/ten-tinh-nang`
3. Commit thay đổi: `git commit -m 'feat: thêm tính năng X'`
4. Push lên branch
5. Tạo Pull Request

---

## 📄 Giấy phép

Dự án này sử dụng giấy phép MIT.

## 👨‍💻 Tác giả

**Dake Chụp Ảnh Studio**

- Website: [DakeStudio.com](https://DakeStudio.com)
- Email: studiochup3@gmail.com
