<?php 


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'my_framework';
  
    //
    // Create options
    CSF::createOptions( $prefix, array(
      'menu_title' => 'Theme Options',
      'menu_slug'  => 'theme-options',
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'Header',
      'fields' => array(
  
        //
        // A text field
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'Logo Name',
        ),
        array(
            'id'    => 'opt-text',
            'type'  => 'text',
            'title' => 'Social Media Text',
        ),
  
      )
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'Footer',
      'fields' => array(
  
        // A textarea field
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'Footer Copyright',
        ),
  
      )
    ) );
  
  }
  