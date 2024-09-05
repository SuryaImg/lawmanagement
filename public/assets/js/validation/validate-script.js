jQuery(function() {
    $("#profileUpdate").validate({
        rules: {
            name: {
                minlength: 3,
                required: true
            },
            email: {
                minlength: 3,
                required: true,
                email: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            },
            email: {
                required: "Email is required",
                email: "Enter valid email",
            }
        }  
    });

    // login form 
    $("#loginForm").validate({
        rules: {
            email: {
                minlength: 3,
                required: true,
                email: true
            },
            password: {
                required: true,
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            email: {
                required: "Email is required",
                email: "Enter valid email",
            },            
            password: {
                required: "Password is required",
            }
        }        
    });

    // user create form 
    $("#createUser").validate({
        rules: {
            name: {
                minlength: 3,
                required: true
            },
            email: {
                minlength: 3,
                required: true,
                email: true
            },
            password: {
                required: true,
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            "roles[]": {
                required: false,
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            },
            email: {
                required: "Email is required",
                email: "Enter valid email",
            },            
            password: {
                required: "Password is required",
            },            
            confirm_password: {
                required: "Password is required",
                equalTo: "Confirm password should be same as password field",
            },             
            "roles[]": {
                required: "Role is required",
            }
        }        
    });

    // user update form 
    $("#updateUser").validate({
        rules: {
            name: {
                minlength: 3,
                required: true
            },
            email: {
                minlength: 3,
                required: true,
                email: true
            },
            "roles[]": {
                required: false,
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            },
            email: {
                required: "Email is required",
                email: "Enter valid email",
            },
            "roles[]": {
                required: "Role is required",
            }
        }        
    });

    // role create form 
    $("#roleCreate").validate({
        rules: {
            name: {
                minlength: 3,
                required: true
            },
            "permission[]": {
                required: true                
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            },
            "permission[]": {
                required: "Select a checkbox",
            }
        }        
    });

    // role update form 
    $("#roleUpdate").validate({
        rules: {
            name: {
                minlength: 3,
                required: true
            },
            "permission[]": {
                required: true                
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            },
            "permission[]": {
                required: "Select a checkbox",
            }
        }        
    });

    

    // create_court_category create form 
    $("#create_court_category").validate({
        rules: {
            name: {
                minlength: 2,
                maxlength: 100,
                required: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            }
        }        
    });
    // create_court_category create form 
    $("#update_court_category").validate({
        rules: {
            name: {
                minlength: 2,
                maxlength: 100,
                required: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            }
        }        
    });
    
    // create_case_category create form 
    $("#create_case_category").validate({
        rules: {
            name: {
                minlength: 2,
                maxlength: 100,
                required: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            }
        }        
    });
    // update_case_category create form 
    $("#update_case_category").validate({
        rules: {
            name: {
                minlength: 2,
                maxlength: 100,
                required: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            }
        }        
    });
    
    // create_case_stage create form 
    $("#create_case_stage").validate({
        rules: {
            name: {
                minlength: 2,
                maxlength: 100,
                required: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            }
        }        
    });
    // update_case_stage create form 
    $("#update_case_stage").validate({
        rules: {
            name: {
                minlength: 2,
                maxlength: 100,
                required: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Name is required",
            }
        }        
    });
    
    // create_court create form 
    $("#create_court").validate({
        rules: {
            court_name: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            court_category_id: {
                required: true
            },
            location: {
                minlength: 2,
                maxlength: 100,
                required: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Court name is required",
            }
        }        
    });
    // update_court create form 
    $("#update_court").validate({
        rules: {
            name: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            court_category_id: {
                required: true
            },
            location: {
                minlength: 2,
                maxlength: 100,
                required: true
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Court name is required",
            }
        }        
    });
    
    // create_court create form 
    $("#create_cases").validate({
        rules: {
            p_r_name: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            p_r_advocate: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            title: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            case_category_id: {
                required: true
            },
            court_category_id: {
                required: true
            },
            court_id: {
                required: true
            },
            staff_id: {
                required: true
            },
            stage_id: {
                required: true
            },
            case_no: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            case_file_no: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            acts: {
                required: true
            },
            case_charge: {
                required: true
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Court name is required",
            }
        }        
    });
    // update_court create form 
    $("#update_cases").validate({
        rules: {
            p_r_name: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            p_r_advocate: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            title: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            case_category_id: {
                required: true
            },
            court_category_id: {
                required: true
            },
            court_id: {
                required: true
            },
            staff_id: {
                required: true
            },
            stage_id: {
                required: true
            },
            case_no: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            case_file_no: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            acts: {
                required: true
            },
            case_charge: {
                required: true
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
        messages: {
            name: {
                required: "Court name is required",
            }
        }        
    });

});