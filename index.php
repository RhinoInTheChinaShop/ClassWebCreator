<?php
	/* bootstrapping program to get site running
	 * 
	 * This file (index.php) can be called with require(); to start the website from another PHP file.
	 */
	
	/*
	 * Check if the software is installed
	 * If the isInstalled.php file does not exist,
	 * the installer bootstrap is required().
	 */
	if(!file_exists("isInstalled.php")) {
		require("install_bootstrap.php");
		exit;
	}
	
?>