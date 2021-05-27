@extends('theme')


@section('content')
<body>
     <header>
       
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!-- Hero Area Start-->
        
        <!-- Hero Area End-->
        <!--================login_part Area =================-->
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>Welcome Back !</h2>
                                <p>Please Sign in!  You are valuable for us</p>
                                <a href="/login" class="btn_3">Signin</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>New to our Shop? <br><br>
                                    Please Signup  now</h3>
                                <form class="row contact_form" action="register" method="post" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                            placeholder="Name" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="email" name="email" value=""
                                            placeholder="Email" required>
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="phone" name="phone" value=""
                                            placeholder="Phone Number" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="state" name="state" value=""
                                            placeholder="State" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="password" value=""
                                            placeholder="Password" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="cpassword" name="cpass" value=""
                                            placeholder="ConfirmPassword" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                       
                                        <button type="submit" value="register" class="btn_3">
                                            Register
                                        </button>
                                       
                                    </div>
                                </form>
                            </div>
                           
                                </div> 
        <form class="row contact_form"  action="/addadmin" method="post">
                                {{csrf_field()}}
                                                             
                                <div class="login_part_text_iner">
                                
                                        <div class="col-md-12  form-group p_star">
                                        <br><BR><BR><BR><BR><BR><BR><BR><BR><BR>
                                        <h3 style="margin-left:150px;">ADMIN</h3>
                                       
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                            placeholder="Username">
                                        </div>
                                        <div class="col-md-12  form-group p_star">
                                            <input type="text" class="form-control" id="name" name="pass" value=""
                                            placeholder=" Password">
                                         </div>
                                       
                                 </div>
        
                                    <div class="col-md-12 form-group">
                                      
                                        <button type="submit" value="submit" class="btn_3">
                                            Register
                                        </button>
                                       
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div>
                                    
        <!--================Register_part end =================-->
    </main>
   
    
 @endsection