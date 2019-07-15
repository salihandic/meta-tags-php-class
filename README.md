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

<meta name="twitter:title" content="Başlık"/>
<meta name="twitter:site" content="@salihandic"/>
<meta name="twitter:creator" content="@salihandic" />
<meta name="twitter:via" content="salihandic" />
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:url" content="https://www.twitter.com"/>
<meta name="twitter:description" content=""/>
<meta name="twitter:image" content=""/>
<meta name="twitter:image:width" content="640"/>
<meta name="twitter:image:height" content="640"/>
<meta name="twitter:image:alt" content="Salih Andıç" />
<meta name="twitter:domain" content="twitter.com" />

```

### NOT
İsteyen geliştirebilir yeni eklemeler yapabilir. Bu class web sitelerinde en çok kullanılan meta tagları içerdiği ve genele hitap ettiği için basit ve kolay anlaşılır şekilde hazırlandı. Yeni eklemelerle daha gelişmiş halini ekleyerek güncelleyeceğim. Unutmazsam tabi :)
