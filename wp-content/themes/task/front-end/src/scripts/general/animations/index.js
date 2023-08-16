import {parallaxAnimation} from './parallaxAnimation';
import {imageRevealAnimation} from './imagesRevealAnimation';
import {wordsUpAnimation} from './wordsUpAnimation';
import {linesUpAnimation} from './linesUpAnimation';
import {inViewAnimations} from './InViewAnimations';
import {realLinesUpAnimation} from './RealLinesUpAnimation';
import {spriteSheetAnimation} from "./spriteSheetAnimation";
import {drawDottedLineAnimation} from "./drawDottedLineAnimation";
import {moveElementToOther} from "./moveElementToOther";
import {gsap} from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger)

export function playIVSTAnimations(delay = 0) {
  setTimeout(() => window.dispatchEvent(new Event('play-iv-st-animation')), delay)
}

export function animations(container = document) {
  const blockAnimations = () => {
    imageRevealAnimation(container);
    wordsUpAnimation(container);
    linesUpAnimation(container);
    inViewAnimations(container);
    spriteSheetAnimation(container);
    parallaxAnimation(container);
    realLinesUpAnimation(container);
    drawDottedLineAnimation(container);
    moveElementToOther(container);
  }

  window.addEventListener('play-iv-st-animation', blockAnimations)

}

export function animationsAjax(container = document) {
  imageRevealAnimation(container);
  wordsUpAnimation(container);
  linesUpAnimation(container);
  inViewAnimations(container);
  spriteSheetAnimation(container);
  parallaxAnimation(container);
  realLinesUpAnimation(container);
  drawDottedLineAnimation(container);
  moveElementToOther(container);
}


