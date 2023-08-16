export function pageLoadingChecker(container = document) {
  const localStorageKey = `webofai`;
  const loadingScreen = container.querySelector('.loading-screen');
  const isVisitedBefore = localStorage.getItem(localStorageKey);
  if (!isVisitedBefore) {
    localStorage.setItem(localStorageKey, 'true');
  } else {
    loadingScreen.style.display = 'none';
  }
}
