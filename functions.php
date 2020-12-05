<?php

function notSetOrEmpty($variable) {
    if (!isset($variable) || empty($variable)) {
        return true;
    } else {
        return false;
    }
}


?>