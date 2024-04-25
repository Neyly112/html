<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>CẬP NHẬT SẢN PHẨM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<style>
  .py-3 {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #f8f9fa;
    /* Customize the background color */
    padding: 20px;
    /* Add padding for spacing */
  }
</style>
<?php

?>

<body>
  
  <!--Page content-->
  <section class="p-3 p-md-4 p-xl-5">
    <div class="container ">
      <div class="card align-items-center shadow-sm">
        <div class="row g-0">

          <div class="card-body p-3 p-md-4 ">
            <div class="row">
              <div class="col-12">
                <div class="mb-5 fw-bold">
                  <h3>THÔNG TIN SẢN PHẨM</h3>
                </div>
              </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="row gy-1 gy-md-3 overflow-hidden">
                <div class="col-12">
                  <label for="email" class="form-label fw-bold">Tên sản phẩm
                    <span class="text-danger">*</span></label>
                  <input type="name" class="form-control" name="tenSP" id="name" placeholder="áo" required>
                </div>
                <div class="col-12">
                  <label for="email" class="form-label fw-bold">Giá bán
                    <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="giaBan" id="text" placeholder="500.000" required>
                </div>

                <div class="col-12">
                  <label for="password" class="form-label fw-bold">Mô tả
                    <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="mota" id="mota" placeholder="" required>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label fw-bold">File hình ảnh
                    <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" name="image" id="image" accept=".PNG, .GIF, .JPG" required>
                </div>

                <div class="col-12">
                  <div class="">
                    <div class="">
                      <a href="index.php?act=dssp ">
                        <input class="btn btn-primary mx-auto" type="button" value="Danh sách sản phẩm">
                      </a>
                      <input class="btn btn-primary mx-auto" type="submit" value="Thêm sản phẩm" name="ok" id="ok">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
    </div>
  </section>

  <!--end product-->

  <!--end Page content-->
  <!--footer-->

  <!--end footer-->