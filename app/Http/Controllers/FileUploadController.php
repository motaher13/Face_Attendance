<?php

namespace App\Http\Controllers;


use App\Models\TempFile;
use App\Models\User;
use Croppa;
use File;
use FileUpload;
use Illuminate\Http\Request;
use Storage;

class FileUploadController extends Controller
{
    public $folder = '/uploads/pictures/'; // add slashes for better url handling

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all pictures
        $pictures = TempFile::all();

        // add properties to pictures
        $pictures->map(function ($picture) {
            $picture['size'] = File::size(public_path($picture['url']));
//            $picture['thumbnailUrl'] = Croppa::url($picture['url'], 80, 80, ['resize']);
            $picture['thumbnailUrl'] = VideoThumbnail::createThumbnail($picture['url'], public_path('uploads/thumbs/'), 'abul.jpg', 2, $width = 80, $height = 80);

            $picture['deleteType'] = 'DELETE';
            $picture['deleteUrl'] = route('pictures.destroy', $picture->id);
            return $picture;
        });

        // show all pictures
        return response()->json(['files' => $pictures]);
    }


    public function store($regid){
        return view('admin.picture.picture-store')->with('regid',$regid);
    }



    public function doStore(Request $request,$regid)
    {
        // create upload path if it does not exist
        $path=$this->folder.$regid;
        $path = public_path($path);
        if(!File::exists($path)) {
            File::makeDirectory($path);
        };

        $thumbpath="uploads/thumbs/".$regid;
        $thumbpath = public_path($thumbpath);
        if(!File::exists($thumbpath)) {
            File::makeDirectory($thumbpath);
        };

        // Simple validation (max file size 2MB and only two allowed mime types)
        $validator = new FileUpload\Validator\Simple('100M', []);
        // 'image/png', 'image/jpg', 'image/jpeg'


        // Simple path resolver, where uploads will be put
        $pathresolver = new FileUpload\PathResolver\Simple($path);

        // The machine's filesystem
        $filesystem = new FileUpload\FileSystem\Simple();

        // FileUploader itself
        $fileupload = new FileUpload\FileUpload($_FILES['files'], $_SERVER);
        $slugGenerator = new FileUpload\FileNameGenerator\Slug();

        // Adding it all together. Note that you can use multiple validators or none at all
        $fileupload->setPathResolver($pathresolver);
        $fileupload->setFileSystem($filesystem);
        $fileupload->addValidator($validator);
        $fileupload->setFileNameGenerator($slugGenerator);

        // Doing the deed
        list($files, $headers) = $fileupload->processAll();

        // Outputting it, for example like this
        foreach($headers as $header => $value) {
            header($header . ': ' . $value);
        }

        foreach($files as $file){
            //Remember to check if the upload was completed
            if ($file->completed) {

                // set some data
                $filename = $file->getFilename();
                $url = $this->folder .$regid."/". $filename;

                 //save data
                $picture = TempFile::create([
                    'name' => $filename,
                    'url' => $this->folder .$regid."/". $filename,
                    'source'=>'video'
                ]);

                 //prepare response
                $data[] = [
                    'size' => $file->size,
                    'name' => $filename,
                    'url' => $url,
                    'thumbnailUrl' => Croppa::url($url, 80, 80, ['resize']),
                    'deleteType' => 'DELETE',
                    'deleteUrl' => route('pictures.destroy', $picture->id),
                ];

                // output uploaded file response
                return response()->json(['files' => $data]);
            }
        }
        // errors, no uploaded file
        return response()->json(['files' => $files]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempFile  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempFile $picture)
    {
        Croppa::delete($picture->url); // delete file and thumbnail(s)
        $picture->delete(); // delete db record
        return response()->json([$picture->url]);
    }



    public function capture($regid){
        return view('admin/picture/picture-capture')->with('regid',$regid);
    }


    public function saveWebcam(Request $request,$regid)
    {

        $path=$this->folder.$regid;
        $path = public_path($path);
        if(!File::exists($path)) {
            File::makeDirectory($path);
        };

        $path = null;
        if (!empty($request->namafoto)) {
            $encoded_data = $request->namafoto;
            $binary_data = base64_decode($encoded_data);

            // save to server (beware of permissions // set ke 775 atau 777)
            $namafoto = uniqid() . ".png";
            $result = file_put_contents('uploads/pictures/'.$regid."/" . $namafoto, $binary_data);
            if (!$result) die("Could not save image!  Check file permissions.");

            $response = array('success' => true, 'data' => 'success');
            return response()->json($response);
        }

        return $path;
    }



    public function testupload(Request $request){

//        $this->validate(request(),[
//            'image'=>'required|mimes:'
//        ]);
        $image=$request->file('file');
        $input= $image->getClientOriginalName();
        $destinationPath = public_path('/upload');
        $image->move($destinationPath, $input);
        return redirect()->route('routine.create');
    }





}
