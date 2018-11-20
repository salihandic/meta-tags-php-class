<?php 
/**
 * Class META TAGS
 *
 * @author Salih Andıç
 * @web http://www.salihandic.com/
 * @mail salihandic@outlook.com
 * @date 20 November 2018
 */
class METATAGS{
	public function __construct($val =[]){
		$this->val  = json_decode(json_encode($val, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
		$this->size = @getimagesize($this->val->image);
		return $this; 
	}
	static function statik(){
		return '
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="robots" content="index,follow"/>
		<meta name="revisit-after" content="1 days"/>
		<meta name="referrer" content="origin-when-cross-origin"/>';
	}
	public function robot(){
		return '
		<meta name="robots" content="all"/>
		<meta name="googlebot" content="snippet"/>
		<meta name="googlebot" content="index, follow"/>
		<meta name="robots" content="index, follow"/>';
	}
	public function facebook(){
		return '
		<meta property="og:site_name" content="'.$this->val->appname.'" />
		<meta property="og:locale" content="'.$this->val->locale.'" />
		<meta property="og:type" content="'.$this->val->ogtype.'" />
		<meta property="og:title" content="'.$this->val->title.'"/>
		<meta property="og:description" content="'.$this->val->description.'"/>
		<meta property="og:url" content="'.$this->val->link.'"/>
		<meta property="og:image" content="'.$this->val->image.'"/>
		<meta property="og:image:secure_url" content="'.$this->val->image.'" />
		<meta property="og:image:type" content="'.$this->size['mime'].'" />
		<meta property="og:image:width" content="'.$this->size[0].'" />
		<meta property="og:image:height" content="'.$this->size[1].'" />
		<meta property="og:image:alt" content="'.$this->val->title.'" />';
	}
	public function fbProfile(){
		return '
		<meta property="profile:first_name" content="'.$this->val->pfname.'" />
		<meta property="profile:last_name" content="'.$this->val->plname.'" />
		<meta property="profile:username" content="'.$this->val->pusername.'" />
		<meta property="profile:gender" content="'.$this->val->pgender.'" />';
	}
	public function fbArticle(){
		return '
		<meta property="article:section" content="'.$this->val->description.'" />
		<meta property="article:published_time" content="'.date(DATE_ISO8601, strtotime($this->val->pubdate)).'" />
		<meta property="article:modified_time" content="'.date(DATE_ISO8601, strtotime($this->val->modifead)).'" />
		<meta property="og:updated_time" content="'.date(DATE_ISO8601, strtotime($this->val->update)).'" />';
	}
	public function icon(){
		$static ='';
		if (is_object($this->val->applogo)) {
			$count = count($this->val->applogo);
			$co = 0;
			foreach ($this->val->applogo as $size => $logo) {
				$s = str_replace('s', '', $size);
				if($co == 1)
					$static .= '
		<link rel="shortcut icon" type="image/x-icon" href="'.$logo.'"/>
		<meta name="msapplication-TileImage" content="'.$logo.'" />';
				elseif($s == 72)
					$static .= '
		<link rel="apple-touch-icon-precomposed" sizes="'.$s.'x'.$s.'" href="'.$logo.'">';
				elseif($s == 144)
					$static .= '
		<link rel="apple-touch-icon-precomposed" sizes="'.$s.'x'.$s.'" href="'.$logo.'">';
				$static .= '
		<link rel="apple-touch-icon" sizes="'.$s.'x'.$s.'" href="'.$logo.'"/>';
				$co++;
			}
		}
		$static .= '
		<link rel="favicon" sizes="32x32" type="image/png" href="'.$this->val->favicon.'"/>';
		return $static;
	}
	public function norobot(){
		return '
		<meta name="googlebot" content="noindex, nofollow"/>
		<meta name="robots" content="noindex, nofollow"/>';
	}
	public function title(){
		return '
		<title itemprop="headline">'.$this->val->title.'</title>';
	}
	public function desc(){
		return '
		<meta itemprop="description" name="description" content="'.$this->val->description.'"/>';
	}
	public function keywords(){
		return '<meta name="keywords" content="'.$this->val->keyword.'">';
	}
	public function author(){
		return '
		<meta name="author" itemprop="author" content="'.$this->val->author.'"/>';
	}
	public function canonical(){
		return '
		<link rel="canonical" itemprop="url" type="text/html" href="'.$this->val->canonical.'"/>';
	}
	public function manifest(){
		return '<link rel="manifest" href="'.$this->val->manifest.'"/>';
	}
	public function twitter(){
		return '
		<meta name="twitter:site" rel="me" content="@'.$this->val->creator.'"/>
		<meta name="twitter:creator" itemprop="creator" content="@'.$this->val->creator.'" />
		<meta name="twitter:via" content="'.$this->val->creator.'" />
		<meta name="twitter:card" content="summary_large_image"/>
		<meta name="twitter:url" itemprop:url="url" content="'.$this->val->link.'"/>
		<meta name="twitter:description" itemprop="description" content="'.$this->val->description.'"/>
		<meta name="twitter:image" content="'.$this->val->image.'"/>
		<meta name="twitter:image:width" content="'.$this->size[0].'"/>
		<meta name="twitter:image:height" content="'.$this->size[1].'"/>
		<meta name="twitter:image:alt" content="'.$this->val->title.'" />
		<meta name="twitter:domain" content="'.$this->val->link.'" />';
	}
	public function siteVerfiy(){
		return '
		<meta name="google-site-verification" content="'.$this->val->google_verify.'"/>
		<meta name="msvalidate" content="'.$this->val->bing_verify.'"/>
		<meta name="yandex-verification" content="'.$this->val->yandex_verify.'"/>';
	}
	public function amp(){
		return '
		<meta rel="amphtml" content="'.$this->val->amp.'"/>';
	}
	public function breadcrumb(){
		$count = 0;
		$bcount = count(json_decode(json_encode($this->val->breadcrumbList), true));
		$bread = '
		<script type="application/ld+json">{
			"@context": "http://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement":[';
			foreach ($this->val->breadcrumbList as $name => $val) {
				$count++;
				$bread .= '{
					"@type": "ListItem",
					"position": '.$count.',';
					$bread .= '"item":{
						"@id": "'.$val.'",';
						$bread .= '"name": "'.$name.'"
					}
				}';
				if ($count == $bcount ) 
					$bread .= '';
				else
					$bread .= ',';
			}
			$bread .= '
			]
		}</script>';
		return $bread;
	}
	public function all(){
		$meta .=	$this->statik();
		$meta .=	$this->robot();
		$meta .=	$this->title();
		$meta .=	$this->desc();
		$meta .=	$this->keywords();
		$meta .=	$this->author();
		$meta .=	$this->facebook();
		$meta .=	$this->twitter();
		$meta .=	$this->fbProfile();
		$meta .=	$this->fbArticle();
		$meta .=	$this->siteVerfiy();
		$meta .=	$this->manifest();
		$meta .=	$this->canonical();
		$meta .=	$this->amp();
		$meta .=	$this->icon();
		$meta .=	$this->breadcrumb();
		return $meta;
	}
}
// Kullanımı / Use of
/**
$m = new METATAGS([
	"applogo" 		=> [
		"s72" 	=> "Logo", // "s72" = Logo size 72x72
		"s76" 	=> "Logo",
		"s114" 	=> "Logo",
		"s120" 	=> "Logo",
		"s144" 	=> "Logo",
		"s152" 	=> "Logo",
		"s180" 	=> "Logo",
		"s192" 	=> "Logo"
	],
	"favicon" 		=> "",		//	Site favicon
	"appname" 		=> "", 		// Site Name (App Name)
	"title" 		=> "",		//	Site Title
	"description" 	=> "",		//Site Description
	"keyword" 		=> "",		// Keywords
	"image" 		=> "",		// İmage - og:image, twitter:image
	"link" 			=> "",		// Page Link
	"canonical" 	=> "",		// Canonical Link
	"amp" 			=> "",		// Accelerated Mobile Pages (AMP)
	"ogtype" 		=> "",		// Facebook og:type
	"locale" 		=> "",		// Facebook Locale (Lang code and Country Code) eg: en_GB
	"pfname" 		=> "",		// Facebook profile first name
	"plname" 		=> "",		// Facebook profile last name
	"pusername" 	=> "",		// Facebook profile username
	"pgender" 		=> "",		// Gender
	"pubdate" 		=> "",		// Publish (Date)
	"update" 		=> "",		// Update
	"modifead"		=> "",		// Modified (Date)
	"author"		=> "",		// Author Name
	"manifest"		=> "", 		// Manifest.json (link)
	"creator"		=> "",		// Twitter creator name
	"breadcrumbList"=> [		
		"Site Name" => "https://www.sitename.com",
		"About" 	=> "https://www.sitename.com/about"
	]
]);
*/
/**
	## All
 	echo $m->all();
 	## Facebook Open Graph
 	echo $m->facebook();
*/
/* Breadcrumb List Eg:
"breadcrumbList" => [
	"Site Name" => "https://www.sitename.com",
	"About"	=> "https://www.sitename.com/about"
]
<== Output ==>
<script type="application/ld+json">{
	"@context": "http://schema.org",
	"@type": "BreadcrumbList",
	"itemListElement":[{
			"@type": "ListItem",
			"position": 1,"item":{
				"@id": "https://www.sitename.com","name": "Site Name"
			}
		},{
			"@type": "ListItem",
			"position": 2,"item":{
				"@id": "https://www.sitename.com/about","name": "About"
			}
		}
	]
}</script>
*/
// Example 
$m = new METATAGS([
	"applogo" 		=> [
		"s72" 	=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png",
		"s76" 	=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png",
		"s114" 	=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png",
		"s120" 	=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png",
		"s144" 	=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png",
		"s152" 	=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png",
		"s180" 	=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png",
		"s192" 	=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"
	],
	"favicon" 		=> "https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png",
	"appname" 		=> "Google",
	"title" 		=> "Google",
	"description" 	=> "Google Search",
	"keyword" 		=> "Google, Search",
	"image" 		=> "https://peakon.com/wp-content/uploads/2018/06/google-company-culture-5-1120x575.jpg",
	"link" 			=> "https://www.google.com",
	"canonical" 	=> "https://www.google.com",
	"amp" 			=> "https://www.google.com/amp",
	"ogtype" 		=> "website",
	"locale" 		=> "en_US",
	"pfname" 		=> "Google",
	"plname" 		=> "Search",
	"pusername" 	=> "Google",
	"pgender" 		=> "Other",
	"pubdate" 		=> "2018-10-17 17:05:54",
	"update" 		=> "2018-10-20 12:40:23",
	"modifead"		=> "2018-10-20 12:40:23",
	"author"		=> "Google",
	"manifest"		=> "https://www.google.com/manifest.json",
	"creator"		=> "Google",
	"breadcrumbList"=> [		
		"Google" => "https://www.google.com",
		"About" 	=> "https://www.google.com/about"
	]
]);
echo $m->all();
/** OUTPUT
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="robots" content="index,follow"/>
<meta name="revisit-after" content="1 days"/>
<meta name="referrer" content="origin-when-cross-origin"/>
<meta name="robots" content="all"/>
<meta name="googlebot" content="snippet"/>
<meta name="googlebot" content="index, follow"/>
<meta name="robots" content="index, follow"/>
<title itemprop="headline">Google</title>
<meta itemprop="description" name="description" content="Google Search"/><meta name="keywords" content="Google, Search">
<meta name="author" itemprop="author" content="Google"/>
<meta property="og:site_name" content="Google" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Google"/>
<meta property="og:description" content="Google Search"/>
<meta property="og:url" content="https://www.google.com"/>
<meta property="og:image" content="https://peakon.com/wp-content/uploads/2018/06/google-company-culture-5-1120x575.jpg"/>
<meta property="og:image:secure_url" content="https://peakon.com/wp-content/uploads/2018/06/google-company-culture-5-1120x575.jpg" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="1120" />
<meta property="og:image:height" content="575" />
<meta property="og:image:alt" content="Google" />
<meta name="twitter:site" rel="me" content="@Google"/>
<meta name="twitter:creator" itemprop="creator" content="@Google" />
<meta name="twitter:via" content="Google" />
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:url" itemprop:url="url" content="https://www.google.com"/>
<meta name="twitter:description" itemprop="description" content="Google Search"/>
<meta name="twitter:image" content="https://peakon.com/wp-content/uploads/2018/06/google-company-culture-5-1120x575.jpg"/>
<meta name="twitter:image:width" content="1120"/>
<meta name="twitter:image:height" content="575"/>
<meta name="twitter:image:alt" content="Google" />
<meta name="twitter:domain" content="https://www.google.com" />
<meta property="profile:first_name" content="Google" />
<meta property="profile:last_name" content="Search" />
<meta property="profile:username" content="Google" />
<meta property="profile:gender" content="Other" />
<meta property="article:section" content="Google Search" />
<meta property="article:published_time" content="2018-10-17T17:05:54+0000" />
<meta property="article:modified_time" content="2018-10-20T12:40:23+0000" />
<meta property="og:updated_time" content="2018-10-20T12:40:23+0000" />
<meta name="google-site-verification" content=""/>
<meta name="msvalidate" content=""/>
<meta name="yandex-verification" content=""/><link rel="manifest" href="https://www.google.com/manifest.json"/>
<link rel="canonical" itemprop="url" type="text/html" href="https://www.google.com"/>
<meta rel="amphtml" content="https://www.google.com/amp"/>
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png">
<link rel="apple-touch-icon" sizes="72x72" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<link rel="shortcut icon" type="image/x-icon" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<meta name="msapplication-TileImage" content="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png" />
<link rel="apple-touch-icon" sizes="76x76" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<link rel="apple-touch-icon" sizes="120x120" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png">
<link rel="apple-touch-icon" sizes="144x144" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<link rel="apple-touch-icon" sizes="152x152" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<link rel="apple-touch-icon" sizes="192x192" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<link rel="favicon" sizes="32x32" type="image/png" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png"/>
<script type="application/ld+json">{
	"@context": "http://schema.org",
	"@type": "BreadcrumbList",
	"itemListElement":[{
			"@type": "ListItem",
			"position": 1,"item":{
				"@id": "https://www.google.com","name": "Google"
			}
		},{
			"@type": "ListItem",
			"position": 2,"item":{
				"@id": "https://www.google.com/about","name": "About"
			}
		}
	]
}</script>
*/
?>
