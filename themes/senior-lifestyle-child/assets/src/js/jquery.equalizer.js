(function($, window) {
  'use strict';

  // CREATE PLUGIN
  $.fn.equalizeHeight = function(selector) {

    // onload and initial resize
    var tallestHeight = 0;
    var that = this;
    // reset all min-heights and heights to auto
    function resetHeight() {
      var reset = {
        "min-height": "initial",
        "height": "auto"
      }
      that.css(reset);

      if (selector) {
        $(selector).css(reset);
      }
    }

    function adjustHeight() {
      // find the tallest height out of all the elements selected
      that.each(function(i, el) {
        var elHeight = $(el).outerHeight();

        if (elHeight > tallestHeight) {
          tallestHeight = elHeight;
        }

      });

      that.css('min-height', tallestHeight);
      // Select another group of elements that require the same height if parameter is set
      if (selector) {
        $(selector).css('min-height', tallestHeight);
      }

    }

    resetHeight();
    adjustHeight();

    return this;
  }

})(jQuery, window);