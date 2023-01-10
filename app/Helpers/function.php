<?php

if ( !function_exists( 'recursiveCategory' ) ) {
    function recursiveCategory( $categories, &$html, $selected = '', $parent_id = 0 ,  $char = '--' ) {
        foreach ( $categories as $key => $category ) {
            if ( $category->parent_id == $parent_id ) {
                if ( $selected == $category->id ) {
                    $html .= "<option selected value=". $category->id ."> $char $category->name </option>";
                } else {
                    $html .= "<option value=". $category->id ."> $char $category->name </option>";
                }
                unset( $categories[ $key ] );
                recursiveCategory( $categories, $html, $selected, $category->id, $char.'--');
            }
        }
    }
}