<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/database/database_config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/required/global_imports.php');
abstract class BrandRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected function findById(string $id): BrandModel | null
    {
        // Example SQL query to fetch brand by ID
        $query = "SELECT * FROM brands WHERE brand_id = ?";
        $stmt = $this->db->mysqli->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new BrandModel($id, $row['brand_name'], $row['dateCreated'], $row['dateUpdated']);
        } else {
            return null;
        }
    }

    protected function find_list(): array | null
    {
        // Example SQL query to fetch brand by ID
        $query = "SELECT * FROM brands";
        $stmt = $this->db->mysqli->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    protected function findByAll(int $pageNumber, int $pageSize): array
    {
        $elements_per_page = $pageSize; // Number of brand per page

        // Get current page number from query parameter
        $current_page = $pageNumber;


        // Calculate offset for pagination
        $offset = ($current_page - 1) * $elements_per_page;

        // Prepare SQL statement to fetch brand
        $stmt = $this->db->mysqli->prepare("SELECT * FROM brands LIMIT ?, ?");
        $stmt->bind_param("ii", $offset, $elements_per_page);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch brand
        $brand = [];
        while ($row = $result->fetch_assoc()) {
            $brand[] = $row;
        }

        // Get total number of brand
        $total_brand_result = $this->db->mysqli->query("SELECT COUNT(*) FROM brands");
        $total_brand_row = $total_brand_result->fetch_row();
        $total_brand = $total_brand_row[0];

        // Calculate total pages
        $total_pages = ceil($total_brand / $elements_per_page);

        // Determine if there's a next page
        $has_next_page = $current_page < $total_pages;

        // Output brand and pagination info
        return [
            'brand' => $brand,
            'pagination' => [
                'total_pages' => $total_pages,
                'total_elements' => $total_brand,
                'current_page' => $current_page,
                'has_next_page' => $has_next_page
            ]
        ];
    }



    protected function save(BrandModel $brand)
    {
        // Example SQL query to insert or update brand
        $query = "INSERT INTO brands (brand_name, dateCreated, dateUpdated, logo_url) VALUES (?, ?, ?, ?)";

        $stmt = $this->db->mysqli->prepare($query);
        $name = $brand->getName();
        $createdAt = $brand->getDateCreated();
        $updatedAt = $brand->getDateUpdated();
        $logo = $brand->getLogo();
        $stmt->bind_param(
            'ssss',
            $name,
            $createdAt,
            $updatedAt,
            $logo
        );

        $stmt->execute();
        return $stmt->affected_rows > 0;
    }


    protected function findByName($name): BrandModel | null
    {
        $query = "SELECT * FROM brands WHERE brand_name = ?";

        // Prepare the statement
        $stmt = $this->db->mysqli->prepare($query);

        // Bind parameters
        $stmt->bind_param("s", $name);

        // Execute the statement
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new BrandModel($row['brand_id'], $row['brand_name'], $row['dateCreated'], $row['dateUpdated']);
        } else {
            return null;
        }
    }

    protected function update(BrandModel $brand)
    {
        $query = "UPDATE brands SET name = ?, dateUpdated = ? WHERE brand_id = ?";

        // Prepare the statement
        $stmt = $this->db->mysqli->prepare($query);

        // Bind parameters
        $name = $brand->getName();
        $dateUpdated = $brand->getDateUpdated();
        $id = $brand->getId();
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
        // Example SQL query to delete brand by ID
        $query = "DELETE FROM brands WHERE id = :id";
        // Execute query with parameter
        // ...

        // For the sake of example, just returning true
        return true;
    }
}
