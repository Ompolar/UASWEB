<nav class="navbar navbar-expand-lg navbar-light bg-light"
style="background-image:url('../gbr/gamingroom2b.jpg');
    background-position: center;
    background-size: cover;">
    <div class="container">
        <a class="navbar-brand" href="adminpage.php" style="color: white;">
            <img src="../gbr/boeee.png" height="80px" width="80px">
                dodolanku
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <p class="me-2" style="font-family: Hind; color:white; width:120px;
                text-shadow: 2px 2px rgba(0, 0, 0, 0.349); text-transform:uppercase;">
                <?php echo $_SESSION['a_global']->admin_nama?></p>
                <a class="nav-item btn btn-secondary" href="logout.php" style="width: 120px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1h-1z"/>
                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                    </svg>
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>