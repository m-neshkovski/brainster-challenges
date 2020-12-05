<?php 

require_once './bootstrap.php';

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link " href="#home">Дома</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#about">За нас</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-capitalize" href="#product"><?php echo $site_data['product_type_name']; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#contact">Контакт</a>
            </li>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="./page.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Изберете пример
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./page.php?id=2">Почетна</a>
                    <div class="dropdown-divider"></div>

                    <?php
                    
                    $sql = "SELECT site_id, title FROM sites";

                    $query = $conn->query($sql);

                    while ($row = $query->fetch()) {
                        if($row['site_id'] != 2) {

                            echo "<a class='dropdown-item' href='./page.php?id={$row['site_id']}'>{$row['title']}</a>";
                        }
                    }
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./form.php">Направи страна</a>

                    <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
            </li>
        </ul>
    </div>
</nav>