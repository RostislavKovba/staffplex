<?php
/**
 * Add sidebar with filters
 */
?>

<form action="<?php echo admin_url( 'admin-ajax.php' ) ?>" method="POST" id="js-filter"> 
                    
    <div class="filter-item">
        <?php
        echo '<h4>' . pll__( get_taxonomy('position')->name ) . '</h4>';
        if( $position = get_terms( 'position', 'orderby=name') ) :           
            foreach ($position as $term) :
                echo '<label><input type="checkbox" name="'.$term->slug.'" id="' . $term->term_id . '"/>' . $term->name . '</label>';
            endforeach;
        endif;
        ?>
    </div>

    <div class="filter-item">
        <?php
        echo '<h4>' . pll__( get_taxonomy('location')->name ) . '</h4>';
        
        if( $location_land = get_terms( 'location', 'parent=0' ) ) : 
            foreach ($location_land as $land) :
        
                echo '<h5 id="' .$land->term_id . '"/>' .$land->name. '</h5>';
                if( $location_city = get_terms( 'location', 'parent=' . $land->term_id ) ) {
                    echo '<div>';
                    foreach ($location_city as $city) {
                        echo '<label><input type="checkbox" name="'.$city->slug.'" id="' .$city->term_id . '"/>' .$city->name. '</label>';
                    };
                    echo '</div>';
                };
        
            endforeach;
        endif;
        ?>        
    </div>

<!--
    <div class="filter-item">
        <h4><?php pll_e('experience'); ?></h4>

        <input type="text" class="js-filter-experience js-range" name="experience" value=""
            data-type="double"
            data-min="0"
            data-max="10"
            data-from="0"
            data-to="10"
            data-max_postfix="+"
            data-postfix=" лет"
        />
    </div>
-->
    
    <div class="filter-item">
        <h4><?php pll_e('wage'); ?></h4>

        <input type="text" class="js-filter-payment js-range" name="payment" value=""
            data-type="double"
            data-min="0"
            data-max="50"
            data-from="0"
            data-to="50"
            data-step="1"            
            data-max_postfix="+"
            data-postfix=" €"
        />
    </div>

    <button class="filter-submit" id="js-submit">Filter</button>
    <input type="hidden" name="action" value="myfilter">
    
    <div class="filter-clear" id="js-clear"><?php pll_e('clear'); ?> <span>+</span></div>
</form>