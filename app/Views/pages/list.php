<?= $this->include('include/top') ?>
<?= $this->include('include/header') ?>
<?= $this->include('include/navbar') ?>
<?= $this->include('include/end') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <?php foreach ($product as $pr): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 pb-1"> <!-- Each product is wrapped in its own col -->
                <div class="product-item" style="background-color: #f7f7f7; margin: 10px; padding: 10px;">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="data:image/jpeg;base64,<?= base64_encode($pr['image']) ?>" alt="Product Image" style="max-width: 100%; height: auto;">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?= $pr['name'] ?></a>
                        <p><?= $pr['description'] ?></p>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$<?= $pr['price'] ?></h5><h6 class="text-muted ml-2"><del>$<?= $pr['price'] ?></del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
