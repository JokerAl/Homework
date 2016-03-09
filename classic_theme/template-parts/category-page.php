<div class="categorised">
    <div class="container-fluid">
        <?php
        $args  = array( 'hide_empty' => '0' );
        $terms = get_terms( 'category', $args );
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            $count     = count( $terms );
            $i         = 0;
            $term_list = '<ul class="category-list">';
            foreach ( $terms as $term ) {
                $i ++;
                $term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="">' . $term->name . '</a></li>';
                if ( $count != $i ) {
                    $term_list .= '';
                } else {
                    $term_list .= '</ul>';
                }
            }
            echo $term_list;
        }
        ?>
    </div>
</div>