<?php
// check out
if (isset($_POST['id_checkout'])) {
    $id = $_POST['id_checkout'];
    $product = $productModel->getProductByID($id);
    $item = [
        'id' => $product['id'],
        'name' => $product['name'],
        'image' => $product['image'],
        'price' => ($product['discount'] != 0) ? $product['price'] - ($product['price'] * $product['discount'] / 100) : $product['price'],
        'quality' => 1
    ];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quality'] += 1;
    } else {
        $_SESSION['cart'][$id] = $item;
    }

}
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
// like 
if (isset($_COOKIE['user']) && isset($_POST['heart'])) {
    $user = $productModel->getadminid($_COOKIE['user']);
    $productModel->AddLike($user, $_POST['heart']);
}
// user
if (isset($_COOKIE['user'])) {
    $id = $userModel->getIdByUser($_COOKIE['user']);
    $info_list = $userModel->getInforByUser($id);
    $check_account = $userModel->checkadmin($id);
}