<?php

namespace App\Http\Controllers;

use App\Spending;
use App\User;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spending = Spending::orderBy('created_at','DESC')->with('users')->paginate(env('APP_PAGINATE'));

        return view('back.spendings.index',compact('spending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
        return view('back.spendings.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'price'       => 'required|numeric',
            'description' => 'required',
            'users'        => 'required',
            'users.*'     => 'required|numeric'
        ]);


        $part = count($request->users); // nombre de personne qui ont été coché


        $spending = Spending::create($request->all()); // assignation de masse

        $spending->users()->attach($request->users, ['price' => $request->price/$part]);

        return redirect()->route('spending.index')->with('message', ['type' => 'succes', 'content' => 'Succes']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spendings = Spending::find($id);

        return view('back.spendings.show', compact('spendings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spending = Spending::find($id);
        $users = User::pluck('name','id')->all();

        $checkedUsers = $spending->users()->pluck('id')->all(); // utilisateurs sélectionnés

        return view('back.spendings.edit', compact('spending', 'checkedUsers','users') );
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
        $spending = Spending::find($id);
        $spending->update($request->all());

        $spending->users()->detach();
        $part = count($request->users);
        $spending->users()->attach($request->users, ['price' => $request->price/$part]);


        return redirect()->route('spending.index')->with('message', [
            'type' => 'succes',
            'content' => 'Succes']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $spending = Spending::find($id);
        $spending->delete();

        return redirect()->route('spending.index')->with('message' , [
            'type' => 'success',
            'content' => 'Success Deleted'
        ]);
    }
}
