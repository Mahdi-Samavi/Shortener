<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Link;
use App\User;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shortened_id)
    {
        $link = Link::where('shortened', $shortened_id)->firstOrFail();

        return redirect($link->link);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-link');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $user = User::find(auth()->id());
        $shortened = now()->getTimestamp();

        $user->links()->create([
            'link' => $request->link,
            'shortened' => $shortened,
        ]);

        return redirect()->home()->with([
            'status' => $request->root() . '/' . $shortened,
        ]);
    }

    /**
     * Display the all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function views()
    {
        $links = User::find(auth()->id())->links;

        return view('links-view', compact('links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LinkRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
