<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Repositories\Banner\BannerRepositoryInterface;
class BannerController extends Controller
{
   public function __construct(BannerRepositoryInterface $banner)
   {
        $this->banner = $banner;
   }
   public function index()
   {
       $dataBanner = $this->banner->all();
       $stt=0;
        return view('backend.banner.index', compact('stt','dataBanner'));
   }

   public function createForm()
   {
       return view('backend.banner.create');
   }

   public function  processCreateForm(Request $request)
   {
        $dataRequest = $request->only('field');
        for($i=0; $i<count($dataRequest['field']['image']);$i++) {
            $dataRequest['image'] = $dataRequest['field']['image'][$i];
            $dataRequest['url'] = $dataRequest['field']['url'][$i];
            $dataRequest['sort'] = $dataRequest['field']['sort'][$i];
            $this->banner->save($dataRequest);
         }
         return Redirect::route('banner.index')->withSuccess('Thêm mới banner thành công');
   }

   public function editForm($id)
   {
       $dataEdit = $this->banner->find($id);
        return view('backend.banner.update', compact('dataEdit'));
   }

   public function processEditForm(Request $request, $id)
   {
       $dataRequest = $request->except('_token');
       if ($this->banner->update($dataRequest, $id)) {
           return Redirect::route('banner.index')->withSuccess('Cập nhật banner thành công');
       } else {
           return Redirect::route('banner.index')->withErrors('Lỗi cập nhật banner');
       }
   }
   public function delete($id)
   {
       if ($this->banner->delete($id)) {
           return Redirect::route('banner.index')->withSuccess('Xóa banner thành công');
       } else {
           return Redirect::route('banner.index')->withErrors('Lỗi xóa banner');
       }
   }
}
