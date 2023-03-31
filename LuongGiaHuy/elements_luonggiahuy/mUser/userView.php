<div>Quản lý người dùng</div>
<hr/> 
<div>Người dùng mới</div>
<div>
    <form name="newuser" id="formreg" method="post" action="./elements_luonggiahuy/mUser/userAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten"/></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" checked="true"/>
                    Nữ<input type="radio" name="gioitinh" value="0"/>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh"/></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi"/></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="text" name="dienthoai"/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                <td><input type="reset" id="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div> 
<!--    hiện thi dữ liệu-->
<hr/>
<?php
    require './elements_luonggiahuy/mod/userCls.php';
?>
<div class="title_user">Danh sách người dùng</div>
<div class="content_user">
    <?php
        $obj_User = new user();
        $list_User = $obj_User->UserGetAll();
        $I = count($list_User);
    ?>
    <p>Trong bảng có <b><?php echo $I; ?></b></p>
    <?php
        if($I>0){
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Ngày đăng ký</th>
                <th>Hoạt động</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($list_User as $v){
            ?>
            <tr>
                <td><?php echo $v->iduser; ?></td>
                <td><?php echo $v->username; ?></td>
                <td><?php echo $v->password; ?></td>
                <td><?php echo $v->hoten; ?></td>
                <td align="center">
                    <?php
                        if($v->gioitinh==0){
                            ?>
                        <img class="iconimg" src="./img_luonggiahuy/girl.png">
                            <?php
                        }else{
                            ?>
                            <img class="iconimg" src="./img_luonggiahuy/boy.png">
                            <?php
                        }
                    ?>
                </td>
                <td><?php echo $v->ngaysinh; ?></td>
                <td><?php echo $v->diachi; ?></td>
                <td><?php echo $v->dienthoai; ?></td>
                <td><?php echo $v->ngaydangky; ?></td>
                <td align="center">
                    <?php
                        if($v->ability==0){
                            ?>
                    <a href="./elements_luonggiahuy/mUser/userAct.php?reqact=setlock&iduser=<?php echo $v->iduser; ?>&ability=<?php echo $v->ability; ?>">
                        <img class="iconimg" src="./img_luonggiahuy/lock.png">
                    </a>
                            <?php
                        }else{
                            ?>
                    <a href="./elements_luonggiahuy/mUser/userAct.php?reqact=setlock&iduser=<?php echo $v->iduser; ?>&ability=<?php echo $v->ability; ?>">
                            <img class="iconimg" src="./img_luonggiahuy/unlock.png">
                    </a>
                            <?php
                        }
                    ?>
                </td>
                <td><a href="./elements_luonggiahuy/mUser/userAct.php?reqact=deleteuser&iduser= <?php echo $v->iduser; ?>">
                    <img class="iconimg" src="./img_luonggiahuy/idelete.png">
                </a>
               <!-- <a href="./elements_luonggiahuy/mUser/userAct.php?reqact=updateuser&iduser= <?php echo $v->iduser; ?>">
                    <img class="iconimg" src="./img_luonggiahuy/update.png">
                </a> -->
        <temps class="btnupdate" value="<?php echo $v->iduser; ?>">
            <img class="iconimg" src="./img_luonggiahuy/update.png">
        </temps>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    }
    ?>
</div>