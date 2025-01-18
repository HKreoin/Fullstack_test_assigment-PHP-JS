<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/../components/head.php';
?>

<body>

  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img height="60" src="assets/img/ams-logo.png" alt="ams logo">
        <span class="fs-4 ms-3">Тестовое задание для AMS</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link active">Главная</a></li>
        <li class="nav-item"><a href="/task1" class="nav-link">Задание №1</a></li>
        <li class="nav-item"><a href="/task2" class="nav-link">Задание №2</a></li>
      </ul>
    </header>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <p>Ошибка 404 | Страница не найдена</p>
      </div>
    </div>
  </div>


  <?php require_once __DIR__ . '/components/footer.php'; ?>
</body>

</html>