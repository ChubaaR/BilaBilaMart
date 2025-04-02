<?php
	session_start();

	// Destroy session
	if (session_destroy()) {
		// Go back to the index page
		header("Location: index.php");
	}
?>