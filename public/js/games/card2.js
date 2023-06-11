



// Код PixiJS для создания игры
  var app = new PIXI.Application({
    width: 800,
    height: 600,
    background: background,

    });

  // Добавление созданной сцены в элемент с идентификатором "show_task"
  var gameContainer = document.getElementById('show_task');
  gameContainer.appendChild(app.view);

  // Добавьте код для создания спрайтов, анимаций и других элементов игры с использованием PixiJS

  // Запуск игры
  function startGame(data) {
    // Ваш код для создания игры с использованием переданных данных
  }

    // Запуск игры при загрузке страницы
  window.addEventListener('load', function () {
    startGame(data);
    });

