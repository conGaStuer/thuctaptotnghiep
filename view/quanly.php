<?php 
    if(isset($_SESSION['id_nv'])){
?>
<h2><b>MÀN HÌNH QUẢN LÝ </b></h2>
<button><a href="../controller/tiendien.php?act=quanlydien">Quản lý điện</a></button>


<button><a href="../controller/tiendien.php?act=logout">Đăng xuất</a></button>


<?php }else{
    header('location: ../controller/tiendien.php?act=login');
} ?>