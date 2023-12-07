
function incrementValue() {
    var value = parseInt(document.getElementById('amount').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('amount').value = value;
}

function decrementValue() {
    var value = parseInt(document.getElementById('amount').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 0) {
        value--;
        document.getElementById('amount').value = value;
    }
}
