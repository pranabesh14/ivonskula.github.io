<?php

header( 'Content-Type: image/gif' );

$id = urldecode(ltrim($_SERVER["REQUEST_URI"], '/'));
//Add the tracker to the message.
$subject = 'Email opened: ' . $id;
if ($_SERVER["HTTP_CF_CONNECTING_IP"] == "66.249.93.75")
{
    $ip = "GMail";
}
else
{
    $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
$message = 'Opened from: ' . $_SERVER["HTTP_CF_IPCOUNTRY"] . ' - ' . $ip . ' / ' .$_SERVER["REMOTE_ADDR"] 
. "\r\n
\r\nOpened at: " . date('Y-m-d h:i:s a', time());
$to = 'contact+tracking@ivonskula.com';
$from = 'tracking@ivonskula.com';
 
 
$headers = "From: Kuva Email Tracker  <".$from.">\r\n";
$headers.= "Return-Path: " . $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
 
$send = mail( $to, $subject, $message, $headers );


//Full URI to the image
$graphic_http = 'blank.gif';

//Get the filesize of the image for headers
$filesize = filesize( 'blank.gif' );

//Now actually output the image requested (intentionally disregarding if the database was affected)
header( 'Pragma: public' );
header( 'Expires: 0' );
header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
header( 'Cache-Control: private', false );
header( 'Content-Disposition: attachment; filename="blank.gif"' );
header( 'Content-Transfer-Encoding: binary' );
header( 'Content-Length: '.$filesize );
readfile( $graphic_http );
exit;
