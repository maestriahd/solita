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

if (!Omeka) {
    var Omeka = {};
}

(function($) {
    // Skip to content
    Omeka.skipNav = function() {
        $("#skipnav").click(function() {
            $("#content").focus()
        });
    };

    // Show advanced options for site-wide search.
    Omeka.showAdvancedForm = function () {
        var advanced_form = $('#advanced-form');
        var show_advanced = '<a href="#" class="show-advanced button">Advanced Search</a>';
        var search_submit = $('#search-form button');

        // Set up classes and DOM elements jQuery will use.
        if (advanced_form.length > 0) {
            $('#search-container').addClass('with-advanced');
            advanced_form.addClass('closed').before(show_advanced);
        }

        $('.show-advanced').click(function(e) {
            e.preventDefault();
            advanced_form.toggleClass('open').toggleClass('closed');
        });
    };

    $(document).ready(function () {
      console.log('bang!');

        $('.omeka-media').on('error', function () {
            if (this.networkState === HTMLMediaElement.NETWORK_NO_SOURCE ||
                this.networkState === HTMLMediaElement.NETWORK_EMPTY
            ) {
                $(this).replaceWith(this.innerHTML);
            }
        });
    });
})(jQuery);


/*jslint browser: true */
/*global jQuery */
if (jQuery) {
    (function ($) {
        "use strict";
        $(document).ready(function () {
            console.log('bang!');
            // hack so that the megamenu doesn't show flash of css animation after the page loads.
            setTimeout(function () {
                $('body').removeClass('init');
            }, 500);

                Omeka.showAdvancedForm();
                Omeka.skipNav();
                //Omeka.megaMenu('#top-nav');
        });
    }(jQuery));
}
