# Meta Tags (PHP Class)



[Meta Tag](https://www.w3schools.com/tags/tag_meta.asp)'lar bir sitenin olmazsa olmazı. Meta tagın ne olduğunu bilmiyorsanız baştaki linke gidip ne olduğu ve nasıl kullanıldığını inceleyebilirsiniz. 

## Hangi Meta Tagları İçeriyor?

Başlık, açıklama, anahtar kelime başta olmak üzere [Facebook](https://facebook.com) ve [Twitter] meta karları barındırıyor. Bunların dışında favicon diğer ve mobil cihaz iconları da mevcut. Ayrıca [schema.org](https://schema.org/breadcrumb) Breadcrumb ❤ kodlarıda mevcut. Kısacası bir web sitesinde olması gereken tüm meta kodlarını içeriyor.


## Nasıl Kullanılır?
Meta taglar clas içinde gruplandırılmıştır. Örneğin Facebook genel meta tagları ve Facebook Article meta tagları olarak. Her gruplama için bir fonkisyon tanımlıdır. Grupları tek çağırabildiğiniz gibi tüm fonksiyonları tek seferde de çağırabilirsiniz. Yeterki gerekli alanrı doldurun.
---
#####Başlıyoruz;
İlk önce classı başlatıyoruz ve içini dolduruyoruz.
```go

$m = new METATAGS([
	"applogo" 		=> [
		"s72" 	=> "", // "s72" = Logo size 72x72
		"s76" 	=> "",
		"s114" 	=> "",
		"s120" 	=> "",
		"s144" 	=> "",
		"s152" 	=> "",
		"s180" 	=> "",
		"s192" 	=> ""
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


echo $m->all();

```
veya 
```go
echo $m->facebook();
```

```go
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
```

### NOT
İsteyen geliştirebilir yeni eklemeler yapabilir. Bu class web sitelerinde en çok kullanılan meta tagları içerdiği ve genele hitap ettiği için basit ve kolay anlaşılır şekilde hazırlandı. Yeni eklemelerle daha gelişmiş halini ekleyerek güncelleyeceğim. Unutmazsam tabi :)



