<?php
$existing_albums = library_get_albums_list(); // Danh sách album hiện có
$errors = [];

// Đọc album_id từ URL nếu có để tự động chọn
$url_album_id = isset($_GET['album_id']) ? intval($_GET['album_id']) : null;

if (isset($_POST['btnsave'])) {
    extract($_REQUEST);
    $okUpload = false;

    // Upload nhiều ảnh
    $uploaded_images = [];
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $i => $fname) {
            if (empty($fname)) continue;
            if (!checkType($fname, array('jpg','png','gif','tiff','jpeg'))) {
                $errors['errors_img'] = 'File không đúng định dạng (jpg/png/gif)';
                break;
            }
            if (!checkSize($_FILES['images']['size'][$i], 0, 5*1024*1024)) {
                $errors['errors_img'] = 'File quá lớn (tối đa 5MB)';
                break;
            }
            $newname = uniqid() . $fname;
            if (move_uploaded_file($_FILES['images']['tmp_name'][$i], '../images/sliders/' . $newname)) {
                $uploaded_images[] = $newname;
            }
        }
    } else {
        $errors['errors_img'] = 'Vui lòng chọn ít nhất 1 ảnh';
    }

    // Xác định album_id
    $final_album_id = null;
    if (isset($album_action) && $album_action === 'new') {
        // Tạo album mới: album_id = max hiện có + 1
        $conn = connection();
        $max = $conn->query("SELECT MAX(album_id) as m FROM libraries WHERE role = 1")->fetch(PDO::FETCH_ASSOC);
        $final_album_id = ($max['m'] ?? 0) + 1;
    } elseif (isset($album_id) && $album_id !== '' && intval($album_id) > 0) {
        $final_album_id = intval($album_id);
    }

    if (empty($errors) && !empty($uploaded_images)) {
        foreach ($uploaded_images as $img) {
            insert_library($name, $img, $link ?? '', true, $final_album_id);
        }
        $_SESSION['message'] = "Thêm " . count($uploaded_images) . " ảnh thành công" . ($final_album_id ? " vào Album #$final_album_id" : "");
        header('Location:' . ROOT . 'admin/?page=hair');
        die();
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-images mr-2"></i>Thêm ảnh vào Album
            </h6>
            <a href="<?= ROOT ?>admin/?page=hair" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i>Quay lại
            </a>
        </div>
        <div class="card-body">

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $e) echo "<p class='mb-0'>$e</p>"; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row">
                    <!-- Cột trái: Thông tin -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Tên ảnh / Mô tả</strong></label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="VD: Chụp ảnh cưới ngoại cảnh" 
                                   value="<?= isset($name) ? htmlspecialchars($name) : '' ?>" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Chọn Album <span class="text-danger">*</span></strong></label>

                            <div class="border rounded p-3 bg-light">
                                <!-- Tạo album mới -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="album_action"
                                           id="album_new" value="new" <?= ($url_album_id === null) ? 'checked' : '' ?>
                                           onchange="toggleAlbumSelect(this)">
                                    <label class="form-check-label" for="album_new">
                                        <i class="fas fa-plus-circle text-success"></i>
                                        <strong>Tạo Album mới</strong>
                                        <small class="text-muted d-block ml-4">Tạo một album riêng cho nhóm ảnh này</small>
                                    </label>
                                </div>

                                <!-- Thêm vào album có sẵn -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="album_action"
                                           id="album_existing" value="existing"
                                           <?= empty($existing_albums) ? 'disabled' : '' ?>
                                           <?= ($url_album_id !== null) ? 'checked' : '' ?>
                                           onchange="toggleAlbumSelect(this)">
                                    <label class="form-check-label" for="album_existing">
                                        <i class="fas fa-folder-open text-primary"></i>
                                        <strong>Thêm vào Album có sẵn</strong>
                                        <?php if (empty($existing_albums)): ?>
                                            <small class="text-muted d-block ml-4">(Chưa có album nào)</small>
                                        <?php endif; ?>
                                    </label>
                                </div>

                                <!-- Dropdown album có sẵn -->
                                <div id="album_select_wrap" class="mt-3" style="<?= ($url_album_id !== null) ? 'display:block;' : 'display:none;' ?>">
                                    <select name="album_id" id="album_id" class="form-control">
                                        <option value="">— Chọn Album —</option>
                                        <?php foreach ($existing_albums as $al): ?>
                                            <option value="<?= $al['album_id'] ?>" <?= ($url_album_id == $al['album_id']) ? 'selected' : '' ?>>
                                                Album #<?= $al['album_id'] ?> — <?= htmlspecialchars($al['album_name']) ?>
                                                (<?= $al['count'] ?> ảnh)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cột phải: Upload ảnh -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Chọn ảnh <span class="text-danger">*</span></strong>
                                <small class="text-muted">(Có thể chọn nhiều ảnh cùng lúc)</small>
                            </label>
                            <input type="file" class="form-control-file border p-2 rounded"
                                   id="images" name="images[]" multiple accept="image/*"
                                   onchange="previewImages(this)" required>
                            <?php if (isset($errors['errors_img'])): ?>
                                <p class="text-danger mt-1 small"><?= $errors['errors_img'] ?></p>
                            <?php endif; ?>

                            <!-- Preview ảnh -->
                            <div id="preview-wrap" class="mt-2 d-flex flex-wrap" style="gap:6px;"></div>
                        </div>

                        <div class="alert alert-info small p-2">
                            <i class="fas fa-info-circle"></i>
                            <strong>Lưu ý:</strong> Bạn có thể chọn nhiều ảnh cùng lúc (Ctrl+Click hoặc Shift+Click).
                            Tất cả ảnh được chọn sẽ thuộc cùng 1 album.
                        </div>
                    </div>
                </div>

                <hr>
                <button type="submit" name="btnsave" class="btn btn-success">
                    <i class="fas fa-save mr-1"></i>Lưu ảnh vào Album
                </button>
                <a href="<?= ROOT ?>admin/?page=hair" class="btn btn-secondary ml-2">Hủy</a>
            </form>
        </div>
    </div>
</div>

<script>
function toggleAlbumSelect(el) {
    var wrap = document.getElementById('album_select_wrap');
    wrap.style.display = (el.value === 'existing') ? 'block' : 'none';
}
function previewImages(input) {
    var wrap = document.getElementById('preview-wrap');
    wrap.innerHTML = '';
    Array.from(input.files).forEach(function(file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.cssText = 'width:80px;height:60px;object-fit:cover;border-radius:4px;border:1px solid #ddd;';
            wrap.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
}
</script>
