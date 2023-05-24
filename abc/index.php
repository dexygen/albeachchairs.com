<!doctype html>
<html lang="en">
  <head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-NC2LTCZ');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alabama Beach Chairs, providing beach equipment to Orange Beach and Gulf Shores</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Kalam&family=Pangolin&display=swap');
    </style>
    <link rel="stylesheet" href="./assets/css/bulma.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/abc.css" type="text/css">
    </script>
    <script src="https://kit.fontawesome.com/936996b1d1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body id="abc-viewport"><html>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NC2LTCZ"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="columns is-mobile">
      <main class="column mx-3 has-text-centered">
        <header>
          <div class="has-text-warning is-size-4 font-kalam">Headed to Orange Beach or Gulf Shores?</div>
          <img class="logo" src="./assets/images/abc-logo.png"></img>
          <div class="has-text-danger-dark is-size-3 has-text-weight-semibold font-kalam">
            Alabama Beach Chairs has the equipment you need!
          </div>
          <div class="is-flex is-justify-content-center mb-3">
            <div class="has-background-primary-dark has-text-warning is-size-3 font-pangolin px-2">
              CONTACT US TO RESERVE YOUR PLACE ON THE BEACH
            </div>
          </div>
          <div class="mb-3 font-pangolin abc-header-links">
            <?php
              $contact_modal_created = false; 
              require("./contact/_inc_contact_component.php"); 
            ?>
            <div class="is-block is-size-3 mt-3">
              <a href="#abc-delivery"  class="has-text-danger-dark 
                                              has-text-weight-semibold 
                                              font-kalam
                                              is-underlined">
                We deliver to YOUR location
              </a>
            </div>
            <div>
              <div class="is-size-4 has-text-primary-dark">OR if you're staying at</div>
              <div><a class="is-size-4 is-underlined has-text-primary-dark" href="#abc-properties">
                Properties we serve
              </a></div>
              <div>Click or tap underlined link above for list</div>
              <div class="is-size-4 has-text-primary-dark">
                (No delivery fees apply) 
              </div>
            </div>
          </div>
          <div id="abc-carousel" class="mt-2 mb-5">
            <!-- 
              Appending small query string to each image url to force refresh 
              especially after uploading and on mobile, if these images are altered,
              e.g. resized, the query string "h=180" should be changed, e.g. perhaps
              appending the date: "h=180-apr01-2023", or some such, or do programmatically
            -->
            <div class="is-block"><img src="./assets/images/slideshow/flag-at-beach.jpg?h=180"></img></div>
            <div class="is-hidden"><img src="./assets/images/slideshow/delivery-kit.jpg?h=180"></img></div>
            <div class="is-hidden"><img src="./assets/images/slideshow/gull-over-chairs.jpg?h=180"></img></div>
            <div class="is-hidden"><img src="./assets/images/slideshow/sunrise.jpg?h=180"></img></div>
            <div class="is-hidden"><img src="./assets/images/slideshow/beachside.jpg?h=180"></img></div>
          </div>
        </header>
        <nav class="has-background-warning mb-5 mx-3 abc-menu">
          <div class="pt-2 has-text-danger-dark is-size-4 has-text-weight-semibold font-kalam">
            Alabama Beach Chairs
          </div>
          <div class="mb-1 
                      pb-1 
                      is-size-5 
                      is-hidden-tablet 
                      is-underlined 
                      has-text-danger-dark
                      has-text-weight-bold 
                      abc-toggle-menu-mobile">
            <div>Show Menu</div>
          </div>
          <div class="columns 
                      abc-menu-links 
                      py-2 
                      is-size-4-mobile 
                      is-hidden-mobile 
                      is-size-4-desktop 
                      has-text-weight-semibold">
            <a class="column is-one-fifth py-1 has-text-primary-dark" href="#abc-delivery">Delivery Service</a>
            <a class="column is-one-fifth py-1 has-text-primary-dark" href="#abc-condo-service">Condo Service</a>
            <a class="column is-one-fifth py-1 has-text-primary-dark" href="#abc-featured-property">Featured Property</a>
            <a class="column is-one-fifth py-1 has-text-primary-dark" href="#abc-properties">Properties</a>
            <a class="column is-one-fifth py-1 has-text-primary-dark" href="#abc-about-contact">About/Contact</a>
          </div>
        </nav>
        <!-- DELIVERY -->
        <section class="pt-2 mb-6 mt-5 abc-section" id="abc-delivery">
          <div class="pt-3">
            <header class="columns is-mobile is-centered mb-2">
              <div class="column is-narrow is-size-3 has-background-danger-dark has-text-danger-light font-kalam">
              DELIVERY
              </div>
            </header>
            <article class="columns is-mobile is-centered font-pangolin">
              <div class="column is-10 has-text-centered">
                <div class="is-flex is-justify-content-center my-3">
                  <div class="has-background-primary-dark has-text-warning is-size-3 font-pangolin px-2">
                    CONTACT US FOR DELIVERY
                  </div>
                </div>
                <?php require("./contact/_inc_contact_component.php"); ?>
                <div class="has-text-primary-dark is-size-3 mt-4">Alabama Beach Chairs' Delivery Sets</div>
                <div class="has-text-primary-dark is-size-4">
                  (2-person Chair Sets with Umbrella)
                </div>
                <div class="has-text-danger-dark has-text-weight-semibold is-size-4">
                  Minimum two sets for delivery
                </div>
                <div class="mb-2">Sorry, we do not deliver to Fort Morgan</div>
                <div class="columns is-mobile is-centered">
                  <section class="column has-text-left pb-0 is-size-5-mobile is-9-tablet is-7-desktop is-6-fullhd">
                    <ul class="is-size-4 abc-delivery-list-items">
                      <li>Two folding beach chairs with footrests</li>
                      <li>One 7' beach umbrella</li>
                      <li>Umbrellas secured by one of our friendly attendants</li>
                      <li>Setup by 9 am, Pick up after 5 pm</li>
                      <li>Setup/Pickup $30 per day</li>
                      <li>No extra delivery fee for more sets</li>
                    </ul>
                    <div class="has-text-weight-bold is-size-4 mt-2 font-kalam has-text-danger-dark">
                      Setup/Pickup fees apply ONLY for Deliveries, NOT for
                      <a class="is-underlined has-text-danger-dark" href="#abc-properties">
                        properties we serve
                      </a> 
                    </div>
                  </section>
                </div>
                <div class="is-flex is-justify-content-center mb-2">
                  <div class="has-background-primary-dark has-text-warning is-size-3 font-pangolin px-2">
                    DELIVERY EQUIPMENT PRICING
                  </div>
                </div>
                <section class="is-size-4">
                  <div id="abc-chair-set-pricing" class="has-text-primary-dark">2-person Chair Sets, with Umbrella</div>
                  <ul class="has-text-weight-semibold">
                    <li>1 day: $40</li>
                    <li>2 days: $70</li>
                    <li>3 days: $90</li>
                    <li>4 days: $110</li>
                    <li>5 days: $130</li>
                    <li>6 days: $150</li>
                    <li>7 days: $170</li>
                    <li class="mt-2 has-text-primary-dark has-text-weight-normal">
                      Extra chair, OR umbrella
                    </li>
                    <li>$15 each, per day</li>
                  </ul>
                </section>
              </div>
            </article>
          </div>
        </section>
        <!-- CONDO SERVICE -->
        <section class="mb-6 mx- abc-section" id="abc-condo-service">
          <header class="columns is-mobile is-centered">
            <div class="column is-narrow is-size-3 has-background-danger-dark has-text-danger-light font-kalam">
            CONDO SERVICE
            </div>
          </header>
          <div class="is-block pt-1"><img src="./assets/images/slideshow/lined-up-kit-chairs.jpg"></img></div>
          <article class="columns is-mobile is-centered font-pangolin">
            <section class="column is-10 is-size-4">
              <header class="column is-8 is-offset-2 has-text-left-tablet">
                Alabama Beach Chairs provides folding beach chairs, beach umbrellas, kayaks, paddleboards, 
                fun beach games, and a full rental inventory
              </header>
              <div class="mb-5">
                <div class="has-text-danger-dark">Delivery fees DO NOT APPLY&nbsp;</div>
                <a class="is-underlined has-text-danger-dark href="#abc-properties">
                  at properties we serve
                </a>
                <div class="is-italic is-size-6">Click or tap underlined link above for list</div>
              </div>
              <div class="is-flex is-justify-content-center mb-2">
                <div class="has-background-primary-dark has-text-warning is-size-3 font-pangolin px-2">
                  CONDO EQUIPMENT PRICING
                </div>
              </div>
              <div class="columns is-mobile is-centered">
                <aside class="column has-text-left is-size-5-mobile is-3-tablet">
                  <div id="abc-chair-set-pricing" class="has-text-primary-dark">2-person Chair Sets, with Umbrella</div>
                  <ul class="has-text-weight-semibold">
                    <li>1 hour: $10</li>
                    <li>1 day: $40</li>
                    <li>2 days: $70</li>
                    <li>3 days: $100</li>
                    <li>4 days: $130</li>
                    <li>5 days: $160</li>
                    <li>6 days: $180</li>
                    <li>7 days: $200</li>
                    <li>After 2pm: $25 that day</li>
                    <li>After 3pm: $15 that day</li>
                    <li class="mt-2 has-text-primary-dark has-text-weight-normal">
                      ONE chair, OR umbrella
                    </li>
                    <li>1 day: $25</li>
                  </ul>
                </aside>
                <aside class="column has-text-left is-size-5-mobile is-4-tablet">
                  <div class="has-text-primary-dark">Kayaks and Paddleboards, may switch between the two during your time</div>
                  <ul class="has-text-weight-semibold">
                    <li>1 hour: $30</li>
                    <li>2 hours: $50</li>
                    <li>1 day: $100</li>
                  </ul>
                  <div class="has-text-primary-dark pt-2">Beach Games</div>
                  <ul class="has-text-weight-semibold">
                    <li>1 hour: $15</li>
                    <li>2 hours: $20</li>
                    <li>1 day: $30</li>
                  </ul>
                </aside>
              </div>
            </section>
          </article>
        </section>
        <!-- FEATURED PROPERTY -->
        <section class="pt-2 mb-6 abc-section" id="abc-featured-property">
          <div class="pt-3">
            <header class="columns is-mobile is-centered mb-2">
              <div class="column is-narrow is-size-3 has-background-danger-dark has-text-danger-light font-kalam">
              FEATURED PROPERTY
              </div>
            </header>
            <div class="has-text-primary-dark is-size-2 abc-featured-property-label font-pangolin mt-1">Phoenix VII</div>
            <div class="is-block pt-1"><img src="./assets/images/properties/phoenix-vii-small.png"></img></div>
            <article class="columns is-mobile is-centered font-pangolin mt-1">
               <section class="column is-10 is-size-4 has-text-left">
                Alabama Beach Chairs proudly serves Phoenix VII, directly on the white sandy shores 
                of Orange Beach, Alabama, offering vacation rentals with great beach views 
                from every unit.
              </section>
            </article>
          </div>
        </section>
        <!-- PROPERTIES -->
        <section class="pt-2 mb-6 abc-section" id="abc-properties">
          <div class="pt-3">
          <header class="columns is-mobile is-centered mb-2">
            <div class="column is-narrow is-size-3 has-background-danger-dark has-text-danger-light font-kalam">
            PROPERTIES WE SERVE
            </div>
          </header>
          <!-- PROPERTY IMAGE MODAL -->
          <div class="modal abc-property-img-modal">
            <div class="modal-background has-background-grey-dark"></div>
            <div class="modal-card">
              <header class="modal-card-head">
                <!-- Title value gets passed in when property link is clicked -->
                <p class="modal-card-title abc-property-img-modal-title is-size-3-tablet has-text-link"></p>
                <button class="abc-property-img-modal-close modal-close is-large" aria-label="close"></button>
              </header>
              <section class="modal-card-body columns">
                <p class="column">
                <!-- the image's src gets set on the mouseover event -->
                <img class="image abc-property-img is-inline-block" src="">
                </p>
              </section>
              <footer class="modal-card-foot abc-property-img-modal-footer columns is-flex-mobile">
                <!-- pb-6 class below doesn't seem correct but "works" -->
                <button class="button abc-property-img-modal-close pb-6 column is-narrow-mobile is-2 is-offset-5 is-link is-large">
                  CLOSE
                </button>
              </footer>
            </div>
          </div>
          <!-- END PROPERTY IMAGE MODAL -->
          <div class="is-size-5 font-pangolin">Tap or Click underlined links for image</div>
          <?php
            require_once("_inc_property_details.php");
            foreach($abcPropertyDetailsByCity as $city => $propertyDetails) {
          ?>
            <article class="columns is-mobile is-centered font-pangolin">
              <div class="mt-3 mb-4">
                <header class="columns is-mobile is-centered">
                  <div class="column is-10">
                    <div class="is-flex is-justify-content-center my-1">
                      <div class="has-background-primary-dark has-text-warning is-size-3 px-2">
                        <?php echo $city; ?>
                      </div>
                    </div>
                  </div>
                </header>
                <section class="abc-property-city-section is-size-4">
                  <ul>
                  <?php foreach($propertyDetails as $property) { ?>
                    <li data-abc-property-img-src="<?php echo $property["imgSrcPath"]; ?>">
                      <a class="is-underlined
                                abc-text-orange
                                has-text-weight-semibold">
                        <?php echo $property["name"]; ?>
                      </a>
                    </li>
                  <?php } ?>
                  </ul>
                </section>
              </div>
            </article>       
          <?php } ?>
        </section>
        <!-- ABOUT/CONTACT -->
        <section class="pt-2 abc-section abc-about-contact" id="abc-about-contact">
          <div class="pt-3">
            <header class="columns is-mobile is-centered mb-2">
              <div class="column is-narrow is-size-3 has-background-danger-dark has-text-danger-light font-kalam">
                ABOUT/CONTACT
              </div>
            </header>
          </div>
          <article class="columns is-mobile is-centered font-pangolin">
            <section class="column is-10">
              <?php require("./contact/_inc_contact_component.php"); ?>
              <div class="is-size-4 has-text-left mt-4">
                <div class="mb-4">
                  Alabama Beach Chairs' proprietor has over three decades experience in the on-site, beach rental industry, which ensures the safest,
                  most professionally operated beach service for all guests, with customer service as priority one.                
                </div>
                <div>
                  We provide superior customer service to the beautiful beaches of Orange Beach and Gulf Shores.
                  Your locally owned and operated, family business takes pride in helping to
                  create the most pleasurable and memorable vacation experience for our
                  guests by providing quality equipment for all your beach safety, comfort
                  and recreational requirements.                
                </div>
              </div>
            </section>
          </article>
        </section>
      </main>
    </div>
    <!-- LOAD SCRIPTS AFTER DOM HAS LOADED OR BEFORE MODAL FORM LOADS -->
    <script src="./abc-index.js"></script>
    <script src="./contact/abc-contact.js"></script>
  </body></html>