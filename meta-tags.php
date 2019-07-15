<?php 
/**
 * Class META TAGS
 *
 * @author Salih Andıç
 * @web http://www.salihandic.com/
 * @mail salihandic@outlook.com
 * @date 20 November 2018
 */

final class Meta {
	public static function Statik($locale_code){
		return '
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="robots" content="index,follow"/>
		<meta name="revisit-after" content="1 days"/>
		<meta name="referrer" content="origin-when-cross-origin"/>
		<meta name="locale" content="'.$locale_code.'">';
	}
	public static function Robot(){
		return '
		<meta name="robots" content="all"/>
		<meta name="googlebot" content="snippet"/>
		<meta name="googlebot" content="index, follow"/>
		<meta name="robots" content="index, follow"/>';
	}
	public static function Norobot(){
		return '
		<meta name="googlebot" content="noindex, nofollow"/>
		<meta name="robots" content="noindex, nofollow"/>';
	}
	public static function Title($title){
		return '
		<title>'.$title.'</title>';
	}
	public static function Description($desc){
		return '
		<meta itemprop="description" name="description" content="'.$desc.'"/>';
	}
	public static function Alternate($langList){
		$LL = "";
		if(count($langList) > 1):
			foreach ($langList as $lang):
				$LL .= '
				<link rel="alternate" hreflang="'.$lang["hreflang"].'" href="'.home("?lang=".$lang["code"]).'"/>';
			endforeach;
		else:
			$LL = '
			<link rel="alternate" hreflang="'.$lang["hreflang"].'" href="'.home("?lang=".$lang["code"]).'"/>';
		endif;
		return $LL;
	}
	public static function Facebook($fb){
		$fbh = "";
		if(is_array($fb)):
			foreach ($fb as $fbkey => $fbrow):
				$fbh .= '
				<meta property="og:'.$fbkey.'" content="'.$fbrow.'"/>';
			endforeach;
		endif;
		return $fbh;
	}
	public static function Twitter($tw){
		$twh = "";
		if(is_array($tw)):
			foreach ($tw as $twkey => $twrow):
				$twh .= '
				<meta name="twitter:'.$twkey.'" content="'.$twrow.'"/>';
			endforeach;
		endif;
		return $twh;
	}
	public static function Icon($icon){
		$iconh = "";
		if(is_array($icon)):
			foreach ($icon as $iconkey => $iconrow):
				$iconh .= '
				<meta name="'.$iconkey.'" href="'.$iconrow.'"/>';
			endforeach;
		endif;
		return $iconh;
	}
	public static function Author($author){
		return '
		<meta name="author" itemprop="author" content="'.$author.'"/>';
	}
	public static function Canonical($canonical){
		return '
		<link rel="canonical" itemprop="url" type="text/html" href="'.$canonical.'"/>';
	}
	public static function Manifest($manifest){
		return '<link rel="manifest" href="'.$manifest.'"/>';
	}
	public static function Google($google){
		return '
		<meta name="google-site-verification" content="'.$google.'"/>';
	}
	public static function Bing($bing){
		return '
		<meta name="msvalidate.01" content="'.$bing.'"/>';
	}
	public static function Yandex($yandex){
		return '
		<meta name="yandex-verification" content="'.$yandex.'"/>';
	}
	public static function Amp($amp){
		return '
		<meta rel="amphtml" content="'.$amp.'"/>';
	}
	public static function Breadcrumb($crumb){
		$h = '
		';
		$count = 0;
		$bcount = count($crumb);
		if(is_array($crumb)):
			$h .= '<script type="application/ld+json">{
				"@context": "http://schema.org",
				"@type": "BreadcrumbList",
				"itemListElement":[';
				foreach($crumb as $crumbrow):
					$count++;
					$h .= '
					{
						"@type": "ListItem",
						"position":"'.$crumbrow["position"].'",
						"item": {
							"@id":"'.$crumbrow["id"].'",
							"name": "'.$crumbrow["name"].'"
						}
					}';
					$h .= $count == $bcount ? '' : ',';
				endforeach;
				$h .= '
				]
			}</script>';
		endif;
		return $h;
	}
}




*/
?>
