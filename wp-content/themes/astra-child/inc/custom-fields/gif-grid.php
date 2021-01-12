<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', __('Product Gifs', 'crb'))
    ->where('post_type', '=', 'post') // only show our new fields on products
    ->add_fields(array(
        Field::make('complex', 'crb_rows', 'Rows')
            ->set_layout('tabbed-horizontal')
            ->add_fields(array(
                Field::make('text', 'description', 'Описание категории'),
                Field::make('image', 'gif1', 'Gif image'),
                Field::make('image', 'gif2', 'Gif image'),
                Field::make('image', 'gif3', 'Gif image'),
                Field::make('image', 'gif4', 'Gif image'),
                Field::make('image', 'gif5', 'Gif image')
            )),
    ));

Container::make('term_meta', 'Настройки term')
    ->add_fields(array(
        Field::make('text', 'text', 'Текст'),
        Field::make('color', 'color', 'Цвет')
    ));