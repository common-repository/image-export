<?php
define( 'DEFAULT_PATH', '../../uploads/' );

if ( isset( $_REQUEST['file'] ) && !empty( $_REQUEST['file'] ) ) {
	$fileName = $_GET['file'];
	
	if( preg_match( '/\.\//', $fileName ) ) {
		die( 'URL access error' );
	} else {
		$downloadFile = DEFAULT_PATH . $fileName;
		
		if ( file_exists( $downloadFile ) ) {
			header( 'Content-Type: application/zip' );
			header( 'Content-Disposition: attachment; filename="' . $fileName . '"' );
			readfile( $downloadFile );
			unlink( $downloadFile );
		} else {
			die( 'There is no file.' );
		}
	}
}
exit;
?>
