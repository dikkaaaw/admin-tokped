<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->search ? $request->search : '',
        ];
        $products = new Product;

        $data['view_products'] = $products->filter($filters)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin.products.product', $data);
    }

    public function add()
    {
        return view('admin.products.add');
    }

    public function proccessadd(Request $request)
    {
        $rule = [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $message = [
            'required' => 'This field is required',
            'image' => 'This field must be an image',
            'mimes' => 'This field must be a jpeg, png, jpg, gif, or svg',
            'max' => 'This field must be less than 2MB',
        ];
        $this->validate($request, $rule, $message);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'stock' => $request->stock,
            'image' => $request->file('image')->store('/assets/img/buah', 'public'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        Product::create($data);

        return redirect('admin/product');
    }

    public function edit(Product $product)
    {
        $data['product'] = $product;
        return view('admin.products.edit', $data);
    }

    public function proccessedit(Request $request, Product $product)
    {
        $rule = [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $message = [
            'required' => 'This field is required',
            'image' => 'This field must be an image',
            'mimes' => 'This field must be a jpeg, png, jpg, gif, or svg',
            'max' => 'This field must be less than 2MB',
        ];
        $this->validate($request, $rule, $message);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->stock = $request->stock;
        if ($request->file('image')) {
            $product->image = $request->file('image')->store('/assets/img/buah', 'public');
        }
        $product->updated_at = date('Y-m-d H:i:s');
        $product->save();

        return redirect('admin/product');
    }

    public function delete(Product $product)
    {
        $product->delete();

        return redirect('admin/product');
    }
}
