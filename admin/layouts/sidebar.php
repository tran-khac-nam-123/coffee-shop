<?php

?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link" href="index.php?action=dashboard&query=thongke">
      <i class="bi bi-grid"></i>
      <span>Thống kê</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo" href="#">
        <i class="bi bi-people"></i><span>Người sử dụng</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="index.php?action=quanlynguoidung&query=danhsach" class="">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
      <li>
        <a href="index.php?action=quanlynguoidung&query=them" class="">
          <i class="bi bi-circle"></i><span>Thêm mới</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Đơn đặt hàng</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="index.php?action=quanlydondathang&query=danhsach" class="">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="index.php?action=quanlysanpham&query=danhsach" class="">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
      <li>
        <a href="index.php?action=quanlysanpham&query=them" class="">
          <i class="bi bi-circle"></i><span>Thêm mới</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <li class="nav-item">
    <a class="nav-link" data-bs-target="#contacts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-chat-dots"></i><span>Phản hồi</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="contacts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="index.php?action=quanlyphanhoi&query=danhsach" class="">
          <i class="bi bi-circle"></i><span>Danh sách</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/cafena/index.php">
      <i class="bi bi-card-list"></i>
      <span>Cafena</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/cafena/index.php?quanly=gioithieu">
      <i class="bi bi-exclamation-circle"></i>
      <span>Giới thiệu</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/cafena/index.php?quanly=contact">
      <i class="bi bi-envelope"></i>
      <span>Liên hệ</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/cafena/index.php?quanly=thongtin">
      <i class="bi bi-person"></i>
      <span>Thông tin cá nhân</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/cafena/admin/layouts/login.php">
      <i class="bi bi-box-arrow-right"></i>
      <span>Đăng xuất</span>
    </a>
  </li>

</ul>

</aside><!-- End Sidebar-->