<?php
	/*
	 * The bootstrap for the install program
	 * The install bootstrap downloads install files if needed,
	 * and runs the installer if it already exists.
	 */
	
	/*
	 * Install bootstrap settings
	 * Most settings can be chosen by the user,
	 * automatically detected, or the default can be used.
	 * (The one-liner mess after a setting is a ternary expression to check if the setting should be overridden)
	 */
	/*
	 * The settings listed below can be changed with a GET request,
	 * meaning ?downloadMethod=git would override $downloadMethod = "auto"; below.
	 * Setting $allowOverride to false means that GET variables are ignored.
	 * [Setting the override to false might marginally increase security]
	 * This is the only setting that can not be overridden.
	 */
	$allowOverride = true; // true/false; default = true
	
	/*
	 * Using an automatic install downloads and uses include() to
	 * run an installation without any human intervention.
	 * The other settings should be triple-checked or more in
	 * an automatic install.
	 */
	$automaticInstall = false; // true/false; default = false
	$automaticInstall = ($allowOverride && isset($_GET["automaticInstall"])) ? $_GET["automaticInstall"] : $automaticInstall;
	
	/*
	 * If the software should be downloaded if the install files don't exist
	 */
	$download = true; // true/false; default = true
	$download = ($allowOverride && isset($_GET["download"])) ? $_GET["download"] : $download;
	
	/*
	 * The method that will be attempted if the software is to be downloaded
	 * Depends on $download to be true, if $download is false the setting is ignored.
	 * Currently the only options are automatic, which selects the best method supported,
	 * or function, where the user can define a function to be run instead of a prebuilt function.
	 * TODO: consider more methods: http, ftp, curl, [bash] cp, etc.
	 */
	$downloadMethod = "automatic"; // automatic/function; default = "automatic"
	$downloadMethod = ($allowOverride && isset($_GET["downloadMethod"])) ? $_GET["downloadMethod"] : $downloadMethod;
	
	/*
	 * Version to be downloaded
	 * Stable downloads the latest stable build (which is the currently supported version)
	 * Dev [development] installs the lastest build, which might not be stable
	 * A URL can be specified, which will be downloaded instead
	 * (Currently the URL must be correct for the right download method; ex. a link to the zip for http downloads,
	 * file path for ftp, file system link for a local file copy)
	 * Requires $download to be true, and $downloadMethod to not be a custom function
	 */
	$downloadVersion = "stable"; // stable/dev/<url>
	$downloadVersion = ($allowOverride && isset($_GET["downloadVersion"])) ? $_GET["downloadVersion"] : $downloadVersion;
	
	/*
	 * Checks if the install directory exists,
	 * if so it redirects the user into that directory.
	 */
	if(is_dir("install") && !$automaticInstall) {
		header("Location: install/");
		exit;
	}
	if(is_dir("install") && $automaticInstall) {
		require("install/automaticInstall.php");
		exit;
	}
	
	// TODO: add download code
	
?>