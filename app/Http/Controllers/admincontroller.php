<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorymodel;
use App\Models\brandmodel;
use App\Models\productmodel;
use App\Models\cartmodel;
use App\Models\registermodel;
use App\Models\ordermodel;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\DB;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    public function index()
    {
        $categorydata = categorymodel::all();
        return view ('addbrand',compact('categorydata'));
    }


    public function index1()
    {

        $categorydata = categorymodel::all();
        return view ('addproduct',compact('categorydata'));
    }
    


    public function adminhome()
    {

        return view('adminhome');
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

    public function viewcat()
    {
        $category=categorymodel::all();

        return view('viewcategory',compact('category'));
    }

    public function viewcatt()
    {
        $category=categorymodel::all();

        return view('categories',compact('category'));
    }

    public function viewcatt2()
    {
        $category=categorymodel::all();

        return view('custcategories',compact('category'));
    }

    public function viewbrand()
    {
        $databrand=brandmodel::all();

        return view('viewbrand',compact('databrand'));
    }

    public function viewproduct()
    {
        $dataproduct=productmodel::all();
        return view('viewproduct',compact('dataproduct'));
    }

    public function view()
    {
        $data=categorymodel::all();
        return view('addbrand',compact('data'));
    }
    
    public function viewcategory()
    {
        $category=categorymodel::all();

        return view('editbrand',compact('category'));
    }

    public function view2()
    {
        $data=categorymodel::all();
        $databrand=brandmodel::all();
        return view('addproduct',compact('data','databrand'));
    }



    public function cbrand1()
    {

        return view('cbrand');
    }




    public function cbrand2($id)
    {
        $databrand=categorymodel::find($id);
        $brand=brandmodel::where('categoryid','=',$databrand->id)->get();
        return view('cbrand',compact('brand','databrand'));
    }

    public function ccbrand1()
    {

        return view('ccbrand');
    }




    public function ccbrand2($id)
    {
        $databrand=categorymodel::find($id);
        $brand=brandmodel::where('categoryid','=',$databrand->id)->get();
        return view('ccbrand',compact('brand','databrand'));
    }

    public function cproduct1()
    {

        return view('cproduct');
    }




    public function cproduct2($id)
    {
        $dataproduct=brandmodel::find($id);
        $product=productmodel::where('brandid','=',$dataproduct->id)->get();
        return view('cproduct',compact('product','dataproduct'));
    }

    public function ccproduct1()
    {

        return view('ccproduct');
    }




    public function ccproduct2($id)
    {
        $dataproduct=brandmodel::find($id);
        $product=productmodel::where('brandid','=',$dataproduct->id)->get();
        return view('ccproduct',compact('product','dataproduct'));
    }

    public function cproductdetails1()
    {

        return view('cproductdetails');
    }




    public function cproductdetails2($id)
    {
        $product=productmodel::find($id);
        return view('cproductdetails',compact('product'));

    }

    public function productdetails1()
    {

        return view('productdetails');
    }



    public function productdetails2($id)
    {
        $product=productmodel::find($id);
        return view('productdetails',compact('product'));

    }

    public function checkout()
    {
        $data = registermodel::where('Name','=', session('sname'))->first();
        $getid=$data->id;
        $product=cartmodel::where('Customerid','=',$getid)->get();
        $total=$products=DB::table('cartmodels')
        ->join('productmodels','cartmodels.Productid','=','productmodels.id') 
        ->where('cartmodels.Customerid',$getid)
        ->sum('cartmodels.total');
        return view('checkoutt',compact('product','total'));

    }


    public function bill()
    {
        
        $datacart = registermodel::where('Name','=', session('sname'))->first();
        $data = cartmodel::where('Customerid','=',$datacart->id)->delete();
        return view('chome');
    }

    


    public function invoice()
    {
        $data = registermodel::where('Name','=', session('sname'))->first();
        $getid=$data->id;
        
        $product=cartmodel::where('Customerid','=',$getid)->get();
        $product1=cartmodel::where('Customerid','=',$getid)->first();
        $cartid=$product1->id;
    
        $total=$products=DB::table('cartmodels')
        ->join('productmodels','cartmodels.Productid','=','productmodels.id') 
        ->where('cartmodels.Customerid',$getid)
        ->sum('cartmodels.total');
        
        $dataorder=ordermodel::where('Customerid','=',$getid)->first();
        

        return view('invoice',compact('product','total','cartid','dataorder'));

    }

    public function order(Request $request)
    {
        $data = registermodel::where('Name','=', session('sname'))->first();
        $getid=$data->id;

        $carts=DB::table('cartmodels')
        ->where('Customerid','=',$getid)->get();
        $cdate = Carbon::now();
        $Orderdate=$cdate->toDateString();
        foreach($carts as $cart)
        {
            $products=DB::table('productmodels')
            ->where('id','=',$cart->Productid)->get();
            foreach($products as $product)
            {
                $order=new ordermodel();
                $order->Customerid=$getid;
                $order->Productid=$cart->Productid;
                $order->Orderqty=$cart->qty;
                $order->price=$product->price;
                $order->total=($cart->qty)*($product->price);
                $order->Orderdate=$cdate;

                $fname=request("firstName");
                $lname=request("lastName");
                $email=request('email');
                $phone=request('phone');
                $hname=request("hname");
                $city=request("city");
                $state=request("state");
                $zip=request("zip");


                $order->Fname=$fname;
                $order->Lname=$lname;
                $order->Email=$email;
                $order->Phone=$phone;
                $order->Hname=$hname;
                $order->City=$city;
                $order->State=$state;
                $order->Pincode=$zip;

                $order->save(); 
                
               
              
            }
        }
        echo "<script>alert('Your Order is succesfully placed! Thank You');window.location='/invoice';</script>";
       // return redirect('/invoice');
    }
    


    public function createcart()
    {

        return view('cart');
    }

    public function cartstore(Request $request)
    {
        $data = registermodel::where('Name','=', session('sname'))->first();
        $getid=$data->id;
        if($request->session()->has('sname'))
       {
           $cart=new cartmodel;

           $getQty= request('qty');

           $cart->qty=$getQty;

           $cart->Customerid=$getid;
           $cart->Productid=$request->Productid;

           $data=productmodel::select('price')->where ('id','=',$request->Productid)->first();
           $amount=$data->price*$getQty;

           $cart->total=$amount;


          
           $cart->save();
           return redirect('/viewcart');
       }
       else{
        return redirect('/login');
       }

    }

    public function viewcart()
    {
       
        $custid = registermodel::where('Name','=', session('sname'))->first();
        $getid=$custid->id;

        
       $data=DB::table('cartmodels')
       ->join('productmodels','cartmodels.Productid','=','productmodels.id') 
       ->where('cartmodels.Customerid',$getid)
       ->select('cartmodels.*')
       ->get();

       

      $test = cartmodel::with('product')
      ->join('productmodels','cartmodels.Productid','=','productmodels.id') 
       ->where('cartmodels.Customerid',$getid)
       ->select('cartmodels.*')
      ->get();
   

       return view('cart',['data'=>$data,'test'=>$test]);
    }


    static public function totalprice(){
        $customerid = registermodel::where('Name','=', session('sname'))->first();
        $getid=$customerid->id;
        $carts=DB::table('cartmodels')
        ->where('Customerid','=', $getid)->get();

        $total=0;
        foreach($carts as $cart)
        {
            $products=DB::table('productmodels')
            ->where('id','=',$cart->Productid)->get();
            foreach($products as $product)
            {
                $total=$total+($cart->total);
            }
        }
    return $total;
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        
        $bname=request("name");
        $category=request("category");
        $bimage=$request->file('bimage');
        $name=$bimage->getClientOriginalName();
        $userInfo = categorymodel::where('Categoryname','=', $category)->first();
        $bimage->move(public_path('assets/images'),$name);

        $this->validate($request,[
            'name'=>'required',
        ]);

        $brand = new brandmodel();

        $brand->Brandname=$bname;
        $brand->brandimage=$name;
        $brand->categoryid=$userInfo->id;
        
        $brand->save();
        echo "<script>alert('Successfully Added Brand');window.location='/addbrand';</script>";
         echo "success";

    }

    public function store2(Request $request)
    {
        
        $pname=request("name");
        $category=request("category");
        $brand=request("brand");
        $desc=request("desc");
        $price=request("price");
        $image=$request->file('pimage');
        $name=$image->getClientOriginalName();
        $userInfo = categorymodel::where('Categoryname','=', $category)->first();
        $UserInfo = brandmodel::where('Brandname','=', $brand)->first();
        $image->move(public_path('assets/images'),$name);

        $this->validate($request,[
            'name'=>'required',
        ]);

        $product = new productmodel();

        $product->Productname=$pname;
        $product->Productimage=$name;   
        $product->price=$price;
        $product->Description=$desc;
        $product->categoryid=$userInfo->id;
        $product->brandid=$UserInfo->id;
        $product->save();
        echo "<script>alert('Successfully Added Product');window.location='/addproduct';</script>";
        echo "success";

    }


    public function store(Request $request)
    {
        
        $cname=request("name");
        $cimage=$request->file('cimage');
        $name=$cimage->getClientOriginalName();

        $cimage->move(public_path('assets/images'),$name);

        $this->validate($request,[
            'name'=>'required',
        ]);

        $category = new categorymodel();

        $category->Categoryname=$cname;
        $category->Catimage=$name;

        $category->save();
        echo "<script>alert('Successfully Added Category');window.location='/addcategory';</script>";
         echo "success";

    }

    
    public function vieworders()
    {
        $data=ordermodel::all();
        return view('vieworders',compact('data'));
    }


    public function viewreport()
    {
        $data=ordermodel::all();
        return view('orderreport',compact('data'));
    }


    public function report()
    {
        $getdate1=request('date1');
        $getdate2=request('date2');
        $data=ordermodel::select('*')
        ->whereBetween('Orderdate', [$getdate1, $getdate2])->get();
        
        return view('orderreport',compact('data'));

    }


    public function myorders()
    {
        $custid = registermodel::where('Name','=', session('sname'))->first();
        $getid=$custid->id;
        $data=ordermodel::where('Customerid','=',$getid)->get();
        return view('myorders',compact('data'));
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
        $datacat=categorymodel::find($id);
        return view('editcategory',compact('datacat'));
    }

    public function edit1($id)
    {
        $databrand=brandmodel::find($id);
        $data=categorymodel::all();
        return view('editbrand',compact('databrand','data'));
    }

    public function edit2($id)
    {
        $dataproduct=productmodel::find($id);
        $data=categorymodel::all();
        $data2=brandmodel::all();
        return view('editproduct',compact('dataproduct','data','data2'));
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
        $category=categorymodel::find($id); 

      
    $getname=request("name");
    $getphoto=$request->file("cimage");
    $name=$getphoto->getClientOriginalName();
    $getphoto->move(public_path('assets/images'),$name);
        
    $category->Categoryname=$getname;
    $category->Catimage=$name;
        
        $category->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewcategory';</script>"; 
       
    }

    public function update1(Request $request, $id)
    {
        $brand=brandmodel::find($id); 


        $bname=request("name");
        $category=request("cat");
        $bimage=$request->file('bimage');
        $name=$bimage->getClientOriginalName();
        $userInfo = categorymodel::where('Categoryname','=', $category)->first();
        $bimage->move(public_path('assets/images'),$name);

        $this->validate($request,[
            'name'=>'required',
        ]);

        $brand->Brandname=$bname;
        $brand->brandimage=$name;
        $brand->categoryid=$userInfo->id;
        
        $brand->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewbrand';</script>"; 
       
    }

    public function update2(Request $request, $id)
    {

        $product=productmodel::find($id);

        $pname=request("name");
        $desc=request("desc");
        $category=request("category");
        $brand=request("brand");
        $price=request("price");
        $image=$request->file('pimage');
        $name=$image->getClientOriginalName();
        $userInfo = categorymodel::where('Categoryname','=', $category)->first();
        $UserInfo = brandmodel::where('Brandname','=', $brand)->first();
        $image->move(public_path('assets/images'),$name);

        $this->validate($request,[
            'name'=>'required',
        ]);

        

        $product->Productname=$pname;
        $product->Description =$desc;
        $product->Productimage=$name;   
        $product->price=$price;
        $product->categoryid=$userInfo->id;
        $product->brandid=$UserInfo->id;
        $product->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewproduct';</script>"; 
       
    }

    public function delete($id)
    {
        $datacat=categorymodel::find($id);
        $datacat->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewcategory';</script>"; 
        return redirect('/viewcategory');
    }

    public function cancel($id)
    {
        $data=ordermodel::find($id);
        $data->delete();
        echo "<script>alert('Your Order has been Cancelled......');window.location='/myorders';</script>"; 
        
    }

    public function delete1($id)
    {
        $databrand=brandmodel::find($id);
        $databrand->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewbrand';</script>"; 
        return redirect('/viewbrand');
    }

    public function delete2($id)
    {
        $dataproduct=productmodel::find($id);
        $dataproduct->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewproduct';</script>"; 
        return redirect('/viewproduct');
    }

    public function deleteitem($id)
    {
        $dataitem=cartmodel::find($id);
        $dataitem->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewcart';</script>"; 
       
    }
    

    public function deletecart()
    {
        $datacart = registermodel::where('Name','=', session('sname'))->first();
        $data = cartmodel::where('Customerid','=',$datacart->id)->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewcart';</script>"; 
        
    }

     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

