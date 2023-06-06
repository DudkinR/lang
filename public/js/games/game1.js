function startGame(data) {
    const show_task = document.getElementById("show_task");
    // add class text-center to show_task
    show_task.classList.add('text-center');

    function generateExpression(data) {
        var num1 = getRandomNumber(data['min'], data['max']);
        var num2 = getRandomNumber(data['min'], data['max']);
        var action = data['ex'];

        var expression = num1 + ' ' + action + ' ' + num2;

        // Сохраняем правильный ответ для проверки
        var correctAnswer = eval(num1 + action + num2);

        // Создаем элементы для отображения выражения
        var expressionElement = document.createElement('H1');
        expressionElement.id = 'exElement';
        expressionElement.textContent = expression;

        var resultText = document.createElement('H1');
        resultText.id = 'resultText';
        resultText.textContent = '';
        // hide resultText
        resultText.style.display = 'none';

        var inputElement = document.createElement('input');
        inputElement.id='UserInput';
        inputElement.type = 'text';
        // add css class to inputElement
         inputElement.classList.add('input_big');


        var buttonElement = document.createElement('button');
        buttonElement.textContent = 'Проверить';
        buttonElement.id = 'btn_result';
        buttonElement.classList.add('btn', 'btn-success', 'btn-lg', 'btn-block');
        butonElement.addEventListener('click', function () {
            checkAnswer(correctAnswer);
        });

        var resultElement = document.createElement('input');
        resultElement.type = 'hidden';
        resultElement.id = 'resultUser';
        //value = correctAnswer;
        resultElement.value = correctAnswer



        // Очищаем содержимое элемента show_task перед добавлением новых элементов
        show_task.innerHTML = '';

        // Добавляем элементы в элемент show_task
        show_task.appendChild(expressionElement);
        show_task.appendChild(resultText);
        show_task.appendChild(inputElement);
        show_task.appendChild(buttonElement);
        show_task.appendChild(resultElement);
        // focus on inputElement
        inputElement.focus();

    }

    // Функция для проверки ответа
    function checkAnswer(correctAnswer) {

        var userAnswer = document.getElementById('UserInput').value;
      //  alert(userAnswer);
        var resultElement = document.getElementById('resultUser').value;
      //  alert(resultElement);
        var resultText = document.getElementById('resultText');
        var buttonElement=document.getElementById('btn_result');
        resultText.style.display = 'block';
        if (userAnswer.trim() === '') {
            resultText.textContent = 'Введите ответ.';
           
            return;
        }

        if (parseInt(userAnswer) == resultElement) {
            alert(userAnswer);
            resultText.textContent = 'Верно
            buttonElement.textContent = 'Играть еще';
            // delete previous event listener
            buttonElement.removeEventListener('click', function () {
                checkAnswer(correctAnswer);

            buttonElement.addEventListener('click', function () {
                generateExpression(data);
            });


            return;

        } else {
            resultText.textContent = 'Неверно. Правильный ответ: ' + correctAnswer;
            return;
        }

        // Генерируем новое выражение после проверки
//generateExpression(data);
    //    document.querySelector('#show_task input').value = '';
    }


    // Генерируем первое выражение при загрузке страницы
    generateExpression(data);

    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
}


