@extends('theme')


@section('content')
<body>
    <header>
        
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        
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
                                <h2>New to our Shop?</h2>
                                <p>Register to explore the wide variety of branded shirts</p>
                                <a href="/register" class="btn_3">Create an Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br><br>
                                    Please Sign in now</h3>
                                <form class="row contact_form" action="/login1" method="post" novalidate="novalidate">
                                {{csrf_field()}}
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="UserName" value=""
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="password" value=""
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="creat_account d-flex align-items-center">
                                            <input type="checkbox" id="f-option" name="selector">
                                            <label for="f-option">Remember me</label>
                                        </div>
                                        <button type="submit" value="submit" class="btn_3">
                                            log in
                                        </button>
                                        <a class="lost_pass" href="#">forgot password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->
    </main>
   
    
 @endsection