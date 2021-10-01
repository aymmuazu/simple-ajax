<?php

$con = mysqli_connect('localhost', 'root', '', 'ajax');

if (!$con) {
    return 'Cannot connect to the database';
}