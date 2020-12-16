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
});

async function getData(mode, token, csrf, id) {
    let url = "";
    if ( mode=="phone" )
        url = "/getPhone";
    if ( mode=="email" )
        url = "/getEmail";

    let result = await $.ajax(url, 
    {
        type: 'POST',
        data: {
            id: id,
            gRecaptchaResponse: token,
            _token: csrf
        },
        success: function (data,status,xhr) {
            if ( data ) {
                return data;
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

async function getEmailAddress(token) {
    //spinner megjelenítése
    $("#email-spinner").removeClass("d-none");
    $("#email-spinner").addClass("d-inline");

    let csrf    = $("#csrf input").val();
    let id      = $("#uid").html();
    
    let response = await getData("email", token, csrf, id);
    if ( response ) {
        //spinner eltűntetése
        $("#email-spinner").removeClass("d-inline");
        $("#email-spinner").addClass("d-none");

        //e-mail cím megjelenítése
        $("#show_email_address").html(response);
    } else {
        console.log("ERROR");
    }
}

async function getPhoneNumber(token) {
    //spinner megjelenítése
    $("#phone-spinner").removeClass("d-none");
    $("#phone-spinner").addClass("d-inline");

    let csrf    = $("#csrf input").val();
    let id      = $("#uid").html();
    
    let response = await getData("phone", token, csrf, id);
    if ( response ) {
        //spinner eltűntetése
        $("#phone-spinner").removeClass("d-inline");
        $("#phone-spinner").addClass("d-none");

        //telefonszám megjelenítése
        $("#show_phone_number").html(response);
    } else {
        console.log("ERROR");
    }
}

function sendForm(token) {
    $("#gRecaptchaResponse").val(token);
    $("#form").submit();
}