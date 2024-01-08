<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
$isPhone = stripos($ua, 'Android') || stripos($ua, 'iPhone');

if ($isPhone) :?>
  <div class="is-size-5 font-pangolin pt-1 mb-1">Tap a choice below</div>
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
  <div class="is-size-5 font-pangolin pt-1">Call, or click to fill out reservation form</div>
  <div class="is-size-2 has-text-primary-dark has-text-weight-semibold">251-233-4000</div>  
<?php endif; ?>

<div>
  <a class="button 
            abc-contact-button 
            is-rounded 
            abc-background-success-tint 
            abc-text-orange
            has-text-weight-semibold
            is-size-3 
            is-underlined">
    <div class="mx-2">Reservation Form</div>
  </a>
</div>