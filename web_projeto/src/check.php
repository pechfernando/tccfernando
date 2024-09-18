<?php

require_once '../db_con/init.php';

if (!isLoggedIn())
{
    header('Location: login.php');
}