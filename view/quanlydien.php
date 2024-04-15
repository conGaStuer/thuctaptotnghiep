<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <link rel="stylesheet" href="../css/quanlydien.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="sidebar">
        <img src="../assets/user.jpg" alt="" width="100px">
        <a href="#">Quản lý khách hàng</a>

    </div>
    <div class="content">
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
            foreach ($data['khachhang'] as $khachhang) {
                echo "<tr>
                <td>" . $khachhang['makh'] . "</td>
                <td>" . $khachhang['tenkh'] . "</td>
                <td>" . $khachhang['diachi'] . "</td>
                <td>" . $khachhang['dt'] . "</td>
                <td>" . $khachhang['cccd'] . "</td>
                <td><button id='button_" . $khachhang['makh'] . "' onclick=\"showDienKe(" . $khachhang['makh'] . ")\">Xem</button></td>
                </tr>";
                echo "<tr id='dienke_row_" . $khachhang['makh'] . "' style='display: none;'>
                <td colspan='6'>
                    <div id='dienke_container_" . $khachhang['makh'] . "'>";
                if (isset($khachhang['dienke'])) {
                    echo "<h2>Thông tin điện kế Mã khách hàng: " . $khachhang['makh'] . "</h2>
                <form id='hoadon' method='post' action='../controller/tiendien.php?act=tinhdien' onsubmit='return kiemTraChon()'> 
                    <table id='dienke_table_" . $khachhang['makh'] . "'>
                        <tr>
                            <th>Mã ĐK</th>
                            <th>Mã KH</th>
                            <th>Ngày sản xuất</th>
                            <th>Ngày lắp</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Chọn để lập hóa đơn</th>
                        </tr>";
                    foreach ($khachhang['dienke'] as $dienke) {
                        echo "<tr>
                    <td>" . $dienke['madk'] . "</td>
                    <td>" . $dienke['makh'] . "</td>
                    <td>" . $dienke['ngaysx'] . "</td>
                    <td>" . $dienke['ngaylap'] . "</td>
                    <td>" . $dienke['mota'] . "</td>
                    <td>" . $dienke['trangthai'] . "</td>
                    <td><input type='radio' name='selected_id' value='" . $dienke['madk'] . "'/>
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
    </div>
</body>

</html>