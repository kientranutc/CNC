<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
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
        return view('backend.banner.index');
   }

   public function createForm()
   {
       return view('backend.banner.create');
   }
}
