<?php
    require_once 'fbConfig.php';
    session_destroy();
    header("Location: ../login.php");