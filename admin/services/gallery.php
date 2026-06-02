<?php
$id_service = isset($_GET['id']) ? intval($_GET['id']) : 0;
$service = $id_service ? service_list_one('id', $id_service) : null;
$errors = [];

// Xóa ảnh
if (isset($_GET['del'])) {
    service_gallery_delete(intval($_GET['del']));
    $_SESSION['message'] = "Đã xóa ảnh";
    header("Location: " . ROOT . "admin/?page=service&action=gallery&id=$id_service");
    die;
}

// Upload ảnh mới
if (isset($_POST['btn_upload'])) {
    $uploaded = 0;
    if (!empty($_FILES['gallery_imgs']['name'][0])) {
        foreach ($_FILES['gallery_imgs']['name'] as $i => $fname) {
            if (empty($fname)) continue;
            $ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
            if (!in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
                $errors[] = "File '$fname' không đúng định dạng";
                continue;
            }
            if ($_FILES['gallery_imgs']['size'][$i] > 5 * 1024 * 1024) {
                $errors[] = "File '$fname' quá lớn (tối đa 5MB)";
                continue;
            }
            $newname = uniqid() . '_' . preg_replace('/[^a-z0-9._]/i', '', $fname);
            $dest = '../images/services/' . $newname;
            if (move_uploaded_file($_FILES['gallery_imgs']['tmp_name'][$i], $dest)) {
                $title = isset($_POST['title'][$i]) ? trim($_POST['title'][$i]) : '';
                service_gallery_insert($id_service, $newname, $title);
                $uploaded++;
            }
        }
    }
    if ($uploaded > 0) {
        $_SESSION['message'] = "Đã thêm $uploaded ảnh vào gallery";
    }
    if (!empty($errors)) {
        $_SESSION['error'] = implode('<br>', $errors);
    }
    header("Location: " . ROOT . "admin/?page=service&action=gallery&id=$id_service");
    die;
}

// Lấy danh sách ảnh hiện có
$gallery_photos = $id_service ? service_gallery_get($id_service) : [];
$all_services = service_list_all();
?>

<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="text-primary font-weight-bold mb-1">
                <i class="fas fa-images mr-2"></i>Quản lý ảnh Gallery Dịch vụ
            </h4>
            <?php if ($service): ?>
                <p class="text-muted small mb-0">
                    Dịch vụ: <strong><?= htmlspecialchars($service['name']) ?></strong>
                    &nbsp;·&nbsp; <?= count($gallery_photos) ?> ảnh
                </p>
            <?php endif; ?>
        </div>
        <a href="<?= ROOT ?>admin/?page=service" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i>Danh sách dịch vụ
        </a>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="row">
        <!-- Cột trái: Chọn dịch vụ + Upload -->
        <div class="col-lg-4">

            <!-- Chọn dịch vụ -->
            <div class="card shadow mb-4">
                <div class="card-header py-2 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-list mr-1"></i>Chọn dịch vụ
                    </h6>
                </div>
                <div class="card-body p-2">
                    <?php foreach($all_services as $sv): ?>
                        <a href="<?= ROOT ?>admin/?page=service&action=gallery&id=<?= $sv['id'] ?>"
                           class="d-flex align-items-center p-2 mb-1 rounded <?= ($sv['id'] == $id_service) ? 'bg-primary text-white' : 'text-dark' ?>"
                           style="gap:10px; text-decoration:none; transition:background 0.2s; <?= ($sv['id'] != $id_service) ? 'background:#f8f9fc;' : '' ?>">
                            <img src="<?= ROOT ?>images/products/<?= $sv['images'] ?>"
                                 style="width:40px;height:40px;border-radius:8px;object-fit:cover;flex-shrink:0;" alt="">
                            <div style="min-width:0;">
                                <div class="font-weight-bold small" style="<?= ($sv['id']==$id_service)?'color:#fff':'' ?>">
                                    <?= htmlspecialchars($sv['name']) ?>
                                </div>
                                <div class="small" style="<?= ($sv['id']==$id_service)?'color:rgba(255,255,255,0.7)':'color:#888' ?>">
                                    <?= service_gallery_count($sv['id']) ?> ảnh
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if ($id_service && $service): ?>
            <!-- Form upload ảnh -->
            <div class="card shadow">
                <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-cloud-upload-alt mr-1"></i>Thêm ảnh mới
                    </h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="upload-form">
                        <div class="form-group">
                            <label class="small font-weight-bold">Chọn ảnh
                                <span class="text-muted font-weight-normal">(nhiều ảnh cùng lúc)</span>
                            </label>
                            <input type="file" name="gallery_imgs[]" multiple
                                   accept="image/*" class="form-control-file border p-2 rounded w-100"
                                   id="img-upload-input"
                                   onchange="previewUploads(this)" required>
                        </div>
                        <!-- Preview -->
                        <div id="upload-preview" class="d-flex flex-wrap mb-3" style="gap:6px;"></div>
                        <button type="submit" name="btn_upload" class="btn btn-success btn-block">
                            <i class="fas fa-upload mr-1"></i>Tải lên
                        </button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Cột phải: Gallery hiện tại -->
        <div class="col-lg-8">
            <?php if (!$id_service): ?>
                <div class="card shadow">
                    <div class="card-body text-center py-5 text-muted">
                        <i class="fas fa-hand-point-left fa-2x mb-3"></i>
                        <p>Chọn một dịch vụ bên trái để quản lý ảnh</p>
                    </div>
                </div>
            <?php else: ?>
            <div class="card shadow">
                <div class="card-header py-2 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-th mr-1"></i>
                        Ảnh gallery — <?= htmlspecialchars($service['name']) ?>
                    </h6>
                    <span class="badge badge-primary"><?= count($gallery_photos) ?> ảnh</span>
                </div>
                <div class="card-body">
                    <!-- Avatar dịch vụ -->
                    <div class="mb-3 p-3 bg-light rounded d-flex align-items-center" style="gap:12px;">
                        <img src="<?= ROOT ?>images/products/<?= $service['images'] ?>"
                             style="width:72px;height:72px;border-radius:8px;object-fit:cover;border:2px solid #ddd;">
                        <div>
                            <div class="font-weight-bold"><?= htmlspecialchars($service['name']) ?></div>
                            <div class="small text-muted">Ảnh đại diện dịch vụ (chỉnh sửa trong "Sửa dịch vụ")</div>
                        </div>
                    </div>

                    <?php if (empty($gallery_photos)): ?>
                        <div class="text-center py-5 text-muted border-top">
                            <i class="fas fa-images fa-3x mb-3"></i>
                            <p>Chưa có ảnh gallery nào.<br>
                               Hãy upload ảnh ở form bên trái.</p>
                        </div>
                    <?php else: ?>
                        <!-- Grid ảnh -->
                        <div class="row" id="gallery-grid" style="margin:0 -5px;">
                            <?php foreach($gallery_photos as $gp): ?>
                                <div class="col-4 col-md-3 p-1" id="gitem-<?= $gp['id'] ?>">
                                    <div class="position-relative border rounded overflow-hidden"
                                         style="background:#f5f5f5;">
                                        <img src="<?= ROOT ?>images/services/<?= $gp['images'] ?>"
                                             style="width:100%;height:120px;object-fit:cover;display:block;">
                                        <!-- Actions overlay -->
                                        <div class="position-absolute" style="top:4px;right:4px;">
                                            <a href="<?= ROOT ?>admin/?page=service&action=gallery&id=<?= $id_service ?>&del=<?= $gp['id'] ?>"
                                               onclick="return confirm('Xóa ảnh này?')"
                                               class="btn btn-danger btn-sm p-1"
                                               style="width:28px;height:28px;line-height:1;">
                                                <i class="fas fa-times" style="font-size:11px;"></i>
                                            </a>
                                        </div>
                                        <?php if(!empty($gp['title'])): ?>
                                            <div class="p-1 small text-center text-truncate"
                                                 style="background:#fff;font-size:11px;">
                                                <?= htmlspecialchars($gp['title']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function previewUploads(input) {
    var wrap = document.getElementById('upload-preview');
    wrap.innerHTML = '';
    Array.from(input.files).forEach(function(file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var div = document.createElement('div');
            div.style.cssText = 'position:relative;';
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.cssText = 'width:70px;height:70px;object-fit:cover;border-radius:6px;border:1px solid #ddd;';
            div.appendChild(img);
            wrap.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
}
</script>
