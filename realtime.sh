vue image load with background-image
<div slot="image" style="background-image: url(./image.png)" data-src='./image.png' />
<img slot="preloader" src="./image-loader.gif" />
<div slot="error">error message</div>

BROADCAST_DRIVER=redis
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_DRIVER=redis
