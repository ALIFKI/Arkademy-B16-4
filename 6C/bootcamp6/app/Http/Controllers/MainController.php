<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Redirect,Response;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product::all();

        return view('home',[
            'product' => $data
        ]);
        
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
        // dd($request->all());
        $r=$request->validate([
            'name' => 'required',
            'cashier' => 'required',
            'category' => 'required',
            'price' => 'required',
            ]);
    
            $custId = $request->formid;
            product::updateOrCreate(['id' => $custId],
            ['name' => $request->name,
             'id_cashier' => $request->cashier,
             'id_category'=>$request->category,
             'price'=>$request->price ]);
            if(empty($request->cust_id)){
                $msg = 'Product has been updated';
            }
            else{
                $msg = 'Sucsessfully Add new product';
            }
            return redirect()->back()->with('success',$msg);
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
		$where = array('id' => $id);
		$product = product::where($where)->first();
		return Response::json($product);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();
		return Response::json($product)->with('success','Deleted');
    }
}
