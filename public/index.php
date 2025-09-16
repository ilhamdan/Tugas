<?php
require_once __DIR__ . '/../src/database/db.php';
require_once __DIR__ . '/../src/models/Product.php';
require_once __DIR__ . '/../src/models/Cart.php';

$page = $_GET['page'] ?? 'main';
$contentFile = '';
$cart = new Cart();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if (isset($_GET['id'])) {
                $cart->add($_GET['id'], 1);
                header("Location: ?page=cart");
                exit;
            }
            break;
        case 'remove':
            if (isset($_GET['id'])) {
                $cart->remove($_GET['id']);
                header("Location: ?page=cart");
                exit;
            }
            break;
        case 'clear':
            $cart->clear();
            header("Location: ?page=cart");
            exit;
        case 'update':
            if (isset($_POST['id']) && isset($_POST['qty'])) {
                $cart->updateQuantity($_POST['id'], (int)$_POST['qty']);
                header("Location: ?page=cart");
                exit;
            }
            break;
    }
}

switch ($page) {
    case 'products':
        $products = Product::getAll();
        $contentFile = __DIR__ . '/../src/views/form_products.php';
        break;
    case 'cart':
        $contentFile = __DIR__ . '/../src/views/form_cart.php';
        break;
    case 'checkout':
        if (empty($cart->getItems())) {
            header("Location: ?page=cart");
            exit;
        }
        $contentFile = __DIR__ . '/../src/views/form_checkout.php';
        break;
    case 'out':
        $cart->clear();
        $contentFile = __DIR__ . '/../src/views/out/output.php';
        break;
    default:
        $contentFile = __DIR__ . '/../src/views/form_main.php';
}

include __DIR__ . '/../src/views/layout/layout.php';