<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    order_delete($id);
    detail_delete_order($id);
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=order');
    die;
}
if (isset($_POST['btn-del'])) {
    extract($_REQUEST);
    foreach ($id as $id_order) {
        order_delete($id_order);
        detail_delete_order($id_order);
    }
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=order');
    die;
}

$order = list_all_order();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="card-header py-3 text-success">
            <h6 class="font-weight-bold"><?= $_SESSION['message'] ?></h6>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    
</div>
<!-- /.container-fluid -->