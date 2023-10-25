<?php

require_once 'php/config.php';

session_destroy();

header("location: index.php");