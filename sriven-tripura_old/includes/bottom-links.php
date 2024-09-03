<!--<script>-->
<!--    const lazyImages=document.querySelectorAll(".lazy"),options={rootMargin:"0px",threshold:.1},callback=(e,r)=>{e.forEach(e=>{if(e.isIntersecting){let s=e.target;s.src=s.dataset.src,s.classList.remove("lazy"),r.unobserve(s)}})},observer=new IntersectionObserver(callback,options);lazyImages.forEach(e=>{observer.observe(e)});-->
<!--     const lazyVideos=document.querySelectorAll(".lazy-video"),videoOptions={rootMargin:"0px",threshold:.1},videoCallback=(e,o)=>{e.forEach(e=>{if(e.isIntersecting){let r=e.target;r.src=r.dataset.src,r.classList.remove("lazy-video"),o.unobserve(r)}})},videoObserver=new IntersectionObserver(videoCallback,videoOptions);lazyVideos.forEach(e=>{videoObserver.observe(e)});-->

<!--</script>-->


<!-- MOBILE CTA TOP HEADER -->
<div class="container">
  <div class="row cta_fixed_top mobile_cta">
    <div class="col div-one">
    <a href="tel:6309487999" class="book_visita btn cta_btn_bg div_pading">Call  </a>
    </div>
    <div class="col div-one">
    <a data-toggle="modal" data-target="#myModal_enquire" href="#" class="book_visita btn cta_btn_bg">Enquire Now</a>
    </div>
    <div class="col div-one">
    <a data-toggle="modal" data-target="#myModal_brochure" href="#" class="book_visita btn cta_btn_bg">Brochure</a>
    </div>
  </div>
  </div>
<!-- MOBILE CTA TOP HEADER -->


<!--fixed icons -->
<div class="fixed_side_icons desktop_cta">
    <a href="tel:6309487999" class="callicon"><i class="fal fa-phone"></i><span class="downloadtext">+91 6309487999</span></a>
    <a data-toggle="modal" data-target="#myModal_enquire" href="#" class="enquireicon"><i class="fa fa-envelope" aria-hidden="true"></i><span class="downloadtext">Enquire Now</span></a>
    <a data-toggle="modal" data-target="#myModal_brochure" href="#" class="downloadicon"><i class="fa fa-download" aria-hidden="true"></i><span class="downloadtext">Download Brochure</span></a>
    <a class="fixed_wa" href="https://api.whatsapp.com/send?phone=916309487999" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
</div>
<div class="modal fade" id="myModal_enquire" role="dialog">
    <div class="modal-dialog">
        
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Enquire Now</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <form  action="thank-you.php" method="post">
              <div class="site-visit mt-none-10">
                <div class="form-group mt-10">
                 <label for="name3"><i class="fal fa-user"></i></label>
                 <input type="text" name="name" id="name3" placeholder="Name" class="demoInputBox" required pattern="[A-Za-z .]{3,30}" title="Enter valid Name, Max characters allowed are 30">
                 <!--<span id="name-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="email1"><i class="fal fa-envelope"></i></label>
                 <input type="email" name="email" id="email1" placeholder="Email" class="demoInputBox" required title="Enter a valid Email ID" >
                 <!--<span id="email-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="phonenumber3"><i class="fal fa-phone"></i></label>
                 <input type="text" name="phone" id="phonenumber3" placeholder="Phone Number" class="demoInputBox" required pattern="[6-9]{1}[0-9]{9}" title="Enter Valid 10 digits Mobile Number">
                 <!--<span id="phone-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="project3"><i class="fal fa-building"></i></label>
                 <select name="interested" required id="project3" class="demoInputBox project text-dark">
                     <option value="">Interested In</option>
                     <option value="2 BHK">2 BHK</option>
                     <option value="3 BHK">3 BHK</option>
                 </select>
                 <!--<span id="phone-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="query3"><i class="fal fa-pencil"></i></label>
                 <textarea name="message" id="query3" cols="2" rows="2" placeholder="Message" class="demoInputBox"></textarea>
                 <!--<span id="query-info" class="info"></span>-->
             </div>
             
             <input type="hidden" name="utm_campaign" value="<?php echo $_GET['utm_campaign'];?>">
              <input type="hidden" name="SRD_val" value="<?php echo $_GET['SRD_val'];?>">
             
             <div class="form-group mt-50">
                 <button type="submit" id="submit3" class="site-btn boxed sub_mit">SUBMIT</button>
             </div>
         </div>
         <input type="hidden" id="token" name="token">
     </form>
 </div>
 <!--<div class="modal-footer">-->
    <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
    <!--</div>-->
</div>

</div>
</div>
<div class="modal fade" id="myModal_brochure" role="dialog">
    <div class="modal-dialog">
        
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Download Brochure</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <form  action="thank-you.php" method="post">
              <div class="site-visit mt-none-10">
                <div class="form-group mt-10">
                 <label for="name1"><i class="fal fa-user"></i></label>
                 <input type="text" name="name" id="name1" placeholder="Name" class="demoInputBox" required pattern="[A-Za-z .]{3,30}" title="Enter valid Name, Max characters allowed are 30">
                 <!--<span id="name-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="email2"><i class="fal fa-envelope"></i></label>
                 <input type="email" name="email" id="email2" placeholder="Email" class="demoInputBox" required title="Enter a valid Email ID" >
                 <!--<span id="email-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="phonenumber1"><i class="fal fa-phone"></i></label>
                 <input type="text" name="phone" id="phonenumber1" placeholder="Phone Number" class="demoInputBox" required pattern="[6-9]{1}[0-9]{9}" title="Enter Valid 10 digits Mobile Number">
                 <!--<span id="phone-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="project1"><i class="fal fa-building"></i></label>
                 <select name="interested" required id="project1" class="demoInputBox project text-dark">
                     <option value="">Interested In</option>
                     <option value="2 BHK">2 BHK</option>
                     <option value="3 BHK">3 BHK</option>
                 </select>
                 <!--<span id="phone-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="query1"><i class="fal fa-pencil"></i></label>
                 <textarea name="message" id="query1" cols="2" rows="2" placeholder="Message" class="demoInputBox"></textarea>
                 <!--<span id="query-info" class="info"></span>-->
             </div>
             <div class="form-group mt-50">
                 <button type="submit" id="submit1" class="site-btn boxed sub_mit">SUBMIT</button>
             </div>
         </div>
         <input type="hidden" id="token1" name="token">
     </form>
 </div>
 <!--<div class="modal-footer">-->
    <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
    <!--</div>-->
</div>

</div>
</div>
<div class="modal fade" id="myModal_visit" role="dialog">
    <div class="modal-dialog">
        
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Book a Site Visit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <form id="popUpSiteVisitForm" action="thank-you.php" method="post">
              <div class="site-visit mt-none-10">
                <div class="form-group mt-10">
                 <label for="name2"><i class="fal fa-user"></i></label>
                 <input type="text" name="name" id="name2" placeholder="Name" class="demoInputBox" required pattern="[A-Za-z .]{3,30}" title="Enter valid Name, Max characters allowed are 30">
                 <!--<span id="name-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="email3"><i class="fal fa-envelope"></i></label>
                 <input type="email" name="email" id="email3" placeholder="Email" class="demoInputBox" required title="Enter a valid Email ID" >
                 <!--<span id="email-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10">
                 <label for="phonenumber2"><i class="fal fa-phone fa-flip-horizontal"></i></label>
                 <input type="text" name="phone" id="phonenumber2" placeholder="Phone Number" class="demoInputBox" required pattern="[6-9]{1}[0-9]{9}" title="Enter Valid 10 digits Mobile Number">
                 <!--<span id="phone-info" class="info"></span>-->
             </div>
             <div class="form-group mt-10" onclick="showDate()" >
                 <label for="phonenumber2"><i class="fal fa-calendar"></i></label>
                 <input id="datePicker"  class="col-md-12 col-sm-12 col-xs-12"  type="date" name="vistdate" required>
             </div>
             <div class="form-group mt-10">
                 <label for="project2"><i class="fal fa-building"></i></label>
                 <select name="interested" required id="project2" class="demoInputBox project">
                     <option value="">Interested In</option>
                     <option value="2 BHK">2 BHK</option>
                     <option value="3 BHK">3 BHK</option>
                 </select>
                 <!--<span id="phone-info" class="info"></span>-->
             </div>
             
              <input type="hidden" name="utm_campaign" value="<?php echo $_GET['utm_campaign'];?>">
              <input type="hidden" name="SRD_val" value="<?php echo $_GET['SRD_val'];?>">
             
             <div class="form-group mt-10">
                 <label for="query2"><i class="fal fa-pencil"></i></label>
                 <textarea name="message" id="query2" cols="2" rows="2" placeholder="Message" class="demoInputBox"></textarea>
                 <!--<span id="query-info" class="info"></span>-->
             </div>
             <div class="form-group mt-50">
                 <button type="submit" id="submit2" class="site-btn boxed sub_mit">SUBMIT</button>
             </div>
         </div>
         <input type="hidden" id="token2" name="token">
     </form>
 </div>
 <!--<div class="modal-footer">-->
    <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
    <!--</div>-->
</div>

</div>
</div>


<!--CALENDAR PREVIOUS DATE HIDE CODE-->
<script language="javascript">
        
    var today = new Date();
    
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $('#datePicker').attr('min', today);

</script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<!--<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>-->

<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/lightcase.css">
<link rel="stylesheet" href="assets/css/meanmenu.css">
<link rel="stylesheet" href="assets/css/nice-select.css">
<link rel="stylesheet" href="assets/css/odometer.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/default.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
<!-- Link Swiper's CSS -->
 <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">-->

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />-->

<!--========= JS Here =========-->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/jquery.meanmenu.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/lightcase.js"></script>
<!--<script src="assets/js/odometer.min.js"></script>-->
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/sticky-header.js"></script>
<script src="assets/js/waypoint.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/brochure_validation.js"></script>
<script src="assets/js/form-submit.js"></script>

<script>
    /****sticky sidebar ***********/
    $(window).scroll(function(){
        if ($(this).scrollTop() < 0) {
         $('#myBtn').addClass('d-none');
     } else if($(this).scrollTop() < 10) {
         $('#myBtn').addClass('d-md-block');
     }
     else {
         $('#myBtn').removeClass('d-none');
         $('#myBtn').addClass('d-none d-xs-none');
     }
 });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".mySwiper-1",{
            slidesPerView: 1,
            spaceBetween: 2,
            autoplay: {
                delay: 5e3,
                disableOnInteraction: !1
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: !0
            },
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 2
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 2
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 2
                }
            }
        });
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".mySwiper-2",{
            slidesPerView: 1,
            spaceBetween: 2,
            autoplay: {
                delay: 5e3,
                disableOnInteraction: !1
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: !0
            },
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 2
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 2
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 2
                }
            }
        });
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".mySwiper-3",{
            slidesPerView: 1,
            spaceBetween: 2,
            autoplay: {
                delay: 5e3,
                disableOnInteraction: !1
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: !0
            },
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 2
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 2
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 2
                }
            }
        });
    });

</script>



<!--<div class="modal fade" id="myModal_popup" role="dialog">-->
<!--    <div class="modal-dialog">-->

        <!-- Modal content-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" style="color:black;">&times;</button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <img src="assets/images/body-img/popup.jpg" alt="popup" style="width:100%;" />-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--<script>-->
<!--    $(document).ready(function(){-->
    
<!--    setTimeout(function(){-->
<!--			 $("#myModal_popup").modal('show');-->
<!--			 }, 2000);-->
<!--})-->
<!--</script>-->


<!--Chat bot code start -->
<script src="https://www.kenyt.ai/botapp/ChatbotUI/dist/js/bot-loader.js" type="text/javascript" data-bot="28245355"></script>

<!--Chat bot code End-->

