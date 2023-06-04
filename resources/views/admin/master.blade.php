<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('asset/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
  </head>
  <style>
    body{
      width:430px;
      margin:auto;
      font-family: "Konkhmer Sleokchher", sans-serif;
      
    }
    @media (max-width: 700px) {
  body {
    width: 100%;
     padding-right: 0px;
    /*margin-left: 0%;*/
   
  }
    section {
    width: 100%;
     padding-right: 40px;
    margin: 0px;
    padding: 0px;
  }
}
    .firstImg{
        border: 2px solid green;
    }
.ftr{
    width: 100%;
      margin: 0px;
    padding: 0px;
  
      /*border: 2px solid green;*/
}
</style>

  <body  >
  
  <section class="full bg-warning">
<div class="ftr">

    
      

    <div class="container-fluid firstImg">
     <div class="row">
          <img src="{{asset('public/web/first.jpg')}}" style="width: 100%; height: 300px;" alt="">
     </div>
      <div class="row mt-5">
        <div class="col mb-5">
          <a href="{{route('register')}}" type="button" class="btn-large text-center "  style="background: rgb(145, 228, 145); padding-top: 7px; border: transparent; border-radius: 40px; height: 40px; width: 100%; justify-content:center; color: white"><b class="mt-4" style="margin-top: 30px;">Register</b></a>
        </div>
        <div class="col mb-5">
          <a href="{{route('login')}}" type="button" class="btn-large text-center"  style="background: rgb(145, 228, 145); border: transparent;  padding-top: 7px; border-radius: 40px; color: white;  height: 40px; width: 100%;"><b>Login</b></a>
        </div>
        </div>
          </div>
          <div class="container" style="border-left: 3px solid green; border-bottom: 3px solid green;">
              <div class="row mt-4">
                  <b>
                    Welcome to the house curries!.
                </b>

              </div>
             
              <div class="row">
      <img src="{{asset('public/web/first.jpg')}}" style="width: 100%; height: 300px; " class="mt-3" alt="">

              </div>
             
              <div class="row mt-4">
                 <b>
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque officia perferendis voluptas, ducimus quo dicta libero doloribus fugit, vel placeat adipisci. Consequatur, eaque veniam. Illum dolorem consequuntur voluptates blanditiis consequatur!
               </b>
     <input type="button" class="form-control mt-4 mb-4" style="width: 100%; height: 40px; border-radius: 30px; background: rgb(201, 236, 201); border: none; text-align: center;" value="Enter Store" align="center">
              </div>
          </div>

<!--<div class="row">-->
  <!--<div class="col mt-3 text-center">-->
<!--    <input type="button" class="form-control" style="width: 100%; height: 40px; border-radius: 30px; background: rgb(201, 236, 201); border: none; text-align: center;" value="Enter Store" align="center">-->

<!--</div>-->
</div>
  </div>
 
    </section>
     </body>
  </html>