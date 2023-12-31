<?php

class Product {
    public $product_id;
    public $product_name;
    public $product_price;

   function setProductDetails($id, $name, $price) {
        $this->product_id = $id;
        $this->product_name = $name;
        $this->product_price = $price;
    }

 function displayProductDetails() {
        echo "Product ID: " . $this->product_id . PHP_EOL;
        echo "Product Name: " . $this->product_name . PHP_EOL;
        echo "Product Price: $" . $this->product_price . PHP_EOL;
    }
}

class MyCart {
    
    public $products = [];

   function insertProduct($product) {
        $this->products[] = $product;
        echo "Product inserted into cart." . PHP_EOL;
    }

   function updateProduct($id, $name, $price) {
        foreach ($this->products as $product) {
            if ($product->product_id == $id) {
                $product->setProductDetails($id, $name, $price);
                echo "Product updated in cart." . PHP_EOL;
                return;
            }
        }
        echo "Product not found in cart." . PHP_EOL;
    }

    function deleteProduct($id) {
        for ($i = 0; $i < count($this->products); $i++) {
            if ($this->products[$i]->product_id == $id) {
                array_splice($this->products, $i, 1);
                echo "Product deleted from cart." . PHP_EOL;
                return;
            }
        }
        echo "Product not found in cart." . PHP_EOL;
    }

 function searchProduct($id) {
        foreach ($this->products as $product) {
            if ($product->product_id == $id) {
                echo "Product found in cart." . PHP_EOL;
                $product->displayProductDetails();
                return;
            }
        }
        echo "Product not found in cart." . PHP_EOL;
    }

  function countProducts() {
        return count($this->products);
    }
}


$myCart = new MyCart();

do {
    echo "Options: " . PHP_EOL;
    echo "1. Insert" . PHP_EOL;
    echo "2. Update" . PHP_EOL;
    echo "3. Delete" . PHP_EOL;
    echo "4. Search" . PHP_EOL;
    echo "5. Display" . PHP_EOL;
    echo "6. Sort" . PHP_EOL;
    echo "7. Reverse" . PHP_EOL;
    echo "8. Exit" . PHP_EOL;

    $choice = readline("Enter your choice: ");
    switch ($choice) {
        case '1':
            $product = new Product();
            $product->setProductDetails(
                readline("Enter the Product ID: "),
                readline("Enter the Product Name: "),
                readline("Enter the Product Price: ")
            );
            $myCart->insertProduct($product);
            break;

        case '2':
            $id = readline("Enter the Product ID you want to update: ");
            $name = readline("Enter the new Product Name: ");
            $price = readline("Enter the new Product Price: ");
            $myCart->updateProduct($id, $name, $price);
            break;

        case '3':
            $id = readline("Enter the Product ID you want to delete: ");
            $myCart->deleteProduct($id);
            break;

        case '4':
            $id = readline("Enter the Product ID you want to search: ");
            $myCart->searchProduct($id);
            break;

        case '5':
            echo "Products in Cart:" . PHP_EOL;
            foreach ($myCart->products as $product) {
                $product->displayProductDetails();
            }
            break;
        
        case '6':
            echo "Sorting." . PHP_EOL;
            sort($myCart->products);
            foreach ($myCart->products as $product) {
                $product->displayProductDetails();
            }
            break;
        
        case '7':
            echo "Reversing Array." . PHP_EOL;
            rsort($myCart->products);
            foreach ($myCart->products as $product) {
                $product->displayProductDetails();
            }
            break;
        
        case '8':
            echo "Exiting." . PHP_EOL;
            break;
        

        default:
            echo "Invalid choice" . PHP_EOL;
            break;
    }
} while ($choice != '8');

?>
