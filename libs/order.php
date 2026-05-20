<?php 
require_once "database.php";

//Hàm hiển thị toàn bộ hoa dơn
function list_all_order(){
    $sql = "SELECT orders.*, name from orders inner join users on users.id= orders.id_user ORDER BY id DESC";
    return query_exe($sql);
}

//Hàm hiển thị toàn bộ hoa dơn theo user
function list_user_order($id_user){
    $sql = "SELECT orders.*, name from orders inner join users on users.id= orders.id_user where id_user =$id_user ORDER BY id DESC";
    return query_exe($sql);
}

//Hàm hien thi don hàng theo trang thai
function list_status_order($status){
    $sql = "SELECT orders.*, name from orders inner join users on users.id= orders.id_user where status like '%$status%' ORDER BY id DESC";
    return query_exe($sql);
}

//Hàm lấy ra hóa đơn theo id_user và trạng thái hóa don
function status_all_order($status,$id_user){
    $sql = "SELECT orders.*, name from orders inner join users on users.id= orders.id_user where id_user =$id_user and status like '%$status%' ORDER BY id DESC";
    return query_exe($sql);
}
//Hamf lấy 1 dòng hóa đơn mới thêm vào theo
function list_top_order($id_user){
    $sql = "SELECT * from orders  where id_user =$id_user ORDER BY id DESC limit 0,1";
    return query_limit($sql);
}
//Hàm lấy ra 1 bản ghi
function list_one_order($id,$value){
    return listOne('orders',$id,$value);
}

//Thêm dữ liệu vào bảng
function insert_order($id_user,$address,$phone){
    $data =[
        'id_user' => $id_user,
        'status'=>'Chờ lấy hàng',
        'address' => $address,
        'phone' => $phone
    ];
    return insert('orders',$data);
}

//function cập nhật hóa đơn
function order_update($id, $status) {
    $data = ['status'=>$status];
    update('orders', $data, 'id', $id);
}
//function Xóa dữ liệu hóa đơn
function order_delete($id) {
    delete('orders', 'id', $id);
}
