<?php
include($_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php');
include($_SERVER['DOCUMENT_ROOT'] . "/admin/inc/navbar.php");
include($_SERVER['DOCUMENT_ROOT'] . "/database/connect.php");

$query = "SELECT * FROM Brands";

$Brands = mysqli_query($conn, $query);

$total = mysqli_num_rows($Brands);

$limit = 5;

$page = ceil($total / $limit);

$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);

$start = ($cr_page - 1) * $limit;

$query2 = "SELECT * FROM Brands where Status = 1 LIMIT $start,$limit";

$Brands = mysqli_query($conn, $query2);

?>
<div class="layout-page">
  <!-- Navbar -->

  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <!-- Search -->
     
      <!-- /Search -->

      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-3">
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="../assets/img/avatars/111.png" alt class="w-px-40 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/111.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block"><?php echo session::get('Username') ?></span>
                    <small class="text-muted">Quản trị viên</small>
                  </div>
                </div>
              </a>
            </li>
            
            
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="?action=logout">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Đăng xuất</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Thương hiệu bánh</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên thương hiệu</th>
                <th>Hình ảnh</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              foreach ($Brands as $key => $value) : ?>
                <tr>
                  <td><?php echo $key + 1 ?></td>
                  <td><?php echo $value['BrandName'] ?></td>
                  <td>
                    <img src="..//uploads//<?php echo $value['Image'] ?>" alt="" width="100">
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary">
                      <a style="color: white" ; href="brand_update.php?id=<?php echo $value['BrandId'] ?>">Sửa</a>
                    </button>
                    <button type="button" class="btn btn-danger">
                      <a style="color: white" ; href="brand_delete.php?id=<?php echo $value['BrandId'] ?>" onclick="return confirm('Bạn có chắc chắn xóa ?')">Xóa</a>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="mt-4">
        <button type="button" class="btn btn-success">
          <a style="color: white" ; href="brand_add.php">Thêm Mới</a>
        </button>
      </div>
      <?php if($page > 1) {?>
      <hr>
      <nav aria-label="Page navigation">       
        <ul class="pagination">
          <?php 
            if($cr_page - 1 > 0) {
          ?> 
          <li class="page-item first">
            <a class="page-link" href="brand_list.php?page=1"><i class="tf-icon bx bx-chevrons-left"></i></a>
          </li>
          <li class="page-item prev">
            <a class="page-link" href="brand_list.php?page=<?php echo $cr_page - 1 ?>"><i class="tf-icon bx bx-chevron-left"></i></a>
          </li>
          <?php 
            } 
          ?>
          <?php for($i=1; $i <= $page ; $i++) {?> 
          <li class="page-item  <?php echo (($cr_page == $i)? 'active' : '') ?>">
            <a class="page-link" href="brand_list.php?page=<?php echo $i ?>"><?php echo $i ?></a>
          </li>
          <?php 
            } 
          ?>
          </li>
          <?php 
            if($cr_page + 1 <= $page) {
          ?> 
          <li class="page-item next">
            <a class="page-link" href="brand_list.php?page=<?php echo $cr_page + 1 ?>"><i class="tf-icon bx bx-chevron-right"></i></a>
          </li>
          <li class="page-item last">
            <a class="page-link" href="brand_list.php?page=<?php echo $page ?>"><i class="tf-icon bx bx-chevrons-right"></i></a>
          </li>
          <?php
            }
          ?>
        </ul>
      </nav>
      <?php
      } 
      ?>
    </div>
  </div>
  <?php
  include($_SERVER["DOCUMENT_ROOT"] . '/admin/inc/footer.php');
  ?>