<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($newsId)
    {
        return view('comments.create', [
            'news' => News::where('id', $newsId)->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $newsId)
    {
        $error = false;
        $messages = [];

        try {
            $news = News::where('id', $newsId)->first();

            $comment = new Comment();

            $comment->username = $request['username'];
            $comment->comment_text = $request['comment'];

            $news->addComment($comment);

            $messages[] = "Comment successfully created";
        } catch (\Exception $e) {
            $error = true;
            $messages[] = $e->getMessage();
        }

        return response()->json([
            'error' => $error,
            'messages' => $messages
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($newsId, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
