/*
Copyright © 2013 Adobe Systems Incorporated.

Licensed under the Apache License, Version 2.0 (the “License”);
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an “AS IS” BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/

/*jslint browser: true */
/*global jQuery */
if (jQuery) {
    (function ($) {
        "use strict";
        $(document).ready(function () {
          var transparent = $(".navbar").data("transparent");
          var theme = $('.navbar').data("theme");
          var body_id = $('body').attr('id');
          //console.log(transparent);

            // hack so that the megamenu doesn't show flash of css animation after the page loads.
          setTimeout(function () {
              $('body').removeClass('init');
          }, 500);
          if(transparent !== undefined && body_id === 'home'){

            $(window).on("scroll", function() {
                //if($(window).scrollTop() && transparent !== undefined ) {
                if($(window).scrollTop() ) {
                  console.log('no top');
                  $('.navbar').removeClass('bg-transparent');
                  $('.navbar').removeClass('navbar-dark');

                  $('.navbar').addClass('bg-light navbar-light');

                }
                else {
                  console.log('top');
                  $('.navbar').removeClass('bg-light');
                  $('.navbar').removeClass('navbar-light');
                  $('.navbar').addClass('bg-transparent');
                  if(theme === "dark"){
                    $('.navbar').addClass('navbar-dark');
                  }else if(theme === "light"){
                    $('.navbar').addClass('navbar-light');
                  }
                }
            });
          }


        });

    }(jQuery));
}
