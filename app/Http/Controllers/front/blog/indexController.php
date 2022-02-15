<?php

namespace App\Http\Controllers\front\blog;

use App\Blog;
use App\Comment;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\LanguageContent;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //
    public function index()
    {
        $posts = Blog::where('isShow', ACTIVE)->orderBy('date', 'desc')->paginate(6);

        $arr = [
            'posts' => $posts
        ];

        return view('front.blog.index', $arr);
    }

    public function category($slug)
    {
        $categoryId = LanguageContent::getSlugToId(BLOG_CATEGORY_LANGUAGE, $slug);
        if ($categoryId != 0)
        {
            $posts = Blog::where('isShow', ACTIVE)->where('categoryId', $categoryId)->orderBy('date', 'desc')->paginate(6);
            $arr =[
                'categoryId' => $categoryId,
                'posts' => $posts
            ];
            return view('front.blog.category', $arr);
        }
        else
            abort(404);
    }

    public function view($slug)
    {
        $postId = LanguageContent::getSlugToId(BLOG_LANGUAGE, $slug);
        if ($postId != 0)
        {
            $data = Blog::where('id', $postId)->get();
            if ($data[0]['isSHow'] != ACTIVE)
            {
                return redirect('/');
            }
            else {
                $comment = Comment::where('blogId', $postId)->orderBy('id', 'desc')->get();
                $arr = [
                  'data' => $data,
                    'slug' => $slug,
                    'comment' => $comment
                ];
                return view('front.blog.view',$arr );

            }
        }
        else
            abort(404);
    }

    public function search()
    {
        if (isset($_GET['q']))
        {
            $q = strip_tags($_GET['q']);
            $data = LanguageContent::where('languageId', mHelper::getLanguageId())
                ->where('chapter', BLOG_LANGUAGE)
                ->where('chapterSub', NAME_LANGUAGE)
                ->where('value', 'like','%'.$q.'%')
                ->paginate(6);
            $arr = [
              'data'=> $data,
                'q' => $q
            ];
            return view('front.blog.search',$arr);
        }
        else
        {
            return redirect('/');
        }
    }

    public function comment(Request $request)
    {
        $slug = $request->route('slug');
        $postId = LanguageContent::getSlugToId(BLOG_LANGUAGE, $slug);
        if ($postId != 0)
        {
           $request->validate([
               'name' =>'required',
               'text' =>'required'
           ]);
           $all = $request->except('_token');
           $all['blogId'] = $postId;
           Comment::create($all);
           return redirect()->back();
        }
        else
            abort(404);
    }
}
