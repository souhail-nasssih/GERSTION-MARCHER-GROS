<?php
function connecter()
{
    $cnx = mysqli_connect("localhost", "root", "", "appmarcher");
    return $cnx;
}