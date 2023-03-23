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
  <button class="modal-close is-large abc-contact-modal-close"></button>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title has-text-primary-dark is-size-3">Email to albeachchairs@gmail.com</p>
    </header>
    <section class="modal-card-body">
      <div class="notification is-danger abc-contact-form-message is-hidden">
        <button class="delete"></button>
        Please correct the following issues and try submitting again
      </div>
      <form class="abc-contact-form">
        <div class="field">
          <label class="label is-size-5">
            <span class="mr-1">Name</span><span class="has-text-danger">*</span>
          </label>
          <div class="control has-icons-left">
            <input 
              class="input abc-email-form-name" 
              type="text" 
              name="name" 
              placeholder="Your Name">
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label is-size-5">
            <span class="mr-1">Email</span><span class="has-text-danger">*</span>
          </label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" type="email" name="email" placeholder="Email Address">
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
          </div>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot is-justify-content-center">
      <button class="button is-medium is-success abc-contact-form-submit">Submit</button>
      <button class="button is-medium is-danger is-light">Reset</button>
      <button class="button is-medium is-danger abc-contact-modal-close">Close</button>
    </footer>
  </div>
</div>
<?php $contact_modal_created = true; endif; ?>