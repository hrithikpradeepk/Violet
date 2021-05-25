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
                                <h2>Edit  Category</h2>
                                <p>Edit the already existing category!</p><br>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                
                    
                                <h3>Welcome Back Admin! <br>
                                    Edit Category,  </h3>
                                <form class="row contact_form" action="/categoryedit1/{{$datacat->id}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                {{csrf_field()}}
                               

                                <div class="col-md-12 form-group p_star" style='max-width:40%'>
                                
                                
                                   
                                    </div>
                                                                
                                        <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$datacat->Categoryname }}">
                                        <table>
                                        <tr>
                                            <td></td>
                                            <td><input  value="$datacat->Catimage" name="cimage" type="file" class="form-control"></td>
                                        </tr>
                                        </table>
                                    </div>
        
                                    <div class="col-md-12 form-group">
                                      
                                        <button onclick="return confirm('Are you sure?')" type="submit" value="submit" class="btn_3">
                                            EDIT
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
