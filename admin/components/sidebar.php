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
                <a class="nav-link" href="<?= settings()['adminpage'] ?>admin-users.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Users
                </a>
                <a class="nav-link" href="<?= settings()['adminpage'] ?>admin-message.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Message <span id="msgCount" style="width: 20px; height: 20px;" class="d-flex align-items-center justify-content-center ms-3 bg-danger text-white p-2 rounded-circle">0</span>
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

<script>
    $(document).ready(function(){
        $.ajax({
            url:'admin-ajax.php',
            method: "get",
            data: {
                unseen_msg: "all"
            },
            complete: function(d){
                $("#msgCount").html(d.responseText);
                if(d.responseText == '0'){
                    $("#msgCount").remove();
                }
            }
        })
    })
</script>