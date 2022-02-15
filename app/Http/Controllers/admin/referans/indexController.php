<?php

namespace App\Http\Controllers\admin\referans;

use App\Helper\imageHelper;
use App\Http\Controllers\Controller;
use App\Referans;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{
    public function index()
    {
        return view('admin.referans.index');
    }

    public function create()
    {
        return view('admin.referans.create');
    }

    public function store(Request $request)
    {
        $request->validate(['image'=>'required']);
        $all = $request->except('_token');
        $image = (isset($all['image'])) ? imageHelper::upload(rand(1, 9000), 'referans', $all['image']) : "";
        $array = [ 'image' => $image ];
        $create = Referans::create($array);
        if ($create)
            return redirect()->back()->with('status', 'Ekleme işlemi başarılı bir şekilde gerçekleşitirildi');
        else
            return redirect()->back()->with('status', 'EKleme işlemi Başarısız');
    }


    public function edit($id)
    {
        // urun var mi yok mu diye bakma
        $c = Referans::where('id', $id)->count();
        if ($c != 0)
        {
            $data = Referans::where('id', $id)->get();
            return view('admin.referans.edit', ['data'=>$data]);
        }
        else
            return abort(404);
    }

    public function update(Request $request)
    {
        $request->validate(['image'=>'required']);

        $id = $request->route('id');
        $c = Referans::where('id', $id)->count();
        if ($c !=0)
        {

            $all = $request->except('_token');

            $data = Referans::where('id', $id)->get();

            $array = [];

            if (isset($all['image']))
            {
                unlink(public_path($data[0]['image']));
                $array['image'] = imageHelper::upload(rand(1,900), 'referans', $all['image']);
            }
            $update = Referans::where('id', $id)->update($array);
            return redirect()->back()->with('status', 'Güncelleme işlemi başarılı bir şekilde gerçekleştirilmiştir.');
        }
        else
            return abort(404);
    }

    public function delete($id)
    {
        $c = Referans::where('id', $id)->count();
        if ($c !=0 )
        {
            $data = Referans::where('id', $id)->get();
            if ($data[0]['image'] != "") {unlink(public_path($data[0]['image']));}
            Referans::where('id', $id)->delete();
            return redirect()->back()->with('status', 'Bilgiler silindi');
        }
        else
            return abort(404);
    }

    public function data(Request $request)
    {
        $query = Referans::query();
        $data = DataTables::of($query)
            ->editColumn('image', function ($query){
                return '<img style="width=120px;" src="'.asset($query->image).'" width="50">';
            })
            ->addColumn('edit', function ($query){
                return '<a href="'.route('admin.referans.edit', ['id'=>$query->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.referans.delete', ['id'=>$query->id]).'">Sil</a>';
            })
            ->rawColumns(['delete', 'edit', 'image'])
            ->make(true);

        return $data;
    }

    public function sortable(Request $request)
    {
        $all = $request->except('_token');
        foreach ($all['eleman'] as $k =>$v)
        {
            Referans::where('id', $v)->update(['orderNumber'=>$k]);
        }
    }
}
