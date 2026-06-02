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

// ===== SERVICE GALLERY =====
// Tự động tạo bảng nếu chưa tồn tại
function service_gallery_ensure_table() {
    static $created = false;
    if ($created) return;
    $conn = connection();
    $conn->exec("CREATE TABLE IF NOT EXISTS `service_gallery` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_service` int(11) NOT NULL,
        `images` varchar(255) NOT NULL,
        `title` varchar(191) DEFAULT NULL,
        `sort_order` int(11) DEFAULT 0,
        PRIMARY KEY (`id`),
        KEY `id_service` (`id_service`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    $created = true;
}

// Lấy tất cả ảnh gallery của 1 dịch vụ
function service_gallery_get($id_service) {
    try {
        service_gallery_ensure_table();
        $conn = connection();
        $stmt = $conn->prepare("SELECT * FROM service_gallery WHERE id_service = ? ORDER BY sort_order ASC, id ASC");
        $stmt->execute([$id_service]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

// Thêm ảnh vào gallery dịch vụ
function service_gallery_insert($id_service, $images, $title = '') {
    service_gallery_ensure_table();
    $data = ['id_service' => $id_service, 'images' => $images, 'title' => $title];
    return insert('service_gallery', $data);
}

// Xóa ảnh gallery
function service_gallery_delete($id) {
    try {
        service_gallery_ensure_table();
        $conn = connection();
        $row = $conn->query("SELECT * FROM service_gallery WHERE id = " . intval($id))->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $path = "../images/services/" . $row['images'];
            if (file_exists($path)) unlink($path);
            delete('service_gallery', 'id', $id);
        }
    } catch (PDOException $e) {}
}

// Đếm số ảnh gallery của dịch vụ
function service_gallery_count($id_service) {
    try {
        service_gallery_ensure_table();
        $conn = connection();
        return (int)$conn->query("SELECT COUNT(*) FROM service_gallery WHERE id_service = " . intval($id_service))->fetchColumn();
    } catch (PDOException $e) {
        return 0;
    }
}
