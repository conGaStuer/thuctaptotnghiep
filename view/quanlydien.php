<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    
    th {
        background-color: #f2f2f2;
    }
</style>

<h2>Thông tin khách hàng</h2>
<table>
    <tr>
        <th>Mã KH</th>
        <th>Tên KH</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>CMND</th>
        <th>Xem điện kế</th>
    </tr>
    <?php
    foreach($data['khachhang'] as $khachhang) {
        echo "<tr>
                <td>".$khachhang['makh']."</td>
                <td>".$khachhang['tenkh']."</td>
                <td>".$khachhang['diachi']."</td>
                <td>".$khachhang['dt']."</td>
                <td>".$khachhang['cmnd']."</td>
                <td><button id='button_".$khachhang['makh']."' onclick=\"showDienKe(".$khachhang['makh'].")\">Xem</button></td>
                </tr>";
        echo "<tr id='dienke_row_".$khachhang['makh']."' style='display: none;'>
                <td colspan='6'>
                    <div id='dienke_container_".$khachhang['makh']."'>";
        if(isset($khachhang['dienke'])) {
            echo "<h2>Thông tin điện kế Mã khách hàng: ".$khachhang['makh']."</h2>
                <form id='hoadon' method='post' action='../controller/tiendien.php?act=tinhdien' onsubmit='return kiemTraChon()'> 
                    <table id='dienke_table_".$khachhang['makh']."'>
                        <tr>
                            <th>Mã ĐK</th>
                            <th>Mã KH</th>
                            <th>Ngày sản xuất</th>
                            <th>Ngày lắp</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Chọn để lập hóa đơn</th>
                        </tr>";
            foreach($khachhang['dienke'] as $dienke) {
                echo "<tr>
                    <td>".$dienke['madk']."</td>
                    <td>".$dienke['makh']."</td>
                    <td>".$dienke['ngaysx']."</td>
                    <td>".$dienke['ngaylap']."</td>
                    <td>".$dienke['mota']."</td>
                    <td>".$dienke['trangthai']."</td>
                    <td><input type='radio' name='selected_id' value='".$dienke['madk']."'/>
                    </td> 
                    </tr>";
                }
            echo "</table>
                    <input type='submit' name='submit_button' id='submit_button' value='Lập hóa đơn'>
                    </form>";
                }
        echo "</div>
            </td>
            </tr>";
    }
    ?>
    </table>
