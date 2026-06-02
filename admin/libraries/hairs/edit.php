<?php
$blog = list_all_new();
$existing_albums = library_get_albums_list(); // Danh sách album hiện có

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hair = list_one_library($id);
}

if (isset($_POST['btnsave'])) {
    $errors = [];
    extract($_REQUEST);
    $okUpload = false;
    
    if (checkType($_FILES['images']['name'], array('jpg', 'png', 'gif', 'tiff', 'jpeg')) && checkSize($_FILES['images']['size'], 0, 5 * 1024 * 1024)) {
        $okUpload = true;
        $images = uniqid() . $_FILES['images']['name'];
    } else {
        $images = $image;
    }
    
    if (checkType($_FILES['images']['name'], array('jpg', 'png', 'gif', 'tiff', 'jpeg')) == false && $_FILES['images']['size'] > 0) {
        $errors['errors_img'] = 'File không đúng định dạng';
    }
    
    // Xác định album_id
    $final_album_id = $hair['album_id']; // mặc định giữ nguyên
    if (isset($album_action)) {
        if ($album_action === 'none') {
            $final_album_id = null;
        } elseif ($album_action === 'new') {
            // Tạo album mới: album_id = max hiện có + 1
            $conn = connection();
            $max = $conn->query("SELECT MAX(album_id) as m FROM libraries WHERE role = 1")->fetch(PDO::FETCH_ASSOC);
            $final_album_id = ($max['m'] ?? 0) + 1;
        } elseif ($album_action === 'existing') {
            if (isset($album_id) && $album_id !== '' && intval($album_id) > 0) {
                $final_album_id = intval($album_id);
            }
        }
    }
    
    if (empty($errors)) {
        library_update($id, $name, $images, $link, $final_album_id);
        if ($okUpload) {
            move_uploaded_file($_FILES['images']['tmp_name'], '../images/sliders/' . $images);
        }
        $_SESSION['message'] = "Cập nhật dữ liệu thành công";
        header('Location:' . ROOT . 'admin/?page=hair');
        die();
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin ảnh / Album</h6>
            <a href="<?= ROOT ?>admin/?page=hair" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i>Quay lại
            </a>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"><strong>Tiêu đề / Mô tả ảnh</strong></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tiêu đề" value="<?= isset($name) ? $name : $hair['name'] ?>" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập tiêu đề
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="link"><strong>Tin tức liên kết</strong></label>
                            <select name="link" id="link" class="form-control" required>
                                <option value="">— Chọn tin tức —</option>
                                <?php foreach ($blog as $b) : ?>
                                    <option value="<?= $b['id'] ?>" <?= $hair['link'] == $b['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($b['title']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn tin tức
                            </div>
                        </div>

                        <div class="form-group">
                            <label><strong>Quản lý Album</strong></label>
                            <div class="border rounded p-3 bg-light">
                                <!-- Giữ nguyên album hiện tại -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="album_action"
                                           id="album_keep" value="keep" checked
                                           onchange="toggleAlbumSelect(this)">
                                    <label class="form-check-label" for="album_keep">
                                        <strong>Giữ nguyên album hiện tại</strong>
                                        <small class="text-muted d-block ml-4">
                                            <?= $hair['album_id'] ? "Album #".$hair['album_id'] : "Không thuộc album nào (Đứng độc lập)" ?>
                                        </small>
                                    </label>
                                </div>

                                <!-- Chuyển sang không thuộc album nào -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="album_action"
                                           id="album_none" value="none"
                                           onchange="toggleAlbumSelect(this)">
                                    <label class="form-check-label" for="album_none">
                                        <strong>Không thuộc album nào (Đứng độc lập)</strong>
                                    </label>
                                </div>

                                <!-- Tạo album mới -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="album_action"
                                           id="album_new" value="new"
                                           onchange="toggleAlbumSelect(this)">
                                    <label class="form-check-label" for="album_new">
                                        <i class="fas fa-plus-circle text-success"></i>
                                        <strong>Di chuyển sang Album mới</strong>
                                    </label>
                                </div>

                                <!-- Thêm vào album có sẵn -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="album_action"
                                           id="album_existing" value="existing"
                                           <?= empty($existing_albums) ? 'disabled' : '' ?>
                                           onchange="toggleAlbumSelect(this)">
                                    <label class="form-check-label" for="album_existing">
                                        <i class="fas fa-folder-open text-primary"></i>
                                        <strong>Di chuyển vào Album có sẵn</strong>
                                    </label>
                                </div>

                                <!-- Dropdown album có sẵn -->
                                <div id="album_select_wrap" class="mt-3" style="display:none;">
                                    <select name="album_id" id="album_id" class="form-control">
                                        <option value="">— Chọn Album —</option>
                                        <?php foreach ($existing_albums as $al): ?>
                                            <option value="<?= $al['album_id'] ?>" <?= $hair['album_id'] == $al['album_id'] ? 'selected' : '' ?>>
                                                Album #<?= $al['album_id'] ?> — <?= htmlspecialchars($al['album_name']) ?>
                                                (<?= $al['count'] ?> ảnh)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="images"><strong>Hình ảnh</strong></label>
                            <input type="hidden" name="image" value="<?= $hair['images'] ?>">
                            <input type="file" class="form-control-file border p-2 rounded" id="images" name="images">
                            <div class="mt-3">
                                <p class="mb-1 text-muted">Ảnh hiện tại:</p>
                                <img src="../images/sliders/<?= $hair['images'] ?>" class="img-thumbnail" style="max-width: 300px; max-height: 200px; object-fit: cover;" alt="">
                            </div>
                            <?php if (isset($errors['errors_img'])) : ?>
                                <p class="text-danger mt-2"><?= $errors['errors_img'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
               
                <button type="submit" name="btnsave" class="btn btn-success mt-3">
                    <i class="fas fa-save mr-1"></i>Lưu thay đổi
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function toggleAlbumSelect(radio) {
    var selectWrap = document.getElementById('album_select_wrap');
    if (radio.id === 'album_existing') {
        selectWrap.style.display = 'block';
        document.getElementById('album_id').setAttribute('required', 'required');
    } else {
        selectWrap.style.display = 'none';
        document.getElementById('album_id').removeAttribute('required');
    }
}
</script>
