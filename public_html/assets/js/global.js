const BASE_URL = "http://localhost:8081";

const getBrands = async () =>
  fetch(`${BASE_URL}/cars/brands`)
    .then((response) => response.json())
    .catch((error) => {
      console.error(error);
    });

const brands = await getBrands();

const getRepairs = async () =>
  fetch(`${BASE_URL}/cars/repairs`)
    .then((response) => response.json())
    .catch((error) => {
      console.error(error);
    });

const repairs = await getRepairs();

const getCars = async () =>
  fetch(`${BASE_URL}/cars`)
    .then((response) => response.json())
    .catch((error) => {
      console.error(error);
    });

const cars = await getCars();

const drawCarsTable = (cars) => {
  if (!document.getElementById("cars")) return;
  const table = document.getElementById("cars");
  cars.forEach((car) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${car.id}</td>
      <td>${brands.find((brand) => brand.id === car.brand_id).name}</td>
      <td>${car.model}</td>
      <td>${car.start_date}</td>
      <td>${car.end_date}</td>
      <td>${car.body_type}</td>
      <td>${car.image}</td>
    `;
    table.appendChild(row);
  });
};

const filterCarsByEndDate = (cars, endDate) => {
  return cars.filter(
    (car) => new Date(car.end_date) < new Date(endDate) && car.end_date !== null
  );
};
if (document.getElementById("filter-btn")) {
  document.getElementById("filter-btn").addEventListener("click", () => {
    const endDate = document.getElementById("end-date").value;
    const filteredCars = filterCarsByEndDate(cars, endDate);
    document.getElementById("cars").innerHTML = ""; // Clear existing rows
    drawCarsTable(filteredCars);
  });
}

drawCarsTable(cars);

const drawRepairsTable = (repairs) => {
  const table = document.getElementById("car-repairs");
  repairs.forEach((repair) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${
        brands.find(
          (brand) =>
            brand.id === cars.find((car) => car.id === repair.car_id).brand_id
        ).name
      }</td>
      <td>${cars.find((car) => car.id === repair.car_id).model}</td>
      <td>${cars.find((car) => car.id === repair.car_id).body_type}</td>    
      <td>${repair.repair_type}</td>
      <td>${repair.cost}</td>
      <td>${cars.find((car) => car.id === repair.car_id).end_date}</td> 
    `;
    table.appendChild(row);
  });
};

drawRepairsTable(repairs);

const filterRepairsByCostAndEndDate = (repairs, maxCost) => {
  return repairs.filter((repair) => {
    const car = cars.find((car) => car.id === repair.car_id);
    return repair.cost < maxCost && car.end_date === null;
  });
};

document.getElementById("cost-filter-btn").addEventListener("click", () => {
  const maxCost = parseFloat(document.getElementById("cost-filter").value);
  const filteredRepairs = filterRepairsByCostAndEndDate(repairs, maxCost);
  document.getElementById("car-repairs").innerHTML = ""; // Clear existing rows
  drawRepairsTable(filteredRepairs);
});
