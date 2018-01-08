<?php
namespace  App\Repositories\Banner;
use App\Models\Banner;
class BannerRepository implements  BannerRepositoryInterface
{
    public function all()
    {
        return Banner::orderBy('banner.created_at','DESC')
                            ->orderBy('banner.updated_at', 'DESC')
                            ->get();
    }

    public function find($id)
    {
        return Banner::find($id);
    }

    public function save($data)
    {
        $banner = new Banner();
        if (isset($data['image'])) {
            $banner->image = $data['image'];
        } else {
            $banner->image = '';
        }
        if (isset($data['url'])) {
            $banner->url = $data['url'];
        } else {
            $banner->url = '';
        }
        if (isset($data['sort'])) {
            $banner->sort = $data['sort'];
        } else {
            $banner->sort = 0;
        }
        if (isset($data['status'])) {
            $banner->status = $data['status'];
        } else {
            $banner->status = 1;
        }
        $banner->save();
    }

    public function update($data, $id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            if (isset($data['image'])) {
                $banner->image = $data['image'];
            } else {
                $banner->image = '';
            }
            if (isset($data['url'])) {
                $banner->url = $data['url'];
            } else {
                $banner->url = '';
            }
            if (isset($data['sort'])) {
                $banner->sort = $data['sort'];
            } else {
                $banner->sort = 0;
            }
            if (isset($data['status'])) {
                $banner->status = $data['status'];
            } else {
                $banner->status = 1;
            }
            return $banner->save();
        } else {
            return false;
        }
    }

    public function findAttribute($att, $name)
    {
        return Banner::where($att, $name)->first();
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            return $banner->delete();
        } else {
            return false;
        }
    }
}

?>