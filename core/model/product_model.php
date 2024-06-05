

<?php
class ProductModel
{
    private string $product_name;
    private string $product_images;
    private $price;
    private string $description;
    private $created_at;
    private $updated_at;
    private string $gender;
    private int $brand_id;
    private string $available_size;
    private string $available_color;
    private int $quantity;
    private int $sold;
    private $product_id;
    private int $category_id;

    public function __construct($product_name = null, $product_images = null, $price = null, $description = null, $updated_at = null, $gender = null, $brand_id = null, $available_size = null, $quantity = null, $sold = null, $product_id = null, $category_id = null, $available_color = null)
    {
        $this->product_id = $product_id;
        $this->product_images = $product_images;
        $this->product_name = $product_name;
        $this->price = $price;
        $this->description = $description;
        $this->updated_at = $updated_at;
        $this->gender = $gender;
        $this->brand_id = $brand_id;
        $this->available_size = $available_size;
        $this->available_color = $available_color;
        $this->quantity = $quantity;
        $this->sold = $sold;
        $this->category_id = $category_id;
        $this->created_at = date("Y-m-d H:i:s");
        $this->gender = $gender;
    }

    
    public function copyWith(array $params = []) : ProductModel
    {
        $newInstance = clone $this;

        foreach ($params as $key => $value) {
            // Check if the property exists before setting it
            if (property_exists($newInstance, $key)) {
                $newInstance->{$key} = $value;
            }
        }

        return $newInstance;
    }

    // Getter methods
    public function getProductName()
    {
        return $this->product_name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    

    public function getAvailableColor()
    {
        return $this->available_color;
    }
    
    public function getProductImages()
    {
        return $this->product_images;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getBrandId()
    {
        return $this->brand_id;
    }

    public function getAvailableSize()
    {
        return $this->available_size;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getSold()
    {
        return $this->sold;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    // Method to convert object to array
    public function toArray()
    {
        return [
            'product_name' => $this->product_name,
            'price' => $this->price,
            'product_images' => $this->product_images,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'gender' => $this->gender,
            'brand_id' => $this->brand_id,
            'available_size' => $this->available_size,
            'available_color' => $this->available_color,
            'quantity' => $this->quantity,
            'sold' => $this->sold,
            'product_id' => $this->product_id,
            'category_id' => $this->category_id
        ];
    }
}
