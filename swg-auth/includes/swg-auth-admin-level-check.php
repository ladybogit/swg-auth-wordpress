<?php

// Check if the swg-auth-admin-level action is requested and that a user_name is provided
if(isset($_GET['action']) && $_GET['action'] == 'swg-auth-admin-level' && isset($_POST['user_name'])){
  // Look up the user's ID
  $userID = get_user_by('login', $_POST['user_name']);
  // Check if the user is a Wordpress Admin
  if(user_can($userID, 'administrator')){
    // If the user is a Wordpress Admin, automatically send back level 50
    $response['message'] = "50";
    echo json_encode($response);
    die;
  }
  // Not an admin
  $response['message'] = "0";
  echo json_encode($response);
  die;
}
