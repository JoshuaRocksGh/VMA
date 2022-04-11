$(document).ready(function() {
    var ret = []
    setTimeout(function() {
        ret = $('#hide_fx_rate').val()

        // converter_rates

        // console.log(ret)
        // return false
        console.log(JSON.parse(ret));


        // ret = $('#hide_fx_rate').val()
        var converter_rates = JSON.parse(ret)

        console.log(converter_rates);

        //return false;



        var result = 1;
        var exch_rate_from = '';
        var exch_rate_to = '';
        var rate = 0;

        var multiply;
        var divided;

        $('#exch_rate_from').change(function(e) {
            e.preventDefault();
            var exch_rate_from = $('#exch_rate_from').val();
            var exch_rate_to = $('#exch_rate_to').val();
            var get_con = exch_rate_from + '/ ' + exch_rate_to;
            var get_con_1 = exch_rate_to + '/ ' + exch_rate_from;

            console.log(get_con)
            console.log(get_con_1)

            ret = $('#hide_fx_rate').val()
            var converter_rates = JSON.parse(ret)
            console.log(converter_rates)


            if (exch_rate_from = '' || exch_rate_from == undefined || exch_rate_to == '' || exch_rate_to == undefined) {
                return false;
            }

            console.log(converter_rates + "ththhthht");

            for (let index = 0; index < converter_rates.length; index++) {
                console.log(converter_rates[index].PAIR + "iiiiiiiiiiiiii");
                console.log('final = ' + get_con);
                console.log('final = ' + converter_rates[index]);
                if (converter_rates[index].PAIR == get_con) {
                    rate = converter_rates[index].MIDRATE;
                    console.log(rate)
                    var amount = $('#amount').val();
                    result = parseFloat(amount) * parseFloat(rate);
                    console.log(amount + '*' + rate)
                    $('#result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN').format(result));
                    multiply = true;
                    divided = false;
                } else {
                    $('#result').html("<span class='text-danger'> Rate not Found </span> ");
                    $('#amount').val('');
                }


                if (converter_rates[index].PAIR == get_con_1) {
                    rate = converter_rates[index].MIDRATE;
                    console.log(rate)
                    var amount = $('#amount').val();
                    result = parseFloat(amount) / parseFloat(rate);
                    console.log(amount + '/' + rate)
                    $('#result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN').format(result));
                    divided = true;
                    multiply = false;
                } else {
                    $('#result').html("<span class='text-danger'> Rate not Found </span> ");
                    $('#amount').val('');
                }

            }






        });

        $('#exch_rate_to').change(function(e) {
            e.preventDefault();
            var exch_rate_from = $('#exch_rate_from').val();
            var exch_rate_to = $('#exch_rate_to').val();
            var get_con = exch_rate_from + '/ ' + exch_rate_to;
            var get_con_1 = exch_rate_to + '/ ' + exch_rate_from;

            console.log(get_con)
            console.log(get_con_1)

            ret = $('#hide_fx_rate').val()
            var converter_rates = JSON.parse(ret)



            if (exch_rate_from = '' || exch_rate_from == undefined || exch_rate_to == '' || exch_rate_to == undefined) {
                return false;
            }

            console.log(converter_rates)


            for (let index = 0; index < converter_rates.length; index++) {
                console.log('final = ' + get_con);
                console.log('final = ' + converter_rates[index].PAIR);

                if (converter_rates[index].PAIR == get_con) {
                    rate = converter_rates[index].MIDRATE;

                    console.log("ddddd" + rate)
                    var amount = $('#amount').val();
                    result = parseFloat(amount) * parseFloat(rate);
                    console.log(amount + '*' + rate)
                    $('#result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN').format(result));
                    multiply = true;
                    divided = false;
                    return false;
                } else {
                    $('#result').html("<span class='text-danger'> Rate not Found </span> ");
                    $('#amount').val('');
                }


                if (converter_rates[index].PAIR == get_con_1) {
                    rate = converter_rates[index].MIDRATE;
                    console.log("ooooooooooooo" + rate)
                    var amount = $('#amount').val();
                    result = parseFloat(amount) / parseFloat(rate);
                    console.log(amount + '/' + rate)
                    $('#result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN').format(result));
                    divided = true;
                    multiply = false;
                    return false;
                } else {
                    $('#result').html("<span class='text-danger'> Rate not Found </span> ");
                    $('#amount').val('');
                }

            }






        });


        $('#amount').keyup(function(e) {
            e.preventDefault();
            console.log('typing..')
            var exch_rate_from = $('#exch_rate_from').val();
            var exch_rate_to = $('#exch_rate_to').val();
            var get_con = exch_rate_from + '/ ' + exch_rate_to;
            var get_con_1 = exch_rate_to + '/ ' + exch_rate_from;
            var amount = $('#amount').val();

            if (exch_rate_from = '' || exch_rate_from == undefined || exch_rate_to == '' || exch_rate_to == undefined) {
                return false;
            }
            if (amount == '' || amount == undefined) {
                return false;
            }

            if (!multiply) {
                result = parseFloat(amount) * parseFloat(rate);
                console.log(amount + '*' + rate)
                $('#result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN').format(result));
            }

            if (!divided) {
                result = parseFloat(amount) * parseFloat(rate);
                console.log(amount + '/' + rate)
                $('#result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN').format(result));
            }


        });




    }, 3000)

});