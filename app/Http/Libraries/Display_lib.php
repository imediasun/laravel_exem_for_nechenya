<?PHP

namespace App\Http\Libraries;

use Illuminate\Http\Request;
class Display_lib
{
    public static $num;
    public static function index($path,$data,$data_nav,$data_content)
    {
        
        $view=view('preheader_view',$data)->render();
        $view.=view('header_view')->render();
        $view.=view('main_navigation_view',$data_nav)->render();
        $view.=view($path.'.main_content_view',$data_content)->render();
        $view.=view($path.'.main_aside_view',$data)->render();
        $view.=view('footer_view',$data)->render();
        return $view;
    }

}