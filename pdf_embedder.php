<?php

/*
Plugin Name: PDF Embedder
Plugin URI: https://www.github.com/franciscocervera
Description: Embeds PDF files to your WordPress pages/posts using browser's default viewer.
Version: 0.1
Author: Francisco Cervera
Author URI: https://www.github.com/franciscocervera
*/

function pdf_embed($html, $post_id){
	$file = get_post($post_id);
	if ($file->post_mime_type == 'application/pdf') {
		$html = '[pdf_embedder src="'.$file->guid.'"]'.$html;
	}
	return $html;
}
function pdf_shortcode($attr){
	return '<embed src="'.$attr['src'].'" style=" height:640px; width:100%;"></embed>';
}
add_filter ( 'media_send_to_editor', 'pdf_embed', 30, 3);
add_shortcode( 'pdf_embedder', 'pdf_shortcode' );
