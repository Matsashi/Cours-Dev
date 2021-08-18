<?php
function connexion_BD()
{
    try 
    {
        $db = new PDO("mysql:host=localhost;dbname=eval_grec;charset=utf8", "root", "");
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