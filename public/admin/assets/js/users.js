$("#inputRole").on("change", function() {
    let val = $(this).val();
    console.log("VAL ",val);

    if ( val=="3" ) {
        //művész esetén számlázási adatok megjelenítése
        $("#billingDatas").removeClass("d-none");
        $("#billingDatas").addClass("d-block");
    } else {
        //egyéb esetben számlázási adatok elrejtése
        $("#billingDatas").addClass("d-none");
        $("#billingDatas").removeClass("d-block");
    }
});

$(".billingType").on("change", function() {
    let val = $(this).val();

    if ( val=="1" ) {
        //cégadatok elrejtése
        $("#companyRow").removeClass("d-block");
        $("#companyRow").addClass("d-none");
    } else {
        //cégadatok megjelenítése
        $("#companyRow").addClass("d-block");
        $("#companyRow").removeClass("d-none");
    }
});