<?php
namespace App\Repositories\ProductImage;
use App\Models\ProductImage;
class ProductImageRepository implements ProductImageRepositoryInterface
{
    public function all()
    {
        return ProductImage::all();
    }

    public function find($id)
    {
        return ProductImage::find($id);
    }

    public function save($data)
    {
        $productImage = new ProductImage();
        if (isset($data['product_id'])) {
            $productImage->product_id = $data['product_id'];
        } else {
            $productImage->product_id = 0;
        }
        if (isset($data['image'])) {
            $productImage->image = $data['image'];
        } else {
            $productImage->image = '';
        }
        if (isset($data['sort'])) {
            $productImage->sort = $data['sort'];
        } else {
            $productImage->sort = 0;
        }
        $productImage->save();
    }

    public function update($data, $id)
    {
        $productImage = ProductImage::find($id);
            if (isset($data['product_id'])) {
                $productImage->product_id = $data['product_id'];
            } else {
                $productImage->product_id = 0;
            }
            if (isset($data['image'])) {
                $productImage->image = $data['image'];
            } else {
                $productImage->image = '';
            }
            if (isset($data['sort'])) {
                $productImage->sort = $data['sort'];
            } else {
                $productImage->sort = 0;
            }
            $productImage->save();

    }

    public function findAttribute($att, $name)
    {
        return ProductImage::where($att, $name)->get();
    }

    public function delete($id)
    {
        $productImage = ProductImage::where('product_id', $id)->get();
        if (count($productImage)>0) {
            foreach ( $productImage as $item) {
             $item->delete();
            }
            return true;
        } else {
            return false;
        }
    }

    public function deleteItem($id)
    {
        $productImage = ProductImage::find($id);
        if ($productImage) {
            return $productImage->delete();
        } else {
            return false;
        }
    }

}

?>