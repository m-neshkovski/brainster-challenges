<?php

require './bootstrap.php';

$cover_img_address_err = $title_err = $subtitle_err = $about_err = $phone_err = $location_err = $product_type_err = $product_url_img_1_err = $product_description_1_err = $product_url_img_2_err = $product_description_2_err = $product_url_img_3_err = $product_description_3_err = $contact_description_err = $linkedin_link_err = $facebook_link_err = $tweeter_link_err = $google_link_err = '';

$hasError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   if (notSetOrEmpty($_POST['cover_img_address'])) {
    $cover_img_address_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['title'])) {
    $title_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['subtitle'])) {
    $subtitle_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['about'])) {
    $about_err = "Внесете вредност во полето";
    $hasError = true;
   }
   
   if (notSetOrEmpty($_POST['phone'])) {
    $phone_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['location'])) {
    $location_err = "Внесете вредност во полето";
    $hasError = true;
   }
   
   if (notSetOrEmpty($_POST['product_type'])) {
    $product_type_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['product_url_img_1'])) {
    $product_url_img_1_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['product_url_img_2'])) {
    $product_url_img_2_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['product_url_img_3'])) {
    $product_url_img_3_err = "Внесете вредност во полето";
    $hasError = true;
   }
   
   if (notSetOrEmpty($_POST['product_description_1'])) {
    $product_description_1_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['product_description_2'])) {
    $product_description_2_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['product_description_3'])) {
    $product_description_3_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['contact_description'])) {
    $contact_description_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['linkedin_link'])) {
    $linkedin_link_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (notSetOrEmpty($_POST['facebook_link'])) {
    $facebook_link_err = "Внесете вредност во полето";
    $hasError = true;
   }
   
   if (notSetOrEmpty($_POST['tweeter_link'])) {
    $tweeter_link_err = "Внесете вредност во полето";
    $hasError = true;
   }
   
   if (notSetOrEmpty($_POST['google_link'])) {
    $google_link_err = "Внесете вредност во полето";
    $hasError = true;
   }

   if (!$hasError) {

        $sql_site = "INSERT INTO `sites` (`cover_img_address`, `title`, `subtitle`, `about`, `phone`, `location`, `product_type_product_type_id`, `contact_description`, `linkedin_link`, `facebook_link`, `tweeter_link`, `google_link`) VALUES ( :cover_img_address, :title, :subtitle, :about, :phone, :location_1, :product_type_product_type_id, :contact_description, :linkedin_link, :facebook_link, :tweeter_link, :google_link )";

        $data = [
            'cover_img_address' => $_POST['cover_img_address'],
            'title' => $_POST['title'],
            'subtitle' => $_POST['subtitle'],
            'about' => $_POST['about'],
            'phone' => $_POST['phone'],
            'location_1' => $_POST['location'],
            'product_type_product_type_id' => $_POST['product_type'],
            'contact_description' => $_POST['contact_description'],
            'linkedin_link' => $_POST['linkedin_link'],
            'facebook_link' => $_POST['facebook_link'],
            'tweeter_link' => $_POST['tweeter_link'],
            'google_link' => $_POST['google_link']
        ];

        $stmt = $conn->prepare($sql_site);
        $stmt->execute($data);

        $sql_last_site = "SELECT `site_id` FROM sites ORDER BY `site_id` DESC LIMIT 1";

        $query_last_site = $conn->query($sql_last_site);

        $last_site_id = $query_last_site->fetch();
        $last_site_id = $last_site_id['site_id'];

        $card1 = [
            'sites_site_id' => $last_site_id,
            'product_url_img' => $_POST['product_url_img_1'],
            'product_description' => $_POST['product_description_1']
        ];

        $card2 = [
            'sites_site_id' => $last_site_id,
            'product_url_img' => $_POST['product_url_img_2'],
            'product_description' => $_POST['product_description_2']
        ];
        
        $card3 = [
            'sites_site_id' => $last_site_id,
            'product_url_img' => $_POST['product_url_img_3'],
            'product_description' => $_POST['product_description_3']
        ];

        $cards = [$card1, $card2, $card3];

        $sql_cards = "INSERT INTO `cards` ( `sites_site_id`, `product_url_img`, `product_description`) VALUES ( :sites_site_id, :product_url_img, :product_description)";

        $stmt_cards = $conn->prepare($sql_cards);
        foreach($cards as $card) {
            $stmt_cards->execute($card);
        }
        
        header("Location: ./page.php?id={$last_site_id}");
   }

}



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
    <title>Challenge PHP-PDO</title>
  </head>
  <body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Еден чекор ве дели од вашата веб страна</h1>
            </div>
            <div class="col-12 col-lg-6 offset-lg-3">
                <form action="" method="POST" class="m-3 p-3">

                    <div class="form-group">
                      <label for="cover_img_address">Напишете го линкот до cover сликата</label>
                      <input type="text" class="form-control" id="cover_img_address" name="cover_img_address" placeholder="Cover image URL">
                    </div>

                    <div class="form-group">
                      <label for="title">Внесете го насловот</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Внесете наслов">
                    </div>

                    <div class="form-group">
                      <label for="subtitle">Внесете го поднасловот</label>
                      <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Внесете поднаслов">
                    </div>

                    <div class="form-group">
                        <label for="about">Напишете нешто за вас</label>
                        <textarea class="form-control" id="about" name="about" rows="3" placeholder="Внесете опис за вас"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone">Внесете го вашиот телефон</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Вашиот телефон">
                    </div>

                    <div class="form-group">
                        <label for="location">Внесете ја вашата локација</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Вашата локација">
                    </div>

                    <hr>
                    <div class="form-group pb-5">
                        <label for="product_type">Одберете дали нудите сервиси или продукти</label>
                        <select class="form-control" id="product_type" name="product_type">
                            <option selected disabled>Изберете продукт или сервис</option>
                            <?php
                                $sql = "SELECT * FROM product_type";

                                $query = $conn->query($sql);

                                while($row = $query->fetch()) {
                                    echo "<option value='{$row['product_type_id']}'>{$row['product_type_name']}</option>";
                                }

                            ?>
                        </select>
                    </div>

                    <label for="">Внесете URL од слика и опис на вашите продукти или сервиси</label>
                    
                    <div class="form-group">
                        <label for="product_url_img_1">URL од слика</label>
                        <input type="text" class="form-control" id="product_url_img_1" name="product_url_img_1" placeholder="URL од слика">
                    </div>
                    <div class="form-group">
                        <label for="product_description_1">Опис за сликата</label>
                        <textarea class="form-control" id="product_description_1" name="product_description_1" rows="3" placeholder="Опис за сликата"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="product_url_img_2">URL од слика</label>
                        <input type="text" class="form-control" id="product_url_img_2" name="product_url_img_2" placeholder="URL од слика">
                    </div>
                    <div class="form-group">
                        <label for="product_description_2">Опис за сликата</label>
                        <textarea class="form-control" id="product_description_2" name="product_description_2" rows="3" placeholder="Опис за сликата"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_url_img_3">URL од слика</label>
                        <input type="text" class="form-control" id="product_url_img_3" name="product_url_img_3" placeholder="URL од слика">
                    </div>
                    <div class="form-group">
                        <label for="product_description_3">Опис за сликата</label>
                        <textarea class="form-control" id="product_description_3" name="product_description_3" rows="3" placeholder="Опис за сликата"></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="contact_description">Напишете нешто за вашата фирма што луѓето треба да го знаат пред да ве контактираат</label>
                        <textarea class="form-control" id="contact_description" name="contact_description" rows="3" placeholder="Внесете опис за фирмата"></textarea>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="linkedin_link">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" placeholder="Linkedin link">
                    </div>
                    <div class="form-group">
                        <label for="facebook_link">Facebook</label>
                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="Facebook link">
                    </div>
                    <div class="form-group">
                        <label for="tweeter_link">Tweeter</label>
                        <input type="text" class="form-control" id="tweeter_link" name="tweeter_link" placeholder="Tweeter link">
                    </div>
                    <div class="form-group">
                        <label for="google_link">Google+</label>
                        <input type="text" class="form-control" id="google_link" name="google_link" placeholder="Google+ link">
                    </div>

                    <button type="submit" class="btn btn-primary">Потврди</button>
                  </form>
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