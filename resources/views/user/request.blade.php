
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=de  

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WBMS | Paloyon Oriental</title>
  @foreach($setting as $settings)
  <link rel="icon" href="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
  @endforeach
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/mdb.lite.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
  
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/autocomplete.js"></script>

</head>
    {{-- <!--Header_section-->
<header class="header sticky-top">
  <div class="container">
    <div class="header_box">
      <div class="logo">
        @foreach($setting as $settings)
          <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" class="img-fluid">       
        @endforeach
      </div>
	  <nav class="navbar navbar-inverse cusSticky" role="navigation" >
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>
			  <li><a href="#aboutUs" class="scroll-link">About Us</a></li>
			  <li><a href="#service" class="scroll-link">Services</a></li>
			  <li><a href="#Portfolio" class="scroll-link">Portfolio</a></li>
			  <li><a href="#team" class="scroll-link">Officials</a></li>
			  <li><a href="#contact" class="scroll-link">Contact</a></li>
        <li><a href="#" class="scroll-link">My Account</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header> --}}
<!--Header_section--> 

 <style>
  <body>
  #alert{
    background: cyan;
    padding: 20px 40px;
    min-width: 420px;
    position: absolute;
    right: 0px;
    top: 10px;
    border-radius: 4px;
    border-left: 8px solid #ffa502;
    color:black;
    }

 </style>
    <!--Navbar-->
    @if(session()->has('message'))
    <div class="alert" id="alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{session()->get('message')}}

  </div>
  @endif
  <form action="/request" method="POST" enctype="multipart/form-data">
    @csrf
<br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="{{url('assets/images/imgUser/gcash.jpeg')}}"class="card-img-top" alt="GCASH">
          <div class="card-body">
            <h5 class="card-title">GCash: 09091389912</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Cert of Indigency  : PHP 0</li>
            <li class="list-group-item">Cert of Residency  : PHP 75</li>
            <li class="list-group-item">Barangay Clearance : PHP 50</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6" style="margin-top: 20px; margin-bottom: 20px;">
          <label for="fullname">Type Your Full Name</label>
          <input type="text" class="form-control" name="fullname" value="" placeholder="Type your full name"> 

          <!-- Type of Document -->
          <div class="form-group">
            <label for="exampleFormControlSelect1">Type of Document</label>
                <select name="docType" class="form-control" id="exampleFormControlSelect1">
                    <option value="">--Select Document Type--</option>
                    <option value="Certificate of Indigency">Certificate of Indigency</option>
                    <option value="Barangay Clearance">Barangay Clearance</option>
                    <option value="Certificate of Residency">Certificate of Residency</option>
                </select>
          </div>


          <div class="form-outline mb-4">
            <label class="form-label" for="form6Example4">Pick-up Date</label>
            <div class="input-group date" id="datepicker">
                <input type="date" name="date" class="form-control" required>
                <span class="input-group-append"> 
                </span>
            </div>
          </div>


          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="paymentSelection">Select Payment Method</label>
                    <select class="form-control" name="paymentMethod" id="paymentSelection" onchange="showReference();">
                        <option class="default" value="Payment Method">--Payment Method--</option>
                        <option class="selectGcash" value="Gcash">Gcash</option>
                        <option class="selectCash" value="Cash on Pick-up">Cash on Pick-up</option>
                    </select>
                </div>
                @Error('paymentMethod')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror 
              </div>

              <div class="col-md-6>" id="referenceNumberField" style="visibility: hidden;">
                <div class="form-outline mb-4">
                  <label class="form-label" for="referenceNumber">Reference Number</label>
                  <input type="text" name="referenceNumber" id="referenceNumber" class="form-control"/>          
                </div>
              </div>
            </div>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label" for="form6Example4">Purpose</label>
            <textarea class="form-control" name="purpose" id="form6Example4" class="form-control" required></textarea>
            
            @Error('purpose')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
         @enderror  
        </div>

          <div class="card card-primary card-outline" id="screenshotField" style="visibility: hidden;">
            <div class="card-body box-profile">
              <div class="text-center">
                <img id="blah" class="img-fluid" src="images/screenshot.png" alt="User profile picture" style="width:200px;height:200px">
              </div>
              <hr>
              <div class="form-group">
                <label>Upload Screenshot</label>
                  <div class="input-group camera">
                    <div class="custom-file">
                      <input type="file" name="screenshot" class="custom-file-input" id="screenshot" onchange="readURL(this);"/>
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>

                    @Error('screenshot')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                  </div>
                </div>
            </div>
          </div>


          <div class="col-md-6">
            <button type="text" name="submit" class="btn btn-primary" style="margin-top: 30px;">Place request</button>
          </div>
      </div>
    </div>
  </div>
  </form>

  <script>
    const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    function generateString(length) {
    let result = '';
    let result1 = '-';
    let result2 = '-';
    let result3 = '-';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
        result2 += characters.charAt(Math.floor(Math.random() * charactersLength));
        result3 += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result + result1 + result2 + result3;
    }
    document.getElementById("trackingCode").value = generateString(4);
  </script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
  var auto_complete = new Autocomplete(document.getElementById('fullname'), {
      data:[{"label":"Allan P. Bajar","value":"Allan P. Bajar"},{"label":"Amichael C. Gonzales","value":"Amichael C. Gonzales"},{"label":"Aurora  G Mercado","value":"Aurora  G Mercado"},{"label":"Beatrix c Mercado","value":"Beatrix c Mercado"},{"label":"Christie  G Mercado","value":"Christie  G Mercado"},{"label":"Clemens  G Mercado","value":"Clemens  G Mercado"},{"label":"Cynthia H. Conception","value":"Cynthia H. Conception"},{"label":"Cynthia M. Bajar","value":"Cynthia M. Bajar"},{"label":"Edward F. Gonzales","value":"Edward F. Gonzales"},{"label":"Elenorita L Mendoza","value":"Elenorita L Mendoza"},{"label":"Erlinda F. Gonzales","value":"Erlinda F. Gonzales"},{"label":"Erlinda V. Liwanag","value":"Erlinda V. Liwanag"},{"label":"Florante L. Liwag","value":"Florante L. Liwag"},{"label":"Florencio C Luna","value":"Florencio C Luna"},{"label":"Gemma R. Javina","value":"Gemma R. Javina"},{"label":"Jadhelyn Ann R. Hidalgo","value":"Jadhelyn Ann R. Hidalgo"},{"label":"Jadhelyn R Hidalgo","value":"Jadhelyn R Hidalgo"},{"label":"Jaime B Matulin","value":"Jaime B Matulin"},{"label":"Jaime C. Banaag","value":"Jaime C. Banaag"},{"label":"Jeffrey Christopher E. Banaag","value":"Jeffrey Christopher E. Banaag"},{"label":"Jenalyn M Magtibay ","value":"Jenalyn M Magtibay "},{"label":"Jennifer C Luna","value":"Jennifer C Luna"},{"label":"Jessie R. Javina","value":"Jessie R. Javina"},{"label":"Jim R. Javina","value":"Jim R. Javina"},{"label":"Jocelyn A. Javina","value":"Jocelyn A. Javina"},{"label":"Julie Mie M Magtibay","value":"Julie Mie M Magtibay"},{"label":"Julius F. Gonzales","value":"Julius F. Gonzales"},{"label":"Leonarda L. Liwag","value":"Leonarda L. Liwag"},{"label":"Lilibeth H. Arcayos","value":"Lilibeth H. Arcayos"},{"label":"Lolita S Mendoza","value":"Lolita S Mendoza"},{"label":"Ma. Theresa L. De Villa","value":"Ma. Theresa L. De Villa"},{"label":"Marchal T Luna","value":"Marchal T Luna"},{"label":"Marietta D Luna","value":"Marietta D Luna"},{"label":"Marissa M Luna","value":"Marissa M Luna"},{"label":"Prince Gerald M Luna","value":"Prince Gerald M Luna"},{"label":"Princess Lovelyn M Luna","value":"Princess Lovelyn M Luna"},{"label":"Queenie Lyn M Luna","value":"Queenie Lyn M Luna"},{"label":"Roberto D Magtibay","value":"Roberto D Magtibay"},{"label":"Rodolfo F. Gonzales","value":"Rodolfo F. Gonzales"},{"label":"Rolin F. Gonzales","value":"Rolin F. Gonzales"},{"label":"Ronald R. Javina","value":"Ronald R. Javina"},{"label":"Ronalie V. Alday","value":"Ronalie V. Alday"},{"label":"Rosabhel  M Magtibay","value":"Rosabhel  M Magtibay"},{"label":"Rosalie  M Magtibay","value":"Rosalie  M Magtibay"},{"label":"Rosalie V. Alday","value":"Rosalie V. Alday"},{"label":"Rosalina M Magtibay","value":"Rosalina M Magtibay"},{"label":"Tita L Matulin","value":"Tita L Matulin"},{"label":"Tomas  Q Mendoza","value":"Tomas  Q Mendoza"},{"label":"Violinda E. Javina","value":"Violinda E. Javina"},{"label":"Zosimo L Luna","value":"Zosimo L Luna"}],
      maximumItems:10,
      highlightTyped:true,
      highlightClass : 'fw-bold text-primary'
  }); 
</script>

<script>
  function showReference(){
    var selectedValue = document.getElementById("paymentSelection").value;
    var referenceNumberField = document.getElementById("referenceNumberField");
    var screenshotField = document.getElementById("screenshotField");

    if (selectedValue == "Gcash"){
      referenceNumberField.style.visibility = "visible";
      screenshotField.style.visibility = "visible";
      document.getElementById("referenceNumber").required = true;
      document.getElementById("screenshot").required = true;
    }
    else{
      referenceNumberField.style.visibility = "hidden";
      screenshotField.style.visibility = "hidden";
      document.getElementById("referenceNumber").required = false;
      document.getElementById("screenshot").required = false;
    }
  }
</script>

<footer class="page-footer font-small mdb-color darken-3 pt-5">  
  <div class="copyright">
  </div>
</footer>
</body>
</html>
