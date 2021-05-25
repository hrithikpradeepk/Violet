@extends('newtheme')


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
     
     
                <section class="login_part section_padding ">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>Add New Brand</h2>
                                <p>Add a new Brand for the shirts!</p><br>
                                <p>Picture Dimensions <br> Height 960px  Width 640px</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                
                    
                                <h3>Welcome Back Admin! <br>
                                    Add Brand,  </h3>
                                <form class="row contact_form" action="/addbrand1" method="post" enctype="multipart/form-data" >
                                {{csrf_field()}}
                               

                                <div class="col-md-12 " style='max-width:40%'>
  
                                    </div>
                                                          
                                        <div class="col-md-12 ">
                                        <table> 
                                        <tr>
                                            <td>

                                            <select name="category" id="category" class="form-control" >

                                            @foreach($data as $category)
                                            <option>{{$category->Categoryname }}</option>
                                            @endforeach 
                                            </select>
                                            </td>
                                            </tr>
                                            <tr>
                                            <td>  <input type="text" class="form-control" id="name" name="name" value=""  placeholder="Brand Name"></td>
                                                </tr>
                                                    <td><input  name="bimage" type="file" class="form-control"></td>
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