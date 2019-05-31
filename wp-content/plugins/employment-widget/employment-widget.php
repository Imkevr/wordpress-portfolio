<?php

/*
Plugin Name: Employment Widget
Plugin URI: 
Description: Building a Custom WordPress Employment Widget.
Author: Imke Van Rompa
Version: 1
Author URI: 
*/

class Employment_Widget extends WP_Widget {
    // Initialize Widget
    public function __construct() {
        parent::__construct(
            'employment_widget',
            'Employment Widget',
            array(
                'classname'   => 'employment-widget',
                'description' => 'State your current employment : '
            )
        );
    }



?>