<?php $product = statistical_product(); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="card-header py-3 text-success">
            <h6 class="font-weight-bold"><?= $_SESSION['message'] ?></h6>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thống kê sản phẩm theo danh mục 
            <a href="<?= ROOT ?>admin/?page=statistic&action=char_pro" class="btn btn-primary ml-5">Xem biểu đồ</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST" class="col-md-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên danh mục</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Giá thấp nhất</th>
                                <th>Giá cao nhất</th>
                                <th>Giá trung bình</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Tên danh mục</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Giá thấp nhất</th>
                                <th>Giá cao nhất</th>
                                <th>Giá trung bình</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($product as $p) : ?>
                                <tr>
                                <td><?=$p['name'] ?></td>
                                <td><?=$p['so_luong'] ?></td>
                                <td><?=number_format($p['gia_min'],0,',','.').'đ' ?></td>
                                <td><?=number_format($p['gia_max'],0,',','.').'đ'?></td>
                                <td><?=number_format($p['gia_avg'],0,',','.').'đ' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->