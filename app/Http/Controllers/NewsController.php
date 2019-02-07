<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $error = false;
        $messages = [];

        try {
            $news = new News();

            $news->news_title = $data['title'];
            $news->news_description = $data['description'];
            $news->news_link = $data['url'];
            $news->num_upvotes = 0;

            $news->save();

            $messages[] = "News created successfully";
        } catch (\Exception $e) {
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
    public function edit($id)
    {
        $news = News::where('id', $id)->first();

        return view('news.edit', ['news' => $news]);
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
        $data = $request->all();
        $error = false;
        $messages = [];

        try {
            $news = News::where('id', $id)->first();

            $news->news_title = $data['title'];
            $news->news_description = $data['description'];
            $news->news_link = $data['url'];
            $news->num_upvotes = 0;

            $news->save();

            $messages[] = "News created successfully";
        } catch (\Exception $e) {
            $messages[] = $e->getMessage();
        }

        return response()->json([
            'error' => $error,
            'messages' => $messages
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            News::destroy('id', $id);
        } catch(\Exception $e) {
            dd($e->getMessage());
        }

//        return route('news.create');
    }
}
