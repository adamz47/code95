import './styles/style.scss';
import {gsap} from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import header from './blocks/header_block';
import hero from './blocks/hero_block';
import {initBlocks} from './blocks';
import {getHeightOfViewPort} from './scripts/functions/getHeightOfViewPort';
import {generateDataHover} from './scripts/functions/generateDataHover';
import {scrollToHash} from './scripts/general/scroll-to-hash';
import {initModal} from "./scripts/general/custom-modal";
import {activePage} from "./scripts/general/active-page";
import {singlePostStickyLinks} from "./scripts/general/single-post-sticky-links";
import {toolFavorite} from "./scripts/general/tool-favorite";
import {playIVSTAnimations} from "./scripts/general/animations";


const reInvokableFunction = async (container = document) => {
  container.querySelector('header') && await header(container.querySelector('header'));
  container.querySelector('.hero_block') && await hero(container.querySelector('.hero_block'));

  await initBlocks(container);

  // setFormFunctionality(container);
  generateDataHover(container);
  scrollToHash(container);
  getHeightOfViewPort(container);
  if (document.body.classList.contains('single-post')) {
    singlePostStickyLinks(container);
  }
  activePage(container);
  toolFavorite(container);
  if (window.location.search.includes('s=')) {
    window.addEventListener('algoliaRender', function () {
      toolFavorite();
    });
  } else {
    toolFavorite();
  }


  // pageLoadingChecker(container);
  ScrollTrigger.refresh(false);
};
let loaded = false;

async function onLoad() {
  gsap.config({
    nullTargetWarn: false,
  });
  if (document.readyState === 'interactive' && !loaded) {
    loaded = true;
    initModal();
    gsap.registerPlugin(ScrollTrigger);

    await reInvokableFunction();
    // await wait(2000);
    document.body.classList.add('loaded');
    playIVSTAnimations(10);

    //region force page to scroll to element if url has hash
    let currentURL = window.location.href;
    let blockID = currentURL.split('#');
    if (blockID && blockID[1]) {
      let block = document.querySelector('#' + blockID[1]);
      if (block) {
        document.body.classList.remove('loaded');
        setTimeout(() => {
          window.scrollTo(0, (block.getBoundingClientRect().top + window.scrollY - window.headerSticky ? window.headerSticky : 93))
          document.body.classList.add('loaded');
        }, 400)
      }
    }
    //endregion force page to scroll to element if url has hash
  }
}

onLoad();

document.onreadystatechange = function () {
  onLoad();
};
