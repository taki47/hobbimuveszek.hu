$( document ).ready(function() {
    
    $("#regStepTwoSelectArt").on('click', function() {
        $("#regStepTwoSelectVisitor").removeClass("active");
        $("#regStepTwoVisitorRow").hide("fast");

        $("#regStepTwoSelectArt").addClass("active");
        $("#regStepTwoArtRow").show("fast");
        $("#registerRoleArt").val("3");
    });

    $("#regStepTwoSelectVisitor").on('click', function() {
        $("#regStepTwoSelectArt").removeClass("active");
        $("#regStepTwoArtRow").hide("fast");
        
        $("#regStepTwoSelectVisitor").addClass("active");
        $("#regStepTwoVisitorRow").show("fast");
        $("#registerRoleVisitor").val("2");
    });

    $("#billingType_person").on("click",function() {
        $("#companyRow").hide("fast");
        $("#inputCompanyName").attr("required",false);
        $("#inputTaxNumber").attr("required",false);
    });

    $("#billingType_company").on("click",function() {
        $("#companyRow").show("fast");
        $("#inputCompanyName").attr("required",true);
        $("#inputTaxNumber").attr("required",true);
    });

    $("#show_phone_number").on("click", function() {
        $("#phone-spinner").removeClass("d-none");

        let siteKey = $("#siteKey").html();
        let csrf = $("#csrf input").val();
        grecaptcha.ready(function() {
            grecaptcha.execute(siteKey, {action: 'showPhoneNumber'}).then(async function(token) {
                if ( await getCaptchaIsOk(token, csrf) ) {
                    
                    $("#show_phone_number").removeClass("d-inline-block");
                    $("#show_phone_number").addClass("d-none");
                    $("#phone-spinner").addClass("d-none");

                    $("#phone_number").removeClass("d-none");
                    $("#phone_number").addClass("d-inline-block");
                }
            });
        });
    });

    $("#show_email_address").on("click", function() {
        $("#email-spinner").removeClass("d-none");

        let siteKey = $("#siteKey").html();
        let csrf = $("#csrf input").val();
        grecaptcha.ready(function() {
            grecaptcha.execute(siteKey, {action: 'showEmailAddress'}).then(async function(token) {
                if ( await getCaptchaIsOk(token, csrf) ) {
                    
                    $("#show_email_address").removeClass("d-inline-block");
                    $("#show_email_address").addClass("d-none");
                    $("#email-spinner").addClass("d-none");

                    $("#email_address").removeClass("d-none");
                    $("#email_address").addClass("d-inline-block");
                }
            });
        });
    });

});

async function getCaptchaIsOk(token, csrf) {
    let result = await $.ajax('/checkCaptcha', 
    {
        type: 'POST',
        data: {
            gRecaptchaResponse: token,
            _token: csrf
        },
        success: function (data,status,xhr) {
            console.log(data);
            if ( data ) {
                return true;
            } else {
                return false;
            }
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.error(errorMessage);
            return false;
        }
    });

    return result;
}