var bindButtonClick = function () {
    $('.button').click(function (e) {
        var $this = $(this);
        var $value = $this.text();
        var $currentDisplay = $('#display');

        $currentDisplay.append($value);
        if ($this.hasClass('mathButtons')) {
            
        }
    })
};

$( document ).ready(function() {
    bindButtonClick();
});
