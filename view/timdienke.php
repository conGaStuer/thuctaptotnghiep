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
            color: white;
            padding: 10px;
            background-color: #333;
        }
    </style>
</head>
<div class="guest">
    <h2>Tìm kiếm điện kế</h2>
    <form action="" method="post">
        <label for="madk">Mã điện kế:</label>
        <input type="text" id="madk" name="madk" placeholder="Nhập mã điện kế...">
        <input type="submit" name="SearchDK" value="Tìm kiếm">
    </form>
</div>

<?php
if (isset($search_DK)) {
    if ($search_DK && !empty($search_DK)) {
        echo '<table border="1">
            <tr>
                <th>Mã điện kế</th>
                <th>Mã khách hàng</th>
                <th>Ngày sản xuất</th>
                <th>Ngày lắp</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>';
        echo '<tr>';
        echo '<td>' . $search_DK['madk'] . '</td>';
        echo '<td>' . $search_DK['makh'] . '</td>';
        echo '<td>' . $search_DK['ngaysx'] . '</td>';
        echo '<td>' . $search_DK['ngaylap'] . '</td>';
        echo '<td>' . $search_DK['mota'] . '</td>';
        if ($search_DK['trangthai'] == 0) {
            echo '<td>Không còn sử dụng</td>';
        } else {
            echo '<td>Còn sử dụng</td>';
        }
        echo '<td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>';
        echo '</tr>';
        echo '</table>';
    } else {
        echo "Không tìm thấy điện kế trong CSDL.";
    }
}
?>
<button><a href="../controller/tiendien.php?act=quanly">Thoát</a></button>