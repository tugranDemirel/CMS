<?php

namespace App\Http\Controllers\admin\blogcategory;

use App\BlogCategory;
use App\Http\Controllers\Controller;
use App\LanguageContent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{
    public function index()
    {
        return view('admin.blogcategory.index');
    }

    public function create()
    {
        return view('admin.blogcategory.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');

        $create = BlogCategory::create([]);
        if ($create)
        {
            LanguageContent::InsertorUpdate($all['name'], BLOG_CATEGORY_LANGUAGE, NAME_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['slug'], BLOG_CATEGORY_LANGUAGE, SLUG_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['title'], BLOG_CATEGORY_LANGUAGE, TITLE_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['description'], BLOG_CATEGORY_LANGUAGE, DESCRIPTION_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['keywords'], BLOG_CATEGORY_LANGUAGE, KEYWORDS_LANGUAGE, $create->id, 0);
            return redirect()->back()->with('status', 'Ekleme işlemi başarılı bir şekilde gerçekleşitirildi');
        }
        else
            return redirect()->back()->with('status', 'EKleme işlemi Başarısız');
    }

    public function edit($id)
    {
        // urun var mi yok mu diye bakma
        $c = BlogCategory::where('id', $id)->count();
        if ($c != 0)
        {
            $data = BlogCategory::where('id', $id)->get();
            return view('admin.blogcategory.edit', ['data'=>$data]);
        }
        else
            return abort(404);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = BlogCategory::where('id', $id)->count();
        if ($c !=0)
        {
            $all = $request->except('_token');
            $update = BlogCategory::where('id', $id)->update([]);

            LanguageContent::InsertorUpdate($all['name'], BLOG_CATEGORY_LANGUAGE, NAME_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['slug'], BLOG_CATEGORY_LANGUAGE, SLUG_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['title'], BLOG_CATEGORY_LANGUAGE, TITLE_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['description'], BLOG_CATEGORY_LANGUAGE, DESCRIPTION_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['keywords'], BLOG_CATEGORY_LANGUAGE, KEYWORDS_LANGUAGE, $id, 0);

            return redirect()->back()->with('status', 'Güncelleme işlemi başarılı bir şekilde gerçekleştirilmiştir.');
        }
        else
            return abort(404);
    }

    public function delete($id)
    {
        $c = BlogCategory::where('id', $id)->count();
        if ($c !=0 )
        {
            LanguageContent::getDelete(BLOG_CATEGORY_LANGUAGE, $id);
            BlogCategory::where('id', $id)->delete();
            return redirect()->back()->with('status', 'Bilgiler silindi');
        }
        else
            return abort(404);
    }

    public function data(Request $request)
    {
        $query = BlogCategory::query();
        $data = DataTables::of($query)
            ->addColumn('name', function ($query){
                return LanguageContent::get(DEFAULT_LANGUAGE, BLOG_CATEGORY_LANGUAGE, NAME_LANGUAGE, $query->id);
            })
            ->addColumn('slug', function ($query){
                return LanguageContent::get(DEFAULT_LANGUAGE, BLOG_CATEGORY_LANGUAGE, SLUG_LANGUAGE, $query->id);
            })
            ->addColumn('edit', function ($query){
                return '<a href="'.route('admin.blogcategory.edit', ['id'=>$query->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.blogcategory.delete', ['id'=>$query->id]).'">Sil</a>';
            })
            ->rawColumns(['image', 'edit', 'delete'])
            ->make(true);

        return $data;
    }
}
