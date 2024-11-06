function handleRoleChange(formType) {
  const role = document.getElementById(
    formType === "login" ? "role" : "role-register"
  ).value;
  const idLabel = document.getElementById(
    formType === "login" ? "id-label-login" : "id-label-register"
  );
  const identifierInput = document.getElementById(
    formType === "login" ? "identifier-login" : "identifier-register"
  );
  const identifierinputName = document.getElementById(
    formType === "login" ? "name-label-register" : "identifier-register"
  );

  if (role === "mahasiswa") {
    idLabel.textContent = "NAMA";
    identifierinputName.placeholder = "masukan nama anda";
    idLabel.textContent = "NPM";
    identifierInput.placeholder = "Masukan NPM";
  } else {
    idLabel.textContent = "NAMA";
    identifierinputName.placeholder = "masukan nama anda";
    idLabel.textContent = "NSN";
    identifierInput.placeholder = "Masukan NSN";
  }
}
