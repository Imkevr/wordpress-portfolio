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
    // Initialize Widget with Options
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

    // Widget Front End
    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        echo $before_widget;
        /* Widget Content Below */
            echo "You're current state of employment is: [$job]"; 
        /* Widget Content Above */
        echo $after_widget;
    }

    // Widget Admin Form
    public function form( $instance ) { ?>
        <?php extract( $instance ); ?>
        <p>Set your current employment status: </p>
        <p>
            <label>
                <input type="radio" value="unemployed" name="<?php echo $this->get_field_name( 'job' ); ?>" <?php checked( $job, 'unemployed' ); ?> id="<?php echo $this->get_field_id( 'job' ); ?>" />
                <?php esc_attr_e( 'Unemployed', 'text_domain' ); ?>
            </label>
        </p>
        <p>
            <label>
                <input type="radio" value="employed" name="<?php echo $this->get_field_name( 'job' ); ?>" <?php checked( $job, 'employed' ); ?> id="<?php echo $this->get_field_id( 'job' ); ?>" />
                <?php esc_attr_e( 'Employed', 'text_domain' ); ?>
            </label>
        </p>
        <p>
            <label>
                <input type="radio" value="employed_newChallenge" name="<?php echo $this->get_field_name( 'job' ); ?>" <?php checked( $job, 'employed_newChallenge' ); ?> id="<?php echo $this->get_field_id( 'job' ); ?>" />
                <?php esc_attr_e( 'Employed but looking for a new challenge', 'text_domain' ); ?>
            </label>
        </p>
        <p>
            <label>
                <input type="radio" value="freelancer" name="<?php echo $this->get_field_name( 'job' ); ?>" <?php checked( $job, 'freelancer' ); ?> id="<?php echo $this->get_field_id( 'job' ); ?>" />
                <?php esc_attr_e( 'Freelancer', 'text_domain' ); ?>
            </label>
        </p>
        <p>
            <label>
                <input type="radio" value="student" name="<?php echo $this->get_field_name( 'job' ); ?>" <?php checked( $job, 'student' ); ?> id="<?php echo $this->get_field_id( 'job' ); ?>" />
                <?php esc_attr_e( 'Student', 'text_domain' ); ?>
            </label>
        </p>
    <?php }

    // Save Options
    public function update( $new_instance, $old_instance ) {
        extract( $new_instance );
        $instance = array();

        $instance['job'] = ( !empty( $job ) ) ? sanitize_text_field( $job ) : null;

        return $instance;
    }
}
    

function employment_widget() {
    register_widget( 'Employment_Widget' );
}
add_action( 'widgets_init', 'employment_widget' );

?>