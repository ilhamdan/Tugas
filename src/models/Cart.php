<?php
session_start();

class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    
    public function getItems() {
        return $_SESSION['cart'] ?? [];
    }
    
    public function add($productId, $quantity = 1) {
        $product = Product::getById($productId);
        if (!$product) return;
        
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['qty'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'qty' => $quantity
            ];
        }
    }
    
    public function remove($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }
    
    public function clear() {
        $_SESSION['cart'] = [];
    }
    
    public function getTotal() {
        $total = 0;
        foreach ($this->getItems() as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }
    
    public function updateQuantity($productId, $quantity) {
        if ($quantity <= 0) {
            $this->remove($productId);
        } elseif (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['qty'] = $quantity;
        }
    }
}