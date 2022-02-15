<?php
namespace App\Helper;
use App\Language;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class mHelper
{
    static function getLanguageCode()
    {
        if (Session::has('locale'))
        {
            $c = Language::where('code', Session::get('locale'))->count();
            if ($c != 0)
            {
                $data = Language::where('code', Session::get('locale'))->get();
                return $data[0]['id'];
            }
        }
        return DEFAULT_LANGUAGE_CODE;
    }
    static function getLanguageId()
    {
        if (Session::has('locale'))
        {
            $c = Language::where('code', Session::get('locale'))->count();
            if ($c != 0)
            {
                $data = Language::where('code', Session::get('locale'))->get();
                return $data[0]['id'];
            }
        }
        return DEFAULT_LANGUAGE;
    }

    static function getLanguageIdForCode($code)
    {
            $c = Language::where('code', $code)->count();
            if ($c != 0)
            {
                $data = Language::where('code', $code)->get();
                return $data[0]['id'];
            }
        return DEFAULT_LANGUAGE;
    }



    static function split($text, $limit)
    {
        if (strlen($text) > $limit)
        {
//            mb_substr bölme islemi yapiyor. belirli yerden istediğimi sekilde text i boluyot.
//            Turkce karakterler de oldugu icin mb_substr yoksa direkt substr de is gorur
            $text = mb_substr($text, 0, $limit, 'UTF-8').'...';
            return $text;
        }
    }
}
