<?php

/* регистрация виджета */
 
function footer_info_widget() {
    register_widget( 'Footer_Info' );
}
add_action( 'widgets_init', 'footer_info_widget' );

/*
 * создание виджета
 */
class Footer_Info extends WP_Widget {

    function __construct() {
        parent::__construct('Footer_Info', 'Подвал', array( 'description' => 'Для заполнения информации в подвале сайта (лого и текст под ним)', ));
    }
    
    /*
	 * фронтэнд виджета
	 */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ); 
        $widget_id = $args['widget_id'];

        echo $args['before_widget']; ?>
        
        <a href="<?php echo pll_home_url(); ?>" class="logo">
            <img src="<?php the_field('footer-logo', 'widget_' . $widget_id ); ?>" alt="footer-logo">
        </a>

        <p><?php the_field('footer-text', 'widget_' . $widget_id ); ?></p>

    <?php 
        echo $args['after_widget'];
    }
    
    /*
	 * бэкэнд виджета
	 */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = 'Заголовок';
        }

    }
    
    /*
	 * сохранение настроек виджета
	 */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
 
}