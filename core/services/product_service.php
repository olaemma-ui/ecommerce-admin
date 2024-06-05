<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/repository/product_repository.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/required/global_imports.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/utils/utilis.php');
class ProductService extends ProductRepository
{

    private $allowedTypes = array('image/jpeg', 'image/png');
    private $uploadDir;
    private $uploadDirPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/uploads/product/';
        $this->uploadDirPath = '/ecommerce-admin/core/uploads/product/';
    }


    public function get_product_list()
    {
    }

    public function getAllProducts(int $page, int $limit)
    {
        $result = $this->getProducts(page: $page, pageSize: $limit);
        return [
            'message' => 'Success',
            'success' => true,
            'data' => $result,
            'error' => [],
        ];
    }

    public function getProductById(string $id)
    {
        $result = $this->getById(product_id: $id);
        return [
            'message' => 'Success',
            'success' => true,
            'data' => $result,
            'error' => [],
        ];
    }

    public function addProduct(ProductModel $product, $product_images)
    {
        $error = [];
        foreach ($product->toArray() as $key => $value) {
            if ($key != 'product_images' && $key != 'product_id' && $key != 'updated_at' && $key != 'sold') {
                $value = DataValidator::sanitizeInput($value);
                if (empty($value) && $key != 'sold') {
                    $error[$key] = 'This field is required';
                } else {
                    if ($key == 'price') {
                        if (!DataValidator::validatePrice($value)) $error[$key] = "Invalid price value";
                    }
                }
            }
        }

        if (!empty($error)) {
            return [
                'token' => null,
                'message' => 'Form validation error',
                'success' => false,
                'data' => null,
                'error' => $error,
            ];
        }

        $uploadUrl = null;

        $file = uploadMultipleFiles($product_images, $this->allowedTypes, $this->uploadDir);
        if ($file['success']) {

            for ($i = 0; $i < count($file['uploadedFiles']); $i++) {
                $uploadUrl .= $this->uploadDirPath . $file['uploadedFiles'][$i];
                if ($i < count($file['uploadedFiles']) - 1) {
                    $uploadUrl .= '[#]';
                }
            }
            $result = $this->saveProduct($product->copyWith(['product_images' => $uploadUrl]));
            if ($result) {
                return [
                    'token' => null,
                    'message' => 'Product added',
                    'success' => true,
                    'data' => null,
                    'error' => $error,
                ];
            }

            return [
                'token' => null,
                'message' => 'Error occurred while adding product',
                'success' => false,
                'data' => null,
                'error' => $error,
            ];
        }
        return [
            'token' => null,
            'message' => $file['message'] . ' upload error',
            'success' => false,
            'data' => null,
            'error' => $error,
        ];


        // $result = $this->findByName($name);
        // if ($result !== null) {
        //     return [
        //         'token' => null,
        //         'message' => 'Brand already exist',
        //         'success' => false,
        //         'data' => null,
        //         'error' => $error,
        //     ];
        // }

    }
}
