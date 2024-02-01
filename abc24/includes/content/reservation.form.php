<div class="modal abc-reservation-modal">
  <div class="modal-background has-background-grey-light"></div>
  <button class="modal-close is-large abc-reservation-modal-close"></button>
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
      <form class="abc-contact-form font-pangolin">
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Your First Name</span>
          </label>
          <div class="control">
            <input class="input" type="text" name="name" placeholder="First Name">
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-2 abc-line-height-1_1">
            <span class="mr-1 has-text-primary-dark">Last Name<br>as on Credit Card</span>
          </label>
          <div class="control">
            <input class="input" type="text" name="lastName" placeholder="Last Name">
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
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Phone</span>
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
		  <div class="field has-text-centered">
			<label class="label is-size-4 mb-0">
			  <span class="mr-1 has-text-primary-dark">Start and End Dates</span>
			</label>
			<div id="calendar-input-div"></div>
			<div class="is-flex is-justify-content-center">
			  <div id="abc-reservation-calendar" class="pt-0"></div>
			</div>
		  </div>
		<?php endif; #if ($reservationType == ABC_RESERVATION_TYPE_DELIVERY) ?>
		
        <div class="field">
          <label class="label is-size-4 mb-1 abc-line-height-1_1">
            <span class="mr-1 has-text-primary-dark">Number of Sets <br>(1 set = 2 chairs + 1 umbrella)</span>
          </label>
		  <div class="is-size-5 abc-line-height-1_1">Tap or click for pricing</div>
		  <div class="mb-2 is-size-5 is-italic has-text-danger-dark">Minimum 2 sets for Delivery</div>
          <div class="control">
            <input class="input" type="number" name="number_sets" placeholder="Sets you need">
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Number of Extra chairs</span>
          </label>
          <div class="control">
            <input class="input" type="number" name="extra_chairs" placeholder="Extra chairs, if any">
          </div>
		</div>
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Number of Extra Umbrellas</span>
          </label>
          <div class="control">
            <input class="input" type="number" name="extra_umbrellas" placeholder="Extra umbrellas, if any">
          </div>
		</div>
          <div class="field mt-4">
            <label class="label is-size-4 mb-0">
              <span class="mr-1 has-text-primary-dark">
                Other information/questions?
              </span>
            </label>
			<textarea class="textarea"name="other"></textarea>
          </div>
      </form>
    </section>
    <footer class="modal-card-foot is-justify-content-center">
      <button class="button is-medium is-outlined is-success abc-contact-form-submit">Submit</button>
      <button class="button is-medium is-outlined is-warning is-inverted abc-contact-form-reset">Reset</button>
      <button class="button is-medium is-outlined is-danger abc-reservation-modal-close">Close</button>
    </footer>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
	const calendar = new VanillaCalendar('#abc-reservation-calendar', {
		date: {
			min: new Date().toISOString().substring(0, 10),
			max: '2024-10-27',
		},
		settings: {
			visibility: {
				weekend: false,
			},
			selection: {
			  day: 'multiple-ranged',
			},
		},
		  actions: {
			clickDay() {
			  // console.log(calendar.selectedDates);
			},
		  },
	});
	calendar.init();
});
</script>