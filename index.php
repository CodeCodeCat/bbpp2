<?php
function showsql($sql) {
    $con - mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'bbpp2');
    $r = mysqli_quuery($con, $sql);
    while ($row = mysqli_fetch_array($r)) {
        echo $row['first'] . " " . $row['second'] . "</br>";
    }
    return mysqli_select($con, $sql);
}


showsql("SELECT *,
  ((YEAR(NOW()) - YEAR(`date`)) - ((DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(`date`, '00-%m-%d')))) AS `old`
 FROM `users` INNER JOIN (SELECT count(*) as `book_num`, `user_id` FROM `user_books` GROUP BY `user_id`) AS T2 ON `users`.id = `T2`.`user_id` WHERE `old` >= 20 AND `old` <= 50
  AND `book_num` > 10");


showsql("SELECT * FROM `users` WHERE `first` LIKE '%3%'");


showsql("SELECT *
 FROM `users` INNER JOIN (SELECT `user_id` FROM `user_books` INNER JOIN (SELECT * FROM `books` WHERE `title` = 'Book #45') AS T3) ON `user_books`.`bid` = `user`.`bid`) ON `user`.`id` = `user_books`.`user_id`");



showsql("ALTER TABLE  `books` ADD  `isbestseller` BOOLEAN NOT NULL ;");


showsql("UPDATE `users` INNER JOIN (SELECT (count(*) sa `count`) ON `users`.id = `user_books`.`user_id` WHERE `count` > 10");


?>