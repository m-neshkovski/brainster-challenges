<?php

//part 1

function decimalToBinary($number)
{
    $binary = [];
    $i = 0;
    while ($number > 0) {
        $binary[$i] = $number % 2;
        $number = intdiv($number, 2);
        $i = $i + 1;
    }

    // return $binary;
    $binaryString = "";
    for ($i = (count($binary) - 1); $i >= 0; $i--) {
        $binaryString = $binaryString . $binary[$i];
    }

    return $binaryString;
}

function decimalToRoman($number)
{
    // From https://en.wikipedia.org/wiki/Roman_numerals
    $rimskiMap = [
        "tousends" => ["0", "M", "MM", "MMM"],
        "hundreds" => ["0", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM"],
        "tens" => ["0", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC"],
        "units" => ["0", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
    ];
    $rimski = "";
    $delitel = 1000;
    if ($number > 0 and $number <= 3999) {
        foreach ($rimskiMap as $stepen => $cifra) {
            if (intdiv($number, $delitel) != 0) {
                $rimski = $rimski . $cifra[intdiv($number, $delitel)];
                $number = $number % $delitel;
                $delitel = $delitel / 10;
            } else {
                $number = $number % $delitel;
                $delitel = $delitel / 10;
            }
        }
    } else {
        $rimski = "ERROR!!! Out of range.";
    }

    return $rimski;
}

// Part 2


function binaryToDecimal($binary)
{
    $decimal = 0;
    $str = str_split($binary);
    $maxStepen = count($str) - 1;
    for ($i = 0; $i < count($str); $i++) {
        $decimal = $decimal + $str[$i] * pow(2, $maxStepen - $i);
    }
    return $decimal;
}

function romanToDecimal($roman)
{
    $romanValues = [
        'N' => 0, // dodadena e radi sporedba ne moze da vleze vo resenie
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    $decimal = 0;
    $str = str_split($roman);
    $str[count($str)] = 'N'; // dodavame na kraj "N" kao nulta vrednost koja sluzi damo za pocetna sporedba

    for ($i = (count($str) - 1); $i > 0; $i--) {
        $momentalen = $str[$i - 1];
        $prethoden = $str[$i];

        if ($romanValues[$momentalen] >= $romanValues[$prethoden]) {
            $decimal += $romanValues[$momentalen];
        } else {
            $decimal -= $romanValues[$momentalen];
        }
    }

    if ($decimal <= 3999) {
        return $decimal;
    } else {
        return "ERROR!!! Out of range";
    }
}

// Part 3

// Extended decimal to roman
function extendedDecimalToRoman($number)
{
    // From https://en.wikipedia.org/wiki/Roman_numerals
    $rimskiMap = [
        "millions" => ["0", "Z", "ZZ", "ZZZ"],
        "hundredThousands" => ["0", "K", "KK", "KKK", "KW", "W", "WK", "WKK", "WKKK", "KZ"],
        "tenThousands" => ["0", "Q", "QQ", "QQQ", "QJ", "J", "JQ", "JQQ", "JQQQ", "QK"],
        "thousands" => ["0", "M", "MM", "MMM", "MR", "R", "RM", "RMM", "RMMM", "MQ"],
        "hundreds" => ["0", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM"],
        "tens" => ["0", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC"],
        "units" => ["0", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
    ];
    $rimski = "";
    $delitel = 1000000;
    if ($number > 0 and $number <= 3999999) {
        foreach ($rimskiMap as $stepen => $cifra) {
            if (intdiv($number, $delitel) != 0) {
                $rimski = $rimski . $cifra[intdiv($number, $delitel)];
                $number = $number % $delitel;
                $delitel = $delitel / 10;
            } else {
                $number = $number % $delitel;
                $delitel = $delitel / 10;
            }
        }
    } else {
        $rimski = "ERROR!!! Out of range.";
    }

    return $rimski;
}

// extended roman tu decimal
function extendedRomanToDecimal($roman)
{
    $romanValues = [
        'N' => 0, // dodadena e radi sporedba ne moze da vleze vo resenie
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
        'R' => 5000,
        'Q' => 10000,
        'J' => 50000,
        'K' => 100000,
        'W' => 500000,
        'Z' => 1000000,
    ];

    $decimal = 0;
    $str = str_split($roman);
    $str[count($str)] = 'N'; // dodavame na kraj "N" kao nulta vrednost koja sluzi damo za pocetna sporedba

    for ($i = (count($str) - 1); $i > 0; $i--) {
        $momentalen = $str[$i - 1];
        $prethoden = $str[$i];

        if ($romanValues[$momentalen] >= $romanValues[$prethoden]) {
            $decimal += $romanValues[$momentalen];
        } else {
            $decimal -= $romanValues[$momentalen];
        }
    }

    if ($decimal <= 3999999) {
        return $decimal;
    } else {
        return "ERROR!!! Out of range.";
    }
}



// kako sto e definirano vo zadacata, dekadni mora da pocnat so znak, binarni so 0 i 1, 
// Rimski gi racuna site so bukvi odnosno site koi ne gi ispolnuvaat prethodnite dva uslovi

function numberFormatCheck($brojString)
{
    $str = str_split($brojString);
    if (($str[0] == '+') or ($str[0] == '-')) {
        if ($str[1] == '0') {
            $format = "error";
        } else {
            $format = "decade";
        }
    } else {
        $tempTrue = 1;
        $i = 0;
        while ($i < count($str)) {
            if (($str[$i] == '0') or ($str[$i] == '1')) {
                $tempTrue = $tempTrue * 1;
            } else {
                $tempTrue = $tempTrue * 0;
            }
            $i = $i + 1;
        }

        if ($tempTrue == 1) {
            $format = 'binary';
        } else {
            $format = 'Roman';
        }
    }

    return $format;
}

$decimalenBroj = 3999;
$decimalenBroj_1 = 1983;
$decimalenBroj_2 = 4000;

$romanNumber = "MMMM";
$romanNumber_1 = "MCMLXXXIII";

$testbroj_1 = '111100101';
$testbroj_2 = '+156';
$testbroj_3 = 'MCMLXXXIII';
$testbroj_4 = '-0133';

$testExtendedBroj_1 = 3999999;
$testExtendedBroj_2 = 1586488;
$testExtendedBroj_3 = 1234567;

$nizaBroevi = [
    '-123',
    "10111",
    "+0123",
    "MCMLXXXIII",
    "+19856",
    "-3555",
    "000111",
    "11000000",
    "Z",
    "+0",
    "-1"
];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Challenge 10 Loops and Functions</title>
</head>

<body class="text-dark">
    <div class="container bg-light">
        <div class="row pb-3">
            <div class="col-12 py-5 text-center">
                <h1>Предизвик 10: PHP Loops and Functions</h1>
                <hr>
            </div>
            <div class="col-2 pb-2">
                <h2>Part 1</h2>
            </div>
            <div class="col-10 pb-2">
                <h3>Функција 1 (Decade/Binary Conversion)</h3>

                <p>Бинарна репрезентација на декаден број <?php echo $decimalenBroj; ?> е: <?php echo decimalToBinary($decimalenBroj); ?>.</p>
                <p>Бинарна репрезентација на декаден број <?php echo $decimalenBroj_1; ?> е: <?php echo decimalToBinary($decimalenBroj_1); ?>.</p>
                <p>Бинарна репрезентација на декаден број <?php echo $decimalenBroj_2; ?> е: <?php echo decimalToBinary($decimalenBroj_2); ?>.</p>
                <hr>
                <h3>Функција 2 (Decade/Roman Conversion)</h3>

                <p>Римска репрезентација на декаден број <?php echo $decimalenBroj; ?> е: <?php echo decimalToRoman($decimalenBroj); ?>.</p>
                <p>Римска репрезентација на декаден број <?php echo $decimalenBroj_1; ?> е: <?php echo decimalToRoman($decimalenBroj_1); ?>.</p>
                <p>Римска репрезентација на декаден број <?php echo $decimalenBroj_2; ?> е: <?php echo decimalToRoman($decimalenBroj_2); ?>.</p>
                <hr>
            </div>
        </div>
        <hr>

        <div class="row pb-3">
            <div class="col-2">
                <h2>Part 2</h2>
            </div>
            <div class="col-10">
                <h3>Функција 1 (Binary/Decade Conversion)</h3>

                <p>Декадна вредност од бинарен број <?php echo decimalToBinary($decimalenBroj); ?> е: <?php echo binaryToDecimal(decimalToBinary($decimalenBroj)); ?>.</p>
                <p>Декадна вредност од бинарен број <?php echo decimalToBinary($decimalenBroj_1); ?> е: <?php echo binaryToDecimal(decimalToBinary($decimalenBroj_1)); ?>.</p>
                <p>Декадна вредност од бинарен број <?php echo decimalToBinary($decimalenBroj_2); ?> е: <?php echo binaryToDecimal(decimalToBinary($decimalenBroj_2)); ?>.</p>
                <hr>
                <h3>Функција 2 (Roman/Decade Conversion)</h3>

                <p>Декарна вредност од Римскиот број <?php echo decimalToRoman($decimalenBroj); ?> е: <?php echo romanToDecimal(decimalToRoman($decimalenBroj)); ?>.</p>
                <p>Декарна вредност од Римскиот број <?php echo $romanNumber_1; ?> е: <?php echo romanToDecimal($romanNumber_1); ?>.</p>
                <p>Декарна вредност од Римскиот број <?php echo $romanNumber; ?> е: <?php echo romanToDecimal($romanNumber); ?>.</p>
                <hr>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-2">
                <h2>Part 3</h2>
            </div>
            <div class="col-10">
                <h3>Проверка на формат на број (Binary/Decade/Roamn)</h3>

                <p>Бројот: <?php echo $testbroj_1; ?> =====> <?php echo numberFormatCheck($testbroj_1); ?></p>
                <p>Бројот: <?php echo $testbroj_2; ?> =====> <?php echo numberFormatCheck($testbroj_2); ?></p>
                <p>Бројот: <?php echo $testbroj_3; ?> =====> <?php echo numberFormatCheck($testbroj_3); ?></p>
                <p>Бројот: <?php echo $testbroj_4; ?> =====> <?php echo numberFormatCheck($testbroj_4); ?></p>

                <h3>Проверка на проширен Римски систем (Extended Decade/Roamn/Decade)</h3>
                <p>Број <?php echo $testExtendedBroj_1; ?> во проширена Римска нотација е: <?php echo extendedDecimalToRoman($testExtendedBroj_1); ?>, тест за обратна конверзија <?php echo extendedRomanToDecimal(extendedDecimalToRoman($testExtendedBroj_1)); ?>.</p>
                <p>Број <?php echo $testExtendedBroj_2; ?> во проширена Римска нотација е: <?php echo extendedDecimalToRoman($testExtendedBroj_2); ?>, тест за обратна конверзија <?php echo extendedRomanToDecimal(extendedDecimalToRoman($testExtendedBroj_2)); ?>.</p>
                <p>Број <?php echo $testExtendedBroj_3; ?> во проширена Римска нотација е: <?php echo extendedDecimalToRoman($testExtendedBroj_3); ?>, тест за обратна конверзија <?php echo extendedRomanToDecimal(extendedDecimalToRoman($testExtendedBroj_3)); ?>.</p>


                <h4 class="text-center pb-3">Табела за коверзија на низа => $nizaBroevi</h4>



                <table class="table table-striped">
                    <thead class="thead-dark">
                        <th scope="col">$i</th>
                        <th scope="col">nizaBroevi[$i]</th>
                        <th scope="col">Format</th>
                        <th scope="col">Dekaden format</th>
                        <th scope="col">Binaren format</th>
                        <th scope="col">Rimski format</th>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($nizaBroevi as $key => $broj) {

                        ?>

                            <tr>
                                <th scope="row"><?php echo $key ?></th>
                                <td><?php echo $broj ?></td>
                                <td><?php echo numberFormatCheck($broj) ?> </td>
                                <td>
                                    <?php
                                    if (numberFormatCheck($broj) == "decade") {
                                        echo $broj;
                                    } else if (numberFormatCheck($broj) == "binary") {
                                        echo binaryToDecimal(intval($broj));
                                    } else if (numberFormatCheck($broj) == "Roman") {
                                        echo extendedRomanToDecimal($broj);
                                    } else {
                                        echo "ERROR!!!";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (numberFormatCheck($broj) == "decade") {
                                        if (intval($broj) > 0) {
                                            echo decimalToBinary(intval($broj));
                                        } else {
                                            echo "ERROR!!!";
                                        }
                                    } else if (numberFormatCheck($broj) == "binary") {
                                        echo $broj;
                                    } else if (numberFormatCheck($broj) == "Roman") {
                                        echo decimalToBinary(intval(extendedRomanToDecimal($broj)));
                                    } else {
                                        echo "ERROR!!!";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (numberFormatCheck($broj) == "decade") {

                                        echo extendedDecimalToRoman(intval($broj));
                                    } else if (numberFormatCheck($broj) == "binary") {
                                        echo extendedDecimalToRoman(binaryToDecimal($broj));
                                    } else if (numberFormatCheck($broj) == "Roman") {
                                        echo "$broj";
                                    } else {
                                        echo "ERROR!!!";
                                    }
                                    ?>
                                </td>
                            </tr>

                        <?php
                        }



                        ?>
                    </tbody>


                </table>
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