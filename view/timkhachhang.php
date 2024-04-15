<head>
    <style>
        .guest {
            width: 900px;
            position: relative;
            left: 290px;
            top: 40px;
            margin-bottom: 20px;
            /* Thêm margin dưới để tạo khoảng cách với button Thoát */
        }

        .guest h2 {
            margin-bottom: 10px;
            /* Khoảng cách dưới cho tiêu đề */
        }

        .guest form {
            margin-bottom: 10px;
            /* Khoảng cách dưới cho form */

        }

        .guest label {
            display: block;
            margin-bottom: 5px;
            /* Khoảng cách dưới cho nhãn */
        }

        .guest input[type="text"] {
            width: 50%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .guest input[type="submit"] {
            width: 50%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .guest input[type="submit"]:hover {
            background-color: #161515;
            /* Màu nền khi di chuột vào */
        }

        .btn {
            border: 1px solid #333;
            border-radius: 5px;
            width: 120px;
            height: 30px;
            cursor: pointer;
        }

        /* Phần table */
        table {
            width: 70%;
            border-collapse: collapse;
            margin-bottom: 20px;
            /* Khoảng cách dưới cho bảng */
            position: relative;
            top: 50px;
            left: 290px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f2f2f2;
            /* Màu nền cho tiêu đề cột */
            text-align: left;
        }

        #submit_button {
            width: 150px;
            height: 30px;
            cursor: pointer;
            background-color: #333;
            color: #fff;
            font-weight: bold;
            position: relative;
            top: -120px;
            left: 0px;
            border-radius: 5px;
        }

        .invoice {
            position: relative;
            left: 0px;
            width: 100%;
        }
    </style>
</head>
<div class="guest">
    <h2>Tìm kiếm khách hàng</h2>
    <form action="" method="post">
        <label for="makh">Mã khách hàng:</label>
        <input type="text" id="makh" name="makh" placeholder="Nhập mã khách hàng...">
        <input type="submit" name="searchCustomer" value="Tìm kiếm">
    </form>
</div>

<?php
if (isset($search_KH)) {
    if ($search_KH && !empty($search_KH)) {
        echo ' <table>
                <tr>
                    <th>Tên KH</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>CMND</th>
                    <th>Xem điện kế</th>
                </tr>';
        foreach ($search_KH['khachhang'] as $rows) {
            echo "<tr>
                    <td>" . $rows['tenkh'] . "</td>
                    <td>" . $rows['diachi'] . "</td>
                    <td>" . $rows['dt'] . "</td>
                    <td>" . $rows['cccd'] . "</td>
                    <td><button id='button_" . $rows['makh'] . "'  class='btn' onclick=\"showDienKe(" . $rows['makh'] . ")\">Xem</button></td>
                    </tr>";
            echo "<tr id='dienke_row_" . $rows['makh'] . "' style='display: none;'>
                    <td colspan='6'>
                        <div id='dienke_container_" . $rows['makh'] . "'>";
            if (isset($rows['dienke'])) {
                echo "<h2>Thông tin điện kế Mã khách hàng: " . $rows['makh'] . "</h2>
                    <form id='hoadon' method='post' action='../controller/tiendien.php?act=tinhdien' onsubmit='return kiemTraChon()'> 
                        <table id='dienke_table_" . $rows['makh'] . "' class='invoice'>
                            <tr>
                                <th>Mã ĐK</th>
                                <th>Mã KH</th>
                                <th>Ngày sản xuất</th>
                                <th>Ngày lắp</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Chọn để lập hóa đơn</th>
                            </tr>";
                foreach ($rows['dienke'] as $dienke) {
                    echo "<tr>
                        <td>" . $dienke['madk'] . "</td>
                        <td>" . $dienke['makh'] . "</td>
                        <td>" . $dienke['ngaysx'] . "</td>
                        <td>" . $dienke['ngaylap'] . "</td>
                        <td>" . $dienke['mota'] . "</td>";
                    if ($dienke['trangthai'] == 1) {
                        $status_dk = "Còn sử dụng";
                        echo "<td>" . $status_dk . "</td>
                            <td><input type='radio' name='selected_id' value='" . $dienke['madk'] . "'/></td>";
                    } else {
                        $status_dk = "Đã ngừng sử dụng";
                        echo "<td>" . $status_dk . "</td>
                            <td>Không thể lập hóa đơn cho điện kế này</td>";
                    }
                    echo "
                        </tr>
                        ";
                }
                echo "</table>
                        <input type='submit' name='submit_button' id='submit_button' value='Lập hóa đơn'>
                        </form>";
            }
            echo "</div>
                </td>
                </tr>";
        }
        echo '</table>';
    } else {
        echo 'Không tìm thấy khách hàng ' . $makh . ' có mã trong CSDL';
    }

}
?>
<button><a href="../controller/tiendien.php?act=quanly">Thoát</a></button>

<script src="../assets/js/DienKeKhachHang.js"></script>