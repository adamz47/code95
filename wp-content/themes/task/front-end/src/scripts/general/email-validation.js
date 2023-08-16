function validateEmail(email) {
  // regex pattern for email validation
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  // check if email is empty
  if (email.trim() === '') {
    return false;
  }
  // return true if email matches the regex pattern, false otherwise
  return regex.test(email);
}

export function formInputs(formWrapper, email, submitBtn) {
  const emailInput = email;
  const submitButton = submitBtn;
  const formWrapperEl = formWrapper;
  emailInput.setCustomValidity('');
  emailInput.addEventListener('invalid', (function () {
    return function (e) {
      //prevent the browser from showing default error bubble / hint
      e.preventDefault();
      // optionally fire off some custom validation handler
      // myValidation();
    };
  })(), true);
  submitButton.addEventListener('click', function () {
    if (!validateEmail(emailInput.value)) {
      emailInput.classList.add('invalid-email');
      formWrapperEl.classList.replace('valid-email', 'invalid-email');
      formWrapperEl.classList.add('has-error');
      formWrapperEl.classList.replace('has-confirm', 'has-error');
    } else {
      emailInput.classList.add('valid-email');
      formWrapperEl.classList.replace('invalid-email', 'valid-email');
      formWrapperEl.classList.add('has-confirm');
      formWrapperEl.classList.replace('has-error', 'has-confirm');
    }
    setTimeout(function () {
      formWrapperEl.classList.remove('has-error', 'has-confirm', 'invalid-email', 'valid-email');
    }, 3000)


  })
  emailInput?.addEventListener("focusout", function () {
    formWrapperEl.classList.remove('has-error', 'has-confirm', 'invalid-email', 'valid-email');
  });
}

