@extends('theme')
@section('content')

    <!-- Page Add Section Begin -->
    
    <!-- Page Add Section End -->

    <!-- Product Page Section Beign -->
    
    <!-- Product Page Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                    <h2>Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                
                   
                    
            @foreach($category as $category)
          
                    <div class="col-lg-3 col-sm-6">
                    <div class="single-product-item">
                    <figure>
                       <h3 class="resume-title"><img width="1300px" height="400px" class="avatar" src="{{ URL::asset('assets/images/'.$category->Catimage) }}"></h5>
                    </figure>
                    <div class="product-text">
                       <h5 class="resume-title">{{$category->Categoryname }}</h5>
                       <a  href={{"/ccbrand/".$category->id}}>
                       <button style="background-color:black; padding: 20px 32px;"  class="btn btn-dark">View Brands</button></a>
                    </div>
                    </div>
                    </div>
                    
          @endforeach 
          
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

@endsection