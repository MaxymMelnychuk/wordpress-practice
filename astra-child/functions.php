<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** CSS child dépend du parent */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_uri(),
        [ 'astra-theme-css' ],
        wp_get_theme()->get( 'Version' )
    );
}, 20 );

add_action( 'wp', function () {
    remove_all_actions( 'astra_footer' );
    add_action( 'astra_footer', 'astra_child_footer' );
} );

function astra_child_footer() { ?>
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-col">
                <h4>About</h4>
                <p>I design fast, accessible, and conversion-focused websites.</p>
            </div>
            <div class="footer-col">
                <h4>Links</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/mentions-legales">Legal Notice</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="https://instagram.com" target="_blank" rel="noopener">Instagram</a></li>
                    <li><a href="https://facebook.com" target="_blank" rel="noopener">Facebook</a></li>
                </ul>            
            </div>
        </div>
        <p class="copy">© <?php echo date('Y'); ?> — My Company</p>
    </footer>
<?php }

// apply_filter( 'wp_header', function () {
  
    
// } );

add_filter( 'astra_logo', function( $logo ) {
    
    $nouveau_logo = '<a href="' . esc_url( home_url('/') ) . '">
        <img src="https://www.freepnglogos.com/uploads/company-logo-png/company-logo-transparent-png-19.png" 
             alt="Mon logo" style="height:50px;">
    </a>';
    return $nouveau_logo;
});


add_filter('wp_nav_menu_objects', function ($items, $args) {

   
    if ($args->theme_location !== 'primary') {
        return $items;
    }

    $to_remove = ['reviews', 'review', 'about', 'about us'];
    $items = array_filter($items, function ($item) use ($to_remove) {
        $title = strtolower(trim(wp_strip_all_tags($item->title)));
        return !in_array($title, $to_remove, true);
    });

 
    foreach ($items as $item) {
        $title = strtolower(trim(wp_strip_all_tags($item->title)));

        if ($title === 'why us') {
            $item->title = 'Why Me';
        }
    }

    
    return $items;

}, 10, 2);

add_filter('the_content', function($content) {
   
    $target_text = 'results.';

    
    $button = '<p class="custom-btn-wrapper"><a href="/services" class="custom-btn">Contact</a></p>';

    $content = str_replace($target_text, $target_text . $button, $content);

    return $content;
});


