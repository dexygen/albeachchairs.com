<div class="modal abc-delivery-reservation-modal">
  <div class="modal-background has-background-grey-light"></div>
  <button class="modal-close is-large abc-delivery-reservation-modal-close"></button>
  <div class="modal-card">
    <div class="has-background-primary-dark 
	            p-3
				has-text-warning 
				is-size-3 
				font-kalam 
				abc-line-height-1_1">Alabama Beach Chairs<br>Delivery Reservation
	</div>
    <section class="modal-card-body pt-1">
	  <div class="mb-1 has-text-weight-semibold">After you submit your information you will be emailed a link for completing your order</div>
	  
	  <!-- "Notifications" that begin as hidden -->
	  <div class="notification is-danger abc-delivery-submit-validation-errors p-1 mb-1 is-hidden">
		<span class="has-text-weight-semibold is-underlined is-size-5">Please correct the following</span>
		<ul><!-- Will be populated by Javascript code --></ul>
	  </div>
      <div class="notification is-danger abc-delivery-submit-server-error is-size-5 p-1 mb-1 is-hidden">
        <div class="has-text-left has-text-weight-semibold px-2">
          There was a problem submitting your information.  You can try again,
          or call us at 251-233-4000
        </div>
      </div>
	  <div class="notification is-primary abc-delivery-submit-confirmation is-size-5 p-1 mb-1 is-hidden">
	    <button class="delete abc-delivery-reservation-modal-close"></button>
		<div class="has-text-left has-text-weight-bold my-1 px-3">
			Thanks for your delivery reservation!
			Please watch for an email from
			albeachchairs@gmail.com
		</div>
		<div class="has-background-primary-dark 
					has-text-warning 
					px-3 
					mb-1 
					font-pangolin">You will be redirected to the delivery page in a few seconds</div>
	  </div>
	  
	  <!-- 
		Form validation is dependent on the structure of the form's HTML, i.e. the fields and label/spans
		It might be better to generate the HTML and some accompanying JSON from PHP
	  -->
      <form class="abc-delivery-reservation-form font-pangolin">
	    <?php if ($reservationType == ABC_RESERVATION_TYPE_DELIVERY): ?>
		  <input class="input" type="hidden" value="DELIVERY" name="reservationType">
		<?php endif; ?>
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Your First Name</span>
          </label>
          <div class="control">
            <input class="input" type="text" name="firstName" placeholder="First Name">
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-2 abc-line-height-1_1">
            <span class="mr-1 has-text-primary-dark">Last Name<br>as on Credit Card</span>
          </label>
          <div class="control">
            <input class="input" type="text" name="lastNameOnCard" placeholder="Last Name">
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Email</span>
          </label>
          <div class="control">
            <input class="input" type="email" name="email" placeholder="Your Email">
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-1 abc-line-height-1_1">
            <span class="mr-1 has-text-primary-dark">Phone</span>
			<div class="is-size-5">Required for contact if email fails</div>
          </label>
          <div class="control">
            <input class="input" type="text" name="phone" placeholder="Phone Number">
          </div>
        </div>
		
		<?php if ($reservationType == ABC_RESERVATION_TYPE_DELIVERY): ?>
		  <div class="field">
			<label class="label is-size-4 mb-0">
			  <span class="mr-1 has-text-primary-dark">Delivery Street Address</span>
			</label>
			<div class="control">
			  <input 
				class="input" 
				type="text" 
				name="deliveryAddr" 
				placeholder="Your Beach Home Address">
			</div>
		  </div>
		  <div class="field">
			<label class="label is-size-4 mb-0">
			  <span class="mr-1 has-text-primary-dark">Delivery City</span>
			</label>
			<div class="mb-1 is-italic">
			  Sorry, we do not deliver to Fort Morgan
			</div>
			<div class="field abc-featured-property-label">
			  <div class="control">
				<label class="radio is-size-5">
				  <input 
					type="radio" 
					name="deliveryCity"
					value="Orange Beach">
				  Orange Beach
				</label>
				<label class="radio is-size-5">
				  <input 
					type="radio" 
					name="deliveryCity"
					value="Gulf Shores">
				  Gulf Shores
				</label>
			  </div>
			</div>
		  </div>
		<?php endif; #if ($reservationType == ABC_RESERVATION_TYPE_DELIVERY) ?>
		
		  <div class="field has-text-centered">
			<label class="label is-size-4 mb-0">
			  <span class="mr-1 has-text-primary-dark">Start and End Dates</span>
			</label>
			<div id="calendar-input-div"></div>
			<div class="is-flex is-justify-content-center">
			  <div id="abc-reservation-calendar" class="pt-0"></div>
			</div>
			  <div class="control">
				<input class="input" type="hidden" value="0" name="reservationLength">
			  </div>
			  <div class="control">
				<input class="input" type="hidden" value="[]" name="reservationDates">
			  </div>
		  </div>
		
        <div class="field">
          <label class="label is-size-4 mb-1 abc-line-height-1_1">
            <span class="has-text-primary-dark">Number of Sets</span>
			<div class="has-text-primary-dark">(1 set = 2 chairs + 1 umbrella)</div>
          </label>
		  <div class="is-size-5 abc-line-height-1_1 is-underlined has-text-link abc-delivery-pricing-link">Tap or click for pricing</div>
		  <div class="mb-2 is-size-5 is-italic has-text-danger-dark">Minimum 2 sets for Delivery</div>
          <div class="control">
            <input class="input" type="number" name="numberOfSets" placeholder="Sets you need">
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Number of Extra chairs</span>
          </label>
          <div class="control">
            <input class="input" type="number" name="extraChairs" placeholder="Extra chairs, if any">
          </div>
		</div>
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Number of Extra Umbrellas</span>
          </label>
          <div class="control">
            <input class="input" type="number" name="extraUmbrellas" placeholder="Extra umbrellas, if any">
          </div>
		</div>
          <div class="field mt-4">
            <label class="label is-size-4 mb-0">
              <span class="mr-1 has-text-primary-dark">
                Other information/questions?
              </span>
            </label>
			<textarea class="textarea "name="extraInformation"></textarea>
          </div>
      </form>
    </section>
    <footer class="modal-card-foot is-justify-content-center">
      <button class="button is-medium is-outlined is-success abc-delivery-reservation-form-submit">Submit</button>
      <button class="button is-medium is-outlined is-warning is-inverted abc-delivery-reservation-form-reset">Reset</button>
      <button class="button is-medium is-outlined is-danger abc-delivery-reservation-modal-close">Close</button>
    </footer>
  </div>
</div>

<!-- DELIVERY PRICING MODAL -->
<div class="modal abc-delivery-pricing-modal">
	<div class="modal-background has-background-info"></div>
	<button class="modal-close is-large abc-delivery-pricing-modal-close"></button>
	<div class="modal-card">
	  <section class="modal-card-body">
		<?php require("./includes/content/pricing/delivery.pricing.php"); ?>
		<div class="is-size-4 has-text-danger-dark font-pangolin mt-2">** Setup/Pickup: $30 per day</div>
	  </section>
	  <footer class="modal-card-foot abc-property-img-modal-footer columns is-flex-mobile">
		<button class="button abc-delivery-pricing-modal-close column is-narrow-mobile is-2 is-offset-5 is-link is-large">
		  CLOSE
		</button>
	  </footer>
	</div>
</div>