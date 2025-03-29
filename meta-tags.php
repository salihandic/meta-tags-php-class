<?php

namespace Metadata;

use InvalidArgumentException;

/**
 * Class MetaTags
 * A professional metadata generator for HTML meta tags and structured data
 */
class MetaTags
{
    private const DEFAULT_ROBOTS = 'index,follow';
    private const DEFAULT_VIEWPORT = 'width=device-width, initial-scale=1.0';
    
    /** @var object */
    private $data;
    
    /** @var array|null */
    private $imageSize;

    /**
     * MetaTags constructor
     *
     * @param array $data Configuration array
     * @throws InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        $this->data = (object) array_merge($this->getDefaultValues(), $data);
        $this->validateRequiredFields();
        $this->imageSize = $this->data->image ? @getimagesize($this->data->image) : null;
    }

    /**
     * Get default values for meta tags
     *
     * @return array
     */
    private function getDefaultValues(): array
    {
        return [
            'appname' => '',
            'title' => '',
            'description' => '',
            'keywords' => '',
            'image' => '',
            'link' => '',
            'canonical' => '',
            'locale' => 'en_US',
            'ogtype' => 'website',
            'robots' => self::DEFAULT_ROBOTS,
            'viewport' => self::DEFAULT_VIEWPORT,
            'applogo' => [],
            'favicon' => '',
            'creator' => '',
            'breadcrumb' => []
        ];
    }

    /**
     * Validate required fields
     *
     * @throws InvalidArgumentException
     */
    private function validateRequiredFields(): void
    {
        if (empty($this->data->title)) {
            throw new InvalidArgumentException('Title is required');
        }
    }

    /**
     * Generate basic meta tags
     *
     * @return string
     */
    public function getBasicTags(): string
    {
        return implode(PHP_EOL, array_filter([
            '<meta charset="UTF-8">',
            '<meta http-equiv="X-UA-Compatible" content="IE=edge">',
            "<meta name=\"viewport\" content=\"{$this->data->viewport}\">",
            "<meta name=\"robots\" content=\"{$this->data->robots}\">",
            $this->data->description ? "<meta name=\"description\" content=\"{$this->escape($this->data->description)}\">" : '',
            $this->data->keywords ? "<meta name=\"keywords\" content=\"{$this->escape($this->data->keywords)}\">" : ''
        ]));
    }

    /**
     * Generate Open Graph meta tags
     *
     * @return string
     */
    public function getOpenGraphTags(): string
    {
        $tags = [
            "og:site_name" => $this->data->appname,
            "og:locale" => $this->data->locale,
            "og:type" => $this->data->ogtype,
            "og:title" => $this->data->title,
            "og:description" => $this->data->description,
            "og:url" => $this->data->link
        ];

        if ($this->data->image) {
            $tags["og:image"] = $this->data->image;
            $tags["og:image:secure_url"] = $this->data->image;
            if ($this->imageSize) {
                $tags["og:image:type"] = $this->imageSize['mime'];
                $tags["og:image:width"] = $this->imageSize[0];
                $tags["og:image:height"] = $this->imageSize[1];
            }
            $tags["og:image:alt"] = $this->data->title;
        }

        return $this->generateMetaTags($tags, 'property');
    }

    /**
     * Generate Twitter Card meta tags
     *
     * @return string
     */
    public function getTwitterTags(): string
    {
        $tags = [
            "twitter:card" => "summary_large_image",
            "twitter:site" => "@{$this->data->creator}",
            "twitter:creator" => "@{$this->data->creator}",
            "twitter:title" => $this->data->title,
            "twitter:description" => $this->data->description,
            "twitter:url" => $this->data->link
        ];

        if ($this->data->image) {
            $tags["twitter:image"] = $this->data->image;
            if ($this->imageSize) {
                $tags["twitter:image:width"] = $this->imageSize[0];
                $tags["twitter:image:height"] = $this->imageSize[1];
            }
            $tags["twitter:image:alt"] = $this->data->title;
        }

        return $this->generateMetaTags($tags);
    }

    /**
     * Generate favicon and apple touch icons
     *
     * @return string
     */
    public function getIcons(): string
    {
        $output = [];
        
        if (!empty($this->data->applogo)) {
            foreach ($this->data->applogo as $size => $url) {
                $numericSize = (int) str_replace('s', '', $size);
                $output[] = "<link rel=\"apple-touch-icon\" sizes=\"{$numericSize}x{$numericSize}\" href=\"{$url}\">";
                if ($numericSize === 72 || $numericSize === 144) {
                    $output[] = "<link rel=\"apple-touch-icon-precomposed\" sizes=\"{$numericSize}x{$numericSize}\" href=\"{$url}\">";
                }
            }
        }

        if ($this->data->favicon) {
            $output[] = "<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"{$this->data->favicon}\">";
        }

        return implode(PHP_EOL, $output);
    }

    /**
     * Generate breadcrumb structured data
     *
     * @return string
     */
    public function getBreadcrumb(): string
    {
        if (empty($this->data->breadcrumb)) {
            return '';
        }

        $items = [];
        $position = 1;
        
        foreach ($this->data->breadcrumb as $name => $url) {
            $items[] = sprintf(
                '{"@type":"ListItem","position":%d,"item":{"@id":"%s","name":"%s"}}',
                $position++,
                $this->escape($url),
                $this->escape($name)
            );
        }

        return sprintf(
            '<script type="application/ld+json">{"@context":"http://schema.org","@type":"breadcrumb","itemListElement":[%s]}</script>',
            implode(',', $items)
        );
    }

    /**
     * Generate all meta tags
     *
     * @return string
     */
    public function render(): string
    {
        return implode(PHP_EOL, array_filter([
            "<title>{$this->escape($this->data->title)}</title>",
            $this->data->canonical ? "<link rel=\"canonical\" href=\"{$this->data->canonical}\">" : '',
            $this->getBasicTags(),
            $this->getOpenGraphTags(),
            $this->getTwitterTags(),
            $this->getIcons(),
            $this->getBreadcrumb()
        ]));
    }

    /**
     * Generate meta tags from array
     *
     * @param array $tags
     * @param string $attribute
     * @return string
     */
    private function generateMetaTags(array $tags, string $attribute = 'name'): string
    {
        $output = [];
        foreach ($tags as $key => $value) {
            if ($value !== '' && $value !== null) {
                $output[] = "<meta {$attribute}=\"{$key}\" content=\"{$this->escape($value)}\">";
            }
        }
        return implode(PHP_EOL, $output);
    }

    /**
     * Escape HTML special characters
     *
     * @param string $value
     * @return string
     */
    private function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}

// Usage example:
$meta = new MetaTags([
    'title' => 'Google',
    'description' => 'Google Search',
    'keywords' => 'Google, Search',
    'image' => 'https://peakon.com/wp-content/uploads/2018/06/google-company-culture-5-1120x575.jpg',
    'link' => 'https://www.google.com',
    'canonical' => 'https://www.google.com',
    'appname' => 'Google',
    'creator' => 'Google',
    'applogo' => [
        's72' => 'https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png',
        's144' => 'https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png'
    ],
    'favicon' => 'https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png',
    'breadcrumb' => [
        'Google' => 'https://www.google.com',
        'About' => 'https://www.google.com/about'
    ]
]);

echo $meta->render();
