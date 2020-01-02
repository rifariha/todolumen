<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request as Req;
use GuzzleHttp\Client;

class ImageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function upload(Req $request)
    {
            $files = $request->image;
            // echojson_encode($files));
            $token = 'd747920dc228e53775dedfa6dcdd671d180feb784547289aae4927e80d5d6d31';
            $client   = new Client();
            $dataImages = [
                [
                    'name' => 'token',
                    'contents' => $token,
                ],[
                    'name' => 'id',
                    'contents' => 1,
                ],[
                    'name' => 'path',
                    'contents' => 'product',
                ],[
                    'name' => 'table_name',
                    'contents' => 'marketplace_product_images',
                ],
            ];
            foreach ($files as $key => $value) {
                $image = [
                    'name'     => 'image['.$key.']',
                    'contents' => fopen($files[$key], 'r'),
                ];
                array_push($dataImages, $image);
            }
            $response = $client->request('POST', 'http://localhost:8000/api/saveImage', [
                'multipart' => $dataImages
            ]);
            
            return $response->getBody()->getContents();
        
        
        
    }
}
