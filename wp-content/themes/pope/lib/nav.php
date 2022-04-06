<?php
class Pope_Main_Nav_Menu extends Walker_Nav_Menu {

    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
  
    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = Array() ) {

        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu dropdown-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
            );
        $class_names = implode( ' ', $classes );
      
        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";

    }
      
    // add main/sub classes to li's and links
    function start_el( &$output, $object, $depth = 0, $args = Array(), $current_object_id = 0 ) {

        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        //set dropdown attributes string
        $dropdown_attr = 'data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"';

        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            ( $object->hasChildren ? 'dropdown' : '' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
      
        // passed classes
        $classes = empty( $object->classes ) ? array() : (array) $object->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) ) );
      
        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $object->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
      
        // link attributes
        $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
        $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
        $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
        $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';
        $attributes .=  $depth === 0 && ( in_array( 'dropdown', $object->classes ) ) ? $dropdown_attr : '' ;
        $attributes .= ' class="menu-link' . ( $depth > 0 ? ' sub-menu-link' : ' main-menu-link' . $object->hasChildren ? ' dropdown-toggle' : '' ) . '"';
        $attributes .= ( $object->hasChildren ? ' data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"' : '');

        $object_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $object->title, $object->ID ),
            $args->link_after,
            $args->after
        );
      
        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
    }

}