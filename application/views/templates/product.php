<?php if (empty($products)) : ?>
    <span class="col text-center alert alert-danger" style="height:45px">Not Found</span>
<?php else : ?>
    <?php foreach ($products as $product) : ?>
        <!-- Product -->
        <div class="product col-md-3">
            <div class="product_image"><img src="<?= base_url("assets/img/rubik/") . $product['img'] ?>" alt=""></div>
            <div class="product_content">
                <div class="product_title"><a class="text-dark"><?= $product['name'] ?> <?= $product['base'] ?> <?= $product['merk'] ?></a></div>
                <div class="product_price">Rp <?= $product['price'] ?></div>
                <div class="mt-2 h6 text-danger">Stok : <?= $product['stok'] ?></div>
                <?php if ($this->session->userdata('role') == 3) : ?>
                    <button class="click-book btn btn-warning" data-id="<?= $product['id'] ?>">Book</button>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>