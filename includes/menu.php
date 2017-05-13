

<?php 

require_once 'data/data_pages.php';

$pages = unserialize(preg_replace_callback('/(?<=^|\{|;)s:(\d+):\"(.*?)\";(?=[asbdiO]\:\d|N;|\}|$)/s',function($m) { 
return 's:' . strlen($m[2]) . ':"' . $m[2] . '";'; 
},$data_pages));

foreach ($pages as $page) {
	if ($page->visible) {
	echo "<li><a href=$page->url>$page->name</a></li>";
} 
} echo "<li><a href='?controller=register'>Регистрация</a></li>";
?>