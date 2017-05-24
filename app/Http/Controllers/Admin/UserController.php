<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use UploadFile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->name;
        $users = User::search($name)->paginate(2);
        $users->appends(['name' => $name]);
        return view('admin.manage_user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $input = $request->all();
        //upload file
        $file = $request->file('avatar');
        $input['avatar'] = UploadFile::upload($file, 'images');
        if ($user->create($input)) {
            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.create')->with('message', trans('messages.create_failed'));
        }
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
        try {
            $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('message', trans('messages.id_errors'));
        }
        
        return view('admin.manage_user.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = new User;
        $user = $user->find($id);
        $input = $request->all();
        //upload file
        $file = $request->file('avatar');
        if ($request->hasFile('avatar')) {
            $input['avatar'] = UploadFile::upload($file, 'images');
        }
        if ($user->update($input)) {
            return redirect()->route('user.edit', [$id])->with('message', trans('messages.update_success'));
        } else {
            return redirect()->route('user.edit', [$id])->with('message', trans('messages.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::findOrFail($id);
        if ($request->ajax()) {
            $user->delete($id);
            return response(['status' => trans('messages.success')]);
        }

        return response(['status' => trans('messages.failed')]);
    }
}
