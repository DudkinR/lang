var resultMass = [];
function startGame(data) {
  var mass;
  for (var key in data) {
    if (data.hasOwnProperty(key)) {
      var value = data[key];
      if (value.name == 'mass')
        mass = JSON.parse(value.value);
    }
  }

  var gameContainer = document.getElementById('show_task');
  //foreach
  var params;
  mass.forEach(function (item, i, arr) {
    params = GenParamCard(item);
    var card = document.createElement('div');
    var cardItemHidden = document.createElement('input');
    cardItemHidden.type = 'hidden';
    cardItemHidden.id = 'cardItemHidden_' + i;
    cardItemHidden.value = item;
    card.className = 'card';
    card.id = 'card' + i;
    // add onclick event
    card.onclick = function () {
      hideCard(this.id,i);
    }
  
    card.style.width = params.width + 'px';
    card.style.height = params.height + 'px';
    card.style.fontSize = params.fontSize + 'px';
    card.style.color = params.color;
    card.style.backgroundColor = params.textcolor;
    var containerRect = gameContainer.getBoundingClientRect();

    var left = containerRect.left + params.left;
    var top = containerRect.top + params.top;
    card.style.left = left + 'px';
    card.style.top = top + 'px';
    card.innerHTML = item;
    gameContainer.appendChild(card);
    card.appendChild(cardItemHidden);
      resultMass.push(item);
  });
  // сортировка массива в обратном порядке
  resultMass.sort(function (a, b) {
    if (a > b) return -1;
    if (a < b) return 1;
  });

  //end function
}

function hideCard(card_id, i) {
  var card = document.getElementById(card_id);
  var input = document.getElementById('cardItemHidden_' + i);
 var last = resultMass.length - 1;
  if (input.value === resultMass[last]) {
    resultMass.splice(last, 1); // Удаляем элемент из массива
    card.style.display = 'none';
  } else {
    alert('Неверная последовательность');
    var gameContainer = document.getElementById('show_task');
    gameContainer.innerHTML = '';
    resultMass = [];
    startGame(data);
  }
}


// функция которая генерирует параметры карточки
// такие как ширину, высоту, размер шрифта, цвет фона расположение на экране 
function GenParamCard(text) {
  var screenWidth = window.screen.width;
  var screenHeight = window.screen.height;
  var minSize = 50;
  var maxSize = 100;
  var width = getRandomInt(minSize, maxSize);
  var height = Math.ceil(width * 1.2);
  var letters = text.length;
  var fontSize = Math.ceil(width / 10);
  if (fontSize == 0) fontSize = 1;
  if (letters * fontSize < width) fontSize = Math.ceil(width / letters);
  if (fontSize == 0) fontSize = 1;
  var color = getRandomColor();
  var textcolor = oppositeColor(color);
  var containerWidth = 800;
  var containerHeight = 800;

  var left = getRandomInt(100, screenWidth-200);
  var top = getRandomInt(100, containerHeight - screenHeight);

  if (left + screenWidth / 2 > containerWidth) {
    left = Math.ceil(screenWidth / 2);
    // Коррекция left, если карточка выходит за границы контейнера по горизонтали
  }

  if (top + height > containerHeight) {
    top = containerHeight - height; // Коррекция top, если карточка выходит за границы контейнера по вертикали
  }
  var param = {
    width: width,
    height: height,
    fontSize: fontSize,
    color: color,
    textcolor: textcolor,
    left: left,
    top: top
  };
  return param;
}



function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++)
    color += letters[Math.floor(Math.random() * 16)];
  return color;
}
function oppositeColor(color) {
  var r = parseInt(color.substr(1, 2), 16);
  var g = parseInt(color.substr(3, 2), 16);
  var b = parseInt(color.substr(5, 2), 16);
  var yiq = ((r * 299) + (g * 587) + (b * 114)) / 1000;
  return (yiq >= 128) ? 'black' : 'white';
}


