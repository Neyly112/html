<?php
// include('../../dbconnect.php');
include('./dbconnect.php');
$selectedProducts = [];

if(isset($_GET['selectedProductIds'])) {
    $selectedProductIds = explode(',', $_GET['selectedProductIds']);

    $sql = "SELECT SP.TenSanPham, SP.MaSanPham, SP.HinhAnh, SP.GiaBan, SP.MoTa FROM SanPham SP WHERE SP.MaSanPham IN ('" . implode("','", $selectedProductIds) . "')";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $selectedProducts[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<style>
    
    @media (min-width: 1025px) {
        .h-custom {
        height: 100 !important;
        }
        }
        
        .number-input input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
        }
        
        .number-input input[type=number]::-webkit-inner-spin-button,
        .number-input input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        }
        
        .number-input button {
        background-color: transparent;
        border: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin: 0;
        position: relative;
        }
        
        .number-input button:before,
        .number-input button:after {
        display: inline-block;
        position: absolute;
        content: '';
        height: 2px;
        transform: translate(-50%, -50%);
        }
        
        .number-input button.plus:after {
        transform: translate(-50%, -50%) rotate(90deg);
        }
        
        .number-input input[type=number] {
        text-align: center;
        }
        
        .number-input.number-input {
        border: 1px solid #ced4da;
        width: 10rem;
        border-radius: .25rem;
        }
        
        .number-input.number-input button {
        width: 2.6rem;
        height: .7rem;
        }
        
        .number-input.number-input button.minus {
        padding-left: 10px;
        }
        
        .number-input.number-input button:before,
        .number-input.number-input button:after {
        width: .7rem;
        background-color: #495057;
        }
        
        .number-input.number-input input[type=number] {
        max-width: 4rem;
        padding: .5rem;
        border: 1px solid #ced4da;
        border-width: 0 1px;
        font-size: 1rem;
        height: 2rem;
        color: #495057;
        }
        
        @media not all and (min-resolution:.001dpcm) {
        @supports (-webkit-appearance: none) and (stroke-color:transparent) {
        
        .number-input.def-number-input.safari_only button:before,
        .number-input.def-number-input.safari_only button:after {
        margin-top: -.3rem;
        }
        }
        }
        
        .shopping-cart .def-number-input.number-input {
        border: none;
        }
        
        .shopping-cart .def-number-input.number-input input[type=number] {
        max-width: 2rem;
        border: none;
        }
        
        .shopping-cart .def-number-input.number-input input[type=number].black-text,
        .shopping-cart .def-number-input.number-input input.btn.btn-link[type=number],
        .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:hover,
        .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:focus {
        color: #212529 !important;
        }
        
        .shopping-cart .def-number-input.number-input button {
        width: 1rem;
        }
        
        .shopping-cart .def-number-input.number-input button:before,
        .shopping-cart .def-number-input.number-input button:after {
        width: .5rem;
        }
        
        .shopping-cart .def-number-input.number-input button.minus:before,
        .shopping-cart .def-number-input.number-input button.minus:after {
        background-color: #9e9e9e;
        }
        
        .shopping-cart .def-number-input.number-input button.plus:before,
        .shopping-cart .def-number-input.number-input button.plus:after {
        background-color: #4285f4;
        }
        .py-3 {
            position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #f8f9fa; /* Customize the background color */
                padding: 20px; /* Add padding for spacing */
        }

.py-3 {
    position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa; /* Customize the background color */
        padding: 20px; /* Add padding for spacing */
}
#dathang{
    margin-top: 20px;
    margin-left: 40px;

}
</style>
<body>
<?php
// Khởi tạo biến tổng
$total = 0;
?>
    <!-- Phần hiển thị danh sách sản phẩm đã chọn -->
    <div class="container">
    <h1 style="text-align: center;">ĐẶT HÀNG<i class="fas fa-shopping-cart"></i></h1>
    <div class="row justify-content-center">
    <div class="col-lg-6">
    <?php foreach ($selectedProducts as $row) : ?>
        <?php $total += $row['GiaBan'];?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center mb-5">
                    <?php $imageDirectory = "./products/"; ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo $imageDirectory . $row['HinhAnh']; ?>" class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                        <h5 class="text-primary"><?php echo $row['TenSanPham']; ?></h5>
                        <div class="d-flex align-items-center">
                            <p class="fw-bold mb-0 me-5 pe-3">Mã<?php echo $row['MaSanPham']; ?></p>
                            <p class="fw-bold mb-0 me-5 pe-3" style="color: green;"><?php echo $row['GiaBan']; ?>đ</p>
                            <div class="def-number-input number-input safari_only">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                <input class="quantity fw-bold text-black" min="0" name="quantity" value="1" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Hiển thị tổng giá bán -->
    <div  class="d-flex justify-content-between p-2 mb-2"style="background-color: #e1f5fe;">
    <h5 class="fw-bold mb-0">Tổng:</h5>
        <h5  class="fw-bold mb-0"> <?php echo number_format($total); ?>đ</h5>
    </div>
</div>


        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">THÔNG TIN NGƯỜI NHẬN</h3>
                    <form class="mb-5">
                        <div class="form-outline mb-3">
                            <label class="form-label fw-bold" for="typeText">Họ Tên</label>
                            <input type="text" id="typeText" class="form-control form-control-lg" siez="17" value minlength="19" maxlength="19" name="name" />
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label fw-bold" for="typeName">Số điện thoại</label>
                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value name="phone" />
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label fw-bold" for="typeName">Email</label>
                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value name="email" />
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label fw-bold" for="typeName">Địa Chỉ</label>
                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value name="address" />
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label fw-bold" for="typeName">Phương Thức Thanh Toán</label>
                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value="Thanh Toán Khi Nhận Hàng" name="payment" disabled />
                        </div>
                        <button type="button" class="btn btn-primary btn-block btn-lg" id=dathang>Đặt hàng</button>
                        <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                           
                        </h5>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
