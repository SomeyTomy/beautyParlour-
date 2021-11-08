  
$(function() {

  $.validator.setDefaults({
    errorClass: 'help-block text-danger',
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



$("#categoryform").validate({
    rules: {
      cat_name: {
        required: true,
        minlength:3,
      },
    },
    messages: {
      cat_name: {
        required: 'Please Enter Category Name',
      },
    }
  });



$("#offerform").validate({
    rules: {
      ofr_name: {
        required: true,
        minlength:3,
      },
    },
    messages: {
      ofr_name: {
        required: 'Please Enter Category Name',
      },
    }
  });





$("#subcategryform").validate({
    rules: {
      cat_id: {
        required: true,
      },
      subcat_name: {
        required: true,
        minlength:3,
      },
      subcat_price: {
        required: true,
        digits: true,
      },
      subcat_time: {
        required: true,
        digits: true,
        maxlength:3,
      },
      subcat_image: {
        required: true,
        accept: "image/*",
      },
    },



    messages: {
      cat_id: {
        required: 'Please Enter Category Name',
      },
      subcat_name: {
        required: 'Please Enter SubCategory Name',
      },
    }
  });



$("#eregisterform").validate({




    rules: {
      emp_name: {
        required: true,
        minlength:3
      },
      emp_lname: {
        required: true,
        
      },
      emp_address: {
        required: true,
        minlength:3
      },
      pincode: {
        required: true,
        minlength:6,
        digits:true,
        
      },
      emp_dob: {
        required: true,
        
      },
      emp_phn: {
          required: true,
          minlength:10,
          maxlength:10,
          digits:true,
      },
      emp_email: {
          required: true,
      },
      emp_wrkexp: {
          required: true,
          digits:true,
      },
       emp_image: {
          required: true,
          accept: "image/*",
         
      },
      emp_certificates: {
          required: true,
          accept: "application/pdf",
      },  
    },


    



    messages: {
      emp_name: {
        required: 'Invalid Name',
      },
      // subcat_name: {
      //   required: 'Please Enter SubCategory Name',
      // },
    }
  });




  });