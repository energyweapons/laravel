<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()
            ->select('id', 'name', 'email', 'created_at', 'updated_at')
            ->latest('created_at')
            ->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $dataToSave = $request->all();

        $password = Hash::make($request->input('password'));
        $dataToSave['password'] = $password;

        User::create($dataToSave);

        session()->flash('success_message', 'เพิ่มผู้ใช้สำเร็จ');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()
            ->select('id', 'name', 'email')
            ->firstOrFail($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()
            ->select('id', 'name', 'email')
            ->firstOrFail($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::query()
            ->select('id', 'name', 'email')
            ->firstOrFail($id);

        $dataToSave = $request->all();

        if ($request->has('password') && $request->input('password') !== null) {
            $password = Hash::make($request->input('password'));
            $dataToSave['password'] = $password;
        } else {
            $dataToSave = Arr::except($dataToSave, ['password']);
        }

        $user->update($dataToSave);

        session()->flash('success_message', 'แก้ไขผู้ใช้สำเร็จ');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::query()
            ->select('id', 'name', 'email')
            ->firstOrFail($id);

        $user->delete();

        session()->flash('success_message', 'ลบผู้ใช้สำเร็จ');

        return redirect()->route('users.index');
    }
}
