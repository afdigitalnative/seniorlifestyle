/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$( document ).ready(function() {
    $('#budget-calculator input').on('keyup change',function(){
        calculateTotals();
  });
  $('#select-property-states').on('keyup change',function(){
      if($(this).val()!==''){
        $('#select-property').hide();
        $('#select-property-cities').hide();
          ajaxCommunityByState($(this).val());
      }
  });
  
});

function calculateTotals(){
    var current_home = $('.bc-present-home');
    var total = 0;
    for(var i=0;i<current_home.length;i++){
        total+=current_home[i].value*1;
    }
    $('#monthly-present').html('$' + numberWithCommas(total));
    var total2 = $('#slc-cost').val();
    $('#monthly-sls').html('$' + numberWithCommas(total2));
}
    
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function ajaxCommunityByState(state){
    $.ajax(
        {
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'property_by_state',
                state: state
            },
            type: "POST",
            success: function (response) {
                updateCitySelect(state);
            }
        }
    );
}

function updateCitySelect(state) {
    $.ajax(
        {
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'get_cities_by_state',
                state: state
            },
            type: "POST",
            dataType: "json",
            success: function (response) {
                var content = '<option value="">Select City/Metro</option>';
                for (var i=0; i < response.length; i++) {
                    content += '<option value="' + response[i].city + '">' + response[i].city + '</option>'
                }
                $('#select-property-cities').show();
                $('#select-property-cities').html(content);
                $('#select-property-cities').on('keyup change',function(){
                    $('#select-property').hide();
                    updatePropertySelect($(this).val());
                });
            }
        }
    );
}

function updatePropertySelect(city){
    $.ajax(
        {
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'property_by_city',
                city: city
            },
            type: "POST",
            dataType: "json",
            success: function (response) {
                var content = '<option value="">Select Location</option>';
                for (var i=0; i < response.length; i++) {
                    content += '<option value="' + response[i].general_information_community_rate + '">' + response[i].post_title + '</option>'
                }
                $('#select-property').show();
                $('#select-property').html(content);
                $('#select-property').on('keyup change',function(){
                    if($(this).val()!==''){
                        //update price
                        $('#slc-cost').val($(this).val()).trigger('change');
                     }
                });
            }
        }
    );
}