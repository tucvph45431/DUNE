function validation() {
  const selectors = {
    name: document.querySelector(".name-cus").value,
    email: document.querySelector(".email-cus"),
    password: document.querySelector(".password-cus"),
    confirm: document.querySelector(".confirm-cus"),
  };

  // const error = {
  //   name: ,
  // };

  if (selectors.name == "") {
    document.getElementById("error_name").innerHTML =
      "please fill the name field";
    return false;
  }
}
