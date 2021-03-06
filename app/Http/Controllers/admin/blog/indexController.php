<?php

namespace App\Http\Controllers\admin\blog;

use App\Blog;
use App\BlogCategory;
use App\Http\Controllers\Controller;
use App\LanguageContent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }

    public function create()
    {
        $category = BlogCategory::all();
        return view('admin.blog.create', ['category' => $category]);
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $array = [
            'categoryId' => $all['categoryId'],
            'isShow' => $all['isShow'],
            'date' => $all['date']
        ];
        $create = Blog::create($array);
        if ($create)
        {
            LanguageContent::InsertorUpdate($all['name'], BLOG_LANGUAGE, NAME_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['slug'], BLOG_LANGUAGE, SLUG_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['text'], BLOG_LANGUAGE, TEXT_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['title'], BLOG_LANGUAGE, TITLE_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['description'], BLOG_LANGUAGE, DESCRIPTION_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['keywords'], BLOG_LANGUAGE, KEYWORDS_LANGUAGE, $create->id, 0);
            if (isset($all['image']))
            {
                LanguageContent::InsertorUpdate($all['image'], BLOG_LANGUAGE, IMAGE_LANGUAGE, $create->id, 1, 'blog');
            }
            return redirect()->back()->with('status', 'Ekleme işlemi başarılı bir şekilde gerçekleşitirildi');
        }
        else
            return redirect()->back()->with('status', 'EKleme işlemi Başarısız');
    }


    public function edit($id)
    {
        // urun var mi yok mu diye bakma
        $c = Blog::where('id', $id)->count();
        if ($c != 0)
        {
            $data = Blog::where('id', $id)->get();
            $category = BlogCategory::all();
            return view('admin.Blog.edit', ['data'=>$data, 'category'=>$category]);
        }
        else
            return abort(404);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Blog::where('id', $id)->count();
        if ($c !=0)
        {
            $all = $request->except('_token');
            $update = Blog::where('id', $id)->update(['isShow' => $all['isShow'], 'date' => $all['date'], 'categoryId' => $all['categoryId']]);
            LanguageContent::InsertorUpdate($all['name'], BLOG_LANGUAGE, NAME_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['slug'], BLOG_LANGUAGE, SLUG_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['text'], BLOG_LANGUAGE, TEXT_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['title'], BLOG_LANGUAGE, TITLE_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['description'], BLOG_LANGUAGE, DESCRIPTION_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['keywords'], BLOG_LANGUAGE, KEYWORDS_LANGUAGE, $id, 0);
            if (isset($all['image']))
            {
                LanguageContent::InsertorUpdate($all['image'], BLOG_LANGUAGE, IMAGE_LANGUAGE, $id, 1, 'blog');
            }
            return redirect()->back()->with('status', 'Güncelleme işlemi başarılı bir şekilde gerçekleştirilmiştir.');
        }
        else
            return abort(404);
    }

    public function delete($id)
    {
        $c = Blog::where('id', $id)->count();
        if ($c !=0 )
        {
            LanguageContent::getDelete(BLOG_LANGUAGE , $id);
            Blog::where('id', $id)->delete();
            return redirect()->back()->with('status', 'Bilgiler silindi');
        }
        else
            return abort(404);
    }

    public function data(Request $request)
    {
        $query = Blog::query();
        $data = DataTables::of($query)
            ->addColumn('name', function ($query){
                return LanguageContent::get(DEFAULT_LANGUAGE, BLOG_LANGUAGE, NAME_LANGUAGE, $query->id);
            })
            ->addColumn('isShow', function ($query){
                return ($query->isShow == 0) ? 'Aktif' : 'Pasif';
            })
            ->addColumn('slug', function ($query){
                return LanguageContent::get(DEFAULT_LANGUAGE, BLOG_LANGUAGE, SLUG_LANGUAGE, $query->id);
            })
            ->addColumn('edit', function ($query){
                return '<a href="'.route('admin.blog.edit', ['id'=>$query->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.blog.delete', ['id'=>$query->id]).'">Sil</a>';
            })
            ->rawColumns(['image', 'edit', 'delete'])
            ->make(true);

        return $data;
    }
}
