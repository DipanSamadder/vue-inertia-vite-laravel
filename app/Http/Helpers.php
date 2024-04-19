<?php

use Illuminate\Http\Request;

use App\Models\Upload;
use App\Models\User;
use App\Models\BusinessSetting;
use App\Models\Translation;
use App\Models\Post;
use App\Models\Menu;
use App\Models\PostsMeta;
use App\Models\RolePermission;
use App\Http\Controllers\MailController;



if (!function_exists('dsld_business_setting_data')) {
    function dsld_business_setting_data()
    {
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


if (!function_exists('dsld_get_base_URL')) {
    function dsld_get_base_URL()
    {
        $root = isset($_SERVER['HTTPS']) && isHttps() ? "https://".$_SERVER['HTTP_HOST'] : "http://".$_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}

if (!function_exists('isHttps')) {
    function isHttps()
    {
        $isHttps =
            $_SERVER['HTTPS']
            ?? $_SERVER['REQUEST_SCHEME']
            ?? $_SERVER['HTTP_X_FORWARDED_PROTO']
            ?? null
        ;

        $isHttps =
            $isHttps && (
                strcasecmp('on', $isHttps) == 0
                || strcasecmp('https', $isHttps) == 0
            )
        ;

        return $isHttps;
    }
}


//Get Post Parent Category Nmae

if(!function_exists('dsld_formatSize')){



     function dsld_formatSize($bytes)

    {

        if ($bytes >= 1073741824)

        {

            $bytes = number_format($bytes / 1073741824, 2) . ' GB';

        }

        elseif ($bytes >= 1048576)

        {

            $bytes = number_format($bytes / 1048576, 2) . ' MB';

        }

        elseif ($bytes >= 1024)

        {

            $bytes = number_format($bytes / 1024, 2) . ' KB';

        }

        elseif ($bytes > 1)

        {

            $bytes = $bytes . ' bytes';

        }

        elseif ($bytes == 1)

        {

            $bytes = $bytes . ' byte';

        }

        else

        {

            $bytes = '0 bytes';

        }



        return $bytes;

    }

}

//Get Post Parent Category Nmae

if(!function_exists('dsld_have_user_permission')){

    function dsld_have_user_permission($key){

         return 1;

    }

}



//Get Post Parent Category Nmae

if(!function_exists('dsld_check_permission')){

    function dsld_check_permission(Array $keys){

        if(Auth::user()->hasRole('Super-Admin')){

            return Auth::user()->hasRole('Super-Admin') ? true : null;

        }

        return Auth::user()->hasAnyDirectPermission($keys);

    }

}



//Get Post Parent Category Nmae

if(!function_exists('dsld_mail_send')){

    function dsld_mail_send($to, $subject, $template, $mail_body, $both = 0){

        $from = env('MAIL_FROM_ADDRESS');

        if($both == 2){

            

            $content['title'] = $subject;

            $content['body'] = $mail_body;

            $cdata = new MailController;

            $cdata->cf_submite_mail($to, $from, $subject, $content, $template);

            

            $cdata = new MailController;

            $content['title'] = $subject." | Admin Mail";

            $content['body'] = $mail_body;

            $cdata->cf_submite_mail($to, $from, $subject, $content, 'emails.admin_template');

            

        }else if($both == 1){

            

            $cdata = new MailController;

            $content['title'] = $subject." | Admin Mail";

            $content['body'] = $mail_body;

            $cdata->cf_submite_mail($to, $from, $subject, $content, 'emails.admin_template');

            

        }else if($both ==0){



            $content['title'] = $subject;

            $content['body'] = $mail_body;

            $cdata = new MailController;

            $cdata->cf_submite_mail($to, $from, $subject, $content, $template);

            

        }

        



    }

}



//return file uploaded via uploader

if (!function_exists('dsld_uploaded_asset')) {

    function dsld_uploaded_asset($id)

    {

        if (($asset = Upload::find($id)) != null) {

            return my_asset($asset->file_path);

        }

        return null;

    }

}

if (! function_exists('my_asset')) {

    /**

     * Generate an asset path for the application.

     *

     * @param  string  $path

     * @param  bool|null  $secure

     * @return string

     */

    function my_asset($path, $secure = null)

    {

        if(env('FILESYSTEM_DRIVER') == 's3'){

            return Storage::disk('s3')->url($path);

        }

        else {

            return app('url')->asset($path, $secure);

        }

    }

}

//Get Post Parent Category Nmae

if(!function_exists('dsld_generate_slug_by_text')){

    function dsld_generate_slug_by_text($text){

        return str_replace(' ', '_', $text);

    }

}

if(!function_exists('dsld_is_route_active')){

    function dsld_is_route_active(Array $routes, $output = 'active'){

        foreach($routes as $route){

            if(Route::currentRouteName() == $route) return $output;

        }

    }

}





if(!function_exists('dsld_is_slug_active')){

    function dsld_is_slug_active(Array $slugs, $output = 'active'){

        foreach($slugs as $slug){

            if(URL::current() == url('/').'/'.$slug) return $output;

        }

    }

}



if(!function_exists('dsld_translation')){

    function dsld_translation($key, $lang = null){

        if($lang == null){

            $lang = App::getLocale();

        }

        $check_data = Translation::where('lang', env("DEFAULT_LANGUAGE", "en"))->where('lang_key', $key)->first();

        if($check_data == null){

            $data = new Translation;

            $data->lang = env("DEFAULT_LANGUAGE", "en");

            $data->lang_key = $key;

            $data->lang_value = $key;

            $data->save();

        }



        $get_value = Translation::where('lang_key', $key)->where('lang', $lang)->first();

        if($get_value != null){

            return $get_value->lang_value;

        }else{

            return $check_data->lang_value;

        }

    }

}



if(! function_exists('dsld_default_language')){

    function dsld_default_language(){

        return env("DEFAULT_LANGUAGE");

    }

}





//Get Post wise slug Nmae

if(!function_exists('dsld_generate_slug_by_text_with_model')){

   

    function dsld_generate_slug_by_text_with_model($model, $title, $field, $separator = null){

        $separator  =  empty($separator) ?  '-' : $separator;

        $id = 0;



        $slug =  preg_replace('/\s+/', $separator, (trim(strtolower($title))));

        $slug =  preg_replace('/\?+/', $separator, (trim(strtolower($slug))));

        $slug =  preg_replace('/\#+/', $separator, (trim(strtolower($slug))));

        $slug =  preg_replace('/\/+/', $separator, (trim(strtolower($slug))));



        // $slug = preg_replace('!['.preg_quote($separator).']+!u', $separator, $title);



        // Remove all characters that are not the separator, letters, numbers, or whitespace.

        // $slug = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($slug));



        // Replace all separator characters and whitespace by a single separator

        $slug = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $slug);



        // Get any that could possibly be related.

        // This cuts the queries down by doing it once.

        $allSlugs = dsld_getRelatedSlugs($slug, $id, $model, $field);



        // If we haven't used it before then we are all good.

        if (!$allSlugs->contains("$field", $slug)) {

            return $slug;

        }



        // Just append numbers like a savage until we find not used.



        for ($i = 1; $i <= 100; $i++) {

            $newSlug = $slug . $separator . $i;

            if (!$allSlugs->contains("$field", $newSlug)) {

                return $newSlug;

            }

        }



        throw new \Exception('Can not create a unique slug');

    }

}



if(!function_exists('dsld_getRelatedSlugs')){

    function dsld_getRelatedSlugs($slug, $id, $model, $field){

        if (empty($id)) {

            $id = 0;

        }



        return $model::select("$field")->where("$field", 'like', $slug . '%')

            ->where('id', '<>', $id)

            ->get();

    }

}





if (!function_exists('dsld_find_parent_level')) {

    function dsld_find_parent_level($model = null, $id = null)

    {

        $comment = $model::where('id',  $id)->first();

        if($comment){

            return $comment->level + 1; 

        }

        return 1;

    }

}



if (!function_exists('dsld_get_setting')) {

    function dsld_get_setting($key, $default = null)

    {

        $setting = BusinessSetting::where('type', $key)->first();

        return $setting == null ? $default : $setting->value;

    }

}





if (!function_exists('dsld_id_get_setting')) {

    function dsld_id_get_setting($key, $default = null)

    {

        $setting = BusinessSetting::where('type', $key)->first();

        return $setting == null ? $default : $setting->id;

    }

}





if(!function_exists('dsld_referral_code_create'))

{

    function dsld_referral_code_create($code){

        if (($check = User::where('referral_code', $code)->first()) == null) {

            return $code;

        }else{

            return dsld_referral_code_create($code);

        }



    }

}



if(!function_exists('dsld_random_code_generator'))

{

    function dsld_random_code_generator($limit = 10){

        return Str::random($limit);

    }

}



if(!function_exists('dsld_uploaded_file_path'))

{

    function dsld_uploaded_file_path($id, $thumb = ''){



        if(is_null($id) || $id == 0){

            return null;

        }



        if (($asset = Upload::find($id)) != null) {

            return $asset->getUrl($thumb);

        }

        return null;

    }

}

if (!function_exists('dsld_uploading_file_type')) {

    function dsld_uploading_file_type($file)

    {

        $type = array(

            "jpg"=>"image",

            "jpeg"=>"image",

            "png"=>"image",

            "svg"=>"image",

            "webp"=>"image",

            "gif"=>"image",

            "mp4"=>"video",

            "mpg"=>"video",

            "mpeg"=>"video",

            "webm"=>"video",

            "ogg"=>"video",

            "avi"=>"video",

            "mov"=>"video",

            "flv"=>"video",

            "swf"=>"video",

            "mkv"=>"video",

            "wmv"=>"video",

            "wma"=>"audio",

            "aac"=>"audio",

            "wav"=>"audio",

            "mp3"=>"audio",

            "zip"=>"archive",

            "rar"=>"archive",

            "7z"=>"archive",

            "doc"=>"document",

            "txt"=>"document",

            "docx"=>"document",

            "pdf"=>"document",

            "csv"=>"document",

            "xml"=>"document",

            "ods"=>"document",

            "xlr"=>"document",

            "xls"=>"document",

            "xlsx"=>"document"

        );

        $extension = strtolower($file->getClientOriginalExtension());

        if(isset($type[$extension])){

                return $type[$extension];

        }

        else{

                return "others";

        }

    }

}

//return file uploaded via uploader

if (!function_exists('dsld_upload_file_title')) {

    function dsld_upload_file_title($id)

    {

        if (($asset = Upload::find($id)) != null) {

            return $asset->name;

        }

        return null;

    }

}





if (!function_exists('dsld_api_asset')) {

    function dsld_api_asset($id)

    {

        if (($asset = Upload::find($id)) != null) {

            return $asset->file_name;

        }

        return "";

    }

}





//Get Post Parent Category Nmae

if(!function_exists('dsld_generate_slug_by_text_with_model')){

   

    function dsld_generate_slug_by_text_with_model($model, $title, $field, $separator = null){

        $separator  =  empty($separator) ?  '-' : $separator;

        $id = 0;



        $slug =  preg_replace('/\s+/', $separator, (trim(strtolower($title))));

        $slug =  preg_replace('/\?+/', $separator, (trim(strtolower($slug))));

        $slug =  preg_replace('/\#+/', $separator, (trim(strtolower($slug))));

        $slug =  preg_replace('/\/+/', $separator, (trim(strtolower($slug))));



        // $slug = preg_replace('!['.preg_quote($separator).']+!u', $separator, $title);



        // Remove all characters that are not the separator, letters, numbers, or whitespace.

        // $slug = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($slug));



        // Replace all separator characters and whitespace by a single separator

        $slug = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $slug);



        // Get any that could possibly be related.

        // This cuts the queries down by doing it once.

        $allSlugs = dsld_getRelatedSlugs($slug, $id, $model, $field);



        // If we haven't used it before then we are all good.

        if (!$allSlugs->contains("$field", $slug)) {

            return $slug;

        }



        // Just append numbers like a savage until we find not used.



        for ($i = 1; $i <= 100; $i++) {

            $newSlug = $slug . $separator . $i;

            if (!$allSlugs->contains("$field", $newSlug)) {

                return $newSlug;

            }

        }



        throw new \Exception('Can not create a unique slug');

    }

}





//Get Post Parent Category Nmae

if(!function_exists('dsld_page_meta_value_by_meta_key')){

    function dsld_page_meta_value_by_meta_key($meta_key = '', $page_id=''){

        $data = PostsMeta::where('meta_key', $meta_key)->where('pageable_id', $page_id)->first();



        if( $data != ''){

            return $data->meta_value;

        }else{

            return '';

        }

        

    }

}

if(!function_exists('include_form_by_id')){
    function include_form_by_id($form_id){

        if(dsld_page_meta_value_by_meta_key('layout', $form_id) !=''){
            
            echo view('frontend.forms.'.dsld_page_meta_value_by_meta_key('layout', $form_id), compact('form_id'));
        }else{
            echo '';
        } 
    }
}



if (!function_exists('dsld_static_asset')) {

    function dsld_static_asset($path, $secure = null){

        return app('url')->asset('/'.$path, $secure);

    }

}

//Get Post Parent Category Nmae
if(!function_exists('dsld_form_field_by_form_id')){
    function dsld_form_field_by_form_id($id = ''){
        $data = Post::where('id', $id)->where('type', 'contact_form')->first();
        if( $data != ''){
            $meta_fields = json_decode($data->meta_fields);     

            usort($meta_fields, function($a, $b) { //Sort the array using a user defined function
                return $a->order > $b->order ? 1 : -1; //Compare the scores
            }); 
            return $meta_fields;
        }else{
            return array();
        }

    }
}

if (!function_exists('dsld_lazy_image_by_id')) {

    function dsld_lazy_image_by_id($id, $class = ''){
    
        if(!is_null($id) || $id !='['){
            $image = '<img class="lazy '.$class.' id-'.$id.'" alt="'.dsld_upload_file_title($id).'" 
                        src="'.dsld_static_asset('backend/assets/images/circle-loading.gif').'"
                        data-src="'.dsld_static_asset('backend/assets/images/circle-loading.gif').'"
                        data-srcset="'.dsld_uploaded_file_path($id, 'full').'"
                        srcset="'.dsld_uploaded_file_path($id, 'placeholder').'"
                    >';
            return $image;
        }else{
            $image = '<img class="'.$class.'" src="'.dsld_static_asset('backend/assets/images/circle-loading.gif').'"
                    >';
        }
        return $image;
    }

}

if (!function_exists('dsld_files_data')) {

    function dsld_files_data($id, $class = ''){
        
        $data = [
            'url' => dsld_uploaded_file_path($id),
            'full' => dsld_uploaded_file_path($id, 'full'),
            'placeholder' => dsld_uploaded_file_path($id, 'placeholder'),
            'title' => dsld_upload_file_title($id),
        ];
        return $data;
    }

}

if (!function_exists('getDataPosts')) {

    function getDataPosts($postId, $result = [])
    {
        
        $postData = Post::where('id', $postId)->where('status', 1)->get();
        
        if(!$postData->isEmpty()){

            $result = $result;

            if(!empty($result)){
                
                $images= array();
                if($result['banner'] != '' && $result['banner'] != "0" && $result['banner'] != null){
                    $images['banner_images'] = dsld_files_data($result['banner']);
                }
                if($result['thumbnail'] != '' && $result['thumbnail'] != "0" && $result['thumbnail'] != null){
                    $images['thumbnail_images'] = dsld_files_data($result['thumbnail']);
                }
                $result =array_merge($result, $images);
            }
            

            $sectionData = PostsMeta::where('pageable_id', $postId)->get(['meta_key', 'meta_value']);
           

            if(!$sectionData->isEmpty()){
                $array = array();
                foreach($sectionData as $key => $value){

                    //If have field post type 
                    if (strpos($value->meta_key, 'post_type') !== false) {
                        $newPost = Post::where('type', $value->meta_value)->where('status', 1)->get()->toArray();

                        if($newPost) {
                            $sectionArray = array();
                            foreach ($newPost as $key => $relatedPost) {
                                $section = getDataPosts($relatedPost['id'], $relatedPost);
                                array_push($sectionArray, $section);
                            }
                        }

                        $array[$value->meta_key.'_data'] = $sectionArray;
                        
                    }elseif(strpos($value->meta_key, '_file_repeter_') !== false) {
                        if($value->meta_value !='' && is_array(json_decode($value->meta_value, true)) && count(json_decode($value->meta_value, true)) > 0 ){
                            $file_repeter = array();
                            foreach(json_decode($value->meta_value, true) as $key => $fr){
                                $file_repeter[$key] = dsld_files_data($fr);
                            }
                            $array[$value->meta_key.'_data'] = $file_repeter;
                        }
                        
                    }elseif(strpos($value->meta_key, '_file_') !== false) {
                        if($value->meta_value !='' && $value->meta_value != 0){
                            $array[$value->meta_key.'_data'] = dsld_files_data($value->meta_value);
                        }
                    }

                    $array[$value->meta_key] = $value->meta_value;
                    
                }

                $result =array_merge($result, $array);

            }
           
        }
        return $result;

    }

}