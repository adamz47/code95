import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import {getElementsForAnimation} from '../../functions/getElementsForAnimation';

gsap.registerPlugin(ScrollTrigger);
export function moveElementToOther(container = document, moveThis = '[move-this]', moveToHere = '[move-to-here]') {
  const moveThisElement = container.querySelector?.(moveThis);
  const moveToHereElement = container.querySelector?.(moveToHere);

  if (!moveThisElement || !moveToHereElement) return;
  const eleRect = moveToHereElement.getBoundingClientRect();
  const sectionRect = container.getBoundingClientRect();

// Calculate the top and left positions
  const top = eleRect.top - sectionRect.top + eleRect.height * .5;
  const left = eleRect.left - sectionRect.left + eleRect.width * .5;
  // moveToHereElement
  ScrollTrigger.create({
    trigger: moveToHereElement,
    start: 'center 70%',
    animation: gsap.to(moveThisElement, {
      top,
      left,
      xPercent: -50,
      yPercent: -50,
      x: 0,
      y: 0,
      duration: 1
    }),
    once: true,
  });

}
