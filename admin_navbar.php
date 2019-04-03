

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="det.php"><?php echo $_SESSION['username']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><button type="button" class="btn btn-primary" name="button">Home</button></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="det.php"><button type="button" class="btn btn-success" name="button">Parking Lot</button></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="staff.php"><button type="button" class="btn btn-success" name="button">Staff</
      </li>
    </ul>
    <a class="nav-link" href="logout.php"><button type="button" class="btn btn-danger" name="button">Logout</button></a>
  </div>
</nav>