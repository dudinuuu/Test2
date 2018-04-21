<?php
include 'xmlLoader.php';
  session_start();



  //$_SESSION["id2"] = $pdid;

  print_r($_SESSION["cartitems"]);

  // echo $_SESSION["id1"] . ".<br>";
  // echo "hello" . $_SESSION["id2"];

  // include 'xmlLoader.php';
  // if(isset($_GET["categoryId"])){
  //   $categoryId=$_GET["categoryId"];
  // }
  // if(isset($_GET["pathId"])){
  //   $pathId=$_GET["pathId"];
  // }
  //
  // $_SESSION["productname"] = $xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/product/name")[0];
  // $_SESSION["productprice"] = $xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/product/cost")[0];
  ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Royal Sport - Find what you need</title>
    <!-- favicon added to the tab-->
    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/sport-games-1/512/royal-king-queen-luxury-crown-512.png">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Our own css file -->
    <link href="css/MyCss.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- navigation bar loader -->
    <!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $(function(){
      $("#navigation").load("navbar.php");
    });
    </script> -->

  </head>

  <body>

    <!-- Navigation -->
    <div id="navigation"></div>


    <div id="w">
      <header id="title">
          <h1>  </h1>
      </header>
      <div id="page">
        <table id="cart">
          <thead>
            <tr>
              <th class="first">Photo</th>
              <th class="second">Qty</th>
              <th class="third">Product</th>
              <th class="fourth">Line Total</th>
              <th class="fifth">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <!-- shopping cart contents -->
            <tr class="productitm">
              <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
              <td><img src="images/design-bundle-pack.png" class="thumb"></td>
              <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
              <td><?php echo "ew"  ?></td>
              <td>€<?php echo "12" ?></td>
              <td><span class="remove"><img src="images/trash.png" alt="X"></span></td>
            </tr>
            <tr class="productitm">
              <!-- http://www.amazon.com/Stuff-My-Cat-The-Book/dp/0811855384 -->
              <td><img src="images/stuff-on-cat-book.png" class="thumb"></td>
              <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
              <td>Stuff on my Cat: The Book</td>
              <td>$8.95</td>
              <td><span class="remove"><img src="images/trash.png" alt="X"></span></td>
            </tr>
            <tr class="productitm">
              <!-- http://www.amazon.com/SpongeBob-SquarePants-The-First-Episodes/dp/B002DYJTVW -->
              <td><img src="images/first-100-spongebob-dvd.png" class="thumb"></td>
              <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
              <td>SpongeBob's First 100 Episodes</td>
              <td>$75.00</td>
              <td><span class="remove"><img src="images/trash.png" alt="X"></span></td>
            </tr>
            <tr class="productitm">
              <!-- http://www.barnesandnoble.com/w/javascript-and-jquery-david-sawyer-mcfarland/1100405042 -->
              <td><img src="images/javascript-jquery-missing-manual.png" class="thumb"></td>
              <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
              <td>JavaScript &amp; jQuery: The Missing Manual</td>
              <td>$27.50</td>
              <td><span class="remove"><img src="images/trash.png" alt="X"></span></td>
            </tr>

            <!-- tax + subtotal -->
            <tr class="extracosts">
              <td class="light">Shipping &amp; Tax</td>
              <td colspan="2" class="light"></td>
              <td>$35.00</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="totalprice">
              <td class="light">Total:</td>
              <td colspan="2">&nbsp;</td>
              <td colspan="2"><span class="thick">$225.45</span></td>
            </tr>

            <!-- checkout btn -->
            <tr class="checkoutrow">
              <td colspan="5" class="checkout"><button id="submitbtn">Checkout Now!</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>



    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <style>
    @import url(http://fonts.googleapis.com/css?family=Fredoka+One);

    html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
      margin: 0;
      padding: 0;
      border: 0;
      font-size: 100%;
      font: inherit;
      vertical-align: baseline;
      outline: none;
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    html { overflow-y: scroll; }
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      font-size: 62.5%;
      line-height: 1;
      color: #414141;
      background: #caccf7 url('bg.png'); /* http://subtlepatterns.com/old-map/ */
      padding: 25px 0;
    }

    ::selection { background: #bdc0e8; }
    ::-moz-selection { background: #bdc0e8; }
    ::-webkit-selection { background: #bdc0e8; }

    br { display: block; line-height: 1.6em; }

    article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
    ol, ul { list-style: none; }

    input, textarea {
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      outline: none;
    }

    blockquote, q { quotes: none; }
    blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
    strong, b { font-weight: bold; }
    em, i { font-style: italic; }

    table { border-collapse: collapse; border-spacing: 0; }
    img { border: 0; max-width: 100%; }

    h1 {
      font-family: 'Fredoka One', Helvetica, Tahoma, sans-serif;
      color: #fff;
      text-shadow: 1px 2px 0 #7184d8;
      font-size: 3.5em;
      line-height: 1.1em;
      padding: 6px 0;
      font-weight: normal;
      text-align: center;
    }


    /* page structure */
    #w {
      display: block;
      width: 600px;
      margin: 0 auto;
    }

    #title {
      display: block;
      width: 100%;
      background: #95a6d6;
      padding: 10px 0;
      -webkit-border-top-right-radius: 6px;
      -webkit-border-top-left-radius: 6px;
      -moz-border-radius-topright: 6px;
      -moz-border-radius-topleft: 6px;
      border-top-right-radius: 6px;
      border-top-left-radius: 6px;
    }

    #page {
      display: block;
      background: #fff;
      padding: 15px 0;
      -webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
      -moz-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
    }

    /** cart table **/
    #cart {
      display: block;
      border-collapse: collapse;
      margin: 0;
      width: 100%;
      font-size: 1.2em;
      color: #444;
    }
    #cart thead th {
      padding: 8px 0;
      font-weight: bold;
    }

    #cart thead th.first {
      width: 175px;
    }
    #cart thead th.second {
      width: 45px;
    }
    #cart thead th.third {
      width: 230px;
    }
    #cart thead th.fourth {
      width: 130px;
    }
    #cart thead th.fifth {
      width: 20px;
    }

    #cart tbody td {
      text-align: center;
      margin-top: 4px;
    }

    tr.productitm {
      height: 65px;
      line-height: 65px;
      border-bottom: 1px solid #d7dbe0;
    }


    #cart tbody td img.thumb {
      vertical-align: bottom;
      border: 1px solid #ddd;
      margin-bottom: 4px;
    }

    .qtyinput {
      width: 33px;
      height: 22px;
      border: 1px solid #a3b8d3;
      background: #dae4eb;
      color: #616161;
      text-align: center;
    }

    tr.totalprice, tr.extracosts {
      height: 35px;
      line-height: 35px;
    }
    tr.extracosts {
      background: #e4edf4;
    }

    .remove {
      /* http://findicons.com/icon/261449/trash_can?id=397422 */
      cursor: pointer;
      position: relative;
      right: 12px;
      top: 5px;
    }


    .light {
      color: #888b8d;
      text-shadow: 1px 1px 0 rgba(255,255,255,0.45);
      font-size: 1.1em;
      font-weight: normal;
    }
    .thick {
      color: #272727;
      font-size: 1.7em;
      font-weight: bold;
    }


    /** submit btn **/
    tr.checkoutrow {
      background: #cfdae8;
      border-top: 1px solid #abc0db;
      border-bottom: 1px solid #abc0db;
    }
    td.checkout {
      padding: 12px 0;
      padding-top: 20px;
      width: 100%;
      text-align: right;
    }


    /* http://codepen.io/guvootes/pen/eyDAb */
    #submitbtn {
      width: 150px;
      height: 35px;
      outline: none;
      border: none;
      border-radius: 5px;
      margin: 0 0 10px 0;
      font-size: 1.3em;
      letter-spacing: 0.05em;
      font-family: Arial, Tahoma, sans-serif;
      color: #fff;
      text-shadow: 1px 1px 0 rgba(0,0,0,0.2);
      cursor: pointer;
      overflow: hidden;
      border-bottom: 1px solid #0071ff;
      background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #66aaff), color-stop(100%, #4d9cff));
      background-image: -webkit-linear-gradient(#66aaff, #4d9cff);
      background-image: -moz-linear-gradient(#66aaff, #4d9cff);
      background-image: -o-linear-gradient(#66aaff, #4d9cff);
      background-image: linear-gradient(#66aaff, #4d9cff);
    }
    #submitbtn:hover {
      background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #4d9cff), color-stop(100%, #338eff));
      background-image: -webkit-linear-gradient(#4d9cff, #338eff);
      background-image: -moz-linear-gradient(#4d9cff, #338eff);
      background-image: -o-linear-gradient(#4d9cff, #338eff);
      background-image: linear-gradient(#4d9cff, #338eff);
    }
    #submitbtn:active {
      border-bottom: 0;
      background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #338eff), color-stop(100%, #4d9cff));
      background-image: -webkit-linear-gradient(#338eff, #4d9cff);
      background-image: -moz-linear-gradient(#338eff, #4d9cff);
      background-image: -o-linear-gradient(#338eff, #4d9cff);
      background-image: linear-gradient(#338eff, #4d9cff);
      -webkit-box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
      -moz-box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
      box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
    }
    </style>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
