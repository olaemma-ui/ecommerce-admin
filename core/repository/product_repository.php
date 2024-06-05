<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/database/database_config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/required/global_imports.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/required/global_imports.php');

abstract class ProductRepository
{


    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @param string $id
     * 
     */
    protected function getById(string $product_id = null)
    {
        $stmt = $this->db->mysqli->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->bind_param('s', $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }


    protected function saveProduct(ProductModel $product)
    {
        $product_name = $product->getProductName();
        $price = $product->getPrice();
        $description = $product->getDescription();
        $created_at = date('Y-m-d H:i:s');
        $gender = $product->getGender();
        $brand_id = $product->getBrandId();
        $available_size = $product->getAvailableSize();
        $quantity = $product->getQuantity();
        $sold = 0;
        $product_id = uniqid('product_');
        $category_id = $product->getCategoryId();
        $product_images = $product->getProductImages();

        // print_r($product->toArray());
        $stmt = $this->db->mysqli->prepare("INSERT INTO products (product_name, price, 
            description, created_at, updated_at, gender, brand_id, 
            available_size, quantity, sold, product_id, category_id, product_images) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sdssssssdssss', $product_name, $price, $description, $created_at, $created_at, $gender, $brand_id, $available_size, $quantity, $sold, $product_id, $category_id, $product_images);
        $stmt->execute();
        return $product_id;
    }


    protected function updateProductById($product_id, ProductModel $product)
    {
        // Construct the SET part of the SQL query dynamically based on the new data
        $setClause = "";
        $params = [];
        $newData = $product->toArray();
        foreach ($newData as $key => $value) {
            $setClause .= "$key = ?, ";
            $params[] = &$newData[$key];
        }
        $setClause = rtrim($setClause, ', ');

        // Prepare the SQL query
        $stmt = $this->db->mysqli->prepare("UPDATE products SET $setClause WHERE product_id = ?");
        if ($stmt === false) {
            return false; // Error preparing statement
        }

        // Bind parameters
        $types = str_repeat('s', count($params)) . 's'; // Assuming all parameters are strings
        $stmt->bind_param($types, ...$params);
        $stmt->bind_param('s', $product_id);

        // Execute the query
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result === false) {
            return false; // Error executing query
        } else {
            return true; // Update successful
        }
    }


    protected function getProducts(int $page, int $pageSize)
    {
        $offset = ($page - 1) * $pageSize;

        $stmt = $this->db->mysqli->prepare("SELECT * FROM products LIMIT ?, ?");
        $stmt->bind_param('ii', $offset, $pageSize);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        // Calculate pagination information
        $totalProducts = $this->getTotalProductsCount();
        $totalPages = ceil($totalProducts / $pageSize);

        return [
            'products' => $products,
            'pagination' => [
                'total_pages' => $totalPages,
                'current_page' => $page,
                'per_page' => $pageSize,
                'total_products' => $totalProducts
            ]
        ];
    }
    protected function searchProducts(string $searchTerm, int $categoryId)
    {
        $searchTerm = '%' . $searchTerm . '%'; // Add wildcards for partial matching
    
        // Construct the WHERE clause based on the provided parameters
        $whereClause = '';
        $params = array();
        if (!empty($searchTerm)) {
            $whereClause .= " (product_id LIKE ? OR product_name LIKE ?) AND";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }
        if (!empty($categoryId)) {
            $whereClause .= " category_id = ? AND";
            $params[] = $categoryId;
        }
        // Remove the last 'AND' from the WHERE clause
        $whereClause = rtrim($whereClause, ' AND');
    
        // Prepare the SQL statement
        $sql = "SELECT * FROM products";
        if (!empty($whereClause)) {
            $sql .= " WHERE" . $whereClause;
        }
    
        // Prepare and bind parameters
        $stmt = $this->db->mysqli->prepare($sql);
        if ($stmt) {
            $types = str_repeat('s', count($params)); // Assuming all parameters are strings
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
    
            return $products;
        } else {
            // Handle the case where the prepare fails
            return false;
        }
    }
    
    private function getTotalProductsCount()
    {
        $result = $this->db->mysqli->query("SELECT COUNT(*) as total FROM products");
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
