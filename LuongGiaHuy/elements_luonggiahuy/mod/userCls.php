<?php
    $s = "../../elements_luonggiahuy/mod/database.php";
    if(file_exists($s)){
        $f = $s;
    }
    else{
        $f = './elements_luonggiahuy/mod/database.php';
    }
    require_once $f;
    
    class user extends Database{
        //Thực hiện kiểm tra đăng nhập
        public function UserCheckLogin($username, $password) {
            $select = $this->connect->prepare("select * from user "
                . "where username = ? and password = ? and ability = 1");
            $select->setFetchMode(PDO::FETCH_OBJ);
            $select->execute(array($username, $password));
            
            if(count($select->fetchAll()) == 1){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        //kiểm tra tồn tại Username
        public function UserCheckUsername($username) {
            $select = $this->connect->prepare("select * from user where username = ?");
            $select->setFetchMode(PDO::FETCH_OBJ);
            $select->execute(array($username));
            
            if(count($select->fetchAll())==1){
                return TRUE;
            }else{
                return FALSE;
            }
            
        }
        //lấy tất cả mẫu tin bản user trả về mảng dữ liệu
        public function UserGetAll() {
            $getAll = $this->connect->prepare("select * from user");
            $getAll->setFetchMode(PDO::FETCH_OBJ);
            $getAll->execute();
            
            return $getAll->fetchAll();
        }
        //Thêm người dùng
        public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai) {
            $add = $this->connect->prepare("INSERT INTO user(username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai) VALUES (?,?,?,?,?,?,?)");
            
            $add->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai));
            
            return $add->rowCount();
        }
        //Xoá người dùng
        public function UserDelete($iduser) {
            $del = $this->connect->prepare("delete from user where iduser=?");
            
            $del->execute(array($iduser));
            
            return $del->rowCount();
        }
        //Cập nhật dữ liệu ngươiuf dùng
        public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser) {
            $update = $this->connect->prepare("UPDATE user SET "
                    . "username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, dienthoai = ? "
                    . "WHERE iduser = ?");
            
            $update->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser));
            
            return $update->rowCount();

        }
        //Chọn thông tin user bằng id
        public function UserGetbyId($iduser) {
            $getTk = $this->connect->prepare("select * from user where iduser=?");
            $getTk->setFetchMode(PDO::FETCH_OBJ);
            $getTk->execute(array($iduser));
            
            return $getTk->fetch();
        }
        //Set password người dùng
        public function UserSetPassword($iduser, $password) {
            $update = $this->connect->prepare("update user set password=? where iduser=?");
            
            $update->execute(array($password, $iduser));
            
            return $update->rowCount();
        }
        //Khoá tài khoản người dùng
        public function UserSetActive($iduser, $ability) {
            $update = $this->connect->prepare("update user set ability=? where iduser =?");
            
            $update->execute(array($ability, $iduser));
            
            return $update->rowCount();
        }
        //Đổi password người dùng
        public function UserChangePassword($username, $passwordold, $passwordnew) {
            $selectMK = $this->connect->prepare("select password from user where username = ?");
            $selectMK->setFetchMode(PDO::FETCH_OBJ);
            $selectMK->execute(array($username));
            
            if(count($selectMK->fetch()) == 1){
                $temp = $selectMK->fetch();
                if($passwordold == $temp->password){
                    $update = $this->connect->prepare("update user set password=? where username =?");
                    
                    $update->execute(array($passwordnew, $username));
                    
                    return $update->rowCount();
                }else{
                    return FALSE;
                }
            }else{
                return FALSE;
            }
        }
    }
?>