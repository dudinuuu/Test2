$(function() {
  $("#checkoutForm input,#checkoutForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour

      // get values from FORM
      var name = $("input#name").val();
      var email = $("input#email").val();
      var phone = $("input#phone").val();
      var address = $("input#address").val();
      var city = $("input#city").val();
      var postCode = $("input#postCode").val();
      var country = $("input#country").val();
      var cardNumber = $("input#cardNumber").val();
      var expityMonth = $("input#expityMonth").val();
      var expityYear = $("input#expityYear").val();
      var cvCode = $("input#cvCode").val();

      $this = $("#checkoutButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      $.ajax({
        url: "././mail/checkoutMail.php",
        type: "POST",
        data: {
            name: name,
            phone: phone,
            email: email,
            address: address,
            city: city,
            postCode: postCode,
            country: country,
            cardNumber: cardNumber,
            expityMonth: expityMonth,
            expityYear: expityYear,
            cvCode: cvCode
          },
          cache: false,
          success: function() {
            // Success message
            $('#success').html("<div class='alert alert-success'>");
            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-success')
              .append("<strong>Your message has been sent. </strong>");
            $('#success > .alert-success')
              .append('</div>');
            //clear all fields
            $('#checkoutForm').trigger("reset");
            location.href = 'updateStock.php';
          },
          error: function() {
            // Fail message
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-danger').append('</div>');
            //clear all fields
            $('#checkoutForm').trigger("reset");
          },
          complete: function() {
            setTimeout(function() {
              $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
            }, 1000);
          }
        });
      },
    filter: function() {
      return $(this).is(":visible");
    },
  });
  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
  $('#success').html('');
});
