<?php
    include_once "../model/config.php"; 
    include_once "../model/DienKeKhachHang.php"; 
    include_once "../model/GiaDien.php"; 
    include_once "../model/HoaDon.php"; 
    include_once "../model/CTHoaDon.php"; 
    include_once "../model/BangGiaBacDien.php"; 

    if (isset($_GET['act'])) {  
        switch ($_GET['act']) {
            //VIEW QUẢN LÝ ĐIỆN
            case 'quanlydien': 
                $data=showData();
                include "../view/quanlydien.php";
                ?>
                <script>
                        function showDienKe(makh) {
                        var dienke_row = document.getElementById('dienke_row_' + makh);
                        var button = document.getElementById('button_' + makh); 
                        if (dienke_row.style.display === 'none') {
                            dienke_row.style.display = 'table-row';
                            button.innerHTML = 'Đóng';
                        } else {
                            dienke_row.style.display = 'none';
                            button.innerHTML = 'Xem';
                        }
                    }
                    window.onload = function() {
                        var radios = document.getElementsByName('selected_id');
                        for (var i = 0; i < radios.length; i++) {
                            radios[i].addEventListener('click', function() {
                                var madk = this.parentNode.parentNode.cells[0].innerText;
                                localStorage.setItem('selected_id_madk', madk);
                                });
                            }
                    };
                    function kiemTraChon() {
                        var radios = document.getElementsByName('selected_id');
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i].checked) {
                                return true; 
                                lapHoaDon();
                            }
                        }
                        alert('Vui lòng chọn một điện kế để lập hóa đơn.');
                        return false; 
                    }
                    function lapHoaDon() {
                        var selectedMadk = localStorage.getItem('selected_id_madk');
                        var xhr = new XMLHttpRequest();
                        var form = document.getElementById('hoadon'); // Lấy thẻ form
                        var url = form.getAttribute('action'); // Lấy URL từ action của form
                        xhr.open('POST', url, true); // Sử dụng URL từ action của form
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                console.log(xhr.responseText);
                            }
                        };
                        var data = JSON.stringify({
                            selected_madk: selectedMadk
                        });
                        xhr.send(data);
                    }

                </script>
                <?php
                break;
            //TÍNH TIỀN ĐIỆN    
            case 'tinhdien':
                $result1 = showGiaHienHanh();

                if(isset($_POST['selected_id'])){
                $a= $_POST['selected_id'];
                if(isset($a)){
                $show_csc_and_datehd = show_Data_HD_ID($_POST['selected_id']);
                if($show_csc_and_datehd){
                    foreach($show_csc_and_datehd as $showgt){
                        $csc_show = $showgt['chisocuoi'];
                        $ngaylaphd_show = $showgt['ngaylaphd']; 
                    }         
                } else {
                    $csc='';
                    $ngaylaphd= '';
                    }
                }
            }
            if(isset($_GET['mahd'])){
                $hoadon_add = $_GET['mahd'];
                $show_hd_add = show_HD_BY_ID($hoadon_add);
            }
            
                include "../view/nhapchiso.php";
                ?>
                <script>
                    function tinhTongKW() {
                        var tusokw = parseFloat(document.getElementById("tusokw").value);
                        var densokw = parseFloat(document.getElementById("densokw").value);
                        var ketqua = densokw - tusokw;
                        document.getElementById("kq").value = ketqua;
                
                };   
                </script>
                <?php
                if (isset($_POST['submit'])) {
                    $ketqua = $_POST['kq'];
                    $cst = $_POST['tusokw'];
                    $css = $_POST['densokw'];
                    if(isset($_POST['tungay'])){
                        $tungay = $_POST['tungay'];
                    }else{
                        $tungay = '';
                    }
                    if(isset($_POST['denngay'])){
                        $denngay = $_POST['denngay'];
                    }else{
                        $denngay='';
                    }
                    if($ketqua >0){
                        $star_tinh = tinhTienDien1($ketqua);
                        if ($star_tinh) {
                            //foreach ($star_tinh as $row) {
                                // $tien_tra = $row['dongia'] * $ketqua;
                                // $show_tien_phai_tra = number_format($tien_tra, 3, '.', '.'); 
                                // $dongia_show=$row['dongia'];    
                            //}
                            $tong_tien = 0;
                            echo '<table border="2">';
                            echo '<tr><th>Tên Bậc</th><th>Từ số KW</th><th>Đến số KW</th><th>Đơn giá</th><th>Sản lượng(KWh)</th><th>Thành tiền</th></tr>';
                            foreach ($star_tinh as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['tenbac'] . '</td>';
                                echo '<td>' . $row['tusokw'] . '</td>';
                                echo '<td>' . $row['densokw'] . '</td>';
                                echo '<td>' . $row['dongia'] . '</td>';
                                if($ketqua < $row['densokw']){
                                    if($row['tusokw'] != 0){
                                        $thanhtienshow = ($ketqua - $row['tusokw'] + 1);
                                    echo '<td>' . ($ketqua - $row['tusokw'] + 1) . '</td>';
                                    }else{
                                        $thanhtienshow = ($ketqua - $row['tusokw']);
                                        echo '<td>' . ($ketqua - $row['tusokw']) . '</td>';
                                    }
                                }else{
                                    if($row['tusokw'] != 0){
                                        $thanhtienshow = ($row['densokw'] - $row['tusokw'] + 1);
                                    echo '<td>' . ($row['densokw'] - $row['tusokw'] + 1) . '</td>';
                                    }else{
                                        $thanhtienshow = ($row['densokw'] - $row['tusokw']);
                                        echo '<td>' . ($row['densokw'] - $row['tusokw']) . '</td>';
                                    }
                                }
                                $tien_tra = $row['dongia'] * $thanhtienshow;
                                $show_tien_phai_tra = number_format($tien_tra, 3, '.', '.'); 
                                echo '<td>' . $show_tien_phai_tra . '</td>';    
                                echo '</tr>';
                                $tong_tien += $tien_tra; // Tính tổng tiền
                                $show_tongtien = number_format($tong_tien, 3, '.', '.');
                            }
                            echo '<tr><td colspan="4"></td><td>Tổng tiền:</td><td>' . number_format($tong_tien, 3, '.', '.') . '</td></tr>';
                            echo '</table>';                           
                            // echo 'Tính tiền điện sẽ là: '.$dongia_show. ' x ' .$ketqua. ' ta được tiền phải đóng: '.  $show_tien_phai_tra . ' VNĐ';
                            echo '<script>
                            document.getElementById("tusokw").value = "' . $_POST['tusokw'] . '";
                            document.getElementById("densokw").value = "' . $_POST['densokw'] . '";
                            document.getElementById("kq").value = "' . $_POST['kq'] . '";
                            document.getElementById("tongtien").value = "' . $show_tongtien . '";
                            document.getElementById("tungay").value = "' . $tungay . '";
                            document.getElementById("denngay").value = "' . $denngay . '";
                
                            document.getElementById("secondForm").submit();
                        </script>';
                        } else {
                            echo "Không tìm thấy thông tin về giá điện cho số KW là $ketqua";
                        }
                    }else {
                        echo '<script>alert("Nhập lại đi, không hợp lệ số KW đã dùng[ Điện năng tiêu thụ không thể nhỏ hơn hoặc bằng 0]");</script>';
                    }
                    echo '<script>
                    document.getElementById("tusokw").value = "' . $_POST['tusokw'] . '";
                    document.getElementById("densokw").value = "' . $_POST['densokw'] . '";
                    document.getElementById("kq").value = "' . $_POST['kq'] . '";
                    document.getElementById("secondForm").submit();
                    </script>';
                }
                if(isset($_POST['addhd'])){
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    $cst = $_POST['tusokw'];
                    $css = $_POST['densokw'];
                    $mahd = $_POST['mahd'];
                    $dntt = $_POST['kq'];
                    $ky = "1";
                    $tungay=$_POST['tungay'];
                    $dengay=$_POST['denngay'];

                    $ngaylaphd=date('Y-m-d H:i:s');
                    $madk =$_POST['selected_madk'];
                    $tinhtrang="0";
                    $ketqua = $_POST['kq'];
                    $tongtien = $_POST['tongtien'];
                    $dongia = $_POST['dongia'];
                
                    themhd($mahd, $ky, $tungay, $dengay, $cst, $css, $tongtien, $ngaylaphd, $tinhtrang);
                
                    themcthd( $mahd,$madk , $dntt, $dongia);
                
                    foreach ($_POST['mabac'] as $mabac) {
                        thembanggiabac($mabac, $mahd);
                    }

                    echo "<script>window.location.href = '../controller/tiendien.php?act=tinhdien&mahd=".$mahd."';</script>";

                }
                
               
                break; 
            case 'in':
                include "../view/indoadon.php";
                break;
            default:
            include "../view/quanly.php";
            break;
        }
    } else { 
        include "../view/quanly.php";
    }
?>