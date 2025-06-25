<?php

require_once '../../functions/Autoload.php';

Authentication::log_out();

header(header: "Location: ../../index.php");
