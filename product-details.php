<?php
require 'includes/sidebar.php';
require './core/services/brand_service.php';
require './core/services/categor_service.php';
require './core/services/product_service.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/required/global_imports.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/utils/utilis.php');

$productId = $_GET['productId'];

$categoryService = new CartegoryService();
$category = $categoryService->fetchAllCategory();


$brandService = new BrandService();
$brands = $brandService->fetchAllBrands();
$response = [];

if (isset($productId)) {

  $productService = new ProductService();
  $response = $productService->getProductById($productId);
} else {

  // Check if HTTP_REFERER is set
  if (isset($_SERVER['HTTP_REFERER'])) {
    // Get the URL of the previous page
    $previous_page = $_SERVER['HTTP_REFERER'];
  } else {
    // Set a default URL if HTTP_REFERER is not set
    $previous_page = 'product-list.php';
  }

  header("Location: product-list.php");
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
          <!-- <img class="" id="logo_header_mobile" alt="" src="iZmages/logo/logo.png" data-light="images/logo/logo.png" data-dark="images/logo/logo-dark.png" data-width="154px" data-height="52px" data-retina="images/logo/logo@2x.png"> -->
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
          <h3>Product Details</h3>
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
              <a href="#">
                <div class="text-tiny">Product List</div>
              </a>
            </li>
            <li>
              <i class="icon-chevron-right"></i>
            </li>
            <li>
              <div class="text-tiny">Product Details</div>
            </li>
          </ul>
        </div>
        <!-- product-list -->
        <div class="wg-box">
          <div class="title-box">
            <i class="icon-coffee"></i>
            <div class="body-text">Tip search by Product ID: Each product is provided with a unique ID, which you can rely on to find the exact product you need.</div>
            <a class="tf-button style-1 w208 mx-auto" href="add-product.php"><i class="icon-plus"></i>Update / Edit</a>
          </div>

          <div class="">
            <div class="">
              <!-- card left -->
              <div class="product-imgs">
                <div class="img-display">
                  <div class="img-showcase">
                    <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" class="pill" alt="shoe image">
                    <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt="shoe image">
                    <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt="shoe image">
                    <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt="shoe image">
                  </div>
                </div>
                <div class="img-select">
                  <div class="img-item">
                    <a href="#" data-id="1">
                      <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt="shoe image">
                    </a>
                  </div>
                  <div class="img-item">
                    <a href="#" data-id="2">
                      <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt="shoe image">
                    </a>
                  </div>
                  <div class="img-item">
                    <a href="#" data-id="3">
                      <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt="shoe image">
                    </a>
                  </div>
                  <div class="img-item">
                    <a href="#" data-id="4">
                      <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt="shoe image">
                    </a>
                  </div>
                </div>
              </div>
              <!-- card right -->
              <div class="product-content">
                <h2 class="product-title"><?= $response['data']['product_name'] ?></h2>
                <div class="product-detail">
                  <h5>About this item: </h5>
                  <p style="line-height: 1.5em;" class="fs-4">
                    <?= $response['data']['description'] ?>
                  </p>
                  <div class="row">
                    <ul class="fs-4 col-md-4">
                      <li>Brand: <span>
                          <?= array_filter($brands['data'], function ($brd) {
                            global $response;
                            return $brd['brand_id'] == ($response['data']['brand_id']);
                          })[0]['brand_name'];
                          ?>
                        </span>
                      </li>
                      <li>Quantity: <span><?= $response['data']['quantity'] ?></span></li>
                      <li>Sold: <span><?= $response['data']['sold'] ?></span></li>
                      <li>Available: <span>in stock</span></li>
                    </ul>
                    <ul class="fs-4 col-md-4">
                      <li>Category: <span>
                        <?= print_r($category['data'])?>
                        <br><br>
                        <?= print_r($response['data']['category_id'])?>
                         </span></li>
                      <li>Color: <span><?=$response['data']['color']?></span></li>
                      <li>Shipping Area: <span>All over the world</span></li>
                      <li>Shipping Fee: <span>Free</span></li>
                    </ul>
                  </div>
                </div>
                <!-- <h2 class="product-title">nike shoes</h2>
                <a href="#" class="product-link">visit nike store</a> -->
                <div class="product-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                  <p class="fs-5">4.7(21)</p>
                </div>
                <div class="product-price">
                  <p class="new-price">Price: <span>₦<?= $response['data']['price'] ?></span></p>
                </div>


              </div>
            </div>
          </div>
        </div>
        <!-- /product-list -->
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
<script src="js/product-details.js"></script>

</body>

</html>