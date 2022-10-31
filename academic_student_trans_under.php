<?php
  session_start();

include "./includes/smispagesetup.inc";
include "./includes/academic_student_trans_under.inc";

$smissubtitle = "<a href=/smis/prov_student_trans.php> ";
$smissubtitle .= "Next PROVISIONAL RESULT SLIP </a> ";

set_global_values();
 $vPrinting = "";
 $vPrinting = (!empty($HTTP_GET_VARS['vprint'])) ? $HTTP_GET_VARS['vprint'] : "";
 if(!($vPrinting))
   $vPrinting = (!empty($HTTP_POST_VARS['vprint'])) ? $HTTP_POST_VARS['vprint'] : "";

 $vregno = "";
 $vregno = (!empty($HTTP_GET_VARS['vregno'])) ? $HTTP_GET_VARS['vregno'] : "";
 if(!($vregno))
   $vregno = (!empty($HTTP_POST_VARS['vregno'])) ? $HTTP_POST_VARS['vregno'] : "";
 $vregno = trim(strtoupper($vregno));

// Set HEADER contents
 CCSetSession('printpage',"/smis/academic_student_trans_under.php?vregno=$vregno&vprint=true");
 if ($vPrinting)
  echo set_transcript_header($smissubtitle);
 else
  echo set_headercontents($smissubtitle);
 CCSetSession('printpage',""); //Initialize

// Set BODY contents
  $connectstatus = CCGetSession('connectstatus');
  if ($connectstatus == true) {
     echo processTranscripts();
  }
// Set Footer contents
 if ($vPrinting
  echo docClosingTags();
 else {
  echo set_footercontents();
  echo ClosingTags();
 }
?>

