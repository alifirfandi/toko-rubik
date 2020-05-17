<?php if (empty($product)) : ?>
    <h4 class="m-3 text-danger">Invalid Code !</h4>
<?php else : ?>
    <div class="card mt-5">
        <div class="card-header text-white bg-success">
            <div class="row">
                <div class="col-6 pt-2">
                    <h4>ID-<?= str_pad($product['id'], 8, '0', STR_PAD_LEFT) ?></h4>
                </div>
                <div class="col-6 pt-2 text-right text-white">
                    <h4>Kode Booking : <?= $product['code'] ?></h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img class="img-thumbnail" src="<?= base_url("assets/img/rubik/") . $product['img'] ?>" alt="" width="250">
                </div>
                <div class="col-md-4 pt-4">
                    <h2 class="card-title text-dark"><?= $product['name'] ?> <?= $product['base'] ?></h2>
                    <h3 class="card-text"><?= $product['merk'] ?></h3>
                    <h3 class="text-primary">Rp <?= $product['price'] ?></h3>
                </div>
                <div class="col-md-2"><br>
                    <a href="<?= site_url('admin/accept_booking?id=') . $product['id_book'] . "&product=" . $product['id'] ?>" class="btn btn-success">Accept Booking</a>
                </div>
            </div>
        </div>
        <div class="card-footer text-white bg-danger">
            Deadline : <?= $product['deadline'] ?>
        </div>
    </div>
<?php endif; ?>