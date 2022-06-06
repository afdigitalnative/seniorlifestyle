(function ($) {
  function createModal(placementId, formContent) {
    var html =
      '<div id="modalWindow" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">';
    html += '<div class="modal-dialog modal-lg">';
    html += '<div class="modal-content">';
    html += '<div class="modal-header">';
    html +=
      '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    html += "</div>"; //modal header
    html += '<div class="modal-body">';
    html += formContent;
    html += "</div>"; // modal body
    html += "</div>"; // modal content
    html += "</div>"; // modal dialog
    html += "</div>"; // modalWindow
    $("#" + placementId).html(html);
  }

  $(".youtube-modal").click(function (event) {
    event.preventDefault();
    var video_id = $(this).attr("href").split("v=")[1];
    var ampersandPosition = video_id.indexOf("&");
    if (ampersandPosition != -1) {
      video_id = video_id.substring(0, ampersandPosition);
    }
    var formContent = '<div class="embed-responsive embed-responsive-16by9">';
    formContent +=
      '<iframe class="responsive-item" width="100%" height="431" src="https://www.youtube.com/embed/' + video_id + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    formContent += "</div>";
    createModal("dynamic-content", formContent);
    $("#modalWindow").modal("show");
    $("#modalWindow").on('hidden.bs.modal', function (e) {
      $("#modalWindow iframe").attr("src", $("#modalWindow iframe").attr("src"));
    });
  });

  // Fix Washington DC search result going to Seattle
  $('#filter-places').on('blur', function(e) {
    var place = $(this);
    var match = 'Washington D.C.';
    var delay = 250; // ms
    setTimeout(function() {
        console.log(place.val());
        if (place.val().indexOf(match) >= 0) {
            place.val(match);
            geocode(place.val());
        }
    }, delay);
  });
  
  $('#form-loc-quiz').submit(function(e) {
	 e.preventDefault();
	 var url = $(this).attr('action');
	 
	 if($(this).find('#place').val() != '') {
		url +=  '/?place=' + $(this).find('#place').val();

		if($(this).find('#select-lifestyle').val() != '') {
			url += '&select-lifestyle=' + $(this).find('#select-lifestyle').val();
		}
	 } else if($(this).find('#select-lifestyle').val() != '') {
		url +=  '/?select-lifestyle=' + $(this).find('#select-lifestyle').val(); 
	 }
	 
	 location.href = url;
  });

    $('.collapse').on('show.bs.collapse', function () {
        $(this).parent('.card').find('.card-header').addClass('opened');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
		$(this).parent('.card').find('.card-header').removeClass('opened');
    });

})(jQuery);