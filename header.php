<?php require_once 'db.php'; ?>
<!doctype html>
<html lang="en-US">
<head>
		<?php $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/'; ?>
		<base href="<?php echo $base_url; ?>">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/all.css">
		<link href="assets/css/lineicons.css" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />
		<link href="assets/css/aos.css" rel="stylesheet" />
<link rel="stylesheet"
href="assets/css/all.min.css">

		<script>
			document.addEventListener("DOMContentLoaded", function() {
				let menuItems = document.querySelectorAll(".mobile-nav li.menu-item-has-children > a");

				menuItems.forEach(function(item) {
					let toggleButton = document.createElement("button");
					toggleButton.classList.add("submenu-toggle");

					// SVG Icon ko string me convert karna
					toggleButton.innerHTML = `<svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                <path d="M5.54779 9.09467C5.84069 8.80178 6.31556 8.80178 6.60846 9.09467L12.3281 14.8143L18.0478 9.09467C18.3407 8.80178 18.8156 8.80178 19.1085 9.09467C19.4013 9.38756 19.4013 9.86244 19.1085 10.1553L12.8585 16.4053C12.5656 16.6982 12.0907 16.6982 11.7978 16.4053L5.54779 10.1553C5.2549 9.86244 5.2549 9.38756 5.54779 9.09467Z" fill="#343C54"/>
	            </svg>`;

					item.style.position = "relative";
					item.appendChild(toggleButton);

					let submenu = item.nextElementSibling;

					toggleButton.addEventListener("click", function(e) {
						e.stopPropagation();
						e.preventDefault();
						if (submenu) {
							let isOpen = submenu.style.display === "block";
							submenu.style.display = isOpen ? "none" : "block";

							// Toggle SVG icon ka rotation
							toggleButton.querySelector("svg").style.transform = isOpen ? "rotate(0deg)" : "rotate(180deg)";
						}
					});
				});
			});
		</script>




		<title>Dr APJ University Indore</title>
<meta name='robots' content='max-image-preview:large' />
<link rel='dns-prefetch' href='http://cdnjs.cloudflare.com/' />
<link rel="alternate" type="application/rss+xml" title="Dr APJ University Indore &raquo; Feed" href="feed.php" />
<link rel="alternate" type="application/rss+xml" title="Dr APJ University Indore &raquo; Comments Feed" href="comments/feed.php" />
<link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed" href="wp-json/oembed/1.0/embedc7ba.json?url=https%3A%2F%2Faku.ac.in%2F" />
<link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed" href="wp-json/oembed/1.0/embede31d?url=https%3A%2F%2Faku.ac.in%2F&amp;format=xml" />
<style id='wp-img-auto-sizes-contain-inline-css'>
img:is([sizes=auto i],[sizes^="auto," i]){contain-intrinsic-size:3000px 1500px}
/*# sourceURL=wp-img-auto-sizes-contain-inline-css */
</style>
<style id='wp-emoji-styles-inline-css'>

	img.wp-smiley, img.emoji {
		display: inline !important;
		border: none !important;
		box-shadow: none !important;
		height: 1em !important;
		width: 1em !important;
		margin: 0 0.07em !important;
		vertical-align: -0.1em !important;
		background: none !important;
		padding: 0 !important;
	}
/*# sourceURL=wp-emoji-styles-inline-css */
</style>
<style id='wp-block-library-inline-css'>
:root{--wp-block-synced-color:#7a00df;--wp-block-synced-color--rgb:122,0,223;--wp-bound-block-color:var(--wp-block-synced-color);--wp-editor-canvas-background:#ddd;--wp-admin-theme-color:#007cba;--wp-admin-theme-color--rgb:0,124,186;--wp-admin-theme-color-darker-10:#006ba1;--wp-admin-theme-color-darker-10--rgb:0,107,160.5;--wp-admin-theme-color-darker-20:#005a87;--wp-admin-theme-color-darker-20--rgb:0,90,135;--wp-admin-border-width-focus:2px}@media (min-resolution:192dpi){:root{--wp-admin-border-width-focus:1.5px}}.wp-element-button{cursor:pointer}:root .has-very-light-gray-background-color{background-color:#eee}:root .has-very-dark-gray-background-color{background-color:#313131}:root .has-very-light-gray-color{color:#eee}:root .has-very-dark-gray-color{color:#313131}:root .has-vivid-green-cyan-to-vivid-cyan-blue-gradient-background{background:linear-gradient(135deg,#00d084,#0693e3)}:root .has-purple-crush-gradient-background{background:linear-gradient(135deg,#34e2e4,#4721fb 50%,#ab1dfe)}:root .has-hazy-dawn-gradient-background{background:linear-gradient(135deg,#faaca8,#dad0ec)}:root .has-subdued-olive-gradient-background{background:linear-gradient(135deg,#fafae1,#67a671)}:root .has-atomic-cream-gradient-background{background:linear-gradient(135deg,#fdd79a,#004a59)}:root .has-nightshade-gradient-background{background:linear-gradient(135deg,#330968,#31cdcf)}:root .has-midnight-gradient-background{background:linear-gradient(135deg,#020381,#2874fc)}:root{--wp--preset--font-size--normal:16px;--wp--preset--font-size--huge:42px}.has-regular-font-size{font-size:1em}.has-larger-font-size{font-size:2.625em}.has-normal-font-size{font-size:var(--wp--preset--font-size--normal)}.has-huge-font-size{font-size:var(--wp--preset--font-size--huge)}.has-text-align-center{text-align:center}.has-text-align-left{text-align:left}.has-text-align-right{text-align:right}.has-fit-text{white-space:nowrap!important}#end-resizable-editor-section{display:none}.aligncenter{clear:both}.items-justified-left{justify-content:flex-start}.items-justified-center{justify-content:center}.items-justified-right{justify-content:flex-end}.items-justified-space-between{justify-content:space-between}.screen-reader-text{border:0;clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;word-wrap:normal!important}.screen-reader-text:focus{background-color:#ddd;clip-path:none;color:#444;display:block;font-size:1em;height:auto;left:5px;line-height:normal;padding:15px 23px 14px;text-decoration:none;top:5px;width:auto;z-index:100000}html :where(.has-border-color){border-style:solid}html :where([style*=border-top-color]){border-top-style:solid}html :where([style*=border-right-color]){border-right-style:solid}html :where([style*=border-bottom-color]){border-bottom-style:solid}html :where([style*=border-left-color]){border-left-style:solid}html :where([style*=border-width]){border-style:solid}html :where([style*=border-top-width]){border-top-style:solid}html :where([style*=border-right-width]){border-right-style:solid}html :where([style*=border-bottom-width]){border-bottom-style:solid}html :where([style*=border-left-width]){border-left-style:solid}html :where(img[class*=wp-image-]){height:auto;max-width:100%}:where(figure){margin:0 0 1em}html :where(.is-position-sticky){--wp-admin--admin-bar--position-offset:var(--wp-admin--admin-bar--height,0px)}@media screen and (max-width:600px){html :where(.is-position-sticky){--wp-admin--admin-bar--position-offset:0px}}

/*# sourceURL=wp-block-library-inline-css */
</style>
<style id='classic-theme-styles-inline-css'>
/*! This file is auto-generated */
.wp-block-button__link{color:#fff;background-color:#32373c;border-radius:9999px;box-shadow:none;text-decoration:none;padding:calc(.667em + 2px) calc(1.333em + 2px);font-size:1.125em}.wp-block-file__button{background:#32373c;color:#fff;text-decoration:none}
/*# assets/css/classic-themes.min.css */
</style>
<link rel='stylesheet' id='wp-components-css' href='assets/css/style.min67b1.css' media='all' />
<link rel='stylesheet' id='wp-preferences-css' href='assets/css/style.min67b1.css' media='all' />
<link rel='stylesheet' id='wp-block-editor-css' href='assets/css/style.min67b1.css' media='all' />
<link rel='stylesheet' id='popup-maker-block-library-style-css' href='assets/css/block-library-style5828.css' media='all' />
<style id='global-styles-inline-css'>
:root{--wp--preset--aspect-ratio--square: 1;--wp--preset--aspect-ratio--4-3: 4/3;--wp--preset--aspect-ratio--3-4: 3/4;--wp--preset--aspect-ratio--3-2: 3/2;--wp--preset--aspect-ratio--2-3: 2/3;--wp--preset--aspect-ratio--16-9: 16/9;--wp--preset--aspect-ratio--9-16: 9/16;--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgb(6,147,227) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgb(252,185,0) 0%,rgb(255,105,0) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgb(255,105,0) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgb(255, 255, 255), 6px 6px rgb(0, 0, 0);--wp--preset--shadow--crisp: 6px 6px 0px rgb(0, 0, 0);}:where(.is-layout-flex){gap: 0.5em;}:where(.is-layout-grid){gap: 0.5em;}body .is-layout-flex{display: flex;}.is-layout-flex{flex-wrap: wrap;align-items: center;}.is-layout-flex > :is(*, div){margin: 0;}body .is-layout-grid{display: grid;}.is-layout-grid > :is(*, div){margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}:where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
/*# sourceURL=global-styles-inline-css */
</style>

<link rel='stylesheet' id='udm-frontend-css-css' href='assets/css/udm-frontend67b1.css' media='all' />
<link rel='stylesheet' id='wp-filr-style-css' href='assets/css/style5152.css' media='all' />
<link rel='stylesheet' id='uikit-css' href='assets/css/uikit67b1.css' media='all' />
<link rel='stylesheet' id='northforkweb-style-css' href='assets/css/style8a54.css' media='all' />
<link rel='stylesheet' id='main-css' href='assets/css/main67b1.css' media='all' />
<link rel='stylesheet' id='responsive-css' href='assets/css/responsive67b1.css' media='all' />
<link rel='stylesheet' id='owl-carousel-css-css' href='assets/css/owl.carousel.min67b1.css' media='all' />
<link rel='stylesheet' id='tablepress-default-css' href='assets/css/tablepress-combined.min8bb0.css' media='all' />
<link rel='stylesheet' id='js_composer_front-css' href='assets/css/js_composer.mine097.css' media='all' />
<link rel='stylesheet' id='vc_tta_style-css' href='assets/css/js_composer_tta.min.css' media='all' />
<link rel='stylesheet' id='js_composer_custom_css-css' href='assets/css/custome097.css' media='all' />
<link rel='stylesheet' id='popup-maker-site-css' href='assets/css/pum-site-styles2722.css' media='all' />
<link rel="stylesheet" type="text/css" href="assets/css/smartslider.mina154.css" media="all">
<style data-related="n2-ss-2">div#n2-ss-2 .n2-ss-slider-1{display:grid;position:relative;}div#n2-ss-2 .n2-ss-slider-2{display:grid;position:relative;overflow:hidden;padding:0px 0px 0px 0px;border:0px solid RGBA(62,62,62,1);border-radius:0px;background-clip:padding-box;background-repeat:repeat;background-position:50% 50%;background-size:cover;background-attachment:scroll;z-index:1;}div#n2-ss-2:not(.n2-ss-loaded) .n2-ss-slider-2{background-image:none !important;}div#n2-ss-2 .n2-ss-slider-3{display:grid;grid-template-areas:'cover';position:relative;overflow:hidden;z-index:10;}div#n2-ss-2 .n2-ss-slider-3 > *{grid-area:cover;}div#n2-ss-2 .n2-ss-slide-backgrounds,div#n2-ss-2 .n2-ss-slider-3 > .n2-ss-divider{position:relative;}div#n2-ss-2 .n2-ss-slide-backgrounds{z-index:10;}div#n2-ss-2 .n2-ss-slide-backgrounds > *{overflow:hidden;}div#n2-ss-2 .n2-ss-slide-background{transform:translateX(-100000px);}div#n2-ss-2 .n2-ss-slider-4{place-self:center;position:relative;width:100%;height:100%;z-index:20;display:grid;grid-template-areas:'slide';}div#n2-ss-2 .n2-ss-slider-4 > *{grid-area:slide;}div#n2-ss-2.n2-ss-full-page--constrain-ratio .n2-ss-slider-4{height:auto;}div#n2-ss-2 .n2-ss-slide{display:grid;place-items:center;grid-auto-columns:100%;position:relative;z-index:20;-webkit-backface-visibility:hidden;transform:translateX(-100000px);}div#n2-ss-2 .n2-ss-slide{perspective:1500px;}div#n2-ss-2 .n2-ss-slide-active{z-index:21;}.n2-ss-background-animation{position:absolute;top:0;left:0;width:100%;height:100%;z-index:3;}div#n2-ss-2 .n2-ss-background-animation{position:absolute;top:0;left:0;width:100%;height:100%;z-index:3;}div#n2-ss-2 .n2-ss-background-animation .n2-ss-slide-background{z-index:auto;}div#n2-ss-2 .n2-bganim-side{position:absolute;left:0;top:0;overflow:hidden;background:RGBA(51,51,51,1);}div#n2-ss-2 .n2-bganim-tile-overlay-colored{z-index:100000;background:RGBA(51,51,51,1);}div#n2-ss-2 .nextend-arrow{cursor:pointer;overflow:hidden;line-height:0 !important;z-index:18;-webkit-user-select:none;}div#n2-ss-2 .nextend-arrow img{position:relative;display:block;}div#n2-ss-2 .nextend-arrow img.n2-arrow-hover-img{display:none;}div#n2-ss-2 .nextend-arrow:FOCUS img.n2-arrow-hover-img,div#n2-ss-2 .nextend-arrow:HOVER img.n2-arrow-hover-img{display:inline;}div#n2-ss-2 .nextend-arrow:FOCUS img.n2-arrow-normal-img,div#n2-ss-2 .nextend-arrow:HOVER img.n2-arrow-normal-img{display:none;}div#n2-ss-2 .nextend-arrow-animated{overflow:hidden;}div#n2-ss-2 .nextend-arrow-animated > div{position:relative;}div#n2-ss-2 .nextend-arrow-animated .n2-active{position:absolute;}div#n2-ss-2 .nextend-arrow-animated-fade{transition:background 0.3s, opacity 0.4s;}div#n2-ss-2 .nextend-arrow-animated-horizontal > div{transition:all 0.4s;transform:none;}div#n2-ss-2 .nextend-arrow-animated-horizontal .n2-active{top:0;}div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-horizontal .n2-active{left:100%;}div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-horizontal .n2-active{right:100%;}div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-horizontal:HOVER > div,div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-horizontal:FOCUS > div{transform:translateX(-100%);}div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-horizontal:HOVER > div,div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-horizontal:FOCUS > div{transform:translateX(100%);}div#n2-ss-2 .nextend-arrow-animated-vertical > div{transition:all 0.4s;transform:none;}div#n2-ss-2 .nextend-arrow-animated-vertical .n2-active{left:0;}div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-vertical .n2-active{top:100%;}div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-vertical .n2-active{bottom:100%;}div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-vertical:HOVER > div,div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-vertical:FOCUS > div{transform:translateY(-100%);}div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-vertical:HOVER > div,div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-vertical:FOCUS > div{transform:translateY(100%);}div#n2-ss-2 .n2-ss-slide-limiter{max-width:1200px;}div#n2-ss-2 .n-uc-92dVOaBxC7RJ{padding:10px 10px 10px 10px}div#n2-ss-2 .n-uc-LRwu60J1mxtC{padding:10px 10px 10px 10px}div#n2-ss-2 .n-uc-MgP7kUMGENoX{padding:10px 10px 10px 10px}div#n2-ss-2 .n-uc-nSKCIa2bGXBR{padding:10px 10px 10px 10px}div#n2-ss-2 .nextend-arrow img{width: 32px}@media (min-width: 1200px){div#n2-ss-2 [data-hide-desktopportrait="1"]{display: none !important;}}@media (orientation: landscape) and (max-width: 1199px) and (min-width: 901px),(orientation: portrait) and (max-width: 1199px) and (min-width: 701px){div#n2-ss-2 [data-hide-tabletportrait="1"]{display: none !important;}}@media (orientation: landscape) and (max-width: 900px),(orientation: portrait) and (max-width: 700px){div#n2-ss-2 [data-hide-mobileportrait="1"]{display: none !important;}div#n2-ss-2 .nextend-arrow img{width: 16px}}</style>
<script>(function(){this._N2=this._N2||{_r:[],_d:[],r:function(){this._r.push(arguments)},d:function(){this._d.push(arguments)}}}).call(window);</script><script src="assets/js/n2.mina154.js" defer async></script>
<script src="assets/js/smartslider-frontend.mina154.js" defer async></script>
<script src="assets/js/ss-simple.mina154.js" defer async></script>
<script src="assets/js/smartslider-backgroundanimation.mina154.js" defer async></script>
<script src="assets/js/w-arrow-image.mina154.js" defer async></script>
<script>_N2.r('documentReady',function(){n2const.prefersReducedMotion=false;_N2.r(["documentReady","smartslider-frontend","smartslider-backgroundanimation","SmartSliderWidgetArrowImage","ss-simple"],function(){new _N2.SmartSliderSimple('n2-ss-2',{"admin":false,"background.video.mobile":1,"loadingTime":2000,"alias":{"id":0,"smoothScroll":0,"slideSwitch":0,"scroll":1},"align":"normal","isDelayed":0,"responsive":{"mediaQueries":{"all":false,"desktopportrait":["(min-width: 1200px)"],"tabletportrait":["(orientation: landscape) and (max-width: 1199px) and (min-width: 901px)","(orientation: portrait) and (max-width: 1199px) and (min-width: 701px)"],"mobileportrait":["(orientation: landscape) and (max-width: 900px)","(orientation: portrait) and (max-width: 700px)"]},"base":{"slideOuterWidth":1200,"slideOuterHeight":600,"sliderWidth":1200,"sliderHeight":600,"slideWidth":1200,"slideHeight":600},"hideOn":{"desktopLandscape":false,"desktopPortrait":false,"tabletLandscape":false,"tabletPortrait":false,"mobileLandscape":false,"mobilePortrait":false},"onResizeEnabled":true,"type":"fullwidth","sliderHeightBasedOn":"real","focusUser":1,"focusEdge":"auto","breakpoints":[{"device":"tabletPortrait","type":"max-screen-width","portraitWidth":1199,"landscapeWidth":1199},{"device":"mobilePortrait","type":"max-screen-width","portraitWidth":700,"landscapeWidth":900}],"enabledDevices":{"desktopLandscape":0,"desktopPortrait":1,"tabletLandscape":0,"tabletPortrait":1,"mobileLandscape":0,"mobilePortrait":1},"sizes":{"desktopPortrait":{"width":1200,"height":600,"max":3000,"min":1200},"tabletPortrait":{"width":701,"height":350,"customHeight":false,"max":1199,"min":701},"mobilePortrait":{"width":320,"height":160,"customHeight":false,"max":900,"min":320}},"overflowHiddenPage":0,"focus":{"offsetTop":"#wpadminbar","offsetBottom":""}},"controls":{"mousewheel":0,"touch":"horizontal","keyboard":1,"blockCarouselInteraction":1},"playWhenVisible":1,"playWhenVisibleAt":0.5,"lazyLoad":0,"lazyLoadNeighbor":0,"blockrightclick":0,"maintainSession":0,"autoplay":{"enabled":1,"start":1,"duration":3000,"autoplayLoop":1,"allowReStart":0,"reverse":0,"pause":{"click":0,"mouse":"0","mediaStarted":1},"resume":{"click":0,"mouse":"0","mediaEnded":1,"slidechanged":0},"interval":1,"intervalModifier":"loop","intervalSlide":"current"},"perspective":1500,"layerMode":{"playOnce":0,"playFirstLayer":1,"mode":"skippable","inAnimation":"mainInEnd"},"bgAnimations":{"global":[{"type":"GL","subType":"GLSL5","ease":"linear","tileDuration":0.6,"count":25,"delay":0.08,"invertX":0,"invertY":0,"allowedBackgroundModes":["fill"]}],"color":"RGBA(51,51,51,1)","speed":"normal"},"mainanimation":{"type":"horizontal","duration":800,"delay":0,"ease":"easeOutQuad","shiftedBackgroundAnimation":0},"carousel":1,"initCallbacks":function(){new _N2.SmartSliderWidgetArrowImage(this)}})})});</script><script src="assets/js/jquery.minf43b.js" id="jquery-core-js"></script>
<script src="assets/js/jquery-migrate.min5589.js" id="jquery-migrate-js"></script>
<script src="assets/js/uikit67b1.js" id="uikit-js"></script>
<script src="assets/js/uikit.min67b1.js" id="uikit-min-js"></script>
<script src="assets/js/navigation67b1.js" id="ls-js"></script>
<script></script><link rel="https://api.w.org/" href="wp-json.php" /><link rel="alternate" title="JSON" type="application/json" href="wp-json/wp/v2/pages/7.json" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
<meta name="generator" content="WordPress 6.9.5" />
<link rel="canonical" href="index.php" />
<link rel='shortlink' href='index.php' />
<meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/>
<link rel="icon" href="assets/images/cropped-favicon-32x32.png" sizes="32x32" />
<link rel="icon" href="assets/images/cropped-favicon-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon" href="assets/images/cropped-favicon-180x180.png" />
<meta name="msapplication-TileImage" content="assets/images/cropped-favicon-270x270.png" />
		<style id="wp-custom-css">
			.top-header-left ul.sub-menu {
    position: absolute;
    top: 100%;
    left: -999em;
    z-index: 99999;
    display: flex
;
    flex-direction: column;
    background: #fff;
    padding: 20px 20px;
    border-radius: 4px;
    box-shadow: 4px 4px 20px -8px #00000099;
    min-width: 220px;
}

.top-header-left .navbar-nav > li:hover ul.sub-menu {
	left: auto;
} 
#top-menu  .menu-item ul.sub-menu a{
	color:#000
}
#top-menu .menu-item ul.sub-menu a:hover {
    color: #91141b;
}
.recruiter_img{
	200px !important;
}
.text-block{
	text-align:justify;
}
.table_row_bold .column-1{
/* 	font-weight:600; */
}
.tablepress{
	    border: 1px solid #dfdfdf !Important;
}

h2 em {
  font-style: normal !important;
}		</style>
		<style type="text/css" data-type="vc_shortcodes-default-css">.vc_do_custom_heading{margin-bottom:0.625rem;margin-top:0;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1743410564552{background-color: #E8E8E8 !important;}.vc_custom_1767926910876{margin-top: -50px !important;}</style><noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>		<script type="text/javascript">
			var themeUrl = "wp-content/themes/aku/index.php";
		</script>



	<link rel='stylesheet' id='vc_animate-css-css' href='assets/css/animate.mine097.css' media='all' />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href='assets/css/custom-header.css' rel='stylesheet'>
<link href='assets/css/custom-header.css' rel='stylesheet'>
</head>

	<body class="home wp-singular page-template page-template-pages page-template-home-page page-template-pageshome-page-php page page-id-7 wp-custom-logo wp-theme-aku no-sidebar wpb-js-composer js-comp-ver-8.7.2 vc_responsive">
				<div id="page" class="site-main">
			<a class="skip-link screen-reader-text" href="#primary">Skip to content</a>

			<header id="masthead" class="site-header">
				<div class="top-header">
<!-- 	   <div class="uk-container">
	    <div class="top-header-content d-flex justify-content-between align-items-center flex-wrap">  
	        <div class="top-header-left">
	            <div class="menu-top-menu-container"><ul id="top-menu" class="navbar-nav"><li id="menu-item-264" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-264"><a href="iqac.php">IQAC</a>
<ul class="sub-menu">
	<li id="menu-item-577" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-577"><a href="http://naac.gov.in/index.php/en/">NAAC</a></li>
	<li id="menu-item-578" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-578"><a href="https://www.nirfindia.org/Rankings/2024/Ranking.html">NIRF</a></li>
	<li id="menu-item-579" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-579"><a href="https://dashboard.aishe.gov.in/hedirectory/#/institutionDirectory/universityDetails/U/ALL">AISHE</a></li>
	<li id="menu-item-580" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-580"><a href="https://aiira.iastate.edu/">AIIRA</a></li>
	<li id="menu-item-259" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-259"><a href="mandatory-disclosers.php">Mandatory Disclosers</a></li>
</ul>
</li>
<li id="menu-item-269" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-269"><a href="rti-act.php">RTI Act</a></li>
<li id="menu-item-1620" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1620"><a href="https://samadhaan.ugc.ac.in/">UGC e-Samadhan</a></li>
</ul></div>	        </div>
	        <div class="top-header-right">
	            <a class="online-payment" href="#">Online Payment</a>
				<a href="tel:+ 180030026072">     <span class="text-20">Toll Free No: 180030026072</span>  </a>

	        </div>
	    </div>
	</div> -->
<div class="uk-container">
    <div class="top-header-content d-flex justify-content-between align-items-center flex-wrap">  
        
        <div class="top-header-left">
            <div class="menu-top-menu-container"><ul id="top-menu" class="navbar-nav"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-264"><a href="iqac.php">IQAC</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-577"><a href="http://naac.gov.in/index.php/en/">NAAC</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-578"><a href="https://www.nirfindia.org/Rankings/2024/Ranking.html">NIRF</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-579"><a href="https://dashboard.aishe.gov.in/hedirectory/#/institutionDirectory/universityDetails/U/ALL">AISHE</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-580"><a href="https://aiira.iastate.edu/">AIIRA</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-259"><a href="mandatory-disclosers.php">Mandatory Disclosers</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-269"><a href="rti-act.php">RTI Act</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1620"><a href="https://samadhaan.ugc.ac.in/">UGC e-Samadhan</a></li>
</ul></div>        </div>

        <div class="top-header-right">
            <!-- Phone Number -->
            <div class="phone-number-wrap">
                <a href="tel:+180030026072" class="phone-number">
                    <span class="text-20">Toll Free No: 180030026072</span>
                </a>
            </div>

            <!-- Social Media Icons -->
            <div class="social-icons-wrap">
                <a href="https://www.facebook.com/DR.APJAK.University" target="_blank" class="social-icon facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/drapjaku_universityindore/" target="_blank" class="social-icon instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://x.com/APJ_University" target="_blank" class="social-icon twitter">
                    <i class="fab fa-x"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCHuwjAPSYLsThbZldaC75_A" target="_blank" class="social-icon youtube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://www.linkedin.com/in/akuniversityindore/" target="_blank" class="social-icon linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>


    <!--                    <div class="social-icons-wrap">
              <a href="https://www.instagram.com/drapjaku_universityindore/" target="_blank" class="social-icon instagram">
        <img src="assets/images/facebook.png" alt="Instagram">
    </a>
                    
    <a href="https://www.instagram.com/drapjaku_universityindore/" target="_blank" class="social-icon instagram">
        <img src="assets/images/instagram.png" alt="Instagram">
    </a>

   <a href="https://www.instagram.com/drapjaku_universityindore/" target="_blank" class="social-icon instagram">
        <img src="assets/images/x.png" alt="Twitter">
    </a>
                  
                 <a href="https://www.instagram.com/drapjaku_universityindore/" target="_blank" class="social-icon instagram">
        <img src="assets/images/youtube.png" alt="Youtube">
    </a> 
      <a href="https://www.instagram.com/drapjaku_universityindore/" target="_blank" class="social-icon instagram">
        <img src="assets/images/linkedin.png" alt="Instagram">
    </a>
            </div> -->
        </div>
    </div>
</div>
	</div>

				<div class="uk-container">
					<div class="center-header-content d-flex justify-content-between align-items-center flex-wrap py-3">



						<div class="site-branding ">
							<a href="index.php" class="custom-logo-link" rel="home" aria-current="page"><img src="assets/images/logo-1.svg" class="custom-logo" alt="Dr APJ University Indore" decoding="async" /></a>
						</div><!-- .site-branding -->
						
						<div class="admission">
						 
				
	           
     				<a href="https://www.universitymanagementsystem.in/aku/Home/Dashboard" class="btn btn-outline">
       				 <span class="btn-text">Document Verify</span> 
       				 
    				</a>
    				 <a href="https://login.rssrcampusconnect.com/" class="btn btn-green">
        			<span class="btn-text">Login</span> 
        			<span class="btn-arrow">
           		 <i class="fa-solid fa-user"></i>
        		</span>
    			</a>
    			<!-- <a href="#" class="btn btn-green">
	                <span class="btn-text">Apply Now</span> 
	                <span class="btn-arrow">
	                    <i class="fa-solid fa-arrow-right"></i>
	                </span>
	            </a> -->
						</div>
		<button class="menu-toggle" type="button" uk-toggle="target: #offcanvas-slide; cls:show; animation: uk-animation-fade"><i class="fa-solid fa-bars fa-fw"></i></button>

					<!-- <div class="open-admisssion">
							<img src="assets/images/admission-open-img.png" alt="">
					</div> -->
				<div class="open-admisssion">
	<a href="https://yourdomain.com/apply-now" target="_blank" class="btn-image-link">
		<img src="assets/images/admission-open-img.png" alt="Apply Now">
	</a>
</div>

						
					</div>
				</div>
							
				<div class="main-menu-section">
					
					<div class="uk-container">
						
						<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg bg-white w-100 p-0">
						

							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarNav"><ul id="primary-menu" class="navbar-nav w-100 justify-content-between"><li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item menu-item-18"><a href="index.php" aria-current="page">Home</a></li>
<li id="menu-item-836" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-836"><a href="#">About Us</a>
<ul class="sub-menu">
	<li id="menu-item-837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837"><a href="why-aku.php">Why AKU</a></li>
	<li id="menu-item-2765" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2765"><a href="the-founder-2.php">The Founder</a></li>
	<li id="menu-item-2476" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2476"><a href="#">Leadership</a>
	<ul class="sub-menu">
		<li id="menu-item-1049" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1049"><a href="the-chancellor.php">Chancellor</a></li>
		<li id="menu-item-4337" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4337"><a href="pro-chancellor.php">Pro Chancellor</a></li>
		<li id="menu-item-1050" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1050"><a href="the-vice-chancellor.php">Vice Chancellor</a></li>
		<li id="menu-item-215" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-215"><a href="registrar.php">Registrar</a></li>
	</ul>
</li>
	<li id="menu-item-213" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-213"><a href="governing-body.php">Governing Body</a></li>
	<li id="menu-item-234" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-234"><a href="board-of-management.php">Board of Management</a></li>
	<li id="menu-item-235" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-235"><a href="finance-committee.php">Finance Committee</a></li>
	<li id="menu-item-2483" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2483"><a href="mandatory-disclosers.php">Mandatory Disclosers</a></li>
	<li id="menu-item-236" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-236"><a href="awardsand-recognigation.php">Awards and Recognition</a></li>
	<li id="menu-item-238" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-238"><a href="aku-in-media.php">AKU in Media</a></li>
</ul>
</li>
<li id="menu-item-1270" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1270"><a href="academic-calendar.php">Academic Calendar</a></li>
<li id="menu-item-65" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-65"><a href="#">Faculty</a>
<ul class="sub-menu">
	<li id="menu-item-286" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-286"><a href="#">Faculty of Engineering</a>
	<ul class="sub-menu">
		<li id="menu-item-1870" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1870"><a href="#">College of Engineering</a>
		<ul class="sub-menu">
			<li id="menu-item-1866" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1866"><a href="department-of-civil-engineering.php">Department of Civil Engineering</a></li>
			<li id="menu-item-1829" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1829"><a href="department-of-computer-science-engineering.php">Department of Computer Science &#038; Engineering</a></li>
			<li id="menu-item-2681" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2681"><a href="department-of-information-technology.php">Department of Information Technology</a></li>
			<li id="menu-item-1865" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1865"><a href="department-of-electrical-electronics-engineering.php">Department of Electrical &#038; Electronics Engineering</a></li>
			<li id="menu-item-1867" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1867"><a href="department-of-mechanical-engineering.php">Department of Mechanical Engineering</a></li>
			<li id="menu-item-2696" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2696"><a href="department-of-management-studies-coe.php">Department of Management Studies &#8211; COE</a></li>
			<li id="menu-item-2827" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2827"><a href="department-of-computer-applications-coe.php">Department of Computer Applications</a></li>
		</ul>
</li>
		<li id="menu-item-1871" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1871"><a href="#">School of Engineering</a>
		<ul class="sub-menu">
			<li id="menu-item-2833" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2833"><a href="diploma-in-enginering.php">Diploma in Engineering</a></li>
			<li id="menu-item-1872" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1872"><a href="department-of-computer-science-engineering-soe.php">Department of Computer Science &#038; Engineering</a></li>
			<li id="menu-item-2177" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2177"><a href="department-of-electrical-electronics-engineering-soe.php">Department of Electrical &#038; Electronics Engineering</a></li>
			<li id="menu-item-2176" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2176"><a href="department-of-civil-engineering-soe.php">Department of Civil Engineering</a></li>
			<li id="menu-item-2175" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2175"><a href="department-of-mechanical-engineering-soe.php">Department of Mechanical Engineering</a></li>
		</ul>
</li>
		<li id="menu-item-2626" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2626"><a href="#">College of Polytechnic Engineering</a>
		<ul class="sub-menu">
			<li id="menu-item-2697" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2697"><a href="department-of-civil-engineering-polytechnic.php">Department of Civil Engineering</a></li>
			<li id="menu-item-2710" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2710"><a href="department-of-mechanical-engineering-polytechnic.php">Department of Mechanical Engineering</a></li>
			<li id="menu-item-2711" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2711"><a href="department-of-civil-engineering-polytechnic.php">Department of Civil Engineering</a></li>
		</ul>
</li>
	</ul>
</li>
	<li id="menu-item-292" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-292"><a href="#">Faculty of Health Science</a>
	<ul class="sub-menu">
		<li id="menu-item-2791" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2791"><a href="#">School of Pharmacy</a>
		<ul class="sub-menu">
			<li id="menu-item-2000" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2000"><a href="department-of-pharmacy-sop.php">Department of Pharmacy</a></li>
		</ul>
</li>
		<li id="menu-item-1311" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1311"><a href="college-of-pharmacy.php">College of Pharmacy</a>
		<ul class="sub-menu">
			<li id="menu-item-1924" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1924"><a href="department-of-pharmacy.php">Department of Pharmacy</a></li>
		</ul>
</li>
		<li id="menu-item-1310" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1310"><a href="institute-of-pharmacy.php">Institute Of Pharmacy</a>
		<ul class="sub-menu">
			<li id="menu-item-2004" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2004"><a href="department-of-pharmacy-iop.php">Department of Pharmacy</a></li>
		</ul>
</li>
	</ul>
</li>
	<li id="menu-item-287" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-287"><a href="#">College of Professional Studies</a>
	<ul class="sub-menu">
		<li id="menu-item-1284" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1284"><a href="school-of-business-administration-management.php">College of Management</a>
		<ul class="sub-menu">
			<li id="menu-item-1949" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1949"><a href="department-of-management-studies.php">Department of Management Studies</a></li>
		</ul>
</li>
		<li id="menu-item-1943" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1943"><a href="#">College of Commerce</a>
		<ul class="sub-menu">
			<li id="menu-item-1942" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1942"><a href="department-of-commerce.php">Department Of Commerce</a></li>
		</ul>
</li>
		<li id="menu-item-1950" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1950"><a href="#">College of Arts and Humanities</a>
		<ul class="sub-menu">
			<li id="menu-item-1930" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1930"><a href="department-of-arts.php">Department of Arts, Commerce &#038; Social Sciences</a></li>
		</ul>
</li>
		<li id="menu-item-1958" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1958"><a href="#">College of Life Science</a>
		<ul class="sub-menu">
			<li id="menu-item-1978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1978"><a href="department-of-science.php">Department of Science</a></li>
		</ul>
</li>
		<li id="menu-item-2008" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2008"><a href="#">School of Agricultural Sciences</a>
		<ul class="sub-menu">
			<li id="menu-item-1905" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1905"><a href="department-of-agriculture.php">Department of Agriculture</a></li>
		</ul>
</li>
		<li id="menu-item-1955" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1955"><a href="#">College of Education</a>
		<ul class="sub-menu">
			<li id="menu-item-1956" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1956"><a href="department-of-education.php">Department of Education</a></li>
		</ul>
</li>
		<li id="menu-item-2741" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2741"><a href="#">College of Computer Application</a>
		<ul class="sub-menu">
			<li id="menu-item-2695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2695"><a href="department-of-computer-applications-coe.php">Department of Computer Applications</a></li>
		</ul>
</li>
		<li id="menu-item-1982" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1982"><a href="#">College of Legal Studies</a>
		<ul class="sub-menu">
			<li id="menu-item-1911" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1911"><a href="department-of-law.php">Department Of Law</a></li>
		</ul>
</li>
	</ul>
</li>
	<li id="menu-item-293" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-293"><a href="#">Faculty of Medical Scrience</a>
	<ul class="sub-menu">
		<li id="menu-item-1957" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1957"><a href="https://rnkmamc.in/">School of Ayurveda &#038; Panchkarma</a></li>
		<li id="menu-item-1277" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1277"><a href="https://rnkmhmc.in/">School of Homeopathy</a></li>
	</ul>
</li>
</ul>
</li>
<li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-66"><a href="#">Examination</a>
<ul class="sub-menu">
	<li id="menu-item-384" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-384"><a href="about-the-section.php">About The Section</a></li>
	<li id="menu-item-2317" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2317"><a href="examination-committee.php">Examination Committee</a></li>
	<li id="menu-item-389" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-389"><a href="exam-policy.php">Examination Policy</a></li>
	<li id="menu-item-388" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-388"><a href="exam-code.php">Examination Code</a></li>
	<li id="menu-item-391" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-391"><a href="examination-calendar.php">Examination Schedule</a></li>
	<li id="menu-item-394" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-394"><a href="old-question-papers.php">Old Question Papers</a></li>
	<li id="menu-item-396" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-396"><a href="results.php">Results</a></li>
	<li id="menu-item-386" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-386"><a href="convocation.php">Convocation</a></li>
	<li id="menu-item-387" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-387"><a href="digi-locker-nad-gov-in.php">Digi Locker (nad.gov.in)</a></li>
	<li id="menu-item-385" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-385"><a href="admit-card-download.php">Admit Card Download</a></li>
	<li id="menu-item-393" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-393"><a href="forms.php">Forms</a></li>
	<li id="menu-item-4247" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4247"><a href="exam-notice.php">Exam Notice</a></li>
</ul>
</li>
<li id="menu-item-67" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-67"><a href="#">Committees</a>
<ul class="sub-menu">
	<li id="menu-item-2865" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2865"><a href="anti-reggiging-committee.php">Anti Ragging  Committee</a></li>
	<li id="menu-item-2403" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2403"><a href="academic-committee.php">Academic Committee</a></li>
	<li id="menu-item-2398" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2398"><a href="staff-selection-screening-committee.php">Cultruaral Committee</a></li>
	<li id="menu-item-2400" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2400"><a href="employee-grievance-wellfare-cell.php">Employee Grievance/ Wellfare Cell</a></li>
	<li id="menu-item-2397" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2397"><a href="equalization-committee.php">Equalization Committee</a></li>
	<li id="menu-item-2449" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2449"><a href="infrastructure-campus-beautification-committee.php">Infrastructure /Campus Beautification Committee</a></li>
	<li id="menu-item-2316" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2316"><a href="regulatory-committee.php">Regulatory Committee</a></li>
	<li id="menu-item-2342" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2342"><a href="management-information-system-erp-committee.php">Management Information System/ERP Committee</a></li>
	<li id="menu-item-2404" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2404"><a href="library-committee.php">Library Committee</a></li>
	<li id="menu-item-2399" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2399"><a href="womens-grievance-redressal-and-welfare-cell.php">Women’s Grievance Redressal and Welfare Cell</a></li>
	<li id="menu-item-2396" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2396"><a href="jan-aushadhi-committee.php">Jan Aushadhi Committee</a></li>
	<li id="menu-item-2426" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2426"><a href="fdp-committee.php">Faculty Development Programme (FDP) Committee</a></li>
	<li id="menu-item-2395" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2395"><a href="purchase-committee.php">Purchase Committee</a></li>
	<li id="menu-item-2466" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2466"><a href="intellectual-property-rights-cell-ipr-cell.php">Intellectual Property Rights Cell (IPR Cell)</a></li>
	<li id="menu-item-416" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-416"><a href="icc.php">Internal Complaint Committee (ICC)</a></li>
	<li id="menu-item-419" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-419"><a href="sprots-committee.php">Sports Committee</a></li>
</ul>
</li>
<li id="menu-item-68" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-68"><a href="#">Admissions</a>
<ul class="sub-menu">
	<li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-440"><a href="admission-assistance.php">Admission Assistance</a></li>
	<li id="menu-item-441" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-441"><a href="admission-procedure.php">Admission Procedure</a></li>
	<li id="menu-item-413" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-413"><a href="admission-committee.php">Admission Committee</a></li>
	<li id="menu-item-442" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-442"><a href="faqs.php">FAQs</a></li>
	<li id="menu-item-443" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-443"><a href="fee-structure.php">Fee Structure</a></li>
	<li id="menu-item-444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-444"><a href="general-rules-and-regulations.php">General Rules and Regulations</a></li>
	<li id="menu-item-445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-445"><a href="hostel-rules-regulations.php">Hostel Rules &#038; Regulations</a></li>
	<li id="menu-item-446" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-446"><a href="scholarships.php">Scholarships</a></li>
	<li id="menu-item-447" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-447"><a href="download-form.php">Download Form</a></li>
</ul>
</li>
<li id="menu-item-69" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-69"><a href="#">Placements</a>
<ul class="sub-menu">
	<li id="menu-item-886" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-886"><a href="our-recruiters.php">Our Recruiters</a></li>
	<li id="menu-item-889" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-889"><a href="placement-cell.php">Placement Cell</a></li>
	<li id="menu-item-901" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-901"><a href="corporate-interaction.php">Corporate Interaction</a></li>
	<li id="menu-item-2245" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2245"><a href="visits-events.php">Visits/Events</a></li>
	<li id="menu-item-2318" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2318"><a href="tp-industry.php">T&#038;P/Industry/ Institution (National and International) Linkage Committee</a></li>
	<li id="menu-item-4402" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4402"><a href="placement-chart.php">Placement Chart</a></li>
</ul>
</li>
<li id="menu-item-70" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-70"><a href="#">Research</a>
<ul class="sub-menu">
	<li id="menu-item-2210" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2210"><a href="ugc-recognition.php">UGC Recognition</a></li>
	<li id="menu-item-2153" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2153"><a href="#">Research Areas</a></li>
	<li id="menu-item-417" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-417"><a href="research-committee.php">Research and Development Committee</a></li>
	<li id="menu-item-2209" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2209"><a href="fees-details.php">Fees Details</a></li>
	<li id="menu-item-3321" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3321"><a href="ph-d-selection-process.php">Ph.D. Selection Process</a></li>
	<li id="menu-item-2156" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2156"><a href="#">E-Resources</a>
	<ul class="sub-menu">
		<li id="menu-item-3286" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3286"><a href="https://jiips.in/">JIIPS</a></li>
		<li id="menu-item-3287" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3287"><a href="https://jier.co.in/">JIER</a></li>
	</ul>
</li>
	<li id="menu-item-4040" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4040"><a href="faculty-publications.php">Faculty Publications</a></li>
	<li id="menu-item-2158" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2158"><a href="#">Students Publication</a></li>
	<li id="menu-item-2159" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2159"><a href="#">Patents</a></li>
	<li id="menu-item-2160" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2160"><a href="#">Consultancy</a></li>
	<li id="menu-item-2161" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2161"><a href="#">Funded Projects</a></li>
	<li id="menu-item-2162" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2162"><a href="#">Seed Money/ Grants</a></li>
	<li id="menu-item-2163" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2163"><a href="#">Ph.D. Awarded</a></li>
	<li id="menu-item-2164" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2164"><a href="#">Photos</a></li>
	<li id="menu-item-2165" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2165"><a href="#">Ph.D. Entrance Result</a></li>
	<li id="menu-item-2166" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2166"><a href="assets/images/PhD-Application-Form-session-2025-2026.pdf">Downloads</a></li>
</ul>
</li>
<li id="menu-item-71" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-71"><a href="#">Student Zone</a>
<ul class="sub-menu">
	<li id="menu-item-1663" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1663"><a href="notice-board.php">Notice Board</a></li>
	<li id="menu-item-2841" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2841"><a href="#">Committees</a>
	<ul class="sub-menu">
		<li id="menu-item-2328" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2328"><a href="student-grievance-cell.php">Student Grievance Cell</a></li>
		<li id="menu-item-418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-418"><a href="sc-st-committee.php">SC/ST Committee</a></li>
		<li id="menu-item-2465" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2465"><a href="scholarship-committee.php">Scholarship Committee</a></li>
		<li id="menu-item-420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-420"><a href="transport-committee.php">Hostel/Canteen/ Mess/Transport Committee</a></li>
	</ul>
</li>
	<li id="menu-item-2168" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2168"><a href="#">Students Club</a></li>
	<li id="menu-item-2169" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2169"><a href="#">Student Career Counselling</a></li>
	<li id="menu-item-2170" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2170"><a href="#">Skill Enhancement Activities</a></li>
	<li id="menu-item-2171" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2171"><a href="#">Student Welfare</a></li>
	<li id="menu-item-4233" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4233"><a href="download-form-student.php">Download Form</a></li>
	<li id="menu-item-3804" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3804"><a href="sgrc.php">SGRC</a></li>
	<li id="menu-item-4234" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4234"><a href="incubation-center.php">Incubation Center</a></li>
	<li id="menu-item-2467" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2467"><a href="ncc-nss-cell.php">NCC/NSS Cell</a></li>
	<li id="menu-item-2174" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2174"><a href="#">Alumani</a>
	<ul class="sub-menu">
		<li id="menu-item-2405" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2405"><a href="alumini-committee.php">Alumini Committee</a></li>
	</ul>
</li>
	<li id="menu-item-4252" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4252"><a href="student-holiday-calender.php">Student Holiday Calender</a></li>
</ul>
</li>
<li id="menu-item-2486" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2486"><a href="#">Event</a>
<ul class="sub-menu">
	<li id="menu-item-3193" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3193"><a href="galleries.php">Gallery</a></li>
	<li id="menu-item-226" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-226"><a href="visiters-testomonials.php">Visiters Testomonials</a></li>
	<li id="menu-item-218" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-218"><a href="students-testomonials.php">Students Testomonials</a></li>
</ul>
</li>
<li id="menu-item-228" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-228"><a href="world-class-infrastructure.php">Life @ AKU</a></li>
</ul></div></div></nav><!-- #site-navigation -->
						 
					</div>
				</div>
			</header><!-- #masthead -->


			<!-- Sidebar -->
			<div id="offcanvas-slide" uk-offcanvas="overlay: true">
				<div class="uk-offcanvas-bar  mobile-menu">

					<div class="menu-main-menu-container"><ul id="primary-menu" class="mobile-nav"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item menu-item-18"><a href="index.php" aria-current="page">Home</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-836"><a href="#">About Us</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-837"><a href="why-aku.php">Why AKU</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2765"><a href="the-founder-2.php">The Founder</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2476"><a href="#">Leadership</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1049"><a href="the-chancellor.php">Chancellor</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4337"><a href="pro-chancellor.php">Pro Chancellor</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1050"><a href="the-vice-chancellor.php">Vice Chancellor</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-215"><a href="registrar.php">Registrar</a></li>
	</ul>
</li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-213"><a href="governing-body.php">Governing Body</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-234"><a href="board-of-management.php">Board of Management</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-235"><a href="finance-committee.php">Finance Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2483"><a href="mandatory-disclosers.php">Mandatory Disclosers</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-236"><a href="awardsand-recognigation.php">Awards and Recognition</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-238"><a href="aku-in-media.php">AKU in Media</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1270"><a href="academic-calendar.php">Academic Calendar</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-65"><a href="#">Faculty</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-286"><a href="#">Faculty of Engineering</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1870"><a href="#">College of Engineering</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1866"><a href="department-of-civil-engineering.php">Department of Civil Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1829"><a href="department-of-computer-science-engineering.php">Department of Computer Science &#038; Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2681"><a href="department-of-information-technology.php">Department of Information Technology</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1865"><a href="department-of-electrical-electronics-engineering.php">Department of Electrical &#038; Electronics Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1867"><a href="department-of-mechanical-engineering.php">Department of Mechanical Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2696"><a href="department-of-management-studies-coe.php">Department of Management Studies &#8211; COE</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2827"><a href="department-of-computer-applications-coe.php">Department of Computer Applications</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1871"><a href="#">School of Engineering</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2833"><a href="diploma-in-enginering.php">Diploma in Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1872"><a href="department-of-computer-science-engineering-soe.php">Department of Computer Science &#038; Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2177"><a href="department-of-electrical-electronics-engineering-soe.php">Department of Electrical &#038; Electronics Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2176"><a href="department-of-civil-engineering-soe.php">Department of Civil Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2175"><a href="department-of-mechanical-engineering-soe.php">Department of Mechanical Engineering</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2626"><a href="#">College of Polytechnic Engineering</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2697"><a href="department-of-civil-engineering-polytechnic.php">Department of Civil Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2710"><a href="department-of-mechanical-engineering-polytechnic.php">Department of Mechanical Engineering</a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2711"><a href="department-of-civil-engineering-polytechnic.php">Department of Civil Engineering</a></li>
		</ul>
</li>
	</ul>
</li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-292"><a href="#">Faculty of Health Science</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2791"><a href="#">School of Pharmacy</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2000"><a href="department-of-pharmacy-sop.php">Department of Pharmacy</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1311"><a href="college-of-pharmacy.php">College of Pharmacy</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1924"><a href="department-of-pharmacy.php">Department of Pharmacy</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1310"><a href="institute-of-pharmacy.php">Institute Of Pharmacy</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2004"><a href="department-of-pharmacy-iop.php">Department of Pharmacy</a></li>
		</ul>
</li>
	</ul>
</li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-287"><a href="#">College of Professional Studies</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1284"><a href="school-of-business-administration-management.php">College of Management</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1949"><a href="department-of-management-studies.php">Department of Management Studies</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1943"><a href="#">College of Commerce</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1942"><a href="department-of-commerce.php">Department Of Commerce</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1950"><a href="#">College of Arts and Humanities</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1930"><a href="department-of-arts.php">Department of Arts, Commerce &#038; Social Sciences</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1958"><a href="#">College of Life Science</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1978"><a href="department-of-science.php">Department of Science</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2008"><a href="#">School of Agricultural Sciences</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1905"><a href="department-of-agriculture.php">Department of Agriculture</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1955"><a href="#">College of Education</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1956"><a href="department-of-education.php">Department of Education</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2741"><a href="#">College of Computer Application</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2695"><a href="department-of-computer-applications-coe.php">Department of Computer Applications</a></li>
		</ul>
</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1982"><a href="#">College of Legal Studies</a>
		<ul class="sub-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1911"><a href="department-of-law.php">Department Of Law</a></li>
		</ul>
</li>
	</ul>
</li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-293"><a href="#">Faculty of Medical Scrience</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1957"><a href="https://rnkmamc.in/">School of Ayurveda &#038; Panchkarma</a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1277"><a href="https://rnkmhmc.in/">School of Homeopathy</a></li>
	</ul>
</li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-66"><a href="#">Examination</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-384"><a href="about-the-section.php">About The Section</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2317"><a href="examination-committee.php">Examination Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-389"><a href="exam-policy.php">Examination Policy</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-388"><a href="exam-code.php">Examination Code</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-391"><a href="examination-calendar.php">Examination Schedule</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-394"><a href="old-question-papers.php">Old Question Papers</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-396"><a href="results.php">Results</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-386"><a href="convocation.php">Convocation</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-387"><a href="digi-locker-nad-gov-in.php">Digi Locker (nad.gov.in)</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-385"><a href="admit-card-download.php">Admit Card Download</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-393"><a href="forms.php">Forms</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4247"><a href="exam-notice.php">Exam Notice</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-67"><a href="#">Committees</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2865"><a href="anti-reggiging-committee.php">Anti Ragging  Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2403"><a href="academic-committee.php">Academic Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2398"><a href="staff-selection-screening-committee.php">Cultruaral Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2400"><a href="employee-grievance-wellfare-cell.php">Employee Grievance/ Wellfare Cell</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2397"><a href="equalization-committee.php">Equalization Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2449"><a href="infrastructure-campus-beautification-committee.php">Infrastructure /Campus Beautification Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2316"><a href="regulatory-committee.php">Regulatory Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2342"><a href="management-information-system-erp-committee.php">Management Information System/ERP Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2404"><a href="library-committee.php">Library Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2399"><a href="womens-grievance-redressal-and-welfare-cell.php">Women’s Grievance Redressal and Welfare Cell</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2396"><a href="jan-aushadhi-committee.php">Jan Aushadhi Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2426"><a href="fdp-committee.php">Faculty Development Programme (FDP) Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2395"><a href="purchase-committee.php">Purchase Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2466"><a href="intellectual-property-rights-cell-ipr-cell.php">Intellectual Property Rights Cell (IPR Cell)</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-416"><a href="icc.php">Internal Complaint Committee (ICC)</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-419"><a href="sprots-committee.php">Sports Committee</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-68"><a href="#">Admissions</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-440"><a href="admission-assistance.php">Admission Assistance</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-441"><a href="admission-procedure.php">Admission Procedure</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-413"><a href="admission-committee.php">Admission Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-442"><a href="faqs.php">FAQs</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-443"><a href="fee-structure.php">Fee Structure</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-444"><a href="general-rules-and-regulations.php">General Rules and Regulations</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-445"><a href="hostel-rules-regulations.php">Hostel Rules &#038; Regulations</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-446"><a href="scholarships.php">Scholarships</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-447"><a href="download-form.php">Download Form</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-69"><a href="#">Placements</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-886"><a href="our-recruiters.php">Our Recruiters</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-889"><a href="placement-cell.php">Placement Cell</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-901"><a href="corporate-interaction.php">Corporate Interaction</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2245"><a href="visits-events.php">Visits/Events</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2318"><a href="tp-industry.php">T&#038;P/Industry/ Institution (National and International) Linkage Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4402"><a href="placement-chart.php">Placement Chart</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-70"><a href="#">Research</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2210"><a href="ugc-recognition.php">UGC Recognition</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2153"><a href="#">Research Areas</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-417"><a href="research-committee.php">Research and Development Committee</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2209"><a href="fees-details.php">Fees Details</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3321"><a href="ph-d-selection-process.php">Ph.D. Selection Process</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2156"><a href="#">E-Resources</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3286"><a href="https://jiips.in/">JIIPS</a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3287"><a href="https://jier.co.in/">JIER</a></li>
	</ul>
</li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4040"><a href="faculty-publications.php">Faculty Publications</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2158"><a href="#">Students Publication</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2159"><a href="#">Patents</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2160"><a href="#">Consultancy</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2161"><a href="#">Funded Projects</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2162"><a href="#">Seed Money/ Grants</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2163"><a href="#">Ph.D. Awarded</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2164"><a href="#">Photos</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2165"><a href="#">Ph.D. Entrance Result</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2166"><a href="assets/images/PhD-Application-Form-session-2025-2026.pdf">Downloads</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-71"><a href="#">Student Zone</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1663"><a href="notice-board.php">Notice Board</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2841"><a href="#">Committees</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2328"><a href="student-grievance-cell.php">Student Grievance Cell</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-418"><a href="sc-st-committee.php">SC/ST Committee</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2465"><a href="scholarship-committee.php">Scholarship Committee</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-420"><a href="transport-committee.php">Hostel/Canteen/ Mess/Transport Committee</a></li>
	</ul>
</li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2168"><a href="#">Students Club</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2169"><a href="#">Student Career Counselling</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2170"><a href="#">Skill Enhancement Activities</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2171"><a href="#">Student Welfare</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4233"><a href="download-form-student.php">Download Form</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3804"><a href="sgrc.php">SGRC</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4234"><a href="incubation-center.php">Incubation Center</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2467"><a href="ncc-nss-cell.php">NCC/NSS Cell</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2174"><a href="#">Alumani</a>
	<ul class="sub-menu">
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2405"><a href="alumini-committee.php">Alumini Committee</a></li>
	</ul>
</li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4252"><a href="student-holiday-calender.php">Student Holiday Calender</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2486"><a href="#">Event</a>
<ul class="sub-menu">
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3193"><a href="galleries.php">Gallery</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-226"><a href="visiters-testomonials.php">Visiters Testomonials</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-218"><a href="students-testomonials.php">Students Testomonials</a></li>
</ul>
</li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-228"><a href="world-class-infrastructure.php">Life @ AKU</a></li>
</ul></div>				</div>
			</div>
	 
