<?php
function getIPAddress() {
  //whether ip is from the share internet
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
$ip = $ipAddress = $_SERVER['REMOTE_ADDR'];
echo 'Client ip - ' . $ip;

// include database connection file
include_once("config.php");

// check ip exist
$getIpByip = mysqli_query($mysqli, "SELECT ip FROM users where ip='$ip'");
$getIpByip = $getIpByip->fetch_array(MYSQLI_ASSOC);
if (count($getIpByip) < 1) mysqli_query($mysqli, "INSERT INTO users(ip) VALUES('$ip')");
