<ul class="social">
	<li>
		<a href="http://b.hatena.ne.jp/entry/s/<?php echo str_replace(array('https://', 'http://'), array('', ''), get_permalink($post->id)); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); echo " | "; bloginfo('name'); ?>" data-hatena-bookmark-layout="basic-label-counter" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加">
			<img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" />
		</a>
		<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
	</li>
	<li>
		<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
	</li>
	<li>
		<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</li>
	<li>
		<div class="line-it-button" data-lang="ja" data-type="share-a" data-url="<?php the_permalink(); ?>" style="display: none;"></div>
 		<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
	</li>
</ul>
