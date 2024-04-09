const fields = document.querySelectorAll('.field-body input, .field-body select, .field-body textarea');
const statusIcons = document.querySelectorAll('.status-icon');

const confirm = document.querySelector('.contactform-footer .confirm');
const submit = document.querySelector('.contactform-footer .submit');
const back = document.querySelector('.contactform-footer .back');

const approvalInput = document.querySelector('.approvalInput');

const formElements = document.forms[0];

submit.style.display = 'none';
back.style.display = 'none';

function validate() {
  let err = [];

  if (formElements.first_name.value === "") err.push("名前-性は必須項目です");
  if (formElements.last_name.value === "") err.push("名前-名は必須項目です");
  if (formElements.first_name_gana.value === "") err.push("なまえ-せいは必須項目です");
  if (formElements.last_name_gana.value === "") err.push("なまえ-めいは必須項目です");
  if (formElements.tel.value === "") err.push("電話番号は必須項目です");
  if (!validator.isMobilePhone(formElements.tel.value, "ja-JP")) err.push("正しい電話番号を入力してください");
  if (formElements.email.value === "") err.push("メールアドレスは必須項目です");
  if (!validator.isEmail(formElements.email.value)) err.push("正しいメールアドレスを入力してください");
  /* if (formElements.manshion_name_bldg.value === "") err.push("マンション名・棟は必須項目です");
  if (formElements.room_number.value === "") err.push("部屋番号は必須項目です");
  if (formElements.address.value === "") err.push("物件所在地は必須項目です");
  if (formElements.contact_content.value === "") err.push("お問い合わせ内容を選択してください");
  if (formElements.note.value === "") err.push("備考は必須項目です"); */
  if (!approvalInput.checked) err.push("個人情報の取扱いに同意してください");

  return err;
}

function comfirmOnClick() {
  let validation = validate();
  document.querySelector('.err_msg').style.display = 'none';
  if (validation.length > 0) {
    window.scroll({top: 0, behavior: 'smooth'});
    document.querySelector('.err_msg').style.display = 'inline-block';
    document.querySelector('.err_msg ul').innerHTML = '';
    validation.forEach(value => {
      let element = document.createElement('li');
      element.textContent = value;
      document.querySelector('.err_msg ul').appendChild(element);
    });
  } else {
    window.scroll({top: 0, behavior: 'smooth'});
    fields.forEach(element => {
      if (element.tagName === 'SELECT') {
          const options = element.querySelectorAll('option:not(:checked)');
          options.forEach(option => {
            option.disabled = true;
          });
      } else if (element.tagName === 'TEXTAREA') {
        element.readOnly = true;
      } else {
        element.setAttribute('readonly', 'true');
      }
    });
    statusIcons[0].classList.remove('active');
    confirm.style.display = 'none';
    statusIcons[1].classList.add('active');
    submit.style.display = 'block';
    back.style.display = 'block';
  }
}

function backOnClick() {
  window.scroll({top: 0, behavior: 'smooth'});
  fields.forEach(element => {
    if (element.tagName === 'SELECT') {
      const options = element.querySelectorAll('option:not(:checked)');
          options.forEach(option => {
            option.disabled = false;
          });
    } else if (element.tagName === 'TEXTAREA') {
      element.readOnly = false;
    } else {
      element.removeAttribute('readonly');
    }
  });
  statusIcons[1].classList.remove('active');
  submit.style.display = 'none';
  back.style.display = 'none';
  
  statusIcons[0].classList.add('active');
  confirm.style.display = 'block';
}

function submitOnClick() {
  fields.forEach(element => {
    if (element.tagName === 'SELECT') {
      const options = element.querySelectorAll('option:not(:checked)');
      options.forEach(option => {
        option.disabled = false;
      });
    } else if (element.tagName === 'TEXTAREA') {
      element.readOnly = false;
    } else {
      element.removeAttribute('readonly');
    }
  });
  formElements.submit();
}