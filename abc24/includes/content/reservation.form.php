<div class="modal abc-reservation-modal">
  <div class="modal-background has-background-grey-light"></div>
  <button class="modal-close is-large abc-modal-close"></button>
  <div class="modal-card">
    <div class="has-background-primary-dark 
	            p-3
				has-text-warning 
				is-size-3 
				font-kalam 
				abc-line-height-1_1">Alabama Beach Chairs<br>Delivery Reservation
	</div>
    <section class="modal-card-body">
      <form class="abc-contact-form font-pangolin">
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Your First Name</span>
          </label>
          <div class="control has-icons-left">
            <input class="input" type="text" name="name" placeholder="First Name">
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-2 abc-line-height-1_1">
            <span class="mr-1 has-text-primary-dark">Last Name<br>as on Credit Card</span>
          </label>
          <div class="control has-icons-left">
            <input class="input" type="text" name="lastName" placeholder="Last Name">
            <span class="icon is-small is-left">
              <i class="fas fa-file-signature"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Email</span>
          </label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" type="email" name="email" placeholder="Your Email">
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4 mb-0">
            <span class="mr-1 has-text-primary-dark">Phone</span>
          </label>
          <div class="control has-icons-left has-icons-right">
            <input class="input abc-contact-form-phone-input" type="text" name="phone">
            <span class="icon is-small is-left">
            <i class="fas fa-phone"></i>
            </span>
          </div>
        </div>
		<?php if ($reservationType == ABC_RESERVATION_TYPE_DELIVERY): ?>
		  <div class="field">
			<label class="label is-size-4">
			  <span class="mr-1 has-text-primary-dark">Delivery Street Address</span>
			</label>
			<div class="control has-icons-left has-icons-right abc-featured-property-label">
			  <input 
				class="input" 
				type="text" 
				class="abc-contact-form-field-delivery-addr" 
				name="deliveryAddr" 
				placeholder="Your Beach Home Address">
			  <span class="icon is-small is-left">
				<i class="fas fa-road"></i>
			  </span>
			</div>
		  </div>
		  <div>
			<label class="label is-size-4">
			  <span class="mr-1 has-text-primary-dark">Delivery City</span>
			  <span class="has-text-danger">*</span>
			</label>
			<div class="mb-3 abc-featured-property-label is-italic">
			  Sorry, we do not deliver to Fort Morgan
			</div>
			<div class="field abc-featured-property-label">
			  <div class="control">
				<label class="radio is-size-5">
				  <input 
					type="radio" 
					name="deliveryCity"
					value="Orange Beach"
					class="abc-contact-form-field-delivery-city">
				  Orange Beach
				</label>
				<label class="radio is-size-5">
				  <input 
					type="radio" 
					name="deliveryCity"
					value="Gulf Shores"
					class="abc-contact-form-field-delivery-city">
				  Gulf Shores
				</label>
			  </div>
			</div>
		  </div>
		<?php endif; ?>
      </form>
    </section>
    <footer class="modal-card-foot is-justify-content-center">
      <button class="button is-medium is-outlined is-success abc-contact-form-submit">Submit</button>
      <button class="button is-medium is-outlined is-warning is-inverted abc-contact-form-reset">Reset</button>
      <button class="button is-medium is-outlined is-danger abc-modal-close">Close</button>
    </footer>
  </div>-
</div>