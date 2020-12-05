<?php

require "./bootstrap.php";

$site = 2; // ova e osnovniot page daden vo zadacata

if ($_SERVER['REQUEST_METHOD']== 'GET') {
  if (!empty($_GET['id'])) {
    $site = $_GET['id'];
  }
}

if($_SERVER['REQUEST_METHOD']== 'POST') {
  $site = $_POST['selected_site'];
}

$sql = "SELECT * FROM sites
        INNER JOIN product_type ON sites.product_type_product_type_id=product_type.product_type_id
        WHERE site_id = {$site}
        LIMIT 1";

$sql_cards = "SELECT * FROM cards WHERE sites_site_id = {$site}";

$query_site = $conn->query($sql);

$query_cards = $conn->query($sql_cards);

$site_data = $query_site->fetch();

// echo '<pre>';
// print_r($site_data);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>Challenge PHP-PDO page</title>
    <style>
      .bg-image {
        background-image: url(<?php echo $site_data['cover_img_address']; ?>);
        min-height: 50vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
      }
    </style>
  </head>
  <body>
    
    <?php require './nav.php' ?>
    
    <div class="container-fluid">
        <div class="row pt-5" id="home">
            <div class="col-12 m-0 p-0 bg-image text-white d-flex flex-column justify-content-center align-items-center">
                <h1 class="display-3 font-weight-bold text-light text-shadow"><?php echo $site_data['title']; ?></h1>
                <h2 class="h1 text-warning text-shadow"><?php echo $site_data['subtitle']; ?></h3>
            </div>
        </div>

        <div class="row pt-5" id="about">
            <div class="col-12 pt-3">
                <h3>За Нас</h3>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, delectus! Atque voluptatem possimus velit? Amet ullam dignissimos fugiat, totam ut laboriosam sequi nam repellat iusto perferendis! Obcaecati dolore vero beatae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis a suscipit adipisci atque officia itaque voluptates laboriosam minus optio impedit, quo error nostrum in! Architecto unde sapiente accusamus voluptatibus. At. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique dolorum fugiat harum expedita fuga pariatur quidem? Ratione, optio? Magni nostrum tempore modi odio similique delectus perspiciatis alias veritatis praesentium aspernatur.</p> -->
                <p><?php echo $site_data['about']; ?></p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column justify-content-center align-items-center">
                <h4>Телефон</h4>
                <p><?php echo $site_data['phone']; ?></p>
                <h4>Локација</h4>
                <p><?php echo $site_data['location']; ?></p>
            </div>
        </div>

        <div class="row pt-5" id="product">
            <div class="col-12 text-center py-3">
                <h3 class="text-capitalize"><?php echo $site_data['product_type_name']; ?></h3>
            </div>
            <?php while ($row = $query_cards->fetch()) { ?>
            <div class="col-12 col-md-4 pb-3">
                <div class="card">
                    <img src="<?php echo $row['product_url_img']; ?>" class="card-img-top" alt="Image we love nature">
                    <div class="card-body">
                      <h5 class="card-title">Опис на <?php echo $site_data['product_type_name']; ?></h5>
                      <p class="card-text"><?php echo $row['product_description']; ?></p>
                      <!-- <a href="#" class="btn btn-primary">Детали</a> -->
                    </div>
                  </div>
            </div>
            <?php } ?>

            
        </div>

        <div class="row pt-5" id="contact">
            <div class="col-12 text-center py-3">
                <h3>Контакт</h3>
            </div>
            <div class="col-12 col-md-6 col-lg-7 p-3">
                <h4>Текст</h4>
                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat deleniti sapiente ut, provident veniam explicabo laudantium exercitationem labore aliquam animi eveniet magnam cumque nemo doloremque dolores. Quae corrupti minus cum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, doloremque ea obcaecati eos vel quis totam. Nisi incidunt amet expedita, quos aspernatur aliquid, a nihil fugiat cumque harum, dolore hic!</p> -->
                <p><?php echo $site_data['contact_description']; ?></p>
            </div>
            <div class="col-12 col-md-6 col-lg-5 p-3">
                <form class="m-3 p-3 border border-dark rounded rounded-lg">
                    <div class="form-group">
                      <label for="name">Име</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Вашето име">
                    </div>
                    <div class="form-group">
                      <label for="email">Имејл</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Вашиот имејл">
                    </div>
                    <div class="form-group">
                        <label for="message">Example textarea</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>

        <div class="row py-2 bg-dark text-light" id="footer">
            <div class="col-12 col-md-7 col-lg-9">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sapiente, quia molestiae eius reprehenderit at repellendus! Similique qui vel laborum, fuga, hic nulla sit beatae necessitatibus fugit voluptas molestias ducimus.
            </div>
            <div class="col-12 col-md-5 col-lg-3 d-flex justify-content-center align-items-center">
                <a href="<?php echo $site_data['linkedin_link']; ?>">
                  <i class="fab p-2 fa-2x fa-linkedin-in"></i>
              </a>
                <a href="<?php echo $site_data['facebook_link']; ?>">
                  <i class="fab p-2 fa-2x fa-facebook-square"></i>
              </a>
                <a href="<?php echo $site_data['tweeter_link']; ?>">
                  <i class="fab p-2 fa-2x fa-twitter"></i>
              </a>
                <a href="<?php echo $site_data['google_link']; ?>">
                  <i class="fab p-2 fa-2x fa-google-plus-square"></i>
              </a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  <script src="https://kit.fontawesome.com/280db70b77.js"></script>
</html>