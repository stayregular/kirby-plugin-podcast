# Podcast plugin for Kirby CMS

Basic podcast plugin for Kirby CMS.

## Installation

-Drag all the files into your Kirby installation. Or do a git clone if you're feeling fancy.

### To Enable Podcasts
-In the `/content/` folder of Kirby, create a folder called `podcasts` and put in a blank file called podcasts.txt.
-Inside `/content/podcasts/`, create a folder called `your-podcast-name`. (for each new podcast show, add another folder)

### To Enable the Podcast Feed
-In the `/content/` folder of Kirby, create a folder called `feed`
-In the `/content/feed/` folder of Kirby, create a folder called `your-podcast-name` (must match slug of podcast folder)
-Put in a blank file called feedpodcast.txt.
-Done!

## How to Add Podcasts

-Create a blank txt file inside `/content/podcasts/your-podcast-name/20170830-sample-podcast-title/` called `podcast.txt`

OR 

Using Kirby Panel: Navigate to the Podcast page, navigate to the specific Podcast Show page, then add a new page with the template Podcast.

## Thanks to

(link: http://www.zedwood.com/article/php-calculate-duration-of-mp3 text: Calculate Duration of MP3)
