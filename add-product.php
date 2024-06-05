<?php
require 'includes/sidebar.php';
require './core/services/brand_service.php';
require './core/services/categor_service.php';
require './core/services/product_service.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/required/global_imports.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/utils/utilis.php');

$product_name = isset($_GET['product_name']) ? $_GET['product_name'] : '';
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$description = isset($_GET['description']) ? $_GET['pricedescription'] : '';


$brandService = new BrandService();
$brands = $brandService->fetchAllBrands();

$categoryService = new CartegoryService();
$category = $categoryService->fetchAllCategory();

$productService = new ProductService();
$response = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-product'])) {
    $available_size = arrayToString($_POST['size']);
    $available_color = arrayToString($_POST['colors']);
    // print_r($_FILES['product_images']);
    $response = $productService->addProduct(
        new ProductModel(
            product_images: '',
            product_name: $_POST['product_name'],
            price: $_POST['price'],
            available_size: $available_size,
            brand_id: $_POST['brand'],
            category_id: $_POST['category'],
            gender: $_POST['gender'],
            quantity: $_POST['quantity'],
            description: $_POST['description'],
            sold: 0,
            available_color: $available_color
        ),
        product_images: $_FILES['product_images']
    );

    if ($response['success']) $_POST = array();

    print_r($response);
}

?>
<!-- /section-menu-left -->
<!-- section-content-right -->
<div class="section-content-right">
    <!-- header-dashboard -->
    <div class="header-dashboard">
        <div class="wrap">
            <div class="header-left">
                <a href="index.php">
                    <img class="" id="logo_header_mobile" alt="" src="images/logo/logo.png" data-light="images/logo/logo.png" data-dark="images/logo/logo-dark.png" data-width="154px" data-height="52px" data-retina="images/logo/logo@2x.png">
                </a>
                <div class="button-show-hide">
                    <i class="icon-menu-left"></i>
                </div>
                <form class="form-search flex-grow">
                    <fieldset class="name">
                        <input type="text" placeholder="Search here..." class="show-search" name="name" tabindex="2" value="" aria-required="true" required="">
                    </fieldset>
                    <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                    <div class="box-content-search" id="box-content-search">
                        <ul class="mb-24">
                            <li class="mb-14">
                                <div class="body-title">Top selling product</div>
                            </li>
                            <li class="mb-14">
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/17.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.php" class="body-text">Dog Food Rachael Ray Nutrish®</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/18.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.php" class="body-text">Natural Dog Food Healthy Dog Food</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14">
                                        <div class="image no-bg">
                                            <img src="images/products/19.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.php" class="body-text">Freshpet Healthy Dog Food and Cat</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="">
                            <li class="mb-14">
                                <div class="body-title">Order product</div>
                            </li>
                            <li class="mb-14">
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/20.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.php" class="body-text">Sojos Crunchy Natural Grain Free...</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/21.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.php" class="body-text">Kristin Watson</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/22.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.php" class="body-text">Mega Pumpkin Bone</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14">
                                        <div class="image no-bg">
                                            <img src="images/products/23.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.php" class="body-text">Mega Pumpkin Bone</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="header-grid">
                <div class="header-item country">
                    <select class="image-select no-text">
                        <option data-thumbnail="images/country/1.png">ENG</option>
                        <option data-thumbnail="images/country/9.png">VIE</option>
                    </select>
                </div>
                <div class="header-item button-dark-light">
                    <i class="icon-moon"></i>
                </div>
                <div class="popup-wrap noti type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <span class="text-tiny">1</span>
                                <i class="icon-bell"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <h6>Message</h6>
                            </li>
                            <li>
                                <div class="noti-item w-full wg-user active">
                                    <div class="image">
                                        <img src="images/avatar/user-11.png" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <a href="#" class="body-title">Cameron Williamson</a>
                                            <div class="time">10:13 PM</div>
                                        </div>
                                        <div class="text-tiny">Hello?</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-item w-full wg-user active">
                                    <div class="image">
                                        <img src="images/avatar/user-12.png" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <a href="#" class="body-title">Ralph Edwards</a>
                                            <div class="time">10:13 PM</div>
                                        </div>
                                        <div class="text-tiny">Are you there? interested i this...</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-item w-full wg-user active">
                                    <div class="image">
                                        <img src="images/avatar/user-13.png" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <a href="#" class="body-title">Eleanor Pena</a>
                                            <div class="time">10:13 PM</div>
                                        </div>
                                        <div class="text-tiny">Interested in this loads?</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-item w-full wg-user active">
                                    <div class="image">
                                        <img src="images/avatar/user-11.png" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <a href="#" class="body-title">Jane Cooper</a>
                                            <div class="time">10:13 PM</div>
                                        </div>
                                        <div class="text-tiny">Okay...Do we have a deal?</div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#" class="tf-button w-full">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="popup-wrap message type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <span class="text-tiny">1</span>
                                <i class="icon-message-square"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
                            <li>
                                <h6>Notifications</h6>
                            </li>
                            <li>
                                <div class="message-item item-1">
                                    <div class="image">
                                        <i class="icon-noti-1"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Discount available</div>
                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec diam</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-2">
                                    <div class="image">
                                        <i class="icon-noti-2"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Account has been verified</div>
                                        <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus et</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-3">
                                    <div class="image">
                                        <i class="icon-noti-3"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Order shipped successfully</div>
                                        <div class="text-tiny">Integer aliquam eros nec sollicitudin sollicitudin</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-4">
                                    <div class="image">
                                        <i class="icon-noti-4"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Order pending: <span>ID 305830</span></div>
                                        <div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#" class="tf-button w-full">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-item button-zoom-maximize">
                    <div class="">
                        <i class="icon-maximize"></i>
                    </div>
                </div>
                <div class="popup-wrap apps type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <i class="icon-grid"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton4">
                            <li>
                                <h6>Related apps</h6>
                            </li>
                            <li>
                                <ul class="list-apps">
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-1.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Photoshop</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-2.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">illustrator</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-3.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Sheets</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-4.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Gmail</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-5.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Messenger</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-6.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Youtube</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-7.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Flaticon</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-8.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Instagram</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-9.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">PDF</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" class="tf-button w-full">View all app</a></li>
                        </ul>
                    </div>
                </div>
                <div class="popup-wrap user type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-user wg-user">
                                <span class="image">
                                    <img src="images/avatar/user-1.png" alt="">
                                </span>
                                <span class="flex flex-column">
                                    <span class="body-title mb-2">Kristin Watson</span>
                                    <span class="text-tiny">Admin</span>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
                            <li>
                                <a href="#" class="user-item">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="body-title-2">Account</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-item">
                                    <div class="icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="body-title-2">Inbox</div>
                                    <div class="number">27</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-item">
                                    <div class="icon">
                                        <i class="icon-file-text"></i>
                                    </div>
                                    <div class="body-title-2">Taskboard</div>
                                </a>
                            </li>
                            <li>
                                <a href="setting.php" class="user-item">
                                    <div class="icon">
                                        <i class="icon-settings"></i>
                                    </div>
                                    <div class="body-title-2">Setting</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-item">
                                    <div class="icon">
                                        <i class="icon-headphones"></i>
                                    </div>
                                    <div class="body-title-2">Support</div>
                                </a>
                            </li>
                            <li>
                                <a href="login.php" class="user-item">
                                    <div class="icon">
                                        <i class="icon-log-out"></i>
                                    </div>
                                    <div class="body-title-2">Log out</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /header-dashboard -->
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Add Product</h3>
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
                                <div class="text-tiny">Ecommerce</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Add product</div>
                        </li>
                    </ul>
                </div>
                <!-- form-add-product -->
                <div class="mb-10">
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
                </div>
                <form class="tf-section-2 form-add-product" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">

                    <div class="wg-box">
                        <fieldset class="product_name">
                            <div class="body-title mb-10">Product name<span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" value="<?= isset($_POST["product_name"]) ? $_POST["product_name"] : $product_name ?>" placeholder="Enter product name" name="product_name" tabindex="0" value="" aria-required="true" required="">
                            <div class="text-tiny">Do not exceed 20 characters when entering the product name.</div>

                            <?= isset($response) && isset($response['error']) && isset($response['error']['product_name'])
                                ? '
                                    <div class="fa-sm mt-2 tf-color-1">
                                        ' . $response["error"]["product_name"] . '
                                        <span class="tf-color-1">*</span>
                                    </div>
                                    '
                                : ''  ?>
                        </fieldset>
                        <div class="gap22 cols">
                            <fieldset class="category">
                                <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                                <div class="">
                                    <select name="category" class="" required>
                                        <?php
                                        if (isset($_POST["category"])) {
                                            $name = findItemById($category['data'], 'category_id', $_POST["category"]);

                                            echo isset($name)
                                                ? '<option value="' . $_POST["gender"] . '"> ' . $name . ' </option>'
                                                : '<option value="0">Choose category</option>';
                                        } else {
                                            echo '<option value="0">Choose category</option>';
                                        } ?>
                                        <?php
                                        $count = 0;
                                        while ($count < count($category['data'])) {
                                            echo '
                                            <option ' . (isset($_POST["category"]) ? ($_POST["category"] == $category['data'][$count]["category_id"] ? 'selected' : '') : '') . ' value="' . $category['data'][$count]["category_id"] . '">
                                                ' . $category['data'][$count]["category_name"] . '
                                            </option>
                                            ';
                                            $count++;
                                        }
                                        ?>
                                    </select>

                                    <?= isset($response) && isset($response['error']) && isset($response['error']['category_id'])
                                        ? '
                                    <div class="fa-sm mt-2 tf-color-1">
                                        ' . $response["error"]["category_id"] . '
                                        <span class="tf-color-1">*</span>
                                    </div>
                                    '
                                        : ''  ?>
                                </div>
                            </fieldset>
                            <fieldset class="male">
                                <div class="body-title mb-10">Gender <span class="tf-color-1">*</span></div>

                                <select name="gender" class="" required>
                                    <?php
                                    if (isset($response) && isset($response['error']) && isset($response['error']['gender'])) {
                                        $name = findItemById(
                                            [
                                                'Male' => 'Male',
                                                'Female' => 'Female',
                                                'Unisex' => 'Unisex',
                                            ],
                                            $_POST["gender"],
                                            $_POST["gender"]
                                        );

                                        echo isset($name)
                                            ? '<option value="' . $_POST["gender"] . '"> ' . $name . ' </option>'
                                            : '<option value="0">Choose gender</option>';
                                    } else {
                                        echo '<option value="0">Choose gender</option>';
                                    }
                                    ?>
                                    <option <?= isset($_POST["gender"]) ? ($_POST["gender"] == 'Male' ? 'selected' : '') : '' ?> value="Male">Male</option>
                                    <option <?= isset($_POST["gender"]) ? ($_POST["gender"] == 'Female' ? 'selected' : '') : '' ?> value="Female">Female</option>
                                    <option <?= isset($_POST["gender"]) ? ($_POST["gender"] == 'Unisex' ? 'selected' : '') : '' ?> value="Unisex">Unisex</option>
                                </select>

                                <?= isset($response) && isset($response['error']) && isset($response['error']['gender'])
                                    ? '
                                    <div class="fa-sm mt-2 tf-color-1">
                                        ' . $response["error"]["gender"] . '
                                        <span class="tf-color-1">*</span>
                                    </div>
                                    '
                                    : ''  ?>
                            </fieldset>
                        </div>

                        <fieldset class="brand">
                            <div class="body-title mb-10">Brand <span class="tf-color-1">*</span></div>
                            <select name="brand" class="" required>
                                <?php
                                if (isset($_POST["brand"])) {
                                    $name = findItemById($brands['data'], 'brand_id', $_POST["brand"]);

                                    echo isset($name)
                                        ? '<option value="' . $_POST["brand"] . '"> ' . $name . ' </option>'
                                        : '<option value="0">Choose brand</option>';
                                } else {
                                    echo '<option value="0">Choose brand</option>';
                                }
                                $count = 0;
                                while ($count < count($brands['data'])) {
                                    echo '
                                        <option ' . (isset($_POST["brand"]) ? ($_POST["brand"] == $brands['data'][$count]["brand_id"] ? 'selected' : '') : '') . ' value="' . $brands['data'][$count]["brand_id"] . '">
                                            ' . $brands['data'][$count]["brand_name"] . '
                                        </option>
                                        ';
                                    $count++;
                                }
                                ?>
                            </select>
                            <?= isset($response) && isset($response['error']) && isset($response['error']['brand_id'])
                                ? '
                                    <div class="fa-sm mt-2 tf-color-1">
                                        ' . $response["error"]["brand_id"] . '
                                        <span class="tf-color-1">*</span>
                                    </div>
                                    '
                                : ''  ?>
                        </fieldset>

                        <div class="cols gap22">
                            <fieldset class="male">
                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div>
                                <input type="text" value="<?= isset($_POST["quantity"]) ? $_POST["quantity"] : $quantity ?>" name="quantity" placeholder="0" required>
                            </fieldset>
                            <fieldset class="male">
                                <div class="body-title mb-10">Price <span class="tf-color-1">*</span></div>
                                <input type="text" value="<?= isset($_POST["price"]) ? $_POST["price"] : $price ?>" name="price" placeholder="₦0.0" required>
                            </fieldset>

                        </div>

                        <fieldset class="description">
                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                            <textarea class="mb-10" value="<?= isset($_POST["description"]) ? $_POST["description"] : $description ?>" name="description" id="myTextarea" placeholder="Description" tabindex="0" aria-required="true" required=""></textarea>
                            <div class="text-tiny">Do not exceed 255 characters when entering the product name.</div>
                        </fieldset>
                    </div>
                    <div class="wg-box flex flex-column justify-content-between h-full">
                        <div class="">
                            <fieldset class="mb-20">
                                <div class="body-title mb-10">Upload images</div>
                                <div class="flex gap-4 align-items-center">
                                    <div class="upload-image mb-16 overflow-auto w-full" style="min-height: 120px !important; border: dashed 1px;  padding: 1em !important;" id="imagePreview">
                                    </div>
                                    <div class="upload-image">

                                        <div class="item border-primary" style="width: 120px; height: 120px !important; border: dashed 1px;">
                                            <label class="uploadfile p-0" for="imageInput">

                                                <span class="icon">
                                                    <i class="icon-upload-cloud"></i>
                                                </span>

                                                <span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                                <input type="file" id="imageInput" value="<?= isset($response) && isset($response['error']) ? $_FILES["product_images"] : $product_images ?>" multiple accept="image/*" required name="product_images[]">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="body-text">You need to add at least 4 images. Pay attention to the quality of the pictures you add, comply with the background color standards. Pictures must be in certain dimensions. Notice that the product shows all the details</div>
                            </fieldset>


                            <div class="cols gap22 mb-10">
                                <fieldset class="name">
                                    <div class="body-title mb-10">Available sizes</div>
                                    <div class="flex gap-4">
                                        <div class="mb-10 w-full">
                                            <fieldset class="name w-full">
                                                <input class="mb-10 w-full" name="size[]" id="mainSizeInput" type="text" placeholder="Enter available size" name="text" tabindex="0" value="">
                                            </fieldset>
                                        </div>

                                        <div class="cols mb-20 gap10" style="margin-left: auto;">
                                            <button id="createInputBtn" onclick="createReadOnlyInput('mainSizeInput', 'readonlyInputsSizeContainer', 'size[]')" class="tf-button btn bg-transparent text-primary" type="button">Add Size</button>
                                        </div>
                                    </div>
                                    <div class="list-box-value" id="readonlyInputsSizeContainer"></div>
                                </fieldset>
                            </div>

                            <div class="cols gap22">
                                <fieldset class="name">
                                    <div class="body-title mb-10">Available colors</div>
                                    <div class="flex gap-4">
                                        <div class="mb-10 w-full">
                                            <fieldset class="name w-full">
                                                <input class="mb-10 w-full" name="colors[]" id="mainColorInput" type="text" placeholder="Enter available colors" name="text" tabindex="0" value="">
                                            </fieldset>
                                        </div>

                                        <div class="cols mb-20 gap10" style="margin-left: auto;">
                                            <button id="createInputBtn" onclick="createReadOnlyInput('mainColorInput', 'readonlyInputsColorContainer', 'color[]')" class="tf-button btn bg-transparent text-primary" type="button">Add Color</button>
                                        </div>
                                    </div>
                                    <div class="list-box-value" id="readonlyInputsColorContainer"></div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="cols gap10">
                            <button class="tf-button w-full" name="add-product" type="submit">Add product</button>
                        </div>
                    </div>
                </form>
                <!-- /form-add-product -->
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
</div>
<!-- /section-content-right -->
</div>
<!-- /layout-wrap -->
</div>
<!-- /#page -->
</div>
<!-- /#wrapper -->

<!-- Javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/zoom.js"></script>
<script src="js/switcher.js"></script>
<script src="js/theme-settings.js"></script>
<script src="js/main.js"></script>

</body>

<script>
    function createReadOnlyInput(mainInputId, containerId, nameAttribute) {
        // Get value from the main input
        var mainInputValue = document.getElementById(mainInputId).value;

        if (mainInputValue.trim() !== '') {
            // Create a new readonly input element
            var newInput = document.createElement('div');
            newInput.className = 'flex align-items-center gap-4';

            var inputField = document.createElement('input');
            inputField.type = 'text';
            inputField.value = mainInputValue;
            inputField.readOnly = true;
            inputField.maxLength = 10;
            inputField.name = nameAttribute; // Set the name attribute
            inputField.classList.add('border-0');
            inputField.classList.add('px-0');
            newInput.style.width = '150px';
            newInput.style.borderRadius = '12px';
            newInput.style.paddingRight = '12px';
            newInput.style.paddingLeft = '12px';
            newInput.style.border = 'solid 1px #B6B9BD37';
            newInput.appendChild(inputField);

            // Create a trash icon for delete action
            var trashIcon = document.createElement('i');
            trashIcon.className = 'icon-trash fs-2 pr-8';
            trashIcon.style.color = '#FF5200';
            trashIcon.addEventListener('click', function() {
                // Remove the input field and trash icon when clicked
                newInput.remove();
            });
            newInput.appendChild(trashIcon);

            // Append the new input to the container
            document.getElementById(containerId).appendChild(newInput);

            // Clear the main input
            document.getElementById(mainInputId).value = '';
        }
    }


    document.getElementById('imageInput').addEventListener('change', function(event) {
        var files = event.target.files; // Get selected files

        var imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = ''; // Clear previous previews
        console.log('files.length = ', files.length);
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                var div = document.createElement('div');
                div.classList.add('item');
                div.classList.add('p-0');
                div.classList.add('relative');
                div.classList.add('border-0');
                div.style.maxWidth = '100px'; // Limit width for preview
                div.style.maxHeight = '100px'; // Limit height for preview

                var img = document.createElement('img');
                img.src = e.target.result; // Set image source to the data URL

                img.style.maxWidth = '100px'; // Limit width for preview
                img.style.maxHeight = '100px'; // Limit height for preview
                img.style.borderRadius = '10px'; // Limit height for preview


                var deleteBtn = document.createElement('button');
                deleteBtn.classList.add('block-warning');
                deleteBtn.classList.add('btn');
                deleteBtn.classList.add('p-0');
                deleteBtn.classList.add('px-3');
                deleteBtn.classList.add('py-3');
                deleteBtn.classList.add('border-0');
                deleteBtn.innerHTML = `<svg viewPort="0 0 4 4" style="width: 10px; height: 11px;" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <line x1="1" y1="12" 
                                                x2="11" y2="1" 
                                                stroke="white" 
                                                stroke-width="2"/>
                                            <line x1="1" y1="1" 
                                                x2="11" y2="11" 
                                                stroke="white" 
                                                stroke-width="2"/>
                                        </svg>`;
                deleteBtn.style.backgroundColor = '#FF5200';
                deleteBtn.style.position = 'absolute';

                deleteBtn.addEventListener('click', function() {
                    div.remove(); // Remove the parent div when delete button is clicked
                });

                // Append delete button to div
                div.appendChild(deleteBtn);

                // Append image to div
                div.appendChild(img);

                imagePreview.appendChild(div); // Append image to preview container
            }

            reader.readAsDataURL(file); // Read file as data URL
        }
    });
</script>

</html>