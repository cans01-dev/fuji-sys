const searchLimit = document.querySelector('.searchLimit');
const searchLimitOptions = document.querySelectorAll('.searchLimit option');

const searchOrder = document.querySelector('.searchOrder');
const searchOrderOptions = document.querySelectorAll('.searchOrder option');

const searchForm = document.forms.searchForm;
const searchFormSubmit = document.getElementById('searchFormSubmit');

const url = new URL(window.location.href);
const params = url.searchParams;

document.searchForm.addEventListener("submit", clean_query);

searchLimitOptions.forEach(element => {
  if (element.value === params.get("limit")) {
    element.selected = true;
  }
});

searchOrderOptions.forEach(element => {
  if (element.value === params.get("order")) {
    element.selected = true;
  }
});

searchLimit.addEventListener('change', function() {
    searchFormSubmit.click();
});

searchOrder.addEventListener('change', function() {
    searchFormSubmit.click();
});