var bindButtonClick = function () {
    $('.button').click(function (e) {
        var $this = $(this);
        var $value = $this.text();
        var $currentDisplay = $('#display');

        $currentDisplay.append($value);
        if ($this.hasClass('mathButtons')) {
            $.ajax({
                method: "POST",
                url: "formHandle.php",
                data: { value1: "John", value2: "Boston" }
            })
            .done(function (response) {
                console.log(response);
            });
        }
    })
};

$( document ).ready(function() {
    bindButtonClick();
});
