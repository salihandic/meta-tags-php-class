Here's a professional README.md for the MetaTags class:


# MetaTags PHP Library

A robust and extensible PHP library for generating HTML meta tags and structured data for SEO and social media optimization.

## Features

- Generates basic HTML meta tags
- Supports Open Graph protocol for Facebook and other platforms
- Creates Twitter Card meta tags
- Handles favicon and Apple Touch icons
- Generates JSON-LD breadcrumb structured data
- Includes security features like HTML escaping
- Provides validation for required fields
- Easily extensible for additional meta tag types

## Requirements

- PHP 7.4 or higher
- GD extension (for image size detection)

## Usage

Basic usage example:

```php
<?php
use Metadata\MetaTags;

$meta = new MetaTags([
    'title' => 'My Website',
    'description' => 'A description of my website',
    'keywords' => 'website, example, php',
    'image' => 'https://example.com/image.jpg',
    'link' => 'https://example.com',
    'canonical' => 'https://example.com',
    'appname' => 'My App',
    'creator' => 'johndoe',
    'applogo' => [
        's72' => 'https://example.com/logo-72.png',
        's144' => 'https://example.com/logo-144.png'
    ],
    'favicon' => 'https://example.com/favicon.png',
    'breadcrumbList' => [
        'Home' => 'https://example.com',
        'About' => 'https://example.com/about'
    ]
]);

echo $meta->render();
```

### Available Methods

- `render()`: Generates all meta tags
- `getBasicTags()`: Returns basic HTML meta tags
- `getOpenGraphTags()`: Returns Open Graph meta tags
- `getTwitterTags()`: Returns Twitter Card meta tags
- `getIcons()`: Returns favicon and touch icon tags
- `getBreadcrumb()`: Returns JSON-LD breadcrumb structured data

### Configuration Options

| Option          | Type   | Description                         | Required |
|-----------------|--------|-------------------------------------|----------|
| title           | string | Page title                         | Yes      |
| description     | string | Page description                   | No       |
| keywords        | string | Comma-separated keywords           | No       |
| image           | string | URL to main image                  | No       |
| link            | string | Page URL                           | No       |
| canonical       | string | Canonical URL                      | No       |
| appname         | string | Application/site name              | No       |
| creator         | string | Twitter handle (without @)         | No       |
| applogo         | array  | Array of icon sizes and URLs       | No       |
| favicon         | string | Favicon URL                        | No       |
| breadcrumbList  | array  | Array of breadcrumb name => URL    | No       |
| locale          | string | Locale code (default: 'en_US')     | No       |
| ogtype          | string | Open Graph type (default: 'website') | No     |
| robots          | string | Robots directive (default: 'index,follow') | No |
| viewport        | string | Viewport settings (default: 'width=device-width, initial-scale=1.0') | No |

## Example Output

```html
<title>My Website</title>
<link rel="canonical" href="https://example.com">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index,follow">
<meta name="description" content="A description of my website">
<meta name="keywords" content="website, example, php">
<meta property="og:site_name" content="My App">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<!-- ... more meta tags ... -->
```

## Extending the Library

To add custom meta tags:

1. Create a new method following the pattern of existing ones
2. Use the `generateMetaTags()` helper method
3. Add the new method call to `render()`

Example:

```php
public function getCustomTags(): string
{
    $tags = [
        'custom:tag' => $this->data->customValue
    ];
    return $this->generateMetaTags($tags);
}
```

## Security

- All output is escaped using `htmlspecialchars()` to prevent XSS
- Required fields are validated
- Invalid image URLs are gracefully handled

## Contributing

Contributions are welcome! Please:

1. Fork the repository
2. Create a feature branch
3. Submit a pull request with clear description of changes

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Credits

Developed by Salih Andıç.
