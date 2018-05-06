<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

$options = array(
	fw()->theme->get_options( 'waroptions/loader-options' ),
	fw()->theme->get_options( 'waroptions/font-options' ),
	fw()->theme->get_options( 'waroptions/colorandstyle-options' ),
	fw()->theme->get_options( 'waroptions/header-options' ),
	fw()->theme->get_options( 'waroptions/blog-options' ),
	fw()->theme->get_options( 'waroptions/posts-options' ),
	fw()->theme->get_options( 'waroptions/portfolio-options' ),
	fw()->theme->get_options( 'waroptions/folios-options' ),
	fw()->theme->get_options( 'waroptions/beteamsingle-options' ),
	fw()->theme->get_options( 'waroptions/be_event_list-options' ),
	fw()->theme->get_options( 'waroptions/be_event_single-options' ),
	fw()->theme->get_options( 'waroptions/social-options' ),
	fw()->theme->get_options( 'waroptions/footer-options' ),
	fw()->theme->get_options( 'waroptions/404-options' ),
);
