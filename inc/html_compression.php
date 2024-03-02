<?php
/**
 * Minify HTML
 */
function pt_html_minify_start() {
	ob_start('pt_html_minyfy_finish');
}

function pt_html_minyfy_finish( $html )  {
	$html = preg_replace('/<!--(?!s*(?:[if [^]]+]|!|>))(?:(?!-->).)*-->/s', '', $html);
	$html = str_replace(array("\r\n","\r\n","\r\n","\t\n"), '', $html);
	while ( stristr($html, '  '))
	$html = str_replace('  ', ' ', $html);
	$html = str_replace('   ', ' ', $html);
return $html;
}

if ( !is_admin()) {
	add_action('init', 'pt_html_minify_start');
}