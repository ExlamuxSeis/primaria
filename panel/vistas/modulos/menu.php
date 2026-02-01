 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicio">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Panel de administrador</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="inicio">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Modulos
</div>

<!-- Nav Item - Charts -->

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="noticias">
        <i class="fas fa-fw fa-table"></i>
        <span>Noticias</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="carrusel">
        <i class="fas fa-fw fa-table"></i>
        <span>Carrusel</span></a>
</li>
    <?php
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] == 1) { ?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<li class="nav-item">
    <a class="nav-link" href="usuarios">
        <i class="fas fa-fw fa-table"></i>
        <span>Usuarios</span></a>
</li>
<?php } }?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->