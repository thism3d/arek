<?php
require_once "server_files/header.php";
?>




<div class="home_page_slider_container">
    <div class="owl-carousel owl-theme home_page_slider_inside">

        <div class="home_page_slider_item"
            style="background-image: url('assets/homepage/the-wall-separating-the-two-rooms-2023-11-27-05-26-03-utc.jpg');">
            <h1 class="home_page_slider_header">What We Do?</h1>
            <p class="home_page_slider_desc">"AREK Property Management offers leasing and full property management
                services. We provide rental property supervision, management, tenant placement, rent collection,
                tenant relations, evictions, bill payments, property maintenance and inspections."</p>


            <div class="home_slider_button_keeper">
                <a class="common_btn_home" onclick="showInquireBtn()"><span class="material-icons">more_vert</span>
                    INQUIRE NOW</a>
                <a class="common_btn_home" href="tel:+14037012169"><span class="material-icons">more_vert</span> GET
                    STARTED</a>
            </div>
        </div>
        <div class="home_page_slider_item"
            style="background-image: url('assets/homepage/a-living-room-with-a-couch-and-a-chair-2023-11-27-04-52-01-utc.jpg');">
            <h1 class="home_page_slider_header">Who We Are?</h1>
            <p class="home_page_slider_desc">"We are property management company based out of Calgary, Alberta. We
                specialize in high rise condo units, duplex, triplex and single family homes. We Service Greater
                Calgary area including Canmore, Banff, Okotoks, High river, Chestermere, Airdrie and Cochrane."
            </p>



            <div class="home_slider_button_keeper">
                <a class="common_btn_home" onclick="showInquireBtn()"><span class="material-icons">more_vert</span>
                    INQUIRE NOW</a>
                <a class="common_btn_home" href="tel:+14037012169"><span class="material-icons">more_vert</span> GET
                    STARTED</a>
            </div>
        </div>


    </div>
</div>


<div class="experience_care_section">
    <h2 class="experience_main_heading">Promise of Professional Care <br>
        by AREK Property Management
    </h2>


    <div class="experience_item">
        <div class="experience_ite_inside">

            <div class="experience_item_left">
                <h2 class="experience_item_heading">Stress free investing</h2>
                <p class="experience_item_brief">Investing in a residential rental property can be financially
                    rewarding, but it also brings its fair share of challenges and worries. By working with a
                    knowledgeable Calgary property manager, you can save valuable time and reduce costs.</p>
                <a href="services" class="experience_item_link">Learn about our Services</a>
            </div>
            <div class="experience_item_right">
                <img class="experience_item_img" src="assets/homepage/oZZ2OlY4Y6kh-DALL-E-i.jpg" alt="">
            </div>

        </div>
    </div>


    <div class="experience_item">
        <div class="experience_ite_inside experience_item_flex_reverse">

            <div class="experience_item_left">
                <h2 class="experience_item_heading">Expert Team. Superior Returns</h2>
                <p class="experience_item_brief">At AREK Property Management, we offer a comprehensive, full-service
                    approach that goes beyond relying on a single, overburdened property manager. Our structured
                    team of skilled professionals brings a wealth of expertise, ensuring top-tier service and
                    maximizing the return on your investment.</p>
                <a href="contact" class="experience_item_link">Contact our Support</a>
            </div>
            <div class="experience_item_right">
                <img class="experience_item_img" src="assets/homepage/business-people-2023-11-27-05-36-29-utc.jpg"
                    alt="">
            </div>

        </div>
    </div>

    <div class="experience_item experience_item_grey">
        <div class="experience_ite_inside">

            <div class="experience_item_left">
                <h2 class="experience_item_heading">No Upfront Cost</h2>
                <p class="experience_item_brief">We’re transforming property management by eliminating upfront fees
                    and expenses. Instead, we offer a straightforward monthly management fee, calculated as a
                    percentage of the rent. You’ll only be charged once a tenant is secured and begins paying rent.
                    </a>
            </div>
            <div class="experience_item_right">
                <img class="experience_item_img"
                    src="assets/homepage/portrait-of-excited-couple-by-gate-holding-house-k-2023-11-27-05-22-35-utc.jpg"
                    alt="">
            </div>

        </div>
    </div>




</div>

<script>
$(document).ready(function() {
    $(".home_page_slider_inside").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        navClass: ['owl_prev', 'owl_next'],
        responsive: {
            0: {
                items: 1,
            },
        },
        smartSpeed: 1000, // Transition speed when clicking navigation buttons (1 second)
        autoplaySpeed: 1000 // Transition speed during autoplay (1 second)
    });
});
</script>




<section class="customers_saying">
    <h2 class="cusomter_saying_heading">What Customers are saying about us.
    </h2>

    <div class="customer_saying_contianer">
        <div class="customer_saying_inside">

            <div class="cas_saying_left">
                <button class="cas_saying_btn" onclick="change_testimonials('prev')"><span
                        class="material-icons">arrow_back_ios</span></button>
            </div>
            <div class="cas_saying_center">
                <p id="customer_saying_commer" class="cas_saying_comment">He was my rental agent when I first moved
                    to Calgary 4 years ago, now I purchased a condo with him. He is very profrssional and responsive
                    all the time. I had a very tight schedule with purchase (less than 3 weeks) and he made it
                    happen. Work with David, you won't regret it!</p>
                <h1 class="cas_saying_commenter">- <span id="customer_saying_commenter">Sang Jun Lee</span></h1>
            </div>
            <div class="cas_saying_right">
                <button class="cas_saying_btn" onclick="change_testimonials('next')"><span
                        class="material-icons">arrow_forward_ios</span></button>
            </div>
        </div>
    </div>

    <div class="customer_syaing_review_image_keepers">
        <!-- <img class="customer_review_w_image" src="assets/homepage/best-in-calgary.jpg" alt="">
        <img class="customer_review_w_image" src="assets/homepage/google-reviews.jpg" alt=""> -->
        <p class="customar_review_sec">
            "Reach out today for a custom quote and discover our competitive rates!"
        </p>
    </div>
</section>


<script>
const testimonials = [{
        name: "Emma Johnson",
        testimony: "Finding our dream home felt impossible until we met Gurpreet. They were incredibly patient with us as we explored different neighborhoods and options, and their understanding of our needs was remarkable. Gurpreet made the whole process feel effortless, from the initial search to closing day. We couldn't be happier in our new home!"
    },
    {
        name: "Michael Brown",
        testimony: "Gurpreet's market knowledge is unmatched. They provided us with a comprehensive analysis of the local market and helped us price our house perfectly. They were also excellent communicators, keeping us informed every step of the way and promptly answering all of our questions. Thanks to Gurpreet, we sold our house quickly and for top dollar. We highly recommend them!"
    },
    {
        name: "Olivia Davis",
        testimony: "As first-time homebuyers, we were nervous and overwhelmed by the whole process. Gurpreet was a lifesaver! They patiently guided us through everything, from getting pre-approved for a mortgage to understanding the closing process. Their expertise and kindness made us feel confident and supported every step of the way. We're so grateful for their help in finding our first home!"
    },
    {
        name: "Sophia Martinez",
        testimony: "Gurpreet made buying our first home an absolute breeze! They were always available to answer our questions, no matter how big or small. They went above and beyond to find us properties that fit our budget and lifestyle, and they were always honest and transparent about the pros and cons of each option. We can't thank them enough for making our dream of homeownership a reality!"
    },
    {
        name: "William Anderson",
        testimony: "We were so impressed with Gurpreet's professionalism and dedication throughout the entire selling process. They staged our home beautifully, marketed it effectively, and negotiated skillfully on our behalf. They made selling our home stress-free, and we were thrilled with the final sale price. We wouldn't hesitate to work with them again in the future!"
    },
    {
        name: "Ava Wilson",
        testimony: "Gurpreet is a true gem in the real estate world! They took the time to truly understand our needs and preferences, and they found us a home that checked all of our boxes and more. They were always patient, professional, and a pleasure to work with. We're so happy we chose them as our realtor and would recommend them to anyone looking to buy or sell a home!"
    },
    {
        name: "Ethan Taylor",
        testimony: "Relocating to a new city was daunting, but Gurpreet made it a seamless experience. They were incredibly knowledgeable about the local rental market and quickly found us a fantastic property that fit our needs and budget. They also helped us navigate all of the paperwork and logistics involved in moving. We're so grateful for their assistance and would highly recommend them to anyone relocating to the area!"
    },
    {
        name: "Isabella Garcia",
        testimony: "We can't say enough good things about Gurpreet. They're not just a realtor, they're a trusted advisor who genuinely cares about their clients. They were always available to answer our questions, provide guidance, and advocate for our best interests. They helped us make informed decisions throughout the entire process and negotiated the best possible deal for us. We highly recommend them to anyone looking for a top-notch realtor!"
    },
    {
        name: "Alexander Harris",
        testimony: "Gurpreet is a true professional in every sense of the word. They are incredibly knowledgeable about the real estate market, always responsive to our calls and emails, and consistently put their clients' needs first. We felt like we were in good hands throughout the entire process, and we were thrilled with the outcome. We wouldn't hesitate to recommend Gurpreet to anyone looking for a reliable and trustworthy realtor!"
    },
    {
        name: "Mia Clark",
        testimony: "We were blown away by Gurpreet's attention to detail and commitment to excellence. They went above and beyond to ensure that every aspect of our home-buying process was smooth and stress-free. From scheduling viewings to handling paperwork, they took care of everything with the utmost professionalism. We couldn't have asked for a better realtor, and we're so grateful for their help in finding our perfect home!"
    },
    {
        name: "Daniel Rodriguez",
        testimony: "If you're looking for a realtor who truly cares about their clients, look no further than Gurpreet. They are passionate about helping people find their dream homes, and their dedication and enthusiasm are contagious. They were always patient, understanding, and supportive throughout our home-buying journey. We're so glad we chose them, and we wouldn't hesitate to recommend them to anyone!"
    },
    {
        name: "Chloe Lee",
        testimony: "Gurpreet is a fantastic communicator. They kept us updated throughout the entire process, providing us with regular updates and promptly answering all of our questions. We always felt informed and empowered, and we never had to wonder what was going on. We highly recommend Gurpreet to anyone looking for a realtor who will keep them in the loop and make them feel like a priority!"
    }
];


let testimonialIterator = 0;

function change_testimonials(option) {
    // Option can be prev or next
    const len = testimonials.length;
    if (option == "prev") {
        if (testimonialIterator == 0) {
            testimonialIterator = len - 1;
        } else testimonialIterator--;
    } else {
        if ((testimonialIterator + 1) == len) {
            testimonialIterator = 0
        } else {
            testimonialIterator++;
        }
    }
    changeTestimonialHTML();
}

const customer_saying_commer = document.getElementById('customer_saying_commer');
const customer_saying_commenter = document.getElementById('customer_saying_commenter');

function changeTestimonialHTML() {
    customer_saying_commer.innerHTML = testimonials[testimonialIterator].testimony;
    customer_saying_commenter.innerHTML = testimonials[testimonialIterator].name;
}

changeTestimonialHTML();
</script>





<?php
require_once "server_files/footer.php";
?>