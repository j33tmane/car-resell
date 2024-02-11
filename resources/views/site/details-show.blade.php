 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog - Append Bootstrap Temlate</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{url('/assets2/css/main.css')}}">
<link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
{{-- <h1>hii</h1> --}}

<style>
  /* Add this style to remove the border from all cards */
  .card {
    border: none;
    border-color: #e84545;
    border-left-style: solid;
    border-left-width: 5px;
    margin-bottom:20px; 
  }
  .card span{
    color: #e21a1a9c;
    padding-right:15px; 
    
  }
  .timeline {
  border-left: 1px solid hsl(0, 100%, 48%);
  position: relative;
  list-style: none;
}

.timeline .timeline-item {
  position: relative;
}

.timeline .timeline-item:after {
  position: absolute;
  display: block;
  top: 0;
}

.timeline .timeline-item:after {
  background-color: hsl(0, 100%, 35%);
  left: -38px;
  border-radius: 50%;
  height: 11px;
  width: 11px;
  content: "";
}
</style>

</head>


<body class="blog-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header sticky-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
     
        <h1>Car Information</h1>
        {{-- <span>.</span> --}}
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          {{-- <li><a href="index.html#hero">Home</a></li>
          <li><a href="index.html#about">About</a></li>
          <li><a href="index.html#services">Services</a></li>
          <li><a href="index.html#portfolio">Portfolio</a></li>
          <li><a href="index.html#team">contact</a></li>
          <li><a href="blog.html" class="active">Tracking Details</a></li> --}}
          

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      
 
  </header><!-- End Header -->

  <main id="main">

    <!-- Blog Page Title & Breadcrumbs -->
    

    <!-- Blog Section - Blog Page -->
    <section id="blog" class="blog">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        


<div class="container mt-5 ">
    <div class="card">
      <div class="card-header">
        <center>
        car Details
      </div>
      <div class="card-body">
        <center>
        <h5 class="card-title">Vehicle Number: </h5>
        <p class="card-text"><span>vehicle Number</span></p>
      </div>

    </div>

    
    <section class="section"  >
      <div class="row">
        <div class="col-lg-6">
          


  
          <div class="card">
            <div class="card-body">
              
              
              <h4 class="card-title">Features</h4>
              <h6 class="card-text"><span>Car name :</span>CarName</h6>
              <h6 class="card-text"><span>Brand :</span>BrandName</h6>
              <h6 class="card-text"><span>Year:</span>Year</h6>
              <h6 class="card-text"><span>Fuel  :</span> Fuel</h6>
              <h6 class="card-text"><span>Transmission :</span>Transmission</h6>
              <h6 class="card-text"><span>KM Driven</span>KM Driven</h6>
              <h6 class="card-text"><span>NO. of Owners</span>No.of Owners</h6>
              <h6 class="card-text"><span>Tyre condition:</span>Tyre condition</h6>
              <h6 class="card-text"><span>Insurance</span>Insurance</h6>
              <h6 class="card-text"><span>Power Window</span>Power Window</h6>
              <h6 class="card-text"><span>Power Steering</span>Power Steering</h6>
              <h6 class="card-text"><span>Location:</span>Location</h6>
              <h6 class="card-text"><span>Body-style</span>Body-style</h6>
              <h6 class="card-text"><span>Engine(cc)</span>Engine(cc)</h6>
              <h6 class="card-text"><span>Power(BHP)</span>Power(BHP)</h6>
              <h6 class="card-text"><span>Feactures:</span>Feactures</h6>
            </div>
          </div>
  
        </div>
  
        <div class="col-lg-6">
  
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Receiver Information</h4>
              <h6 class="card-text"><span>Name:</span>receiverName</h6>
              <h6 class="card-text"><span>Address:</span>receiverAddress</h6>
              <h6 class="card-text"><span>Contact:</span>receivercontact</h6>
            </div>
          </div>
  
        </div>
      </div>

      
      <div class="col-lg-12">
  
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Parsal Information</h4>
            <div class="row">

              <div class="col-md-2 ml-5 ">
                  <div class="form-group">
                      <label for="weight" style="font-size: medium" ><span>Weight:</span>weight</label><br>
                     
                      
                  </div>
              </div>

              <div class="col-md-2 mr-5">
                  <div class="form-group">
                      <label for="height" style="font-size: medium"><span>Height:</span>height</label><br>
                      
                      
                  </div>
              </div>

              <div class="col-md-2 mr-5">
                  <div class="form-group">
                      <label for="length" style="font-size: medium"><span>Length:</span>length</label><br>
                      
                      
                  </div>
              </div>

              <div class="col-md-2 mr-5">
                  <div class="form-group">
                      <label for="width" style="font-size: medium"><span>Width:</span>width</label><br>
                      
                      
                  </div>
              </div>

              <div class="col-md-2 ">
                  <div class="form-group">
                      <label for="price" style="font-size: medium"><span>Price:</span>price</label><br>
                    
                      
                  </div>
              </div>

              <div class="col-md-2 ">
                <div class="form-group">
                    <label for="price" style="font-size: medium"><span>Product Name:</span>Productdetails</label><br>
                  
                </div>
            </div>


          </div>
          </div>
        </div>

      </div>

      <div class="col-lg-12">
  
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Status:</h4>

           
            
            <div class="row">
             
            <h6>created_at</h6> --
              

          </div>
          </div>
        </div>

      </div>

      <h4>Tracking History</h4>
     
       <div class="col-lg-12 mt-3">
      
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">trackinginfo</h6>
            <label>Updated At :created_at</label>
           
            
          </div>
        </div>

      </div> --

      <section class="py-5">
        <
          
        </ul>
      </section>


    </section>



</div>



 

</main>




      

  

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Append</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1">Append</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>



    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Images</h4>
                    <p class="card-title-desc">Images uploaded by dealer</p>
                   
                        <div class="alert alert-danger">
                            <strong>Opps!</strong> Please upload at least one image</a>.
                        </div>
                    
                    <div class="row">

                        
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="" class="card-img-top" alt="Cinque Terre" width="140px">
                                </div>
                            </div>
                      

                        <div class="visible-print text-center">
                            
                            <p>Scan me to return to the original page.</p>
                        </div>
                    </div>



                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Car Information</h4>
                    <p class="card-title-desc">Information filled by dealer.</p>


                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <th width="30%">Brand</th>
                                <td>->car_brand ?? </td>
                            </tr>
                            <tr>
                                <th>Year</th>
                                <td>->year ?? </td>
                            </tr>
                            <tr>
                                <th>Fuel</th>
                                <td>->fuel ?? </td>
                            </tr>
                            <tr>
                                <th>Transmission</th>
                                <td>transmission ?</td>
                            </tr>
                            <tr>
                                <th>KM Driven</th>
                                <td>->km_driven ?? </td>
                            </tr>
                            <tr>
                                <th>No Of Owners</th>
                                <td>->no_of_owners ?? </td>
                            </tr>
                            <tr>
                                <th>Tyre Condtion</th>
                                <td>->tyre_type ?? </td>
                            </tr>
                            <tr>
                                <th>Insurance</th>
                                <td>->insurance == 1 ? 'YES' : 'NO' </td>
                            </tr>
                            <tr>
                                <th>Power Window</th>
                                <td>->p_window == 1 ? 'YES' : 'NO' </td>
                            </tr>
                            <tr>
                                <th>Power Steering</th>
                                <td>->p_steering == 1 ? 'YES' : 'NO'</td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>->location ?? </td>
                            </tr>
                            <tr>
                                <th>Body-style</th>
                                <td>->bodystyle ?? </td>
                            </tr>
                            <tr>
                                <th>Engine(CC)</th>
                                <td>//</td>
                            </tr>
                            <tr>
                                <th>Power(bhp)</th>
                                <td>//</td>
                            </tr>
                            <tr>
                                <th>Vehical No</th>
                                <td>//</td>
                            </tr>
                            <tr>
                                <th>Features</th>
                                <td>
                                   
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


<script src="{{url('/assets2/js/main.js')}}"></script>

</body>

</html> 