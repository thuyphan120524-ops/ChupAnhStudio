<?php 
if(isset($_SESSION['user'])){
    $phone=$_SESSION['user']['phone'];
    $name=$_SESSION['user']['name'];
}
if (isset($_POST['btnBooking'])) {
    $errors = []; 
    extract($_REQUEST);
    if(empty($id_service)){
        $errors['errors_service'] = 'Vui lòng chọn dịch vụ';
    }if(barber_check('phone',$phone)){
        $errors['errors_phone'] = 'Số điện thoại này là của Thợ chụp ảnh';
       }
    if (array_filter($errors) == false) {
    $user = user_check('phone', $phone);
    if($user>0){
        $id_user = $user['id'];
    }else{
        $cu = guest_insert($name, $phone,'', 'user.svg',3);
        $cus = user_check('phone', $phone);
        $id_user = $cus['id'];
    }
     insert_appointment($id_barber, $id_user, $day, $id_time,$payment_method);
    $booking=list_top_app($id_user);
    // foreach($id_service as $s){
        insert_app_detail($booking['id'],$id_service);
    // }
    $_SESSION['message'] = "Đặt lịch hẹn thành công";
    header('location:' . $_SERVER['REQUEST_URI']);
    die();
}else{
    $_SESSION['message'] = "Đặt lịch hẹn thất bại";
}
}
?>