<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;

class ProductController extends Controller
{
    protected $productRepository;

    protected $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();

        return view('site.pages.product', compact('product', 'attributes'));
    }

    public function addToCart(Request $request)
    {

        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');
//        Cart::add(uniqid(), 'Shipping', config('settings.shipping'),1,$options);
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $request->input('productId'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
    
    public function search(Request $request){
        $query = $request->input('search');
        $products = Product::where('name','like',"%$query%")->paginate(16);
        return view('site.pages.search',compact('products','query'));
    }
}
