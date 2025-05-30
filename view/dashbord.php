<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="d-flex min-vh-100">
    <!-- Sidebar -->
    <aside class="bg-dark text-white p-3" style="width: 220px;">
      <h2 class="mb-4">Easion</h2>
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link text-white active" href="#"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i class="bi bi-bar-chart me-2"></i>Charts</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i class="bi bi-box me-2"></i>Components</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i class="bi bi-layout-text-window-reverse me-2"></i>Layouts</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i class="bi bi-info-circle me-2"></i>About</a></li>
      </ul>
    </aside>

    <!-- Main -->
    <main class="flex-grow-1 p-4">
      <!-- Header -->
      <header class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm mb-4">
        <div class="d-flex align-items-center">
          <input class="form-control me-2" type="search" placeholder="Search...">
          <button class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
        </div>
        <div class="d-flex gap-3">
          <button class="btn btn-outline-secondary"><i class="bi bi-bell"></i></button>
          <button class="btn btn-outline-secondary"><i class="bi bi-gear"></i></button>
          <button class="btn btn-outline-secondary"><i class="bi bi-person-circle"></i></button>
        </div>
      </header>

      <!-- Stat Cards -->
      <div class="row g-4 mb-4">
        <div class="col-md-4">
          <div class="p-3 bg-primary text-white rounded shadow-sm">
            <h5>Sign Ups</h5>
            <h2>114</h2>
            <p>+25% from last month</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-success text-white rounded shadow-sm">
            <h5>Revenue</h5>
            <h2>$25,541</h2>
            <p>+17.5% from last month</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-danger text-white rounded shadow-sm">
            <h5>Open Tickets</h5>
            <h2>5</h2>
            <p>Support issues</p>
          </div>
        </div>
      </div>


      <!-- Recent Users Table -->
      <div class="mt-4 bg-white p-3 rounded shadow-sm">
        <h5><i class="bi bi-people-fill me-2"></i>Recent Users</h5>
        <table class="table table-hover mt-3">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Joined</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Jane Doe</td>
              <td>jane@example.com</td>
              <td>2025-04-01</td>
              <td><span class="badge bg-success">Active</span></td>
            </tr>
            <tr>
              <td>John Smith</td>
              <td>john@example.com</td>
              <td>2025-04-10</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
            </tr>
            <tr>
              <td>Emily Johnson</td>
              <td>emily@example.com</td>
              <td>2025-04-18</td>
              <td><span class="badge bg-secondary">Inactive</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Footer -->
      <footer class="mt-5 text-center text-muted small">
        &copy; 2025 Easion Dashboard. All rights reserved.
      </footer>
    </main>
  </div>
</body>


</html>

