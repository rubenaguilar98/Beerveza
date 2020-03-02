<?php

include_once("Database.php");


function get_user_by_id($id)
{
  $user_info = array();

  
  switch ($id){
    case 1:
      $user_info = array("first_name" => "Marc", "last_name" => "Simon", "age" => 21); 
      break;
    case 2:
      $user_info = array("first_name" => "Frederic", "last_name" => "Zannetie", "age" => 24);
      break;
    case 3:
      $user_info = array("first_name" => "Laure", "last_name" => "Carbonnel", "age" => 45);
      break;
  }

  return $user_info;
}

function get_user_list()
{
  $db = database::getInstance();
  $user_list = $db->query("SELECT * FROM usuario ORDER BY nombre");
  return $user_list->fetchAll(PDO::FETCH_OBJ);
}

$possible_url = array("get_user_list", "get_user");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_user_list":
        $value = get_user_list();
        break;
      case "get_user":
        if (isset($_GET["id"]))
          $value = get_user_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;
    }
}

exit(json_encode($value));

?>