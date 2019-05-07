Calculator = {
    value1: '0',
    value2: '0',
    operator: null,
    action: null,

    clearCalc: function () {
        Calculator.value1 = '0';
        Calculator.value2 = '0';
        Calculator.operator = null;
        Calculator.action = null;
    },

    bindClearButtonClick: function () {
        $('#clearButton').click(function (e) {
            Calculator.clearCalc();
            $('#display').text('');
        })
    },

    bindMathButtonClick: function () {
        $('.mathButtons').click(function (e) {
            let $this = $(this);
            let $value = $this.text();
            let $currentDisplay = $('#display');

            $currentDisplay.append($value);
            if (('=' === $value && null !== Calculator.action) || '!' === $value) {
                if ('!' === $value) {
                    Calculator.operator = $value;
                    Calculator.action = $this.data('action');
                }
                $.ajax({
                    method: 'POST',
                    url: 'formHandle.php',
                    data: {value1: Calculator.value1, value2: Calculator.value2, action: Calculator.action}
                })
                .done(function (response) {
                    let json = JSON.parse(response);
                    if (typeof json.result !== 'undefined') {
                        Calculator.clearCalc();
                        Calculator.value1 = json.result;

                        $currentDisplay.text(json.result);
                    } else if (typeof json.errors !== 'undefined') {
                        Calculator.clearCalc();
                        $('#display').text('');

                        alert(json.errors.join("\n"));
                    }
                });
            } else {
                Calculator.operator = $value;
                Calculator.action = $this.data('action');
                $currentDisplay.text(Calculator.value1 + Calculator.operator + Calculator.value2);
            }
        })
    },

    bindDigitButtonClick: function () {
        $('.digits').click(function (e) {
            let $this = $(this);
            let $value = $this.text();
            let $currentDisplay = $('#display');

            if (null === Calculator.operator) {
                Calculator.value1 = Number(Calculator.value1.toString() + $value);
                $currentDisplay.text(Calculator.value1);
            } else {
                Calculator.value2 = Number(Calculator.value2.toString() + $value);
                $currentDisplay.text(Calculator.value1 + Calculator.operator + Calculator.value2);
            }
        })
    },

};

$( document ).ready(function() {
    Calculator.bindDigitButtonClick();
    Calculator.bindMathButtonClick();
    Calculator.bindClearButtonClick();
});
