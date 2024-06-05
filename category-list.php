<?php
require 'includes/sidebar.php';
require './core/services/categor_service.php';

// Pagination parameters
$elements_per_page = 10; // Number of categories per page

// Get current page number from query parameter
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$response = [];
$categoryService = new CartegoryService();
$response = $categoryService->getAllCartegory(
    $current_page,
    $elements_per_page
);
// Check if HTTP_REFERER is set
if (isset($_SERVER['HTTP_REFERER'])) {
    // Get the URL of the previous page
    $previous_page = $_SERVER['HTTP_REFERER'];
} else {
    // Set a default URL if HTTP_REFERER is not set
    $previous_page = 'javascript:history.go(-1)';
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
                    <h3>All category</h3>
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
                                <div class="text-tiny">Category</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">All category</div>
                        </li>
                    </ul>
                </div>
                <!-- all-category -->
                <div class="wg-box">
                    <div class="flex items-center justify-between gap10 flex-wrap">
                        <div class="wg-filter flex-grow">
                            <!-- <div class="show">
                                <div class="text-tiny">Showing</div>
                                <div class="select">
                                    <select class="">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                <div class="text-tiny">entries</div>
                            </div> -->
                            <form class="form-search">
                                <fieldset class="name">
                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                                </fieldset>
                                <div class="button-submit">
                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <a class="tf-button style-1 w208" href="new-category.php"><i class="icon-plus"></i>Add new</a>
                    </div>
                    <div class="overflo" style="overflow-x: auto;">


                        <div class="wg-table table-all-category" style="width: max-content; min-width: 100% !important; overflow-x: auto;">
                            <ul class="table-title flex  mb-14 justify-content-between" style="width: fit-content; min-width: 100% !important;">
                                <li style="width: fit-content;">
                                    <div class="body-title">SN</div>
                                </li>
                                <li style="width: fit-content;">
                                    <div class="body-title">Category</div>
                                </li>

                                <li style="width: fit-content;">
                                    <div class="body-title">Created date</div>
                                </li>
                                <li style="width: 60px;">
                                    <div class="body-title">Action</div>
                                </li>
                            </ul>

                            <?php
                            if (isset($response) && !empty($response['data']['categories'])) {
                                $count = 0;
                                while ($count < count($response['data']['categories'])) {
                                    echo '
                                        <ul class="product-item table-title flex  mb-14" style="width: fit-content; min-width: 100% !important;">
                                        <li style="width: fit-content; padding-left: 1em;">
                                            <div class="body-title">' . ($count + 1) . '</div>
                                        </li>
                                        <li style="width: fit-content; padding-left: 1em;">
                                            <div class="body-text">' . $response['data']['categories'][$count]['category_name'] . '</div>
                                        </li>
        
                                        <li style="width: fit-content; padding-left: 1em;">
                                            <div class="body-text">' . $response['data']['categories'][$count]['dateCreated'] . '</div>
                                        </li>
                                        <li style="width: fit-content; padding-left: 1em;">
                                            <div class="list-icon-function">
                                                <a href="new-category.php?id=' . $response['data']['categories'][$count]['category_id'] . '&action=update&name=' . $response['data']['categories'][$count]['category_name'] . '" class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </a>
                                                <div class="item trash">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </div>
                                            </li>
                                    </ul>
                                    ';
                                    $count++;
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10">
                        <div class="text-tiny">Showing 10 entries</div>
                        <ul class="wg-pagination">
                            <li>
                                <a href="<?= $previous_page ?>"><i class="icon-chevron-left"></i></a>
                            </li>
                            <?php
                            if (isset($response) && !empty($response['data']['pagination'])) {
                                $count = 0;
                                while ($count < ($response['data']['pagination']['total_pages'])) {
                                    echo $current_page == ($count + 1) ?
                                        '
                                        <li class="active">
                                            <a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($count + 1) . '">' . ($count + 1) . '</a>
                                        </li>
                                    ' :
                                        '
                                        <li>
                                            <a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($count + 1) . '">' . ($count + 1) . '</a>
                                        </li>
                                    ';
                                    $count++;
                                }
                            }
                            ?>
                            <!-- <li>
                                <a href="#">1</a>
                            </li>
                            <li class="active">
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li> -->
                            <li>
                                <a href="#"><i class="icon-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /all-category -->
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

</html>