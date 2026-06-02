<?php 
require_once "database.php";
//Hàm hiển thị toàn bộ danh mục
function list_all_library($role){
    $sql = "SELECT * from libraries where role = $role order by id desc";
    return query_exe($sql);
}
//Ham hien thi mẫu tóc theo gioi han
function library_list_limit($limit, $nRows) {
    $sql = "SELECT * from libraries where role = 1 order by id desc limit $limit, $nRows";
    return query_exe($sql);
}

//Ham hien thi slider
function slider_list_limit($limit, $nRows) {
    $sql = "SELECT * from libraries where role = 0 order by id desc limit $limit, $nRows";
    return query_exe($sql);
}
//Hàm lấy ra 1 bản ghi
function list_one_library($id){
    return listOne('libraries','id',$id);
}
//Thêm dữ liệu vào bảng
function insert_library($name,$images,$link,$role,$album_id=null){
    $data =[
        'name' => $name,
        'images' => $images,
        'link' => $link,
        'role' => $role
    ];
    if ($album_id !== null) {
        $data['album_id'] = $album_id;
    }
    return insert('libraries',$data);
}

//function cập nhật
function library_update($id, $name, $images, $link, $album_id=null) {
    $data = [
        'name' => $name,
        'images' => $images,
        'link' => $link,
        'album_id' => $album_id
    ];
    update('libraries', $data, 'id', $id);
}
//function Xóa dữ liệu slide
function library_delete($id) {
    $row = list_one_library($id);
    
    if ( $row ) {
        //Xóa cả hình khi xóa dữ liệu
        $images = "../images/sliders/" . $row['images'];
        
        if ( file_exists($images)) {
            unlink($images);
        } 
        delete('libraries', 'id', $id);
    }
}

// ===== HÀM ALBUM =====
// Lấy tất cả ảnh theo album_id
function library_get_album($album_id) {
    $conn = connection();
    $stmt = $conn->prepare("SELECT * FROM libraries WHERE role = 1 AND album_id = ? ORDER BY id ASC");
    $stmt->execute([$album_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Lấy danh sách album (1 ảnh đại diện per album)
function library_get_album_covers($limit = 10) {
    $sql = "SELECT l.*, COUNT(l2.id) as photo_count 
            FROM libraries l
            LEFT JOIN libraries l2 ON l2.album_id = l.album_id AND l2.role = 1
            WHERE l.role = 1 AND l.album_id IS NOT NULL
            GROUP BY l.album_id
            ORDER BY l.album_id DESC
            LIMIT $limit";
    return query_exe($sql);
}

// Lấy danh sách album_id riêng biệt (cho admin dropdown)
function library_get_albums_list() {
    $sql = "SELECT DISTINCT album_id, MIN(name) as album_name, COUNT(*) as count 
            FROM libraries 
            WHERE role = 1 AND album_id IS NOT NULL 
            GROUP BY album_id 
            ORDER BY album_id DESC";
    return query_exe($sql);
}

// Lấy ảnh gallery với đại diện album - 1 ảnh cover + số lượng ảnh trong album
function gallery_get_covers($limit = 10) {
    // Lấy ảnh có album_id: 1 đại diện per album, sắp xếp theo album_id mới nhất
    $sql = "SELECT l.id, l.name, l.images, l.link, l.album_id,
                (SELECT COUNT(*) FROM libraries WHERE album_id = l.album_id AND role = 1) as total_in_album
            FROM libraries l
            WHERE l.role = 1
            GROUP BY COALESCE(l.album_id, l.id)
            ORDER BY l.id DESC
            LIMIT $limit";
    return query_exe($sql);
}