<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/database/database_config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/required/global_imports.php');
abstract class CategoryRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected function findById(string $id): CategoryModel | null
    {
        // Example SQL query to fetch category by ID
        $query = "SELECT * FROM categories WHERE category_id = ?";
        $stmt = $this->db->mysqli->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new CategoryModel($id, $row['category_name'], $row['dateCreated'], $row['dateUpdated']);
        } else {
            return null;
        }
    }

    
    protected function find_list(): array | null
    {
        // Example SQL query to fetch brand by ID
        $query = "SELECT * FROM categories";
        $stmt = $this->db->mysqli->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    protected function findByAll(int $pageNumber, int $pageSize): array
    {
        $elements_per_page = $pageSize; // Number of categories per page

        // Get current page number from query parameter
        $current_page = $pageNumber;


        // Calculate offset for pagination
        $offset = ($current_page - 1) * $elements_per_page;

        // Prepare SQL statement to fetch categories
        $stmt = $this->db->mysqli->prepare("SELECT * FROM categories LIMIT ?, ?");
        $stmt->bind_param("ii", $offset, $elements_per_page);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch categories
        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }

        // Get total number of categories
        $total_categories_result = $this->db->mysqli->query("SELECT COUNT(*) FROM categories");
        $total_categories_row = $total_categories_result->fetch_row();
        $total_categories = $total_categories_row[0];

        // Calculate total pages
        $total_pages = ceil($total_categories / $elements_per_page);

        // Determine if there's a next page
        $has_next_page = $current_page < $total_pages;

        // Output categories and pagination info
        return [
            'categories' => $categories,
            'pagination' => [
                'total_pages' => $total_pages,
                'total_elements' => $total_categories,
                'current_page' => $current_page,
                'has_next_page' => $has_next_page
            ]
        ];
    }

    protected function save(CategoryModel $category)
    {
        // Example SQL query to insert or update category
        $query = "INSERT INTO categories (category_name, dateCreated, dateUpdated) VALUES (?, ?, ?)";

        $stmt = $this->db->mysqli->prepare($query);
        $name = $category->getName();
        $createdAt = $category->getDateCreated();
        $updatedAt = $category->getDateUpdated();
        $stmt->bind_param(
            'sss',
            $name,
            $createdAt,
            $updatedAt
        );

        $stmt->execute();
        return $stmt->affected_rows > 0;
    }


    protected function findByName($name): CategoryModel | null
    {
        $query = "SELECT * FROM categories WHERE category_name = ?";

        // Prepare the statement
        $stmt = $this->db->mysqli->prepare($query);

        // Bind parameters
        $stmt->bind_param("s", $name);

        // Execute the statement
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new CategoryModel($row['category_id'], $row['category_name'], $row['dateCreated'], $row['dateUpdated']);
        } else {
            return null;
        }
    }

    protected function update(CategoryModel $category)
    {
        $query = "UPDATE categories SET name = ?, dateUpdated = ? WHERE category_id = ?";

        // Prepare the statement
        $stmt = $this->db->mysqli->prepare($query);

        // Bind parameters
        $name = $category->getName();
        $dateUpdated = $category->getDateUpdated();
        $id = $category->getId();
        $stmt->bind_param("ssi", $name, $dateUpdated, $id);

        // Execute the statement
        $result = $stmt->execute();

        // Check if the query was successful
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    protected function delete(string $id)
    {
        // Example SQL query to delete category by ID
        $query = "DELETE FROM categories WHERE id = :id";
        // Execute query with parameter
        // ...

        // For the sake of example, just returning true
        return true;
    }
}
