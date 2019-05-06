var bindButtonClick = function () {
    $('.button').click(function (e) {
        var $this = $(this);
        var $value = $this.text();
        var $currentDisplay = $('#display');

        $currentDisplay.append($value);
        if ($this.hasClass('mathButtons')) {
            $.ajax({
                method: 'POST',
                url: 'formHandle.php',
                data: { value1: '2', value2: '3', action: 'sum' }
            })
            .done(function (response) {
                var json = JSON.parse(response);
                if (typeof json.result !== 'undefined') {
                    $currentDisplay.text(json.result);
                }
            });
        }
    })
};

$( document ).ready(function() {
    bindButtonClick();
});
