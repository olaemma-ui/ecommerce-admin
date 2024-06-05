<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/model/*.php') as $fileName) {
    include $fileName;
}
