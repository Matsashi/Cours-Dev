<?php
function connexion_BD()
{
    try 
    {
        $db = new PDO("mysql:host=mysql21.lwspanel.com;dbname=matth1701759;charset=utf8", "matth1701759", "ffdezfywlw");
        return $db;
    } 
    catch (Exception $e) 
    {
        die($e->getMessage());
        return $e;
    }
}
function read_article()
{
    return "SELECT * FROM article";
}
function read_user()
{
    return "SELECT * FROM user";
}