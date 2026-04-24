<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        $sitemap .= '  <sitemap>' . "\n";
        $sitemap .= '    <loc>' . route('sitemap.pages') . '</loc>' . "\n";
        $sitemap .= '    <lastmod>' . now()->toAtomString() . '</lastmod>' . "\n";
        $sitemap .= '  </sitemap>' . "\n";
        
        $sitemap .= '  <sitemap>' . "\n";
        $sitemap .= '    <loc>' . route('sitemap.products') . '</loc>' . "\n";
        $sitemap .= '    <lastmod>' . now()->toAtomString() . '</lastmod>' . "\n";
        $sitemap .= '  </sitemap>' . "\n";
        
        $sitemap .= '</sitemapindex>';
        
        return Response::make($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function pages()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        $pages = [
            ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('products'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => route('testimonies'), 'priority' => '0.6', 'changefreq' => 'weekly'],
            ['loc' => route('sop'), 'priority' => '0.5', 'changefreq' => 'monthly'],
        ];
        
        foreach ($pages as $page) {
            $sitemap .= '  <url>' . "\n";
            $sitemap .= '    <loc>' . $page['loc'] . '</loc>' . "\n";
            $sitemap .= '    <lastmod>' . now()->toAtomString() . '</lastmod>' . "\n";
            $sitemap .= '    <changefreq>' . $page['changefreq'] . '</changefreq>' . "\n";
            $sitemap .= '    <priority>' . $page['priority'] . '</priority>' . "\n";
            $sitemap .= '  </url>' . "\n";
        }
        
        $types = Type::all();
        foreach ($types as $type) {
            $sitemap .= '  <url>' . "\n";
            $sitemap .= '    <loc>' . route('products', $type->singkatan) . '</loc>' . "\n";
            $sitemap .= '    <lastmod>' . $type->updated_at->toAtomString() . '</lastmod>' . "\n";
            $sitemap .= '    <changefreq>weekly</changefreq>' . "\n";
            $sitemap .= '    <priority>0.8</priority>' . "\n";
            $sitemap .= '  </url>' . "\n";
        }
        
        $sitemap .= '</urlset>';
        
        return Response::make($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function products()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
        
        $products = Product::with('toType')->get();
        
        foreach ($products as $product) {
            $sitemap .= '  <url>' . "\n";
            $sitemap .= '    <loc>' . route('products.detail', ['slug' => $product->toType->singkatan, 'id' => $product->id_product]) . '</loc>' . "\n";
            $sitemap .= '    <lastmod>' . $product->updated_at->toAtomString() . '</lastmod>' . "\n";
            $sitemap .= '    <changefreq>weekly</changefreq>' . "\n";
            $sitemap .= '    <priority>0.9</priority>' . "\n";
            
            if ($product->gambar) {
                $sitemap .= '    <image:image>' . "\n";
                $sitemap .= '      <image:loc>' . asset_upload('picture/' . $product->gambar) . '</image:loc>' . "\n";
                $sitemap .= '      <image:title>' . htmlspecialchars($product->judul) . '</image:title>' . "\n";
                $sitemap .= '    </image:image>' . "\n";
            }
            
            $sitemap .= '  </url>' . "\n";
        }
        
        $sitemap .= '</urlset>';
        
        return Response::make($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
