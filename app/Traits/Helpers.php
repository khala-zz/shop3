<?php


namespace App\Traits;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

trait Helpers
{

    /**
     * product image sizes
     *
     * @var \int[][]
     */
    /*protected $imagesSizes = [
        'main_slider' => ['width' => 484, 'height' => 441],
        'medium' => ['width' => 268, 'height' => 249],
        'medium2' => ['width' => 208, 'height' => 183],
        'small' => ['width' => 268, 'height' => 134],
        'product_gallery_slider' => ['width' => 84, 'height' => 84],
        'product_gallery_preview' => ['width' => 266, 'height' => 381],
        'cart_thumb' => ['width' => 110, 'height' => 110]
    ];*/
    protected $imagesSizes = [
        '1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA' => ['width' => 580, 'height' => 580],
        '1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH' => ['width' => 800, 'height' => 900],
        '19_X0lc8GknbdDeEJ1vDo4ve7N2uPEaXs' => ['width' => 109, 'height' => 122],
        
    ];

    
  function uploadFiles($request, $filename, $destination = null)
    {
        $files_array = [];

        $destination = $destination ? $destination : base_path('public').'/uploads/';
        //khai bao disk gg drive
        $googleDriveStorage = Storage::disk('google_drive');
        if($request->hasfile($filename)) {

            foreach($request->file($filename) as $image) {
                $ext = $image->getClientOriginalExtension();
                $file_name = time().md5(rand(100,999)).'.'.$ext;
                //luu len google drive
                 //filePath = public_path('logo.png');
                $fileData = \File::get($image);
                $googleDriveStorage -> put($file_name, $fileData);
                //end luu len google drive
                $image->move($destination, $file_name);
                @chmod($destination . '/' . $file_name, 777);
                $files_array[] = $file_name;
            }
        }

        return $files_array;
    }


    function resizeImage($imagePath, $savePath, $width, $height, $uploaded_file)
    {
         $googleDriveStorage_image = Storage::disk('google_drive');
        //large 
        if(Str::contains($savePath, '1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH')){

            $googleDriveStorage = Storage::disk('large_google_drive');
           
           
            $url = $googleDriveStorage_image -> url($uploaded_file);

            $resize = Image::make($url)
            ->fit($width, $height)->encode('jpg');
            
            $googleDriveStorage -> put($uploaded_file, $resize);
            
        }
        //medium
        if(Str::contains($savePath, '1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA')){
            $googleDriveStorage = Storage::disk('medium_google_drive');
            $url = $googleDriveStorage_image -> url($uploaded_file);
            $resize = Image::make($url)
            ->fit($width, $height)->encode('jpg');
            $googleDriveStorage -> put($uploaded_file, $resize);
        }
        //small 
        if(Str::contains($savePath, '19_X0lc8GknbdDeEJ1vDo4ve7N2uPEaXs')){
            $googleDriveStorage = Storage::disk('small_google_drive');
            $url = $googleDriveStorage_image -> url($uploaded_file);
             $resize = Image::make($url)
            ->fit($width, $height)->encode('jpg');
            $googleDriveStorage -> put($uploaded_file, $resize);
        }
    }

    function createProductUploadDirs($product_id , $imagesSizes)
    {
        if(!file_exists(base_path('public').'/uploads/' . $product_id)) {
            @mkdir(base_path('public').'/uploads/' . $product_id, 0777);
        }

        foreach ($imagesSizes as $dirName => $imagesSize) {
            if(!file_exists(base_path('public').'/uploads/' . $product_id . '/' . $dirName)) {
                mkdir(base_path('public').'/uploads/' . $product_id . '/' . $dirName, 0777);
            }
        }
    }

    public function deleteFile($path,$file_name,$dir)
    {
        
         if($dir == '1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH'){
            $googleDriveStorage = Storage::disk('large_google_drive');
           
            $fileinfo = collect($googleDriveStorage->listContents('/', false))
                ->where('type', 'file')
                ->where('name', $file_name)
                ->first();
            $googleDriveStorage->delete($fileinfo['path']);    
        }
        elseif($dir == '1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA'){
            $googleDriveStorage = Storage::disk('medium_google_drive');
           
            $fileinfo = collect($googleDriveStorage->listContents('/', false))
                ->where('type', 'file')
                ->where('name', $file_name)
                ->first();
            
            $googleDriveStorage->delete($fileinfo['path']);    
        }
        elseif($dir == '19_X0lc8GknbdDeEJ1vDo4ve7N2uPEaXs'){
            $googleDriveStorage = Storage::disk('small_google_drive');
           
            $fileinfo = collect($googleDriveStorage->listContents('/', false))
                ->where('type', 'file')
                ->where('name', $file_name)
                ->first();
            
            $googleDriveStorage->delete($fileinfo['path']);    
        }
        else {
             $googleDriveStorage = Storage::disk('google_drive');
           
            $fileinfo = collect($googleDriveStorage->listContents('/', false))
                ->where('type', 'file')
                ->where('name', $file_name)
                ->first();
            $googleDriveStorage->delete($fileinfo['path']);    
        }
       /* if(file_exists($path)) {
            @unlink($path);
        }*/
    }

    public static function slugify($string, $separator = "-")
    {
        // Slug
        $string = mb_strtolower($string);
        $string = @trim($string);
        $replace = "/(\\s|\\" . $separator . ")+/mu";
        $subst = $separator;
        $string = preg_replace($replace, $subst, $string);

        // Remove unwanted punctuation, convert some to '-'
        $puncTable = [
            // remove
            "'"  => '',
            '"'  => '',
            '`'  => '',
            '='  => '',
            '+'  => '',
            '*'  => '',
            '&'  => '',
            '^'  => '',
            ''   => '',
            '%'  => '',
            '$'  => '',
            '#'  => '',
            '@'  => '',
            '!'  => '',
            '<' => '',
            '>'  => '',
            '?'  => '',
            // convert to minus
            '['  => '-',
            ']'  => '-',
            '{'  => '-',
            '}'  => '-',
            '('  => '-',
            ')'  => '-',
            ' '  => '-',
            ','  => '-',
            ';'  => '-',
            ':'  => '-',
            '/'  => '-',
            '|'  => '-',
            '\\' => '-',
        ];
        $string = str_replace(array_keys($puncTable), array_values($puncTable), $string);

        // Clean up multiple '-' characters
        $string = preg_replace('/-{2,}/', '-', $string);

        // Remove trailing '-' character if string not just '-'
        if ($string != '-') {
            $string = rtrim($string, '-');
        }

        return $string;
    }
}
