<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
$isPhone = stripos($ua, 'Android') || stripos($ua, 'iPhone');
if (!$isPhone) :?>
    <div class="is-size-5 font-pangolin">Tap a contact method below</div>
    <!--
    <a class="button abc-contact-button is-rounded is-link is-size-2 is-underlined" href="tel:2512334000">
        251-233-4000
    </a>
    -->
    <a class="button 
              abc-contact-button
              is-rounded 
              is-link 
              is-size-3 
              is-underlined 
              mt-1">
        Contact Form
    </a>
<?php endif; ?>

<?php if (!isset($contact_modal_created)) :?>
<div class="modal abc-contact-modal">
  <div class="modal-background has-background-grey-dark"></div>
  <button class="modal-close is-large abc-modal-close"></button>
  <div class="modal-card">
    <header class="modal-card-head">
      <div class="
            modal-card-title 
            is-size-3 
            has-background-primary-dark 
            has-text-warning
            py-3">
        Send to albeachchairs@gmail.com
      </div>
    </header>
    <section class="modal-card-body">
      <div class="notification is-danger abc-contact-form-msg-container is-hidden">
        <button class="delete"></button>
        <div class="is-size-4 mb-2">
          Please correct the following issues and submit again
        </div>
        <ul class="is-size-5 abc-contact-form-message-list-items">
          <li class="abc-contact-form-error-name is-hidden">
            Name is required and must be at least 2 characters in length
          </li>
          <li class="abc-contact-form-error-email is-hidden">
            Email is required and must be properly formatted
          </li>
        </ul>
      </div>
      <form class="abc-contact-form">
        <div class="field">
          <label class="label is-size-4">
            <span class="mr-1 has-text-primary-dark">Name</span>
            <span class="has-text-danger">*</span>
          </label>
          <div class="control has-icons-left">
            <input class="input" type="text" name="name" placeholder="Your Name">
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label is-size-4">
            <span class="mr-1 has-text-primary-dark">Email</span>
            <span class="has-text-danger">*</span>
          </label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" type="email" name="email" placeholder="Your Email">
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label abc-service-type-label is-size-5">
            <span class="mr-1 has-text-primary-dark">Type of Service</span>
          </label>
          <div class="pt-1">
            <div class="is-flex is-justify-content-center">
              <div class="pt-1">
                <span class="pr-1 is-size-5">Delivery</span>
                <input type="checkbox">
              </div>
              <div class="pt-1 px-5 is-size-5">OR at</div>
              <div class="select">
                <select name="property">
                <?php
                  require_once("_inc_property_details.php");
                  array_unshift($abcPropertyNamesAll, "The condos we serve");     
                  foreach($abcPropertyNamesAll as $optValue => $optLabel) {   
                    #echo $optValue;         
                ?>
                  <option value="<?php echo trim($optValue); ?>">
                  <?php echo $optLabel; ?>
                  </option>
                <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot is-justify-content-center">
      <button class="button is-medium is-outlined is-success abc-contact-form-submit">Submit</button>
      <button class="button is-medium is-outlined is-warning is-inverted">Reset</button>
      <button class="button is-medium is-outlined is-danger abc-modal-close">Close</button>
    </footer>
  </div>-
</div>
<?php $contact_modal_created = true; endif; ?>