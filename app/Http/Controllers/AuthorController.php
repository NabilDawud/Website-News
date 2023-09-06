<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('id', 'desc')->simplePaginate(7);

        return response()->view('cms.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return response()->view('cms.author.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mobile' => 'required|numeric',
            'address' => 'required|string',
            'date' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'city_id' => 'required|numeric',
            'image' => 'image|max:2048|mimes:png,jpeg,jpg,pdf',
        ]);
        if (!$validator->fails()) {
            $authors = new Author();
            $authors->email = $request->input('email');
            $authors->password = Hash::make($request->input('password'));
            $issaved = $authors->save();
            // $authors =Author::create($request->all());


            if ($issaved) {
                $users = new User();

                if(request()->hasFile('image')){
                    $image =$request->file('image');
                    $imageName = time() . 'image' .$image->getClientOriginalExtension();
                    $image->move('storage/images/author', $imageName);
                    // $image->storeAs('storage/images/author', $imageName);
                    $users->image =$imageName;
                }
                $users->first_name = $request->input('first_name');
                $users->last_name = $request->input('last_name');
                $users->gender = $request->input('gender');
                $users->status = $request->input('status');
                $users->mobile = $request->input('mobile');
                $users->address = $request->input('address');
                $users->date = $request->input('date');
                $users->city_id = $request->input('city_id');
                $users->actor()->associate($authors);
                // $users =User::create($request->all());

                $issaved = $users->save();

                return response()->json([
                        'icon' => 'success',
                        'title' => 'Created Author is Successfully',
                    ], 200);
            }
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $authors = Author::findOrFail($id);
        return response()->view('cms.author.edit' , compact('authors' ,'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mobile' => 'required|numeric',
            'address' => 'required|string',
            'date' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'city_id' => 'required|numeric',
            'image' => 'image|max:2048|mimes:png,jpeg,jpg,pdf',


        ]);
        if (!$validator->fails()) {
            $authors = Author::findOrFail($id);
            $authors->email = $request->input('email');
            // $authors->password = Hash::make($request->input('password'));
            $isupdate = $authors->save();
            // $authors =Author::create($request->all());

            if ($isupdate) {
                $users = $authors->user;

                if(request()->hasFile('image')){
                    $image =$request->file('image');
                    $imageName = time() . 'image' .$image->getClientOriginalExtension();
                    $image->move('storage/images/author', $imageName);
                    // $image->storeAs('storage/images/author', $imageName);
                    $users->image =$imageName;
                }
                $users->first_name = $request->input('first_name');
                $users->last_name = $request->input('last_name');
                $users->gender = $request->input('gender');
                $users->status = $request->input('status');
                $users->mobile = $request->input('mobile');
                $users->address = $request->input('address');
                $users->date = $request->input('date');
                $users->city_id = $request->input('city_id');
                $users->actor()->associate($authors);
                // $users =User::create($request->all());

                $isupdate = $users->save();

                return [ 'redirect' => route('authors.index') ];

                // return response()->json([
                //         'icon' => 'success',
                //         'title' => 'Update Admin is Successfully',
                //     ], 200);
            }

        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = Author::destroy($id);

    }
}
