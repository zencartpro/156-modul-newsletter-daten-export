<?php
/**
 * export_newsletterdata
 *
 * @package Export Newsletter Data as CSV
 * @copyright Copyright 2018-2019, webchills www.webchills.at
 * @copyright Portions Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * @version $Id: export_newsletterdata.php 2019-06-27 15:29:10 webchills $
 */
require('includes/application_top.php');
?>


<!doctype html>
<html <?php echo HTML_PARAMS; ?>>
  <head>
    <meta charset="<?php echo CHARSET; ?>">
    <title><?php echo TITLE; ?></title>
    <link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
    <script src="includes/menu.js"></script>
    <script src="includes/general.js"></script>
   <script>
      function init() {
          cssjsmenu('navbar');
          if (document.getElementById) {
              var kill = document.getElementById('hoverJS');
              kill.disabled = true;
          }
      }
    </script>

</head>
<body onload="init()">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>

 <!-- header_eof //-->
      <div class="container-fluid">
        <!-- body //-->
        <h1 class="pageHeading"><?php echo EXPORT_NEWSLETTERDATA_HEADING; ?></h1>
 <div class="row"><?php echo TEXT_EXPORT_NEWSLETTERDATA_OVERVIEW; ?><br/><br/><?php echo TEXT_EXPORT_NEWSLETTERDATA_INFO; ?></div>
 	<br/><br/>
 	 <div class="row">
           <div class="form-group">
 	<a href="export_newsletterdata/export_newsletter_data_all_csv.php"><img src="export_newsletterdata/csv_download.gif" border="0" alt="Download csv" title="Download csv"/></a>
       </div>
    </div>
   
 <!-- body_text_eof //-->
      </div>
      <!-- body_eof //-->
      <!-- footer //-->
  <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
      <!-- footer_eof //-->
    </body>
  </html>

<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>