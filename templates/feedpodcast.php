<?php
header('Content-Type: application/rss+xml; charset=utf-8');
echo '<?xml version="1.0" encoding="utf-8"?>';
$category = page('podcast/'.$page->slug());
$category_array = array(
	'Art > Design',
	'Art > Fashion & Beauty',
	'Art > Food',
	'Art > Literature',
	'Art > Performing Arts',
	'Art > Visual Arts',
	'Business > Business News',
	'Business > Careers',
	'Business > Investing',
	'Business > Management & Marketing',
	'Business > Shopping',
	'Comedy',
	'Education > Educational Technology',
	'Education > Higher Education',
	'Education > K-12',
	'Education > Language Courses',
	'Education > Training',
	'Games &amp; Hobbies > Automotive',
	'Games &amp; Hobbies > Aviation',
	'Games &amp; Hobbies > Hobbies',
	'Games &amp; Hobbies > Other Games',
	'Games &amp; Hobbies > Video Games',
	'Health > Alternative Health',
	'Health > Fitness & Nutrition',
	'Health > Self-Help',
	'Health > Sexuality',
	'Health > Kids & Family',
	'Music',
	'News &amp; Politics',
	'Science &amp; Medicine > Medicine',
	'Science &amp; Medicine > Natural Sciences',
	'Science &amp; Medicine > Social Sciences',
	'Society &amp; Culture > History',
	'Society &amp; Culture > Personal Journals',
	'Society &amp; Culture > Philosophy',
	'Society &amp; Culture > Places &amp; Travel',
	'Technology > Gadgets',
	'Technology > Podcasting',
	'Technology > Software How-To',
	'Technology > Tech News'
);
foreach($category->itunescat()->xml() as $category_name) {
	if(strpos($category_name, ' > ') != false) {
		$double = explode(' > ', $category_name);
		$category_xml .= '<itunes:category text="'.$double[0].'" />
		<itunes:category text="'.$double[1].'" />
		';
	} else {
		$category_xml = '<itunes:category text="'.$category_name.'" />
		';
	}
}
?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
xmlns:rawvoice="http://www.rawvoice.com/rawvoiceRssModule/"
xmlns:googleplay="http://www.google.com/schemas/play-podcasts/1.0/play-podcasts.xsd"
>
<channel>
	<title><?= $category->title() ?></title>
	<atom:link href="http://weedporndaily.com/feed/podcast/<?= $page->slug() ?>" rel="self" type="application/rss+xml" />
	<link>http://weedporndaily.com</link>
	<description>Your daily dose of beautiful bud and weeducation</description>
	<lastBuildDate><?= date('D, d M Y G:H:i O') ?></lastBuildDate>
	<language>en-US</language>
	<sy:updatePeriod>hourly</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
		<generator>http://weedporndaily.com</generator>
	<itunes:summary><?= $category->title() ?></itunes:summary>
	<itunes:author>WeedPornDaily</itunes:author>
	<itunes:explicit>yes</itunes:explicit>
	<itunes:image href="<?= $category->coverimage()->xml() ?>" />
	<itunes:owner>
		<itunes:name>WeedPornDaily</itunes:name>
		<itunes:email>contact@weedporndaily.com</itunes:email>
	</itunes:owner>
	<managingEditor>contact@weedporndaily.com (WeedPornDaily)</managingEditor>
	<itunes:subtitle>Your weekly dose of cannabis news and weed porn</itunes:subtitle>
	<image>
		<title><?= $category->title() ?></title>
		<url><?= $category->coverimage()->xml() ?></url>
		<link>http://weedporndaily.com</link>
	</image>
	<?= $category_xml ?>
	<?php foreach($category->children()->visible()->flip() as $podcast) { ?>
	<item>
		<title><?= $podcast->title()->html() ?></title>
		<link><?= $podcast->url() ?></link>
		<pubDate><?= $podcast->date('D, d M Y G:H:i O') ?></pubDate>
		<comments><?= $podcast->url() ?>#comment</comments>
		<wfw:commentRss><?= $podcast->url() ?>/comment-feed-maybe-disqus?</wfw:commentRss>
		<?php foreach($podcast->tags()->split() as $tag) { ?>
			<category><![CDATA[<?= $tag ?>]]></category>
		<?php } ?>
		<description><?= strip_tags($podcast->summary()->xml()) ?></description>
		<content:encoded><![CDATA[<?= substr(strip_tags($podcast->text()->kirbytext()), 0, 200) ?>&hellip;]]></content:encoded>
		<enclosure url="<?= $podcast->mp3() ?>" length="<?= $podcast->filesize() ?>" type="audio/mpeg" />
		<itunes:subtitle><?= substr(strip_tags($podcast->summary()->xml()), 0, 250) ?>&hellip;</itunes:subtitle>
		<itunes:summary><?= strip_tags($podcast->summary()->xml()) ?></itunes:summary>
		<itunes:author>WeedPornDaily</itunes:author>
		<itunes:explicit>yes</itunes:explicit>
		<itunes:duration><?= $podcast->duration() ?></itunes:duration>
		</item>
	<?php } ?>
