<h1>Salam Azerbaycan!</h1>

<?php 
    foreach($users as $user){
        echo '<li>'.$user['fullname'].'</li>';
    }
?>