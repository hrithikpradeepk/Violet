<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registermodel;
use App\Models\loginmodel;


class registercontroller extends Controller
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
        return view('register');
        return view('login');
    }

    public function createlog()
    {
        return view('login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getname=request("name");
        $getemail=request("email");
        $getphone=request("phone");
        $getstate=request("state");
        $getpass=request("password");
        $getcpass=request("cpass");

     // $this->validate($request,[

        //    'name'=>'required',
        //    'email'=>'required|email',
        //    'phone'=>'required',
        //    'state'=>'required',
        //    'password'=>'required|max:10',
        //    'cpass'=>'required|max:10'


        // ]);

        if($getpass == $getcpass)
        {
           

        $register= new registermodel();
        $register->Name=$getname;
        $register->Email=$getemail;
        $register->Phonenum=$getphone;
        $register->State=$getstate;
       
        $register->save();

        $login=new loginmodel();
        $login->Username=$getphone;
        $login->Password=$getpass;
        $login->Usertype="Customer";

 
        
        $login->save();

        

        if($register && $login)
             {
               
                echo "<script>alert('Success.. Customer Added.....');window.location='/';</script>"; 
             }
             else{
                echo "<script>alert('Something went Wrong.......');window.location='/register';</script>"; 
             }


            
        }

        else{

            echo "<script>alert('Password is not correct......');window.location='/register';</script>"; 
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

    public function viewcust()
    {
        $datacust=registermodel::all();
        return view('viewcustomer',compact('datacust'));
    }


    public function addadmin(Request $request)
    {
        $getname=request('name');
        $getpass=request('pass');

        $login=new loginmodel();
        $login->Username=$getname;
        $login->Password=$getpass;
        $login->Usertype="admin";

 
        
        $login->save();

    }


    public function profile()
    {
        $data = ['LoggedUserInfo'=>registermodel::where('Name','=', session('sname'))->first()];
        return view ('profile',$data);
    }



    public function check(Request $request)
    {
        $getuser=request('UserName');
        $getpass=request('password');
        //$name=$request->input();
        // $request->session()->put('sname',$getuser);
        // echo session('sname');
        $u=loginmodel::select('UserName')->where('Username','like',"$getuser")->first();
        
        if(!$u)
        {
            echo "<script>alert('Password is not correct......');window.location='/login';</script>"; 
         
        }
        else
        {
        //echo $u->mailid;
        $p=loginmodel::select('password')->where('UserName','like',"$getuser")->first();
        //echo $p->password;
        
        
            if($p->password == $getpass)
            {
                $ut=loginmodel::select('usertype')->where('UserName','like',"$getuser")->first();
                //echo $ut->usertype;
                if($ut->usertype == 'Customer')
                {
                    $i=registermodel::where('Phonenum','like',"$getuser")->first();
                    $request->session()->put('sname',$i->Name);
                    echo 'sname';
                    echo "customer";
                    return redirect('/chome');
                }
                
                else if($ut->usertype=='admin')
                {
                    $i=loginmodel::select('Username')->where('Username','like',"$getuser")->first();
                    $request->session()->put('sname','admin');

                    // echo session('sname');
                    // echo "customer";
                    return redirect('/adminhome');
                    // return redirect('/');
                    echo "admin";
                }
            }
            else
            {
                echo "invalid user";
                // return redirect('/');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataprofile=registermodel::find($id);
        return view('editprofile',compact('dataprofile'));
    }

    public function pass()
    {
        
        return view('changepass');
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
        $profile=registermodel::find($id); 
        $getname=request("name");
        $getemail=request("email");
        
        $getstate=request("state");

        $profile->Name=$getname;
        $profile->Email=$getemail;
    
        $profile->State=$getstate;
       
        $profile->save();


        echo "<script>alert('Succesfully edited......');window.location='/myprofile';</script>"; 
       
    }

    public function update2(Request $request)
    {
       
        $getoldpass=request('oldpass');
        $getnewpass=request('newpass');
        $confirmpass=request('cnewpass');
        $data = registermodel::where('Name','=', session('sname'))->first();
        $getphone=$data->Phonenum;
       
        $login=loginmodel::where('Username','=',$getphone)->first();
        $getpass=$login->Password;
        
        if($getoldpass==$login->Password)
        {
            if($getnewpass==$confirmpass)
            {
                $change=loginmodel::where('Username','=',$getphone)->update(['Password'=>$getnewpass]); 
                return redirect('/myprofile');
      
            }
            else{

                echo "<script>alert('New Password and Confirm Password must be same');window.location='/changepass';</script>"; 

            }

        }
        else
        {
            echo "<script>alert('Inputed Old Password is not recognized');window.location='/changepass';</script>"; 

    
        }
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
