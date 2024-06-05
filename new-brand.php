<?php
require 'includes/sidebar.php';
require './core/services/brand_service.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$name = isset($_GET['name']) ? $_GET['name'] : '';

$response = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $brandService = new BrandService();
    if ($action == 'update') {
        // $response = $brandService->updateBrand($id, $_POST['name']);
    } else {
        $response = $brandService->addBrand($_POST['name'], $_FILES['logo']);
    }
}
?>

<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Brand infomation</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.php">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">Brand</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">New brand</div>
                    </li>
                </ul>
            </div>
            <!-- new-brand -->
            <div class="wg-box">
                <?=
                !empty($response) ? ($response['success'] === false
                    ? '<div class="block-warning">
                                        <i class="icon-alert-octagon"></i>
                                        <div class="body-title-2">
                                            ' . $response['message'] . '
                                        </div>
                                    </div>'
                    : '<div class="block-warning type-main">
                                        <i class="icon-alert-octagon"></i>
                                        <div class="body-title-2">
                                            ' . $response['message'] . '
                                        </div>
                                    </div>')
                    : ''
                ?>
                <form method="POST" enctype="multipart/form-data" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form-new-product form-style-1">
                    <fieldset class="name">
                        <div class="body-title">Brand logo<span class="tf-color-1">*</span></div>
                        <div class="input w-full">

                            <div class="flex gap-4 flex-column align-items-end">

                            </div>
                            <label for="imageUpload" class="w-full btn p-0">
                            <div id="imagePreview" class="w-full">
                                    <p class="text-secondary">
                                        Band Logo here
                                    </p>
                                </div>
                            </label>
                            <input class="flex-grow rounded mt-5" type="file" accept="image/*" id="imageUpload" placeholder="Brand logo" name="logo" tabindex="0" value="<?= isset($response) && isset($response['error']) && isset($response['error']['name']) ? $_POST["name"] : $name ?>" aria-required="true" required>
                            <?= isset($response) && isset($response['error']) && isset($response['error']['logo'])
                                ? '
                                        <div class="fs-5 mt-2 tf-color-1">
                                            ' . $response["error"]["logo"] . '
                                            <span class="tf-color-1">*</span>
                                        </div>
                                        '
                                : ''  ?>
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">Brand name <span class="tf-color-1">*</span></div>
                        <div class="input w-full">
                            <input class="flex-grow" type="text" placeholder="Brand name" name="name" tabindex="0" value="<?= isset($_POST['name']) ? $_POST["name"] : $name ?>" aria-required="true" required>
                            <?= isset($response) && isset($response['error']) && isset($response['error']['name'])
                                ? '
                                        <div class="fs-5 mt-2 tf-color-1">
                                            ' . $response["error"]["name"] . '
                                            <span class="tf-color-1">*</span>
                                        </div>
                                        '
                                : ''  ?>
                        </div>
                    </fieldset>

                    <div class="bot justify-content-end">
                        <div></div>
                        <button class="tf-button w208" type="submit" name="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /new-brand -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->
    <!-- bottom-page -->
    <div class="bottom-page">
        <div class="body-text">Copyright © 2024 OLA EMMA. Design with</div>
        <i class="icon-heart"></i>
        <div class="body-text">by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a> All rights reserved.</div>
    </div>
    <!-- /bottom-page -->
</div>
<!-- /main-content -->
<?php include 'includes/footer.php' ?>
<script>
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');

    imageUpload.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const imageUrl = reader.result;
                const imgElement = document.createElement('img');
                imgElement.src = imageUrl;
                imagePreview.innerHTML = '';
                imagePreview.appendChild(imgElement);
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = 'No image selected';
        }
    });
</script>