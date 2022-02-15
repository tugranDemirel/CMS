<?php

namespace App\Http\Controllers\front;

use App\Blog;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Language;
use App\LanguageContent;
use App\Project;
use App\Referans;
use App\Services;
use App\Setting;
use App\Slider;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mail;
class indexController extends Controller
{
    //
    public function index()
    {
        $slider = Slider::orderBy('orderNumber', 'asc')->get();
        $service = Services::where('isHome', ACTIVE)->orderBy('orderNumber', 'asc')->get();
        $project = Project::where('isShow', ACTIVE)->orderBy('orderNumber', 'asc')->get();
        $team = Team::orderBy('orderNumber', 'asc')->get();
        $setting = Setting::where('id', 1)->get();
        $blog = Blog::where('isShow', ACTIVE)->orderBy('date', 'desc')->limit(3)->get();
        $referance = Referans::orderBy('orderNumber', 'asc')->get();
        $arr = [
            'slider' =>$slider,
            'service' =>$service,
            'project' =>$project,
            'team' => $team,
            'setting' => $setting,
            'blog' => $blog,
            'referance' => $referance
        ];
        return view('front.index', $arr);
    }

    public function lang($lang)
    {
        $c = Language::where('code', $lang)->count();
        if ($c != 0)
            session(['locale'=>$lang]);
        return redirect('/'.$lang);
    }

    public function offer(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',
        ]);
        $all = $request->except('_token');
        $arr = [
            'name' => ($all['name']),
            'email' => ($all['email']),
            'subject' => ($all['subject']),
            'text' => ($all['message']),
        ];
        try {
            mail::send('mail.offer', $arr, function ($message){
                $message->subject('Online Teklif');
                $message->to(SYSTEM_EMAIL);
            });
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
        }
        return redirect()->back()->with('swal', trans('general.offer_success'));

    }

    public function sitemap()
    {
        $languageId = mHelper::getLanguageId();
        $service = LanguageContent::where('languageId', $languageId)
            ->where('chapter', SERVICE_LANGUAGE)
            ->where('chapterSub', SLUG_LANGUAGE)
            ->get();
        $page = LanguageContent::where('languageId', $languageId)
            ->where('chapter', PAGE_LANGUAGE)
            ->where('chapterSub', SLUG_LANGUAGE)
            ->get();
        $blog = LanguageContent::where('languageId', $languageId)
            ->where('chapter', BLOG_LANGUAGE)
            ->where('chapterSub', SLUG_LANGUAGE)
            ->get();
        $now = Carbon::now()->toAtomString();
        $content = view('front.sitemap', compact('service', 'page', 'blog', 'now'));
        return response($content)->header('Content-Type', 'application/xml');
    }

}
