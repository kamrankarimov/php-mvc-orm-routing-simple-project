<h2>My Team Page</h2>

<?php
    foreach ($data as $item){
        echo '<li>'.$item['fullname'].'</li>';
    }
?>