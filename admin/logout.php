<?php

require '../php/config.php';

session_destroy();

header("location: index.php");