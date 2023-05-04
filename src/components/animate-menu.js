function toggleMenu(event) {
  if (event.type === "touchstart") event.preventDefault();
  const toggleActiveBtn = document.getElementById("menu-center");
  const toggleActiveBtn1 = document.getElementById("menu-toggle-btn");
  toggleActiveBtn.classList.toggle("active");
  toggleActiveBtn1.classList.toggle("active");
  const active = toggleActiveBtn1.classList.contains("active");
  event.currentTarget.setAttribute("aria-expanded", active);

  if (active) {
    event.currentTarget.setAttribute("aria-label", "Fechar Menu");
  } else {
    event.currentTarget.setAttribute("aria-label", "Abrir Menu");
  }
}

export function animateMenu(btnMobile) {
  if (btnMobile) {
    btnMobile.addEventListener("click", toggleMenu);
    btnMobile.addEventListener("touchstart", toggleMenu);
  }
}
