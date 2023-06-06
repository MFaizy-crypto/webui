@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')


  <style>
  
    .descriptionText{
        font-size: 17px;
        font-weight: 100;
    }
     .TitleText{
        font-size: 40px;
          font-weight: 700;
    }
    .logoutnow{
        margin-left: 20%;
    }
     .imgurlget{
      width: 50%;
  }
  .container-fluid-img {
    display: flex;
  justify-content: center;
  align-items: center;
  }
 @media (max-width: 700px) {
  body {
    width: 100%;
     padding-right: 0px;
    /*margin-left: 0%;*/
   
  }
    .TitleText{
        font-size: 16px;
    }
  .descriptionText{
        font-size: 13px;
    }
  .imgurlget{
      width: 110%;
  }
  .logoutnow{
        margin-left: 22%;
    }
  .mani{
       width: 100%;
  margin-left: 100px;
  }
  .stoptillhere{
       width: 100%;
  }
 }
 .fullMaim{
     /*margin-left: 10%;*/
     /*border-left: 2px solid green;*/
 }
    .stoptillhere{
     
      border-bottom: 1px solid green;
    }
.profile-pic {
    max-width: 222px;
    max-height: 222px;
    margin-left: auto;
	margin-right: auto;
	display: block;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 50%;
    /* overflow: hidden; */
    /* background-color: rgb(0, 251, 29);
     */
     border: 1px solid rgb(255, 255, 255);
     margin-right: -40px;
  cursor: pointer
   /*padding: 30px;*/
}

    </style>
    
          <div class="fullMaim">
        <div id='showAppendDiv' class='container-fluid mt-3'>



        </div>
        </div>
        <div id='previewDataNow' class='container-fluid mt-3' style="border-bottom: 2px solid green; display: none">



        </div>
        <div class="container-fluid mani p-md-5 mainForm" style="margin-left: 0; border-bottom: 2px solid green; ">
              @if (\Session::has('error'))
                <div class="alert" style="background: white; color:red;   height:50px;">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif
          
                
           
          <form action="{{route('saveDesignDataNow')}}" method="POST" enctype="multipart/form-data">
            @csrf
          
        
              <div class="container">
                   <div class="row">
                    <input class="fileused form-control my-3 file"  style="display:none; border: 1px solid dark;" id="" name="file" type="file" accept="image/*"/>
                <input type="text" class="form-control title mb-3" id="title" name="title" placeholder="Add Title" style="display:none; border: 2px solid green;">
          <textarea id="textarea" placeholder="text" name="description" class="form-control mb-5" rows="4" style="display: none; border: 2px solid green;"></textarea>
               </div>
              </div>
                
          <div class="container-fluid mt-4">
            <div class="row pt-4 pb-4 justify-content-center" style="text-align:center;">
              <div class="col ml-3" style="margin-left: 0px;">
                <div class="row ">
                  <div class="">
                    <div class=" upload-button2"  style="margin-left: 20px; margin-right: -20px;">
                      <!-- User Profile Image -->
                      <img class=""  style="width: 100%; height: 55px;" src="{{asset('public/web/designPics/Pic1.png')}}">
              
                      <!-- Default Image -->
                      <!-- <i class="fa fa-user fa-5x"></i> -->
                    </div>
                     
                       
                    
                 </div>
               </div>
              </div>
              <div class="col justify-content-around ">
                <div class="">
                  <!-- User Profile Image -->
                 <button type="button" style="background: white; border: 0px; margin-right: ;" class="textuse">
                  <img class="" style="width: 100%; height: 55px;" src="{{asset('public/web/designPics/Title1.png')}}">
    
                 </button>
           
                  <!-- Default Image -->
                  <!-- <i class="fa fa-user fa-5x"></i> -->
                </div>
              </div>
              <div class="col pl-2">
                <div class="">
                  <!-- User Profile Image -->
                 <button type="button" class="textuse2" style="background: white; border: 0px; margin-left: 10px;">
                  <img class="" style="width: 100%; height: 55px;" src="{{asset('public/web/designPics/Text1.png')}}">
    
                 </button>
           
                  <!-- Default Image -->
                  <!-- <i class="fa fa-user fa-5x"></i> -->
                </div>
              </div>
            </div>
          </div>
         <div class="row pb-5">
          <div class="col mt-2">
             
            <button type="submit" class="float-center" style="background: white; border: transparent; border-radius: 40px; height: 30px; width: 100%; margin-left: 0%;">
            <img src="{{asset('public/web/designPics/save-update2.png')}}" style="height: 30px; width: 100%;">  
            
            </button>
          </div>
       <div class="col mt-2">
            <button type="button"  onclick='previewData()' style="background: white; border: transparent; border-radius: 40px;  height: 30px; width: 100%;">  <img src="{{asset('public/web/designPics/Preview.png')}}" style="height: 30px; width: 100%;">  </button>
          </div>
        
          </div>
    
        </form>
        
         <a href=""  class="btn float-center logoutnow" style="background: white; ">
            <img class="profile-pic" style="width: 100%; height: 40px;" src="{{asset('public/web/designPics/logout.png')}}">
          </a>
       
        </div>
       
        @if (session('id'))
              
         
        <!--<div class="row justify-content-center pb-3 mt-3">-->
        <!--  <a href="{{route('logout')}}"  class="btn btn-large" style="background: rgb(3, 225, 3); ">-->
        <!--    Logout-->
        <!--  </a>-->
        <!--</div>-->
        @endif
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Design</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('editDesignDataNow')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="getId" name="id">
       <div class="form-group">
        <input type="text" class="getTitle form-control" placeholder="Title" name="title">
       </div>
       <div class="form-group">
        <textarea type="text" class="getDescription form-control" placeholder="Description" name="description"></textarea>
       </div>
        
       <div class="form-group">
        <input type="file" class="getFile form-control" placeholder="Image" name="file">
       </div>
       <input type="submit" class="form-control btn-success mt-5"  value="Update Changes">
      </form>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
     
      </div>
    </div>
  </div>
</div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function previewData(){
         $('#previewDataNow').css('display', 'inline-block');
        var title=$('.title').val();
        // alert(title);
         var description=$('#textarea').val();

     var file = $('.file')[0].files[0]; // Get the selected file
    
    // Create a file reader
    if(file != null){
        
    var reader = new FileReader();

    // Set up the file reader onload event
    reader.onload = function(e) {
      var imageUrl = e.target.result; 
       $('#previewDataNow').append(`<div class="container-fluid-img p-3  " style=" margin-top: 30px"> 
      <img src="${imageUrl}" style="width: 110%; height: auto;" class="imgurl" alt=""> 
      </div>`);
      
        $('#previewDataNow').append(`<div class="container-fluid p-3 text-center " style= ">
      <p style="font-size: 16px; color: #a9a9a9;">${title }</p>
      </div>`);
        $('#previewDataNow').append(`<div class="container-fluid p-3 text-center " style=" margin-top: -40px">
      <p style="font-size: 13px; color: #a9a9a9;">${description}</p>
      </div>`);
      $('#previewDataNow').css('display: block');
       $('#previewDataNow').append(`<div class="container-fluid mb-5 text-center" style=" margin-top: 20px">
      <button class="btn btn-large" onclick="gotoeditor()" style="background: green; color: white">Go To Editor Back</button>
      </div>`);
      
};
$('.mainForm').css('display', 'none');
      // Get the image URL
   reader.readAsDataURL(file);
    }else{
 
            if (title != null) {
    //   alert(title);
  $('#previewDataNow').append(`<div class="container-fluid text-center " style=" margin-top: 20px">
      <b style="font-size: 16px; color: #a9a9a9;">${title }</b>
      </div>`);
}
if (description != null) {
  $('#previewDataNow').append(`<div class="container-fluid text-center " style=" margin-top: 20px">
      <p style="font-size: 13px; color: #a9a9a9;">${description}</p>
      </div>`);
}

$('.mainForm').css('display', 'none');
 $('#previewDataNow').append(`<div class="container-fluid mb-5 text-center" style=" margin-top: 20px">
      <button class="btn btn-large" onclick="gotoeditor()" style="background: green; color: white">Go To Editor Back</button>
      </div>`);
}


    }
  function gotoeditor(){
        $('#previewDataNow').css('display', 'none');
      $('.mainForm').css('display', 'block');
  }
    
</script>

    <script>
      $('.textuse2').click(function(){
     $('#textarea').toggle();
      });
      $('.textuse').click(function(){
     $('#title').toggle();
      });
        $('.upload-button2').click(function(){
     $('.fileused').toggle();
      });
    </script>
      <script>
          $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
      </script>
      <script>
         var count = 0;

         $(document).ready(function() {
  // e.preventDefault();
    // count++;
    // inputValue = document.getElementById('MyInput').value
  //  var img= $('.file-upload').val();
  var formData = new FormData(); // Create a new FormData object

  // Get the image file from the input field
  // var imageFile = $('.file-upload')[0].files[0];
  // formData.append('file', imageFile);

  // Get the other form data
  // var title = $('#title').val();
  // var des = $('#textarea').val();

  // Append the other form data to the FormData object
  // formData.append('title', title);
  // formData.append('des', des);
  formData.append("_token", "{{ csrf_token() }}");


  // var data={title: title, des: des, img:formData, "_token": "{{ csrf_token() }}"};

    // alert(data);

    $.ajax({
    url: "{{route('saveDesignData')}}",
    type: "post",
    data: formData,
    contentType: false, // Set contentType to false for proper form data submission
    processData: false, // Set processData to false for proper form data submission
    success: function(result) {
     

        // var img=result.image[0][0].img;
        // console.log(result[0].);
        // var imageUrl = "{{ asset('assets/design/') }}" + '/' + img;
          // console.log(imageUrl);
       
      
$.each(result, function(index, value) {
  targetToAppend = document.getElementById('showAppendDiv')
    divToAppend = document.createElement('div');
    divToAppend.classList.add('row');
    divToAppend.classList.add('stoptillhere');
    divToAppend.classList.add('bg-white');
     divToAppend.classList.add('mt-3');
      divToAppend.classList.add('pb-3');
    divToAppend.classList.add('align-items-center');
    divToAppend.classList.add('order-prefix-'+value['order_div']);
    divToAppend.classList.add('order-prefix-id-'+value['id']);
    console.log(divToAppend);

 
if (value['img']!=null) {
  
  var imageUrl = "{{ asset('public/web/design/') }}" + '/' + value['img'];
  divToAppend.innerHTML = `
<div class="container-fluid-img py-3 firstImg stoptillhere" style="border-bottom: 2px; solid green; ">
      <img src="${imageUrl}" style="height: auto;" class="imgurlget" alt="">
      </div>`;
}
if (value['title']!=null) {
  divToAppend.innerHTML += `
  <div class="container-fluid p-3 text-center stoptillhere " style="border-bottom: 2px; solid green; ">
      <p class="titleText" style="font-size: 25px; color: black;">${value['title']}</p>
      </div>`;
}
if (value['description']!=null) {
  divToAppend.innerHTML += `
  <div class="container-fluid px-3 text-center stoptillhere descriptionText" style="border-bottom: 2px; solid green; ">
      <p style="font-size: 18px; font-weight: 300; color: black; line-height: 29px;">${value['description']}</p>
      </div>`;
}

      divToAppend.innerHTML += `
  <div class="col mt-3" style=" margin-left: 7%;">
                    <div class="col d-flex " style="justify-content: center;">
                        <div>
                            <button class='btn ClickUP'>
                            <img src="{{asset('public/web/designPics/Up.png')}}" style="height: 40px; width: 40px;">                          
                            </button>
                        </div>
                        <div>
                            <button class='btn ClickDOWN' >  <img src="{{asset('public/web/designPics/down.png')}}" style="height: 40px; width: 40px;">  
                            </button>
                            <button class='btn'  onclick=editDesignData(this.id) id="${value['id']}">
                             <img src="{{asset('public/web/designPics/edit.png')}}" style="height: 40px; width: 40px;">  

                            </button>
                            <button class='btn'  onclick=deleteDesignData(this.id) id="${value['id']}">
                             <img src="{{asset('public/web/designPics/delete.png')}}" style="height: 40px; width: 40px;">  


                            </button>
                        </div>
                      </div>
                        
                        
                       
                      
                    </div>
                
               
`; 
   
 


targetToAppend.appendChild(divToAppend);
onClickMoveUPorDOWN();
});

// $('.imgurl').attr('src', imageUrl);
   

   
      
    
    }
  });
 

  
})

function onClickMoveUPorDOWN() {
    var btn_moveDOWN = [...document.getElementsByClassName('ClickDOWN')]
    var btn_moveUP = [...document.getElementsByClassName('ClickUP')]
    btn_moveUP.forEach(onebyone => {
        onebyone.addEventListener('click', ChangePositionUP)

    })
  
    btn_moveDOWN.forEach(onebyone => {
        onebyone.addEventListener('click', function(){
          CurrentElement_TOMOVE = this.parentElement.parentElement.parentElement.parentElement;
          // CurrentElement_TOMOVE = closest(this, 'stoptillhere')
          previousElement_TOMOVE = CurrentElement_TOMOVE.previousElementSibling;
          if (previousElement_TOMOVE != null) {
              targetToAppend.insertBefore(CurrentElement_TOMOVE, previousElement_TOMOVE);
          } else {
              alert('cannot Move Further')
          }
          
        });
       
      
    })

    
}

function ChangePositionUP() {
  var CurrentElement_TOMOVE = this.parentElement.parentElement.parentElement.parentElement;
  var previousElement_TOMOVE = CurrentElement_TOMOVE.previousElementSibling;

  if (previousElement_TOMOVE != null) {
    targetToAppend.insertBefore(CurrentElement_TOMOVE, previousElement_TOMOVE);
    updateOrder();
  } else {
    alert('Cannot move further up');
  }
}

function ChangePositionDOWN() {
  var CurrentElement_TOMOVE = this.parentElement.parentElement.parentElement.parentElement;
  var nextElement_TOMOVE = CurrentElement_TOMOVE.nextElementSibling;

  if (nextElement_TOMOVE != null) {
    targetToAppend.insertBefore(nextElement_TOMOVE, CurrentElement_TOMOVE);
    updateOrder();
  } else {
    alert('Cannot move further down');
  }
}
function getClassValue(classList) {
  var desiredClassPrefix = 'order-prefix-';
  for (var i = 0; i < classList.length; i++) {
    var className = classList[i];
    if (className.startsWith(desiredClassPrefix)) {
      return className.substr(desiredClassPrefix.length);
    }
  }
  
  return null; // Return null if the desired class is not found
}

function getIdValue(classList) {
  var desiredClassPrefix2 = 'order-prefix-id-';
  for (var g = 0; g < classList.length; g++) {
    var className = classList[g];
    if (className.startsWith(desiredClassPrefix2)) {
      return className.substr(desiredClassPrefix2.length);
    }
  }
  return null;
}
function updateOrder() {
  var rows = [...document.getElementsByClassName('stoptillhere')];
  var order = [];
  var id=[];
  var desiredClassFound = false;
  rows.forEach((row, index) => {
    var classList = Array.from(row.classList);
    var classValue = getClassValue(classList);
    var idValue = getIdValue(classList);

    order.push(classValue);
    id.push(idValue);
  });
  var order2=[];
  for (var t = 0; t < order.length; t++) {
    if (order[t]!=null) {
      order2.push(order[t]);
    }
    
    // const element = array[t];
    
  }
  var id2=[]
  for (var l = 0; l < id.length; l++) {
    if (id[l]!=null) {
      id2.push(id[l]);
    }
    
    // const element = array[t];
    
  }
// console.log(id2);
 

  // console.log(order);

  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  var formData = new FormData();
  formData.append('order', order2);
  formData.append('id', id2);

  $.ajax({
    url: "{{route('updateOrder')}}",
    type: "post",
    data: formData,
    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    contentType: false,
    processData: false,
    success: function(result) {
      // var orderz = JSON.parse(result.order);
      console.log(result);
      // Handle the success response
    },
    error: function(error) {
      // Handle the error response
    }
  });
}



      </script>
      <script>
        function editDesignData(clicked)
        {
          var csrfToken = $('meta[name="csrf-token"]').attr('content');
          $('#exampleModal').modal('show');
          var id=clicked;
          // alert(id);
          data={id: id};
          // console.log(data);
          // alert(clicked);
        
          $.ajax({
    url: "{{route('getDesignData')}}",
    type: "post",
    data: data,
    headers: {
    'X-CSRF-TOKEN': csrfToken
  },
  
    success: function(result) {
      $('.getTitle').val(result.data[0]['title']);
      $('.getDescription').val(result.data[0]['description']);
      $('.getId').val(result.id);

  //  console.log(result.id);
    }
  });
        }
      </script>
      <script>
          function deleteDesignData(clicked)
        {
          var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
          var id=clicked;
          // alert(id);
          data={id: id};
          // console.log(data);
          // alert(clicked);
        
          $.ajax({
    url: "{{route('deleteDesignData')}}",
    type: "post",
    data: data,
    headers: {
    'X-CSRF-TOKEN': csrfToken
  },
  
    success: function(result) {
      // $('.getTitle').val(result.data[0]['title']);
      // $('.getDescription').val(result.data[0]['description']);
      // $('.getId').val(result.id);

      location.reload();
    }
  });
        }
      </script>
      @endsection