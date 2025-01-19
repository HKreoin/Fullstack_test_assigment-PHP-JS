<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/components/head.php';
?>

<body>

  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img height="60" src="/assets/img/ams-logo.png" alt="ams logo">
        <span class="fs-4 ms-3">Тестовое задание для AMS</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link active">Главная</a></li>
        <li class="nav-item"><a href="/tasks/1" class="nav-link">Запрос №1</a></li>
        <li class="nav-item"><a href="/tasks/2" class="nav-link">Запрос №2</a></li>
        <li class="nav-item"><a href="/tasks/3" class="nav-link">Запрос №3</a></li>
      </ul>
    </header>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <p><a href="/tasks/1">"Запрос №1"</a></p>
        <p>Вывод списка автомобилей, снятых с производства на сентябрь 2018 года. </p>
        <p>В формате Марка, Модель, Дата снятия с производства.</p>
        <p><a href="/tasks/2">"Запрос №2"</a></p>
        <p>Вывод списка автомобилей и работ, которые не сняты с производства на текущий момент, где стоимость выше 1000 рублей.</p>
        <p> В формате Марка, Модель, Наименование работ, Стоимость работ.</p>
        <p><a href="/tasks/3">"Запрос №3"</a></p>
        <p> Вывод отсортированного списка автомобилей по типу кузова</p>
      </div>
    </div>
  </div>


  <?php require_once __DIR__ . '/components/footer.php'; ?>
</body>

</html>