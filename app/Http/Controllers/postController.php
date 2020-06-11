<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 

use App\Post;



class postController extends Controller
{
    
    


    public function getPosts(Request $request)
    {
        $post = Post::get();
        return view('post', compact('post'));
    }



    public function insertPost(Request $req)
    {
        $this->validate($req, [
            "title" => "required|string",
            "description" => "required|string",
             
        ]);


        $title = $req->input('title');
        $description = $req->input('description');
     


        DB::table('Post')->insert(
            [
                'title' => $title,
                'description' => $description,
                'comment' => "",

            ]
        );
        return redirect('admin/Admin');

        // return redirect('admin/books/view');
    }


      public function getUpdatePost($id)
    {


        $toret = DB::table('Post')
            ->where('id', $id)
            ->first();


        if (
            !DB::table('Post')
                ->where('id', $id)
                ->count() > 0
        ) {
            exit();
        }

        return view('admin/update', ["post" => $toret]);
    }




    protected function updatePost(Request $req)
    {

        $this->validate($req, [
            "title" => "required|string",
            "description" => "required|string",
             
        ]);

        $id = $req->input('id');
        $title = $req->input('title');
        $description = $req->input('description');
     



        $updated = DB::table('Post')
            ->where('id', $id)
            ->update([
                
                    'title' => $title,
                    'description' => $description,
                    'comment' => "",
    
               
            ]);


            return redirect('admin/Admin');

    }



    protected function insertComment(Request $req)
    {

        $this->validate($req, [
            "comment" => "required|string",             
        ]);

        $id = $req->input('id');
        $comment = $req->input('comment');
     

        $updated = DB::table('Post')
            ->where('id', $id)
            ->update([
                    'comment' => $comment,
            ]);


            return redirect('admin/Admin');

    }





    public function deletePost(Request $req){

        $this->validate($req, [
            "id" => "required|numeric",
        ]);
        $id = $req->input('id');
        
        $Post = DB::table("Post")->where('id', $id)->delete();
   

        return redirect('admin/Admin');
    }
}
