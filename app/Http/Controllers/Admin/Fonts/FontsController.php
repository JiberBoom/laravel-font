<?php

namespace App\Http\Controllers\Admin\Fonts;

use App\Http\Requests\Admin\FontRequest;
use App\Models\Font;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class FontsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Font::orderBy('id','desc')

            ->select('fonts.*','b.code')

            ->leftJoin('languages as b','fonts.language_id','=','b.id')

            ->paginate(10);//分页显示

        return view('admin.fonts.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fonts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FontRequest $request)
    {
        //获取表单信息
        $post_data = $request->all();


        //文件上传
        $file = $request->file('font_url');

        //检验一下上传的文件是否有效.
        if($file -> isValid()){


            $clientName = $file -> getClientOriginalName();

            $extension = $file -> getClientOriginalExtension();

            $newName = md5(date('ymdhis').$clientName).".".$extension;

            $filesize = $file->getClientSize();

            $file->move(public_path('uploads/fontFiles'),$newName);

            $md5 = md5_file(public_path('uploads/fontFiles/').$newName);

            Storage::disk('qiniu')->writeStream($newName,fopen(public_path('uploads/fontFiles/').$newName,'r'));//文件保存到七牛云服务器

            $post_data['font_url'] = 'http://'.config('filesystems.disks.qiniu.domain').'/'.$newName;

            $post_data['size'] = $filesize;

            $post_data['md5'] = $md5;

        }
        $post_data['rank'] = Font::count()+1;

        $post_data['unique_str'] = substr(md5(uniqid(rand(),1)),8,16);

         Font::create($post_data);

         return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //字体详情
        $infos = Font::where('fonts.id','=',$id)

            ->select('fonts.*','b.code')

            ->leftJoin('languages as b','fonts.language_id','=','b.id')

            ->first();

        return view('admin.fonts.show',compact('infos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infos = Font::where('fonts.id','=',$id)

            ->select('fonts.*','b.code')

            ->leftJoin('languages as b','fonts.language_id','=','b.id')

            ->first();

        return view('admin.fonts.edit',compact('infos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //编辑字体信息
        $post_data = $request->all();

        unset($post_data['_method']);
        unset($post_data['_token']);
        //文件上传
        $file = $request->file('font_url');

        if($file){
            //检验一下上传的文件是否有效.
            if($file -> isValid()){
                
                $clientName = $file -> getClientOriginalName();

                $extension = $file -> getClientOriginalExtension();

                $newName = md5(date('ymdhis').$clientName).".".$extension;

                $filesize = $file->getClientSize();

                $file->move(public_path('uploads/fontFiles'),$newName);

                $md5 = md5_file(public_path('uploads/fontFiles/').$newName);

                Storage::disk('qiniu')->writeStream($newName,fopen(public_path('uploads/fontFiles/').$newName,'r'));//文件保存到七牛云服务器

                $post_data['font_url'] = 'http://'.config('filesystems.disks.qiniu.domain').'/'.$newName;

                $post_data['size'] = $filesize;

                $post_data['md5'] = $md5;

            }
        }

        Font::where('id',$id)->update($post_data);

       return redirect('/admin/fonts/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Font::where('id','=',$id)->delete();

        return back();
    }

    public function changeFontStatus($id,$status)
    {
        $status = !$status;

        Font::where('id',$id)->update(['status'=>$status]);

        return back();
    }
}
