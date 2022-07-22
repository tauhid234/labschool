<?php
/**
 * Alchemist Theme page
 *
 * @package eLearning Education
 */

function elearning_education_admin_scripts() {
	wp_dequeue_script('jquery-superfish');
}
add_action( 'admin_enqueue_scripts', 'elearning_education_admin_scripts' );

if ( ! defined( 'ELEARNING_EDUCATION_FREE_THEME_URL' ) ) {
	define( 'ELEARNING_EDUCATION_FREE_THEME_URL', 'https://www.themespride.com/themes/free-elearning-education-wordpress-theme/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_PRO_THEME_URL' ) ) {
	define( 'ELEARNING_EDUCATION_PRO_THEME_URL', 'https://www.themespride.com/themes/elearning-education-wordpress-theme/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_DEMO_THEME_URL' ) ) {
	define( 'ELEARNING_EDUCATION_DEMO_THEME_URL', 'https://www.themespride.com/elearning-education-pro/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_DOCS_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/elearning-education-lite/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_RATE_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_RATE_THEME_URL', 'https://wordpress.org/support/theme/elearning-education/reviews/#new-post' );
}
if ( ! defined( 'ELEARNING_EDUCATION_CHANGELOG_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'ELEARNING_EDUCATION_SUPPORT_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/elearning-education/' );
}

/**
 * Add theme page
 */
function elearning_education_menu() {
	add_theme_page( esc_html__( 'About Theme', 'elearning-education' ), esc_html__( 'About Theme', 'elearning-education' ), 'edit_theme_options', 'elearning-education-about', 'elearning_education_about_display' );
}
add_action( 'admin_menu', 'elearning_education_menu' );

/**
 * Display About page
 */
function elearning_education_about_display() {
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$description = explode( '. ', $theme->get( 'Description' ) );

					array_pop( $description );

					$description = implode( '. ', $description );

					echo esc_html( $description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( ELEARNING_EDUCATION_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'elearning-education' ); ?></a>

					<a href="<?php echo esc_url( ELEARNING_EDUCATION_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'elearning-education' ); ?></a>

					<a href="<?php echo esc_url( ELEARNING_EDUCATION_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'elearning-education' ); ?></a>

					<a href="<?php echo esc_url( ELEARNING_EDUCATION_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'elearning-education' ); ?></a>

					<a href="<?php echo esc_url( ELEARNING_EDUCATION_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'elearning-education' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'elearning-education' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'elearning-education-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'elearning-education-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'elearning-education' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'elearning-education-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'elearning-education' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'elearning-education-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'elearning-education' ); ?></a>
		</nav>

		<?php
			elearning_education_main_screen();

			elearning_education_changelog_screen();

			elearning_education_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'elearning-education' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'elearning-education' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'elearning-education' ) : esc_html_e( 'Go to Dashboard', 'elearning-education' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function elearning_education_main_screen() {
	if ( isset( $_GET['page'] ) && 'elearning-education-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'elearning-education' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'elearning-education' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'elearning-education' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'elearning-education' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'elearning-education' ) ?></p>
				<p><a href="<?php echo esc_url( ELEARNING_EDUCATION_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'elearning-education' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'elearning-education' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'elearning-education' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary"><?php esc_html_e( 'GETPro20', 'elearning-education' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function elearning_education_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'elearning-education' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'elearning_education_changelog_file', ELEARNING_EDUCATION_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = elearning_education_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function elearning_education_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';
		
	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function elearning_education_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'elearning-education' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'elearning-education' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'elearning-education' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'elearning-education' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'elearning-education' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url( PRO_THEME_URL ); ?>"><?php esc_html_e( 'Go for Premium', 'elearning-education' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}