<?php

namespace App\Http\Controllers;

use App\Models\Font;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function FontThumbUpload(Request $request)
    {
        $file = $request->file('img');//获取上传文件信息

        $filename = md5(time().user()->id).'.'.$file->getClientOriginalExtension();

        Storage::disk('qiniu')->writeStream($filename,fopen($file->getRealPath(),'r'));

        $request->thumb_url  = 'http://'.config('filesystems.disks.qiniu.domain').'/'.$filename;

        return ['url'=>$request->thumb_url];
    }

    public function FontPreviewUpload(Request $request)
    {
        $file = $request->file('img');//获取上传文件信息

        $filename = md5(time().user()->id).'.'.$file->getClientOriginalExtension();

        Storage::disk('qiniu')->writeStream($filename,fopen($file->getRealPath(),'r'));

        $request->preview_url  = 'http://'.config('filesystems.disks.qiniu.domain').'/'.$filename;

        return ['url'=>$request->preview_url];
    }
}
