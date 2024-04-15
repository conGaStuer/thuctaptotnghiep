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

        td a {
            text-decoration: none;
            color: red;

        }
    </style>
</head>
<div class="guest">
    <h2>Tìm kiếm hóa đơn</h2>
    <form action="" method="post">
        <label for="mahd">Mã hóa đơn:</label>
        <input type="text" id="mahd" name="mahd" placeholder="Nhập mã hóa đơn...">
        <input type="submit" name="SearchDH" value="Tìm kiếm">
    </form>
</div>
<?php
if (isset($search_DH)) {
    if ($search_DH && !empty($search_DH)) {
        echo ' <table border="1">
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Mã nhân viên</th>
                        <th>Kỳ</th>
                        <th>Từ ngày</th>
                        <th>Đến ngày</th>
                        <th>Chỉ số đầu</th>
                        <th>Chỉ số cuối</th>
                        <th>Tổng thành tiền</th>
                        <th>Ngày lập hóa đơn</th>
                        <th>Tình trạng</th>
                        <th>Chi tiết</th>
                        <th colspan=2>Công cụ</th>
                    </tr>
                    <tr>
                        <td>' . $search_DH['mahd'] . '</td>
                        <td>' . $search_DH['manv'] . '</td>
                        <td>' . $search_DH['ky'] . '</td>
                        <td>' . $search_DH['tungay'] . '</td>
                        <td>' . $search_DH['denngay'] . '</td>
                        <td>' . $search_DH['chisodau'] . '</td>
                        <td>' . $search_DH['chisocuoi'] . '</td>
                        <td>' . $search_DH['tongthanhtien'] . '</td>
                        <td>' . $search_DH['ngaylaphd'] . '</td>';
        if ($search_DH['tinhtrang'] == 0) {
            echo '<td>Chưa thanh toán</td>';
            echo '<td><a href="../controller/tracuu.php?act=cthd&mahd=' . $search_DH['mahd'] . '">Xem chi tiết hóa đơn</a></td>';
            echo '<td><a href="../controller/tiendien.php?act=in&mahd=' . $search_DH['mahd'] . '">In giấy báo điện</a></td>';
            echo '<td><a name="hoanthanh"  href="../controller/tiendien.php?act=tinhdien&action=dathanhtoan&code=' . $search_DH['mahd'] . '">Đã thanh toán</a> </td>';
        } else {
            echo '<td>Đã thanh toán</td>';
            echo '<td><a href="../controller/tracuu.php?act=cthd&mahd=' . $search_DH['mahd'] . '">Xem chi tiết hóa đơn</a></td>';
            echo '<td><a href="../controller/tiendien.php?act=in&mahd=' . $search_DH['mahd'] . '">In hóa đơn</a> </td>';
        }

        echo '</tr> 
                </table';
    } else {
        echo "Không tìm thấy hóa đơn trong CSDL.";
    }
}
?>
<button><a href="../controller/tiendien.php?act=quanly">Thoát</a></button>