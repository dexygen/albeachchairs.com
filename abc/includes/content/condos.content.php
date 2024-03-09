<?php require_once("./includes/globals.def.php"); ?>

<header>
  <div class="has-text- is-size-3 font-kalam has-text-warning">Alabama Beach Chairs</div>
  <img class="logo" src="./assets/images/abc-logo.png"></img>
  <div class="has-text-danger-dark is-size-3 mb-1 has-text-weight-semibold font-kalam abc-line-height-1_1">
	Provides service to select condos in Orange Beach and Gulf Shores!
  </div>
</header>

<main>
    <!--
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
		<div class="pt-2 abc-line-height-1_1 pb-2 abc-condos-reservation-link font-pangolin">SERVICE at a select CONDO</div>
	  </a>
	</div>
	-->
	<?php
	if ($isPhone) :?>
	  <div class="is-size-5 font-pangolin pt-1 mb-1">Tap to call and place your reservation</div>
	  <div>
		<a href="tel:2512334000" class="button 
										abc-contact-button 
										is-rounded 
										abc-background-success-tint 
										abc-text-orange 
										is-size-3 
										is-underlined
										mb-2">
		  251-233-4000
		</a>
	  </div>
	<?php else :?>
	  <div class="is-size-5 font-pangolin pt-1 mb-1">Call us to place your reservation</div>
	  <div class="is-size-2 has-text-primary-dark has-text-weight-semibold">251-233-4000</div>  
	<?php endif; ?>

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
		    <li class="is-size-4 has-text-weight-semibold has-text-danger has-text-weight-semibold font-pangolin"><?php echo $city; ?></li>
			  <ul class="pb-3">
				  <?php foreach($propertyDetail as $detail) { ?>
					<li class="is-size-5 abc-line-height-1_2"><?php echo $detail["name"]; ?></li>
				  <?php } ?>
			  </ul>
		  <?php } ?>
		  </ul>
		</section>
		<section class="abc-condos-pricing is-hidden">
			<?php require("./includes/content/pricing/condos.pricing.php"); ?>	
		</section>
	</div>
</main>

<?php
    $reservationType = ABC_RESERVATION_TYPE_CONDOS; 
	require_once("./includes/reservations/reservation.form.php"); 
?>

<script src="./assets/scripts/shared.content.js"></script>
<script>setupInfoTabs("condos")</script>
<script src="./assets/scripts/reservation.form.js"></script>
