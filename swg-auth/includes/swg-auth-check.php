<?php

// Check if the swg-auth action is requested and that a user_name and user_password are provided
if(isset($_GET['action']) && $_GET['action'] == 'swg-auth' && isset($_POST['user_name']) && isset($_POST['user_password'])){
  // Ask Wordpress to authenticate the user_name and user_password
  $userInfo = wp_authenticate_username_password(NULL, $_POST['user_name'], $_POST['user_password']);
  // Check if the authentication request returned an error
  if(is_wp_error($userInfo)){
    // If there was an error, we'll let the client know.
    $response['message'] = "Account does not exist or password was incorrect";
  } else {
    // If there's no error, Success!
    $response['message'] = "success";
  }
  // Json encode our response so that the LoginServer knows what we're talking about
  echo json_encode($response);
  // Once we've responded, we don't want Wordpress to continue
  die;
}
