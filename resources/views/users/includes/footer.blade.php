<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 footer5 mt-5">
                <a href="{{ route('index.get') }}"> <img src="{{ asset('user-assets') }}/images/logo.png" class="img-fluid"
                        alt="img"> </a>
                <div class="footer1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>


                <!-- Social Box -->
                <ul class="d-flex social-box">
                    <li>
                        <a href="#" class="fab fa-facebook-f"></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
                    </li>
                    <li>
                        <a href="#" class="fa-brands fa-linkedin-in"></a>
                    </li>

                </ul>
            </div>

            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 footer4">
                <h4 class="mb-4">QUICK LINKS</h4>
                <ul class="footer2">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="faq.php">FAQ's</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3  footer4">
                <h4 class="mb-4">CONTACT US</h4>
                <div class="footer3">
                    <h6>Address</h6>
                    <p>Houston 8835 Long Point Rd</p>
                    <h6>Email Address</h6>
                    <p>Info@gmail.com</p>
                    <h6>Phone Number</h6>
                    <p>(832) 393-2000</p>
                </div>
            </div>


            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12  mb-3">
                <div class="copyright ">
                    Copyright © 2023 The Memory Palace. All Rights Reserved.
                </div>
            </div>


        </div>
    </div>
</section>
<script src="{{ asset('user-assets') }}/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('user-assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('user-assets') }}/js/slick.js"></script>
<script src="{{ asset('user-assets') }}/js/slick.min.js"></script>
<script src="{{ asset('user-assets') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('user-assets') }}/js/owl-custom.js"></script>
<script src="{{ asset('user-assets') }}/js/title.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="{{ asset('user-assets') }}/js/custom.js"></script>
<script>
    $(document).ready(function() {
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/') + 1);
        if (filename == "") {
            filename = "dashboard.php"
        }
        $(`.dash2 a[href="${filename}"]`).addClass("active1")
    })
    $(".dash2 a").click(function() {

    })
</script>
<script>
    document.getElementsByTagName("body")[0].style.overflowX = "hidden";
</script>

<script>
    $(document).ready(function() {
        // Initialize first carousel
        $("#slider1").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2.2
                }
            }
        });

        // Initialize second carousel
        $("#slider2").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });

    });
</script>

<!-- scroll-top the page  -->

<script>
    var btn = $('#button');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
</script>

<!-- page loader -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Show loader
        document.getElementById("bg").style.display = "flex";

        // Simulate a delay using setTimeout
        setTimeout(function() {
            // Hide loader after 3 seconds (adjust as needed)
            document.getElementById("bg").style.display = "none";
        }, 3000);
    });
</script>

<!-- tab javascriept -->

<script>
    $(document).ready(function() {
        $('.tab-a').click(function() {
            $(".tab").removeClass('tab-active');
            $(".tab[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");
            $(".tab-a").removeClass('active-a');
            $(this).parent().find(".tab-a").addClass('active-a');
            return false;
        });
    });
</script>

</body>

</html>
