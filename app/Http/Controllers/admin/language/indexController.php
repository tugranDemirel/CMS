<?php

namespace App\Http\Controllers\admin\language;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{
    public function index()
    {
        return view('admin.language.index');
    }

    public function create()
    {
        return view('admin.language.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $request->validate(['name'=>'required', 'code'=>'required']);
        $insert = Language::create($all);
        if ($insert)
            return redirect()->back()->with('status', 'Başarılı bir şekilde eklendi.');
        else
            return redirect()->back()->with('status', 'Ekleme işlemi başarısız.');
    }

    public function edit($id)
    {
        // urun var mi yok mu diye bakma
        $c = Language::where('id', $id)->count();
        if ($c != 0)
        {
            $data = Language::where('id', $id)->get();
            return view('admin.language.edit', ['data'=>$data]);
        }
        else
            return abort(404);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Language::where('id', $id)->count();
        if ($c !=0)
        {
            $all = $request->except('_token');
            $update = Language::where('id', $id)->update($all);
            if ($update)
                return redirect()->back()->with('status', 'Güncelleme işlemi başarılı bir şekilde gerçekleştirilmiştir.');
            else
                return abort(404);
        }
        else
            return abort(404);
    }

    public function delete($id)
    {
        $c = Language::where('id', $id)->count();
        if ($c !=0 )
        {
            Language::where('id', $id)->delete();
            return redirect()->back()->with('status', 'Bilgiler silindi');
        }
        else
            return abort(404);
    }

    public function data(Request $request)
    {
        $query = Language::query();
        $data = DataTables::of($query)
            ->addColumn('edit', function ($query){
                return '<a href="'.route('admin.language.edit', ['id'=>$query->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.language.delete', ['id'=>$query->id]).'">Sil</a>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);

        return $data;
    }

}
