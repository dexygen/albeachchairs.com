<?php

  $ua = $_SERVER['HTTP_USER_AGENT'];
  $isPhone = stripos($ua, 'Android') || stripos($ua, 'iPhone');