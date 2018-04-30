<?php
  include 'xmlLoader.php';
  session_start();
 ?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a href="index.html"><img class="logo"  src="https://i.pinimg.com/originals/4c/b0/d6/4cb0d6c95b0102b83cb9f4d5d847424e.png" width="30px"></a>
    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/sport-games-1/512/royal-king-queen-luxury-crown-512.png">
    <link rel="stylesheet" type="text/css" href="css/SearchBar.css">
    <a class="navbar-brand" href="index.html">Royal Sports</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li style="padding-right: 11em;padding-top: 0.3em;">
          <div id="searchbarcss">
            <form action="listing.php" method="get">
              <input size="30" type="text" name="search" placeholder="Search Website..."/><button type="submit" value="Submit" style="background-color: #343a40;border-color: #7f8f9852;">🔍</button>
            </form>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
          <?php foreach ($xml->category as $value){ ?>
            <a class="dropdown-item" href="categoryPage.php?categoryId=<?php echo $value->id; ?>"><?php echo $value->name; ?></a>
          <?php } ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a href="shoppingcart.php"
            class="Library" id="Library" >
          </a>
          <a style="font-size: 1em;color: gray;position: relative;bottom: 12px;">(<span id="items-cart">0</span>)</a>
        </li>

      </ul>
    </div>
  </div>

</nav>

<style>
.searchbarcss{
  float: left;
}
</style>

    <script src="cart.js"></script>
    <script>
      cart = <?php echo json_encode($_SESSION["cart"]); ?>;
      $("#items-cart").html(totalQuantityCart());
    </script>
