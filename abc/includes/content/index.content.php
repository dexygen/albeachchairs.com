<?php require_once("./includes/globals.def.php"); ?>

<header>
  <div class="has-text-warning is-size-4 font-kalam">Headed to Orange Beach or Gulf Shores?</div>
  <img class="logo" src="./assets/images/abc-logo.png"></img>
  <div class="has-text-danger-dark is-size-3 mb-1 has-text-weight-semibold font-kalam abc-line-height-1_1">
	Alabama Beach Chairs has the equipment you need!
  </div>
  <div class="columns is-centered is-mobile">
	<div class="has-background-primary-dark has-text-warning is-size-3 font-pangolin pt-1 my-2 px-5 abc-line-height-1_2">
	  RESERVE YOUR PLACE ON THE BEACH NOW!
	</div>
  </div>
</header>
<main>
  <div class="font-pangolin">
    <div class="is-size-4 font-pangolin pt-2 abc-line-height-1_2">For pricing, and to order</div>
	<div class="is-size-4 font-kalam has-text-primary-dark has-text-weight-semibold">Click or tap a choice below</div>
	<div>
	  <a href="./delivery.php" class="button 
		abc-need-delivery-button
		has-background-info 
		has-text-white
		is-underlined">
		<div class="mx-2 abc-line-height-1_2">I NEED DELIVERY<br />To my rental home<br />(NOT listed below)</div>
	  </a>
	</div>
	<div class="mt-2 mb-1">
	  <a 
	    href="./condos.php" class="button 
		abc-staying-condo-button
		has-background-info 
		has-text-white
		is-underlined">
		<div class="mx-2 abc-line-height-1_2">I'M STAYING AT A CONDO<br />(from list below)</div>
	  </a>
	</div>
	<div class="abc-line-height-1_2 font-kalam has-text-weight-semibold mt-2">
		<div class="is-size-3 has-text-primary-dark">Condos We Serve</div>
		<div class="is-size-4 has-text-danger-dark">(Delivery NOT Required)</div>
	</div>
	<ul class="is-size-5 abc-line-height-1_2 has-text-link-dark mt-1">
	<?php
	  # sort($abcPropertyNamesAll);
	  foreach($abcPropertyNamesAll as $propertyName) {
		 echo "<li>$propertyName</li>"; 
	  }
	?>
	</ul>
	<?php	
	  if ($isPhone) :?>
	<div class="is-size-4 font-pangolin pt-1 mt-2">Click or tap below to speak with us</div>
	<div>
	  <a href="tel:2512334000" class="is-size-2 has-text-primary-dark has-text-weight-semibold is-underlined abc-line-height-1_2">
	  251-233-4000
	  </a>
	</div>
	<?php else :?>
	<div class="is-size-4 font-pangolin pt-1">Call to speak with us</div>
	<div class="is-size-2 has-text-primary-dark has-text-weight-semibold abc-line-height-1_2">251-233-4000</div>
	<?php endif; ?>
  </div>
  <div class="is-size-2 mt-3">* * *</div>
  <section>
	<header class="has-text-danger-dark is-size-2 has-text-weight-semibold font-kalam abc-line-height-1_1">
	  ABOUT US
	</header>
	<article class="columns is-mobile is-centered font-pangolin">
	  <section class="column is-10">
		<div class="is-size-4 has-text-left mt-2">
		  <div class="mb-4">
			Alabama Beach Chairs provides folding beach chairs, beach umbrellas, kayaks, paddleboards, fun beach games, and a full rental inventory,
			at properties we serve, or we deliver chairs and umbrellas to your location.
		  </div>
          <div id="abc-carousel" class="mt-2 mb-5 is-flex is-justify-content-center">
            <div class="is-block"><img src="./assets/images/slideshow/parallel_shore.jpeg"></img></div>
			<div class="is-hidden"><img src="./assets/images/slideshow/delivery-kit.jpg?h=180"></img></div>
            <div class="is-hidden"><img src="./assets/images/slideshow/condos_background.jpeg"></img></div>
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

<?php require_once("./includes/content/condos.image.modal.php"); ?>

<script src="./assets/scripts/index.content.js"></script>
<script src="./assets/scripts/condo.images.modal.content.js"></script>
