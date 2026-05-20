<?php $service = statistical_service(); ?>
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
            <h6 class="m-0 font-weight-bold text-primary">Thống kê dịch vụ theo loại
            <a href="<?= ROOT ?>admin/?page=statistic&action=char_ser" class="btn btn-primary ml-5">Xem biểu đồ</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST" class="col-md-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên loại dịch vụ</th>
                                <th>Số lượng dịch vụ</th>
                                <th>Giá thấp nhất</th>
                                <th>Giá cao nhất</th>
                                <th>Giá trung bình</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Tên loại dịch vụ</th>
                                <th>Số lượng dịch vụ</th>
                                <th>Giá thấp nhất</th>
                                <th>Giá cao nhất</th>
                                <th>Giá trung bình</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($service as $s) : ?>
                                <tr>
                                <td><?=$s['name'] ?></td>
                                <td><?=$s['so_luong'] ?></td>
                                <td><?=number_format($s['gia_min'],0,',','.').'đ' ?></td>
                                <td><?=number_format($s['gia_max'],0,',','.').'đ'?></td>
                                <td><?=number_format($s['gia_avg'],0,',','.').'đ' ?></td>
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