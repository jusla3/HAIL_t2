# Visual Portfolio #
* Contributors: nko
* Tags: portfolio, gallery, works, masonry, popup
* Requires at least: 4.0.0
* Tested up to: 4.9
* Requires PHP: 5.4
* Stable tag: 1.5.0
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

Portfolio layouts visual editor. Masonry, justified, tiles, carousel, slider, coverflow, custom posts, custom images.


## Description ##

Visual Portfolio editor let you create beautiful portfolio layouts. Generates shortcode to show portfolio or any custom post types using Masonry, Justified, Tiles or Carousel layouts.

See **Online Demo** here - [https://demo.nkdev.info/#visual-portfolio](https://demo.nkdev.info/#visual-portfolio)


## Features ##

* Visual preview for portfolio layouts shortcode builder
* Templates for theme developers
* 4 predefined layouts:
    * Masonry
    * Justified (Flickr)
    * Tiles
    * Slider (+ Carousel, Coverflow)
* 3 predefined hover effects:
   * Fade
   * Emerge
   * Fly
   * Default (no hover effect)
* Infinite Scroll
* Load More
* Paged layouts
* Filtering
* Popup gallery (Youtube and Vimeo supported)
* Custom item gutters
* Stretch option (if you want to break the fixed container of the page)
* Custom image sets
* Custom posts type layouts (not only portfolio)
   * Posts by type
   * Posts by specific ID
   * Posts by taxonomies
   * Custom order
* Custom CSS for each portfolio layouts
* Shortcode generated, so you can place unlimited portfolio layouts on the page
* Gutenberg WordPress builder supported
* WPBakery Page Builder page builder supported


## Real Examples ##

[Piroll - Portfolio Theme](https://demo.nkdev.info/#piroll)
[Snow - Portfolio Theme](https://demo.nkdev.info/#snow)



## Screenshots ##

1. Visual Portfolio builder p.1
2. Visual Portfolio builder p.2 (custom images set)
3. Visual Portfolio builder p.3 (custom styles)
4. Portfolio items admin
5. Visual Portfolio layouts admin
6. Example: Tiles + Stretch
7. Example: Justified Gallery (Flickr)
8. Example: Masonry + Posts
9. Example: Carousel and Coverflow
10. Example: Tiles + Custom hover color
11. Example: Tiles + Paged pagination
12. Example: Masonry
13. Example: Tiles + Popup gallery
14. Example: Popup Gallery



## Installation ##

#### Automatic installation ####

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install of Visual Portfolio, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type “Visual Portfolio” and click Search Plugins. Once you’ve found our plugin you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking “Install Now”.

#### Manual installation ####

The manual installation method involves downloading our Visual Portfolio plugin and uploading it to your webserver via your favourite FTP application. The WordPress codex contains [instructions on how to do this here](https://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).


## Frequently Asked Questions ##

### How to disable enqueued plugins (JS, CSS) on frontend ####
There are some plugins, enqueued with Visual Portfolio on your page. If you don't like the plugin and/or want to change it to your alternate plugin, you can disable it using filters. Example:

    add_filter( 'vpf_enqueue_plugin_font_awesome', '__return_false' );

Available filters:

* **vpf_enqueue_plugin_isotope**
* **vpf_enqueue_plugin_flickr_justified_gallery**
* **vpf_enqueue_plugin_object_fit_images**
* **vpf_enqueue_plugin_photoswipe**
* **vpf_enqueue_plugin_swiper**
* **vpf_enqueue_plugin_font_awesome**

Note: some functionality depends on these plugins and you may break the portfolio.

### How to change default templates and styles? ####

You can copy files from the **/visual-portfolio/templates/** to your **YOUR_THEME/visual-portfolio/** folder and change php code and css files here.

### DEV: WP filters. ####

Visual Portfolio has several WP hooks that let you extend functionality.

    add_filter( 'vpf_get_layout_option', 'my_filter_vpf_get_layout_option', 10, 3 );
    
    function my_filter_vpf_get_layout_option( $value, $name, $post_id ) {
        var_dump( $value );
        var_dump( $name );
        var_dump( $post_id );
        return $value;
    }

Available events:

* **vpf_include_template** [ $template, $template_name, $args ] - include php template.
* **vpf_include_template_style** [ $template, $template_name, $deps, $ver, $media ] - include css template.
* **vpf_get_layout_option** [ $value, $name, $post_id ] - get option for Layout.
* **vpf_extend_portfolio_data_attributes** [ $attrs, $options ] - portfolio data attributes array.
* **vpf_extend_portfolio_class** [ $class, $options ] - portfolio class string.
* **vpf_extend_layouts** [ $layouts ] - custom layouts.

        add_filter( 'vpf_extend_layouts', 'my_filter_vpf_extend_layouts' );

        function my_filter_vpf_extend_layouts( $layouts ) {
            return array_merge( $layouts, array(
                'new_layout' => array(
                    'title' => esc_html__( 'New Layout', 'text_domain' ),
                    'controls' => array(
                        ... controls (read below) ...
                    ),
                ),
            ) );
        }
    
    Note: On the portfolio will be added data attribute **[data-vp-layout="new_layout"]**, so you can play with it and use jQuery events to initialize the new layout.

* **vpf_extend_items_styles** [ $items_styles ] - custom items styles.

        add_filter( 'vpf_extend_items_styles', 'my_filter_vpf_extend_items_styles' );

        function my_filter_vpf_extend_items_styles( $items_styles ) {
            return array_merge( $items_styles, array(
                'new_items_style' => array(
                    'title' => esc_html__( 'New Items Style', 'visual-portfolio' ),
                    'builtin_controls' => array(
                        'show_title' => true,
                        'show_categories' => true,
                        'show_date' => true,
                        'show_excerpt' => true,
                        'show_icons' => false,
                        'align' => true,
                    ),
                    'controls' => array(
                        ... controls (read below) ...
                    ),
                ),
            ) );
        }
    
    Note: Make sure that you added template in **your_theme/visual-portfolio/items-list/items-style/new_items_style**. See the structure of default templates to getting started.

* **vpf_extend_filters** [ $filters ] - custom filters.

        add_filter( 'vpf_extend_filters', 'my_filter_vpf_extend_filters' );

        function my_filter_vpf_extend_filters( $filters ) {
            return array_merge( $filters, array(
                'new_filter' => array(
                    'title' => esc_html__( 'New Filter', 'visual-portfolio' ),
                    'controls' => array(
                        ... controls (read below) ...
                    ),
                ),
            ) );
        }
    
    Note: Make sure that you added template in **your_theme/visual-portfolio/items-list/filter/new_filter**. See the structure of default templates to getting started.

### DEV: Controls. ####

These controls you can use in filters to extend Portfolio options (read **DEV: WP filters.** in FAQ).

* The list of options, that available in all controls:

        array(
            // Control type. Full list you can find below.
            'type'        => 'text',
            'label'       => false,
            'description' => false,
            'name'        => '',
            'placeholder' => '',
            'readonly'    => false,
            'default'     => 'default value',
            
            // Use the function to getting value.
            'value_callback' => '',
    
            // hint.
            'hint'        => false,
            'hint_place'  => 'top',
    
            // condition.
            'condition'   => array(
                /**
                 * Array of arrays with data:
                 *  'control' - control name.
                 *  'operator' - operator (==, !==, >, <, >=, <=).
                 *  'value' - condition value.
                 */
            ),
    
            'class'         => '',
            'wrapper_class' => '',
        );

* **text**

        array(
            'type'        => 'text',
            'label'       => esc_html__( 'Text field', 'visual-portfolio' ),
            'description' => esc_html__( 'Text field description', 'visual-portfolio' ),
            'name'        => 'text_control_uniq_name',
            'placeholder' => esc_html__( 'Text field placeholder', 'visual-portfolio' ),
            'default'     => 'default value',
    
            // hint.
            'hint'        => esc_html__( 'Text field hint', 'visual-portfolio' ),
            'hint_place'  => 'left',
        );

* **hidden**

        array(
            'type'        => 'hidden',
            'name'        => 'hidden_control_uniq_name',
            'default'     => 'default value',
        );

* **url**

        array(
            'type'        => 'url',
            'label'       => esc_html__( 'URL field', 'visual-portfolio' ),
            'name'        => 'url_control_uniq_name',
            'default'     => 'default value',
        );

* **textarea**

        array(
            'type'        => 'textarea',
            'label'       => esc_html__( 'Textarea field', 'visual-portfolio' ),
            'name'        => 'textarea_control_uniq_name',
            'default'     => 'default value',
            'cols'        => 30,
            'rows'        => 10,
        );

* **checkbox**

        array(
            'type'        => 'checkbox',
            'label'       => esc_html__( 'Checkbox field', 'visual-portfolio' ),
            'name'        => 'checkbox_control_uniq_name',
            'default'     => true,
        );

* **toggle**

        array(
            'type'        => 'toggle',
            'label'       => esc_html__( 'Toggle field', 'visual-portfolio' ),
            'name'        => 'toggle_control_uniq_name',
            'default'     => true,
        );

* **range**

        array(
            'type'        => 'range',
            'label'       => esc_html__( 'Range field', 'visual-portfolio' ),
            'name'        => 'range_control_uniq_name',
            'min'         => 1,
            'max'         => 15,
            'step'        => 1,
            'default'     => 5,
        );

* **select2**

        array(
            'type'        => 'select2',
            'label'       => esc_html__( 'Select2 field', 'visual-portfolio' ),
            'name'        => 'select2_control_uniq_name',
            'options'     => array(
                'val1' => esc_html__( 'Value 1', 'visual-portfolio' ),
                'val2' => esc_html__( 'Value 2', 'visual-portfolio' ),
            ),
            'default'     => 'val1',
            'searchable'  => false,
            'multiple'    => false,
            'tags'        => false,
        );

* **color**

        array(
            'type'        => 'color',
            'label'       => esc_html__( 'Color field', 'visual-portfolio' ),
            'name'        => 'color_control_uniq_name',
            'default'     => '#ccc',
            'alpha'       => true,
        );

* **align**

        array(
            'type'        => 'align',
            'label'       => esc_html__( 'Align field', 'visual-portfolio' ),
            'name'        => 'align_control_uniq_name',
            'default'     => 'center',
            'extended'    => true,
        );


### DEV: jQuery events. ####

Visual Portfolio has a lot of jQuery events that let you extend functionality. Example:

    $(document).on('init.vpf', function (event) {
        console.log(event, this);
    });

Available events:

* **init.vpf** - called after the portfolio fully inited
* **destroy.vpf** - called after portfolio destroyed.
* **initOptions.vpf** - called after new options inited.
* **initEvents.vpf** - called after new events inited.
* **destroyEvents.vpf** - called after events destroyed.
* **initLayout.vpf** - called after layout inited.
* **addItems.vpf** [ $items, removeExisting ] - called after new items added to the portfolio.
* **removeItems.vpf** [ $items, removeExisting ] - called after items removed from the portfolio.
* **startLoadingNewItems.vpf** [ url ] - called before AJAX started to load new items.
* **loadedNewItems.vpf** [ $newVP, $newVP, data ] - called after AJAX loaded new items.
* **endLoadingNewItems.vpf** - called after AJAX loaded new items and removed loading state from portfolio.
* **initCustomColors.vpf** - called after custom colors rendered.
* **addStyle.vpf** [ selector, styles, media, stylesList ] - called after added new custom styles.
* **removeStyle.vpf** [ selector, styles, stylesList ] - called after removed custom styles.
* **renderStyle.vpf** [ stylesString, stylesList, $style ] - called after rendered custom styles.
* **imagesLoaded.vpf** - called after images loaded.
* **initIsotope.vpf** - called after Isotope inited.
* **destroyIsotope.vpf** - called after Isotope destroyed.
* **initFjGallery.vpf** - called after fjGallery inited.
* **destroyFjGallery.vpf** - called after fjGallery destroyed.





## Changelog ##

= 1.5.0 =
* added Slider (+ Carousel, Coverflow) layout
* added capabilities check when generated preview page
* improved responsive calculation algorithm
* disabled preview page caching by some popular caching plugins
* fixed isotope newly loaded items jumping
* fixed conditions usage on controls in 3rd-party extensions
* fixed PHP notices when trying to extend portfolio options
* fixed Data source selected item (was always Post selected)
* fixed Default filter show
* fixed Date format control UI
* fixed confirmation message when leaving layouts editor without change

= 1.4.3 =
* added check for template existance before include it (to prevent errors when 3rd-party devs don't added templates)
* fixed random order duplicates when used pagination
* fixed errors in PHP < 5.5
* disabled Infinite Load pagination in the Portfolio preview
* changed templates inclusion to support 3rd-party extensions
* removed background color from the load button when loading or no items
* renamed all events prefix from vp to vpf

= 1.4.2 =
* prepared code for extending from 3rd-party developers
* fixed saving unchecked toggle values in Layouts editor (Show title, Show categories, etc...)

= 1.4.1 =
* added filters to disable enqueued frontend plugins (see FAQ section)
* added Custom URL option to custom images set
* added support for negative number of items per page for custom images set (to show all available items on the page)
* fixed custom images show when disabled pagination
* fixed custom images filters count show

= 1.4.0 =
* added Justified layout
* added custom user images support in Content Source settings
* added Gutenberg block to easily insert layouts
* added Random order in Post-Based content source
* added spinner to load more button
* added setting to change portfolio slug
* fixed video playing when popup were closed
* fixed filter in post-based with taxonomies selected
* fixed w3c validation error when enqueuing template styles
* fixed specific posts selector ajax result
* fixed publish button click (don't show confirm alert)
* changed "No More" button text
* changed active filter buttons background color
* updated FontAwesome to 5 version
* minor changes

= 1.3.0 =
* improved CSS editor (added autocomplete hints; selectors hint; showing errors; preventing save when editor has errors)
* improved layouts editor interface
* added shortcode for portfolio filter (you can use filter outside of portfolio wrapper)
* added possibility to change date format
* added frontend WPBakery Page Builder support
* added support for post ordering plugins (Intuitive Custom Post Order)
* fixed popup video jumping
* fixed some php errors in preview
* fixed photoswipe duplicates if on the page > 1 visual portfolio with popup gallery
* fixed permalinks flush on activation and deactivation

= 1.2.1 =
* fixed video format conflict with theme formats
* fixed php error about undefined index
* fixed buttons hover border issue in default themes

= 1.2.0 =
* added support for oEmbed videos (Youtube and Vimeo supported)
* added settings for popup gallery
* added share button in popup gallery
* added "Edit Portfolio Item" button in admin menu on frontend
* added option to show filter items count
* added option to show publised date in human format
* added notice if no items found
* added support for jetpack portfolio type filter
* added portfolio tags support
* updated color picker to support WordPress 4.9
* fixed PhotoSwipe small images loading on mobile devices (performance improvements)
* prevent load more click if href is empty
* minor fixes and changes

= 1.1.4 =
* fixed conflict with WooCommerce Photoswipe gallery

= 1.1.3 =
* added ID in title to tinymce and visual composer dropdowns
* fixed fly effect transition in Safari
* fixed tiles filter jumping
* fixed iframe height calculation if in theme set html height 100%;

= 1.1.2 =
* added options to hide arrows and numbers from the paged pagination
* added support for WPBakery Page Builder
* added class attribute in shortcode
* added excerpt field to the portfolio post type
* removed enqueued portfolio scripts and styles from the admin builder
* improved fly effect, now direction calculated more correct
* changed all items-styles hover effects
* fixed showing excerpt from excerpt post fields
* fixed php short tag usage
* fixed conflict with WPBakery Page Builder and old isotope plugin

= 1.1.1 =
* fixed php enqueue errors

= 1.1.0 =
* preview changed to iframe - now all the portfolio styles showed the same as on your website frontend. Now iframe reloaded when changed all options (Customizer experience here)
* added wrapper to filter and pagination
* added tinyMCE dropdown with list of visual-portfolio shortcodes
* added CodeMirror for custom CSS field
* added loading overlay
* changed paged arrows to font-awesome
* changed default templates style
* changed popup gallery - now used image meta title and description
* fixed popup gallery buttons style conflict with default WordPress themes
* fixed styles rendering on initialization (without timeout now)
* fixed isotope items animation and remove
* fixed preloader opacity transition (added wrapper)
* fixed showing paged pagination if no items
* minor changes

= 1.0.1 =
* added custom CSS field
* added object-fit polyfill to support old browsers
* added custom image sizes
* added responsive
* added wrapper to items layout
* removed margin from main vp container
* fixed array option retrieve error
* minor changes

= 1.0.0 =
* initial Release
