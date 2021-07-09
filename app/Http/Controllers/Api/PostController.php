<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $posts = Post::all(); ------->così prendo tutti i post*/ 

        /* $posts = Post::paginate(3); ------->così prendo tutti i post ma 3 per pagina*/

        /* $posts = Post::with(['category','tags'])->paginate(3);------>altro modo per fare le join */
        
        $posts = DB::table('posts')
        ->select(
            'posts.id',
            'posts.title',
            'posts.slug',
            'posts.content',
            'posts.created_at as date',
            'categories.name as category'
        )
        ->join('categories', 'posts.category_id','categories.id')        
        ->paginate(3);

        return response()->json($posts); 
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->with(['category','tags'])->first();
        
        if($post){
            $data = [
                'success' => true,
                'data' => $post,
            ];
            return response()->json($data);
        }

        return response()->json(['success' => false]);
        
         
    }
    
}
