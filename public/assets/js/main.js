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