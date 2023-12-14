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

// 空のパラメータを送信しないようにする関数
// https://b.0218.jp/20170409220848.html
function clean_query(e) {
  e.preventDefault();
  this.removeEventListener("submit", clean_query);
  var query = serialize(this);
  location.href =
    this.action +
    "?" +
    (function () {
      var arr = [];
      [].forEach.call(query.split("&"), function (item) {
        if (item.split("=")[1]) {
          arr.push(item);
        }
      });
      return arr.join("&");
    })();
}

function serialize(form) {
  var s = [];
  if (typeof form !== "object" && form.nodeName.toUpperCase() !== "FORM") {
    return s;
  }

  var length = form.elements.length;
  for (var i = 0; i < length; i++) {
    var field = form.elements[i];
    if (
      field.name &&
      !field.disabled &&
      field.type != "file" &&
      field.type != "reset" &&
      field.type != "submit" &&
      field.type != "button"
    ) {
      if (field.type == "select-multiple") {
        var l = form.elements[i].options.length;
        for (var j = 0; j < l; j++) {
          if (field.options[j].selected) {
            s[s.length] =
              encodeURIComponent(field.name) +
              "=" +
              encodeURIComponent(field.options[j].value);
          }
        }
      } else if (
        (field.type != "checkbox" && field.type != "radio") ||
        field.checked
      ) {
        s[s.length] =
          encodeURIComponent(field.name) +
          "=" +
          encodeURIComponent(field.value);
      }
    }
  }
  return s.join("&").replace(/%20/g, "+");
}