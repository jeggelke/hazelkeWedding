<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hazelkeWedding
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row no-side-margin">
				<div class="col-xs-offset-1 col-xs-10">
					<header id="masthead" class="site-header" role="banner">
						<div class="site-branding ">
							<div class="row header-container">
								<div class="col-xs-12 col-md-8 col-md-offset-2 no-side-padding hipster-photo-slanted">
										<img src=<?php echo getRoot('/theme-images/header.jpg') ?> class="img-responsive" alt="header image">
								</div>
							</div>

						</div><!-- .site-branding -->
					</header><!-- #masthead -->
				</div>
			</div>
		<div class="container-fluid no-side-padding">
			<div class="container-fluid">
				<div class="row no-side-margin">
					<?php $args = array(
												'numberposts' => 10,
												'offset' => 0,
												'category' => 'OnePager',
												'orderby' => 'post_date',
												'order' => 'ASC',
												'include' => '',
												'exclude' => '',
												'meta_key' => '',
												'meta_value' => '',
												'meta_compare' => '',
												'post_type' => '',
												'post_status' => 'draft, publish, future, pending, private',
												'suppress_filters' => true
					);

					$one_pager_posts = get_posts( $args, ARRAY_A );

					foreach ($one_pager_posts as $post) : setup_postdata( $post );
					$teaser_text = get_field('one_pager_teaser', false, false);
					$title_text = get_the_title( $post );
					$external_url = get_field('one_pager_external_url', false, false);
					$post_url = ($external_url != "") ? $external_url : get_permalink( $post );
					$target = ($external_url != "") ? "_blank" : "_self";
					$read_more = get_field('one_pager_read_more', false, false);
					$key = array_search($post, $one_pager_posts);
					$slugName = $post->post_name;
					?>
					<div class="one-pager-section" id="<?php echo $slugName ?>">
						<h3 class="text-center"><?php echo $title_text ?></h3>
					<div class="inner-flex">
						<?php if ($key % 2 == 0) : ?>
							<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1 no-side-padding vcenter img-container order-sm-0">
								<img class="img-responsive center-block hipster-photo" src="<?php the_field('one_pager_image') ?>" />
							</div><!--
							--><div class="col-xs-12 col-md-4 col-md-offset-1 vcenter teaser-container order-sm-1">
								<p class=""><?php echo $teaser_text ?></p>
								<h4 class="text-center read-more-text"><a href="<?php echo $post_url ?>" target="<?php echo $target ?>"><?php echo $read_more ?></a></h4>
							</div>
						<?php else : ?>
							<div class="col-xs-12 col-md-4 col-md-offset-1 vcenter teaser-container order-sm-1">
								<p class=""><?php echo $teaser_text ?></p>
								<h4 class="text-center read-more-text"><a href="<?php echo $post_url ?>" target="<?php echo $target ?>"><?php echo $read_more ?></a></h4>
							</div><!--
							--><div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1 no-side-padding vcenter img-container order-sm-0">
								<img class="img-responsive center-block hipster-photo" src="<?php the_field('one_pager_image') ?>" />
							</div>
						<?php endif ?>
					</div>
				</div>
				<?php endforeach ?>
				</div>
			</div>

			<!-- <div class="section">
				<h2 class="text-center">Gallery</h2>
			</div> -->
				</div>
				<!-- <div class="row no-side-margin">
					<div class="col-xs-12 col-sm-6 col-md-4 instaframe-container">
						<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BLgrlzpBpLy/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">The most colorful kiln load ever! Little spirit animals are ready for Saturday&#39;s sale 🐝🐢🦃(More info in my bio) ••• #madeinaskutt #glazefiring #spiritanimal #basementlighting #rounddesigns #oneofakind #totem #kiln #artistsoninstagram #ceramics #clay #madeofmud #cat #lizard #cow #lion #fish #redwingblackbird #mouse #chipmunk #deer #skunk #parrot #cute</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Round Designs by Sarah Haze (@rounddesigns) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-10-13T16:58:11+00:00">Oct 13, 2016 at 9:58am PDT</time></p></div></blockquote>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 instaframe-container">
						<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BLetc2vBpG_/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">I&#39;ve been glazing like crazy getting ready for my first sale this weekend. This spooning koala spoon rest is just one of the round designs that will be available! ••• #ceramic #koala #spooning #underglaze #handmade #cute #earthenware #oneofakind #newbusiness #glazing</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Round Designs by Sarah Haze (@rounddesigns) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-10-12T22:35:57+00:00">Oct 12, 2016 at 3:35pm PDT</time></p></div></blockquote>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 instaframe-container">
						<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BLeMS3vhVNG/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">They all look like little green aliens at the moment, but once that glaze gets fired and turns clear these 100 little spirit animals will be colorful and for sale! #ceramic #spiritanimal #wip #earthenware #oneofakind #handbuilt #handmade #craft #makersgonnamake #artistsoninstagram</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Round Designs by Sarah Haze (@rounddesigns) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-10-12T17:46:14+00:00">Oct 12, 2016 at 10:46am PDT</time></p></div></blockquote>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 instaframe-container">
						<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BLeLhCJBlji/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">Exciting times are afoot! This weekend is the debut of my new creative business adventure: Round Designs. I&#39;m stoked for how the future will unfold from here! ••• #newbusiness #firstpost #creativeentrepreneur #smallbusiness #artwork #artist #ceramics #thefutureisbright</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Round Designs by Sarah Haze (@rounddesigns) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-10-12T17:39:26+00:00">Oct 12, 2016 at 10:39am PDT</time></p></div></blockquote>
					</div>
				</div>
				<script async defer src="//platform.instagram.com/en_US/embeds.js"></script> -->
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- <script>
		$(document).ready(
			function(){
				var check = function(){
				    if($('iframe.instagram-media:last-of-type').height()>0){
							setIframeHeight();
				    }
				    else {
				        setTimeout(check, 200); // check again in a second
				    }
				}
				check();
				$(window).resize(function(){setIframeHeight()})
			}
		)
		function setIframeHeight(){
			var biggestHeight = 0;
				$('iframe.instagram-media').each(
					function(){
						console.log(this.height);
						if (this.height > biggestHeight)
						{
							biggestHeight = this.height;
						}
					}
				);
				$('.instaframe-container').height(biggestHeight);
		}
	</script> -->
<?php
//get_sidebar();
get_footer();
