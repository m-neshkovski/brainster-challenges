<h1>Предизвик 09 Php интро</h1>

<?php

echo "<br><br><br>\n\n\n\r\r\r";

echo "<h3>Задача 01</h3>";

$name = "Kathrin";

if ($name == "Kathrin") {
    echo "Hello Kathrin";
} else {
    echo "Nice name";
}

echo "<br><br><br>\n\n\n\r\r\r";
?>

<h3>Задача 02</h3>

<?php

$rating = 7;

if (($rating >= 1) and ($rating <= 10)) {
    echo "<p>Thank you for rating.</p>";
} else {
    echo "<p>Invalid rating, only numbers between 1 and 10.</p>";
}

$hour = date('h');
$meridiem = date('a');

if ($meridiem == 'am') {
    echo "Good morning Kathrin. <br>\n\r";
}   else if ( ($hour < 7 or $hour == 12) and $meridiem == 'pm') {
        echo "Good afternoon Kathrin. <br>\n\r";
    } else {
        echo "Good evening Kathrin. <br>\n\r";
    }

$voted = true;

if ($rating >=1 && $rating <= 10) {
    if ($voted) {
        echo "You already voted. <br>\n\r";
    } else {
        echo "Thank you for voting. <br>\r\n";
    }
} else {
    echo "The value entered is out of range 1 to 10 or is not an integer. <br>\r\n";
}


echo "<br><br><br>\n\n\n\r\r\r";

echo "<h3>Задача 03</h3>";

$voters = [
    "0" => [
        "name" => 'Nenad',
        "voted" => "false",
        "rated" => 5,
        "hour" => 7,
        "meridiem" => 'am' 
    ],

    "1" => [
        "name" => 'Daniel',
        "voted" => "true",
        "rated" => 8,
        "hour" => 10,
        "meridiem" => 'am'
    ],
    "2" => [
        "name" => 'Milosh',
        "voted" => "true",
        "rated" => 8,
        "hour" => 7,
        "meridiem" => 'pm'
    ],
    "3" => [
        "name" => 'Ana',
        "voted" => "false",
        "rated" => 10,
        "hour" => 4,
        "meridiem" => 'pm'
    ],
    "4" => [
        "name" => 'Irena',
        "voted" => "true",
        "rated" => 11,
        "hour" => 10,
        "meridiem" => 'pm'
    ],
    "5" => [
        "name" => 'Lidija',
        "voted" => "false",
        "rated" => "k",
        "hour" => 10,
        "meridiem" => 'pm'
    ],
    "6" => [
        "name" => 'Marijana',
        "voted" => "false",
        "rated" => 3,
        "hour" => 11,
        "meridiem" => 'pm'
    ],
    "7" => [
        "name" => 'Marijana',
        "voted" => "true",
        "rated" => 3,
        "hour" => 12,
        "meridiem" => 'pm'
    ],
    "8" => [
        "name" => 'Lidija',
        "voted" => "false",
        "rated" => 7,
        "hour" => 3,
        "meridiem" => 'am'
    ],
    "9" => [
        "name" => 'Ana',
        "voted" => "true",
        "rated" => 10,
        "hour" => 2,
        "meridiem" => 'am'
    ],

];


foreach ($voters as $id => $info) {
    echo '<p>' . $info["name"] . ' => "' . $info['voted'] . "," . $info["rated"] . '"';
    echo "<br>";
    if ($info["meridiem"] == 'am') {
        echo "Good morning " . $info["name"] . ". <br>\n\r";
    }   else if ( ($info["hour"] < 7 or $info["hour"] == 12) and $info["meridiem"] == 'pm') {
            echo "Good afternoon " . $info["name"] . ". <br>\n\r";
        } else {
            echo "Good evening " . $info["name"] . ". <br>\n\r";
        }

    if ( $info["rated"] >= 1 && $info["rated"] <= 10 ) {
        if ($info["voted"] == "true") {
            echo "You already voted with " . $info["rated"] . ". <br>\n\r";
        } else {
            echo "Thank you for voting with " . $info["rated"] . ". <br>\n\r";
        }
    } else {
        echo "The value entered is out of range 1 to 10 or is not an integer. <br>\r\n";
    }

}





?>