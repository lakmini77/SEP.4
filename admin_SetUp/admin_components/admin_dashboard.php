<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #1e3c72, #2a5298); /* blue gradient */
      color: white;
    }

    .header {
      height: 60px;
      background: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      padding: 0 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .top-menu {
      height: 40px;
      background: rgba(255, 255, 255, 0.05);
      display: flex;
      align-items: center;
      padding: 0 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .container {
      display: flex;
      height: calc(100% - 100px);
    }

    .side-menu {
      width: 220px;
      background: rgba(255, 255, 255, 0.08);
      padding: 20px;
      border-right: 1px solid rgba(255, 255, 255, 0.1);
    }

    .side-menu a {
      display: block;
      color: white;
      text-decoration: none;
      margin: 10px 0;
      padding: 8px 12px;
      border-radius: 8px;
      transition: background 0.3s ease;
    }

    .side-menu a:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .main-content {
      flex: 1;
      padding: 30px;
      background: rgba(255, 255, 255, 0.05);
    }

    h1 {
      margin-top: 0;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Admin Header</h2>
  </div>

  <div class="top-menu">
    <span>Top Menu - Notifications | Profile | Settings</span>
  </div>

  <div class="container">
    <div class="side-menu">
      <a href="#">Dashboard</a>
      <a href="#">Users</a>
      <a href="#">Reports</a>
      <a href="#">Settings</a>
    </div>
    <div class="main-content">
      <h1>Welcome to the Admin Panel</h1>
      <p>This is your dashboard. You can place your main content here.</p>
    </div>
  </div>
</body>
</html>
