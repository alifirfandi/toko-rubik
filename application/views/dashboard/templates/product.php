<?php if (empty($products)) : ?>
    <h4>Not Found</h4>
<?php endif; ?>

<?php foreach ($products as $product) : ?>
    <div class="row no-gutters mt-3" style="border: 1px solid; border-radius: 10px;">
        <div class="col-md-4">
            <img src="<?= base_url("assets/img/rubik/") . $product['img'] ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $product['name'] . ' ' . $product['base'] ?></h5>
                <p class="card-text"><?= $product['merk'] ?></p>
                <p class="card-text"><button class="btn btn-primary">Add</button></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>