<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/repository/brand_repository.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/validator/data_validator.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/utils/utilis.php');
class BrandService extends BrandRepository
{


    private $table;
    private $allowedTypes = array('image/jpeg', 'image/png');
    private $uploadDir;
    private $uploadDirPath;



    public function __construct()
    {
        $this->table = "";
        $this->uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/uploads/brand/';
        $this->uploadDirPath = '/ecommerce-admin/core/uploads/brand/';
        parent::__construct();
    }


    public function getAllBrand(int $pageNumber, int $pageSize)
    {
        $result = $this->findByAll(pageNumber: $pageNumber, pageSize: $pageSize);

        return [
            'token' => null,
            'message' => 'Success',
            'success' => true,
            'data' => $result,
            'error' => [],
        ];
    }

    public function fetchAllBrands()
    {
        $result = $this->find_list();
        return [
            'token' => null,
            'message' => 'Success',
            'success' => true,
            'data' => $result,
            'error' => [],
        ];
    }

    public function getAllBrandById($id)
    {
        $result = $this->findById($id);
        if ($result) {
            return [
                'token' => null,
                'message' => 'Success',
                'success' => true,
                'data' => $result->toArray(),
                'error' => [],
            ];
        }
        return [
            'token' => null,
            'message' => 'Brand does not exist',
            'success' => false,
            'data' => null,
            'error' => [],
        ];
    }

    public function updateBrand(string $id, string $name, $logo)
    {
        $result = $this->findById($id);
        if ($result) {
            $data = $this->update(new BrandModel(
                id: $id,
                name: $name,
                logo: $logo,
                dateUpdated: date('Y-m-d H:i:s'),
                dateCreated: $result->getDateCreated()
            ));

            if ($data) {
                return [
                    'token' => null,
                    'message' => 'Success',
                    'success' => true,
                    'data' => $result->toArray(),
                    'error' => [],
                ];
            }
            return [
                'token' => null,
                'message' => 'An error occurred',
                'success' => false,
                'data' => [],
                'error' => [],
            ];
        }
        return [
            'token' => null,
            'message' => 'Brand does not exist',
            'success' => false,
            'data' => null,
            'error' => [],
        ];
    }

    public function addBrand(string $name, $logo)
    {
        $error = [];
        $name = DataValidator::sanitizeInput($name);

        if (empty($name) || empty($logo)) {
            return [
                'token' => null,
                'message' => 'Form validation error',
                'success' => false,
                'data' => null,
                'error' => [
                    'name' => empty($name) ? 'This field is required' : null,
                    'logo' => empty($logo) ? 'This field is required' : null
                ],
            ];
        }


        $result = $this->findByName($name);
        if ($result !== null) {
            return [
                'token' => null,
                'message' => 'Brand already exist',
                'success' => false,
                'data' => null,
                'error' => $error,
            ];
        }

        $file = uploadFile($logo, $this->allowedTypes, $this->uploadDir);
        if ($file['success']) {
            $result = $this->save(new BrandModel(
                id: null,
                name: $name,
                logo: $this->uploadDirPath . $file['file'],
                dateCreated: date('Y-m-d H:i:s'),
                dateUpdated: null
            ));

            if ($result) {
                return [
                    'token' => null,
                    'message' => 'Brand added',
                    'success' => true,
                    'data' => null,
                    'error' => $error,
                ];
            }

            return [
                'token' => null,
                'message' => 'Error occurred',
                'success' => false,
                'data' => null,
                'error' => $error,
            ];
        }
        return [
            'token' => null,
            'message' => 'Form validation error',
            'success' => false,
            'data' => null,
            'error' => [
                'logo' => $file['message'],
                'name' => null,
            ],
        ];
    }
}
