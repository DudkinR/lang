
function startGame(data) {
  var ex, min, max, count;

  for (var key in data) {
    if (data.hasOwnProperty(key)) {
      var value = data[key];
      if (value.name == 'ex')
        ex = value.value;
      else if (value.name == 'min')
        min = parseInt(value.value);
      else if (value.name == 'max')
        max = parseInt(value.value);
      else if (value.name == 'count')
        count = parseInt(value.value);
    }
  }

  var gameContainer = document.getElementById('show_task');
  gameContainer.innerHTML = '';

  // Генерация случайных целых чисел
  var num1 = getRandomInt(min, max);
  var num2 = getRandomInt(min, max);

  // Создание элементов игры
  var taskElement = document.createElement('h1');
  taskElement.textContent = 'Выполните действие: ' + num1 + ' ' + ex + ' ' + num2;

  var countInput = document.getElementById('count');

  var inputElement = document.createElement('input');
  inputElement.type = 'text';
  inputElement.id = 'answer';

  var resultElement = document.createElement('p');
  resultElement.id = 'result';

  var checkButton = document.createElement('button');
  checkButton.textContent = 'Проверить';
  checkButton.id = 'check-button';

  var nextButton = document.createElement('button');
  nextButton.textContent = 'Следующее задание';
  nextButton.style.display = 'none';
  nextButton.id = 'next-button';
  var rcount = parseInt(countInput.value);
  // Обработчик события для кнопки "Проверить"
  var checkAnswer = function () {
    var answer = parseInt(inputElement.value);

    if (answer === eval(num1 + ex + num2)) {
      resultElement.textContent = 'Ответ верный!';
      nextButton.style.display = 'block';
      checkButton.style.display = 'none';
      rcount++;
    } else {
      resultElement.textContent = 'Ответ неверный!';
      inputElement.value = '';
      if (rcount > 0)
        rcount--;
    }
    countInput.value = rcount;
  };

  // Обработчик события для кнопки "Следующее задание"
  var nextTask = function () {
    inputElement.value = '';
    resultElement.textContent = '';
    nextButton.style.display = 'none';
    checkButton.style.display = 'block';

    if (rcount >= count)
      gameContainer.innerHTML = '<h1>Вы прошли тест!</h1>';
    else
      startGame(data);
  };

  // Назначение обработчиков событий
  checkButton.addEventListener('click', checkAnswer);
  nextButton.addEventListener('click', nextTask);

  // Добавление элементов в контейнер игры
  gameContainer.appendChild(taskElement);
  gameContainer.appendChild(inputElement);
  gameContainer.appendChild(resultElement);
  gameContainer.appendChild(checkButton);
  gameContainer.appendChild(nextButton);
  resultElement.focus();

}

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}




