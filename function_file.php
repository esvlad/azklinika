<?
$json = array();
$uploaddir = '../../uploads/clinik_temp/';


function re_translit($s){
	$s = (string) $s;
	$s = strip_tags($s);
	$s = str_replace(array("\n", "\r"), " ", $s);
	$s = preg_replace("/\s+/", ' ', $s);
	$s = trim($s);
	$s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
	$s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	$s = preg_replace("/[^0-9a-z-_ .]/i", "", $s);
	$s = str_replace(" ", "-", $s);
		
	return $s;
}

foreach( $_FILES as $file ){
    if( move_uploaded_file( $file['tmp_name'], $uploaddir . basename(re_translit($file['name'])) ) ){
		$json['file'] = $_SERVER['HTTP_ORIGIN'] . '/wp-content/uploads/clinik_temp/' . re_translit($file['name']);
		$json['success'] = true;
	} else{
		$json['error'] = true;
	}
}

echo json_encode($json);
?>