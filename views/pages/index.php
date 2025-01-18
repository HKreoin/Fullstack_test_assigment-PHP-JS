<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Car managment</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script type="module" src="/assets/js/global.js" defer></script>
</head>

<body>
  <header class="container-fluid">
    <div class="container fluid p-3 mb-2 bg-primary text-white text-center">
      <div class="row">
        <div class="col-4">
          <h3>Fullstack test assigment</h3>
        </div>
        <nav class="col-8">
          <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link active text-white">Home page</a></li>
          </ul>
        </nav>
      </div>

  </header>

  <h2 class="text-center">All cars</h2>

  <div class="container">
    <div class="input-group mb-3 w-25 mx-auto my-3">
      <span class="input-group-text" id="basic-addon1">End date</span>
      <input type="date" class="form-control" id="end-date" aria-describedby="basic-addon1" />
      <button class="btn btn-outline-secondary" type="button" id="filter-btn">Filter</button>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Brand</th>
          <th scope="col">Model</th>
          <th scope="col">Start date</th>
          <th scope="col">End date</th>
          <th scope="col">Body type</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody id="cars">
      </tbody>
    </table>

    <h2 class="text-center">Price list for car repairs</h2>
    <div class="input-group mb-3 w-25 mx-auto my-3">
      <span class="input-group-text" id="basic-addon1">Max cost</span>
      <input type="number" class="form-control" id="cost-filter" aria-describedby="basic-addon1" />
      <button class="btn btn-outline-secondary" type="button" id="cost-filter-btn">Filter</button>
      <div class="form-check mx-2">
        <input class="form-check-input" type="checkbox" id="toggle-end-date" />
        <label class="form-check-label" for="toggle-end-date">Car currently being produced</label>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Brand</th>
          <th scope="col">Model</th>
          <th scope="col">Repair Types</th>
          <th scope="col">Cost</th>
          <th scope="col">End date</th>
        </tr>
      </thead>
      <tbody id="car-repairs">
      </tbody>
    </table>

  </div>

  <script src="assets/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>