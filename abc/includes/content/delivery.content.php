<?php require_once("./includes/globals.def.php"); ?>

<header>
  <div class="has-text- is-size-3 font-kalam has-text-warning">Alabama Beach Chairs</div>
  <img class="logo" src="./assets/images/abc-logo.png"></img>
  <div class="has-text-danger-dark is-size-3 mb-1 has-text-weight-semibold font-kalam abc-line-height-1_1">
	Delivers to Orange Beach and Gulf Shores!
  </div>
</header>
<main>
	<div class="is-size-4 font-kalam has-text-primary-dark has-text-weight-semibold">Click or tap below to ORDER</div>
	<div class="mb-1">
	  <a class="button 
		is-rounded 
		abc-order-delivery-button
		abc-background-success-tint 
		abc-text-orange
		has-text-weight-semibold
		is-underlined">
		<div class="pt-2 abc-line-height-1_1 pb-2 abc-delivery-reservation-link font-pangolin">DELIVERY<br />To my rental home</div>
	  </a>
	</div>
	<div class="has-text-weight-semibold">Sorry, we do not deliver to Fort Morgan</div>
	<div class="has-text-danger-dark has-text-weight-semibold is-size-4">
	  Minimum two sets for delivery
	</div>
	<div class="is-size-5
				font-kalam 
				has-text-primary-dark 
				has-text-weight-semibold">Click or tap a choice below for more info</div>
	<div class="tabs is-toggle is-toggle-rounded is-centered is-medium is-boxed mb-1">
	  <ul class="abc-delivery-info-tabs font-pangolin">
		<li class="is-active">
		  <a>
			<span>Delivery Sets</span>
		  </a>
		</li>
		<li>
		  <a class="has-background-light">
		    <!-- TODO: Remove dashed border from around span, if that's what it is?! -->
			<span>Delivery Pricing</span>
		  </a>
		</li>
	  </ul>
	</div>
	<div class="abc-return-home-link is-underlined has-text-link mb-3">Or click or tap this link to return to home page</div>
	<div class="abc-delivery-info-sections">
		<section class="abc-delivery-sets">
			<div class="font-kalam has-text-danger-dark is-size-3 has-text-weight-semibold abc-line-height-1_2">
			  2-person Chair Sets<br>with Umbrella
			</div>
			<!-- TODO: Eliminate as many layers of nesting and still acheive effect of "list-style: disc outside" -->
			<article class="columns is-mobile is-centered">
			  <div class="column is-10 has-text-centered">
				<div class="columns is-mobile is-centered">
				  <section class="column has-text-left pb-0 is-size-5-mobile is-9-tablet is-7-desktop is-6-fullhd">
					<ul class="is-size-5 abc-delivery-list-items">
					  <li>Two folding beach chairs with footrests</li>
					  <li>One 7' beach umbrella</li>
					  <li>Umbrellas secured by one of our friendly attendants</li>
					  <li>Setup by 9 am, Pick up after 5 pm</li>
					  <li>Setup/Pickup $30 per day (to comply with city ordinances that equipment cannot be left out overnight)</li>
					  <li>No extra delivery fee for more sets</li>
					  <li>We will be responsible for and replace equipment as necessary during your stay</li>
					</ul>
				  </section>
				</div>
			  </div>
			</article>
		</section>
		<section class="abc-delivery-pricing is-hidden">
			<?php require("./includes/content/pricing/delivery.pricing.php"); ?>
		</section>
	</div>
</main>

<?php
    $reservationType = ABC_RESERVATION_TYPE_DELIVERY; 
	require_once("./includes/reservations/reservation.form.php"); 
?>

<script src="./assets/scripts/shared.content.js"></script>
<script>setupInfoTabs("delivery")</script>
<script src="./assets/scripts/reservation.form.js"></script>
