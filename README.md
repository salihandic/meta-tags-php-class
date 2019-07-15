# Meta Tags (PHP Class)

[Meta Tag](https://www.w3schools.com/tags/tag_meta.asp)'lar bir sitenin olmazsa olmazı. Meta tagın ne olduğunu bilmiyorsanız baştaki linke gidip ne olduğu ve nasıl kullanıldığını inceleyebilirsiniz. 

## Hangi Meta Tagları İçeriyor?

Başlık, açıklama, anahtar kelime başta olmak üzere [Facebook](https://developers.facebook.com/docs/sharing/webmasters/) ve [Twitter](https://developer.twitter.com/en/docs/tweets/optimize-with-cards/guides/getting-started.html) meta karları barındırıyor. Bunların dışında favicon diğer ve mobil cihaz iconları da mevcut. Ayrıca [schema.org](https://schema.org/breadcrumb) Breadcrumb ❤ kodlarıda mevcut. Kısacası bir web sitesinde olması gereken tüm meta kodlarını içeriyor.


### Nasıl Kullanılır?



```go
echo Meta:Twitter([
	"site" => "Başlık",
	"creator" => "@salihandic",
	"via" => "@salihandic",
	"card" => "summary_large_image",
	"url" => "https://twitter.com/salihandic",
	"description" => "",
	"image" => "",
	"image:width" => "640",
	"image:height" => "640",
	"image:alt" => "Salih Andıç",
	"domain" => "twitter.com"
]);
```
Çıktı;
```go

<meta name="twitter:site" content="@Google"/>
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

```

### NOT
İsteyen geliştirebilir yeni eklemeler yapabilir. Bu class web sitelerinde en çok kullanılan meta tagları içerdiği ve genele hitap ettiği için basit ve kolay anlaşılır şekilde hazırlandı. Yeni eklemelerle daha gelişmiş halini ekleyerek güncelleyeceğim. Unutmazsam tabi :)
