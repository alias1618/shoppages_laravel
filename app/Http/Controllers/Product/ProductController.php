<?php

namespace App\Http\Controllers\Product;

//use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function add(request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'product_name'          => 'required',
            'product_number'        => 'required',
            'product_price'         => 'required',
            'product_describe'      => 'required',
            'product_status_id'     => 'required',
            'product_category_id'   => 'required',
            'product_buy_price'     => 'required',
            'file' => 'required|mimes:jpeg,bmp,png'
        ]);

        if ($validator->fails()){
            return redirect('add')
                            ->withErrors($validator)
                            ->withInput();
        }
    

    $input = [  'product_name'          =>request()->product_name,
                'product_number'        =>request()->product_number,
                'product_price'         =>request()->product_price,
                'product_describe'      =>request()->product_describe,
                'product_status_id'     =>request()->product_status_id,
                'product_category_id'   =>request()->product_category_id,
                'product_buy_price'     =>request()->product_buy_price,
                //'rememberToken'=>request()->_token
            ];
    $prodcutname = request()->product_name;


    $toupload = [  
        'product_id'          =>request()->product_id,
        'file'                =>request()->file,
    ];


        DB::table('product')->insert($input);

        

        $fileName = Str::random(20).'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $fileName);

        $product_id = DB::table('product')->select('product_id')->where('product_name','=', $prodcutname)->value('product_id');

        
        $inputDB = [
            'product_id'            =>  $product_id,
            'product_photo_name'    =>  $fileName
        ];
        DB::table('photo')->insert($inputDB);

        return redirect()->route('product');

        
    }
/*
    public function fileupload($toupload){

        //$picture = $toupload->only(['file']);

        $validator = Validator::make($toupload,[
            //$this->validate($picture,[
            'file' => 'required|mimes:jpeg,bmp,png',
        ]);
            //
        $fileName = Str::random(20).'.'.$toupload->file->extension();  
   
        $toupload->file->move(public_path('uploads'), $fileName);
        
        $inputDB = [
            'product_id'            =>  $toupload->product_id,
            'prodcut_photo_name'    =>  $fileName
        ];
        DB::table('photo')->insert($inputDB);

        return redirect()->route('product');
        
    }
*/

    public function management(){
        $product = DB::table('product')
            ->join('photo', 'product.product_id', '=', 'photo.product_id')
            ->join('product_category', 'product.product_category_id', '=', 'product_category.product_category_id')
            ->join('product_status', 'product.product_status_id', '=', 'product_status.product_status_id')
            //->join('photo', 'product.product_id', '=', 'photo.product_id')
            ->groupBy('product.product_id')
            ->orderBy('product.product_id', 'asc')
            ->get();

        return View('management/product')
                    ->with('product',$product);
    }

    public function toedit($product_id){
        $product = DB::table('product')->where('product_id',$product_id)->get();
        return view('management/product_edit')
                ->with('product_id', $product_id)
                ->with('product', $product);
    }

    public function toupdate(Request $request){

        $validator = Validator::make($request->all(),[
            'product_name'          => 'required',
            'product_number'        => 'required',
            'product_price'         => 'required',
            'product_buy_price'     => 'required',
            'product_status_id'     => 'required',
            'product_category_id'   => 'required',
            'product_describe'      => 'required'
        ]);

        if ($validator->fails()){
            return redirect('toedit_prodcut')
                            ->withErrors($validator)
                            ->withInput();
        }

        $input = [
        'product_id'            =>request()->product_id,    
        'product_name'          =>request()->product_name,
        'product_number'        =>request()->product_number,
        'product_price'         =>request()->product_price,
        'product_buy_price'     =>request()->product_buy_price,
        'product_status_id'     =>request()->product_status_id,
        'product_category_id'   =>request()->product_category_id,
        'product_describe'      =>request()->product_describe,
        //'rememberToken'=>request()->_token
    ];

        //$input = request()->all();
        //echo $data;
        DB::table('product')->where('product_id',$input)->update($input);

        return redirect()->route('product');
    }
}
