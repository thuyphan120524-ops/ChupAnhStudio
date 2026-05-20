<?php
require_once "database.php";

//hàm lấy ra dữ liệu danh sách dịch vụ
function service_list_all() {
    $sql = "SELECT services.*,types.name as name_type from services inner join types on types.id = services.id_type 
    ORDER BY id DESC";
    return query_exe($sql);
}


//Lấy ra 1 bản ghi dịch vụ theo điều kiện id
function service_list_one($id,$value) {
    return listOne('services',$id,$value);
}
//function lấy ra dữ liệu theo loại hàng
//$id_cate là dữ liệu được lọc
function service_list_cate($id_type) {
    $sql = "SELECT * from services Where id_type=$id_type ORDER BY id DESC";
    return query_exe($sql);
}

//hàm lấy ra dữ liệu danh sách dịch vụ theo danh mục và giới hạn
function service_list_types($id_type,$limit, $nRows) {
    $sql = "SELECT services.* from services inner join types on services.id_type = types.id 
    Where id_type=$id_type
    ORDER BY services.id DESC limit $limit,$nRows";
    return query_exe($sql);
}

//Ham tinh tong so ban ghi trong bảng services theo dieu kien
function num_row_ser($id_type){
    $conn = connection();
    $sql = $conn->prepare("SELECT COUNT(*) from services inner join types on services.id_type = types.id 
    Where id_type=$id_type");
    $sql->execute(); 
    $num_row = $sql->fetchColumn();
    return $num_row;
}

//dich vu liên quan
function service_list_type($id_type,$id) {
    $sql = "SELECT * from services  Where id_type=$id_type and id != $id ORDER BY id DESC";
    return query_exe($sql);
}

//function lấy ra dữ liệu theo limit
//$sql câu lệnh select
function service_list_limit($limit, $nRows) {
    $sql = "SELECT * from services order by id desc limit $limit, $nRows";
    return query_exe($sql);
}


//Chỉnh sửa dữ liệu dịch vụ
function service_update($id, $name, $price,$sale, $images, $id_type, $detail, $time) {
    $data = [        
        "name"=>$name,
        "price"=>$price,
        "sale"=>$sale,
        "time"=>$time,
        "images"=>$images,
        "id_type"=>$id_type,
        "detail"=>$detail
    ];
    return update('services', $data,'id', $id);
}

//function thêm dịch vụ vào bảng dịch vụ
function service_insert($name, $price,$sale, $images, $id_type, $detail, $time) {
    $data = [        
        "name"=>$name,
        "price"=>$price,
        "sale"=>$sale,
        "time"=>$time,
        "images"=>$images,
        "id_type"=>$id_type,
        "detail"=>$detail
    ];
    return insert('services', $data);
}

//Xóa dịch vụ
function service_delete($id) {
    $row = service_list_one('id',$id);
    
    if ( $row ) {
        //Xóa cả hình khi xóa dữ liệu
        $images = "../images/products/" . $row['images'];
        
        if ( file_exists($images)) {
            unlink($images);
        } 
        delete('services', 'id', $id);
    }
}

//Tìm kiếm theo tên dich vu
function search_service($name){
    $sql = "SELECT services.*, types.name as name_type
    FROM services  INNER JOIN types on services.id_type = types.id 
    Where services.name Like '%$name%'";
    return query_exe($sql);
}

//Thống kê dịch vụ theo danh mục
function statistical_service(){
    $sql = "SELECT t.id, t.name, COUNT(*) so_luong, MIN(s.price) gia_min, MAX(s.price) gia_max, AVG(s.price) gia_avg
     FROM services s inner JOIN types t ON t.id=s.id_type
     GROUP BY t.id, t.name";
return query_exe($sql);
}