<?php 
require_once "database.php";

//Hàm hiển thị toàn bộ danh mục
function list_all_time(){
    return listAll('word_time');
}

//Hàm lấy ra 1 bản ghi
function list_one_time($id){
    return listOne('word_time','id',$id);
}
function check_time($id,$val){
    return listOne('word_time',$id,$val);
}
//Ham lay khung gio trống
function appointment_list_time($id_barber,$day) {
    $sql = "SELECT * from word_time WHERE id not in (SELECT id_time from appointments WHERE id_barber=$id_barber and day='$day')";
    return query_exe($sql);
}


//Thêm dữ liệu vào bảng
function insert_time($time){
    $data =[
        'time' => $time
    ];
    return insert('word_time',$data);
}

//function cập nhật 
function time_update($id, $time) {
    $data = ['time'=>$time];
    update('word_time', $data, 'id', $id);
}
//function Xóa dữ liệu 
function time_delete($id) {
        delete('word_time', 'id', $id);
}