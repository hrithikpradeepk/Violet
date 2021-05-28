<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Invoice of Purchase</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
                                <style> .body-main {
     background: #ffffff;
     border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     box-shadow: 0 1px 21px #808080;
     font-size: 10px
 }

 .main thead {
     background: #1E1F23;
     color: #fff
 }

 .img {
     height: 100px
 }

 h1 {
     text-align: center
 }</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'></script>
                                <script type='text/javascript'></script>


                                
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <?php
use App\Http\Controllers\admincontroller;
$tp=admincontroller::total();
?>
                            <div class="container">
    <div class="page-header">
        <h1>Invoice of Purchase </h1>
     <form action="/invoice1" method="post" > <p style="margin-left:1000px;"><button style=" background-color:black; padding: 10px 22px;"  class="btn btn-danger" >Back to Main Menu</button></p>
     {{csrf_field()}}
     <input type="hidden" name="id" value="{{$cartid}}">
     </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 body-main">
                <div class="col-md-12">
                    <div class="row">   
                        <div class="col-md-4"> <img src="img/logo.png" alt=""> </div>
                        <div class="col-md-8 text-right">
                            <h4 style="color: black"><strong>VIOLET</strong></h4>
                            <p>3-B, Alapakkam main Road</p>
                            <p>Maduravoyal</p>
                            <p>Chennai-600 095, India</p>
                            <p><button style=" background-color:black; padding: 10px 22px;" style="margin-left:800px;" class="btn btn-danger" id="pdf">Download</button></p>
                        </div>
                    </div> <br>
                    <h4>To,</h4>
                    <h5> {{$dataorder->customer->Name}} </h5>
                    <h5> {{$dataorder->Phone}} </h5>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Tax INVOICE</h3>
                            <h5>04854654101</h5>
                        </div>
                        
                    </div> <br />
                    <div>
                    
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>
                                        <h5><Strong>Description</strong></h5>
                                    </th>
                                    <th>
                                        <h5><strong>Quantity</strong></h5>
                                    </th>
                                    <th>
                                        <h5><strong>Rate</strong></h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($product as $product)
                                <tr>
                                    <td class="col-md-6">{{$product->product->Productname}}</td>
                                    <td class="col-md-3"> {{$product->qty}}</td>
                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$product->product->price}}</td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <BR>
                                @endforeach

                                <tr>
                                
                                <td><STRONG><h4>Total Amount:</h4></STRONG></td>
                                <td></td>
                                <td><STRONG><h4>₹{{$tp}}</h4></STRONG></td>
                                </tr>
                    


                                <tr style="color: #F81D2D;">
                                    <td class="text">
                                    
                                        <h4 style="margin-left:300px;"><strong>Total:</strong></h4>
                                    </td>
                                  
                                    <td class="text-left">
                                        <h4 ><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$tp}} </strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><b>Date : {{$dataorder->Orderdate}}</b> </p> <br />
                            <p><b>Signature</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="src/jquery-3.3.1.slim.min.js"></script>

<script type="text/javascript" src="src/jspdf.min.js"></script>

<script type="text/javascript" src="src/jspdf.plugin.autotable.min.js"></script>

<script type="text/javascript" src="src/tableHTMLExport.js"></script>

<script type="text/javascript">
  
  $("#json").on("click",function(){
    $("#example").tableHTMLExport({
      type:'json',
      filename:'sample.json'
    });
  });

  $("#pdf").on("click",function(){
    $("#example").tableHTMLExport({
      type:'pdf',
      filename:'sample.pdf'
    });
  });

  $("#csv").on("click",function(){
    $("#example").tableHTMLExport({
      type:'csv',
      filename:'sample.csv'
    });
  });

</script>
</body>

</html>
                          