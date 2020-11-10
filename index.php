<?php

require_once('Furniture.php');
require_once('Sofa.php');
require_once('Desk.php');
require_once('Bench.php');

$furniture1 = new Furniture('Табуретка Фигаро', 0.6, 0.45, 0.6);
$furniture1->set_is_for_seat(true);

$furniture2 = new Furniture('Кревет Фросина', 0.8, 0.45, 1.8);
$furniture2->set_is_for_sleep(true);

$sofa1 = new Sofa('Тросед Бисера', 2.4, 0.8, 0.8);
$sofa1->setSeats(3);
$sofa1->setArms(2);
$sofa1->setDepth_opened(1.8); // ako dodademe opcija za spienje, ako ne ne se zema vo predvid

$desk1 = new Desk('Биро Фулстак', 1.6, 0.86, 0.9);
$desk1->setWork_area_material('оплеменета иверица');
$desk1->setLegs_material('алуминиум');
$desk1->set_has_drawers(true);

$bench1 = new Bench('Клупа Селска Слава', 3, 0.45, 0.30);
$bench1->setSeats(8);
$bench1->setSeat_material('дрво');
$bench1->setLegs_material('метал');
$bench1->set_is_legs_retractable(true);



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Challange 12 PHP OOP</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-danger">* црвениот текст е динамичен.</p>
            </div>
            <div class="col-12">
                <h1>Class Furniture</h1>
                <p><span class="text-danger"><?php echo $furniture1->name; ?></span> е мебел наменет за <span class="text-danger"><?php if($furniture1->get_is_for_seat()) {
                                                            echo 'седење';
                                                        } else if ($furniture1->get_is_for_sleep()) {
                                                            echo 'спиење';
                } else {
                    echo 'друго';
                } ?></span> со димензии (Ширина:<span class="text-danger"><?php echo $furniture1->width?></span>m/Висина: <span class="text-danger"><?php echo $furniture1->height?></span>m/Длабочина: <span class="text-danger"><?php echo $furniture1->depth?></span>m) со плоштина на основа <span class="text-danger"><?php echo $furniture1->Area(); ?></span>m<sup>2</sup> и волумен <span class="text-danger"><?php echo $furniture1->Volume(); ?></span>m<sup>3</sup>.</p>
                <p><span class="text-danger"><?php echo $furniture2->name; ?></span> е мебел наменет за <span class="text-danger"><?php if($furniture2->get_is_for_seat()) {
                                                            echo 'седење';
                                                        } else if ($furniture2->get_is_for_sleep()) {
                                                            echo 'спиење';
                } else {
                    echo 'друго';
                } ?></span> со димензии (Ширина:<span class="text-danger"><?php echo $furniture2->width?></span>m/Висина: <span class="text-danger"><?php echo $furniture2->height?></span>m/Длабочина: <span class="text-danger"><?php echo $furniture2->depth?></span>m) со плоштина на основа <span class="text-danger"><?php echo $furniture2->Area(); ?></span>m<sup>2</sup> и волумен <span class="text-danger"><?php echo $furniture2->Volume(); ?></span>m<sup>3</sup>.</p>
            </div>

            <div class="col-12">
                <h1>Class Sofa</h1>
                <p>
                    <span class="text-danger"><?php echo $sofa1->name; ?></span> има <span class="text-danger"><?php echo $sofa1->getArms(); ?></span> наслони за раце и <span class="text-danger"><?php echo $sofa1->getSeats(); ?></span> седла.
                </p>

                <p>Ако е наменета само за седење</p>

                <p>
                    Истата има плоштина <span class="text-danger"><?php if ($sofa1->get_is_for_sleep()) { echo "кога е соберена " .  $sofa1->Area(); } else { echo $sofa1->Area(); } ?></span>m<sup>2</sup> и волумен <span class="text-danger"><?php echo $sofa1->Volume(); ?></span>m<sup>3</sup><span class="text-danger"><?php if ($sofa1->get_is_for_sleep()) { echo ", и плоштина кога е отворена " . $sofa1->Area_opened() . "m<sup>2</sup>"; } else {echo ".";} ?></span>
                </p>

                <span class="text-danger"><?php $sofa1->set_is_for_sleep(true);  ?></span>

                <p>Ако се расклопува и е наменета и за спиење</p>

                <p>
                    Истата има плоштина <span class="text-danger"><?php if ($sofa1->get_is_for_sleep()) { echo "кога е соберена " .  $sofa1->Area(); } else { echo $sofa1->Area(); } ?></span>m<sup>2</sup> и волумен <span class="text-danger"><?php echo $sofa1->Volume(); ?></span>m<sup>3</sup><span class="text-danger"><?php if ($sofa1->get_is_for_sleep()) { echo ", и плоштина кога е отворена " . $sofa1->Area_opened() . "m<sup>2</sup>"; } else {echo ".";} ?></span>
                </p>
            </div>
            <div class="col-12">
                <h1>Class Desk</h1>
                
                <p><span class="text-danger"><?php echo $desk1->name; ?></span> има работна површина изработрна од <span class="text-danger"><?php echo $desk1->getWork_area_material(); ?></span> со ширина <span class="text-danger"><?php echo $desk1->width; ?></span>m и длабочина  <span class="text-danger"><?php echo $desk1->depth; ?></span>m односно со плоштина од <span class="text-danger"><?php echo $desk1->Area(); ?></span>m<sup>2</sup>. Истото е високо <span class="text-danger"><?php echo $desk1->height; ?></span>m и има изработени ногарки од високо квалитетен <span class="text-danger"><?php echo $desk1->getLegs_material(); ?></span>.</p>

                <p>
                    <span class="text-danger"><?php if(!$desk1->get_is_for_seat()) { echo "Не е културно да се седи на биро.";} else {echo "Има некоја грешка!!!";} // класата Деск нема дефинирани Arms и Seats ?></span> 
                </p>
                
            </div>
            <div class="col-12">
                <h1>Class Bench</h1>
                
                <p><span class="text-danger"><?php echo $bench1->name; ?></span> има седло изработено од <span class="text-danger"><?php echo $bench1->getSeat_material(); ?></span> со ширина <span class="text-danger"><?php echo $bench1->width; ?></span>m и длабочина  <span class="text-danger"><?php echo $bench1->depth; ?></span>m односно со плоштина од <span class="text-danger"><?php echo $bench1->Area(); ?></span>m<sup>2</sup>. Истото е високо <span class="text-danger"><?php echo $bench1->height; ?></span>m и има изработени ногарки од високо квалитетен <span class="text-danger"><?php echo $bench1->getLegs_material(); ?></span> и истите <span class="text-danger"><?php echo ($bench1->get_is_legs_retractable()) ? "се собираат" : "се фиксни"; ?></span>.</p>

                <p>
                    <span class="text-danger"><?php if ($bench1->get_is_for_seat()) {
                            if ($bench1->getArms() > 0) {
                                echo "{$bench1->name} има {$bench1->getArms()} наслони за раце и има {$bench1->getSeats()} седла.";
                            } else {
                                echo "{$bench1->name} нема наслони за раце и има {$bench1->getSeats()} седла.";
                            }
                    } else {echo "Има некоја грешка!!!";} // класата Деск нема дефинирани Arms и Seats ?></span> 
                </p>
                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>