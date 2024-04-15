<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;

        }



        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }

        .table th,
        .table td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #333;
            font-weight: bold;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .highlight {
            color: red;
            font-size: 25px;
            font-weight: bold;
        }

        p {
            font-size: 30px;
            margin-bottom: 40px;
            font-weight: bold;
        }

        .info {
            width: 60%;
            position: relative;
            left: -210px;
        }
    </style>
</head>

<p> Thông tin chi tiết </p>
<?php if ($CTHD_search) {
    ?>
    <?php foreach ($CTHD_search as $showct) { ?>
        <table class="info">
            <tr>
                <td style="width: 115px;           font-weight: bold; "> Mã hóa đơn: </td>
                <td style="width: 150px;"><?php echo $showct['mahd'] ?></td>
                <td style="width: 130px;            font-weight: bold;"> Mã khách hàng: </td>
                <td><?php echo $showct['makh'] ?></td>
            </tr>
            <tr>
                <td style="width: 115px;            font-weight: bold;"> Mã điện kế: </td>
                <td style="width: 150px;"><?php echo $showct['madk'] ?></td>
            </tr>
            <tr>
                <td style="width: 115px;            font-weight: bold;"> Tên khách hàng: </td>
                <td style="width: 150px;"><?php echo $showct['tenkh'] ?></td>
                <td style="width: 130px;            font-weight: bold;"> Địa chỉ: </td>
                <td><?php echo $showct['diachi'] ?></td>
            </tr>
            <tr>
                <td style="width: 130px;            font-weight: bold;"> Điện thoại: </td>
                <td style="width: 150px;"><?php echo $showct['dt'] ?></td>
                <td style="width: 130px;            font-weight: bold;"> Căn cước công dân: </td>
                <td><?php echo $showct['cccd'] ?></td>
            </tr>
            <tr>
                <td style="width: 130px;            font-weight: bold;">Điện năng tiêu thụ:</td>
                <td><?php echo $showct['dntt'] ?> Kwh</td>
            </tr>
        </table>
        <?php
    }
}
?>
<?php if ($CTHD_search_TT) {
    $tongtienthanhtoan = 0;
    ?>
    <table border='1' class="table">
        <tr>
            <th>ID</th>
            <th>Mã hóa đơn</th>
            <th>Tên bậc</th>
            <th>Số Kwh</th>
            <th>Đơn giá</th>
            <th>Sản lượng Kwh</th>
            <th>Thành tiền</th>
        </tr>
        <?php
        foreach ($CTHD_search_TT as $row) {
            if ($row['sanluongKwh'] > 0 && $row['thanhtien'] > 0) {
                if ($row['densokw'] > 999999998) {
                    $row['densokw'] = "trở lên";
                }
                ?>

                <tr>
                    <td><?php echo $row['id_tinhdien']; ?></td>
                    <td><?php echo $row['mahd']; ?></td>
                    <td><?php echo $row['tenbac']; ?></td>
                    <td><?php echo $row['tusokw'] . '-' . $row['densokw']; ?></td>
                    <td><?php echo $row['dongia']; ?></td>
                    <td><?php echo $row['sanluongKwh']; ?></td>
                    <td><?php echo $row['thanhtien']; ?></td>
                </tr>
                <?php
                $thanhtien_float = floatval(str_replace('.', '', $row['thanhtien']));
                $tongtienthanhtoan += $thanhtien_float;
            }
        }
        ?>
        <tr>
            <td colspan="6" style="text-align:center; color:red; font-size:25px; font-weight:bold;">Tổng tiền</td>
            <td style="text-align:center; color:red; font-size:25px; font-weight:bold;">
                <?php echo number_format($tongtienthanhtoan, 0, '.', '.'); ?>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:center; color:red; font-size:25px; font-weight:bold;">Thuế(VAT) +10%</td>
            <td style="text-align:center; color:red; font-size:25px; font-weight:bold;">
                <?php echo $showct['tienthue'] ?>
            </td>
        </tr>
    </table>
    <?php
} else {
    echo "Không có dữ liệu phù hợp.";
} ?>

<br>
<b>Bảng giá điện áp dụng cho hóa đơn</b>
<?php if ($CTHD_search_TT) { ?>
    <table border='1' class="table">
        <tr>
            <th>Tên Bậc</th>
            <th>Từ số KW</th>
            <th>Đến số KW</th>
            <th>Đơn giá</th>
            <th>Ngày bắt đầu áp dụng</th>
        </tr>
        <?php
        foreach ($CTHD_search_TT as $showbg) {
            if ($showbg['densokw'] > 999999) {
                $showbg['densokw'] = "trở lên";
            }
            ?>

            <tr>
                <td><?php echo $showbg['tenbac']; ?></td>
                <td><?php echo $showbg['tusokw']; ?></td>
                <td><?php echo $showbg['densokw']; ?></td>
                <td><?php echo $showbg['dongia'] ?></td>
                <td><?php echo $showbg['ngayapdung']; ?></td>

            </tr>

            <?php
        }
        echo '</table> ';
}
?>