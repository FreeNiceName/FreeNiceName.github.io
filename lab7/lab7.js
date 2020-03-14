$(document).ready(function () {
    $('#price_7').click(function () {
        $.ajax({
            url: 'price_7.php',
            type: "post",
            data: { price_min: $('#price_min').val(), price_max: $('#price_max').val() },
            success: function (data) {
                $('#html').val(data);
            },
            error: function (data) {
                console.log("Something went wrong!");
            }
        });
    });

    $('#vendor_7').click(function () {
        $.ajax({
            url: 'vendor_7.php',
            type: "post",
            data: { vendor_id: $('#vendor_id').val() },
            success: function (data) {
                let jsonVal = JSON.parse(data);
                $('#json').val(JSON.stringify(jsonVal));
            },
            error: function (data) {
                console.log("Something went wrong!");
            }
        });
    });

    $('#category_7').click(function () {
        var xhr = new XMLHttpRequest();
        let category = $('#category_id').val();
        var params = `category_id=${category}`;
        xhr.open('POST', `category_7.php`, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
       
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                $('#xml').val(xhr.response);
            }
        }
        xhr.send(params);
    });
});