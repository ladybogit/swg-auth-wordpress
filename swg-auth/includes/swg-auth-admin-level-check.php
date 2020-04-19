<?php

// Check if the swg-auth-admin-level action is requested and that a user_name is provided
if(isset($_GET['action']) && $_GET['action'] == 'swg-auth-admin-level' && isset($_POST['user_name'])){
  // Look up the user
  $user = get_user_by('login', $_POST['user_name']);
  if(user_can($user, 'administrator')){
    // If the user is a Wordpress Admin, automatically send back level 50
    $response['message'] = "50";
  } elseif (get_user_meta($user->ID, 'swg-auth-admin-level', true) != NULL) {
    // If an Admin Level exists in the user's metadata, send that value
    $response['message'] = get_user_meta($user->ID, 'swg-auth-admin-level', true);
  } else {
    // Not an admin
    $response['message'] = "0";
  }
  echo json_encode($response);
  die;
}
