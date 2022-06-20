function get_unredeemed_cardless(){
    $.ajax({
        "type" : "GET" ,
        "url" : "unredeem-cardless-request" ,
        "datatype" : "application/json",
        success: function(response){


            if(response.responseCode == '000'){

                let unredeemed_cardless_list = response.data ;
                console.log(unredeemed_cardless_list) ;

                $.each(kyc_details, function(index){

                })

                var TITLE = kyc_details[0].TITLE;
                var GENDER = kyc_details[0].GENDER;
                var DOB = kyc_details[0].DATE_OF_BIRTH.split('~');
                var US_CITIZEN = kyc_details[0].US_PERMANENT_VISA_CARD;
                var US_RESIDENT = kyc_details[0].US_RESIDENT;

                console.log(DOB);


                $('#title_').val(TITLE)



                $('#customer_number').val(kyc_details[0].CUSTOMER_NUMBER);
                $('#firstname').val(kyc_details[0].FIRST_NAME);
                $('#surname').val(kyc_details[0].SURNAME);
                $('#Othername').val(kyc_details[0].OTHER_NAME);
                $('#telephone_number').val(kyc_details[0].MOBILE1);
                $('#email_address').val(kyc_details[0].EMAIL_ADDRESS);
                $('#date_of_birth').val(kyc_details[0].DATE_OF_BIRTH);
                if(GENDER == 'M'){
                    $("#gender_male").prop("checked", true);
                }else if (GENDER = 'F') {
                    $("#gender_female").prop("checked", true);
                }else{
                    return false ;
                }

                // DISPLAY PROOF OF ADDRESS

                $('#display_selected_id_image').val(kyc_details[0].DOC_ID_PROOFADDR);

                // DISPLAY MARITAL STATUS

                $('#number_of_children').val(kyc_details[0].NUMBER_OF_CHILDREN);
                $('#number_of_dependents').val(kyc_details[0].NUMBER_OF_DEPENDANTS);
                $('#nationality').val(kyc_details[0].NATIONALITY);


                // DISPLAY ID TYPE
                // DISPLAY ID ISSUE DTAE
                // DISPLAY ID EXPIRY DATE

                $('#mother_maiden_name').val(kyc_details[0].MOTHERS_MAIDEN_NAME);
                $('#next_of_kin_name').val(kyc_details[0].NEXT_OF_KIN);
                $('#next_of_kin_address').val(kyc_details[0].NEXT_OF_KIN_ADDRESS);
                $('#next_of_kin_telephone').val(kyc_details[0].NEXT_OF_KIN_PHONE);

                // DISPLAY COUNTRY OF RESIDENCE

                $('#years_at_residence').val(kyc_details[0].NUMBER_OF_YRS_OF_RESIDENCE);
                $('#postal_address').val(kyc_details[0].POSTAL_ADDRESS);


                // WORK ON THE TOWN INPUT FIELD

                $('#residential_address').val(kyc_details[0].RESIDENTIAL_ADDRESS);
                $('#employee_code').val(kyc_details[0].EMPLOYER_CODE);
                $('#department').val(kyc_details[0].DEPARTMENT);

                // DISPLAY EMPLOYMENT TYPE

                // DISPLAY EMPLOYMENT DATE

                $('#tax_identification_number').val(kyc_details[0].TIN);

                // DISPLAY LAST TAX UPDATED

                if(US_CITIZEN == 'Y'){
                    $("#citizen_yes").prop("checked", true);
                }else if (US_CITIZEN = 'N') {
                    $("#citizen_no").prop("checked", true);
                }else{
                    return false ;
                }

                if(US_RESIDENT == 'Y'){
                    $("#resident_yes").prop("checked", true);
                }else if (US_RESIDENT = 'N') {
                    $("#resident_no").prop("checked", true);
                }else{
                    return false ;
                }






            }
        }

    })
}
