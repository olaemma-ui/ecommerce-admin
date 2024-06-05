        <?php
        require 'includes/sidebar.php';
        require './core/services/categor_service.php';

        $action = isset($_GET['action']) ? $_GET['action'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $name = isset($_GET['name']) ? $_GET['name'] : '';

        $response = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $categoryService = new CartegoryService();
            if ($action == 'update') {
                $response = $categoryService->updateCartegory($id, $_POST['name']);
            } else {
                $response = $categoryService->addCategory($_POST['name']);
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
                        <h3>Category infomation</h3>
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
                                <div class="text-tiny">New category</div>
                            </li>
                        </ul>
                    </div>
                    <!-- new-category -->
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
                        <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form-new-product form-style-1">
                            <fieldset class="name">
                                <div class="body-title">Category name <span class="tf-color-1">*</span></div>
                                <div class="input w-full">
                                    <input class="flex-grow" type="text" placeholder="Category name" name="name" tabindex="0" value="<?= isset($response) && isset($response['error']) && isset($response['error']['name']) ? $_POST["name"] : $name ?>" aria-required="true" required>
                                    <?= isset($response) && isset($response['error']) && isset($response['error']['name'])
                                        ? '
                                        <div class="fa-sm mt-2 tf-color-1">
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
                    <!-- /new-category -->
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