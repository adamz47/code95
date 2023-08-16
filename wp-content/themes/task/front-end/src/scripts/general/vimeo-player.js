import Player from '@vimeo/player/src/player';

export function vimeoPlayer(player, url, options = {}) {
  if (!player && !url) return;

  const playerID = url ? url.slice(url.lastIndexOf('/') + 1, url.length) : null;
  const initialOptions = {
    id: playerID,
    responsive: true,
    playsinline: true,
    portrait: false,
    byline: false,
    ...options
  };

  return new Player(player, initialOptions);
}
