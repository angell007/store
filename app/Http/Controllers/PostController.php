<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comentario;
use Illuminate\Http\Request;
use App\Like;
use Image;
// use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('post.index', compact('posts'));
    }

    public function grafica($id)
    {
        $likes = Like::where('post_id', $id)->where('stado','1')->count();
        $dislikes = Like::where('post_id', $id)->where('stado','0')->count();
        $str = Post::select('visitas')->find($id);
        // dd($str->visitas); 
        $vistas = $str->visitas; 
        $opiniones = Comentario::where('post_id', $id)->count();
        
        // $opiniones
        return view('dash.grafica', compact('likes','dislikes','vistas','opiniones'));
    }

    public function indexuser()
    {
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->paginate(3);
        return view('dash.profil', compact('posts'));
    }

    public function create()
    {
    return view('post.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000',
            'title' => 'required|max:1000',
            'file' =>'required|image|max:20000',

            
            ]);
            
                    $ruta = public_path().'/img/';
                    $imagenOriginal = $request->file('file');
                    $imagen = Image::make($imagenOriginal);
                    $randomString = str_random(25);
                    $temp_name = $randomString. '.' . $imagenOriginal->getClientOriginalExtension();
                    $imagen->resize(300,300);
                    $imagen->save($ruta . $temp_name, 100);

                    $post = new Post();
                    $post->body = $request['body'];
                    $post->title = $request['title'];
                    $post->file =  $temp_name;
                    $message = 'There was an error';
                    if ($request->user()->posts()->save($post)) {
                        $message = 'Post successfully created!';
                    }
                    return redirect()->route('post.index')->with(['message' => $message]);
                }
                
// public function show($post_id)
//     {
//         $post = Post::where('id', $post_id)->first();
//         if (Auth::user() != $post->user) {
//             return redirect()->back();
//         }
//         $post->delete();
//         return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
//     }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

    public function show(Request $request, $post_id)
    {
        // $nueva_cookie = cookie('nombre', 'valor', 2);
        // dd($nueva_cookie);
        // $cookie = \Cookie::forget('myCookie');


        $flight = Post::find($post_id);
            $ui = $flight->user_id;
            
            if ($ui !== Auth::user()->id)
            {
            $flight = Post::find($post_id);
            $vistas = $flight->visitas;
            $flight->visitas = $vistas+1;
            $flight->save();
            }

        $post = Post::find($post_id);
        $like = Like::where('stado','1')->count();
        $dislike = Like::where('stado','0')->count();
           return view('post.show', compact('post','like','dislike'));
    }

    // public function postLikePost(Request $request)
    // {
    //     $post_id = $request['postId'];
    //     $is_like = $request['isLike'] === 'true';
    //     $update = false;
    //     $post = Post::find($post_id);
    //     if (!$post) {
    //         return null;
    //     }
    //     $user = Auth::user();
    //     $like = $user->likes()->where('post_id', $post_id)->first();
    //     if ($like) {
    //         $already_like = $like->like;
    //         $update = true;
    //         if ($already_like == $is_like) {
    //             $like->delete();
    //             return null;
    //         }
    //     } else {
    //         $like = new Like();
    //     }
    //     $like->like = $is_like;
    //     $like->user_id = $user->id;
    //     $like->post_id = $post->id;
    //     if ($update) {
    //         $like->update();
    //     } else {
    //         $like->save();
    //     }
    //     return null;
    // }

}
