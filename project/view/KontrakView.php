<?php

interface KontrakView
{
    function tampil();
    function tampilForm($action, $data = null);
    function tampilMessage($message, $type);
}