<?php

/* регистрация виджета */
 
function contact_form_widget() {
    register_widget( 'Contact_Form' );
}
add_action( 'widgets_init', 'contact_form_widget' );

/*
 * создание виджета
 */
class Contact_Form extends WP_Widget {

    function __construct() {
        parent::__construct('Contact_Form', 'Контактная форма', array( 'description' => 'Для заполнения информации в секции с контактной формой перед подвалом сайта', ));
    }
    
    /*
	 * фронтэнд виджета
	 */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ); 
        $widget_id = $args['widget_id'];

        echo $args['before_widget']; ?>

        <section class="section e--bg-type-2 form-section" id="footer-form">
            <div class="container">
                <div class="section-title">
                    <h2><?php the_field('contact-widget-title', 'widget_' . $widget_id ); ?></h2>                   
                    <?php if(get_field('widget-text-change') == 'on') : ?>
                        <p><?php the_field('contact-widget-text' ); ?></p>
                    <?php else : ?>
                        <p><?php the_field('contact-widget-text', 'widget_' . $widget_id ); ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-cotainer">            
                    <?php echo do_shortcode( get_field('contact-widget-form', 'widget_' . $widget_id) ); ?>
                </div>
            </div>
        </section>

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