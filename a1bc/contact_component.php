<?php
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $isPhone = stripos($ua, 'Android') || stripos($ua, 'iPhone');
    if ($isPhone) {
?>
    <div class="is-size-4">Tap a contact method below</div>
    <div><a class="is-size-2 is-underlined" href="tel:2512334000">Call: 251-233-4000</a></div>
<?php } else { ?>
    <div class="is-size-2 has-text-link">Call: 251-233-4000</div>
    <div class="is-size-4">Or click below</div>
<?php } ?>
<a id="email_modal_link" class="is-size-3 is-underlined" href="#">Email/form (albeachchairs@gmail.com)</a>