<?php
session_start();
require 'conn.php';
if(!$_SESSION['name'] && $_SESSION['name'] !=true ){
    header('location:login.php');
}

$fetch_vaccineQ = "SELECT * FROM `vaccine` ";

$fetch_vaccine = mysqli_query($conn,$fetch_vaccineQ);


$cont_reg_patQ  = "SELECT * FROM `reg_patient`"; 
$cont_reg_pat = mysqli_query($conn,$cont_reg_patQ);
$cont_check_reg_pat = mysqli_num_rows($cont_reg_pat);

$cont_reg_hosQ  = "SELECT * FROM `accept_hospital`"; 
$cont_reg_hos = mysqli_query($conn,$cont_reg_hosQ);
$cont_check_reg_hos = mysqli_num_rows($cont_reg_hos);

$count_reg_pat_vaccQ = "SELECT * FROM `accept_patient` WHERE `pateint_dos_1`= 'vaccinated'"; 
$count_reg_pat_vacc =  mysqli_query($conn,$count_reg_pat_vaccQ);
$count_reg_pat_vacc_check =  mysqli_num_rows($count_reg_pat_vacc);

$count_reg_pat_vacc_dos_2Q = "SELECT * FROM `accept_patient` WHERE `pateint_dos_1`= 'vaccinated' and `pateint_dos_2`= 'vaccinated'"; 
$count_reg_pat_vacc_dos_2 =  mysqli_query($conn,$count_reg_pat_vacc_dos_2Q);
$count_reg_pat_vacc_dos_2_check =  mysqli_num_rows($count_reg_pat_vacc_dos_2);




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome to HS-centre </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<?php require './component/_links.php';?>
<style>

  .row{
    text-transform: capitalize;
  }
  .icon-box:hover{
    color: white !important;
  }
  .icon{
    display: flex;
    justify-content: center;
    align-items: flex-start;
   height: 7rem;
  }
  .icon i{
    background-color:  #4154f1;
    padding: 2rem;
    border-radius: 50%;
    color: white !important;
  }
.col-md-6:hover .icon i{
background-color: white;
color:#4154f1 !important ;
}
.hospital-icon i{
  padding: 2.2rem  2rem;
}
.hospital_titile{
  display: flex;
    justify-content: center;
    align-items: flex-start;
}
.hospital_card{
  background-color: rgb(243, 243, 243) !important;
}
.vaccine-card{
  background-color: rgb(243, 243, 243) !important;
}
</style>

</head>

<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
<?php require './component/_nav.php';?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets_user/img/slide/slide-1.jpg)">
          <div class="container">
            <h2>Welcome to <span>HS centre</span></h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets_user/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>About</h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets_user/img/slide/slide-3.jpg)">
          <div class="container">
            <h2>servive</h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section  class="featured-services" id="vaccine">
      <div class="section-title" >
        <h2>vaccine list</h2>
       
      </div>
      <div class="container" data-aos="fade-up">
      

        <div class="row" >
            <!-- card -->
        <!-- card -->
        <!-- card -->
     
         <?php
         
         while($vaccine = mysqli_fetch_assoc($fetch_vaccine)){
          $row = mysqli_num_rows($fetch_vaccine);


            echo '

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 mt-4" >
           
             <div class="icon-box vaccine-card" data-aos="fade-up" data-aos-delay="100" style="width: 20rem;">
              
               <div class="icon"><i class="fa-solid fa-syringe"></i></div>
               <h4 class="title">'.$vaccine['vaccine_name'].'</h4>
               <p class="description">
    
               </p>
               <a href="pat_reg.php?vaccine_name='.$vaccine['vaccine_name'].'"> <div class="vacc-reg-btn ">register</div></a>
             </div>
   
           </div>
          ';
          

       


         }
         
         
         ?>
     
         

        </div>

      </div>
   
    </section><!-- End Featured Services Section -->

    <!-- ======= Cta Section ======= -->
 <br>

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>In the wake of the unprecedented COVID-19 pandemic, healthcare institutions worldwide have been facing immense challenges, but also displaying remarkable resilience in their efforts to combat the virus</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="https://www.idap.pk/updata/products/38/w1024/38_20171202134724.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>At the heart of our COVID-19 Hospital are the healthcare workers   </h3>
            <p class="fst-italic">
            Our COVID-19 Hospital stands as a beacon of hope, unity, and dedication, serving as a front-line facility in the battle against this formidable adversary. This article aims to shed light on the extraordinary work carried out within the walls of our hospital and the profound impact it has on patients, healthcare professionals, and the community at large.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> The hospital's leadership has ensured that every frontline worker has access to proper personal protective equipment (PPE)</li>
              <li><i class="bi bi-check-circle"></i>Our COVID-19 Hospital has embraced innovation and collaboration to effectively respond to the evolving pandemic. </li>
              <li><i class="bi bi-check-circle"></i> The establishment of specialized COVID-19 units and treatment centers has enabled us to efficiently manage patient flow while minimizing the risk of cross-contamination.</li>
            </ul>
            <p>
            The collaboration between our medical experts and researchers has been instrumental in identifying and implementing evidence-based treatment approaches. Cutting-edge medical technologies have been employed to enhance diagnostics, track the spread of the virus, and monitor patients' conditions closely.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

      <div class="section-title">
          <h2>Achievement</h2>
        </div>
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <?php
              
              echo '<span data-purecounter-start="0" data-purecounter-end="'.$cont_check_reg_pat .'" data-purecounter-duration="1"
               class="purecounter"></span>
              ';
              ?>
              <p><strong>Total Patients </strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <?php
              echo ' <span data-purecounter-start="0" data-purecounter-end="'.$cont_check_reg_hos.'" data-purecounter-duration="1" class="purecounter"></span>';
              ?>
             
              <p><strong>Hospitals</strong></p>
            
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <?php
              echo ' <span data-purecounter-start="0" data-purecounter-end="'.$count_reg_pat_vacc_check.'" data-purecounter-duration="1" class="purecounter"></span>';
              ?>  <p><strong>compelete 1st dos vaccinated patient</strong></p>
              
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <?php
              echo ' <span data-purecounter-start="0" data-purecounter-end="'.$count_reg_pat_vacc_dos_2_check.'" data-purecounter-duration="1" class="purecounter"></span>';
              ?>               <p><strong>fully Vaccinated Patients</strong> </p>
              
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Our COVID-19 Hospital is at the forefront of combating the pandemic with comprehensive care. We have specialized units equipped with cutting-edge facilities to treat COVID-19 patients, alongside advanced diagnostics and testing capabilities.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="fas fa-heartbeat"></i></div>
            <h4 class="title"><a href="">Specialized COVID-19 Units</a></h4>
            <p class="description">Our hospital has dedicated units exclusively designed to treat COVID-19 patients. These units are equipped with state-of-the-art facilities, including negative pressure rooms, to prevent the spread of the virus within the facility.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="fas fa-pills"></i></div>
            <h4 class="title"><a href="">Advanced Diagnostics and Testing</a></h4>
            <p class="description">We employ cutting-edge diagnostic technologies for swift and accurate COVID-19 testing. Our laboratory services ensure prompt results, enabling timely patient care and effective isolation measures.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="fas fa-hospital-user"></i></div>
            <h4 class="title"><a href="">Compassionate Patient Care</a></h4>
            <p class="description">At our COVID-19 hospital, compassionate care is at the forefront of our approach. Our healthcare professionals are committed to providing personalized attention, emotional support, and tailored treatment plans for each patient.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="fas fa-dna"></i></div>
            <h4 class="title"><a href="">Collaborative Treatment Approaches</a></h4>
            <p class="description">Our medical experts collaborate closely to develop evidence-based treatment protocols. Interdisciplinary teamwork ensures that patients receive the best possible care, benefiting from the collective expertise of various specialties.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="fas fa-wheelchair"></i></div>
            <h4 class="title"><a href="">Telemedicine and Virtual Consultations</a></h4>
            <p class="description">To minimize exposure and ensure the safety of both patients and healthcare workers, we offer telemedicine services for non-emergency consultations and follow-ups. This enables patients to receive medical advice and care from the comfort of their homes.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="fas fa-notes-medical"></i></div>
            <h4 class="title"><a href="">Community Education and Outreach</a></h4>
            <p class="description">We actively engage with the community through educational programs and awareness campaigns. By disseminating accurate information about COVID-19 prevention, symptoms, and vaccination, we empower the community to protect themselves and others.</p>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <section  class="featured-services" id="hospital">
      <div class="section-title" >
        <h2>Hospitals</h2>
       
      </div>
      <div class="container" data-aos="fade-up">
      

        <div class="row " >
            <!-- card -->
        <!-- card -->
        <!-- card -->
     
        <?php
         
         while($hospital_data = mysqli_fetch_assoc($cont_reg_hos)){
            echo '

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 mt-4 " >
           
             <div class="icon-box vaccine-card hospital_card" data-aos="fade-up" data-aos-delay="100" style="width: 20rem;">
              
               <div class="icon hospital-icon"><i class="fa-solid fa-hospital"></i></div>
               <h4 class="title hospital_titile">'.$hospital_data['hospital_name'].'</h4>
               <ul>
               <li><a class="nav-link scrollto " >Location :'.$hospital_data['hospital_location'].' </a></li>
               <li><a class="nav-link scrollto " >Phone : '.$hospital_data['hospital_contact'].'</a></li>
               <li><a class="nav-link scrollto " >Email : '.$hospital_data['hospital_email'].'</a></li>
              
             
               </ul>
             </div>
   
           </div>
          ';
          

       


         }
         
         
         ?>
     
         

        </div>

      </div>
   
    </section><!-- End Featured Services Section -->

  

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>During these trying times of the COVID-19 pandemic, fear and uncertainty loomed large over our lives. But amidst the darkness, there emerged a ray of hope - my experience at the COVID-19 Hospital. In this testimonial, I share my journey through illness, recovery, and the exceptional care provided by the healthcare heroes at this hospital. Their unwavering dedication and compassion transformed my battle against the virus into a testament of human resilience.</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->


   

    <!-- ======= Frequently Asked Questioins Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questioins</h2>
          <p>The Frequently Asked Questions (FAQs) about COVID-19 Hospital Services provide a clear overview of the hospital's offerings. The hospital has specialized units for COVID-19 patients, advanced diagnostic technologies for testing, and compassionate patient care. </p>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">What services does the COVID-19 Hospital provide? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
              The COVID-19 Hospital offers specialized units for COVID-19 patients, advanced diagnostics and testing, compassionate patient care, collaborative treatment approaches, telemedicine services, and community education and outreach programs.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Are there separate units for COVID-19 patients? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
              Yes, the hospital has dedicated units specifically designed to treat COVID-19 patients, equipped with state-of-the-art facilities to prevent virus transmission.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">What diagnostic technologies are used for COVID-19 testing?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
              The hospital employs cutting-edge diagnostic technologies to provide swift and accurate COVID-19 testing, ensuring timely patient care and effective isolation measures.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">How does the hospital ensure compassionate patient care <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
              Healthcare professionals at the COVID-19 Hospital prioritize compassionate care, providing personalized attention, emotional support, and tailored treatment plans for each patient.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Do different medical specialties collaborate on patient treatment?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
              Yes, our COVID-19 Hospital promotes collaborative treatment approaches, with medical experts from various specialties working together to develop evidence-based treatment protocols.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Does the hospital offer telemedicine services? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
              Yes, telemedicine services are available for non-emergency consultations and follow-ups, allowing patients to receive medical advice and care from the safety and comfort of their homes.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End Frequently Asked Questioins Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
   
        </div>

      </div>

      <div>
    
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

 <?php require './component/_footer.php';?>

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 
  <?php require './component/_user_script.php';?>
</body>

</html>