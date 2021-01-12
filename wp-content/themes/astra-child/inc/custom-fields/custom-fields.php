<?php 
use Carbon_Fields\Container;
use Carbon_Fields\Field;

    Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
        ->set_icon('dashicons-buddicons-topics')
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
        ) );

Container::make( 'post_meta', __( 'Видео вместо гиф' ) )
    ->show_on_post_type ('product')
    ->add_fields( array(
        Field::make( 'text', 'crb_src', 'Ссылка' ),
    ) );