const confirmBtn = document.getElementById('confirm-btn');
const backBtn = document.getElementById('back-btn');
const submitBtn = document.getElementById('submit-btn');
const fields = document.querySelectorAll('.field-body input, .field-body select, .field-body textarea');
const statusIcons = document.querySelectorAll('.status-icon');

const confirm = document.querySelector('.contactform-footer .confirm');
const submit = document.querySelector('.contactform-footer .submit');
const back = document.querySelector('.contactform-footer .back');

const contactformForm = document.querySelector('.contactform-form');
const contactformThanks = document.querySelector('.contactform-thanks')

const circularG = document.getElementById('circularG');

submit.style.display = 'none';
back.style.display = 'none';
contactformThanks.style.display = 'none';

// 「確認画面へ」ボタン
confirmBtn.addEventListener('click', function() {
  window.scroll({top: 0, behavior: 'smooth'});
  fields.forEach(element => {
    element.disabled = true;
  });
  statusIcons[0].classList.remove('active');
  confirm.style.display = 'none';
  statusIcons[1].classList.add('active');
  submit.style.display = 'block';
  back.style.display = 'block';
});

// 「入力画面に戻る」ボタン
backBtn.addEventListener('click', function() {
  window.scroll({top: 0, behavior: 'smooth'});
  fields.forEach(element => {
    element.disabled = false;
  });
  statusIcons[1].classList.remove('active');
  submit.style.display = 'none';
  back.style.display = 'none';

  statusIcons[0].classList.add('active');
  confirm.style.display = 'block';
});

// 「送信する」ボタン
submitBtn.addEventListener('click', function() {
  circularG.style.display = 'block';
  let data = {};
  fields.forEach(element => {
    let name = element.name;
    data[name] = element.value;
  });
  console.log(data);
  fetch('/api/contact', {
    method: 'POST',
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify(data)
  })
  .then(response => response.text())
  .then(res => {
    if (res) {
      console.log(res);
      circularG.style.display = 'none';
      window.scroll({top: 0, behavior: 'smooth'});
      statusIcons[1].classList.remove('active');
      statusIcons[2].classList.add('active');

      contactformForm.style.display = 'none';
      contactformThanks.style.display = 'block';
    } else {
      alert('送信できませんでした。');
    }
  });
});