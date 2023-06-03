<!DOCTYPE html>
<html>
<head>
    <title>Ваш заголовок страницы</title>
    <!-- Подключите ваши стили CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Дополнительные теги <head> могут быть добавлены сюда -->
</head>
<body>
    <!-- Меню -->
  @include('components.topmenu')

    <!-- Левый сайдбар -->
    <aside class="sidebar-left">
        <!-- Ваш левый сайдбар здесь -->
    </aside>

    <!-- Контент страницы -->
    <main>
        <!-- Основной контент страницы -->
        @yield('content')
    </main>

    <!-- Правый сайдбар -->
    <aside class="sidebar-right">
        <!-- Ваш правый сайдбар здесь -->
    </aside>

    <!-- Футер -->
    <footer>
        <!-- Ваш футер здесь -->
    </footer>

    <!-- Подключите ваши скрипты JavaScript -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap/jquery-3.6.0.min.js') }}"></script>
 <script src="{{ asset('/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Дополнительные скрипты могут быть добавлены сюда -->
</body>
</html>
