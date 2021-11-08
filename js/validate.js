  
$(function() {

  $.validator.setDefaults({
    errorClass: 'text-danger',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
    errorPlacement: function (error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    }
  });



$("#eregisterform").validate({



    rules: {
        address: {
        required: true,
        minlength:3
      },
      dob: {
        required: true, 
      },
      phone: {
          required: true,
          minlength:10,
          maxlength:10,
          digits:true,
      },
      experience: {
          required: true,
          digits:true,
      },
      upload: {
        accept: "application/pdf",
      },
    },



    messages: {
      experience: {
        required: 'Please Enter The Working Experience',
      },
      // subcat_name: {
      //   required: 'Please Enter SubCategory Name',
      // },
    }
  });


$("#paymentform").validate({
    rules: {
      cardname: {
        required: true,
        minlength:3,
      },
      expyear: {
        required: true,
      },
      expmonth: {
        required: true,
      },
      cvv: {
        required: true,
        minlength:3,
        digits:true,
      },
    },
    messages: {
      cardname: {
        required: 'Please Enter Card Holder Name',
      },
       expyear: {
        required: 'Please Enter Expiry Year',
      },
       expmonth: {
        required: 'Please Enter Expiry Monnth',
      },
       cvv: {
        required: 'Please Enter The CCV Number',
      },
    }
  });




$("#registrationform").validate({
    rules: {
      fname: {
        required: true,
        minlength:3,
      },
      lname: {
        required: true,
        minlength:3,
      },
      email: {
        required: true,
        minlength:3,
        emailvalidate:true,
      },
      phone: {
        required: true,
        minlength:10,
        digits:true,


      },
      address: {
        required: true,
        minlength:3,
      },
      password: {
        required: true,
        minlength:8,
        passwordvalidate:true,
      },
      cpassword: {
        required: true,
        equalTo: "#password"
      },
    },
    messages: {
      fname: {
        required: 'Please Enter First Name',
      },
       lname: {
        required: 'Please Enter Last Name',
      },
       email: {
        required: 'Please Enter Email Address',
      },
       phone: {
        required: 'Please Enter the Phone Number',
      },
      address: {
        required: 'Please Enter Communication Address',
      },
       password: {
        required: 'Please Enter Password',
      },
      cpassword: {
        required: 'Verify Your Password',
      },
    }
  });


jQuery.validator.addMethod("emailvalidate", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$/.test( value );
}, 'Please Enter Valid Email Address.');


jQuery.validator.addMethod("passwordvalidate", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/.test( value );
}, 'Password is too weak or common to use.');





  });