<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calc</title>
</head>
<body>

    <form action="">

        <input type="text" name="first-operand" placeholder="Number">
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>
        <input type="text" name="second-operand" placeholder="Number">
        <input type="submit" value="Try me!">

    </form>

    <script type="text/javascript">
        function display(text)	{
            alert(text);
            console.log(text);
            return false;
        }
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();
            var num1 = this.querySelector('input[name="first-operand"]').value;
            var operator = this.querySelector('select[name="operator"]').value;
            var num2 = this.querySelector('input[name="second-operand"]').value;
            if (parseInt(num1) != num1 || parseInt(num2) != num2)
                return display('Error :(');
            num1 = parseInt(num1);
            num2 = parseInt(num2);
            if (num1 < 0 || num2 < 0)
                return display('Error :(');
            if (['+', '-', '*', '/', '%'].indexOf(operator) === -1)
                return display('Error :(');
            if ((operator === '/' || operator === '%') && num2 === 0)
                return display('It’s over 9000!');
            switch (operator) {
                case '+':
                    display((num1 + num2).toString());
                    break;
                case '-':
                    display((num1 - num2).toString());
                    break;
                case '*':
                    display((num1 * num2).toString());
                    break;
                case '/':
                    display((num1 / num2).toString());
                    break;
                case '%':
                    display((num1 % num2).toString());
                    break;
            }
        });
        setInterval(function () {
            alert('Please, use me...');
        }, 30000)
    </script>

</body>
</html>