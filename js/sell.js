document.getElementById('type').addEventListener('change', checkPrices, false);
           
function checkPrices() {
    var values = document.getElementById('value');
    for(var i=0; i < values.options.length; i++) {
        values.options[i] = null;
    }
    if(document.getElementById('type').value == "paysafecard") {
        values.options[0] = new Option('5 EUR', '5');
        values.options[1] = new Option('10 EUR', '10');
        values.options[2] = new Option('25 EUR', '25');
        values.options[3] = new Option('50 EUR', '50');
        values.options[4] = new Option('100 EUR', '100');
        }
        else {
            values.options[0] = new Option('10 EUR', '10');
            values.options[1] = new Option('20 EUR', '20');
            values.options[2] = new Option('50 EUR', '50');
            values.options[3] = new Option('100 EUR', '100');
            values.options[4] = new Option('200 EUR', '200');
        }
}


