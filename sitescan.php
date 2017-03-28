<?php
// The following 2 lines may be edited to suit your specific needs.
	$directory_permission = '0755'; // The default Joomla! directory permission is - 0755
	$file_permission = '0644'; // The default Joomla! file permission is - 0644

// There is no need to edit below this line -------------------------------------------------

/**
 * @package		sitescan.php
 * @copyright	(C) 2010 Bodvoc Ltd. All rights reserved.
 * @date		15 April 2010
 * @version		1.0.1
 * @license		GNU General Public License Version 2
 * @dependency	PHP 5.1.0 or later
 *
 * Scans the web directory in which it is placed and all sub-directories under the directory
 *
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SiteScan - Scans web directories to check file or directory permissions</title>
</head>
<body>
<h1>Directory and File Scanning Utility</h1>
<?php

	// Check the version number - the iterative functions require at least PHP version 5.1.0
	$v = explode('.', PHP_VERSION);
	if( $v[0]==5 && $v[1] !=0 )
	{
		define( 'DS', DIRECTORY_SEPARATOR );
		set_time_limit(120); // Increases the maximum processing time for the script to 2 minutes (120 sec)
		$changeperms = false;
		$addindexhtml = false;
		$directory = dirname(__FILE__);

	} else {
		$str = 'Sorry the version of PHP you are using is %s, this script requires version 5.1.0 or a later version.';
		$msg = sprinf( $str, PHP_VERSION );
		die( $msg );
	}


	if (isset($_POST['changeperms']) && $_POST['changeperms'] =="Yes") { $changeperms = true; }

	if (isset($_POST['addindexhtml']) && $_POST['addindexhtml'] =="Yes") { $addindexhtml = true; }

	if (isset($_POST['option']) && $_POST['option'] !="")
	{
		$option = (int) $_POST['option'];

		switch ( $option )
		{
			case 1:
				// Directory Scan
				$str1 = "<p>Looking for directories that do not have permissions set to: %s </p>";
				printf( $str1, $directory_permission );

				$i = _check_index_and_perms( $directory, $directory_permission, $changeperms, $addindexhtml, $file_permission );

				echo '<p>Directory scan complete.</p>';
				_selectoption();

				break;
			case 2:
				// File Scan

				$str1 = "<p>Looking for files that do not have permissions set to: %s </p>";
				printf( $str1, $file_permission );

				$i = _check_file_perms( $directory, $file_permission, $changeperms );
				$str3 = "<p>Starting in directory: %s, a total of %d files were scanned.</p>";
				printf( $str3, $directory, $i );

				echo '<p>File scan complete.</p>';
				_selectoption();
				break;
			case 3:
				// Removes this script file from the server to prevent misuse
				$file = $_SERVER["SCRIPT_NAME"];
				$break = preg_split('/\//', $file, -1);
				$pfile =  $break[count($break) - 1];
				if( unlink($pfile) )
				{
					$str1 = '<p>The %s script file has been removed.</p>';
					printf( $str1, $pfile );
					echo '<p>Thank you for using the Bodvoc system scanning utility. ' .
						 'Please visit our <a href="http://bodvoc.com">website</a> for more information ' .
						 'about our other PHP utility scripts and Joomla! extensions.</p>';
				} else {
					$str1 = '<p>A problem occurred removing the %s script file from the server. ' .
							'Please investigate and remove it manually.</p>';
					printf( $str1, $pfile );

				}
				break;
			default:
				// Menu and Help
				_help();
		}

	} else {
		_help();
		_selectoption();
	}
?>
</body>
</html>
<?php

	/**
	 * Checks directory permissions and presence of index.html files
	 *
	 */
	function _check_index_and_perms( $directory, $permission_OK, &$changeperms, &$addindexhtml, &$file_permission )
	{

		$it = new RecursiveIteratorIterator( new RecursiveDirectoryIterator($directory),
															RecursiveIteratorIterator::SELF_FIRST );
		$subpath = '';
		$dir_arr = array();
		$perms_arr = array();
		$changed = 0;
		$i_html_err = 0;
		$i_html_fix = 0;

		$outcomes = array();
		$outcomes[0] = array(text=>'Unable to open new file', value=>0);
		$outcomes[1] = array(text=>'Unable to write to new file', value=>0);
		$outcomes[2] = array(text=>'Unable to close new file', value=>0);
		$outcomes[3] = array(text=>'Unable to set permission on new file', value=>0);
		$outcomes[4] = array(text=>'Index.html file added', value=>1);

		clearstatcache();

		try
		{
			while($it->valid())
			{
				if ( $it->isDir() )
				{
					if( !$it->isDot() )
					{
						$sp = $it->getPathname();

						if( $subpath != $sp )
						{
							$subpath = $sp;
							$dir_arr[] = $sp;

							$octal_perms = substr( decoct( $it->getPerms() ), -4);

							if( $octal_perms != $permission_OK ) { $perms[$sp] = $octal_perms; }
						}
					}
				}

				$it->next();

			} // End of while loop

		} catch ( UnexpectedValueException $e ) {
			printf("<p>Directory [%s] contained a directory we can not scan.</p>", $directory);
		}

		if( count($dir_arr) )
		{
			$dir_arr = array_unique( $dir_arr ); // Ensure there are no duplicates in the array
			$i = count($dir_arr);
		}

		$str3 = '<p>Starting in directory: %s, a total of %d directories and ' .
				'sub-directories have been identified.</p>';
		printf( $str3, $directory, $i );

		$perms_err = count( $perms );
		if( $perms_err )
		{
			if( $perms_err == 1)
			{
				$str4 = "<p>The following directory has permissions which are not set to %s:</p>";
			} else {
				$str4 = "<p>The following directories have permissions which are not set to %s:</p>";
			}

			printf( $str4, $permission_OK );

			$changed = _process_directories( $perms, $permission_OK, $changeperms );

			if( $changed )
			{
				$str5 = "<p>The permissions were successfully change to %s on %d directories.</p>";
				printf( $str5, $permission_OK, $changed );
			}

		} else {
			$str6 = '<p>The permissions for the %d directories have been scanned, ' .
					'they were all set to %s.</p>';
			printf( $str6, $i, $permission_OK );
		}

		if( $i )
		{
			$out = '';

			foreach( $dir_arr as $path )
			{
				$filename1 = $path . DS . "index.html";
				$filename2 = $path . DS . "index.htm";

				// Will check for both index.html and index.htm
				if ( !file_exists($filename1) && !file_exists($filename2) )
				{
					$i_html_err++; // Count the number of missing index.html files
					if( $addindexhtml )
					{
						// Processing where the add index.html file option was selected
						$result = _make_ifile( $path.DS, $file_permission );
						$outcome = $outcomes[$result];

						$i_html_fix = $i_html_fix + $outcome[value];
						$out .= $path . ' - ' . $outcome[text] . '<br />';

					} else {
						// Processing where the add index.html file option was not selected

						$out .= $path . '<br />';
					}
				}
			}

			if( $i_html_err && $addindexhtml )
			{
				// Output for directories with missing index.html files, the add file options was selected

				$str11 = '<p>Of the %d directories that were scanned, %d did not contain an index.html file.</p>';
				printf( $str11, $i, $i_html_err );

				$diff = $i_html_err - $i_html_fix; // Were all the missing files replaced?

				if( !$diff )
				{
					$str12 = '<p>The script has successfully added an index.html file to all %d directories. ' .
							'The affected directories were:</p>';
					$confirm .= sprintf( $str12, $i_html_fix );

				} else {
					$str13 = '<p>The script has not successfully added an index.html file to all %d directories. ' .
							'It was unable to add index.html files to %d directories. ' .
							'The processing results are as follows:</p>';
					$confirm .= sprintf( $str13, $i_html_err, $diff );

				}

				echo $confirm . '<p>' . $out . '</p>';

			} elseif( $i_html_err ) {

				// Output for directories with missing index.html files, add file options was not selected

				if( $i == 1 )
				{
					$str14 = '<p>One directory was scanned, it did not contain an index.html file:</p>';
				} else {
					$str14 = '<p>Of the %d directories that were scanned, %d did not contain an index.html file:</p>';
					$str14 = sprintf( $str14, $i, $i_html_err );
				}

				echo $str14 . '<p>' . $out . '</p>';

			} else {

				// Output where there were no missing index.html files

				if( $i == 1 )
				{

					$str15 = '<p>Starting in directory: %s, %d directory was scanned, it contained an index.html files.</p>';
				} else {

					$str15 = '<p>Starting in directory: %s, a total of %d directories were scanned, ' .
							'all contain index.html files.</p>';
				}
				printf( $str15, $directory, $i );
			}

		} else {

			// Output if there are no directories to process

			echo '<p>No directories to process</p>';
		}

		return $i;

	} // End of function _check_index_and_perms

	/**
	 * Processes directories with non default permissions
	 *
	 * If change permissions set, will attempt to set directory permissions to default values
	 *
	 */
	function _process_directories( &$perms, &$permission_OK, &$changeperms )
	{
		$str2 = "<p>Directory %s has permissions set to %s.</p>";
		$str3 = "<p>Directory %s permissions successfully changed to %s.</p>";
		$i = 0;

		/**
		 * The following two lines are necessary to overcome a problem with the way that chmod is handling the
		 * $permission_OK variable. It is passed as type string and needs to be treated by chmod as octal
		 *
		 * Solution from user notes on page - http://php.net/manual/en/function.ftp-chmod.php
		 *
		 */
		$mode = (int) $permission_OK;
		$p = octdec( str_pad($mode,4,'0',STR_PAD_LEFT) );

		echo '<p>';

		if( $changeperms )
		{
			foreach( $perms as $key=>$value )
			{
				if( chmod( $key, $p ) )
				{
					$i++;
					printf( $str3, $key, $permission_OK );
				} else {
					printf( $str2, $key, $value );
				}
			}
		} else {

			foreach( $perms as $key=>$value ) { printf( $str2, $key, $value ); }
		}

		echo '</p>';

		return $i;

	} // End of function _process_directories

	/**
	 * Checks file permissions
	 *
	 */
	function _check_file_perms( $directory, $permission_OK, $changeperms )
	{
		$i = 0;
		$perms = array();

		$fileSPLObjects =  new RecursiveIteratorIterator( new RecursiveDirectoryIterator($directory),
															RecursiveIteratorIterator::CHILD_FIRST );
		try
		{
			foreach( $fileSPLObjects as $fullFileName => $fileSPLObject ) {
				if ( $fileSPLObject->isFile() )
				{
					$i++;
					$octal_perms = substr( decoct( fileperms( $fullFileName ) ), -4);
					$x = fileperms( $fullFileName );
					if( $octal_perms != $permission_OK ) { $perms[$fullFileName] = $octal_perms; }
				}
			}
		} catch ( UnexpectedValueException $e ) {
			printf("<br />Directory [%s] contained a directory we can not scan.", $directory);
		}
		echo '</p>';

		$str1 = "<p>Starting in directory: %s and searching all sub-directories beneath this directory.</p>";
		printf( $str1, $directory );

		$perms_err = count( $perms );
		if( $perms_err )
		{
			if( $perms_err == 1)
			{
				$str2 = "<p>The following file has permissions which are not set to %s:</p>";
				printf( $str2, $permission_OK );
			} else {
				$str2 = "<p>Of the %d files scanned, the following %d files have permissions which are not set to %s:</p>";
				printf( $str2, $i, $perms_err, $permission_OK );
			}

			$changed = _process_files( $perms, $permission_OK, $changeperms );

			if( $changed )
			{
				$str3 = "<p>The permissions were successfully change to %s on %d files.</p>";
				printf( $str3, $permission_OK, $changed );
			}

		} else {
			$str4 = '<p>The permissions for the %d files have been scanned, they were all set to %s.</p>';
			printf( $str4, $i, $permission_OK );
		}

		return $i;

	} // End of function _check_file_perms

	/**
	 * Processes files with non default permissions
	 *
	 * If change permissions set, will attempt to set file permissions to default values
	 *
	 */
	function _process_files( &$perms, &$permission_OK, &$changeperms )
	{
		$str2 = "<p>%s has permissions set to %s.</p>";
		$str3 = "<p>%s permissions successfully changed to %s.</p>";
		$i = 0;
		/**
		 * The following two lines are necessary to overcome a problem with the way that chmod is handling the
		 * $permission_OK variable. It is passed as type string and needs to be treated by chmod as octal
		 *
		 * Solution from user notes on page - http://php.net/manual/en/function.ftp-chmod.php
		 *
		 */
		$mode = (int) $permission_OK;
		$p = octdec( str_pad($mode,4,'0',STR_PAD_LEFT) );

		echo '<p>';

		if( $changeperms )
		{
			foreach( $perms as $key=>$value )
			{
				if( chmod( $key, $p ) )
				{
					$i++;
					printf( $str3, $key, $permission_OK );
				} else {
					printf( $str2, $key, $value );
				}
			}
		} else {

			foreach( $perms as $key=>$value ) { printf( $str2, $key, $value ); }
		}

		echo '</p>';

		return $i;

	} // End of function _process_files

	/**
	 * Creates an index.html file in the deirectory specified by $path and sets file permissions to default values
	 *
	 * Returns a numeric code indicating success or cause of failure:
	 *	  0 = unable to open new file
	 *    1 = unable to write to new file
	 *    2 = unable to close new file
	 *    3 = unable to set permissions on new file
	 *    4 = Success!
	 *
	 */
	function _make_ifile( $path, $permission_OK )
	{
		/**
		 * The following two lines are necessary to overcome a problem with the way that chmod is handling the
		 * $permission_OK variable. It is passed as type string and needs to be treated by chmod as octal
		 *
		 * Solution from user notes on page - http://php.net/manual/en/function.ftp-chmod.php
		 *
		 */
		$mode = (int) $permission_OK;
		$p = octdec( str_pad($mode,4,'0',STR_PAD_LEFT) );

		$iFile = $path . 'index.html';
		if( $fh = @fopen($iFile, 'w') )
		{
			if( fwrite($fh, '<html><body bgcolor="#FFFFFF"></body></html>' ) )
			{
				if( fclose($fh) )
				{
					if( chmod( $iFile, $p ) )
					{
						return 4;
					} else {
						return 3;
					}
				} else {
					return 2;
				}
			} else {
				return 1;
			}
		} else {
			return 0;
		}

	} // End of function _make_ifile

	/**
	 * Display help text
	 *
	 */
	function _help()
	{
		$describe  = '<h2>Description:</h2>';
		$describe .= '<p>This is a command line utility that scans one or more directories of a Joomla! site. The utility operates in two modes - directory scanning to check directory permissions and verify the presence of index.html files, or file scanning to check permissions on files. In both modes, the script will recursively check the directory in which it is placed and all sub-directories beneath the directory.</p>';
		$describe .= '<p>In directory scanning mode, the script checks whether directory permissions are set to 0755, the recommended default settings for Joomla! It also checks every directory for the presence of an index.html file. All deviations from the recommended permissions settings and any missing index.html files will be logged to the console. You can use the "Change permissions" option and the "Add index files" option to automatically correct these problems.</p>';
		$describe .= '<p>In file scanning mode, the script checks whether file permissions are set to 0644, the recommended default settings for Joomla! All files are scanned and any deviations from the recommended permission settings will be logged to the console. You can use the "Change permissions" option to automatically change any anomlous permission to the recommended settings.</p>';
		$describe .= '<p>Note - the above permissions apply to live servers, if running this script on a development server, or on a local machine your default settings may be different, e.g. a Windows development environment may have all directories set to 0777 and files to 0666.</p>';
		$describe .= '<p>Visit our <a href="http://bodvoc.com">website</a> for more information about this and our other utilities.</p>';
		$describe .= '<p>Released under the GNU General Public License. Copyright 2010 Bodvoc Ltd.  All rights reserved.</p>';
		$run  = '<h2>Usage:</h2>';
		$run .= '<p>Copy this file (sitescan.php) into the root of your Joomla! web site (or another directory if you only wish to scan part of the site.</p>';
		$run .= '<p>Start your browser and enter the url for this script file on your server (e.g. if the file is in the root directory, enter - http://www.mysite.com/sitescan.php)</p>';
		$run .= '<p>An introductory screen will be displayed, offering three options:<br />Scan directories<br />Scan files<br />Delete this script (deletes the scrip from your webserver)</p>';
		$run .= '<p>Select the option you require and click the Run button.</p>';
		$run .= '<p>Note - we recommend that you remove the script from your server once you have completed the scans, to prevent misuse.</p>';
		echo $describe . $run;

		return;

	} // End of function _help

	/**
	 * Display run time options
	 *
	 */
	function _selectoption()
	{
		?>
				<h2>Select option:</h2>
				<form name="scan_option" action="<?php echo $_SERVER[REQUEST_URI]; ?>" method="POST">
				<table>
				<tr>
				<td>Action required:&#160;</td>
				<td>
				<select name="option" id="option" >
				<option value="0" >- Please Select -</option>
				<option value="1" >Scan directories</option>
				<option value="2" >Scan files</option>
				<option value="3" >Delete this script</option>
				</select> </td>
				</tr>
				<tr><td>Change permissions? :</td><td><input type="checkbox" name="changeperms" value="Yes" /></td></tr>
				<tr><td>Add index files?:</td><td><input type="checkbox" name="addindexhtml" value="Yes" /></td></tr>
				</table>
				<p><input type="submit" name="submit" value="Run" /></p>
				</form>
		<?php

	} // End of function _selectoption

?>
