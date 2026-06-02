<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    library_delete($id);
    $_SESSION['message'] = "Xóa ảnh thành công";
    header('location:' . ROOT . 'admin/?page=hair');
    die;
}

if (isset($_POST['btn-del'])) {
    extract($_REQUEST);
    if (!empty($id)) {
        foreach ($id as $id_pro) {
            library_delete($id_pro);
        }
        $_SESSION['message'] = "Xóa dữ liệu thành công";
    } else {
        $_SESSION['error'] = "Vui lòng chọn ít nhất một ảnh để xóa";
    }
    header('location:' . ROOT . 'admin/?page=hair');
    die;
}

// Lấy tất cả ảnh gallery, nhóm theo album
$result = list_all_library(1);

// Nhóm theo album_id
$albums = [];
$total_photos = count($result);
$unassigned_count = 0;

foreach ($result as $r) {
    $aid = $r['album_id'] ?? 'none';
    if ($aid === 'none' || $aid === '' || $aid === null) {
        $albums['none'][] = $r;
        $unassigned_count++;
    } else {
        $albums[$aid][] = $r;
    }
}

$album_count = count(array_filter(array_keys($albums), function($k) {
    return $k !== 'none';
}));
?>

<!-- Custom CSS for Premium Gallery UI -->
<style>
.album-card {
    transition: transform 0.2s, box-shadow 0.2s;
    border-radius: 8px;
    overflow: hidden;
}
.album-card:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.08) !important;
}
.gallery-item {
    position: relative;
    width: 140px;
    height: 105px;
    border-radius: 6px;
    overflow: hidden;
    background: #f8f9fc;
    border: 1px solid #e3e6f0;
}
.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}
.gallery-item:hover img {
    transform: scale(1.08);
}
.gallery-item .overlay-actions {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    opacity: 0;
    transition: opacity 0.2s ease-in-out;
}
.gallery-item:hover .overlay-actions {
    opacity: 1;
}
.gallery-item .item-checkbox {
    position: absolute;
    top: 6px;
    left: 6px;
    z-index: 5;
    width: 16px;
    height: 16px;
    cursor: pointer;
}
.gallery-item .btn-action {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 13px;
    transition: background-color 0.2s;
    text-decoration: none;
}
.gallery-item .btn-edit { background-color: #f6c23e; }
.gallery-item .btn-edit:hover { background-color: #dfa100; }
.gallery-item .btn-delete { background-color: #e74a3b; }
.gallery-item .btn-delete:hover { background-color: #be2617; }
</style>

<div class="container-fluid">
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-success alert-dismissible fade show font-weight-bold" role="alert">
            <i class="fas fa-check-circle mr-2"></i><?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
            <i class="fas fa-exclamation-circle mr-2"></i><?= $_SESSION['error'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Dashboard Summary Header -->
    <div class="row mb-4">
        <!-- Card 1: Albums Count -->
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số Album</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $album_count ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Photos -->
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng số ảnh đã tải lên</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_photos ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Unassigned Photos -->
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ảnh đứng độc lập (Chưa vào album)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $unassigned_count ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between bg-white border-bottom">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-images mr-2"></i>Quản lý Album - Hình ảnh khách hàng trải nghiệm
            </h6>
            <a href="<?= ROOT ?>admin/?page=hair&action=add" class="btn btn-primary">
                <i class="fas fa-plus mr-1"></i>Tạo Album mới / Thêm ảnh
            </a>
        </div>
        
        <div class="card-body bg-light">
            <?php if (empty($result)): ?>
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-images fa-3x mb-3 text-secondary"></i>
                    <h5 class="font-weight-bold">Chưa có album hay ảnh nào</h5>
                    <p class="mb-0">Bắt đầu bằng việc tạo album mới và tải lên những hình ảnh trải nghiệm tuyệt vời của khách hàng.</p>
                    <a href="<?= ROOT ?>admin/?page=hair&action=add" class="btn btn-primary mt-3">
                        <i class="fas fa-plus mr-1"></i>Tạo Album đầu tiên
                    </a>
                </div>
            <?php else: ?>

                <!-- 1. Ảnh chưa thuộc album nào (Độc lập) -->
                <?php if (isset($albums['none']) && !empty($albums['none'])): ?>
                    <div class="card mb-4 border-0 shadow-sm album-card">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-image text-secondary mr-2"></i>
                                Ảnh chưa thuộc album nào (Đứng độc lập)
                                <span class="badge badge-secondary ml-2"><?= count($albums['none']) ?> ảnh</span>
                            </span>
                            <a href="<?= ROOT ?>admin/?page=hair&action=add" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-plus mr-1"></i>Tải thêm ảnh độc lập
                            </a>
                        </div>
                        <div class="card-body bg-white p-3">
                            <form action="" method="POST" id="form-del-none">
                                <div class="d-flex flex-wrap" style="gap:12px;">
                                    <?php foreach ($albums['none'] as $r): ?>
                                        <div class="gallery-item">
                                            <input type="checkbox" name="id[]" value="<?= $r['id'] ?>" class="item-checkbox">
                                            <img src="<?= ROOT ?>images/sliders/<?= $r['images'] ?>" alt="<?= htmlspecialchars($r['name']) ?>">
                                            <div class="overlay-actions">
                                                <a href="<?= ROOT ?>admin/?page=hair&action=edit&id=<?= $r['id'] ?>" class="btn-action btn-edit" title="Sửa thông tin / Đưa vào album">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="<?= ROOT ?>admin/?page=hair&id=<?= $r['id'] ?>" onclick="return confirm('Xóa ảnh này?')" class="btn-action btn-delete" title="Xóa">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-danger btn-sm" name="btn-del" onclick="return confirm('Xóa các ảnh đã chọn?')">
                                        <i class="fas fa-trash mr-1"></i>Xóa các ảnh đã chọn
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- 2. Danh sách Album chính -->
                <?php foreach ($albums as $album_id => $photos): ?>
                    <?php if ($album_id === 'none') continue; ?>
                    
                    <div class="card mb-4 border-0 shadow-sm album-card">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                            <span class="font-weight-bold text-dark" style="font-size: 16px;">
                                <i class="fas fa-folder-open text-warning mr-2"></i>
                                Album #<?= $album_id ?> — <span class="text-primary"><?= htmlspecialchars($photos[0]['name']) ?></span>
                                <span class="badge badge-primary ml-2"><?= count($photos) ?> ảnh</span>
                            </span>
                            
                            <div class="d-flex" style="gap: 8px;">
                                <!-- Direct Button to add photo specifically for this album -->
                                <a href="<?= ROOT ?>admin/?page=hair&action=add&album_id=<?= $album_id ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus mr-1"></i>Thêm ảnh vào album này
                                </a>
                            </div>
                        </div>
                        
                        <div class="card-body bg-white p-3">
                            <form action="" method="POST">
                                <div class="d-flex flex-wrap" style="gap:12px;">
                                    <?php foreach ($photos as $r): ?>
                                        <div class="gallery-item">
                                            <input type="checkbox" name="id[]" value="<?= $r['id'] ?>" class="item-checkbox">
                                            <img src="<?= ROOT ?>images/sliders/<?= $r['images'] ?>" alt="<?= htmlspecialchars($r['name']) ?>">
                                            <div class="overlay-actions">
                                                <a href="<?= ROOT ?>admin/?page=hair&action=edit&id=<?= $r['id'] ?>" class="btn-action btn-edit" title="Sửa / Di chuyển album">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="<?= ROOT ?>admin/?page=hair&id=<?= $r['id'] ?>" onclick="return confirm('Xóa ảnh này?')" class="btn-action btn-delete" title="Xóa">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-danger btn-sm" name="btn-del" onclick="return confirm('Xóa các ảnh đã chọn?')">
                                        <i class="fas fa-trash mr-1"></i>Xóa các ảnh đã chọn
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</div>