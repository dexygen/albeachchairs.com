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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css" 
		integrity="sha512-HqxHUkJM0SYcbvxUw5P60SzdOTy/QVwA1JJrvaXJv4q7lmbDZCmZaqz01UPOaQveoxfYRv1tHozWGPMcuTBuvQ==" 
		crossorigin="anonymous" 
		referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/abc.css" type="text/css">
  </head>
  <body id="abc-viewport" class="has-text-centered px-1"><html>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NC2LTCZ"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

	<header>
	  <div class="has-text-warning is-size-4 font-kalam">Headed to Orange Beach or Gulf Shores?</div>
	  <img class="logo" src="./assets/images/abc-logo.png"></img>
	  <div class="has-text-danger-dark is-size-3 has-text-weight-semibold font-kalam abc-equipment-needs-callout">
		Alabama Beach Chairs has the equipment you need!
	  </div>
	</header>
	
	<main>
		<div class="font-pangolin abc-header-links">
		    <div class="is-size-5 font-pangolin pt-1 mb-1">Ready? Click or Tap below</div>
			<div>
			  <a style="padding: 0.8125rem" class="button 
						is-rounded 
						abc-background-success-tint 
						has-text-success-dark
						has-text-weight-semibold
						is-size-3 
						is-underlined">
				<div class="mx-2 abc-reserve-now-callout">RESERVE YOUR PLACE<br />ON THE BEACH NOW!</div>
			  </a>
			</div>
			<div class="is-size-5 font-pangolin pt-1 mb-1">Need more info?  Click/tap a choice below</div>
			<div class="mb-2">
			  <a style="padding: 1.1875rem" class="button 
						is-rounded 
						abc-background-success-tint 
						abc-text-orange
						has-text-weight-semibold
						is-size-3 
						is-underlined">
				<div class="mx-2 abc-reserve-now-callout">CONDO SERVICE<br />At a property we serve</div>
			  </a>
			</div>
			<div>
			  <a style="padding: 2.1875rem" class="button 
						is-rounded 
						abc-background-success-tint 
						abc-text-orange
						has-text-weight-semibold
						is-size-3 
						is-underlined">
				<div class="mx-2 abc-reserve-now-callout">DELIVERY SERVICE<br />To your beach home</div>
			  </a>
			</div>
			<?php
			$ua = $_SERVER['HTTP_USER_AGENT'];
			$isPhone = stripos($ua, 'Android') || stripos($ua, 'iPhone');

			if ($isPhone) :?>
			  <div class="is-size-5 font-pangolin pt-1">Click or tap to speak with us</div>
			  <div>
				<a href="tel:2512334000" class="is-size-2 has-text-primary-dark has-text-weight-semibold is-underlined">
				  251-233-4000
				</a>
			  </div>
			<?php else :?>
			  <div class="is-size-5 font-pangolin pt-1">Call to speak with us</div>
			  <div class="is-size-2 has-text-primary-dark has-text-weight-semibold">251-233-4000</div>  
			<?php endif; ?>
        </div>
        <section class="mt-5">
		  <header class="has-text-danger-dark is-size-3 has-text-weight-semibold font-kalam abc-equipment-needs-callout">
			ABOUT US
		  </header>
          <article class="columns is-mobile is-centered font-pangolin">
            <section class="column is-10">
              <div class="is-size-4 has-text-left mt-2">
                <div class="mb-4">
                  Alabama Beach Chairs provides folding beach chairs, beach umbrellas, kayaks, paddleboards, fun beach games, and a full rental inventory,
				  at properties we serve, or we deliver chairs and umbrellas to your location.
				</div>
				<div class="mb-4">
 				  Alabama Beach Chairs' proprietor has over three decades experience 
				  in the on-site, beach rental industry, which ensures the safest, most professionally operated beach service for all guests, 
				  with customer service as priority one.                
                </div>
                <div>
                  Alabama Beach Chairs offers superior customer service to the beautiful beaches of Orange Beach and Gulf Shores.
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
	
  </body></html>