<?php

if (!function_exists('seo_meta')) {
    function seo_meta($data = [])
    {
        $defaults = [
            'title' => config('app.name'),
            'description' => 'CodePoze - Solusi Digital Terpercaya untuk Aplikasi Web, Mobile, dan Desktop. Dapatkan source code berkualitas dengan harga terjangkau.',
            'keywords' => 'codepoze, web development, mobile app, source code, aplikasi web, aplikasi mobile, aplikasi desktop, laravel, flutter',
            'image' => asset_pages('images/codepoze.png'),
            'url' => url()->current(),
            'type' => 'website',
            'author' => config('app.name'),
            'robots' => 'index, follow',
            'canonical' => url()->current(),
        ];

        return array_merge($defaults, $data);
    }
}

if (!function_exists('generate_meta_tags')) {
    function generate_meta_tags($seo)
    {
        $html = '';
        
        $html .= '<meta name="description" content="' . e($seo['description']) . '">' . "\n    ";
        $html .= '<meta name="keywords" content="' . e($seo['keywords']) . '">' . "\n    ";
        $html .= '<meta name="author" content="' . e($seo['author']) . '">' . "\n    ";
        $html .= '<meta name="robots" content="' . e($seo['robots']) . '">' . "\n    ";
        
        $html .= '<link rel="canonical" href="' . e($seo['canonical']) . '">' . "\n    ";
        
        $html .= '<meta property="og:title" content="' . e($seo['title']) . ' | ' . e(config('app.name')) . '">' . "\n    ";
        $html .= '<meta property="og:description" content="' . e($seo['description']) . '">' . "\n    ";
        $html .= '<meta property="og:image" content="' . e($seo['image']) . '">' . "\n    ";
        $html .= '<meta property="og:url" content="' . e($seo['url']) . '">' . "\n    ";
        $html .= '<meta property="og:type" content="' . e($seo['type']) . '">' . "\n    ";
        $html .= '<meta property="og:site_name" content="' . e(config('app.name')) . '">' . "\n    ";
        $html .= '<meta property="og:locale" content="' . (session()->has('locale') ? session()->get('locale') : 'en') . '_' . strtoupper(session()->has('locale') ? session()->get('locale') : 'en') . '">' . "\n    ";
        
        $html .= '<meta name="twitter:card" content="summary_large_image">' . "\n    ";
        $html .= '<meta name="twitter:title" content="' . e($seo['title']) . ' | ' . e(config('app.name')) . '">' . "\n    ";
        $html .= '<meta name="twitter:description" content="' . e($seo['description']) . '">' . "\n    ";
        $html .= '<meta name="twitter:image" content="' . e($seo['image']) . '">' . "\n    ";
        
        return $html;
    }
}

if (!function_exists('generate_hreflang_tags')) {
    function generate_hreflang_tags()
    {
        $currentUrl = url()->current();
        $html = '';
        
        $html .= '<link rel="alternate" hreflang="id" href="' . e($currentUrl) . '">' . "\n    ";
        $html .= '<link rel="alternate" hreflang="en" href="' . e($currentUrl) . '">' . "\n    ";
        $html .= '<link rel="alternate" hreflang="x-default" href="' . e($currentUrl) . '">' . "\n    ";
        
        return $html;
    }
}

if (!function_exists('generate_breadcrumb_schema')) {
    function generate_breadcrumb_schema($items)
    {
        $itemListElement = [];
        
        foreach ($items as $index => $item) {
            $itemListElement[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'] ?? null
            ];
        }
        
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemListElement
        ];
        
        return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
    }
}

if (!function_exists('generate_product_schema')) {
    function generate_product_schema($product)
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->judul,
            'description' => strip_tags($product->deskripsi),
            'image' => asset_upload('picture/' . $product->gambar),
            'brand' => [
                '@type' => 'Brand',
                'name' => config('app.name')
            ]
        ];
        
        if (isset($product->toPrice)) {
            $price = $product->toPrice->diskon === 'y' 
                ? $product->toPrice->nilai_diskon 
                : $product->toPrice->nilai_normal;
            
            $schema['offers'] = [
                '@type' => 'Offer',
                'url' => url()->current(),
                'priceCurrency' => 'IDR',
                'price' => $price,
                'availability' => 'https://schema.org/InStock',
                'seller' => [
                    '@type' => 'Organization',
                    'name' => config('app.name')
                ]
            ];
        }
        
        return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
    }
}

if (!function_exists('generate_organization_schema')) {
    function generate_organization_schema()
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => config('app.name'),
            'url' => config('app.url'),
            'logo' => asset_pages('images/codepoze.png'),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+62-852-4290-7595',
                'contactType' => 'customer service',
                'availableLanguage' => ['id', 'en']
            ],
            'sameAs' => []
        ];
        
        return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
    }
}

if (!function_exists('generate_website_schema')) {
    function generate_website_schema()
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => config('app.name'),
            'url' => config('app.url'),
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => config('app.url') . '/products?q={search_term_string}'
                ],
                'query-input' => 'required name=search_term_string'
            ]
        ];
        
        return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
    }
}
