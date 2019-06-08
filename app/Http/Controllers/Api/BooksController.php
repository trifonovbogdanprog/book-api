<?php

namespace App\Http\Controllers\Api;

use App\Books;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Books::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->checkAuth($request->header('Authorization'));
        $request['owner_id'] = $user->id;
        $books = Books::create($request->all());
        return $books;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Books::findOrFail($id);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->checkAuth($request->header('Authorization'));
        if(!$user)
            return 'Auth don`t correct!';

        $books = Books::where('id', $id)->where('owner_id', $user->id);
        if($books){
            $books->update($request->all());
            return $books;
        }

        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = $this->checkAuth($request->header('Authorization'));

        $book = Books::where('id', $id)->where('owner_id', $user->id);

        return response()->json($book);
    }

    private function checkAuth($token)
    {
        $user = User::where('auth_token', $token)->first();

        return $user ? $user : false;
    }

}
