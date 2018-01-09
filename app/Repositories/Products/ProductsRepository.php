<?php
namespace App\Repositories\Products;
use App\Models\Products;
class ProductsRepository implements ProductsRepositoryInterface
{
    public function all()
    {
        return Products::all();
    }

    public function find($id)
    {
        return Products::find($id);
    }

    public function save($data)
    {
        $products = new Products();
        if (isset($data['name'])) {
            $products->name = $data['name'];
            $products->slug = str_slug($data['name'], '-');
        } else {
            $products->name = '';
            $products->slug = '';
        }
        if (isset($data['image'])) {
            $products->image = $data['image'];
        } else {
            $products->image = '';
        }
        if (isset($data['category_id'])) {
            $products->category_id = $data['category_id'];
        }
        if (isset($data['price'])) {
            $products->price = $data['price'];
        } else {
            $products->price = 0;
        }
        if (isset($data['sale'])) {
            $products->sale = $data['sale'];
        } else {
            $products->sale = 0;
        }
        if (isset($data['status'])) {
            $products->status = $data['status'];
        } else {
            $products->status = 1;
        }
        if (isset($data['description'])) {
            $products->description = $data['description'];
        } else {
            $products->description = '';
        }
        if (isset($data['product_detail'])) {
            $products->product_detail = $data['product_detail'];
        } else {
            $products->product_detail = '';
        }
        if (isset($data['tag'])) {
            $products->tag = $data['tag'];
        } else {
            $products->tag = '';
        }
        $products->save();
        return $products->id;
    }

    public function update($data, $id)
    {
        $products = Products::find($id);
        if ($products) {
            if (isset($data['name'])) {
                $products->name = $data['name'];
                $products->slug = str_slug($data['name'], '-');
            } else {
                $products->name = '';
                $products->slug = '';
            }
            if (isset($data['image'])) {
                $products->image = $data['image'];
            } else {
                $products->image = '';
            }
            if (isset($data['category_id'])) {
                $products->category_id = $data['category_id'];
            }
            if (isset($data['price'])) {
                $products->price = $data['price'];
            } else {
                $products->price = 0;
            }
            if (isset($data['sale'])) {
                $products->sale = $data['sale'];
            } else {
                $products->sale = 0;
            }
            if (isset($data['status'])) {
                $products->status = $data['status'];
            } else {
                $products->status = 1;
            }
            if (isset($data['description'])) {
                $products->description = $data['description'];
            } else {
                $products->description = '';
            }
            if (isset($data['product_detail'])) {
                $products->product_detail = $data['product_detail'];
            } else {
                $products->product_detail = '';
            }
            if (isset($data['viewed'])) {
                $products->viewed = $data['viewed'];
            } else {
                $products->viewed = 0;
            }
            if (isset($data['tag'])) {
                $products->tag = $data['tag'];
            } else {
                $products->tag = '';
            }
            return $products->save();
        } else {
            return false;
        }
    }

    public function findAttribute($att, $name)
    {
        return Products::where($att, $name)->first();
    }

    public function delete($id)
    {
        $products = Products::find($id);
        if ($products) {
            return $products->delete();
        } else {
            return false;
        }
    }

    public function searchAndListProduct($name, $category, $status, $limit)
    {
        $result = Products::select('products.*', 'categories.name as category_name')
                  ->join('categories', 'categories.id', '=', 'products.category_id');
        if (!$name != '') {
            $result->where('products.name', 'like', "%$name%");
        }
        if ($category != -1) {
            $result->where('products.category_id', $category);
        }
        if ($status != -1) {
            $result->where('products.status', $status);
        }
        return $result->orderBy('products.created_at', 'DESC')
                      ->orderBy('products.updated_at', 'DESC')
                      ->paginate($limit);
    }
}


?>