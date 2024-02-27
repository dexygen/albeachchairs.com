<?php require_once("./includes/globals.def.php"); ?>

<header>
  <div class="has-text- is-size-3 font-kalam has-text-warning">Alabama Beach Chairs</div>
  <img class="logo" src="./assets/images/abc-logo.png"></img>
  <div class="has-text-danger-dark is-size-3 mb-1 has-text-weight-semibold font-kalam abc-line-height-1_1">
	Provides service to select condos in Orange Beach and Gulf Shores!
  </div>
</header>

<main>
	<div class="is-size-4 font-kalam has-text-primary-dark has-text-weight-semibold">Click or tap below to ORDER</div>
	<div class="mb-1">
	  <a class="button 
	    is-size-4
		is-rounded 
		abc-condo-delivery-button
		abc-background-success-tint 
		abc-text-orange
		has-text-weight-semibold
		is-underlined">
		<div class="pt-2 abc-line-height-1_1 pb-2 abc-condo-reservation-link font-pangolin">SERVICE at a select CONDO</div>
	  </a>
	</div>
	<div class="abc-return-home-link is-underlined has-text-link mb-2">Or click or tap this link to return to home page</div>
	<div class="mb- is-size-5">
		Alabama Beach Chairs provides folding beach chairs, beach umbrellas, kayaks, paddleboards, fun beach games, and a full rental inventory
	</div>
	<div class="is-size-5
				font-kalam 
				has-text-primary-dark 
				has-text-weight-semibold">Click or tap a choice below for more info</div>
	<div class="tabs is-toggle is-toggle-rounded is-centered is-medium is-boxed mb-1">
	  <ul class="abc-condos-info-tabs font-pangolin">
		<li class="is-active">
		  <a>
			<span>Condos We Serve</span>
		  </a>
		</li>
		<li>
		  <a class="has-background-light">
			<span>Pricing</span>
		  </a>
		</li>
	  </ul>
	</div>
	<div class="abc-condos-info-sections">
		<section class="abc-condos-list">
		  <ul class="has-text-left">
          <?php foreach($abcPropertyDetailsByCity as $city => $propertyDetail) { ?>
		    <li class="is-size-4 has-text-weight-semibold"><?php echo $city; ?></li>
			  <ul class="pb-3">
				  <?php foreach($propertyDetail as $detail) { ?>
					<li class="is-size-5"><?php echo $detail["name"]; ?></li>
				  <?php } ?>
			  </ul>
		  <?php } ?>
		  </ul>
		</section>
		<section class="abc-condos-pricing is-hidden">
		  <div class="columns is-mobile is-centered">
			<aside class="column has-text-left is-size-5-mobile is-3-tablet">
			  <div id="abc-chair-set-pricing" class="has-text-danger has-text-weight-semibold font-pangolin">2-person Chair Sets, with Umbrella</div>
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
				<li class="mt-2 has-text-danger has-text-weight-semibold font-pangolin">
				  ONE chair, OR umbrella
				</li>
				<li>1 day: $25</li>
			  </ul>
			</aside>
			<aside class="column has-text-left is-size-5-mobile is-4-tablet">
			  <div class="has-text-danger has-text-weight-semibold font-pangolin">Kayaks and Paddleboards, may switch between the two during your time</div>
			  <ul class="has-text-weight-semibold">
				<li>1 hour: $30</li>
				<li>2 hours: $50</li>
				<li>1 day: $100</li>
			  </ul>
			  <div class="has-text-danger has-text-weight-semibold font-pangolin pt-2">Beach Games</div>
			  <ul class="has-text-weight-semibold">
				<li>1 hour: $15</li>
				<li>2 hours: $20</li>
				<li>1 day: $30</li>
			  </ul>
			</aside>
		  </div>		
		</section>
	</div>
</main>

<?php
    $reservationType = ABC_RESERVATION_TYPE_CONDO; 
	require_once("./includes/content/reservation.form.php"); 
?>

<script src="./assets/scripts/shared.content.js"></script>
<script>setupInfoTabs("condos")</script>
