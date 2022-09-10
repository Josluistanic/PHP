<?php

include_once 'userSession.php';

$userSession = new userSession();

$userSession->closeSession();

header('location: ../');

?>