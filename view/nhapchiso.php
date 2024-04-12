<head>
    <style>
        .btn-submit {
            background-color: #4CAF50; /* Màu nền */
            color: white; /* Màu chữ */
            padding: 10px 20px; /* Độ dày và chiều rộng của nút */
            border: none; /* Không có viền */
            border-radius: 5px; /* Bo tròn góc */
            cursor: pointer; /* Con trỏ khi di chuột vào */
            margin-right: 10px; /* Khoảng cách giữa các nút */
        }

        .btn-submit:hover {
            background-color: #45a049; /* Màu nền khi di chuột vào */
        }

        .btn-submit:disabled {
            background-color: #dddddd; /* Màu xám cho nút bị vô hiệu hóa */
            cursor: not-allowed; /* Con trỏ không cho nút bị vô hiệu hóa */
        }
    </style>
</head>
<?php 
    if(isset($_GET['mahd'])){
        echo 'Thêm hóa đơn thành công <br><br>';
        if(isset($_SESSION['success_messager'])){
            echo '<div style="color: red; font-weight: bold;">';
            echo $_SESSION['success_messager'] . '<br>';
            echo '</div>';
            // Xóa thông báo lỗi sau khi đã hiển thị
            unset($_SESSION['success_messager']);
        }
            if($show_hd_add){ ?>
                 <table border="1">
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
                      <th colspan=2>Công cụ</th>
                  </tr>
                  <tr>
                      <td><?php echo $show_hd_add['mahd'] ?></td>
                      <td><?php echo $show_hd_add['manv'] ?></td>
                      <td><?php echo $show_hd_add['ky'] ?></td>
                      <td><?php echo $show_hd_add['tungay'] ?></td>
                      <td><?php echo $show_hd_add['denngay'] ?></td>
                      <td><?php echo  $show_hd_add['chisodau'] ?></td>
                      <td><?php echo $show_hd_add['chisocuoi'] ?></td>
                      <td><?php echo $show_hd_add['tongthanhtien'] ?></td>
                      <td><?php echo $show_hd_add['ngaylaphd'] ?></td>
                      <?php
                      if($show_hd_add['tinhtrang'] == 0){ ?>
                        <td>Chưa thanh toán</td>
                        <td><?php echo '<a href="../controller/tiendien.php?act=in&mahd='.$show_hd_add['mahd'].'">In giấy báo điện</a>'; ?> </td>
                        <td><?php echo '<a name="hoanthanh"  href="../controller/tiendien.php?act=tinhdien&action=dathanhtoan&code=' . $show_hd_add['mahd'] . '">Đã thanh toán</a>'; ?></td>
                      <?php }else{ ?>
                        <td>Đã thanh toán</td>
                        <td><?php echo '<a href="../controller/tiendien.php?act=in&mahd='.$show_hd_add['mahd'].'">In hóa đơn</a>'; ?> </td>
                      <?php 
                        }
                      ?>
                      <!-- <td><?php if($show_hd_add['tinhtrang'] == 0){ echo 'Chưa thanh toán [Giấy báo điện]';}else{ echo 'Đã thanh toán [Hóa đơn]';} ?></td>
                      <td><?php if($show_hd_add['tinhtrang'] == 0){echo '<a href="../controller/tiendien.php?act=in&mahd='.$show_hd_add['mahd'].'">In giấy báo</a>';}else{echo '<a href="../controller/tiendien.php?act=in&mahd='.$show_hd_add['mahd'].'">In hóa đơn</a>';} ?> </td>
                      <td><?php if($show_hd_add['tinhtrang'] == 0){echo '<a name="hoanthanh"  href="../controller/tiendien.php?act=tinhdien&action=dathanhtoan&code=' . $show_hd_add['mahd'] . '">Đã thanh toán</a>';}else{echo 'Đã thanh toán !!!';} ?></td> -->
                      </tr>
              </table>

              <b> Thông tin chi tiết </b>
              <?php if($show_cthd_byhd){
                ?>
            <?php foreach($show_cthd_byhd as $showct){ ?>
                <table>
                    <tr>
                        <td style="width: 115px;"> Mã hóa đơn: </td>
                        <td style="width: 150px;"><?php echo $showct['mahd'] ?></td>
                        <td style="width: 130px;"> Mã khách hàng: </td>
                        <td><?php echo $showct['makh'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 115px;"> Mã điện kế: </td>
                        <td style="width: 150px;"><?php echo $showct['madk'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 115px;"> Tên khách hàng: </td>
                        <td style="width: 150px;"><?php echo $showct['tenkh'] ?></td>
                        <td style="width: 130px;"> Địa chỉ: </td>
                        <td><?php echo $showct['diachi'] ?></td>
                    </tr>
                    <tr>
                    <td > Điện thoại: </td>
                        <td style="width: 150px;"><?php echo $showct['dt'] ?></td>
                        <td> Căn cước công dân: </td>
                        <td><?php echo $showct['cccd'] ?></td>
                    </tr>
                    <tr>
                        <td>Điện năng tiêu thụ:</td>
                        <td><?php echo $showct['dntt'] ?> Kwh</td>
                    </tr>
                </table>
            <?php
                }
              }
            ?>

              <?php if($show_tt_byhd){ 
                $tongtienthanhtoan = 0;
                ?>
                
            <table border='1'>
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
                        foreach($show_tt_byhd as $row){
                ?>
                            <tr>
                                <td><?php echo $row['id_tinhdien']; ?></td>
                                <td><?php echo $row['mahd']; ?></td>
                                <td><?php echo $row['tenbac']; ?></td>
                                <td><?php echo $row['tusokw'] .'-'. $row['densokw']; ?></td>
                                <td><?php echo $row['dongia']; ?></td>
                                <td><?php echo $row['sanluongKwh']; ?></td>
                                <td><?php echo $row['thanhtien']; ?></td>
                            </tr>                          
                <?php
                            $thanhtien_float = floatval(str_replace('.', '', $row['thanhtien']));
                            $tongtienthanhtoan += $thanhtien_float; 
                                 
                        }
                ?>
                <tr>
                    <td colspan="6" style="text-align:center; color:red; font-size:25px; font-weight:bold;">Tổng tiền</td>
                    <td style="text-align:center; color:red; font-size:25px; font-weight:bold;"><?php echo  number_format($tongtienthanhtoan, 0, '.', '.'); ?></td>

                </tr>
                        </table>
                <?php
                    } else {
                        // Xử lý trường hợp không có dữ liệu phù hợp
                        echo "Không có dữ liệu phù hợp.";
                    } ?>

                <br>
                <b>Bảng giá điện áp dụng cho hóa đơn</b>
                <?php if($show_bgbd_byhd){ ?>
                    <table border='1'>
                        <tr>
                            <th>Tên Bậc</th>
                            <th>Từ số KW</th>
                            <th>Đến số KW</th>
                            <th>Đơn giá</th>
                            <th>Ngày bắt đầu áp dụng</th>
                        </tr>
                    <?php
                    foreach($show_bgbd_byhd as $showbg){
                        if($showbg['densokw'] > 999999){
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
              <button><a href="../controller/tiendien.php?act=quanlydien">Xong</a></button>
    <?php 
    }
              
    }else{ 
?>
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = time();
$mahd = date("ymdHis", $timestamp);
?>
<h2>Giá điện hiện hành[ĐANG ÁP DỤNG]</h2>
    <table>
        <tr>
        <th>Mã Bậc</th>
            <th>Tên Bậc</th>
            <th>Từ số KW</th>
            <th>Đến số KW</th>
            <th>Đơn giá</th>
            <th>Ngày áp dụng</th>
        </tr>
        <?php
        if ($result1) {
            foreach ($result1 as $row) {
                if($row['densokw'] > 9999999){
                    $row['densokw'] = "trở lên";
                }
                echo "<tr>";
                echo "<td>".$row['mabac']."</td>";

                echo "<td>".$row['tenbac']."</td>";
                echo "<td>".$row['tusokw']."</td>";
                echo "<td>".$row['densokw']."</td>";
                echo "<td>".$row['dongia']."</td>";
                echo "<td>".$row['ngayapdung']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
<h2>Form tính tiền điện</h2>
<?php
// Kiểm tra xem có thông báo lỗi nào được lưu trong session không
if(isset($_SESSION['error_messages']) && !empty($_SESSION['error_messages'])) {
    echo '<div style="color: red; font-weight: bold;">';
    foreach($_SESSION['error_messages'] as $error_message) {
        echo $error_message . '<br>';
    }
    echo '</div>';
    // Xóa thông báo lỗi sau khi đã hiển thị
    unset($_SESSION['error_messages']);

}
?>
<br>
<form id="secondForm" method="post" action="" >
<label for="mahd">Mã hóa đơn:</label>
<input type="text" id="mahd" name="mahd" value="<?php echo $mahd; ?>" readonly><br><br>
    <label for="madk">Mã điện kế:</label>
    <input type="text" name="selected_madk" id="selected_madk" readonly><br><br>

    <label for="madk">Kỳ:</label>
    <input type="text" name="ky" id="ky"><br><br>

    <label for="tusokw">Từ ngày</label>
    <input type="datetime-local" id="tungay" name="tungay" value="<?php if(isset($ngaylaphd_show)){ echo $ngaylaphd_show;}else{echo isset($_POST['tungay']) ? $_POST['tungay'] : '';} ?>"><br><br>

    <label for="tusokw">Đến ngày</label>
    <input type="datetime-local" id="denngay" name="denngay" value=" <?php echo isset($_POST['denngay']) ? $_POST['denngay'] : ''; ?>"><br><br>
    
    <label for="tusokw">Từ số KW:</label>
    <input type="text" id="tusokw" name="tusokw" value="<?php if(isset($csc_show)){ echo $csc_show;}else{echo isset($_POST['tusokwP']) ? $_POST['tusokwP'] : '';} ?>" required oninput="tinhTongKW()"><br><br>

    <label for="densokw">Đến số KW:</label>
    <input type="text" id="densokw" name="densokw" value="<?php echo isset($_POST['densokwP']) ? $_POST['densokwP'] : ''; ?>" required oninput="tinhTongKW()"><br><br>

    <label for="kq">Điện năng tiêu thụ (KW):</label>
    <input type="text" id="kq" name="kq" value="<?php echo isset($_POST['kq']) ? $_POST['kq'] : ''; ?>" readonly><br><br>

    <label for="tongtien">Thành tiền (VNĐ):</label>
    <input type="text" id="tongtien" name="tongtien" value="<?php echo isset($_POST['tongtien']) ? $_POST['tongtien'] : ''; ?>" readonly><br><br>
    
    <label for="tongtien">Thuế (VAT) - 10%:</label>
    <input type="text" id="thue" name="thue" value="<?php echo isset($_POST['thue']) ? $_POST['thue'] : ''; ?>" readonly><br><br>

    <label for="tongtienphaitt">Tổng tiền phải thanh toán (VNĐ):</label>
    <input type="text" id="tongtienphaitt" name="tongtienphaitt" value="<?php echo isset($_POST['tongtienphaitt']) ? $_POST['tongtienphaitt'] : ''; ?>" readonly><br><br>
    <?php
    // Lấy dữ liệu từ hàm showGiaHienHanh()
    $result1 = showGiaHienHanh();

    // Kiểm tra xem có dữ liệu không
    if ($result1) {
        foreach ($result1 as $row) {
            echo "<input type='hidden' name='mabac[]' value='".$row['mabac']."' readonly>";
        }
    } else {
        echo "<p>Không có dữ liệu về giá điện hiện hành.</p>";
    }
    ?>
    <input type="submit" name="submit" value="Tính tiền điện" class="btn-submit">
    <input type="submit" name="addhd" id="addhd_button" value="Thêm hóa đơn" class="btn-submit" disabled>
</form>

<?php
    }
?>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
     document.getElementById("autoSubmitButton").click();
     kiemTraTrangThaiButton();
    });
</script>
<script>
    window.onload = function() {
        var selectedMadk = localStorage.getItem('selected_id_madk');
        var selectedMadkInput = document.getElementById('selected_madk');
        selectedMadkInput.value = selectedMadk;
        kiemTraTrangThaiButton();

    };
</script>
    <script>
  function kiemTraTrangThaiButton() {
    // Lấy giá trị từ các trường input
    var ky = document.getElementById('ky').value;
    var tungay = document.getElementById('tungay').value;
    var denngay = document.getElementById('denngay').value;
    var tusokw = document.getElementById('tusokw').value;
    var densokw = document.getElementById('densokw').value;
    var kq = document.getElementById('kq').value;
    var tongtien = document.getElementById('tongtien').value;
    var thue = document.getElementById('thue').value;
    var tongtienphaitt = document.getElementById('tongtienphaitt').value;

    if (ky !== '' && tungay !== '' && denngay !== '' && tusokw !== '' && densokw !== '' && kq !== '' && tongtien !== '' && thue !== '' && tongtienphaitt !== '') {
        // ko rỗng thì gỡ bỏ thuộc tính dis đi
        document.getElementById('addhd_button').removeAttribute('disabled');
    } else {
        // thêm thuộc tính dis cho btn
        document.getElementById('addhd_button').setAttribute('disabled', 'disabled');
    }
}


    // gọi hàm ktra trạng thái btn khi có sự thay đổi giá trị btn
    document.getElementById('ky').addEventListener('input', kiemTraTrangThaiButton);
    document.getElementById('tungay').addEventListener('input', kiemTraTrangThaiButton);
    document.getElementById('denngay').addEventListener('input', kiemTraTrangThaiButton);
    document.getElementById('tusokw').addEventListener('input', kiemTraTrangThaiButton);
    document.getElementById('densokw').addEventListener('input', kiemTraTrangThaiButton);
    document.getElementById('kq').addEventListener('input', kiemTraTrangThaiButton);
    document.getElementById('tongtien').addEventListener('input', kiemTraTrangThaiButton);
    document.getElementById('thue').addEventListener('input', kiemTraTrangThaiButton);
    document.getElementById('tongtienphaitt').addEventListener('input', kiemTraTrangThaiButton);

    </script>