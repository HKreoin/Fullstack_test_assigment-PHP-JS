<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/../components/head.php';
?>

<body>

  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img height="60" src="/assets/img/ams-logo.png" alt="ams logo">
        <span class="fs-4 ms-3">Тестовое задание для AMS</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="/tasks/1" class="nav-link">Запрос №1</a></li>
        <li class="nav-item"><a href="/tasks/2" class="nav-link active">Запрос №2</a></li>
        <li class="nav-item"><a href="/tasks/3" class="nav-link">Запрос №3</a></li>
      </ul>
    </header>
  </div>

  <h2 class="text-center">Cписок автомобилей и работ</h2>

  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Марка</th>
          <th scope="col">Модель</th>
          <th scope="col">Наименование ремонта</th>
          <th scope="col">Стоимость</th>
        </tr>
      </thead>
      <tbody id="car-repairs">
        <?php foreach ($entities as $item) : ?>
          <tr>
            <td><?= htmlspecialchars($item['brand_name']) ?></td>
            <td><?= htmlspecialchars($item['model']) ?></td>
            <td><?= htmlspecialchars($item['repair_type']) ?></td>
            <td><?= htmlspecialchars($item['repair_cost']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php require_once __DIR__ . '/../components/footer.php'; ?>
</body>

</html>