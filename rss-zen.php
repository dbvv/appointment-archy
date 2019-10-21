<?php
$postCount = 50; // количество записей для отображения в фиде
$posts = query_posts(array('showposts' => $postCount, 'category_name'=> 'news'));
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>
<rss version="2.0"
xmlns:content="http://purl.org/rss/1.0/modules/content/"
xmlns:wfw="http://wellformedweb.org/CommentAPI/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:media="http://search.yahoo.com/mrss/"
xmlns:atom="http://www.w3.org/2005/Atom"
xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
<?php do_action('rss2_ns'); ?>>
<channel>
 <title><?php bloginfo('name'); ?></title>
 <link><?php bloginfo('url') ?></link>
 <description><?php bloginfo('description') ?></description>
 <language>ru</language>
 <atom:link href="<?php bloginfo('url') ?>/feed/zen/" rel="self" type="application/rss+xml" />
 <?php do_action('rss2_head'); ?>
 <?php while(have_posts()) : the_post(); ?>
 <item>
 <title><?php the_title_rss(); ?></title>
 <link><?php the_permalink_rss(); ?>?utm_source=zen</link>
 <guid><?php the_guid(); ?></guid>
 <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
 <media:rating scheme="urn:simple">nonadult</media:rating>
 <author><?php the_author_meta('user_email'); ?> (<?php the_author(); ?>)</author>
 <category>Новости InfraBIM.Pro</category>
 <?php 
 $gallery = get_attached_media( 'image',$post ); 
 foreach( $gallery as $image_url ) { 
     $filesize = filesize(get_attached_file($image_url->ID));
    $imageurl = $image_url->guid;
    // TODO: тут нужно дописать часть с картинками                      !!!!!!!!!!!!!!
    // $imageurl = str_replace( 'https://', 'http://', $imageurl );
    // echo '<enclosure url="' . $imageurl . '" type="image/jpeg" length="' . $filesize . '" />
    // ';
 }
 ?>
 <description><![CDATA[<?php 
//  echo get_the_excerpt(); 
$excerpt = get_post()->post_content;
// echo $excerpt;

	$charlength=150;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
 ?>]]></description>
 <content:encoded><![CDATA[
 <?php $content = do_shortcode(get_post_field('post_content', $post->ID));
 $pattern = '/
 
((<a.+?\>)?<img.*title=\"([^\\"]+)\".*?>(<\/a>)?)<\/p>/';
 $replacement = '
<figure>$1
<figcaption>
 '.get_the_title().'
 <span class="copyright"><?php the_author(); ?></span>
 </figcaption>
 
 </figure>
 
';
 $content = preg_replace( $pattern, $replacement, $content );
 echo $content;
 ?>]]></content:encoded>
 <?php rss_enclosure(); ?>
 <?php do_action('rss2_item'); ?>
</item>
<?php endwhile; ?>
</channel>
</rss>