$(document).ready(function() {
  $('#destination-airport-id').change(function(event) {
    var destination = $(this).children('option:selected').val();
    var departure = $("#departure-airport-id").children('option:selected').val();
    var data = {
      'departure' : departure,
      'destination' : destination
    }
    $('#flights-table tbody').html('');
    $.post('./../../controllers/show-flights.php',data, function(response) {
      var parsed_response = JSON.parse(response);
      for (var i in parsed_response) {
        var flight_id = parsed_response[i][0];
        var company = parsed_response[i][1];
        var flight_number = parsed_response[i][2];
        var date = parsed_response[i][3];
        var time = parsed_response[i][4];
        var string = "<tr><td>"+company+"</td><td>"+flight_number+"</td><td>"+date+"</td><td>"+time+"</td></tr>";
        $('#flights-table tbody').append(string);
      }
      $('div.dashboard-inner-container.change-user-rights').css('display','flex');
    });
  });
  $('#departure-airport-id').change(function(event) {
    var departure = $(this).children('option:selected').val();
    var destination = $("#destination-airport-id").children('option:selected').val();

    var data = {
      'departure' : departure,
      'destination' : destination
    }
    $('#flights-table tbody').html('');
    $.post('./../../controllers/show-flights.php',data, function(response) {
      var parsed_response = JSON.parse(response);
      for (var i in parsed_response) {
        var flight_id = parsed_response[i][0];
        var company = parsed_response[i][1];
        var flight_number = parsed_response[i][2];
        var date = parsed_response[i][3];
        var time = parsed_response[i][4];
        var string = "<tr><td>"+company+"</td><td>"+flight_number+"</td><td>"+date+"</td><td>"+time+"</td></tr>";
        $('#flights-table tbody').append(string);
      }
      $('div.dashboard-inner-container.change-user-rights').css('display','flex');
    });
  });

});
