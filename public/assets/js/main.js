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

$(".search-select .dropdown-item").on("click", function() {
    let value = $(this).attr("data-value");
    let label = $(this).attr("data-label");
    $(".search_type").val(value);
    $(".search-select .dropdown-toggle").html(label);

    if ( value=="creation" ) {
        $(".search-form").attr("action",searchCreationURL);
    }
    if ( value=="artist" ) {
        $(".search-form").attr("action",searchArtistURL);
    }
});

$(".follow").on('click', function(e){
    e.preventDefault();
    $button = $(this);
    $button.find(".follow-spinner").removeClass("d-none").addClass("d-inline-block");
    let userId = $button.attr("aria-data");
    if( $button.hasClass('unfollow') ) {
        //unfollow
        let csrf   = $('meta[name="csrf-token"]').attr('content');
        let followTxt = "<div class='d-none follow-spinner'><span class='loader'><span class='loader-box'></span><span class='loader-box'></span><span class='loader-box'></span></span></div>";
        followTxt += "<i class='icon-user-plus'></i> "+$("#followTxt").val();

        if ( userId!="" ) {
            let url = $("#unFollowUrl").val();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    userId: userId,
                    _token: csrf
                },
                success: function (data,status,xhr) {
                    if ( data ) {
                        $button.find(".follow-spinner").removeClass("d-inline-block").addClass("d-none");
                        $button.html(followTxt);
                        $button.removeClass("unfollow");

                        if ( $button.hasClass("my-profile") ) {
                            $(".item-"+userId).remove();

                            $(".followCount").html("(" + $(".following-tab .member-list-item").length + ")");
                        }
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    console.error(errorMessage);
                    return false;
                }
            });
        }
    } else {
        //follow
        let csrf   = $('meta[name="csrf-token"]').attr('content');
        let unFollowTxt = "<div class='d-none follow-spinner'><span class='loader'><span class='loader-box'></span><span class='loader-box'></span><span class='loader-box'></span></span></div>";
        unFollowTxt += "<i class='icon-user-minus'></i> "+$("#unFollowTxt").val();
        if ( userId!="" ) {
            let url = $("#followUrl").val();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    userId: userId,
                    _token: csrf
                },
                success: function (data,status,xhr) {
                    if ( data ) {
                        $button.find(".follow-spinner").removeClass("d-inline-block").addClass("d-none");
                        $button.html(unFollowTxt);
                        $button.addClass("unfollow");
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    console.error(errorMessage);
                    return false;
                }
            });
        }
    }
});
