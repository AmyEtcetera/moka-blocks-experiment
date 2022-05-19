<?php
/**
 * Moka Blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moka Blocks
 * @since Moka Blocks 1.0
 */

if ( ! function_exists( 'moka_blocks_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Moka Blocks 1.0
	 *
	 * @return void
	 */
	function moka_blocks_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/build/css/editor.css' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

	}
	endif; // moka_blocks_support_support
	add_action( 'after_setup_theme', 'moka_blocks_support' );


if ( ! function_exists( 'moka_blocks_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Moka Blocks 1.0
	 *
	 * @return void
	 */
	function moka_blocks_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'moka-blocks-style',
			get_template_directory_uri() . '//assets/build/css/main.css',
			array(),
			$version_string
		);

		// Add styles inline.
		wp_add_inline_style( 'moka-blocks-style', moka_blocks_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'moka-blocks-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'moka_blocks_styles' );

if ( ! function_exists( 'moka_blocks_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Moka Blocks 1.0
	 *
	 * @return void
	 */
	function moka_blocks_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', moka_blocks_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'moka_blocks_editor_styles' );

if ( ! function_exists( 'moka_blocks_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions moka_blocks_styles() and moka_blocks_inline_editor_styles() above.
	 *
	 * @since Moka Blocks 1.0
	 *
	 * @return string
	 */
	function moka_blocks_get_font_face_styles() {

		return "

		@font-face{
			font-family: 'Lato';
			font-weight: 400;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Lato-Regular.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Lato';
			font-weight: 400;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Lato-Italic.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Lato';
			font-weight: 700;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Lato-Bold.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Lato';
			font-weight: 700;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Lato-BoldItalic.woff2' ) . "') format('woff2');
		}
		";

	}

endif;

if ( ! function_exists( 'moka_blocks_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since Moka Blocks 1.0
	 *
	 * @return void
	 */
	function moka_blocks_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/Lato-Regular.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'moka_blocks_preload_webfonts' );

/**
 * Register block styles.
 *
 * @since Moka Blocks 1.0
 */
require get_template_directory() . '/inc/block-styles.php';