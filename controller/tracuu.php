<?php
include_once "../model/config.php";
include_once "../model/KhachHang.php";
include_once "../model/Dienke.php";
include_once "../model/HoaDon.php";
include_once "../model/CTHoaDon.php";
include_once "../model/TinhTien.php";

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case "tracuu":
            include "../view/tracuu.php";
            break;
        case "tracuukhachhang":
            include "../view/tracuu.php";
            if (isset($_POST['searchCustomer'])) {
                $makh = $_POST['makh'];
                if($makh != ''){
                $search_KH = searchIDKH($makh);
                }else{
                    echo '<script>alert("Vui lòng nhập mã khách hàng cần tìm");</script>';
                }
            }
            include "../view/timkhachhang.php";
            break;
        case "tracuudienke":
            include "../view/tracuu.php";
            if(isset($_POST['SearchDK'])){
                $madk = $_POST['madk'];
                if($madk != ''){
                $search_DK = searchIDDK($madk);
                }else{
                    echo '<script>alert("Vui lòng nhập mã điện kế cần tìm");</script>';
                }
            }
            include "../view/timdienke.php";
            break;
        case "tracuuhoadon":
            include "../view/tracuu.php";
            if(isset($_POST['SearchDH'])){
                $mahd = $_POST['mahd'];
                if($mahd != ''){
                $search_DH = show_HD_BY_ID($mahd);
                }else{
                    echo '<script>alert("Vui lòng nhập mã hóa đơn cần tìm");</script>';
                }
            }
            include "../view/timhoadon.php";
            break;
        case "cthd":
            if(isset($_GET['mahd'])){
                $mahd=$_GET['mahd'];
                $CTHD_search = show_CTHD_Full($mahd);
                $CTHD_search_TT = show_Data_TT_By_ID($mahd);
            }
            include "../view/CTHD.php";
            
            break;
        case 'quanly':
            session_start();

            include "../view/quanly.php";
            break;
        default:
            include "../view/login.php";
            break;
    }
} else {
    include "../view/login.php";
}
?>