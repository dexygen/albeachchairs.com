<?php
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $isPhone = stripos($ua, 'Android') || stripos($ua, 'iPhone');
    if ($isPhone) {
?>
    <div class="is-size-5 font-pangolin">Tap a contact method below</div>
    <a class="button abc-contact-button is-rounded is-link is-size-2 is-underlined" href="tel:2512334000">
        251-233-4000
    </a>
<?php } else { ?>
    <div class="font-pangolin">
        <div class="is-size-2 has-text-link">251-233-4000</div>
        <div class="is-size-5">Or click below for email form</div>
    </div>
<?php } ?>
    <div class="button abc-contact-button abc-email-button is-rounded is-link is-underlined mt-1 font-pangolin">
        albeachchairs@gmail.com
    </div>