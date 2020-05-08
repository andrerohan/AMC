<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('name')->get();

        return view('layouts.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        try {

            $user = new User();

            $user = User::create([
                'name'       => $request->name,
                'email'      => $request->email,
                'password'   => bcrypt($request->password),
            ]);

            /*$role = Role::where('name', '=', 'User')->first();
            $user->attachRole($role);*/
        } catch (\Exception $e) {
            return $e;
        }

        session()->flash(
            'success',
            'Utilizador de ' . $request->name . ' criado com sucesso!'
        );

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('layouts.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('layouts.admin.users.edit', compact('user'));
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
        //return $request;

        $user = User::find($id);

        if ($request->password) {

            $this->validate($request, [

                'password' => 'required|confirmed|min:6',
            ]);


            $user->update([
                'password'     => bcrypt($request->password)

            ]);

            session()->flash(
                'success',
                'Password alterada com sucesso!'
            );

        }

        if($request->avatar){

                $avatar = $request->avatar;
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                //return $filename;
                Image::make($avatar)->resize(300,300)->save(public_path('/avatar/' . $filename));

                $user->avatar = '/avatar/' . $filename;
                $user->save();

        }

        if($request->name){

            $this->validate($request, [
                'name' => 'required|min:3|max:50',
            ]);

            $user->update([
                'name'     => $request->name,
            ]);

            session()->flash(
                'success',
                'Nome do Utilizador atualizado com sucesso!'
            );
        }


        return redirect('/admin/users/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);

        session()->flash(
            'error',
            'Utilizador: ' . $user->name . ' foi apagado!'
        );

        $user->delete();

        return redirect('/admin/users');
    }



}
