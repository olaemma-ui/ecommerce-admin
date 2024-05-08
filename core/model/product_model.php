

<?php
class Product
{
    private $product_name;
    private $price;
    private $description;
    private $created_at;
    private $updated_at;
    private $gender;
    private $brand_id;
    private $available_size;
    private $quantity;
    private $sold;
    private $product_id;
    private $category_id;

    public function __construct($product_name, $price, $description, $created_at, $updated_at, $gender, $brand_id, $available_size, $quantity, $sold, $product_id, $category_id)
    {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->price = $price;
        $this->description = $description;
        $this->updated_at = $updated_at;
        $this->gender = $gender;
        $this->brand_id = $brand_id;
        $this->available_size = $available_size;
        $this->quantity = $quantity;
        $this->sold = $sold;
        $this->category_id = $category_id;
        $this->created_at = date("Y-m-d H:i:s");
        $this->gender = $gender;
    }

      // Getter methods
      public function getProductName() {
        return $this->product_name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getBrandId() {
        return $this->brand_id;
    }

    public function getAvailableSize() {
        return $this->available_size;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getSold() {
        return $this->sold;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getCategoryId() {
        return $this->category_id;
    }
    // Method to convert object to array
    public function toArray()
    {
        return [
            'product_name' => $this->product_name,
            'price' => $this->price,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'gender' => $this->gender,
            'brand_id' => $this->brand_id,
            'available_size' => $this->available_size,
            'quantity' => $this->quantity,
            'sold' => $this->sold,
            'product_id' => $this->product_id,
            'category_id' => $this->category_id
        ];
    }
}
