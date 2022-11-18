 document.addEventListener('DOMContentLoaded', function () {

    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });



 // admin login validation form
  $('#loginForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
      required: "Please enter a email address",
      email: "Please enter a valid email address"
    },

    password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },

      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  // check password validation form
  $('#changePassword').validate({
    rules: {

      current_password: {
        required: true,
        minlength: 5
      },
      new_password: {
        required: true,
        minlength: 5
      },
      confirm_password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
    current_password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },

     new_password: {
      required: "Please provide a new password",
      minlength: "Your password must be at least 5 characters long"
    },

     confirm_password: {
      required: "Please provide a confirm password",
      minlength: "Your password must be at least 5 characters long"
    },


      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });



  // user validation form
  $('#createUser').validate({
    rules: {

      name: {
        required: true,
      },
      mobile: {
        required: true,
        minlength: 10
      },
      role_id: {
        required: true,
      },
      email: {
        required: true,
        email:true,

      },
      password: {
        required: true,
        minlength: 5
      },
      designation: {
        required: true,
      },

      join_date: {
        required: true,
      },
      terms: {
        required: true
      },
    },
    messages: {
    name: {
      required: "Please provide a Full Name"
    },

     mobile: {
      required: "Please provide a Contact Number",
      minlength: "Your Number must be at least 10 characters long"
    },

     role_id: {
      required: "Please Select a User Role"
    },

     mobile: {
      required: "Please provide a Contact Number",
      minlength: "Your Number must be at least 10 characters long"
    },

      email: {
      required: "Please enter a email address",
      email: "Please enter a valid email address"
    },
     password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },
     designation: {
      required: "Please enter a designation"
    },

     join_date: {
      required: "Please enter a join date"
    },

    terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });


   // admin login validation form
  $('#createRole').validate({
    rules: {
      name: {
        required: true,
      },
      terms: {
        required: true
      },
    },
    messages: {
      name: {
      required: "Please enter a data"
    },


      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });


  // newsvalidation form
  $('#createNews').validate({
    rules: {
      title: {
        required: true,

      },

       description: {
        required: true,
        minlength: 100
      },

       tags: {
        required: true,
      },

      feature_image: {
        required: true,
      },
      category_id: {
        required: true,
      },

      terms: {
        required: true
      },
    },
    messages: {
      title: {
      required: "Please enter a News Title",
    },

     description: {
      required: "Please provide a description",
      minlength: "Your text must be at least 100 characters long"
    },

     tags: {
      required: "Please provide a tags for news",
    },

     feature_image: {
      required: "Please Upload Feature Image",
    },
     category_id: {
      required: "Please Choose  a category Option",
    },

      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });



  // blogsvalidation form
  $('#createBlogs').validate({
    rules: {
      title: {
        required: true,
      },

      tags: {
        required: true,
      },
       description: {
        required: true,
      },
       bcategory_id: {
        required: true,
      },
      
      terms: {
        required: true
      },
    },
    messages: {
      title: {
      required: "Please enter a Title"
      },
      tags: {
      required: "Please enter a tags"
      },
      description: {
      required: "Please type a blogs description"
      },
      bcategory_id: {
      required: "Please select a blogs category"
      },
    


      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  

  // blogsvalidation form
  $('#createPages').validate({
    rules: {
      title: {
        required: true,
      },

      tags: {
        required: true,
      },
       description: {
        required: true,
      },
       short_description: {
        required: true,
      },
      
      terms: {
        required: true
      },
    },
    messages: {
      title: {
      required: "Please enter a Title"
      },
      tags: {
      required: "Please enter a tags"
      },
      description: {
      required: "Please type a blogs description"
      },
      short_description: {
      required: "Please enter short description"
      },
    


      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

 });
