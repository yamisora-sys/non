<?php
   
namespace App\Http\Controllers;
   
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
   
class PostController extends Controller
{
    public function ajaxLike(Request $request){
        if(!auth()->check()){
          return response()->json(['failed' => 'Bạn chưa đăng nhập !']);
        }
        $post = Post::find($request->id);
        $response = auth()->user()->toggleLike($post);
 
        return response()->json(['success' => $response]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
    
        return view('posts.index', compact('posts'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
    
        Post::create($request->all());
    
        return redirect()->route('posts.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$post = Post::find($id);
        return view('posts.show', compact('post'));
    }
}