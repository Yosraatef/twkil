<?php
if(!function_exists('lang')){
  function lang(){
    if(session()->has('lang')){
      return session('lang');
        }else{
      return 'en';
    }
  }
}
if(!function_exists('direction')){
  function direction(){
    if(session()->has('lang')){
          if(session('lang') == 'ar'){
            return 'rtl';
          }else{
              return 'ltr';
          }
        }else{
      return 'ltr';
    }
  }
}
