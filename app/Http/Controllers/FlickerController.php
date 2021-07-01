<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flicker;

class FlickerController extends Controller{



   public function index(){
      return json_encode( ['data' => Flicker::get()]) ;
   }

    public function refresh(){
        $this->getRemoteData($this, 'createFlickers');
        return $this->index();
    }

    public function details($id){
        return view('details', ['data' => Flicker::where('id', $id)->first()]);
    }

   
   public function getRemoteData($class , $cb){
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://api.flickr.com/services/feeds/photos_public.gne?format=json&lang=en-us&nojsoncallback=1');
   

    $request = new \GuzzleHttp\Psr7\Request('GET', 'https://api.flickr.com/services/feeds/photos_public.gne?format=json&lang=en-us&nojsoncallback=1');
    $promise = $client->sendAsync($request)->then(function ($response) use ($cb, $class) {
       $class->$cb(JSON_decode($response->getBody()));
    });   
    $promise->wait();
   }

    public function save(){
        $data=[
            'title' => request('title'),
            'media' => request('media'),
            'date_taken' => request('date_taken'),
            'description' => request('description'),
            'published' => request('published'),
            'author' => request('author'),
            'author_id' => request('author_id'),
            'tags' => request('tags'),
        ];
       
       $flicker= !request('id')? null : Flicker::firstWhere('id', request('id'));
       if($flicker){
           $flicker->update($data);
       }
       else{
            $flicker=Flicker::create($data);
       }
       return $flicker;
   }
   public function delete(){
        $flicker= !request('id')? null : Flicker::firstWhere('id', request('id'));
        return $flicker->delete();
   }

   public function createFlickers($data){
       $this->deleteOlds();
        foreach($data->items as $elem){
            $flicker = Flicker::firstOrCreate(
                ['link' => $elem->link],
                [
                    'title' => $elem->title,
                    'media' => $elem->media->m,
                    'date_taken' => $elem->date_taken,
                    'description' => $elem->description,
                    'published' => $elem->published,
                    'author' => $elem->author,
                    'author_id' => $elem->author_id,
                    'tags' => $elem->tags,          
                ],
            );
        }
    }

    private function deleteOlds(){
      $oldFlickers=Flicker::get();
      foreach($oldFlickers as $oldFlicker){
          $oldFlicker->delete();
      }
  }

}
