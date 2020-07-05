<?php

  function timeFormat($date){
    return date_format($date, env('DATE_FORMAT'));
  }
