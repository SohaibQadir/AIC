<?php
$file = file_get_contents('http://www.islamicfinder.org/prayer_service.php?country=usa&city=los_angeles&state=CA&zipcode=&latitude=33.9733&longitude=-118.2487&timezone=-8&HanfiShafi=1&pmethod=5&fajrTwilight1=10&fajrTwilight2=10&ishaTwilight=10&ishaInterval=30&dhuhrInterval=1&maghribInterval=1&dayLight=1&simpleFormat=xml');

$Prayer = json_decode(json_encode((array)simplexml_load_string($file)),1);

echo "<table class=prayer-times border=0>";
echo "<tr><td colspan=2>".$Prayer['hijri'];

echo "<tr><td>Fajr <td>".date("g:i a", strtotime("$Prayer[fajr] am"));


$dhuhr = date("H", strtotime($Prayer['dhuhr']));

if($dhuhr=11) {
echo "<tr><td>Sunrise <td>".date("g:i a", strtotime("$Prayer[dhuhr] am"));	
}
if($dhuhr=12) {
echo "<tr><td>Dhuhr <td>".date("g:i a", strtotime("$Prayer[dhuhr] pm"));	
}

echo "<tr><td>Ashr <td>".date("g:i a", strtotime("$Prayer[asr] pm"));
echo "<tr><td>Maghrib <td>".date("g:i a", strtotime("$Prayer[maghrib] pm"));
echo "<tr><td>Isha <td>".date("g:i a", strtotime("$Prayer[isha] pm"));
echo "</table>";
?>