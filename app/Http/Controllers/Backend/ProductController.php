<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductsRepositoryInterface;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use App\Support\Helper;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Http\Requests\CreateProductsRequest;
class ProductController extends Controller
{
    public function __construct(ProductsRepositoryInterface $products,
        ProductImageRepositoryInterface $productImage ,
        CategoryRepositoryInterface $categories
        )
    {
        $this->products = $products;
        $this->productImage = $productImage;
        $this->categories = $categories;
        View::share('helper', new Helper());
    }
    public function index(Request $request)
    {
        $name = $request->get('name', '');
        $category = $request->get('category_id', -1);
        $status = $request->get('status', -1);
        $limit =$request->get('limit', 10);
        $stt = ($request->get('page',1)-1)*$limit;
        $productAll = $this->products->searchAndListProduct($name, $category, $status, $limit);
        $categoryProducts = $this->categories->getCategoryProducts();
        return view('backend.products.index', compact('categoryProducts', 'stt', 'productAll'));
    }
    public function createForm()
    {
        $categoryproducts = $this->categories->getCategoryProducts();
        return view('backend.products.create', compact('categoryproducts'));
    }

    public function processCreateForm(CreateProductsRequest $request)
    {
        $productRequest = $request->only(['name', 'image', 'category_id','price', 'sale', 'tag', 'status', 'description', 'product_detail']);
        $productRequest['price']=join('',explode(',',$productRequest['price']));
        $productId = $this->products->save($productRequest);
        $productImageRequest = $request->only(['field']);
        for ($i=0; $i<count($productImageRequest['field']['image']);$i++) {
            $productImageRequest['product_id'] = $productId;
            $productImageRequest['image'] = $productImageRequest['field']['image'][$i];
            $productImageRequest['sort'] = $productImageRequest['field']['sort'][$i];
            $this->productImage->save($productImageRequest);
        }
        return Redirect::route('products.index')->withSuccess('Thêm sản phẩm thành công.');
    }

    public function editForm($id)
    {
        $categoryproducts = $this->categories->getCategoryProducts();
        $editProduct = $this->products->find($id);
        $listImageForProduct = $this->productImage->findAttribute('product_id', $id);
        return view('backend.products.update', compact('editProduct', 'listImageForProduct'));
    }
    public function delete($id)
    {
        if  ($this->products->delete($id)) {
             if ($this->productImage->delete($id)) {
                 return Redirect::route('products.index')->withSuccess('Xóa sản phẩm thành công.');
             } else {
                 return Redirect::route('products.index')->withSuccess('Lỗi xóa ảnh sản phẩm');
            }
        } else {
            return Redirect::route('products.index')->withSuccess('Lỗi xóa sản phẩm.');
        }
    }
}
