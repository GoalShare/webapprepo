<?php namespace App\Http\Controllers;

use App\Comments;
use App\Posts;
use App\User;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Like;
use Auth;
use Image;

use Illuminate\Http\Request;

// note: use true and false for active posts in postgresql database
// here '0' and '1' are used for active posts because of mysql database

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Posts::where('active', '1')->orderBy('created_at', 'desc')->paginate(5);
        $title = 'Latest Posts';

        return view('blog.blog')->withPosts($posts)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        //
        if ($request->user()->can_post()) {
            return view('posts.create');
        } else {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostFormRequest $request)
    {
        $post = new Posts();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = str_slug($post->title);


        $duplicate = Posts::where('slug', $post->slug)->first();


        if ($request->hasfile('coverimg')) {
            $file = $request->file('coverimg');
            if ($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'jpeg') {
                $filename = time() . '1.' . $file->getClientOriginalExtension();
              Image::make($file)->resize(848,516)->save(public_path('images/' . $filename));

                $post->cover = $filename;
            } else {
                $filename = 0;
                $post->cover = $filename;
            }

        } else {
            $filename = 0;
            $post->cover = $filename;
        }


        if ($duplicate) {
            return redirect('new-post')->withErrors('Title already exists.')->withInput();
        }

        $post->author_id = $request->user()->id;
        if ($request->has('save')) {
            $post->active = 0;
            $message = 'Post saved successfully';
        } else {
            $post->active = 1;
            $message = 'Post published successfully';
        }
        $post->save();
        return redirect('edit/' . $post->slug)->withMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($slug)
    {
        $post = Posts::where('slug', $slug)->first();

        if ($post) {
            if ($post->active == false)
                return redirect('/')->withErrors('requested page not found');
            $comments = $post->comments;
        } else {
            return redirect('/')->withErrors('requested page not found');
        }
        return view('posts.show')->withPost($post)->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Request $request, $slug)
    {
        $post = Posts::where('slug', $slug)->first();
        if ($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
            return view('posts.edit')->with('post', $post);
        else {
            return redirect('/')->withErrors('you have not sufficient permissions');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request)
    {
        //
        $post_id = $request->input('post_id');
        $post = Posts::find($post_id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $title = $request->input('title');
            $slug = str_slug($title);
            $duplicate = Posts::where('slug', $slug)->first();
            if ($duplicate) {
                if ($duplicate->id != $post_id) {
                    return redirect('edit/' . $post->slug)->withErrors('Title already exists.')->withInput();
                } else {
                    $post->slug = $slug;
                }
            }

            if ($request->hasfile('coverimg')) {
                $file = $request->file('coverimg');
                if ($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'jpeg') {
                    $filename = time() . '1.' . $file->getClientOriginalExtension();
                    Image::make($file)->resize(848,516)->save(public_path('images/' . $filename));

                    $post->cover = $filename;
                } else {

                }

            } else {

            }


            $post->title = $title;
            $post->body = $request->input('body');

            if ($request->has('save')) {
                $post->active = 0;
                $message = 'Post saved successfully';
                $landing = 'edit/' . $post->slug;
            } else {
                $post->active = 1;
                $message = 'Post updated successfully';
                $landing = $post->slug;
            }
            $post->save();
            return redirect($landing)->withMessage($message);
        } else {
            return redirect('/')->withErrors('you have not sufficient permissions');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $post = Posts::find($id);

        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $post->delete();
            $post->comments()->delete();

            $data['message'] = 'Post deleted Successfully';
        } else {
            $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
        }

        return redirect('/blog')->with($data);
    }


    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Posts::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
