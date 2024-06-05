<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/repository/category_repository.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/validator/data_validator.php');
class CartegoryService extends CategoryRepository
{


    private $table;

    public function __construct()
    {
        $this->table = "";
        parent::__construct();
    }


    public function fetchAllCategory()
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
    public function getAllCartegory(int $pageNumber, int $pageSize)
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

    public function getAllCartegoryById($id)
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
            'message' => 'Category does not exist',
            'success' => false,
            'data' => null,
            'error' => [],
        ];
    }

    public function updateCartegory(string $id, string $name)
    {
        $result = $this->findById($id);
        if ($result) {
            $data = $this->update(new CategoryModel(
                id: $id,
                name: $name,
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
            'message' => 'Category does not exist',
            'success' => false,
            'data' => null,
            'error' => [],
        ];
    }

    public function addCategory(string $name)
    {
        $error = [];
        $name = DataValidator::sanitizeInput($name);

        if (empty($name)) {
            return [
                'token' => null,
                'message' => 'Form validation error',
                'success' => false,
                'data' => null,
                'error' => [
                    'name' => 'This field is required'
                ],
            ];
        }
        if (DataValidator::validateName($name)) {

            $result = $this->findByName($name);
            if ($result !== null) {
                return [
                    'token' => null,
                    'message' => 'Category already exist',
                    'success' => false,
                    'data' => null,
                    'error' => $error,
                ];
            }

            $result = $this->save(new CategoryModel(
                id: null,
                name: $name,
                dateCreated: date('Y-m-d H:i:s'),
                dateUpdated: null
            ));

            if ($result) {
                return [
                    'token' => null,
                    'message' => 'Category added',
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
                'name' => 'Enter a valid name'
            ],
        ];
    }
}
