<?php
require '../libs/sessions.php';
(new Sessions)->destroy();
Header("Location: ./");