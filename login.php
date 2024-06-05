<?php
require './includes/header.php';
require './core/services/auth_service.php';

$session = new SessionManager();
if ($session->getSessionVariable(SessionKeys::USER_ID)) {
    header('location:./index.php');
}
$response = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $authService = new AuthenticationService();
    $response = $authService->authenticate($_POST['email'], $_POST['password']);
    if ($response['success'] === true) {
        $session->setSessionVariable(SessionKeys::USER_ID, $response['data']['userId']);
        header('index.php');
    }
}
?>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="wrap-login-page">
                <div class="flex-grow flex flex-column justify-center gap30">
                    
                    <div class="login-box">
                        <div>
                            <h3>Admin Login </h3>
                            <div class="body-text">Enter your email & password to login</div>
                        </div>
                        <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form-login flex flex-column gap24">
                            <?=
                            !empty($response) && $response['success'] === false
                                ? '<div class="block-warning">
                                        <i class="icon-alert-octagon"></i>
                                        <div class="body-title-2">
                                            ' . $response['message'] . '
                                        </div>
                                    </div>'
                                : ''
                            ?>
                            <fieldset class="email">
                                <div class="body-title mb-10">Email address <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="email" name="email" placeholder="Enter your email address" name="email" tabindex="0" value="" aria-required="true" required="">
                                <?= isset($response) && isset($response['error']) && isset($response['error']['email'])
                                    ?'
                                    <div class="fa-sm mt-2 tf-color-1">
                                        '.$response["error"]["email"].'
                                        <span class="tf-color-1">*</span>
                                    </div>
                                    '
                                : ''  ?>

                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                                <input class="password-input" name="password" type="password" placeholder="Enter your password" name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                                <?= isset($response) && isset($response['error']) && isset($response['error']['password'])
                                    ?'
                                    <div class="fa-sm mt-2 tf-color-1">
                                        '.$response["error"]["password"].'
                                        <span class="tf-color-1">*</span>
                                    </div>
                                    '
                                : ''  ?>

                            </fieldset>
                            <div class="flex justify-between items-center">
                                <div class="flex gap10">
                                    <input class="" type="checkbox" id="signed">
                                    <label class="body-text" for="signed">Keep me signed in</label>
                                </div>
                                <a href="#" class="body-text tf-color">Forgot password?</a>
                            </div>
                            <button type="submit" name="submit" class="tf-button w-full">Login</button>
                        </form>
                        
                    </div>
                </div>
                <div class="text-tiny">Copyright © 2024 Olaemma, All rights reserved.</div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>