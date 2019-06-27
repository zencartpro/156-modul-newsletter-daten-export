<?php
/**
 * export_newsletterdata_all_csv
 *
 * @package Export Newsletter Data as CSV
 * @copyright Copyright 2018-2019, webchills www.webchills.at
 * @copyright Portions Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2009 911-need-code-help.blogspot.com
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * @version $Id: export_newsletterdata_all_csv.php 2019-06-27 16:29:10 webchills $
 */
 
 
  chdir('../');
require_once('includes/application_top.php');

if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

($GLOBALS["___mysqli_ston"] = mysqli_connect(DB_SERVER,  DB_SERVER_USERNAME,  DB_SERVER_PASSWORD));
((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . constant('DB_DATABASE')));
mysqli_query($GLOBALS["___mysqli_ston"], "SET NAMES 'utf8'");
  //
  // execute sql query
  //
 $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT 
c.customers_firstname as 'Vorname',
c.customers_lastname as 'Nachname',
c.customers_email_address as 'Email',
c.customers_gender as 'Geschlecht'
FROM
" . TABLE_CUSTOMERS . " c
WHERE
c.customers_newsletter=1;"); // Start our query of the database
  //
  // send response headers to the browser
  // following headers instruct the browser to treat the data as a csv file called export.csv
  //
  header( 'Content-Type: text/csv' );
  header( 'Content-Disposition: attachment;filename=newsletterdaten.csv' );
  //
  // output header row (if atleast one row exists)
  //
  $row = mysqli_fetch_assoc( $result );
  if ( $row )
  {
    echocsv( array_keys( $row ) );
  }
  //
  // output data rows (if atleast one row exists)
  //
  while ( $row )
  {
    echocsv( $row );
    $row = mysqli_fetch_assoc( $result );
  }
  //
  // echocsv function
  //
  // echo the input array as csv data maintaining consistency with most CSV implementations
  // * uses double-quotes as enclosure when necessary
  // * uses double double-quotes to escape double-quotes 
  // * uses CRLF as a line separator
  //
  function echocsv( $fields )
  {
    $separator = '';
    foreach ( $fields as $field )
    {
      if ( preg_match( '/\\r|\\n|,|"/', $field ) )
      {
        $field = '"' . str_replace( '"', '""', $field ) . '"';
      }
      echo $separator . $field;
      $separator = ',';
    }
    echo "\r\n";
  }