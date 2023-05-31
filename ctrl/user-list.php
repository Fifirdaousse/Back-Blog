<?php
session_start();
require("../lib/user.php");


$listUser = readAllUser();


include("../view/user-list.php");
