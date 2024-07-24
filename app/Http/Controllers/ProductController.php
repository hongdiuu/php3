<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        //
        // Khởi tạo model
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadDataWithPager();
        // Truy vân + logic
        $objCate = new Category();
        $listCate = $objCate->loadAllCate();
        $arrayCate = [];
        foreach ($listCate as $value){
            $arrayCate[$value->id] = $value->name;
        }
        $this->view['listCate'] =  $arrayCate;
            ///
//        dd( $this->view['listCate']);
        return view('product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        return view('product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate(
            [
                'name'=>['required','string','max:255'],
                'price'=>['required','integer','min:1'],
                'quantity'=>['required','integer','min:1'],
                'image'=>['required','image','mimes:jpg,png,jpeg','max:2048'],
                'category_id'=>['required','exists:categories,id'],
            ],
            [
                'name.required'=>'Tên không được bỏ trống',
                'name.string'=>'Tên phải là chuỗi',
                'name.max'=>'Tên không được quá 255 ký tự',
                'price.required' => 'Giá không được bỏ trống',
                'price.integer' => 'Giá phải là số nguyên',
                'price.min' => 'Giá không được nhỏ hơn 1',
                'quantity.required' => 'Số lượng không được bỏ trống',
                'quantity.integer' => 'Số lượng phải là số nguyên',
                'quantity.min' => 'Số lượng không được nhỏ hơn 1',
                'image.required' => 'Hình ảnh không được bỏ trống',
                'image.image' => 'Tệp tin phải là hình ảnh',
                'image.mimes' => 'Hình ảnh chỉ hỗ trợ định dạng jpg, png, jpeg',
                'image.max' => 'Kích thước hình ảnh không được quá 2048KB',
                'category_id.required' => 'Vui lòng chọn danh mục',
                'category_id.exists' => 'Danh mục không tồn tại',
                
            ]
        );
        // $product = new Product;
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;

        // if($request->hasFile('image')){
        //     $file =$request->file('image');
        //     $extension=$file->getClientOriginalExtension();//lấy tên mở rộng .jpg, .png...
        //     $filename=time().'.'.$extension;
        //     $file->move('uploads/sanpham/',$filename);
        //     $product->image=$filename;
        //    }
        // $product->category_id = $request->category_id;

        // $product->save();
        // return redirect()-> back()-> with('message', 'Thêm sản phẩm thành công');
           dd($request->all());
    
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}