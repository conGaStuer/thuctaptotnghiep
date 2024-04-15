<?php
function searchIDKH($makh)
{
    $data = array();
    $sql_khachhang = "SELECT * FROM khachhang WHERE makh = ?";
    $khachhang = pdo_query($sql_khachhang, $makh);

    foreach ($khachhang as $kh) {
        $idkh = $kh['makh'];
        if ($idkh !== null) {
            $sql_dienke = "SELECT * FROM dienke WHERE makh = ?";
            $dienke = pdo_query($sql_dienke, $idkh);
            $kh['dienke'] = $dienke;
            $data['khachhang'][] = $kh;
        }
    }
    return $data;
}

function check_KH($makh)
{

}
function searchNameKH($tenkh)
{
    $data = array();
    $sql_khachhang = "SELECT * FROM khachhang WHERE tenkh LIKE ?";
    $khachhang = pdo_query($sql_khachhang, "%$tenkh%");

    foreach ($khachhang as $kh) {
        $idkh = $kh['makh'];
        if ($idkh !== null) {
            $sql_dienke = "SELECT * FROM dienke WHERE makh = ?";
            $dienke = pdo_query($sql_dienke, $idkh);
            $kh['dienke'] = $dienke;
            $data['khachhang'][] = $kh;
        }
    }
    return $data;
}