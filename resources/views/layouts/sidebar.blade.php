<!-- Sidebar -->
<nav class="text-white p-3" id="sidebar" style="width: 280px; height: 100vh; background-color: #24313d;"> <!-- Ubah background-color -->
    <!-- User Profile -->
    <div class="mb-4 text-center">
        <img src="https://via.placeholder.com/100" alt="User Profile" class="rounded-circle mb-2">
        <h5>Admin Name</h5>
        <p class="text-muted">admin@example.com</p>
    </div>

    <!-- Menu -->
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ url('dashboard') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ url('createqr') }}" class="nav-link text-white">
                <i class="fas fa-qrcode me-2"></i>Buat Kode QR
            </a>
        </li>
    </ul>
</nav>

<!-- Toggle Button for Sidebar on Mobile -->
<button class="btn btn-primary d-lg-none" id="sidebarToggleBtn" style="position: fixed; top: 10px; left: 10px; z-index: 1000;">
    <i class="fas fa-bars"></i>
</button>

<!-- Add this script at the bottom of your page -->
<script>
    // Toggle sidebar visibility on small screens
    document.getElementById('sidebarToggleBtn').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapse'); // Toggle the collapse class to show/hide sidebar
    });
</script>
