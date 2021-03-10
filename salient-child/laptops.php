<ul class="wsubcategs">
<?php
$wsubargs = array(
    'hierarchical' => 1,
    'show_option_none' => '',
    'hide_empty' => 0,
    'taxonomy' => 'product_cat'
);
$wsubcats = get_categories($wsubargs);
foreach ($wsubcats as $wsc):  
?>
<?php $P_name = $wsc->name;
        if ($P_name == 'Laptops') {
        ?>
    <li>
        <a href="<?php echo get_term_link( $wsc->slug, $wsc->taxonomy );?>"></a>
        <div class="products">
            <?php echo do_shortcode('[product_category category="'.$wsc->slug.'"]');?>
        </div>
    </li>
<?php }; endforeach;?>
</ul>