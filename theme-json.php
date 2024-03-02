

<?php

function combine_json_files( $input_files = array(), $output_path ) {
	$contents = [];
	foreach ( $input_files as $input_file ) {
		$contents = array_replace_recursive( $contents, json_decode( file_get_contents( $input_file ), true ) );
	}
	file_put_contents( $output_path, json_encode( $contents ) );
}

combine_json_files(
	[
        get_theme_file_path( 'json-parts/version.json' ),
        get_theme_file_path( 'json-parts/customTemplates.json' ),
		get_theme_file_path( 'json-parts/theme-settings.json' ),
		get_theme_file_path( 'json-parts/styles.json' ),
	],
	get_theme_file_path( 'theme.json' )
);