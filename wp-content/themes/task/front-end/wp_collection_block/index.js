import './style.scss';
import {gsap} from "gsap";
import {SplitText} from "gsap/SplitText";
import {imageLazyLoading} from "../../scripts/functions/imageLazyLoading";
import {animations} from "../../scripts/general/animations";
import {
  requestBodyGenerator
} from "../../scripts/functions/requestBodyGenerator";
import {stringToHTML} from "../../scripts/functions/stringToHTML";
import {debounce} from "lodash/function";
gsap.registerPlugin(SplitText)

/**
 *
 * @param block {HTMLElement}
 * @returns {Promise<void>}
 */
const wpCollectionBlock = async (block) => {
  const postsContainer = block.querySelector('[posts-container]');
  const loadMore = block.querySelector('.load-more-wrapper');
  const noPosts = block.querySelector('.no-posts');
  let loadMoreStatus = !loadMore?.classList.contains('hidden');

  loadMore?.addEventListener('click', async () => {
    if (loadMore.classList.contains('loading')) return;
    loadMore.classList.add('loading');
    loadMore.classList.remove('hidden');
    noPosts.classList.remove('active');
    const response = await fetch(theme_ajax_object.ajax_url, {
      method: 'POST',
      body: requestBodyGenerator(loadMore),
    });
    loadMore.classList.remove('loading');
    const hasMorePages = !!response.headers.get('X-WP-Has-More-Pages');
    const totalPages = +response.headers.get('X-WP-Total-Pages');
    noPosts.classList.toggle('active', totalPages === 0);
    loadMore.classList.toggle('hidden', !hasMorePages);
    loadMoreStatus = hasMorePages;
    const htmlString = await response.json();
    const oldArgs = JSON.parse(loadMore.dataset.args);
    oldArgs.paged++;
    loadMore.dataset.args = JSON.stringify(oldArgs);
    const posts = stringToHTML(htmlString.data);
    for (let post of posts) {
      postsContainer.appendChild(post);
    }
    animations(posts);
    imageLazyLoading(posts);
  });


  function loadMoreClicker() {
    loadMore?.click();
    loadMore?.classList.add('none-floating');
  }

  const debouncedScrollHandler = debounce(() => !loadMore.matches('.loading, .hidden') && loadMoreClicker(), 300, {
    leading: true,
    maxWait: 500
  });
  const scrollHandler = () => {
    0 >= (block.getBoundingClientRect().bottom - window.innerHeight * (window.innerWidth <= 600 ? 5 : 3)) && debouncedScrollHandler()
  }
  window.addEventListener('scroll', scrollHandler)

  const textContainer = block.querySelector(".placeholder");
  const myInput = block.querySelector(".search-field");
  myInput?.addEventListener("focus", function () {
    textContainer.classList.add("hide")
  })
  let split
  let animation = gsap.timeline({})
  const blockAnimations = () => {
    split = new SplitText(textContainer, {type: "chars"})
    animation.from(split.chars, {
      delay: .5, opacity: 0, duration: .05, ease: "power3", stagger: {
        amount: 1.5
      }, repeat: -1, repeatDelay: 3
    })
  }
  window.addEventListener('play-iv-st-animation', blockAnimations)

  animations(block);
  imageLazyLoading(block);
};

export default wpCollectionBlock;

