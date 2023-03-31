<?php
    if(isset($_GET['req'])){
        $request = $_GET['req'];
        switch ($request){
            case 'exjs01':
                require './pageJS/exjs01.php';
                break;
            case 'exjs02':
                require './pageJS/exjs02.php';
                break;
            case 'exjs03':
                require './pageJS/exjs03.php';
                break;
            case 'userView':
                require './elements_luonggiahuy/mUser/userView.php';
                break;
            case 'updateuser':
                require './elements_luonggiahuy/mUser/userUpdate.php';
                break;
        }
    }else{
        require './elements_luonggiahuy/mUser/default.php';
    }
?>