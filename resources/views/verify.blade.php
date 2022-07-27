<!DOCTYPE html>
<html lang="en">
<head>

     <title>Document Verification</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="team" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset('asset/document_verify/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('asset/document_verify/css/vegas.min.css') }}">
     <link rel="stylesheet" href="{{ asset('asset/document_verify/css/font-awesome.min.css') }}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('asset/document_verify/css/templatemo-style.css') }}">

</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>



     <!-- HOME -->
     <section id="home">
        <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    @if(!empty($data->id))
                         <div class="col-md-12 col-sm-12">
                              <div class="home-info">
                                   <h1><b>{{ $data->document_series_no }}</b><br>is authentic document</h1>
                                   <!-- You can change the date time in init.js file -->
                                   <ul class="countdown">
                                        <li>
                                             <span class="days">{{ $data->created_at->format('M d, Y') }}</span>
                                             <h3>Date Created</h3>
                                        </li>
                                        <li>
                                             <span class="hours">{{ $data->prepared_by }}</span>
                                             <h3>Prepared by</h3>
                                        </li>
                                        <li>
                                             <span class="minutes">{{ $data->approved_by }}</span>
                                             <h3>Approved by</h3>
                                        </li>    
                                   </ul>
                              </div>
                         </div>
                    @endif

                    @if(empty($data->id))
                         <div class="col-md-12 col-sm-12">
                              <div class="home-info">
                                   <h1><b>{{ $data }}</b><br>is invalid document</h1>
                              </div>
                         </div>
                    @endif
               </div>
          </div>
     </section>

     <!-- SCRIPTS -->
     <script src="{{ asset('asset/document_verify/js/jquery.js') }}"></script>
     <script src="{{ asset('asset/document_verify/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('asset/document_verify/js/vegas.min.js') }}"></script>
     <script src="{{ asset('asset/document_verify/js/countdown.js') }}"></script>
     <script src="{{ asset('asset/document_verify/js/init.js') }}"></script>
     <script src="{{ asset('asset/document_verify/js/custom.js') }}"></script>

</body>
</html>