<?php
ob_start();
$errors = [];
require_once '../golbal.php';
$page = isset($_GET['page']) ? $_GET['page'] : '';
require_once '../libs/types.php';
require_once '../libs/services.php';
require_once '../libs/word_time.php';
require_once '../libs/thochup.php';
require_once '../libs/users.php';
require_once '../libs/news.php';
require_once '../libs/libraries.php';
require_once '../libs/appointments.php';
require_once '../libs/order.php';
require_once "../libs/order-detail.php";
require_once "../libs/app_detail.php";
require_once "../libs/contact.php";
require_once "../libs/setting.php";
include_once 'template/header.php';
check_role();
switch ($page) {
    case '':
    case 'home':
        include_once 'home/home.php';
        break;
    
    case 'type':
        //Lấy hành động trong categories
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                //Thêm vào giao diện hiển thị categories
                include_once 'types/index.php';
                break;
            case 'add':
                include_once 'types/create.php';
                break;
            case 'edit':
                include_once 'types/edit.php';
                break;
        }
        break;
    case 'service':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'services/index.php';
                break;
            case 'add':
                include_once 'services/create.php';
                break;
            case 'search':
                include_once 'services/search.php';
                break;
            case 'edit':
                include_once 'services/edit.php';
                break;
            case 'gallery':
                include_once 'services/gallery.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;

    case 'user':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'users/index.php';
                break;
            case 'add':
                include_once 'users/create.php';
                break;
            case 'search':
                include_once 'users/search.php';
                break;
            case 'edit':
                include_once 'users/edit.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;
    case 'barber':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'thochup/index.php';
                break;
            case 'add':
                include_once 'thochup/create.php';
                break;
            case 'search':
                include_once 'thochup/search.php';
                break;
            case 'edit_profile':
                include_once 'thochup/edit_profile.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;

    case 'time':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'times/index.php';
                break;
            case 'add':
                include_once 'times/create.php';
                break;
            case 'edit':
                include_once 'times/edit.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;
    case 'new':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'news/index.php';
                break;
            case 'add':
                include_once 'news/create.php';
                break;
            case 'edit':
                include_once 'news/edit.php';
                break;
            case 'search':
                include_once 'news/search.php';
                break;
        }
        break;
    case 'slider':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'libraries/sliders/index.php';
                break;
            case 'add':
                include_once 'libraries/sliders/create.php';
                break;
            case 'edit':
                include_once 'libraries/sliders/edit.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;
    case 'hair':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'libraries/hairs/index.php';
                break;
            case 'add':
                include_once 'libraries/hairs/create.php';
                break;
            case 'edit':
                include_once 'libraries/hairs/edit.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;
    case 'appointment':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'appointments/index.php';
                break;
            case 'add':
                include_once 'appointments/create.php';
                break;
            case 'edit':
                include_once 'appointments/edit.php';
                break;
            case 'detail':
                include_once 'appointments/app_detail.php';
                break;
        }
        break;
    
    case 'comment':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'feedback/comments/index.php';
                break;
            case 'reply':
                include_once 'feedback/comments/reply.php';
                break;
            case 'edit':
                include_once 'feedback/comments/edit.php';
                break;
            case 'detail':
                include_once 'feedback/comments/detail.php';
                break;
        }
        break;
    case 'contact':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'feedback/contacts/index.php';
                break;
            case 'reply':
                include_once 'feedback/contacts/reply.php';
                break;
            case 'detail':
                include_once 'feedback/contacts/detail.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;
    case 'evaluate':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'feedback/evaluates/index.php';
                break;
            case 'reply':
                include_once 'feedback/evaluates/reply.php';
                break;
            case 'detail':
                include_once 'feedback/evaluates/detail.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;
    case 'statistic':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case 'comment':
                include_once 'statistic/statistic_com.php';
                break;
            case 'service':
                include_once 'statistic/statistic_ser.php';
                break;
            case 'detail_com':
                include_once 'statistic/detail_com.php';
                break;
            default:
                include_once "404.php";
                break;
        }
        break;
    case 'profile':
        include_once "account/index.php";
        break;
    case 'setting':
        include_once 'setting/setting.php';
        break;
    case 'logout':
        unset($_SESSION['user']);
        header('location:' . ROOT . 'admin/login.php');
        die;
        break;
    default:
        include_once "404.php";
        break;
}

include_once 'template/footer.php';

if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
?>

<?php
ob_end_flush();
