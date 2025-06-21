<?php // -*-mode: PHP; coding:utf-8;-*-
declare(strict_types=1);
namespace MRBS;

use IntlDateFormatter;

require_once 'lib/autoload.inc';

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file.
 *
 *   This file has already been populated with the minimum set of configuration
 *   variables that you will need to change to get your system up and running.
 *   If you want to change any of the other settings in systemdefaults.inc.php
 *   or areadefaults.inc.php, then copy the relevant lines into this file
 *   and edit them here.   This file will override the default settings and
 *   when you upgrade to a new version of MRBS the config file is preserved.
 *
 *   NOTE: if you include or require other files from this file, for example
 *   to store your database details in a separate location, then you should
 *   use an absolute and not a relative pathname.
 **************************************************************************/

/**********
 * Timezone
 **********/

// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "America/Vancouver";


/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL
$dbsys = "mysql";
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$db_host = "localhost";
// If you need to use a non standard port for the database connection you
// can uncomment the following line and specify the port number
// $db_port = 1234;
// Database name:
$db_database = "mrbs";
// Schema name.  This only applies to PostgreSQL and is only necessary if you have more
// than one schema in your database and also you are using the same MRBS table names in
// multiple schemas.
//$db_schema = "public";
// Database login user name:
$db_login = "mrbs";
// Database login password:
$db_password = 'rilinc27';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Set $db_persist to TRUE to use PHP persistent (pooled) database connections.  Note
// that persistent connections are not recommended unless your system suffers significant
// performance problems without them.   They can cause problems with transactions and
// locks (see http://php.net/manual/en/features.persistent-connections.php) and although
// MRBS tries to avoid those problems, it is generally better not to use persistent
// connections if you can.
$db_persist = FALSE;


/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */

/*********************************
	* Site identification information
	*********************************/
   
   // Set to true to enable multisite operation, in which case the settings below are for the
   // home site, identified by the empty string ''.   Other sites have their own supplementary
   // config fies in the sites/<sitename> directory.
   $multisite = false;
   $default_site = '';
   
   $mrbs_admin = "Tracy Lee";
   $mrbs_admin_email = "trevor_davis@sfu.ca";
   // NOTE:  there are more email addresses in $mail_settings below.    You can also give
   // email addresses in the format 'Full Name <address>', for example:
   // $mrbs_admin_email = 'Booking System <admin_email@your.org>';
   // if the name section has any "peculiar" characters in it, you will need
   // to put the name in double quotes, e.g.:
   // $mrbs_admin_email = '"Bloggs, Joe" <admin_email@your.org>';
   
   // The company name is mandatory.   It is used in the header and also for email notifications.
   // The company logo, additional information and URL are all optional.
   
   $mrbs_company = "Research Operations";   // This line must always be uncommented ($mrbs_company is used in various places)
   
   // Uncomment this next line to use a logo instead of text for your organisation in the header
   //$mrbs_company_logo = "your_logo.gif";    // name of your logo file.   This example assumes it is in the MRBS directory
   
   // Uncomment this next line for supplementary information after your company name or logo.
   // This can contain HTML, for example if you want to include a link.
   //$mrbs_company_more_info = "You can put additional information here";  // e.g. "XYZ Department"
   
   // Uncomment this next line to have a link to your organisation in the header
   //$mrbs_company_url = "http://www.your_organisation.com/";
   
   // This is to fix URL problems when using a proxy in the environment.
   // If links inside MRBS or in email notifications appear broken, then specify here the URL of
   // your MRBS root directory, as seen by the users. For example:
   // $url_base =  "http://example.com/mrbs";
   
   /***********************************************
	* Authentication settings - read AUTHENTICATION
	***********************************************/
   
   // NOTE: if you are using the 'joomla', 'saml' or 'wordpress' authentication type,
   // then you must use the corresponding session scheme.
   
   $auth["type"] = "cas"; // How to validate the user/password. One of
						 // "auth_basic", "cas", "config", "crypt", "db", "db_ext", "idcheck",
						 // "imap", "imap_php", "joomla", "ldap", "none", "nw", "pop3",
						 // "saml" or "wordpress".
   
   $auth["session"] = "cas"; // How to get and keep the user ID. One of
							 // "cas", "cookie", "host", "http", "ip", "joomla", "nt",
							 // "omni", "php", "remote_user", "saml" or "wordpress".
   
   
	
   // Cookie path override. If this value is set it will be used by the
   // 'php' and 'cookie' session schemes to override the default behaviour
   // of automatically determining the cookie path to use
   //$cookie_path_override = '/mrbs/';
   
   // The list of administrators (can modify other peoples settings).
   //
   // This list is not needed when using the 'db' authentication scheme EXCEPT
   // when upgrading from a pre-MRBS 1.4.2 system that used db authentication.
   // Pre-1.4.2 the 'db' authentication scheme did need this list.   When running
   // edit_users.php for the first time in a 1.4.2 system or later, with an existing
   // users list in the database, the system will automatically add a field to
   // the table for access rights and give admin rights to those users in the database
   // for whom admin rights are defined here.   After that this list is ignored.
   unset($auth["admin"]);              // Include this when copying to config.inc.php
   $auth["admin"][] = "127.0.0.1";     // localhost IP address. Useful with IP sessions.
   //$auth["admin"][] = "admin";
   
   $auth["admin"][] = "tjdavis";
   $auth["admin"][] = "pkhoo";
   $auth["admin"][] = "tjl";
   $auth["admin"][] = "avprea";
   
   // A user name from the user list. Useful
									   // with most other session schemes.
   //$auth["admin"][] = "10.0.0.3";
   //$auth["admin"][] = "10.0.0.2";
   //$auth["admin"][] = "10.0.0.3";
   
   
   
   // 'session_http' configuration settings
   $auth["realm"]  = "mrbs";
   
   
   
   // 'cas' configuration settings
   $auth['cas']['host']    =  'cas.sfu.ca';  // Full hostname of your CAS Server
   $auth['cas']['port']    = 443;  // CAS server port (integer). Normally for a https server it's 443
   $auth['cas']['context'] = '/cas';  // Context of the CAS Server
   // The "real" hosts of clustered cas server that send SAML logout messages
   // Assumes the cas server is load balanced across multiple hosts.
   // Failure to restrict SAML logout requests to authorized hosts could
   // allow denial of service attacks where at the least the server is
   // tied up parsing bogus XML messages.
   //$auth['cas']['real_hosts'] = array('cas-real-1.example.com', 'cas-real-2.example.com');
   
   // For production use set the CA certificate that is the issuer of the certificate
   // on the CAS server
   //$auth['cas']['ca_cert_path'] = '/path/to/cachain.pem';
   
   // For quick testing you can disable SSL validation of the CAS server.
   // THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
   // VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
   $auth['cas']['no_server_validation'] = true;
   
   // Filtering by attribute
   // The next two settings allow you to use CAS attributes to require that a user must have certain
   // attributes, otherwise their access level will be zero.  In other words unless they ahave the required
   // attributes they will be able to login successfully, but then won't have any more rights than an
   // unlogged in user.
   // $auth['cas']['filter_attr_name'] = ''; // eg 'department'
   // $auth['cas']['filter_attr_values'] = ''; // eg 'DEPT01', or else an array, eg array('DEPT01', 'DEPT02');
   
  
  
  $mail_settings['admin_backend'] = 'smtp';
  
  $smtp_settings['host'] = 'mailgate.sfu.ca';  // SMTP server
  $smtp_settings['port'] = 587;            // SMTP port number
  $smtp_settings['auth'] = true;        // Whether to use SMTP authentication
  $smtp_settings['secure'] = 'tls';         // Encryption method: '', 'tls' or 'ssl'
										 // server doesn't advertise it.
										 // will be used, unless the 'disable_opportunistic_tls' configuration parameter shown below is
										 // set to true.
  $smtp_settings['username'] = 'tjdavis';       // Username (if using authentication)
  $smtp_settings['password'] = 'lantzville1';       // Password (if using authentication)
  $smtp_settings['ssl_verify_peer'] = true;
  $smtp_settings['ssl_verify_peer_name'] = true;
  $smtp_settings['ssl_allow_self_signed'] = false;
  $smtp_settings['disable_opportunistic_tls'] = false;
  
  $mail_settings['from'] = 'tjl@sfu.ca';
  $mail_settings['organizer'] = 'tjl@sfu.ca';
  $mail_settings['recipients'] = 'tjdavis@sfu.ca'; 
  $mail_settings['admin_on_bookings']      = true;
  $mail_settings['on_new']    = true;   // when an entry is created
  $mail_settings['on_change'] = true;  // when an entry is changed
  $mail_settings['on_delete'] = false;  // when an entry is deleted
  $mail_settings['details'] = true;
  
  
  $auth['cas']['debug']   = false;  // Set to true to enable debug output. Disable for production.
  
  
  
  $maxlength['room.description'] = 200;  // characters   (description field in room table)
