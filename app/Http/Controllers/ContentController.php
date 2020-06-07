<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contents = Content::orderBy('created_at', 'desc')->get();
        return view('home.index', compact(
            'contents'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreate() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $links = explode("\n", $request->links);

            $content = new Content;
            $content->unit_name = $request->unit_name;
            $content->unit_name_abbrev = strtoupper($request->unit_name_abbrev);
            $content->links = $links ? serialize(array_filter($links,
                              function($value) { return $value !== "\n" || !empty($value); })) : NULL;
            $content->save();

            return redirect('/')->with('success', 'Content successfully added.');
        } catch (\Throwable $th) {
            return redirect('/')->with('failed', 'There is an error! Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEdit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            $links = explode("\n", $request->links);

            $content = Content::find($id);
            $content->unit_name = $request->unit_name;
            $content->unit_name_abbrev = strtoupper($request->unit_name_abbrev);
            $content->links = $links ? serialize(array_filter($links,
                              function($value) { return $value !== "\n" || !empty($value); })) : NULL;
            $content->save();

            return redirect('/')->with('success', 'Content successfully updated.');
        } catch (\Throwable $th) {
            return redirect('/')->with('failed', 'There is an error! Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            Content::destroy($id);

            return redirect('/')->with('success', 'Content successfully deleted.');
        } catch (\Throwable $th) {
            return redirect('/')->with('failed', 'There is an error! Please try again.');
        }
    }
}
