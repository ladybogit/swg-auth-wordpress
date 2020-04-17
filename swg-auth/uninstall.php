<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('swg-auth-approval-required');
