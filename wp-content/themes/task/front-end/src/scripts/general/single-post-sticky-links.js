import {stickySidebar} from "./sticky-sidebar";

export function singlePostStickyLinks(container = document) {
  const sidebar = container.querySelector('.sticky-menu');
  const wrapper = container.querySelector('.right-content');
  if (sidebar && wrapper) {
    stickySidebar(sidebar, wrapper);
  }
}

