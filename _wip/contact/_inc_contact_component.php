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
    <a class="button abc-contact-button abc-contact-form-link is-rounded is-link is-size-3 is-underlined mt-1">
        Contact Form
    </a>
<?php endif; ?>

<?php if (!isset($contact_modal_created)) :?>
<div class="modal abc-contact-modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Email to albeachchairs@gmail.com</p>
      <button class="delete abc-contact-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form class="abc-email-form">
        <label>Enter something:</label><input type="text" name="something" />
      </form>
      <div class="abc-email-success-notification is-hidden">
        Your email was successfully sent
      </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success abc-contact-modal-submit">Submit</button>
      <button class="button abc-contact-modal-close">Cancel</button>
    </footer>
  </div>
</div>
<?php $contact_modal_created = true; endif; ?>