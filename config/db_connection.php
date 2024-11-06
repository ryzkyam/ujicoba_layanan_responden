<?php
$db =  mysqli_connect('localhost', 'root', 'ramadhan1900', 'student_research_service');

if (!$db) {
     echo 'gagal';
} else {
     echo 'successs';
}
