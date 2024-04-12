<?php
function showbanggiacapmahd($id){
    $sql = "SELECT * from banggiabacdien join giadien on banggiabacdien.mabac = giadien.mabac
    where banggiabacdien.mahd=?";
    return pdo_query($sql, $id);
}

?>