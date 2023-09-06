<?php

namespace App\Http\Controllers;

use App\Models\Country;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::withCount('cities')->orderBy('id', 'desc')->withoutTrashed()->paginate(7);
        // $countries = Country::orderBy('id','desc')->simplePaginate(7);
        return response()->view('cms.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = validator($request->all(),[
            'name' => 'required|string|min:3|max:20',
            'code' => 'required|numeric|digits:3'
        ],[
            'name.required' => 'حقل اسم الدولة مطلوب',
            'code.required' => 'حقل كود الدولة مطلوب',
            'name.numeric' => 'يجب اضافة نص فقط',
        ]);
        if($validator->fails()){

            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ],400);

        }else{

            $countries = new Country();
            $countries->name =$request->get('name');
            $countries->code = $request->input('code');
            // $countries->code =$request->post('code');

            if($countries->save()){
                return response()->json([
                    'icon' =>'success',
                    'title' => 'Created is Successfully',

                ],200);
            }

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
        $countries = Country::findOrFail($id);

        return response()->view('cms.country.show', compact('countries'));
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
        $countries = Country::findOrFail($id);
        // $countries->name ="Palestine";
        // $countries->save();
        return response()->view('cms.country.edit', compact('countries'));
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

        $validator = Validator($request->all() ,[

            'name' => 'sometimes|required|string|min:3|max:20',
            'code' => 'sometimes|required|numeric|digits:3',

        ]);

        if($validator->fails()){
          return  response()->json([
            'icon' => 'error',
            'title'=> $validator->getMessageBag()->first(),
          ],400);

        }else{
            $countries = Country::findOrFail($id);
            $countries->name = $request->get('name');
            $countries->code = $request->get('code');
            
            $countries->save();
            return ['redirect' => route('countries.index')];
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
        $countries = Country::destroy($id);
    }

    public function trashed(){
        $countries =Country::onlyTrashed()->orderBy('deleted_at','desc')->simplePaginate(8);
        
        return response()->view('cms.country.trashed' , compact('countries'));
    }
    public function restore($id){
        $countries =Country::onlyTrashed()->findOrFail($id)->restore();
         
        // return redirect()->route('countries-trashed');
        return back()->with('success','success');
    }
    public function force($id){
        $countries =Country::onlyTrashed()->findOrFail($id)->forceDelete();
         
        // return redirect()->route('countries-trashed');
        return back()->with('success','success');
    }
    public function deleteAll(){
        $countries =Country::onlyTrashed()->forceDelete();
         
        // return redirect()->route('countries-trashed');
        return back()->with('success','success');
    }
}
