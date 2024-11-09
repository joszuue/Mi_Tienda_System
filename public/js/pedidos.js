/*function filterByDate(dateString, startDate, endDate) {
  const date = new Date(dateString);
  const start = new Date(startDate);
  const end = new Date(endDate);

  return (!startDate || date >= start) && (!endDate || date <= end);
}

function filterCards() {
  const startDate = document.getElementById('startDate').value;
  const endDate = document.getElementById('endDate').value;
  const cards = document.querySelectorAll('.col-sm-4');

  cards.forEach(card => {
    const date = card.getAttribute('data-date');

    const isDateInRange = filterByDate(date, startDate, endDate);

    if (isDateInRange) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

document.getElementById('startDate').addEventListener('change', filterCards);
document.getElementById('endDate').addEventListener('change', filterCards);

document.getElementById('resetButton').addEventListener('click', function() {
  document.getElementById('startDate').value = '';
  document.getElementById('endDate').value = '';
  filterCards(); // Aplicar el filtro después de resetear
});

function removeAccents(str) {
  return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
}

document.getElementById('filterSelect').addEventListener('change', filterTable);
document.getElementById('searchInput').addEventListener('keyup', filterTable);

function filterTable(){
  const searchValue = removeAccents(this.value.toLowerCase());
  const cards = document.querySelectorAll('.col-sm-4');
  var select = document.getElementById('filterSelect');
  cards.forEach(card => {
    const order = removeAccents(card.getAttribute('data-order').toLowerCase());
    const customer = removeAccents(card.getAttribute('data-customer').toLowerCase());
    const status = removeAccents(card.getAttribute('data-status').toLowerCase());
    const cod = removeAccents(card.getAttribute('data-cod').toLowerCase());

    if (order.includes(searchValue) || customer.includes(searchValue) || status.includes(searchValue) || cod.includes(searchValue) && status.includes(select)) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
};*/

function filterByDate(dateString, startDate, endDate) {
  const date = new Date(dateString);
  const start = new Date(startDate);
  const end = new Date(endDate);

  return (!startDate || date >= start) && (!endDate || date <= end);
}

function filterCards() {
  const startDate = document.getElementById('startDate').value;
  const endDate = document.getElementById('endDate').value;
  const selectValue = document.getElementById('filterSelect').value.toLowerCase();
  const searchValue = removeAccents(document.getElementById('searchInput').value.toLowerCase());
  const cards = document.querySelectorAll('.col-sm-4');

  cards.forEach(card => {
    const date = card.getAttribute('data-date');
    const order = removeAccents(card.getAttribute('data-order').toLowerCase());
    const customer = removeAccents(card.getAttribute('data-customer').toLowerCase());
    const status = removeAccents(card.getAttribute('data-status').toLowerCase());
    const cod = removeAccents(card.getAttribute('data-cod').toLowerCase());

    const isDateInRange = filterByDate(date, startDate, endDate);
    const isStatusMatch = !selectValue || status.includes(selectValue);
    const isSearchMatch = !searchValue || order.includes(searchValue) || customer.includes(searchValue) || cod.includes(searchValue);

    if (isDateInRange && isStatusMatch && isSearchMatch) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

document.getElementById('startDate').addEventListener('change', filterCards);
document.getElementById('endDate').addEventListener('change', filterCards);
document.getElementById('filterSelect').addEventListener('change', filterCards);
document.getElementById('searchInput').addEventListener('keyup', filterCards);

document.getElementById('resetButton').addEventListener('click', function() {
  document.getElementById('startDate').value = '';
  document.getElementById('endDate').value = '';
  document.getElementById('filterSelect').value = '';
  document.getElementById('searchInput').value = '';
  filterCards(); // Aplicar el filtro después de resetear
});

function removeAccents(str) {
  return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
}

