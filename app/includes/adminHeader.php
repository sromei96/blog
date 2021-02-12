<header>
  <div class="logo" href="<?php echo BASE_URL . '/index.php'; ?>">
    <h1 class="logo-text"><span>A News</span> Site</h1>
  </div>
  <i class="fa fa-bars menu-toggle"></i>
  <ul class="nav">
    <?php if (isset($_SESSION['id'])): ?>
      <li>
        <a href="#">
          <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
          <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a>
        <ul>
          <?php if (($_SESSION['admin'])): ?>
            <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'; ?>">Dashboard</a></li>
          <?php endif; ?>
          <ul>
          <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">Logout</a></li>
          </ul>
        </ul>
      </li>
    <?php else: ?>
    <?php endif; ?>


  </ul>
</header>
