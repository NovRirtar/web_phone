<?php
class ProductModel extends Model
{
    // Get All Product
    public function getAllProduct()
    {
        $sql = parent::$connection->prepare('SELECT *,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM product');
        return parent::select($sql);
    }
    // Get Product By Id
    public function getProductByID($id)
    {
        $sql = parent::$connection->prepare('SELECT * ,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM product WHERE id=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    public function getAllProductType()
    {
        $sql = parent::$connection->prepare('SELECT * FROM product_type');
        return parent::select($sql);
    }
    public function getProductTypeByID($id)
    {
        $sql = parent::$connection->prepare('SELECT *,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM `product` INNER JOIN product_type ON product.type=product_type.id_type WHERE type=?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    // Sale
    public function getSale()
    {
        $sql = parent::$connection->prepare('SELECT *,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM `product` WHERE`discount`!=0');
        return parent::select($sql);
    }

    ///loại
    public function getProductThefirm($id)
    {
        $sql = parent::$connection->prepare('SELECT * ,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM `product` WHERE `thefirm`=?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    // check out
    public function checkout($arrID)
    {
        $question = str_repeat('?,', count($arrID) - 1);
        $question .= "?";
        $i = str_repeat('i', count($arrID));
        $sql = parent::$connection->prepare("SELECT * FROM product WHERE id IN ($question) ORDER BY FIELD(id,$question) DESC");
        $sql->bind_param($i . $i, ...$arrID, ...$arrID);
        return parent::select($sql);
    }

    // 
    public function getview($id)
    {
        $sql = parent::$connection->prepare('UPDATE product SET view = view + 1 WHERE id=?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    // add like
    public function AddLike($user_like, $product_like)
    {
        $sql = parent::$connection->prepare('INSERT INTO `rating`(`user_like`, `product_like`) VALUES (?,?)');
        $sql->bind_param('ii', $user_like, $product_like);
        return $sql->execute();
    }
    // get admin
    public function getadminid($name)
    {
        $sql = parent::$connection->prepare("SELECT * FROM user WHERE username=?");
        $sql->bind_param('s', $name);
        return parent::select($sql)[0]['id'];
    }
    // search
    public function search($name)
    {
        $sql = parent::$connection->prepare("SELECT * ,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM product WHERE name LIKE ?");
        $q = "%{$name}%";
        $sql->bind_param('s', $q);
        return parent::select($sql);
    }


    // phân trang
    public function getProductByPage($page, $perpage)
    {
        $start = ($page - 1) * $perpage;
        $sql = parent::$connection->prepare('SELECT *,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM product  LIMIT ?,?');
        $sql->bind_param('ii', $start, $perpage);
        return parent::select($sql);
    }
    // đếm sản phẩm
    public function countProduct()
    {
        $sql = parent::$connection->prepare("SELECT * FROM product");
        return count(parent::select($sql));
    }
    // Sắp Xếp giảm dần theo giá
    public function descprice($page, $perpage)
    {
        $start = ($page - 1) * $perpage;
        $sql = parent::$connection->prepare("SELECT *,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM product ORDER BY price-(price*discount/100) DESC LIMIT ?,?");
        $sql->bind_param('ii', $start, $perpage);
        return parent::select($sql);
    }
    // tăng dần
    public function asc($page, $perpage)
    {
        $start = ($page - 1) * $perpage;
        $sql = parent::$connection->prepare("SELECT *,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM product ORDER BY price-(price*discount/100) ASC LIMIT ?,?");
        $sql->bind_param('ii', $start, $perpage);
        return parent::select($sql);
    }
    // the firm
    public function thefirm($id, $page, $perpage)
    {
        $start = ($page - 1) * $perpage;
        $sql = parent::$connection->prepare("SELECT * ,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM `product` INNER JOIN product_thefirm ON product.thefirm=product_thefirm.thefirm_id WHERE thefirm=? LIMIT ?,?");
        $sql->bind_param('iii', $id, $start, $perpage);
        return parent::select($sql);
    }
    public function getAllTheFirm()
    {
        $sql = parent::$connection->prepare('SELECT * FROM product_thefirm');
        return parent::select($sql);
    }
    public function countFirm($id)
    {
        $sql = parent::$connection->prepare('SELECT COUNT(*) as count FROM `product` WHERE `thefirm`=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0]['count'];
    }
    // xem nhiều
    public function view($page, $perpage)
    {
        $start = ($page - 1) * $perpage;
        $sql = parent::$connection->prepare('SELECT *,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM product ORDER BY `view` DESC LIMIT ?,?');
        $sql->bind_param('ii', $start, $perpage);
        return parent::select($sql);
    }
    // giá trong khoảng
    public function pricefill($price_start, $price_end, $page, $perpage)
    {
        $start = ($page - 1) * $perpage;
        $sql = parent::$connection->prepare('SELECT *,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM `product` WHERE price-(price*discount/100) BETWEEN ? AND ? LIMIT ?,?');
        $sql->bind_param('iiii', $price_start, $price_end, $start, $perpage);
        return parent::select($sql);
    }
    // get all price list
    public function getAllpiceList()
    {
        $sql = parent::$connection->prepare('SELECT * FROM price_list');
        return parent::select($sql);
    }
    // count price
    public function totalproductbyprice($start, $end)
    {
        $sql = parent::$connection->prepare('SELECT count(*) AS count,(SELECT COUNT(*) FROM rating WHERE rating.product_like=product.id)AS heart FROM `product` WHERE `price`BETWEEN ? AND ?');
        $sql->bind_param('ii', $start, $end);
        return parent::select($sql)[0]['count'];
    }
    // pay ment
    public function payment($id, $name, $phone, $address, $product, $quality, $total)
    {
        $sql = parent::$connection->prepare("INSERT INTO `order_list`(`id_customer`, `custommer_name`, `custommer_phone`, `custommer_address`, `product`,`quality_prd`, `totalprice`) VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("issssss", $id, $name, $phone, $address, $product, $quality, $total);
        return $sql->execute();
    }
    // 
    public function getImgProductByArr($arrID)
    {
        $question = str_repeat('?,', count($arrID) - 1);
        $question .= "?";
        $i = str_repeat('i', count($arrID));
        $sql = parent::$connection->prepare("SELECT * FROM product WHERE id IN ($question) ORDER BY FIELD(id,$question)");
        $sql->bind_param($i . $i, ...$arrID, ...$arrID);
        return parent::select($sql);
    }
    // add product
    public function addProduct($name, $price, $status, $accessory, $insurance, $image, $type, $thefirm, $discount)
    {
        $sql = parent::$connection->prepare("INSERT INTO `product`(`name`, `price`, `status`, `accessory`, `insurance`, `image`, `type`, `thefirm`,`discount`) VALUES (?,?,?,?,?,?,?,?,?)");
        $sql->bind_param('sissssiii', $name, $price, $status, $accessory, $insurance, $image, $type, $thefirm, $discount);
        return $sql->execute();
    }
    // Xóa Sản Phẩm
    public function delProduct($id)
    {
        $sql = parent::$connection->prepare("DELETE FROM `product` WHERE `id`=?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    // Sửa Sản Phẩm
    public function updateProduct($name, $price, $status, $accessory, $insurance, $image, $type, $thefirm, $discount, $id)
    {
        $sql = parent::$connection->prepare("UPDATE `product` SET `name`=?,`price`=?,`status`=?,`accessory`=?,`insurance`=?,`image`=?,`type`=?,`thefirm`=? ,`discount`=? WHERE `id`=?");
        $sql->bind_param('sissssiiii', $name, $price, $status, $accessory, $insurance, $image, $type, $thefirm, $discount, $id);
        return $sql->execute();
    }
    // order history
    public function historyOrder($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `order_list` WHERE `id_customer`=?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
}
?>