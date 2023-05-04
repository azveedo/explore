/* import css from "./css/style.scss";

import * as bootstrap from "bootstrap";

import "@fortawesome/fontawesome-free/js/all"; */

import {
  createParallax,
  animateMenu,
  collapseFaq,
  createCarousel,
} from "./components";
import { selectors } from "./config/selectors";

function runApp() {
  createParallax();
  animateMenu(selectors.btnMobile);
  collapseFaq();
  createCarousel();
}

document.addEventListener("DOMContentLoaded", runApp);

console.log("App running...");
