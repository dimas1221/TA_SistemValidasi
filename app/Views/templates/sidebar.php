<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">UTY</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">UTY</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Pages</li>

            <li><a class="nav-link" href="/user"><i class="bi bi-speedometer2 text-primary"></i> <span>Dashboard</span></a></li>
            <?php if (in_groups('user')) : ?>
                <li><a class="nav-link" href="/validasi/pengajuan_ta"><i class="bi bi-file-arrow-up-fill text-primary"></i> <span>Pengajuan TA</span></a></li>
            <?php endif; ?>
            <?php if (in_groups('admin')) : ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"></i><i class="bi bi-pencil-square text-primary"></i><span>Validation</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/validasi/pdftext">KHS PDF</a></li>
                        <li><a class="nav-link" href="/validasi/gambartext">KHS Image</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (in_groups('admin')) : ?>
                <li><a class="nav-link" href="/validasi"><i class="bi bi-people text-primary"></i> <span>Hasil Validasi</span></a></li>
            <?php endif; ?>
            <li><a class="nav-link" href="<?= base_url('logout'); ?>"><i class="bi bi-arrow-left-square-fill text-danger"></i> <span>Logout</span></a></li>
        </ul>
    </aside>
</div>