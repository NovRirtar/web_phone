<?php

class UserModel extends Model
{
    // 
    public function check($username, $password)
    {
        $sql = parent::$connection->prepare("SELECT * FROM user WHERE username= ? AND passwords= ?");
        $sql->bind_param('ss', $username, $password);
        return count(parent::select($sql)) == 0;
    }
    // Đăng Ký
    public function Register($username, $password)
    {
        $sql = parent::$connection->prepare('INSERT INTO user(`username`, `passwords`) VALUES (?,?)');
        $sql->bind_param('ss', $username, $password);
        return $sql->execute();
    }
    // Đăng Nhập
    public function Login($username, $password)
    {
        $pass = md5($password);
        $sql = parent::$connection->prepare('SELECT * FROM user WHERE username= ? AND passwords= ?');
        $sql->bind_param('ss', $username, $pass);
        return count(parent::select($sql)) > 0;
    }
    // Lấy Thông Tin User
    public function getInforByUser($id)
    {
        $sql = parent::$connection->prepare('SELECT * FROM `infor_user` WHERE info_id =?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    // Thêm Thông Tin User
    public function addInforByUser($name, $birdthday, $phone, $email, $address, $img)
    {
        $sql = parent::$connection->prepare('INSERT INTO `infor_user`( `info_name`, `info_birthday`, `info_phone`, `info_email`, `info_address`, `info_image`) VALUES (?,?,?,?,?,?)');
        $sql->bind_param('ssssss', $name, $birdthday, $phone, $email, $address, $img);
        return $sql->execute();
    }
    // Cập Nhật Thông Tin User
    public function updateInforByUser($name, $birdthday, $phone, $email, $address, $img, $id)
    {
        $sql = parent::$connection->prepare("UPDATE `infor_user` SET `info_name`=?,`info_birthday`=?,`info_phone`=?,`info_email`=?,`info_address`=?,`info_image`=? WHERE info_id=?");
        $sql->bind_param('ssssssi', $name, $birdthday, $phone, $email, $address, $img, $id);
        return $sql->execute();
    }
    // Lấy Id Theo User
    public function getIdByUser($name)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `user` WHERE `username`=?");
        $sql->bind_param('s', $name);
        return parent::select($sql)[0]['id'];
    }
    public function checkadmin($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `user` WHERE id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    // get all account

    public function getallaccount()
    {
        $sql = parent::$connection->prepare("SELECT * FROM user ");
        return parent::select($sql);
    }
    // update account
    public function updateAccount($name, $pass, $type, $id)
    {
        $sql = parent::$connection->prepare("UPDATE `user` SET username=?,passwords=?,type_account=? WHERE id=?");
        $sql->bind_param('ssii', $name, $pass, $type, $id);
        return $sql->execute();
    }
    // delete account
    public function deleteAccount($id)
    {
        $sql = parent::$connection->prepare("DELETE FROM `user` WHERE `id`=?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    // delete info account
    public function deleteInfor($id)
    {
        $sql = parent::$connection->prepare("DELETE FROM `infor_user` WHERE `info_id`=?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    // get all order_list
    public function getAllOrder()
    {
        $sql = parent::$connection->prepare("SELECT * FROM order_list ORDER BY `id_bill` ASC");
        return parent::select($sql);
    }
    // đổi mật khẩu
    public function changePass($pass, $id)
    {
        $sql = parent::$connection->prepare("UPDATE `user` SET passwords=? WHERE id=?");
        $sql->bind_param('si', $pass, $id);
        return $sql->execute();
    }
}