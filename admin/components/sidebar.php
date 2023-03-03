<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            
                                                       
                            <a class="nav-link" href="../index.php" title="homepage" target="_blank">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <img width="160px" src="<?= settings()['homepage'] ?>assets/images/logo.png" alt="site link">
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">All</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Add</a>
                                </nav>
                            </div>
                           
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="<?= settings()['adminpage'] ?>admin-users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="<?= settings()['adminpage'] ?>admin-events.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Events
                            </a>
                            <a class="nav-link" href="<?= settings()['adminpage'] ?>admin-carousel.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Carousel
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>