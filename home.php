<?php 
include 'admin/db_connect.php'; 
?>
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


     <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<!-- fonts style -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

<!--owl slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />

<link href="css2/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css2/responsive.css" rel="stylesheet" />
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.owl-carousel {
    display: none;
    width: 100%;
    z-index: 1;
}
.bg-image {
    background: linear-gradient(rgba(40, 120, 235, 0.05), rgba(40, 120, 235, 0.05)), url(assets/img/bg-image.jpg);
    background-attachment: fixed;
}
.event-list{
cursor: pointer;
}
span.hightlight{
    background: yellow;
}
.banner{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 26vh;
        width: calc(30%);
    }
    .banner img{
        width: calc(100%);
        height: calc(100%);
        cursor :pointer;
    }
.event-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}

.event-list .banner {
    width: calc(40%)
}
.event-list .card-body {
    width: calc(60%)
}
.event-list .banner img {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    min-height: 50vh;
}
span.hightlight{
    background: yellow;
}
.banner{
   min-height: calc(100%)
}
</style>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
        <h2 class="text-white">Welcome to <?php echo $_SESSION['system']['name']; ?></h2><br> <br>
        <h1 class="text-white">All Alumni's are Our Proud</h1>
        <h1 class="text-white">“Knowledge is Power”</h1>
        <h1 class="text-white">Daffodil International University</h1>

        
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100" style="background-size: cover;">
                        <img class="position-absolute w-100 h-100" src="assets/img/2.jpg" style="object-fit: cover; background: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us</h6>
                        <h1 class="display-4">Welcome to DIU Alumni</h1>
                    </div>
                    <p>Daffodil International University (DIU) alumni are a diverse and accomplished group of individuals who have graduated from this renowned private university in Dhaka, Bangladesh. With a strong foundation in various academic disciplines, DIU alumni have made significant contributions to their respective fields, including business, technology, engineering, healthcare, education, and the arts. The alumni network plays a vital role in the university's growth by fostering collaboration, offering mentorship to current students, and creating professional opportunities. The Daffodil International University Alumni Association actively engages with former students through events, reunions, and networking platforms to strengthen ties within the community. Through their success and involvement, DIU alumni continue to enhance the university's reputation as a leading institution for higher education in Bangladesh.</p>
                    <div class="row pt-3 mx-0">
            <div class="col-3 px-0">
                <div class="bg-success text-center p-4">
                    <h1 class="text-white counter" data-count="960">0</h1>
                    <h6 class="text-uppercase text-white">Jobs<span class="d-block">Works</span></h6>
                </div>
            </div>
            <div class="col-3 px-0">
                <div class="bg-primary text-center p-4">
                    <h1 class="text-white counter" data-count="2100">0</h1>
                    <h6 class="text-uppercase text-white">Total<span class="d-block">Alumni</span></h6>
                </div>
            </div>
            <div class="col-3 px-0">
                <div class="bg-dark text-center p-4">
                    <h1 class="text-white counter" data-count="30">0</h1>
                    <h6 class="text-uppercase text-white">TOtal<span class="d-block">Departments</span></h6>
                </div>
            </div>
            <div class="col-3 px-0">
                <div class="bg-secondary text-center p-4">
                    <h1 class="text-white counter" data-count="2040">0</h1>
                    <h6 class="text-uppercase text-white">Running<span class="d-block">Students</span></h6>
                </div>
            </div>
            <div class="col-3 px-0">
                <div class="bg-warning text-center p-4">
                    <h1 class="text-white counter" data-count="2100">0</h1>
                    <h6 class="text-uppercase text-white">Happy<span class="d-block">Alumni</span></h6>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <div class="bg-image">
   <h4 class="text-center mt-4">Alumni Photographs</h4>
   <hr class="divider">
   <div class="slider">
      <div class="slides">
         <div class="slide"><img src="assets\img\3.jpg" alt="Image 1"></div>
         <div class="slide"><img src="assets\img\4.jpg" alt="Image 2"></div>
         <div class="slide"><img src="assets\img\7.jpg" alt="Image 3"></div>
         <div class="slide"><img src="assets\img\8.jpg" alt="Image 4"></div>
         <!-- Add more slides as needed -->
      </div>
      <a class="prev" onclick="prevSlide()">&#10094;</a>
      <a class="next" onclick="nextSlide()">&#10095;</a>
   </div>
</div>

<!-- Add the CSS to ensure uniform image size -->
<style>
    .slider {
        position: relative;
        width: 100%; /* Make the slider take up full width */
        max-width: 1150px; /* Set a max-width for better control (optional) */
        height: 630px; /* Set a fixed height for uniform image size */
        overflow: hidden; /* Hide any overflow if images don't fit exactly */
        margin: 0 auto; /* Center the slider */
    }

    .slider .slide img {
        width: 100%; /* Ensure the image fills the container's width */
        height: 100%; /* Ensure the image fills the container's height */
        object-fit: contain; /* Ensure the entire image is visible */
        display: block; /* Remove any extra space around the image */
        margin: 0 auto; /* Center the image horizontally */
    }
</style>

        </div>
            <div class="container mt-3 pt-2 bg-image">
                <h4 class="text-center">Upcoming Events</h4>
                <hr class="divider">
                <?php
                $event = $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m%-d') >= '".date('Y-m-d')."' order by unix_timestamp(schedule) asc");
                while($row = $event->fetch_assoc()):
                    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                    $desc = strtr(html_entity_decode($row['content']),$trans);
                    $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
                ?>
                <div class="card event-list" data-id="<?php echo $row['id'] ?>">
                     <div class='banner'>
                        <?php if(!empty($row['banner'])): ?>
                            <img src="admin/assets/uploads/<?php echo($row['banner']) ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="row  align-items-center justify-content-center text-center h-100">
                            <div class="">
                                <h3><b class="filter-txt"><?php echo ucwords($row['title']) ?></b></h3>
                                <div><small><p><b><i class="fa fa-calendar"></i> <?php echo date("F d, Y h:i A",strtotime($row['schedule'])) ?></b></p></small></div>
                                <hr>
                                <larger class="truncate filter-txt"><?php echo strip_tags($desc) ?></larger>
                                <br>
                                <hr class="divider"  style="max-width: calc(80%)">
                                <button class="btn btn-primary float-right read_more" data-id="<?php echo $row['id'] ?>">Read More</button>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                <?php endwhile; ?>
                
            </div>
    <!-- Feature Start -->
    <div class="container-fluid bg-image" style="margin: 90px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Daffodil Department</h6>
                        <h1 class="display-4">All DIU Student & Alumni about their information?</h1>
                    </div>
                    <p class="mb-4 pb-2">Daffodil International University (DIU) alumni are a diverse and accomplished group of individuals who have graduated from this renowned private university in Dhaka, Bangladesh. With a strong foundation in various academic disciplines, DIU alumni have made significant contributions to their respective fields, including business, technology, engineering, healthcare, education, and the arts.</p>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-certificate text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>About DIU</h4>
                            <p>The queue of achievements of DIU is a significant one. The university endeavors for excellence since its commencement in 2002.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-graduation-cap text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>About Alumni</h4>
                            <p>The alumni network plays a vital role in the university's growth by fostering collaboration, offering mentorship to current students, and creating professional opportunities. The Daffodil International University Alumni Association actively engages with former students through events, reunions, and networking platforms to strengthen ties within the community. Through their success and involvement, DIU alumni continue to enhance the university's reputation as a leading institution for higher education in Bangladesh.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-book-reader text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>About Recent Students</h4>
                            <p class="m-0">Daffodil International University (DIU) students have access to a variety of programs and services that support their intellectual and social development</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="assets/img/9.jpg" style="object-fit: cover; background-size: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->

    <!-- Team Start -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6>
                        <h1 class="display-4">What Say Our Alumni's</h1>
                    </div>
                    
                    <p class="m-0">Daffodil International University is intellectually working to develop graduates from 2002 maintaining the global image of competition. To build skilled, productive, intellectual, inquisitive, responsible, creative, innovative, entrepreneurial, visionary, leadership and professional nation, DIU always tries to provide all necessary opportunities and strength. To make the students compatible internationally in the corporate market, DIU is highly conscious to build basic educated nation from any staged merit of the students. Now DIU alumni have started keeping their role of contribution in Bangladesh and international market therefore, DIU is highly proud of all alumni.</p>
                    <p>“I would like to say that my 4 years at DIU has been one of the best periods in my life.” I feel myself lucky to be an alumnus of Daffodil International University. Currently, I have been serving the DIU Alumni Community as the President of DIU Alumni Association (DIUAA).

--------------------------

Md. Ziaul Haque Sumon
Regional Head, Banglalink Digital Communications Limited
President, Daffodil International University Alumni Association (DIUAA)</p>
                  </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Sed et elitr ipsum labore dolor diam, ipsum duo vero sed sit est est ipsum eos clita est ipsum. Est nonumy tempor at kasd. Sed at dolor duo ut dolor, et justo erat dolor magna sed stet amet elitr duo lorem</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="img/testimonial-2.jpg" alt="">
                                <div>
                                    <h5>Student Name</h5>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Sed et elitr ipsum labore dolor diam, ipsum duo vero sed sit est est ipsum eos clita est ipsum. Est nonumy tempor at kasd. Sed at dolor duo ut dolor, et justo erat dolor magna sed stet amet elitr duo lorem</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="assets\img\person6.jpg" alt="">
                                <div>
                                    <h5>Student Name</h5>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->
    <section class="team_section layout_padding bg-image">
    <div class="container-fluid bg-image">
      <div class="heading_container heading_center">
        <h2 class="">
          Our <span> Proud Alumni</span>
        </h2>
      </div>

      <div class="team_container">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="assets\img\11.png" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Md. Shofiul Alam
    
                </h5>
                <p>
                Founder & CEO, Belancer
                </p>
                <p>
                  Dept: BBA
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="assets\img\15.jpg" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Md. Ejaj-Ur-Rahaman
                
                </h5>
                <p>
                Assistant Professor, DIU
                </p>
                <p>
                  Dept: BBA
                </p>
              </div>
              <div class="social_box">
              <a href="#">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="assets\img\13.jpg" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Subhenur Latif
                
                </h5>
                <p>
                Assistant Professor, CSE, DIU
                </p>
                <p>
                  Dept: CSE
                </p>
              </div>
              <div class="social_box">
              <a href="#">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="assets\img\14.jpg" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Sumon Mozumder
                
                </h5>
                <p>
                Assistant Professor, TE, DIU
                </p>
                <p>
                  Dept: TE
                </p>
              </div>
              <div class="social_box">
              <a href="#">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


    <!-- Contact Start -->
    <div class="container-fluid py-5 bg-image">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-secondary d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Our Location</h4>
                                <p class="m-0">Ashulia, Birulia, Savar, Dhaka, Bangladesh</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Call Us</h4>
                                <p class="m-0">+8801912345679</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Us</h4>
                                <p class="m-0">alumni@diu.edu.bd</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>
                        <h1 class="display-4">Send Us A Message</h1>
                    </div>
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
 
 <!-- Include jQuery library -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Waypoints library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.waypoints@4.0.1/lib/jquery.waypoints.min.js"></script>
    <!-- Include Counter-Up library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.counterup@2.1.0/jquery.counterup.min.js"></script>
    <!-- Include your custom JavaScript file -->
    <script src="scripts/counter.js"></script>

    <!-- Initialize Counter-Up -->
     <!-- JavaScript Libraries -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
    <script src="js/main.js"></script>
<script>
     $('.read_more').click(function(){
         location.href = "index.php?page=view_event&id="+$(this).attr('data-id')
     })
     $('.banner img').click(function(){
        viewer_modal($(this).attr('src'))
    })
    $('#filter').keyup(function(e){
        var filter = $(this).val()

        $('.card.event-list .filter-txt').each(function(){
            var txto = $(this).html();
            txt = txto
            if((txt.toLowerCase()).includes((filter.toLowerCase())) == true){
                $(this).closest('.card').toggle(true)
            }else{
                $(this).closest('.card').toggle(false)
               
            }
        })
    })

    let slideIndex = 0;

function showSlides() {
    const slides = document.querySelectorAll('.slide');
    if (slideIndex >= slides.length) slideIndex = 0;
    if (slideIndex < 0) slideIndex = slides.length - 1;

    slides.forEach((slide, index) => {
        slide.style.display = index === slideIndex ? 'block' : 'none';
    });
}

function nextSlide() {
    slideIndex++;
    showSlides();
}

function prevSlide() {
    slideIndex--;
    showSlides();
}

// Initialize
showSlides();
setInterval(nextSlide, 5000); // Change slide every 5 seconds

document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    const increment = target / 200;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        });
</script>