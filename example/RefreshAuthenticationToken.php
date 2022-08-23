<?php

    require_once './initializer/Initializer.php';

    use GSL\AttackPortal\Authentication;

    $AuthenticationToken = Authentication\Token\AuthenticationTokens::getCurrent();

    $AuthenticationToken->refresh();

?>