@extends('admintheme')


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
        
        <!-- Hero Area End -->
        <!--================login_part Area =================-->
     
                <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>Add New Category</h2>
                                <p>Add a new category for the shirts!</p><br>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                
                    
                                <h3>Welcome Back Admin! <br>
                                    Add Category,  </h3>
                                <form class="row contact_form" action="/addcategory1" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                {{csrf_field()}}
                               

                                <div class="col-md-12 form-group p_star" style='max-width:40%'>
                                
                                
                                   
                                    </div>
                                                                
                                        <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                            placeholder="Category Name">
                                        <table>
                                        <tr>
                                            <td></td>
                                            <td><input  name="cimage" type="file" class="form-control"></td>
                                        </tr>
                                        </table>
                                    </div>
        
                                    <div class="col-md-12 form-group">
                                      
                                        <button type="submit" value="submit" class="btn_3">
                                            Add
                                        </button>
                                       
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