<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request as Req;
use GuzzleHttp\Client;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function upload(Req $request)
    {
        $files = $request->image;

        $allres = [];
        foreach($files as $file)
        {
            $token = 'base64:XDJU8/+BkmZlThNErrL4mP/31jXmOWygdAEs/yfz/SQ';
            $image_org= $file->getClientOriginalName();
            $image_path = $file->getRealPath();

            $client   = new Client();
            $response = $client->request('POST', 'http://localhost:909/api/saveImage', [
                'multipart' => [
                    [
                        'name' => 'token',
                        'contents' => $token,
                    ],[
                        'name'     => 'image',
                        'filename' => $image_org,
                        'contents' => fopen($image_path, 'r'),
                    ],[
                        'name' => 'id',
                        'contents' => '3',
                    ],[
                        'name' => 'path',
                        'contents' => 'product'
                    ],
                ]
            ]);
            
            array_push($allres,$response->getBody()->getContents());
        }
        
        foreach($allres as $ar)
        {
            if(!in_array('200 ', $ar))
            {
                return "Success";
            }
            else
            {
                return "Upload Failed, Please Try Again";
            }
        }
        
    }
}
