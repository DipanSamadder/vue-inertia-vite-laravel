<?php



namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Models\Post;
use App\Models\BusinessSetting;
use Inertia\Inertia;
class HomeController extends Controller

{

    /**

     * Display the user's profile form.

     */

    public function index(){
        $page = Post::where('id', 99)->first()->toArray();
        $data = getDataPosts($page['id'], $page);
        return Inertia::render('Home', ['pages' => $data]);

    }



     function admin_dashboard(){

        $page['title'] = 'Dashboard';

        return view('backend.index', compact('page'));

    }


     function businessSetting(){

        $array = array();
        $data = BusinessSetting::where('type', 'like', 'site_%')->get(['type', 'value']);

        if(!$data->isEmpty()){
            foreach($data as $key => $value){
                $array[$value->type] = $value->value;
            }
        }

        $header = Menu::where('type', 'header_menu')->where('level', 1)->where('status', 0)->orderBy('order', 'ASC')->get();

        $headerMenuArray = array();
        if(!$header->isEmpty()){
            foreach($header as $key => $value){
                $arrayHeader = array();
                $headeMenu1 = array();
                $headeMenu1 = $header[$key]->toArray();
                $arrayHeader['hasChild'] = false;
                $arrayHeader['Child'] = array();

                $header1 = Menu::where('type', 'header_menu')->where('level', 2)->where('parent', $value->id)->where('status', 0)->orderBy('order', 'ASC')->get();

                if(!$header1->isEmpty()){
                    $arrayHeader['hasChild'] = true;
                    $arrayHeader['Child'] = Menu::where('type', 'header_menu')->where('level', 2)->where('parent', $value->id)->where('status', 0)->orderBy('order', 'ASC')->get()->toArray();
                    $data =  array_merge($headeMenu1, $arrayHeader);
                    array_push($headerMenuArray, $data);
                }else{
                    $data =  array_merge($headeMenu1, $arrayHeader);
                    array_push($headerMenuArray, $data);
                }
                
            
            }
        }
        $array['site_logo_url'] = dsld_files_data($array['site_logo']);
        $array['header_menu'] = $headerMenuArray;
        $array['topbar_menu'] = Menu::where('type', 'topbar_menu')->where('status', 0)->orderBy('order', 'ASC')->get()->toArray();


        return $array;

    }

}

