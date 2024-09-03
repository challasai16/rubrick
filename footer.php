<!-- footer -->
<footer>
    <div class="container">
        <div class="footer">
            <!-- 1 -->
            <div class="card">
                <div class="links">
                    <h3>QUIK LINKS</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">about Us</a></li>
                        <li><a href="https://www.rubrick.in/sriven-tripura/" target="_blank">Sriven Tripura</a></li>
                        <li><a href="https://www.rubrick.in/tulip.php" target="_blank">Rubrick - Tulip</a></li>
                        <li><a href="https://www.rubrick.in/comingsoon.php" target="_blank">Rubrick - Sree Niketan</a></li>
                        <li><a href="">Gallery</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="contact">
                    <h3>CONTACT</h3>
                    <p><a href="tel:6309487999"><i class="fa-solid fa-phone"></i>+91 6309 487 999</a></p>
                    <p><a href="mailto:enquiry@rubrick.in"><i class="fa-solid fa-envelope"></i>enquiry@rubrick.in</a></p>
                </div>
            </div>
            <!-- 2 -->
            <div class="card">
                <div class="address">
                    <h3>ADDRESS</h3>
                    <p><i class="fa-solid fa-location-dot"></i>Rubrick Constructions<br>
                        5th Floor, Pardha's Picasa, Kavuri Hills,<br>
                        Madhapur, Hyderabad - 500 081,<br>
                        Telangana, INDIA.</p>
                </div>
                <div class="follow">
                    <h3>FOLLOW US ON</h3>
                    <ul>
                        <li><a href="https://www.facebook.com/rubrickconstruction" target="_blank"><img src="img/facebook.svg"></a></li>
                        <li><a href="https://www.instagram.com/rubrickconstructions" target="_blank"><img src="img/instagram.svg"></a></li>
                        <li><a href="https://x.com/Rubrickbuilders" target="_blank"><img src="img/twitter.svg"></a></li>
                        <li><a href="https://www.youtube.com/@rubrickconstructions" target="_blank"><img src="img/youtube.svg"></a></li>
                        <li><a href="https://www.linkedin.com/company/rubrickconstructions" target="_blank"><img src="img/linkedin.svg"></a></li>
                        <li><a href="https://wa.me/916309487999" target="_blank"><img src="img/whatsapp.svg"></a></li>
                    </ul>
                </div>
            </div>
            <!-- 3 -->
            <div class="card">
                <div class="form-container">
                    <h3>ENQUIRE NOW</h3>
                    <form action="thankyou.php" method="POST">
                        <!-- 1 -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="Name" required>
                        </div>
                        <!-- 2 -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <!-- 3 -->
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input name="phone" type="tel" id="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <!-- 4 -->
                        <div class="form-group">
                            <label for="project">Project</label>
                            <select name="project" required>
                                <option value="" selected>Select Project</option>
                                <option value="Sriven Tripura">Sriven Tripura</option>
                                <option value="Rubrick Tulip">Rubrick Tulip</option>
                                <option value="Rubrick Sree Niketan">Upcoming Projects</option>
                            </select>
                        </div>
                        <button type="submit" class="submit-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer image -->
<!--<section class="footer-img">-->
<!--    <img src="img/footer3.jpg" alt="Footer Image">-->
<!--</section>-->

<!--copyright-->
<section class="bottom">
    <div class="container">
        <div class="main-copy">
            <!--left-->
            <div class="copy-left">
                <p>Rubrick Constructions © 2023 | Terms & Conditions Disclaimer | Privacy Policy</p>
            </div>
            <!--right-->
            <div class="copy-right">
                <p>Powered by | <a href="https://www.madworks.in/" target="_blank">MAD Works</a> | Digital Marketing Partner</p>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



<script src="https://www.kenyt.ai/botapp/ChatbotUI/dist/js/bot-loader.js" type="text/javascript" data-bot="28245355"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!/[0-9]/.test(ch)) {
            evt.preventDefault();
        }
    }
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function (callback) {
            fetch('https://ipinfo.io/json', { headers: { 'Accept': 'application/json' } })
                .then(response => response.json())
                .then(data => {
                    var countryCode = (data && data.country) ? data.country : "us";
                    callback(countryCode);
                })
                .catch(() => callback("us"));
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        nationalMode: false,
        separateDialCode: true
});
</script>

<script>
    // sliders
    $('.slider-main').slick({
        nextArrow: '<i class="bi bi-chevron-compact-right"></i>',
        prevArrow: '<i class="bi bi-chevron-compact-left"></i>',
        autoplay: true,
        autoplaySpeed: 1500,
    });

    $('.slider-main').hover(
        function() {
            $(this).slick('slickPause');
        },
        function() {
            $(this).slick('slickPlay');
        }
    );
</script>

<script>
    // header
    window.addEventListener('scroll', function() {
        const header = document.getElementById('main-header');
        if (window.scrollY > 25) {
            header.classList.add('active');
        } else {
            header.classList.remove('active');
        }
    });
</script>

<script>
    // mobile menu
    document.addEventListener("DOMContentLoaded", function() {
        var toggleButton = document.getElementById("menu-toggle");
        var offCanvasMenu = document.getElementById("off-canvas-menu");

        function closeMenu() {
            offCanvasMenu.classList.remove("open");
        }

        toggleButton.addEventListener("click", function(event) {
            event.stopPropagation();
            offCanvasMenu.classList.toggle("open");
        });

        document.addEventListener("click", function(event) {
            if (!offCanvasMenu.contains(event.target) && event.target !== toggleButton) {
                closeMenu();
            }
        });
    });
</script>
<!--popup-->
<script>
window.onload = function() {
    var modal = document.getElementById("modal");
    var acceptBtn = document.getElementById("acceptBtn");
    if (localStorage.getItem('disclaimerAccepted') !== 'true') {
        modal.style.display = "block";
    }
    acceptBtn.onclick = function() {
        modal.style.display = "none";
        localStorage.setItem('disclaimerAccepted', 'true');
    }
}
</script>
<script type="text/javascript" src="js/menu.js"></script>