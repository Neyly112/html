<div>
    <?php
    include "./model/pdo.php";
    include "./view/header.php";
    ?>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<div>
    <?php

    $maLoai = 11;
    if (isset($_GET['act'])) {
        $act = $_GET['act'];

        switch ($act) {
            case 'qlsp':
                if (isset($_POST['ok'])) {
                    $tenSP = $_POST['tenSP'];
                    $giaBan = $_POST['giaBan'];
                    $image = $_FILES['image']['name'];
                    $path = "./view/Uploads/";
                    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                    $filename = time() . "." . $image_ext;
                    $target_file = $path . $filename;
                    $moTa = $_POST['mota'];
                    $sql = "INSERT INTO `sanpham`(`MaLoai`, `TenSanPham`, `HinhAnh`, `MoTa`, `GiaBan`) VALUES ('$maLoai','$tenSP', '$filename', '$moTa','$giaBan')";
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    pdo_executer($sql);
                    echo '<script language="javascript">';
                    echo 'alert("Thêm thành công")';
                    echo '</script>';
                }
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);

                include "./view/CapNhatSanPham/CapNhatSP.php";
                break;
            case 'xoaSp':
                if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                    $sql2 = "DELETE FROM `sanpham` WHERE MaSanPham=" . $_GET['MaSanPham'];
                    pdo_executer($sql2);
                    
                }
                // echo("<meta http-equiv='refresh' content='1'>");
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);
                include "./view/CapNhatSanPham/DanhSachSp.php";
                break;
            case 'dssp':
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);
                include './view/CapNhatSanPham/DanhSachSp.php';
                break;
            case 'suaSp':
                if (isset($_GET['MaSanPham']) && ($_GET['MaSanPham'] > 0)) {
                    $sql = "SELECT * FROM `sanpham` WHERE MaSanPham=" . $_GET['MaSanPham'];
                    $dm = pdo_query_one($sql); //chỉ lấy 1 truy vấn
                }
                include "./view/CapNhatSanPham/SuaSp.php";
                break;
            case 'capnhatSP':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $TenSP = $_POST['ten'];
                    $giaBan = $_POST['gia'];
                    $MaSanPham = $_POST['MaSanPham'];
                    $MaLoai = $_POST['MaLoai'];
                    $image = $_FILES['image1']['name'];
                    $path = "./view/Uploads/";
                    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                    $filename = time() . "." . $image_ext;
                    $target_file = $path . $filename;
                    move_uploaded_file($_FILES['image1']['tmp_name'], $target_file);
                    $sql = "UPDATE `sanpham` SET `MaLoai`='$MaLoai', `TenSanPham`='" . $TenSP . "',`HinhAnh`='" . $filename . "',`MoTa`='ao',`GiaBan`='" . $giaBan . "' WHERE MaSanPham=" . $MaSanPham;
                    pdo_executer($sql);
                    $thongbao = "Cập Nhật Thành Công";
                }
                $sql1 = "SELECT * FROM `sanpham`";
                $list = pdo_query($sql1);
                include "./view/CapNhatSanPham/DanhSachSp.php";
                break;
            case 'dm':
                if (isset($_POST['ok'])) {
                    $tenLoai = $_POST['tenLoai'];
                    $sql = "INSERT INTO `loai`(`TenLoai`) VALUES ('$tenLoai')";
                    pdo_executer($sql);
                    $thongbao = "Thêm Thành Công";
                }
                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);
                include "./view/LoaiSanPham/ThemLoaiSP.php";
                break;
            case 'xoaLoai':

                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);


                if (isset($_GET['MaLoai']) && ($_GET['MaLoai'] > 0)) {
                    $sql2 = "DELETE FROM `loai` WHERE MaLoai=" . $_GET['MaLoai'];
                    pdo_executer($sql2);
                }


                $list = pdo_query($sql1);
                include "./view/LoaiSanPham/ThemLoaiSP.php";
                break;
            case 'suaLoai':
                if (isset($_GET['MaLoai']) && ($_GET['MaLoai'] > 0)) {
                    $sql = "SELECT * FROM `loai` WHERE MaLoai=" . $_GET['MaLoai'];
                    $dm = pdo_query_one($sql); //chỉ lấy 1 truy vấn
                }
                include "./view/LoaiSanPham/SuaLoaiSP.php";
                break;
            case 'capnhatLoaiSP':
                if (isset($_POST['capnhatLoai']) && ($_POST['capnhatLoai'])) {
                    $TenLoai = $_POST['tenloai'];
                    $MaLoai = $_POST['MaLoai'];
                    $sql = "UPDATE `loai` SET `TenLoai`='" . $TenLoai . "' WHERE MaLoai=" . $MaLoai;
                    pdo_executer($sql);
                    $thongbao = "Cập Nhật Thành Công";
                }
                $sql1 = "SELECT * FROM `loai`";
                $list = pdo_query($sql1);
                include "./view/LoaiSanPham/ThemLoaiSP.php";
                break;
                case 'gtyt':
                    include_once(__DIR__ . './dbconnect.php');
                    $MaSanPham = isset($_GET['MaSanPham']) ? $_GET['MaSanPham'] : null;
                    if ($MaSanPham !== null) {
                        $sql = "DELETE FROM `sanphamgiohang` WHERE MaSanPham=$MaSanPham;";
                        $result = mysqli_query($conn, $sql);
                    }
                    include"./crud/crud_giohang/index.php";
                    mysqli_close($conn);
                    break;
                    case 'tc':
                        include "./view/TrangChu/TrangChu.php";
                        break;
                    
                case 'gttt':
                    include"./view/ThongTin/ThongTin.php";
                    break;
    
                case 'addcart':
                        if (isset($_GET['MaSanPham'])) {
                            $MaSanPham = $_GET['MaSanPham'];
                            $sql = "INSERT INTO sanphamgiohang (MaSanPham) VALUES ('$MaSanPham')";
                            pdo_executer($sql);
                            $thongbao = "Thêm Thành Công";
                        }
                        include "./view/TrangChu/TrangChu.php";
                        break;
                case 'buy':
                    include "./view/DatHang/Dathang.php";
                    break;
                case 'buycart':
                    include"./view/DatHang/Dathang_to_cart.php";
                    break;
        }
    } else {
        include "./view/TrangChu/TrangChu.php";
    }


    ?>

</div>

<?php
include "./view/Footer.php";
?>