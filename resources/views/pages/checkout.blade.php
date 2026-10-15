@extends('layouts.app')

@section('title', 'Finalizar compra | '.config('app.name'))
@section('body_class', 'woocommerce-checkout page')
<style>
    .wd-page-title-el .wd-page-title {
  border-radius:inherit
}
.wd-page-title-el.wd-stretched {
  position:relative;
  width:calc(100vw - var(--wd-scroll-w) - var(--wd-sticky-nav-w));
  inset-inline-start:calc(50% - 50vw + var(--wd-scroll-w)/2 + var(--wd-sticky-nav-w)/2)
}
.wd-page-title {
  --wd-align: start;
  --wd-title-sp: 15px;
  --wd-title-font-s: 36px;
  position:relative;
  padding-block:var(--wd-title-sp)
}
.wd-page-title .container {
  position:relative;
  display:flex;
  flex-direction:column;
  align-items:var(--wd-align);
  text-align:var(--wd-align);
  gap:10px
}
.wd-page-title .title {
  font-size:var(--wd-title-font-s);
  line-height:1.2;
  margin-bottom:0
}
.wd-page-title-bg img {
  width:100%;
  height:100%;
  object-fit:cover
}
.title-design-centered {
  --wd-align: center
}
@media(min-width: 1025px) {
  .title-size-small {
    --wd-title-sp: 20px;
    --wd-title-font-s: 44px
  }
  .title-size-default {
    --wd-title-sp: 60px;
    --wd-title-font-s: 68px
  }
  .title-size-large {
    --wd-title-sp: 100px;
    --wd-title-font-s: 78px
  }
}
.wd-page-title {
  --wd-align: start;
  --wd-title-sp: 15px;
  --wd-title-font-s: 36px;
  position:relative;
  padding-block:var(--wd-title-sp)
}
.wd-page-title .container {
  position:relative;
  display:flex;
  flex-direction:column;
  align-items:var(--wd-align);
  text-align:var(--wd-align);
  gap:10px
}
.wd-page-title .title {
  font-size:var(--wd-title-font-s);
  line-height:1.2;
  margin-bottom:0
}
.wd-page-title-bg img {
  width:100%;
  height:100%;
  object-fit:cover
}
.title-design-centered {
  --wd-align: center
}
@media(min-width: 1025px) {
  .title-size-small {
    --wd-title-sp: 20px;
    --wd-title-font-s: 44px
  }
  .title-size-default {
    --wd-title-sp: 60px;
    --wd-title-font-s: 68px
  }
  .title-size-large {
    --wd-title-sp: 100px;
    --wd-title-font-s: 78px
  }
}
.wd-checkout-form {
  --wd-row-gap: 20px;
  display:flex;
  flex-direction:column;
  row-gap:var(--wd-row-gap)
}
:root .wd-checkout-form>* {
  margin-bottom:0
}
[class*=__field-wrapper] {
  --wd-col: 4;
  --wd-gap: 20px;
  display:grid;
  grid-template-columns:repeat(var(--wd-col), minmax(0, 1fr));
  gap:var(--wd-gap)
}
[class*=__field-wrapper]>* {
  grid-column:auto/span var(--wd-col);
  margin-bottom:0;
  width:unset
}
@media(min-width: 1025px) {
  [class*=__field-wrapper]>:is(.form-row-first,
  .form-row-last) {
    --wd-col: 2
  }
}
:is(.wd-checkout-login,
.wd-checkout-coupon) {
  display:flex;
  flex-direction:column;
  align-items:var(--wd-align)
}
:is(.wd-checkout-login,
.wd-checkout-coupon) :is(.woocommerce-form-coupon-toggle,
.woocommerce-form-login-toggle)>div {
  margin-bottom:0;
  justify-content:var(--wd-align)
}
:is(.wd-checkout-login,
.wd-checkout-coupon) :is(.woocommerce-form-coupon,
.woocommerce-form-login.hidden-form) {
  width:100%;
  margin-block:20px 0
}
:is(.wd-checkout-login,
.wd-checkout-coupon)>[role=alert] {
  margin-block:20px 0
}
.wd-billing-details>*:not(:last-child) {
  margin-bottom:20px
}
.e-con .wd-billing-details>div>*:not(:last-child) {
  margin-bottom:20px
}
.wd-billing-details:not(.wd-title-show) .woocommerce-billing-fields>h3 {
  display:none
}
.wd-shipping-details>*:not(:last-child) {
  margin-bottom:20px
}
.e-con .wd-shipping-details>div>*:not(:last-child) {
  margin-bottom:20px
}
.wd-shipping-details:not(.wd-title-show) .woocommerce-additional-fields>h3 {
  display:none
}
.wd-payment-methods .place-order {
  display:flex;
  flex-direction:column
}
.wd-payment-methods #place_order {
  align-self:var(--wd-btn-align, start)
}

/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-page-checkout-builder.css */

/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/page-title.css */

/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/page-title.css */

/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/el-page-title-builder.css */

</style>

@section('content')

<head>
	<meta charset="UTF-8">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="../xmlrpc.php">

	<title>Finalizar compra &#8211; {{ config('app.name') }} | Materiales de Construcción, Jardín, Pérgolas, Piscinas y
		Equipamiento</title>
	<meta name='robots' content='max-image-preview:large, noindex, follow' />
	<link rel='dns-prefetch' href='http://cdn-reach.hostinger.com/' />
	<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
	<link rel="alternate" type="application/rss+xml"
		title="{{ config('app.name') }} | Materiales de Construcción, Jardín, Pérgolas, Piscinas y Equipamiento &raquo; Feed"
		href="../feed/index.html" />
	<link rel="alternate" type="application/rss+xml"
		title="{{ config('app.name') }} | Materiales de Construcción, Jardín, Pérgolas, Piscinas y Equipamiento &raquo; Feed de los comentarios"
		href="../comments/feed/index.html" />
	<link rel="alternate" title="{{ __('oEmbed (JSON)') }}" type="application/json+oembed"
		href="../wp-json/oembed/1.0/embedccb1.html?url=https%3A%2F%2Fnovaterra.pt%2Ffinalizar-compra%2F" />
	<link rel="alternate" title="{{ __('oEmbed (XML)') }}" type="text/xml+oembed"
		href="../wp-json/oembed/1.0/embed6f28.html?url=https%3A%2F%2Fnovaterra.pt%2Ffinalizar-compra%2F&amp;format=xml" />
	<style id="wp-img-auto-sizes-contain-inline-css">
		img:is([sizes=auto i], [sizes^="auto," i]) {
			contain-intrinsic-size: 3000px 1500px
		}

		/*# sourceURL=wp-img-auto-sizes-contain-inline-css */
	</style>
	<style id="global-styles-inline-css">
		:root {
			--wp--preset--aspect-ratio--square: 1;
			--wp--preset--aspect-ratio--4-3: 4/3;
			--wp--preset--aspect-ratio--3-4: 3/4;
			--wp--preset--aspect-ratio--3-2: 3/2;
			--wp--preset--aspect-ratio--2-3: 2/3;
			--wp--preset--aspect-ratio--16-9: 16/9;
			--wp--preset--aspect-ratio--9-16: 9/16;
			--wp--preset--color--black: #000000;
			--wp--preset--color--cyan-bluish-gray: #abb8c3;
			--wp--preset--color--white: #ffffff;
			--wp--preset--color--pale-pink: #f78da7;
			--wp--preset--color--vivid-red: #cf2e2e;
			--wp--preset--color--luminous-vivid-orange: #ff6900;
			--wp--preset--color--luminous-vivid-amber: #fcb900;
			--wp--preset--color--light-green-cyan: #7bdcb5;
			--wp--preset--color--vivid-green-cyan: #00d084;
			--wp--preset--color--pale-cyan-blue: #8ed1fc;
			--wp--preset--color--vivid-cyan-blue: #0693e3;
			--wp--preset--color--vivid-purple: #9b51e0;
			--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgb(6, 147, 227) 0%, rgb(155, 81, 224) 100%);
			--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
			--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgb(252, 185, 0) 0%, rgb(255, 105, 0) 100%);
			--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgb(255, 105, 0) 0%, rgb(207, 46, 46) 100%);
			--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
			--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
			--wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
			--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
			--wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
			--wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
			--wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
			--wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
			--wp--preset--font-size--small: 13px;
			--wp--preset--font-size--medium: 20px;
			--wp--preset--font-size--large: 36px;
			--wp--preset--font-size--x-large: 42px;
			--wp--preset--spacing--20: 0.44rem;
			--wp--preset--spacing--30: 0.67rem;
			--wp--preset--spacing--40: 1rem;
			--wp--preset--spacing--50: 1.5rem;
			--wp--preset--spacing--60: 2.25rem;
			--wp--preset--spacing--70: 3.38rem;
			--wp--preset--spacing--80: 5.06rem;
			--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
			--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--outlined: 6px 6px 0px -3px rgb(255, 255, 255), 6px 6px rgb(0, 0, 0);
			--wp--preset--shadow--crisp: 6px 6px 0px rgb(0, 0, 0);
		}

		.wp-block-button {
			--wp--preset--dimension--25: 25%;
			--wp--preset--dimension--50: 50%;
			--wp--preset--dimension--75: 75%;
			--wp--preset--dimension--100: 100%;
		}

		:where(body) {
			margin: 0;
		}

		.wp-site-blocks>.alignleft {
			float: left;
			margin-right: 2em;
		}

		.wp-site-blocks>.alignright {
			float: right;
			margin-left: 2em;
		}

		.wp-site-blocks>.aligncenter {
			justify-content: center;
			margin-left: auto;
			margin-right: auto;
		}

		:where(.is-layout-flex) {
			gap: 0.5em;
		}

		:where(.is-layout-grid) {
			gap: 0.5em;
		}

		.is-layout-flow>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		.is-layout-flow>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		.is-layout-flow>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		.is-layout-constrained>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		.is-layout-constrained>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		.is-layout-constrained>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		.is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-flex {
			display: flex;
		}

		.is-layout-flex {
			flex-wrap: wrap;
			align-items: center;
		}

		.is-layout-flex> :is(*, div) {
			margin: 0;
		}

		body .is-layout-grid {
			display: grid;
		}

		.is-layout-grid> :is(*, div) {
			margin: 0;
		}

		body {
			padding-top: 0px;
			padding-right: 0px;
			padding-bottom: 0px;
			padding-left: 0px;
		}

		a:where(:not(.wp-element-button)) {
			text-decoration: none;
		}

		:root :where(.wp-element-button, .wp-block-button__link) {
			background-color: #32373c;
			border-width: 0;
			color: #fff;
			font-family: inherit;
			font-size: inherit;
			font-style: inherit;
			font-weight: inherit;
			letter-spacing: inherit;
			line-height: inherit;
			padding-top: calc(0.667em + 2px);
			padding-right: calc(1.333em + 2px);
			padding-bottom: calc(0.667em + 2px);
			padding-left: calc(1.333em + 2px);
			text-decoration: none;
			text-transform: inherit;
		}

		.has-black-color {
			color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-color {
			color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-color {
			color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-color {
			color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-color {
			color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-color {
			color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-color {
			color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-color {
			color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-color {
			color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-color {
			color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-color {
			color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-color {
			color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-background-color {
			background-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-background-color {
			background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-background-color {
			background-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-background-color {
			background-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-background-color {
			background-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-background-color {
			background-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-background-color {
			background-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-background-color {
			background-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-background-color {
			background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-background-color {
			background-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-border-color {
			border-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-border-color {
			border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-border-color {
			border-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-border-color {
			border-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-border-color {
			border-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-border-color {
			border-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-border-color {
			border-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-border-color {
			border-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-border-color {
			border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-border-color {
			border-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-vivid-cyan-blue-to-vivid-purple-gradient-background {
			background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
		}

		.has-light-green-cyan-to-vivid-green-cyan-gradient-background {
			background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
		}

		.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-orange-to-vivid-red-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
		}

		.has-very-light-gray-to-cyan-bluish-gray-gradient-background {
			background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
		}

		.has-cool-to-warm-spectrum-gradient-background {
			background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
		}

		.has-blush-light-purple-gradient-background {
			background: var(--wp--preset--gradient--blush-light-purple) !important;
		}

		.has-blush-bordeaux-gradient-background {
			background: var(--wp--preset--gradient--blush-bordeaux) !important;
		}

		.has-luminous-dusk-gradient-background {
			background: var(--wp--preset--gradient--luminous-dusk) !important;
		}

		.has-pale-ocean-gradient-background {
			background: var(--wp--preset--gradient--pale-ocean) !important;
		}

		.has-electric-grass-gradient-background {
			background: var(--wp--preset--gradient--electric-grass) !important;
		}

		.has-midnight-gradient-background {
			background: var(--wp--preset--gradient--midnight) !important;
		}

		.has-small-font-size {
			font-size: var(--wp--preset--font-size--small) !important;
		}

		.has-medium-font-size {
			font-size: var(--wp--preset--font-size--medium) !important;
		}

		.has-large-font-size {
			font-size: var(--wp--preset--font-size--large) !important;
		}

		.has-x-large-font-size {
			font-size: var(--wp--preset--font-size--x-large) !important;
		}

		:root :where(.wp-block-icon svg) {
			width: 24px;
		}

		:where(.wp-block-gallery.is-layout-flex) {
			gap: var(--wp--style--gallery-gap-default, var(--gallery-block--gutter-size, var(--wp--style--block-gap, 0.5em)));
		}

		:where(.wp-block-gallery.is-layout-grid) {
			gap: var(--wp--style--gallery-gap-default, var(--gallery-block--gutter-size, var(--wp--style--block-gap, 0.5em)));
		}

		:where(.wp-block-latest-posts.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-latest-posts.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-term-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-term-template.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		:root :where(.wp-block-pullquote) {
			font-size: 1.5em;
			line-height: 1.6;
		}

		:root {
			--wp--preset--aspect-ratio--square: 1;
			--wp--preset--aspect-ratio--4-3: 4/3;
			--wp--preset--aspect-ratio--3-4: 3/4;
			--wp--preset--aspect-ratio--3-2: 3/2;
			--wp--preset--aspect-ratio--2-3: 2/3;
			--wp--preset--aspect-ratio--16-9: 16/9;
			--wp--preset--aspect-ratio--9-16: 9/16;
			--wp--preset--color--black: #000000;
			--wp--preset--color--cyan-bluish-gray: #abb8c3;
			--wp--preset--color--white: #ffffff;
			--wp--preset--color--pale-pink: #f78da7;
			--wp--preset--color--vivid-red: #cf2e2e;
			--wp--preset--color--luminous-vivid-orange: #ff6900;
			--wp--preset--color--luminous-vivid-amber: #fcb900;
			--wp--preset--color--light-green-cyan: #7bdcb5;
			--wp--preset--color--vivid-green-cyan: #00d084;
			--wp--preset--color--pale-cyan-blue: #8ed1fc;
			--wp--preset--color--vivid-cyan-blue: #0693e3;
			--wp--preset--color--vivid-purple: #9b51e0;
			--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgb(6, 147, 227) 0%, rgb(155, 81, 224) 100%);
			--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
			--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgb(252, 185, 0) 0%, rgb(255, 105, 0) 100%);
			--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgb(255, 105, 0) 0%, rgb(207, 46, 46) 100%);
			--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
			--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
			--wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
			--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
			--wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
			--wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
			--wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
			--wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
			--wp--preset--font-size--small: 13px;
			--wp--preset--font-size--medium: 20px;
			--wp--preset--font-size--large: 36px;
			--wp--preset--font-size--x-large: 42px;
			--wp--preset--spacing--20: 0.44rem;
			--wp--preset--spacing--30: 0.67rem;
			--wp--preset--spacing--40: 1rem;
			--wp--preset--spacing--50: 1.5rem;
			--wp--preset--spacing--60: 2.25rem;
			--wp--preset--spacing--70: 3.38rem;
			--wp--preset--spacing--80: 5.06rem;
			--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
			--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--outlined: 6px 6px 0px -3px rgb(255, 255, 255), 6px 6px rgb(0, 0, 0);
			--wp--preset--shadow--crisp: 6px 6px 0px rgb(0, 0, 0);
		}

		.wp-block-button {
			--wp--preset--dimension--25: 25%;
			--wp--preset--dimension--50: 50%;
			--wp--preset--dimension--75: 75%;
			--wp--preset--dimension--100: 100%;
		}

		:where(body) {
			margin: 0;
		}

		.wp-site-blocks>.alignleft {
			float: left;
			margin-right: 2em;
		}

		.wp-site-blocks>.alignright {
			float: right;
			margin-left: 2em;
		}

		.wp-site-blocks>.aligncenter {
			justify-content: center;
			margin-left: auto;
			margin-right: auto;
		}

		:where(.is-layout-flex) {
			gap: 0.5em;
		}

		:where(.is-layout-grid) {
			gap: 0.5em;
		}

		.is-layout-flow>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		.is-layout-flow>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		.is-layout-flow>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		.is-layout-constrained>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		.is-layout-constrained>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		.is-layout-constrained>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		.is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-flex {
			display: flex;
		}

		.is-layout-flex {
			flex-wrap: wrap;
			align-items: center;
		}

		.is-layout-flex> :is(*, div) {
			margin: 0;
		}

		body .is-layout-grid {
			display: grid;
		}

		.is-layout-grid> :is(*, div) {
			margin: 0;
		}

		body {
			padding-top: 0px;
			padding-right: 0px;
			padding-bottom: 0px;
			padding-left: 0px;
		}

		a:where(:not(.wp-element-button)) {
			text-decoration: none;
		}

		:root :where(.wp-element-button, .wp-block-button__link) {
			background-color: #32373c;
			border-width: 0;
			color: #fff;
			font-family: inherit;
			font-size: inherit;
			font-style: inherit;
			font-weight: inherit;
			letter-spacing: inherit;
			line-height: inherit;
			padding-top: calc(0.667em + 2px);
			padding-right: calc(1.333em + 2px);
			padding-bottom: calc(0.667em + 2px);
			padding-left: calc(1.333em + 2px);
			text-decoration: none;
			text-transform: inherit;
		}

		.has-black-color {
			color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-color {
			color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-color {
			color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-color {
			color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-color {
			color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-color {
			color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-color {
			color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-color {
			color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-color {
			color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-color {
			color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-color {
			color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-color {
			color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-background-color {
			background-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-background-color {
			background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-background-color {
			background-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-background-color {
			background-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-background-color {
			background-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-background-color {
			background-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-background-color {
			background-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-background-color {
			background-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-background-color {
			background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-background-color {
			background-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-border-color {
			border-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-border-color {
			border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-border-color {
			border-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-border-color {
			border-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-border-color {
			border-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-border-color {
			border-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-border-color {
			border-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-border-color {
			border-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-border-color {
			border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-border-color {
			border-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-vivid-cyan-blue-to-vivid-purple-gradient-background {
			background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
		}

		.has-light-green-cyan-to-vivid-green-cyan-gradient-background {
			background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
		}

		.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-orange-to-vivid-red-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
		}

		.has-very-light-gray-to-cyan-bluish-gray-gradient-background {
			background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
		}

		.has-cool-to-warm-spectrum-gradient-background {
			background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
		}

		.has-blush-light-purple-gradient-background {
			background: var(--wp--preset--gradient--blush-light-purple) !important;
		}

		.has-blush-bordeaux-gradient-background {
			background: var(--wp--preset--gradient--blush-bordeaux) !important;
		}

		.has-luminous-dusk-gradient-background {
			background: var(--wp--preset--gradient--luminous-dusk) !important;
		}

		.has-pale-ocean-gradient-background {
			background: var(--wp--preset--gradient--pale-ocean) !important;
		}

		.has-electric-grass-gradient-background {
			background: var(--wp--preset--gradient--electric-grass) !important;
		}

		.has-midnight-gradient-background {
			background: var(--wp--preset--gradient--midnight) !important;
		}

		.has-small-font-size {
			font-size: var(--wp--preset--font-size--small) !important;
		}

		.has-medium-font-size {
			font-size: var(--wp--preset--font-size--medium) !important;
		}

		.has-large-font-size {
			font-size: var(--wp--preset--font-size--large) !important;
		}

		.has-x-large-font-size {
			font-size: var(--wp--preset--font-size--x-large) !important;
		}

		:root :where(.wp-block-icon svg) {
			width: 24px;
		}

		:where(.wp-block-gallery.is-layout-flex) {
			gap: var(--wp--style--gallery-gap-default, var(--gallery-block--gutter-size, var(--wp--style--block-gap, 0.5em)));
		}

		:where(.wp-block-gallery.is-layout-grid) {
			gap: var(--wp--style--gallery-gap-default, var(--gallery-block--gutter-size, var(--wp--style--block-gap, 0.5em)));
		}

		:where(.wp-block-latest-posts.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-latest-posts.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-term-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-term-template.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		:root :where(.wp-block-pullquote) {
			font-size: 1.5em;
			line-height: 1.6;
		}

		/*# sourceURL=global-styles-inline-css */
	</style>
	<link rel='stylesheet' id='fluentform-elementor-widget-css'
		href={{ asset('/wp-content/plugins/fluentform/assets/css/fluent-forms-elementor-widgetd7df.css') }}
		media='all' />

	<style id="wp-block-library-inline-css">
		.pellets-delivery-badge {
			display: inline-block;
			width: 100%;
			box-sizing: border-box;
			border: 1.5px solid #7DA66A;
			border-radius: 7px;
			padding: 10px 14px;
			margin: 12px 0;
			background-color: #f0f7ec;
			font-size: 14px;
			line-height: 1.6;
		}

		.pellets-delivery-badge.pellets-delivery-cart {
			margin: 6px 0 2px;
			font-size: 12.5px;
			padding: 7px 11px;
		}

		.pellets-delivery-badge.pellets-delivery-checkout {
			margin: 0 0 16px;
			background-color: #eaf4e4;
		}

		.pellets-delivery-badge.pellets-delivery-thankyou {
			margin: 16px 0;
			background-color: #eaf4e4;
			border-color: #2F6B3A;
		}

		.pellets-del-shipping {
			color: #2F6B3A;
			font-weight: 700;
			margin-bottom: 3px;
		}

		.pellets-del-dates {
			color: #444;
		}

		.pellets-del-dates strong {
			color: #2F6B3A;
			font-weight: 700;
		}


		/* ── Bouton fiche produit ── */
		.pellets-wa-product-btn {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 10px;
			margin-top: 12px;
			padding: 13px 20px;
			background-color: #25D366;
			color: #ffffff !important;
			font-size: 15px;
			font-weight: 600;
			text-decoration: none !important;
			border-radius: 6px;
			width: 100%;
			box-sizing: border-box;
			transition: background-color 0.2s ease, transform 0.15s ease;
		}

		.pellets-wa-product-btn:hover {
			background-color: #1ebe5d;
			color: #ffffff !important;
			transform: translateY(-1px);
		}

		.pellets-wa-product-btn:active {
			transform: translateY(0);
		}

		.pellets-wa-product-btn svg {
			flex-shrink: 0;
		}

		/* ── Bouton flottant ── */
		.pellets-wa-float {
			position: fixed;
			bottom: 28px;
			right: 28px;
			z-index: 9999;
			background-color: #25D366;
			width: 60px;
			height: 60px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			box-shadow: 0 4px 14px rgba(0, 0, 0, 0.28);
			transition: transform 0.2s ease, box-shadow 0.2s ease;
			text-decoration: none !important;
		}

		.pellets-wa-float:hover {
			transform: scale(1.1);
			box-shadow: 0 6px 20px rgba(0, 0, 0, 0.32);
		}

		.pellets-wa-float:hover .pellets-wa-tooltip {
			opacity: 1;
			transform: translateX(0);
		}

		/* Tooltip */
		.pellets-wa-tooltip {
			position: absolute;
			right: 70px;
			background: #1a1a1a;
			color: #fff;
			font-size: 13px;
			font-weight: 500;
			padding: 6px 12px;
			border-radius: 5px;
			white-space: nowrap;
			opacity: 0;
			transform: translateX(8px);
			transition: opacity 0.2s ease, transform 0.2s ease;
			pointer-events: none;
		}

		.pellets-wa-tooltip::after {
			content: "";
			position: absolute;
			left: 100%;
			top: 50%;
			transform: translateY(-50%);
			border: 5px solid transparent;
			border-left-color: #1a1a1a;
		}

		/*# sourceURL=wp-block-library-inline-css */
	</style>
	<style id="safe-svg-svg-icon-style-inline-css">
		.wp-block-safe-svg-svg-icon a {
			align-self: center
		}

		.safe-svg-cover {
			text-align: center
		}

		.safe-svg-cover .safe-svg-inside {
			display: inline-block;
			max-width: 100%
		}

		.safe-svg-cover svg {
			fill: currentColor;
			height: 100%;
			max-height: 100%;
			max-width: 100%;
			width: 100%
		}

		/*# sourceURL=https://novaterra.pt/wp-content/plugins/safe-svg/dist/safe-svg-block-frontend.css */
	</style>
	<link rel='stylesheet' id='hostinger-reach-subscription-block-css'
		href={{ asset('/wp-content/plugins/hostinger-reach/frontend/dist/blocks/subscription29b3.css') }}
		media='all' />
	<link rel='stylesheet' id='select2-css'
		href={{ asset('/wp-content/plugins/woocommerce/assets/css/select2345d.css') }} media='all' />
	<style id="woocommerce-inline-inline-css">
		.woocommerce form .form-row .required {
			visibility: visible;
		}

		/*# sourceURL=woocommerce-inline-inline-css */
	</style>
	<link rel='stylesheet' id='hero_styles-css'
		href={{ asset('/wp-content/plugins/woocommerce-gateway-hero/assets/css/hero-stylesb95e.css') }} media='all' />
	<link rel="preload" href={{ asset('/wp-content/plugins/disco/assets/build/plugin-publicf896.css') }} as="style"
		onload="this.onload=null;this.rel='stylesheet'">
	<noscript>
		<link rel='stylesheet' id='disco-plugin-styles-css'
			href={{ asset('/wp-content/plugins/disco/assets/build/plugin-publicf896.css') }} media='all' />
	</noscript>
	<script>!function (t) { "use strict"; t.loadCSS || (t.loadCSS = function () { }); var e = loadCSS.relpreload = {}; if (e.support = function () { var e; try { e = t.document.createElement("link").relList.supports("preload") } catch (t) { e = !1 } return function () { return e } }(), e.bindMediaToggle = function (t) { var e = t.media || "all"; function a() { t.media = e } t.addEventListener ? t.addEventListener("load", a) : t.attachEvent && t.attachEvent("onload", a), setTimeout(function () { t.rel = "stylesheet", t.media = "only x" }), setTimeout(a, 3e3) }, e.poly = function () { if (!e.support()) for (var a = t.document.getElementsByTagName("link"), n = 0; n < a.length; n++) { var o = a[n]; "preload" !== o.rel || "style" !== o.getAttribute("as") || o.getAttribute("data-loadcss") || (o.setAttribute("data-loadcss", !0), e.bindMediaToggle(o)) } }, !e.support()) { e.poly(); var a = t.setInterval(e.poly, 500); t.addEventListener ? t.addEventListener("load", function () { e.poly(), t.clearInterval(a) }) : t.attachEvent && t.attachEvent("onload", function () { e.poly(), t.clearInterval(a) }) } "undefined" != typeof exports ? exports.loadCSS = loadCSS : t.loadCSS = loadCSS }("undefined" != typeof global ? global : this);</script>
	<link rel='stylesheet' id='elementor-frontend-css'
		href={{ asset('/wp-content/uploads/elementor/css/custom-frontend.min05b2.css') }} media='all' />
	<style id="elementor-frontend-inline-css">
		.e-heading-base a,
		.e-paragraph-base a {
			all: unset;
			cursor: pointer;
		}

		form[data-element_type="e-form"].form-state-success [data-element_type="e-form-success-message"],
		form[data-element_type="e-form"].form-state-error [data-element_type="e-form-error-message"] {
			display: block;
		}

		/*# sourceURL=elementor-frontend-inline-css */
	</style>
	<link rel='stylesheet' id='elementor-post-6-css'
		href={{ asset('/wp-content/uploads/elementor/css/post-605b2.css') }} media='all' />
	<link rel='stylesheet' id='base-desktop-css'
		href={{ asset('/wp-content/uploads/elementor/css/base-desktopa49e.css') }} media='all' />
	<link rel='stylesheet' id='base-mobile-css'
		href={{ asset('/wp-content/uploads/elementor/css/base-mobilea49e.css') }} media='(max-width:768px)' />
	<link rel='stylesheet' id='wd-style-base-css' href={{ asset('/wp-content/themes/woodmart/css/parts/base8833.css') }}
		media='all' />
	<style id="wd-style-base-inline-css">
		@font-face {
			font-weight: normal;
			font-style: normal;
			font-family: "woodmart-font";
			src: url({{ asset('/wp-content/themes/woodmart/fonts/woodmart-font-1-400c9dd.woff2?v=8.5.2') }}) format("woff2");
		}

		@font-face {
			font-family: "star";
			font-weight: 400;
			font-style: normal;
			src: url("/wp-content/plugins/woocommerce/assets/fonts/stard41d.html?#iefix") format("embedded-opentype"), url("/wp-content/plugins/woocommerce/assets/fonts/star.woff") format("woff"), url("/wp-content/plugins/woocommerce/assets/fonts/star.ttf") format("truetype"), url("/wp-content/plugins/woocommerce/assets/fonts/star.svg#star") format("svg");
		}

		@font-face {
			font-family: "WooCommerce";
			font-weight: 400;
			font-style: normal;
			src: url("/wp-content/plugins/woocommerce/assets/fonts/WooCommerced41d.html?#iefix") format("embedded-opentype"), url("/wp-content/plugins/woocommerce/assets/fonts/WooCommerce.woff") format("woff"), url("/wp-content/plugins/woocommerce/assets/fonts/WooCommerce.ttf") format("truetype"), url("/wp-content/plugins/woocommerce/assets/fonts/WooCommerce.svg#WooCommerce") format("svg");
		}


		/*# sourceURL=wd-style-base-inline-css */
	</style>
	<link rel='stylesheet' id='wd-header-base-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/header-base8833.css') }} media='all' />
	<style id="wd-helpers-wpb-elem-inline-css">
		.wd-z-index {
			position: relative;
			z-index: 35
		}

		.wd-fontsize-xs {
			font-size: 14px
		}

		.wd-fontsize-s {
			font-size: 16px
		}

		.wd-fontsize-m {
			font-size: 18px
		}

		.wd-fontsize-l {
			font-size: 22px
		}

		.wd-fontsize-xl {
			font-size: 26px
		}

		.wd-fontsize-xxl {
			font-size: 36px
		}

		.wd-fontsize-xxxl {
			font-size: 46px
		}

		.text-larger {
			font-size: 110%
		}

		.font-text {
			font-family: var(--wd-text-font)
		}

		.font-primary {
			font-family: var(--wd-title-font)
		}

		.font-alt {
			font-style: var(--wd-alternative-font-style);
			font-family: var(--wd-alternative-font)
		}

		.wd-items-top {
			align-items: flex-start
		}

		.wd-items-middle {
			align-items: center
		}

		.wd-items-bottom {
			align-items: flex-end
		}

		.wd-justify-left {
			justify-content: left
		}

		.wd-justify-center {
			justify-content: center
		}

		.wd-justify-right {
			justify-content: right
		}

		.color-primary {
			color: #3964fe
		}

		.color-alt {
			color: var(--wd-alternative-color)
		}

		.color-title {
			color: var(--wd-title-color)
		}

		@media(max-width: 1024px) {

			.wd-fontsize-xl,
			.wd-fontsize-xxl,
			.wd-fontsize-xxxl {
				font-size: 22px
			}

			.text-larger {
				font-size: inherit
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/helpers-wpb-elem.css */
	</style>
	<link rel='stylesheet' id='wd-woo-stripe-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/int-woo-stripe8833.css') }} media='all' />
	<style id="wd-woo-payments-inline-css">
		.wd-sticky-btn #wcpay-payment-request-wrapper,
		.wd-sticky-btn #wcpay-payment-request-button-separator,
		.wd-sticky-btn .wcpay-payment-request-wrapper {
			display: none !important
		}

		.woocommerce-SavedPaymentMethods {
			--li-pl: 0;
			list-style: none
		}

		.woocommerce-SavedPaymentMethods:empty {
			display: none
		}

		.wc-payment-form .woocommerce-error {
			margin: 20px 0 0 0
		}

		#wcpay-payment-request-button-separator {
			margin: 10px 0 !important;
			font-weight: 600;
			color: var(--color-gray-800)
		}

		#wcpay-payment-request-wrapper,
		.wcpay-payment-request-wrapper {
			padding-top: 0 !important
		}

		:root .cart_totals .wc-proceed-to-checkout #payment-method-message {
			margin-top: 0;
			margin-bottom: 10px;
			padding-inline: 0
		}

		:root .cart_totals .wc-proceed-to-checkout #payment-method-message iframe {
			margin: 0 !important
		}

		.wc-proceed-to-checkout :is(.wcpay-payment-request-wrapper, .wcpay-express-checkout-wrapper) {
			margin-top: 0 !important
		}

		#wcpay-hidden-input {
			line-height: 42px
		}

		.wc_payment_methods>li:before {
			content: " ";
			display: table
		}

		#wcpay-express-checkout-button-separator {
			--wd-tags-mb: .001px
		}

		td.woocommerce-PaymentMethod--method {
			font-weight: 600;
			color: var(--color-gray-800)
		}

		td.woocommerce-PaymentMethod--actions>* {
			margin: 2px 0
		}

		td.woocommerce-PaymentMethod--actions .button.delete {
			float: right;
			margin-inline-start: 5px;
			background-color: #e01020;
			color: #fff
		}

		td.woocommerce-PaymentMethod--actions .button.delete:hover {
			background-color: #c60f1d;
			color: #fff
		}

		.rtl td.woocommerce-PaymentMethod--actions .button.delete {
			float: left
		}

		td.woocommerce-PaymentMethod--actions:after {
			content: "";
			display: block;
			clear: both
		}

		#add_payment_method .payment_methods .payment_box {
			padding: 0;
			background-color: rgba(0, 0, 0, 0);
			box-shadow: none
		}

		#add_payment_method .payment_methods .payment_box:before {
			content: none
		}

		#add_payment_method #place_order {
			padding: 12px 20px;
			width: auto;
			font-size: 13px
		}

		form.cart div.quantity {
			order: 5
		}

		form.cart .single_add_to_cart_button {
			order: 10
		}

		form.cart .wd-buy-now-btn {
			order: 15
		}

		form.cart #wcpay-payment-request-button-separator {
			order: 20;
			margin: 5px 0 !important;
			text-align: var(--text-align) !important
		}

		form.cart :is(#wcpay-payment-request-wrapper, .wcpay-payment-request-wrapper) {
			order: 25
		}

		.single-product #payment-method-message {
			height: auto !important
		}

		.wd-page-wrapper #payment .payment_methods li .payment_box.payment_method_woocommerce_payments fieldset {
			padding: 0 !important
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/int-woo-payments.css */
	</style>
	<link rel='stylesheet' id='wd-elementor-base-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/int-elem-base8833.css') }} media='all' />
	<link rel='stylesheet' id='wd-woocommerce-base-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/woocommerce-base8833.css') }} media='all' />
	<style id="wd-mod-star-rating-inline-css">
		.star-rating {
			position: relative;
			display: inline-block;
			vertical-align: middle;
			white-space: nowrap;
			letter-spacing: 2px;
			font-weight: 400;
			color: var(--wd-star-color, #EABE12);
			width: fit-content;
			font-family: "woodmart-font"
		}

		.star-rating:before {
			content: "\f149" "\f149" "\f149" "\f149" "\f149";
			color: var(--wd-empty-star-color, var(--color-gray-300))
		}

		.star-rating span {
			position: absolute;
			inset-block: 0;
			inset-inline-start: 0;
			overflow: hidden;
			width: 100%;
			text-indent: 99999px
		}

		.star-rating span:before {
			content: "\f148" "\f148" "\f148" "\f148" "\f148";
			position: absolute;
			top: 0;
			inset-inline-start: 0;
			text-indent: 0
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/mod-star-rating.css */
	</style>
	<link rel='stylesheet' id='wd-select2-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/woo-lib-select28833.css') }} media='all' />
	<link rel='stylesheet' id='wd-woo-mod-shop-table-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/woo-mod-shop-table8833.css') }} media='all' />
	<style id="wd-woo-mod-grid-inline-css">
		.col2-set {
			display: flex;
			flex-wrap: wrap;
			gap: 30px
		}

		.col2-set :is(.col-1, .col-2) {
			flex: 1 0 0;
			max-width: 100%;
			padding-inline: 0
		}

		@media(min-width: 1025px) {
			p:where(.form-row-first, .form-row-last) {
				overflow: visible;
				width: 48%
			}

			p.form-row-first {
				float: left
			}

			p.form-row-last {
				float: right
			}

			p.form-row-wide {
				clear: both
			}
		}

		@media(max-width: 768.98px) {
			.col2-set :is(.col-1, .col-2) {
				flex-basis: 100%
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-mod-grid.css */
	</style>
	<link rel='stylesheet' id='wd-page-checkout-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/woo-page-checkout8833.html') }} media='all' />
	<style id="wd-page-checkout-payment-methods-inline-css">
		.payment_methods {
			--li-mb: 15px;
			--li-pl: 0;
			list-style: none
		}

		.payment_methods li img {
			margin-inline-start: 5px;
			margin-inline-end: 5px;
			max-height: 40px
		}

		.payment_methods li>label {
			display: inline;
			margin-bottom: 0
		}

		.payment_methods .payment_box {
			--wd-tags-mb: 10px;
			position: relative;
			margin-top: 15px;
			padding: 15px;
			background-color: var(--bgcolor-white);
			box-shadow: 1px 1px 2px rgba(0, 0, 0, .05);
			border-radius: var(--wd-brd-radius)
		}

		.payment_methods .payment_box p:last-child {
			margin-bottom: 0
		}

		.payment_methods .payment_box:before {
			content: "";
			position: absolute;
			inset-inline-start: 25px;
			bottom: 100%;
			background-color: inherit;
			width: 15px;
			height: 15px;
			clip-path: polygon(50% 50%, 0% 103%, 100% 103%)
		}

		.payment_methods fieldset {
			margin: 5px 0 0 0;
			padding: 0;
			border: none
		}

		.woocommerce-terms-and-conditions-wrapper {
			padding-top: 20px;
			border-top: 1px solid var(--brdcolor-gray-300)
		}

		.woocommerce-terms-and-conditions-wrapper a {
			font-weight: 600
		}

		.woocommerce-checkout-payment .woocommerce-privacy-policy-text:not(:last-child) {
			margin-bottom: 20px;
			border-bottom: 1px solid var(--brdcolor-gray-300)
		}

		.woocommerce-checkout-payment .woocommerce-privacy-policy-text:empty {
			display: none
		}

		.place-order .woocommerce-form__label span {
			vertical-align: middle
		}

		.place-order .woocommerce-invalid .woocommerce-form__label :is(span, a) {
			color: #ca1919
		}

		.woocommerce-terms-and-conditions {
			margin-bottom: 20px;
			padding: 20px;
			background-color: var(--bgcolor-white);
			box-shadow: 1px 1px 2px rgba(0, 0, 0, .05);
			border-radius: var(--wd-brd-radius)
		}

		#place_order {
			padding: 5px 28px;
			min-height: 48px;
			font-size: 14px;
			border-radius: var(--btn-accented-brd-radius);
			color: var(--btn-accented-color);
			box-shadow: var(--btn-accented-box-shadow);
			background-color: var(--btn-accented-bgcolor);
			text-transform: var(--btn-accented-transform, var(--btn-transform, uppercase));
			font-weight: var(--btn-accented-font-weight, var(--btn-font-weight, 600));
			font-family: var(--btn-accented-font-family, var(--btn-font-family, inherit));
			font-style: var(--btn-accented-font-style, var(--btn-font-style, unset))
		}

		#place_order:hover {
			color: var(--btn-accented-color-hover);
			box-shadow: var(--btn-accented-box-shadow-hover);
			background-color: var(--btn-accented-bgcolor-hover)
		}

		#place_order:active {
			box-shadow: var(--btn-accented-box-shadow-active);
			bottom: var(--btn-accented-bottom-active, 0)
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-page-checkout-el-payment-methods.css */
	</style>
	<style id="wd-woo-page-checkout-builder-inline-css">
		.wd-checkout-form {
			--wd-row-gap: 20px;
			display: flex;
			flex-direction: column;
			row-gap: var(--wd-row-gap)
		}

		:root .wd-checkout-form>* {
			margin-bottom: 0
		}

		[class*=__field-wrapper] {
			--wd-col: 4;
			--wd-gap: 20px;
			display: grid;
			grid-template-columns: repeat(var(--wd-col), minmax(0, 1fr));
			gap: var(--wd-gap)
		}

		[class*=__field-wrapper]>* {
			grid-column: auto/span var(--wd-col);
			margin-bottom: 0;
			width: unset
		}

		@media(min-width: 1025px) {
			[class*=__field-wrapper]>:is(.form-row-first, .form-row-last) {
				--wd-col: 2
			}
		}

		:is(.wd-checkout-login, .wd-checkout-coupon) {
			display: flex;
			flex-direction: column;
			align-items: var(--wd-align)
		}

		:is(.wd-checkout-login, .wd-checkout-coupon) :is(.woocommerce-form-coupon-toggle, .woocommerce-form-login-toggle)>div {
			margin-bottom: 0;
			justify-content: var(--wd-align)
		}

		:is(.wd-checkout-login, .wd-checkout-coupon) :is(.woocommerce-form-coupon, .woocommerce-form-login.hidden-form) {
			width: 100%;
			margin-block: 20px 0
		}

		:is(.wd-checkout-login, .wd-checkout-coupon)>[role=alert] {
			margin-block: 20px 0
		}

		.wd-billing-details>*:not(:last-child) {
			margin-bottom: 20px
		}

		.e-con .wd-billing-details>div>*:not(:last-child) {
			margin-bottom: 20px
		}

		.wd-billing-details:not(.wd-title-show) .woocommerce-billing-fields>h3 {
			display: none
		}

		.wd-shipping-details>*:not(:last-child) {
			margin-bottom: 20px
		}

		.e-con .wd-shipping-details>div>*:not(:last-child) {
			margin-bottom: 20px
		}

		.wd-shipping-details:not(.wd-title-show) .woocommerce-additional-fields>h3 {
			display: none
		}

		.wd-payment-methods .place-order {
			display: flex;
			flex-direction: column
		}

		.wd-payment-methods #place_order {
			align-self: var(--wd-btn-align, start)
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-page-checkout-builder.css */
	</style>
	<style id="wd-woo-opt-manage-checkout-prod-inline-css">
		.wd-checkout-prod {
			position: relative;
			display: flex;
			flex-grow: 1;
			align-items: center
		}

		.wd-checkout-prod-img {
			margin-inline-end: 10px
		}

		.wd-checkout-prod-img img {
			min-width: 65px;
			max-width: 65px;
			border-radius: calc(var(--wd-brd-radius)/1.5)
		}

		.wd-checkout-prod-cont {
			display: flex;
			flex-grow: 1;
			align-items: center;
			justify-content: space-between;
			text-align: start
		}

		.wd-checkout-prod-cont .quantity {
			--wd-form-height: 32px;
			order: 1
		}

		.wd-checkout-prod-title {
			display: flex;
			flex-wrap: wrap;
			margin-inline-end: 10px
		}

		.wd-checkout-prod-title>.cart-product-label-link {
			color: var(--wd-entities-title-color);
			text-decoration: none
		}

		.wd-checkout-prod-title>.cart-product-label-link:hover {
			color: var(--wd-entities-title-color-hover)
		}

		.wd-checkout-prod-title>:is(.cart-product-label-link, .cart-product-label) {
			margin-inline-end: 5px
		}

		.wd-checkout-prod-title>*:not(:is(.cart-product-label-link, .cart-product-label, .product-quantity)) {
			margin-top: 10px;
			width: 100%;
			max-width: 100% !important
		}

		.wd-checkout-prod-total {
			text-align: end
		}

		.wd-checkout-remove-btn-wrapp {
			margin-inline: -5px 5px;
			width: 25px;
			flex-shrink: 0
		}

		.wd-checkout-remove-btn {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 100%;
			height: 25px;
			color: var(--color-gray-800);
			font-weight: 600;
			font-size: 10px;
			text-decoration: none !important
		}

		.wd-checkout-remove-btn:hover {
			color: var(--color-gray-500)
		}

		.wd-checkout-remove-btn:after {
			content: "\f112";
			font-family: "woodmart-font"
		}

		@media(max-width: 576px) {
			.wd-manage-on thead .product-total {
				display: none
			}

			.wd-checkout-prod-cont {
				display: block
			}

			.wd-checkout-prod-title {
				margin-inline-end: 0;
				margin-bottom: 10px
			}

			.wd-checkout-prod-total {
				text-align: start
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-opt-manage-checkout-prod.css */
	</style>
	<style id="wd-woo-opt-fbt-cart-inline-css">
		.product_list_widget li[class*=wd-fbt-item]:not(.wd-fbt-item-last) {
			margin-bottom: 0;
			border-bottom: 0
		}

		.cart-widget-side .woocommerce-mini-cart .mini_cart_item.wd-fbt-item {
			padding-block: 8px
		}

		.cart-widget-side .woocommerce-mini-cart .mini_cart_item.wd-fbt-item-first {
			padding-bottom: 8px
		}

		.cart-widget-side .woocommerce-mini-cart .mini_cart_item.wd-fbt-item-last {
			padding-top: 8px
		}

		.woocommerce-checkout-review-order-table .cart_item:is(.wd-fbt-item-first, .wd-fbt-item) {
			border-bottom: none
		}

		.woocommerce-checkout-review-order-table .cart_item:is(.wd-fbt-item-first, .wd-fbt-item) td {
			padding-bottom: 0
		}

		.woocommerce-table--order-details .order_item:is(.wd-fbt-item-first, .wd-fbt-item) td {
			padding-bottom: 0;
			border-bottom: none
		}

		@media(min-width: 769px) {
			.shop_table_responsive .cart_item.wd-fbt-item-first .product-remove a {
				margin-top: 15px
			}

			.shop_table_responsive .cart_item[class*=wd-fbt-item]:not(.wd-fbt-item-last) td {
				padding-bottom: 0;
				border-bottom: none
			}
		}

		@media(max-width: 768.98px) {
			.shop_table_responsive .cart_item[class*=wd-fbt-item]:not(.wd-fbt-item-last) {
				margin-bottom: 10px;
				padding-bottom: 0;
				border-bottom: none
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-opt-fbt-cart.css */
	</style>
	<style id="wd-woo-mod-cart-labels-inline-css">
		.wd-cart-label {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			width: 16px;
			height: 16px;
			text-align: center;
			font-weight: 400;
			font-size: 0
		}

		.wd-cart-label:before {
			color: var(--color-gray-300);
			font-size: calc(var(--wd-text-font-size) - 2px);
			transition: all .25s ease;
			font-family: "woodmart-font"
		}

		.wd-cart-label:hover:before {
			color: var(--color-gray-500)
		}

		.wd-fbt-label:before {
			content: "\f182"
		}

		.wd-fg-label:before {
			content: "\f11e"
		}

		.shop_table .product-name:has(.wd-cart-label) a:not(:last-child) {
			margin-inline-end: 3px
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-mod-cart-labels.css */
	</style>
	<link rel='stylesheet' id='wd-wp-blocks-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/wp-blocks8833.css') }} media='all' />
	<style id="wd-header-logo-opt-swap-inline-css">
		.wd-switch-logo .wd-sticky-logo {
			display: none;
			animation: wd-fadeIn .5s ease
		}

		:is(.whb-sticked, .whb-clone) .wd-switch-logo .wd-main-logo {
			display: none
		}

		:is(.whb-sticked, .whb-clone) .wd-switch-logo .wd-sticky-logo {
			display: block
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/header-el-logo-opt-swap.css */
	</style>
	<style id="wd-header-search-inline-css">
		.wd-header-search {
			--wd-tools-icon: "\f130"
		}

		.wd-header-search .wd-tools-icon img,
		.wd-header-search .wd-tools-icon:before {
			transition: opacity .3s ease
		}

		.wd-header-search .wd-tools-icon:after {
			position: absolute;
			top: 50%;
			left: 50%;
			display: block;
			font-size: var(--wd-tools-icon-width, var(--wd-tools-icon-base-width));
			opacity: 0;
			transform: translate(-50%, -50%);
			content: "\f112";
			font-family: "woodmart-font"
		}

		.wd-header-search:is(.wd-design-6.wd-with-wrap, .wd-design-7.wd-with-wrap, .wd-design-8) {
			min-width: var(--wd-tools-icon-base-width)
		}

		.wd-header-search:is(.wd-design-6.wd-with-wrap, .wd-design-7.wd-with-wrap, .wd-design-8) .wd-tools-icon:after {
			inset-inline-start: var(--wd-tools-sp);
			inset-inline-end: auto;
			transform: translateY(-50%)
		}

		.wd-search-opened .wd-header-search .wd-tools-icon:after {
			opacity: 1;
			transition: opacity .3s ease
		}

		.wd-search-opened .wd-header-search .wd-tools-icon img,
		.wd-search-opened .wd-header-search .wd-tools-icon:before {
			opacity: 0;
			transition: none
		}

		.wd-search-dropdown {
			width: 300px
		}

		.wd-search-dropdown input[type=text] {
			height: 70px !important;
			border: none
		}

		.whb-col-right .wd-search-dropdown {
			right: 0;
			left: auto;
			margin-left: 0;
			margin-right: calc(var(--nav-gap, 0.001px)/2*-1)
		}

		.wd-search-dropdown .wd-dropdown-results {
			inset-inline: calc(var(--wd-brd-radius)/1.5)
		}

		.form-style-underlined .wd-search-dropdown input[type=text] {
			padding-left: 15px
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/header-el-search.css */
	</style>
	<style id="wd-woo-mod-login-form-inline-css">
		.woocommerce-form-login>*:last-child {
			margin-bottom: 0
		}

		.woocommerce-form-login:not(.hidden-form) {
			display: block !important
		}

		.password-input {
			position: relative;
			display: block
		}

		.password-input input {
			padding-inline-end: var(--wd-form-height) !important
		}

		.show-password-input {
			display: flex;
			justify-content: center;
			align-items: center;
			position: absolute;
			top: 0;
			inset-inline-end: 0;
			width: var(--wd-form-height);
			height: var(--wd-form-height);
			cursor: pointer;
			font-size: 16px;
			color: var(--color-gray-600);
			transition: all .25s ease;
			padding: 0 !important;
			border: none !important;
			background: none !important;
			box-shadow: none !important;
			min-height: unset !important
		}

		.show-password-input:hover {
			color: var(--color-gray-400)
		}

		.show-password-input:before {
			font-family: "woodmart-font";
			content: "\f11a"
		}

		.show-password-input.display-password:before {
			content: "\f11b"
		}

		.login-form-footer {
			--wd-link-color: #3964fe;
			--wd-link-color-hover: #3964fe;
			--wd-link-decor: none;
			--wd-link-decor-hover: none;
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			justify-content: space-between;
			gap: 10px
		}

		.login-form-footer .lost_password {
			order: 2
		}

		.login-form-footer .lost_password:hover {
			opacity: .7
		}

		.login-form-footer .woocommerce-form-login__rememberme {
			order: 1;
			margin-bottom: 0
		}

		:is(.register, .woocommerce-form-login) .button {
			width: 100%
		}

		.wd-login-divider {
			display: flex;
			align-items: center;
			text-transform: uppercase
		}

		.wd-login-divider span {
			margin-inline: 20px
		}

		.wd-login-divider:after,
		.wd-login-divider:before {
			content: "";
			flex: 1 0 0;
			border-bottom: 1px solid var(--brdcolor-gray-300)
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-mod-login-form.css */
	</style>
	<style id="wd-header-divider-inline-css">
		.wd-header-divider:before {
			content: "";
			display: block;
			height: 18px;
			border-right: 1px solid var(--wd-divider-color, rgba(0, 0, 0, 0.105))
		}

		.wd-header-divider.wd-full-height,
		.wd-header-divider.wd-full-height:before {
			height: 100%
		}

		.whb-color-light .wd-header-divider:before {
			border-color: var(--wd-divider-color, rgba(255, 255, 255, 0.25))
		}

		.whb-col-right .wd-header-divider:last-child,
		.whb-mobile-right .wd-header-divider:last-child,
		.whb-col-mobile .wd-header-divider:last-child {
			padding-inline-end: 10px
		}

		.whb-col-left .wd-header-divider:first-child,
		.whb-mobile-left .wd-header-divider:first-child,
		.whb-col-mobile .wd-header-divider:first-child {
			padding-inline-start: 10px
		}

		.whb-col-center .wd-header-divider:first-child {
			padding-inline-start: 10px
		}

		.whb-col-center .wd-header-divider:last-child {
			padding-inline-end: 10px
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/header-el-divider.css */
	</style>
	<style id="wd-header-cart-inline-css">
		.wd-header-cart {
			--wd-tools-icon: "\f105"
		}

		.wd-header-cart .wd-tools-icon.wd-icon-alt {
			--wd-tools-icon: "\f126"
		}

		.wd-header-cart :is(.wd-cart-subtotal, .subtotal-divider, .wd-tools-count) {
			vertical-align: middle
		}

		.wd-header-cart .wd-cart-number>span,
		.wd-header-cart .subtotal-divider {
			display: none
		}

		.wd-header-cart .wd-cart-subtotal .amount {
			color: inherit;
			font-weight: inherit;
			font-size: inherit
		}

		.wd-tools-text-cart {
			display: flex;
			align-items: center;
			gap: 7px
		}

		.wd-header-cart:is(.wd-design-2, .wd-design-5) .wd-tools-icon {
			margin-inline-end: 6px
		}

		.wd-header-cart:is(.wd-design-6-text, .wd-design-7-text)>a>.wd-tools-text-cart {
			position: relative;
			display: flex;
			align-items: center;
			border: 1px solid rgba(0, 0, 0, .105);
			height: 42px;
			border-radius: 42px;
			padding-inline: var(--wd-tools-sp)
		}

		.wd-header-cart.wd-design-6-text>a>.wd-tools-text-cart {
			border: 1px solid rgba(0, 0, 0, 0.105)
		}

		.whb-color-light .wd-header-cart.wd-design-5-text>a>.wd-tools-text-cart {
			border-color: rgba(255, 255, 255, 0.25)
		}

		.wd-header-cart.wd-design-7-text>a>.wd-tools-text-cart {
			background-color: #3964fe;
			color: #fff;
			transition: inherit
		}

		.wd-header-cart.wd-design-7-text:hover>a>.wd-tools-text-cart {
			color: hsla(0, 0%, 100%, .8)
		}

		.wd-dropdown-cart {
			padding: 20px;
			width: 330px
		}

		.whb-col-right .wd-dropdown-cart {
			right: 0;
			left: auto;
			margin-left: 0;
			margin-right: calc(var(--nav-gap, 0.001px)/2*-1)
		}

		:is(.woocommerce-cart, .woocommerce-checkout) :is(.cart-widget-side, .wd-dropdown-cart) {
			display: none
		}

		@media(max-width: 1024px) {
			.wd-dropdown-cart {
				display: none
			}
		}

		.wd-custom-dropdown {
			padding-inline: 10px
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/header-el-cart.css */
	</style>
	<style id="wd-el-page-title-builder-inline-css">
		.wd-page-title-el .wd-page-title {
			border-radius: inherit
		}

		.wd-page-title-el.wd-stretched {
			position: relative;
			width: calc(100vw - var(--wd-scroll-w) - var(--wd-sticky-nav-w));
			inset-inline-start: calc(50% - 50vw + var(--wd-scroll-w)/2 + var(--wd-sticky-nav-w)/2)
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/el-page-title-builder.css */
	</style>
	<style id="wd-page-title-inline-css">
		.wd-page-title {
			--wd-align: start;
			--wd-title-sp: 15px;
			--wd-title-font-s: 36px;
			position: relative;
			padding-block: var(--wd-title-sp)
		}

		.wd-page-title .container {
			position: relative;
			display: flex;
			flex-direction: column;
			align-items: var(--wd-align);
			text-align: var(--wd-align);
			gap: 10px
		}

		.wd-page-title .title {
			font-size: var(--wd-title-font-s);
			line-height: 1.2;
			margin-bottom: 0
		}

		.wd-page-title-bg img {
			width: 100%;
			height: 100%;
			object-fit: cover
		}

		.title-design-centered {
			--wd-align: center
		}

		@media(min-width: 1025px) {
			.title-size-small {
				--wd-title-sp: 20px;
				--wd-title-font-s: 44px
			}

			.title-size-default {
				--wd-title-sp: 60px;
				--wd-title-font-s: 68px
			}

			.title-size-large {
				--wd-title-sp: 100px;
				--wd-title-font-s: 78px
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/page-title.css */
	</style>
	<style id="wd-woo-mod-checkout-steps-inline-css">
		.wd-checkout-steps {
			--wd-link-color: initial;
			--wd-link-color-hover: initial;
			--wd-link-decor: none;
			--wd-link-decor-hover: none;
			--list-mb: 0;
			--li-pl: 0;
			--li-mb: 0;
			display: flex;
			justify-content: var(--wd-align);
			flex-wrap: wrap;
			gap: 10px 15px;
			font-size: 22px;
			text-transform: uppercase;
			color: var(--wd-title-color);
			font-weight: var(--wd-title-font-weight);
			font-style: var(--wd-title-font-style);
			font-family: var(--wd-title-font);
			list-style: none
		}

		.wd-checkout-steps li {
			display: flex;
			align-items: center;
			gap: 15px
		}

		@media(min-width: 769px) {
			.wd-checkout-steps li>:is(a, span) {
				opacity: .7
			}

			.wd-checkout-steps li a:hover {
				opacity: 1
			}

			.wd-checkout-steps li:not(:last-child):after {
				font-weight: 400;
				font-size: 85%;
				opacity: .7;
				content: "\f120";
				font-family: "woodmart-font"
			}

			.wd-checkout-steps .step-active>:is(a, span) {
				opacity: 1;
				text-decoration: underline 2px solid #3964fe;
				text-underline-offset: 6px
			}
		}

		@media(max-width: 768.98px) {
			.wd-checkout-steps .step-inactive {
				display: none
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-mod-checkout-steps.css */
	</style>
	<style id="wd-woo-el-notices-builder-inline-css">
		.wd-wc-notices .woocommerce-notices-wrapper {
			display: flex;
			flex-direction: column;
			gap: 20px
		}

		.wd-wc-notices .woocommerce-notices-wrapper>* {
			margin-bottom: 0
		}

		.wd-wc-notices:has(.woocommerce-notices-wrapper:empty) {
			display: none
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-el-notices-builder.css */
	</style>
	<style id="wd-int-elem-opt-sticky-column-inline-css">
		[class*=wd-sticky-container] {
			--wd-sticky-offset: 150px
		}

		@media(min-width: 1025px) {
			.wd-sticky-container-lg {
				position: sticky;
				top: var(--wd-sticky-offset);
				align-self: flex-start
			}
		}

		@media(min-width: 769px)and (max-width: 1024px) {
			.wd-sticky-container-md-sm {
				position: sticky;
				top: var(--wd-sticky-offset);
				align-self: flex-start
			}
		}

		@media(max-width: 768.98px) {
			.wd-sticky-container-md {
				position: sticky;
				top: var(--wd-sticky-offset);
				align-self: flex-start
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/int-elem-opt-sticky-column.css */
	</style>
	<style id="wd-section-title-inline-css">
		.title-wrapper {
			--wd-mb: 10px
		}

		.title-wrapper [class*=title] {
			display: inline-block
		}

		.title-wrapper .title {
			margin-bottom: 0
		}

		.title-wrapper .img-wrapper {
			display: block;
			margin-top: 10px
		}

		.subtitle-color-black.subtitle-style-default {
			color: #000
		}

		.subtitle-color-black.subtitle-style-background {
			background-color: #333;
			color: #fff
		}

		.subtitle-color-white.subtitle-style-default {
			color: hsla(0, 0%, 100%, .8)
		}

		.subtitle-color-white.subtitle-style-background {
			background-color: hsla(0, 0%, 100%, .8);
			color: #242424
		}

		.subtitle-color-gradient.subtitle-style-default {
			color: var(--color-gray-400)
		}

		.subtitle-color-gradient.subtitle-style-background {
			background-color: #f1f1f1;
			color: #333
		}

		.wd-title-color-default {
			--el-title-color: rgba(0, 0, 0, 0.105)
		}

		.wd-title-color-primary {
			--el-title-color: #3964fe
		}

		.wd-title-color-alt {
			--el-title-color: var(--wd-alternative-color)
		}

		.wd-title-color-black {
			--el-title-color: #000
		}

		.wd-title-color-white {
			color: var(--wd-text-color);
			--wd-text-color: rgba(255, 255, 255, 0.8);
			--wd-title-color: #FFF;
			--el-title-color: #FFF
		}

		.wd-title-color-gradient .title {
			-webkit-background-clip: text;
			background-clip: text;
			-webkit-text-fill-color: rgba(0, 0, 0, 0)
		}

		.wd-title-style-shadow {
			padding: 25px;
			border-radius: var(--wd-brd-radius);
			box-shadow: 0 0 8px rgba(0, 0, 0, .12)
		}

		.wpb-js-composer .title-wrapper {
			--content-width: var(--wd-max-width)
		}

		.wpb-js-composer .title-wrapper [class*=title] {
			max-width: var(--content-width)
		}

		.wpb-js-composer .title-wrapper.wd-title-empty .liner-continer {
			margin-bottom: 0
		}

		.wpb-js-composer .title-wrapper.wd-title-empty .liner-continer .title {
			display: none
		}

		@media(max-width: 1024px) {

			.title-subtitle.wd-fontsize-m,
			.title-after_title.wd-fontsize-s {
				font-size: 14px
			}
		}

		@media(max-width: 576px) {
			.title-wrapper .title-subtitle {
				font-size: 12px
			}

			.title-wrapper .title {
				font-size: 20px
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/el-section-title.css */
	</style>
	<style id="wd-woo-mod-quantity-inline-css">
		div.quantity {
			--wd-form-height: 42px;
			display: inline-flex;
			vertical-align: top;
			white-space: nowrap
		}

		div.quantity input[type=number]::-webkit-inner-spin-button,
		div.quantity input[type=number]::-webkit-outer-spin-button,
		div.quantity input[type=number] {
			margin: 0;
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none
		}

		div.quantity :is(input[type=number], input[type=text], input[type=button]) {
			display: inline-block;
			color: var(--wd-form-color);
			min-height: var(--wd-form-height);
			height: unset
		}

		div.quantity input[type=number] {
			width: 30px;
			border-radius: 0;
			border-right: none;
			border-left: none
		}

		div.quantity input[type=text] {
			width: var(--quantity-space, 80px);
			text-align: center
		}

		div.quantity input[type=button] {
			padding: 0 5px;
			min-width: 25px;
			border: var(--wd-form-brd-width) solid var(--wd-form-brd-color);
			background: var(--wd-form-bg);
			box-shadow: none
		}

		div.quantity input[type=button]:hover {
			color: #fff;
			background-color: #3964fe;
			border-color: #3964fe
		}

		div.quantity .minus {
			border-start-start-radius: var(--wd-form-brd-radius);
			border-end-start-radius: var(--wd-form-brd-radius)
		}

		div.quantity .plus {
			border-start-end-radius: var(--wd-form-brd-radius);
			border-end-end-radius: var(--wd-form-brd-radius)
		}

		div.quantity.hidden {
			display: none !important
		}

		.form-style-underlined div.quantity input[type=number],
		.form-style-underlined div.quantity input[type=text] {
			border-top-style: solid
		}

		@-moz-document url-prefix() {
			div.quantity input[type=number] {
				-webkit-appearance: textfield;
				-moz-appearance: textfield;
				appearance: textfield
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-mod-quantity.css */
	</style>
	<style id="wd-widget-collapse-inline-css">
		.wd-widget-collapse .widget-title {
			position: relative;
			margin-bottom: 0;
			padding-inline-end: 22px;
			cursor: pointer;
			user-select: none
		}

		.wd-widget-collapse .widget-title~* {
			margin-top: 20px
		}

		.wd-widget-collapse .widget-title:after {
			position: absolute;
			top: calc(50% - 12px);
			inset-inline-end: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 24px;
			height: 24px;
			border-radius: 50%;
			color: var(--color-gray-800);
			font-weight: 400;
			font-size: 10px;
			transition: all .25s ease;
			content: "\f129";
			font-family: "woodmart-font"
		}

		.wd-widget-collapse.wd-opened .widget-title:after {
			background-color: #f1f1f1;
			transform: rotate(180deg)
		}

		.rtl .wd-widget-collapse.wd-opened .widget-title:after {
			transform: rotate(-180deg)
		}

		.wd-widget-collapse:not(.wd-opened-initially)>.widget-title~* {
			display: none
		}

		.wd-widget-collapse .wd-swatches-filter:is(.wd-layout-double, .wd-layout-inline)[style*="display: block"] {
			display: flex !important
		}

		[class*=color-scheme-light] .wd-widget-collapse.wd-opened .widget-title:after {
			background-color: #fff;
			color: #333
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/opt-widget-collapse.css */
	</style>
	<style id="wd-footer-base-inline-css">
		.footer-sidebar {
			padding-block: 40px
		}

		.footer-column>*:not(.widget) {
			margin-block: 0 var(--wd-block-spacing)
		}

		.footer-column>*:not(.widget):last-child {
			margin-bottom: 0
		}

		.wd-prefooter {
			padding-bottom: 40px;
			background-color: var(--wd-main-bgcolor)
		}

		.wd-copyrights {
			--wd-tags-mb: 10px;
			padding-block: 20px;
			border-top: 1px solid var(--brdcolor-gray-300)
		}

		.wd-copyrights.wd-layout-two-columns>.wd-grid-g {
			--wd-col-lg: 2;
			--wd-col-md: 1
		}

		.wd-copyrights.wd-layout-centered {
			text-align: center
		}

		@media(min-width: 1025px) {
			.sticky-footer-on :is(.wd-page-content, .wd-prefooter) {
				position: relative;
				z-index: 2
			}

			.sticky-footer-on .wd-footer {
				position: sticky;
				bottom: 0
			}
		}

		@media(min-width: 1025px) {
			.wd-copyrights.wd-layout-two-columns .wd-col-end {
				text-align: end
			}
		}

		@media(max-width: 1024px) {
			.wd-copyrights.wd-layout-two-columns {
				text-align: center
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/footer-base.css */
	</style>
	<style id="wd-text-block-inline-css">
		.wd-text-block:not(.inline-element) {
			max-width: var(--content-width);
			--content-width: var(--wd-max-width)
		}

		.wd-text-block:not(.inline-element).text-left {
			margin-right: auto
		}

		.wd-text-block:not(.inline-element).text-center {
			margin-inline: auto
		}

		.wd-text-block:not(.inline-element).text-right {
			margin-left: auto
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/el-text-block.css */
	</style>
	<style id="wd-mod-nav-menu-label-inline-css">
		.menu-label {
			position: absolute;
			bottom: 85%;
			z-index: 1;
			display: inline-block;
			margin-inline-start: -20px;
			padding: 2px 4px;
			border-radius: calc(var(--wd-brd-radius)/1.5);
			background-color: var(--wd-label-color);
			color: #fff;
			vertical-align: middle;
			text-transform: uppercase;
			white-space: nowrap;
			font-weight: 600;
			font-size: 9px;
			font-family: var(--wd-text-font);
			line-height: 12px
		}

		.menu-label:before {
			content: "";
			position: absolute;
			top: 100%;
			inset-inline-start: 10px;
			border: 4px solid var(--wd-label-color);
			border-bottom-color: rgba(0, 0, 0, 0) !important;
			border-inline-end-color: rgba(0, 0, 0, 0) !important;
			border-inline-end-width: 7px;
			border-inline-start-width: 0
		}

		.menu-label-black {
			--wd-label-color: #000
		}

		.menu-label-orange {
			--wd-label-color: #FBBC34
		}

		.menu-label-blue {
			--wd-label-color: #00A1BE
		}

		.menu-label-grey {
			color: #333;
			--wd-label-color: #f1f1f1
		}

		.menu-label-white {
			color: #333;
			--wd-label-color: #FFF
		}

		.menu-label-primary {
			--wd-label-color: #3964fe
		}

		.menu-label-secondary {
			--wd-label-color: var(--wd-alternative-color)
		}

		.menu-label-red {
			--wd-label-color: #D41212
		}

		.menu-label-green {
			--wd-label-color: #65B32E
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/mod-nav-menu-label.css */
	</style>
	<style id="wd-el-menu-inline-css">
		@media(max-width: 1024px) {
			.wd-nav-mega .wd-dropdown-menu {
				display: none
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/el-menu.css */
	</style>
	<style id="wd-el-menu-wpb-elem-inline-css">
		.wd-menu>.widget-title {
			margin-bottom: 0;
			padding: 20px;
			background-color: var(--bgcolor-gray-300);
			text-transform: uppercase;
			border-top-left-radius: var(--wd-brd-radius);
			border-top-right-radius: var(--wd-brd-radius)
		}

		.wd-menu>.widget-title+.wd-nav-vertical {
			border-top: none
		}

		.wd-menu>.widget-title+.wd-nav-vertical,
		.wd-menu>.widget-title+.wd-nav-vertical>li:first-child>a {
			border-top-left-radius: 0;
			border-top-right-radius: 0
		}

		.rtl .wd-menu .wd-nav.wd-icon-left>li>a .wd-nav-img {
			order: 1;
			margin: 0;
			margin-inline-start: 7px
		}

		.rtl .wd-menu .wd-nav.wd-icon-right>li>a .wd-nav-img {
			order: 0;
			margin: 0;
			margin-inline-end: 7px
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/el-menu-wpb-elem.css */
	</style>
	<style id="wd-scroll-top-inline-css">
		.scrollToTop {
			position: fixed;
			inset-inline-end: 20px;
			bottom: 20px;
			z-index: 350;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			background-color: rgba(var(--bgcolor-white-rgb), 0.9);
			box-shadow: 0 0 5px rgba(0, 0, 0, .17);
			color: var(--color-gray-800);
			font-size: 16px;
			opacity: 0;
			pointer-events: none;
			text-decoration: none !important;
			backface-visibility: hidden;
			-webkit-backface-visibility: hidden;
			transform: translateX(100%)
		}

		.scrollToTop.button-show {
			opacity: 1;
			transform: none;
			pointer-events: auto
		}

		.scrollToTop:after {
			content: "\f115";
			font-family: "woodmart-font"
		}

		.scrollToTop:hover {
			color: var(--color-gray-500)
		}

		.wd-search-opened .scrollToTop {
			display: none
		}

		@media(max-width: 1024px) {
			.scrollToTop {
				inset-inline-end: 12px;
				bottom: 12px;
				width: 40px;
				height: 40px;
				font-size: 14px
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/opt-scrolltotop.css */
	</style>
	<style id="wd-header-search-fullscreen-inline-css">
		[class*=wd-search-full-screen] {
			--wd-search-font-size: 1.08em;
			position: fixed;
			z-index: 400;
			visibility: hidden;
			opacity: 0;
			outline: none !important
		}

		[class*=wd-search-full-screen] :is(.wd-search-history, .wd-search-requests, .wd-search-info-text):not(:last-child) {
			margin-bottom: var(--wd-search-sp)
		}

		[class*=wd-search-full-screen] .wd-scroll-content:not(.wd-dropdown) {
			--wd-scroll-h: 100%
		}

		.wd-search-form[class*=wd-display-full-screen] {
			cursor: pointer
		}

		.wd-search-form[class*=wd-display-full-screen] .searchform {
			pointer-events: none;
			user-select: none
		}

		.wd-search-form[class*=wd-display-full-screen] .wd-clear-search {
			display: none
		}

		[class*=wd-search-full-screen] .wd-search-suggestions {
			animation: wd-fadeInBottomShort .6s cubic-bezier(0.19, 1, 0.22, 1) both
		}

		[class*=wd-search-full-screen] .wd-search-suggestions .wd-search-title {
			margin-top: var(--wd-search-sp)
		}

		[class*=wd-search-full-screen] .wd-search-suggestions .wd-search-title:first-child {
			margin-top: 0
		}

		[class*=wd-search-full-screen] .wd-suggestion {
			flex-direction: column
		}

		[class*=wd-search-full-screen] .wd-suggestion-thumb {
			margin-bottom: 10px
		}

		[class*=wd-search-full-screen] .wd-not-found-msg {
			font-size: var(--wd-search-font-size)
		}

		[class*=wd-search-full-screen] .wd-suggestions-group.wd-type-categories .wd-suggestion {
			flex-direction: row;
			flex-basis: unset
		}

		[class*=wd-search-full-screen] .wd-suggestions-group.wd-type-categories .wd-suggestion .wd-suggestion-thumb {
			margin-bottom: 0
		}

		[class*=wd-search-full-screen] .wd-suggestions-group.wd-type-categories .wd-suggestion .wd-entities-title {
			transition: all .25s ease
		}

		[class*=wd-search-full-screen] .wd-suggestions-group.wd-type-categories .wd-suggestion:hover .wd-entities-title {
			opacity: .6
		}

		[class*=wd-search-full-screen].wd-searched :is(.wd-search-history, .wd-search-requests, .wd-search-info-text) {
			display: none
		}

		[class*=wd-search-full-screen] .wd-search-history ul {
			flex-direction: row;
			flex-wrap: wrap
		}

		[class*=wd-search-full-screen] .wd-sh-head {
			display: block
		}

		[class*=wd-search-full-screen] .wd-sh-head .wd-sh-clear {
			display: none
		}

		[class*=wd-search-full-screen] .wd-sh-link:before {
			display: none
		}

		[class*=wd-search-full-screen].wd-opened {
			visibility: visible;
			opacity: 1
		}

		.wd-search-opened {
			overflow: hidden
		}

		@media(max-width: 1024px) {
			[class*=wd-search-full-screen] {
				--wd-search-font-size: .92em;
				--wd-search-sp: 15px
			}

			[class*=wd-search-full-screen] .wd-search-requests {
				--wd-requests-pd: 8px 12px;
				--wd-requests-fs: 10px
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/header-el-search-fullscreen-general.css */
	</style>
	<link rel='stylesheet' id='wd-header-search-fullscreen-1-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-search-fullscreen-18833.css') }} media='all' />
	<style id="wd-wd-search-form-inline-css">
		.searchform {
			position: relative;
			--wd-search-btn-w: var(--wd-form-height);
			--wd-form-height: 46px;
			--wd-search-clear-sp: .001px
		}

		.searchform input[type=text] {
			padding-inline-end: calc(var(--wd-search-btn-w) + 30px)
		}

		.searchform .searchsubmit {
			--btn-color: var(--wd-form-color, currentColor);
			--btn-bgcolor: transparent;
			--btn-bgcolor-hover: transparent;
			position: absolute;
			gap: 0;
			inset-block: 0;
			inset-inline-end: 0;
			padding: 0;
			width: var(--wd-search-btn-w);
			min-height: unset;
			border: none;
			box-shadow: none;
			font-weight: 400;
			font-size: 0;
			font-style: unset
		}

		.searchform .searchsubmit:hover:after,
		.searchform .searchsubmit:hover img {
			opacity: .7
		}

		.searchform .searchsubmit:after {
			font-size: calc(var(--wd-form-height)/2.3);
			transition: opacity .2s ease;
			content: "\f130";
			font-family: "woodmart-font"
		}

		.searchform .searchsubmit img {
			max-width: var(--wd-tools-icon-width, 24px);
			transition: opacity .2s ease
		}

		.searchform .searchsubmit:before {
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: calc(var(--wd-form-height)/2.5/-2);
			margin-left: calc(var(--wd-form-height)/2.5/-2);
			opacity: 0;
			transition: opacity .1s ease;
			content: "";
			display: inline-block;
			width: calc(var(--wd-form-height)/2.5);
			height: calc(var(--wd-form-height)/2.5);
			border: 1px solid rgba(0, 0, 0, 0);
			border-left-color: currentColor;
			border-radius: 50%;
			vertical-align: middle;
			animation: wd-rotate 450ms infinite linear var(--wd-anim-state, paused)
		}

		.searchform .searchsubmit.wd-with-img:after {
			content: none
		}

		.searchform.wd-search-loading .searchsubmit {
			transform: translateZ(0)
		}

		.searchform.wd-search-loading .searchsubmit:before {
			opacity: 1;
			transition-duration: .2s;
			--wd-anim-state: running
		}

		.searchform.wd-search-loading .searchsubmit:after,
		.searchform.wd-search-loading .searchsubmit img {
			opacity: 0;
			transition-duration: .1s
		}

		.searchform .wd-clear-search {
			position: absolute;
			top: calc(50% - 12px);
			display: flex;
			align-items: center;
			justify-content: center;
			width: 30px;
			height: 24px;
			inset-inline-end: calc(var(--wd-search-cat-w, 0.001px) + var(--wd-search-btn-w) + var(--wd-search-clear-sp));
			color: var(--wd-form-color, currentColor);
			cursor: pointer
		}

		.searchform .wd-clear-search:before {
			font-size: calc(var(--wd-form-height)/3);
			line-height: 1;
			transition: opacity .2s ease;
			content: "\f112";
			font-family: "woodmart-font"
		}

		.searchform .wd-clear-search:hover:before {
			opacity: .7
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/wd-search-form.css */
	</style>
	<link rel='stylesheet' id='wd-wd-search-results-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/wd-search-results8833.css') }} media='all' />
	<style id="wd-search-style-default-inline-css">
		@media(min-width: 769px) {
			.searchform.wd-style-default:not(.wd-with-cat) .wd-clear-search {
				padding-inline-end: 10px;
				border-inline-end: 1px solid var(--wd-form-brd-color)
			}

			.searchform.wd-style-default.wd-cat-style-default {
				--wd-search-clear-sp: 7px
			}
		}

		@media(max-width: 768.98px) {
			.searchform.wd-style-default .wd-clear-search {
				padding-inline-end: 10px;
				border-inline-end: 1px solid var(--wd-form-brd-color)
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/el-search-style-default.css */
	</style>
	<link rel='stylesheet' id='wd-wd-search-dropdown-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/wd-search-dropdown8833.css') }} media='all' />
	<style id="wd-widget-general-inline-css">
		:is(.widget, .wd-widget, div[class^=vc_wp]) {
			line-height: 1.4;
			--wd-link-color: var(--color-gray-500);
			--wd-link-color-hover: var(--color-gray-800);
			--wd-link-decor: none;
			--wd-link-decor-hover: none
		}

		:is(.widget, .wd-widget, div[class^=vc_wp])>:is(ul, ol) {
			margin-top: 0
		}

		:is(.widget, .wd-widget, div[class^=vc_wp]) :is(ul, ol) {
			list-style: none;
			--list-mb: 0;
			--li-mb: 15px;
			--li-pl: 0
		}

		.widgettitle,
		.widget-title {
			margin-bottom: 20px;
			color: var(--wd-widget-title-color);
			text-transform: var(--wd-widget-title-transform);
			font-weight: var(--wd-widget-title-font-weight);
			font-style: var(--wd-widget-title-font-style);
			font-size: var(--wd-widget-title-font-size);
			font-family: var(--wd-widget-title-font)
		}

		.widget .wp-block-heading {
			font-size: var(--wd-widget-title-font-size)
		}

		.widget {
			margin-bottom: 30px;
			padding-bottom: 30px;
			border-bottom: 1px solid var(--brdcolor-gray-300)
		}

		.widget:last-child {
			margin-bottom: 0;
			padding-bottom: 0;
			border-bottom: none
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/widget-general.css */
	</style>
	<link rel='stylesheet' id='wd-widget-shopping-cart-css'
		href={{ asset('/wp-content/themes/woodmart/css/parts/woo-widget-shopping-cart8833.css') }} media='all' />
	<style id="wd-widget-product-list-inline-css">
		.product_list_widget>li {
			margin-bottom: 15px;
			padding-bottom: 15px;
			border-bottom: 1px solid var(--brdcolor-gray-300)
		}

		.product_list_widget>li>a {
			display: block;
			margin-bottom: 8px
		}

		.product_list_widget>li img {
			float: inline-start;
			margin-inline-end: 15px;
			min-width: 65px;
			max-width: 65px;
			border-radius: calc(var(--wd-brd-radius)/1.5)
		}

		.product_list_widget>li .widget-product-wrap {
			display: flex
		}

		.product_list_widget>li .widget-product-img {
			flex: 0 0 auto;
			overflow: hidden;
			margin-inline-end: 15px
		}

		.product_list_widget>li .widget-product-img img {
			float: none;
			margin-inline-end: 0
		}

		.product_list_widget>li .widget-product-info {
			flex: 1 1 auto
		}

		.product_list_widget>li .widget-product-info .price {
			display: block
		}

		.product_list_widget>li .wd-entities-title {
			margin-bottom: 8px;
			font-size: inherit
		}

		.product_list_widget>li .star-rating {
			margin-bottom: 4px;
			margin-inline-end: 5px
		}

		.product_list_widget>li .reviewer {
			display: block;
			color: var(--color-gray-300)
		}

		.product_list_widget>li:last-child {
			margin-bottom: 0;
			padding-bottom: 0;
			border-bottom: none
		}

		.product_list_widget>li:after {
			content: "";
			display: block;
			clear: both
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/woo-widget-product-list.css */
	</style>
	<style id="wd-bottom-toolbar-inline-css">
		.wd-toolbar {
			position: fixed;
			inset-inline: 0;
			bottom: 0;
			z-index: 350;
			display: flex;
			align-items: center;
			justify-content: space-between;
			overflow-x: auto;
			overflow-y: hidden;
			-webkit-overflow-scrolling: touch;
			padding: 5px;
			height: 55px;
			background-color: var(--bgcolor-white);
			box-shadow: 0 0 9px rgba(0, 0, 0, .12)
		}

		.wd-toolbar>a {
			display: flex;
			align-items: center;
			justify-content: center
		}

		.wd-toolbar>a,
		.wd-toolbar>div {
			flex: 1 0 20%
		}

		.wd-toolbar>a,
		.wd-toolbar>div a {
			height: 45px
		}

		.wd-toolbar .wd-header-cart.wd-design-5 .wd-tools-icon {
			margin: 0
		}

		.wd-toolbar.wd-toolbar-label-show>a,
		.wd-toolbar.wd-toolbar-label-show>div a {
			position: relative;
			padding-bottom: 15px
		}

		.wd-toolbar.wd-toolbar-label-show .wd-toolbar-label {
			display: block
		}

		.global-color-scheme-light .wd-toolbar a {
			color: #fff
		}

		.global-color-scheme-light .wd-toolbar a:hover {
			color: hsla(0, 0%, 100%, .8)
		}

		.wd-toolbar-label {
			position: absolute;
			inset-inline: 10px;
			bottom: 3px;
			display: none;
			overflow: hidden;
			text-align: center;
			text-overflow: ellipsis;
			white-space: nowrap;
			font-weight: 600;
			font-size: 11px;
			line-height: 1;
			padding: 1px 0
		}

		.wd-toolbar-shop {
			--wd-tools-icon: "\f146"
		}

		.wd-toolbar-blog {
			--wd-tools-icon: "\f145"
		}

		.wd-toolbar-home {
			--wd-tools-icon: "\f144"
		}

		.wd-toolbar-sidebar,
		.wd-toolbar-shop-cat {
			--wd-tools-icon: "\f15a"
		}

		.wd-toolbar-sidebar.wd-filter-icon {
			--wd-tools-icon: "\f118"
		}

		.wd-toolbar-link {
			--wd-tools-icon: "\f140"
		}

		.wd-toolbar-link .wd-custom-icon img {
			width: auto;
			height: 20px
		}

		body:not(:has(.wd-nav-side-hidden-mb-on)) .wd-toolbar-shop-cat {
			display: none
		}

		@media(min-width: 1025px) {
			.wd-toolbar {
				display: none
			}
		}

		@media(max-width: 1024px) {
			.sticky-toolbar-on {
				padding-bottom: 55px
			}

			.sticky-toolbar-on .wd-sticky-btn {
				bottom: 55px
			}

			.sticky-toolbar-on .scrollToTop {
				bottom: 67px
			}

			.sticky-toolbar-on .wd-sticky-btn-shown.scrollToTop {
				bottom: calc(12px + 55px + var(--wd-sticky-btn-height))
			}
		}

		@media(min-width: 769px)and (max-width: 1024px) {
			.sticky-toolbar-on.wd-sticky-btn-on {
				padding-bottom: calc(55px + var(--wd-sticky-btn-height))
			}
		}

		@media(max-width: 768.98px) {
			.sticky-toolbar-on.wd-sticky-btn-on-mb {
				padding-bottom: calc(55px + var(--wd-sticky-btn-height))
			}
		}

		/*# sourceURL=https://novaterra.pt/wp-content/themes/woodmart/css/parts/opt-bottom-toolbar.css */
	</style>
	<style id="xts-style-header_423087-inline-css">
		:root {
			--wd-top-bar-h: 40px;
			--wd-top-bar-sm-h: 40px;
			--wd-top-bar-sticky-h: .00001px;
			--wd-top-bar-brd-w: .00001px;

			--wd-header-general-h: 150px;
			--wd-header-general-sm-h: 60px;
			--wd-header-general-sticky-h: .00001px;
			--wd-header-general-brd-w: .00001px;

			--wd-header-bottom-h: 50px;
			--wd-header-bottom-sm-h: 50px;
			--wd-header-bottom-sticky-h: .00001px;
			--wd-header-bottom-brd-w: .00001px;

			--wd-header-clone-h: .00001px;

			--wd-header-brd-w: calc(var(--wd-top-bar-brd-w) + var(--wd-header-general-brd-w) + var(--wd-header-bottom-brd-w));
			--wd-header-h: calc(var(--wd-top-bar-h) + var(--wd-header-general-h) + var(--wd-header-bottom-h) + var(--wd-header-brd-w));
			--wd-header-sticky-h: calc(var(--wd-top-bar-sticky-h) + var(--wd-header-general-sticky-h) + var(--wd-header-bottom-sticky-h) + var(--wd-header-clone-h) + var(--wd-header-brd-w));
			--wd-header-sm-h: calc(var(--wd-top-bar-sm-h) + var(--wd-header-general-sm-h) + var(--wd-header-bottom-sm-h) + var(--wd-header-brd-w));
		}

		.whb-top-bar .wd-dropdown {
			margin-top: -1px;
		}

		.whb-top-bar .wd-dropdown:after {
			height: 10px;
		}






		.whb-header-bottom .wd-dropdown {
			margin-top: 4px;
		}

		.whb-header-bottom .wd-dropdown:after {
			height: 15px;
		}



		.whb-m4vz99bnqdnhhaigz9ty {
			--wd-divider-color: rgba(25, 25, 25, 1);
		}

		.whb-row .whb-8buyjktpo4jp6c7oimzq.wd-tools-element .wd-tools-inner,
		.whb-row .whb-8buyjktpo4jp6c7oimzq.wd-tools-element>a>.wd-tools-icon {
			background-color: rgba(18, 18, 18, 1);
		}

		/*# sourceURL=https://novaterra.pt/wp-content/uploads/2026/07/xts-header_423087-1783445091.css */
	</style>
	
	
	<meta name="generator"
		content="Elementor 4.2.4; features: e_font_icon_svg, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
	<style>
		.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
		.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
			background-image: none !important;
		}

	

		@media screen and (max-height: 640px) {

			.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
			.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
				background-image: none !important;
			}
		}

        .elementor-2668 .elementor-element.elementor-element-39ca2a2 {
  --display:flex;
  --flex-direction:column;
  --container-widget-width:100%;
  --container-widget-height:initial;
  --container-widget-flex-grow:0;
  --container-widget-align-self:initial;
  --flex-wrap-mobile:wrap;
  --margin-top:-40px;
  --margin-bottom:30px;
  --margin-left:0px;
  --margin-right:0px;
}
.elementor-2668 .elementor-element.elementor-element-c72e262 > .elementor-widget-container {
  margin:0px 0px 20px 0px;
}
.elementor-2668 .elementor-element.elementor-element-bc3cb14 > .elementor-widget-container {
  margin:0px 0px 10px 0px;
}
.elementor-2668 .elementor-element.elementor-element-bc3cb14 .woocommerce-form-login.hidden-form {
  max-width:470px;
  background-color:#FFFFFF;
  border-style:none;
}
.elementor-2668 .elementor-element.elementor-element-e391db2 .woocommerce-form-coupon {
  max-width:470px;
  background-color:#FFFFFF;
}
.elementor-2665 .elementor-element.elementor-element-ecbe7f6 {
  --display:flex;
  --flex-direction:row;
  --container-widget-width:initial;
  --container-widget-height:100%;
  --container-widget-flex-grow:1;
  --container-widget-align-self:stretch;
  --flex-wrap-mobile:wrap;
  --gap:30px 30px;
  --row-gap:30px;
  --column-gap:30px;
  --margin-top:0px;
  --margin-bottom:20px;
  --margin-left:0px;
  --margin-right:0px;
}
.elementor-2665 .elementor-element.elementor-element-5d225e4 {
  --display:flex;
  --gap:30px 30px;
  --row-gap:30px;
  --column-gap:30px;
}
.elementor-2665 .elementor-element.elementor-element-c1e36be {
  --display:flex;
  --border-radius:16px 16px 16px 16px;
  --padding-top:30px;
  --padding-bottom:30px;
  --padding-left:30px;
  --padding-right:30px;
}
.elementor-2665 .elementor-element.elementor-element-c1e36be:not(.elementor-motion-effects-element-type-background),
.elementor-2665 .elementor-element.elementor-element-c1e36be > .elementor-motion-effects-container > .elementor-motion-effects-layer {
  background-color:#FFFFFF;
}
.elementor-2665 .elementor-element.elementor-element-d0eb9ec .woocommerce-billing-fields > h3 {
  font-size:32px;
  text-transform:none;
  line-height:1.2em;
}
.elementor-2665 .elementor-element.elementor-element-d2c3de2 {
  --display:flex;
  --border-radius:16px 16px 16px 16px;
  --padding-top:30px;
  --padding-bottom:30px;
  --padding-left:30px;
  --padding-right:30px;
}
.elementor-2665 .elementor-element.elementor-element-d2c3de2:not(.elementor-motion-effects-element-type-background),
.elementor-2665 .elementor-element.elementor-element-d2c3de2 > .elementor-motion-effects-container > .elementor-motion-effects-layer {
  background-color:#FFFFFF;
}
.elementor-2665 .elementor-element.elementor-element-273a195 .title {
  font-size:32px;
  line-height:1.2em;
}
.elementor-2665 .elementor-element.elementor-element-6a74495 .payment_box {
  background-color:#FFFFFF;
}
.elementor-2665 .elementor-element.elementor-element-6a74495 .payment_box:before {
  color:#FFFFFF;
}
.elementor-2665 .elementor-element.elementor-element-6a74495 .woocommerce-terms-and-conditions {
  background-color:#FFFFFF;
}
.elementor-2665 .elementor-element.elementor-element-76471a0 {
  --display:flex;
  --border-radius:16px 16px 16px 16px;
  --padding-top:30px;
  --padding-bottom:20px;
  --padding-left:30px;
  --padding-right:30px;
  --wd-sticky-offset:82px;
}
.elementor-2665 .elementor-element.elementor-element-76471a0:not(.elementor-motion-effects-element-type-background),
.elementor-2665 .elementor-element.elementor-element-76471a0 > .elementor-motion-effects-container > .elementor-motion-effects-layer {
  background-color:#FFFFFF;
}
.elementor-2665 .elementor-element.elementor-element-50a6318 .title {
  font-size:32px;
  line-height:1.2em;
}
.elementor-2665 .elementor-element.elementor-element-91face9 > .elementor-widget-container {
  background-color:#FFFFFF;
  padding:5px 15px 5px 15px;
}
@media(max-width:1024px) {
  .elementor-2665 .elementor-element.elementor-element-ecbe7f6 {
    --gap:30px 30px;
    --row-gap:30px;
    --column-gap:30px;
  }
  .elementor-2665 .elementor-element.elementor-element-d0eb9ec .woocommerce-billing-fields > h3 {
    font-size:28px;
  }
  .elementor-2665 .elementor-element.elementor-element-273a195 .title {
    font-size:28px;
  }
  .elementor-2665 .elementor-element.elementor-element-50a6318 .title {
    font-size:28px;
  }
}
@media(max-width:768px) {
  .elementor-2665 .elementor-element.elementor-element-ecbe7f6 {
    --flex-direction:column;
    --container-widget-width:100%;
    --container-widget-height:initial;
    --container-widget-flex-grow:0;
    --container-widget-align-self:initial;
    --flex-wrap-mobile:wrap;
  }
  .elementor-2665 .elementor-element.elementor-element-5d225e4.e-con {
    --order:99999 /* order end hack */;
  }
}
@media(min-width:769px) {
  .elementor-2665 .elementor-element.elementor-element-5d225e4 {
    --width:60%;
  }
  .elementor-2665 .elementor-element.elementor-element-76471a0 {
    --width:40%;
  }
}
@media(max-width:1024px) and (min-width:769px) {
  .elementor-2665 .elementor-element.elementor-element-5d225e4 {
    --width:100%;
  }
  .elementor-2665 .elementor-element.elementor-element-76471a0 {
    --width:100%;
  }
}

	</style>


    <main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-on"
				role="main">
				<div class="wd-content-area site-content">
					<div class="woocommerce entry-content">
						<link rel="stylesheet" id="elementor-post-2668-css"
							href="/wp-content/uploads/elementor/css/post-2668673e.html" type="text/css"
							media="all">
						<div data-elementor-type="wp-post" data-elementor-id="2668" class="elementor elementor-2668">
							<div class="wd-negative-gap elementor-element elementor-element-39ca2a2 e-flex e-con-boxed e-con e-parent"
								data-id="39ca2a2" data-element_type="container" data-e-type="container">
								<div class="e-con-inner">
									<div class="elementor-element elementor-element-c72e262 wd-page-title-el elementor-widget elementor-widget-wd_page_title"
										data-id="c72e262" data-element_type="widget" data-e-type="widget"
										data-widget_type="wd_page_title.default">
										<div class="elementor-widget-container">
											<div class="wd-page-title page-title  page-title-default title-size-small title-design-default wd-section-stretch color-scheme-light"
												style="">
												<div class="wd-page-title-bg wd-fill">
													<img width="1920" height="410"
														src="/wp-content/uploads/2026/04/edc-hero-section-bg.jpg"
														class="attachment-full size-full" alt="" decoding="async"
														fetchpriority="high"
														srcset="https://novaterra.pt/wp-content/uploads/2026/04/edc-hero-section-bg.jpg 1920w, https://novaterra.pt/wp-content/uploads/2026/04/edc-hero-section-bg-150x32.jpg 150w, https://novaterra.pt/wp-content/uploads/2026/04/edc-hero-section-bg-1200x256.jpg 1200w"
														sizes="(max-width: 1920px) 100vw, 1920px" />
												</div>
												<div class="container">
													<ul class="wd-checkout-steps">
														<li class="step-cart step-inactive">
															<a href="../carrito/index.html">
																<span>{{ __('Carrito de compra') }}</span>
															</a>
														</li>
														<li class="step-checkout step-active">
															<a href="/">
																<span>{{ __('Finalizar compra') }}</span>
															</a>
														</li>
														<li class="step-complete step-inactive">
															<span>{{ __('Pedido completado') }}</span>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-dd526da wd-wc-notices elementor-widget elementor-widget-wd_wc_notices"
										data-id="dd526da" data-element_type="widget" data-e-type="widget"
										data-widget_type="wd_wc_notices.default">
										<div class="elementor-widget-container">
											<div class="woocommerce-notices-wrapper">
										</div>
									</div>
								</div>
							</div>
						</div>

						<p id="js-checkout-empty" class="woocommerce-info" style="display:none;">{{ __('Tu carrito está vacío.') }} <a href="{{ route('shop.index') }}">{{ __('Ver productos') }}</a></p>

						<form name="checkout" method="POST" class="checkout woocommerce-checkout wd-checkout-form"
							action="{{ route('shop.checkout.store') }}" enctype="multipart/form-data"
							aria-label="{{ __('Finalizar compra') }}">
							@csrf
							<link rel="stylesheet" id="elementor-post-2665-css"
								href="/wp-content/uploads/elementor/css/post-26657cd3.html"
								type="text/css" media="all">
							<div data-elementor-type="wp-post" data-elementor-id="2665"
								class="elementor elementor-2665">
								<div class="wd-negative-gap elementor-element elementor-element-ecbe7f6 e-flex e-con-boxed e-con e-parent"
									data-id="ecbe7f6" data-element_type="container" data-e-type="container">
									<div class="e-con-inner">
										<div class="elementor-element elementor-element-5d225e4 e-con-full e-flex e-con e-child"
											data-id="5d225e4" data-element_type="container" data-e-type="container"
											data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
											<div class="elementor-element elementor-element-c1e36be e-con-full e-flex e-con e-child"
												data-id="c1e36be" data-element_type="container" data-e-type="container"
												data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
												<div class="elementor-element elementor-element-d0eb9ec wd-billing-details wd-title-show elementor-widget elementor-widget-wd_checkout_billing_details_form"
													data-id="d0eb9ec" data-element_type="widget" data-e-type="widget"
													data-widget_type="wd_checkout_billing_details_form.default">
													<div class="elementor-widget-container">
														<div class="woocommerce-billing-fields">

															<h3>{{ __('Detalles de facturación') }}</h3>



@php
    $wdCheckoutFirstName = '';
    $wdCheckoutLastName = '';
    if (auth()->check()) {
        $wdCheckoutNameParts = explode(' ', auth()->user()->name, 2);
        $wdCheckoutFirstName = $wdCheckoutNameParts[0] ?? '';
        $wdCheckoutLastName = $wdCheckoutNameParts[1] ?? '';
    }
@endphp
															<div class="woocommerce-billing-fields__field-wrapper">
																<p class="form-row form-row-wide stripe-gateway-checkout-email-field validate-required validate-email"
																	id="billing_email_field" data-priority="1"><label
																		for="billing_email"
																		class="required_field">{{ __('Dirección de correo electrónico&nbsp;') }}<span class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="email" class="input-text "
																			name="billing_email" id="billing_email"
																			placeholder="" value="{{ old('billing_email', auth()->user()->email ?? '') }}" aria-required="true" autocomplete="section-billing billing email" /></span>
																</p>
																<p class="form-row form-row-first validate-required"
																	id="billing_first_name_field" data-priority="10">
																	<label for="billing_first_name"
																		class="required_field">{{ __('Nombre&nbsp;') }}<span
																			class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="text" class="input-text "
																			name="billing_first_name"
																			id="billing_first_name" placeholder=""
																			value="{{ old('billing_first_name', $wdCheckoutFirstName) }}" aria-required="true"
																			autocomplete="section-billing billing given-name" /></span>
																</p>
																<p class="form-row form-row-last validate-required"
																	id="billing_last_name_field" data-priority="20">
																	<label for="billing_last_name"
																		class="required_field">{{ __('Apellidos&nbsp;') }}<span
																			class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="text" class="input-text "
																			name="billing_last_name"
																			id="billing_last_name" placeholder=""
																			value="{{ old('billing_last_name', $wdCheckoutLastName) }}" aria-required="true"
																			autocomplete="section-billing billing family-name" /></span>
																</p>
																<p class="form-row form-row-wide"
																	id="billing_company_field" data-priority="30"><label
																		for="billing_company" class="">{{ __('Nombre de la empresa&nbsp;') }}<span
																			class="optional">{{ __('(opcional)') }}</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="text" class="input-text "
																			name="billing_company" id="billing_company"
																			placeholder="" value=""
																			autocomplete="section-billing billing organization" /></span>
																</p>
																<p class="form-row form-row-wide address-field update_totals_on_change validate-required"
																	id="billing_country_field" data-priority="40"><label
																		for="billing_country"
																		class="required_field">{{ __('País / Región&nbsp;') }}<span
																			class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><select
																			name="billing_country" id="billing_country"
																			class="country_to_state country_select "
																			aria-required="true"
																			autocomplete="section-billing billing country"
																			data-placeholder="{{ __('Selecciona un país/región&hellip;') }}"
																			data-label="País / Región">
																			<option value="">Selecciona un país/región&hellip;</option>
																			<option value="AF">Afganistán</option>
																			<option value="AL">Albania</option>
																			<option value="DE">Alemania</option>
																			<option value="AD">Andorra</option>
																			<option value="AO">Angola</option>
																			<option value="AI">Anguila</option>
																			<option value="AQ">Antártida</option>
																			<option value="AG">Antigua y Barbuda
																			</option>
																			<option value="SA">Arabia Saudita</option>
																			<option value="DZ">Argelia</option>
																			<option value="AR">Argentina</option>
																			<option value="AM">Armenia</option>
																			<option value="AW">Aruba</option>
																			<option value="AU">Australia</option>
																			<option value="AT">Austria</option>
																			<option value="AZ">Azerbaijan</option>
																			<option value="BS">Bahamas</option>
																			<option value="BH">Bahrain</option>
																			<option value="BD">Bangladesh</option>
																			<option value="BB">Barbados</option>
																			<option value="PW">Belau</option>
																			<option value="BE">Bélgica</option>
																			<option value="BZ">Belize</option>
																			<option value="BJ">Benin</option>
																			<option value="BM">Bermuda</option>
																			<option value="BT">Bhutan</option>
																			<option value="BY">Bielorrusia</option>
																			<option value="MM">Birmania</option>
																			<option value="BO">Bolivia</option>
																			<option value="BQ">Bonaire, San Eustaquio y Saba</option>
																			<option value="BA">Bosnia y Herzegovina
																			</option>
																			<option value="BW">Botswana</option>
																			<option value="BR">Brasil</option>
																			<option value="BN">Brunéi</option>
																			<option value="BG">Bulgaria</option>
																			<option value="BF">Burkina Faso</option>
																			<option value="BI">Burundi</option>
																			<option value="CV">Cabo Verde</option>
																			<option value="KH">Camboya</option>
																			<option value="CM">Camerún</option>
																			<option value="CA">Canadá</option>
																			<option value="TD">Chad</option>
																			<option value="CL">Chile</option>
																			<option value="CN">China</option>
																			<option value="CY">Chipre</option>
																			<option value="VA">Ciudad del Vaticano
																			</option>
																			<option value="CO">Colombia</option>
																			<option value="KM">Comoras</option>
																			<option value="CG">Congo (Brazzaville)
																			</option>
																			<option value="CD">Congo (Kinshasa)</option>
																			<option value="KP">Corea del Norte</option>
																			<option value="KR">Corea del Sur</option>
																			<option value="CI">Costa de Marfil</option>
																			<option value="CR">Costa Rica</option>
																			<option value="HR">Croacia</option>
																			<option value="CU">Cuba</option>
																			<option value="CW">Cura&ccedil;ao</option>
																			<option value="DK">Dinamarca</option>
																			<option value="DJ">Djibouti</option>
																			<option value="DM">Dominica</option>
																			<option value="EC">Ecuador</option>
																			<option value="EG">Egipto</option>
																			<option value="SV">El Salvador</option>
																			<option value="AE">Emiratos Árabes Unidos
																			</option>
																			<option value="ER">Eritrea</option>
																			<option value="SK">Eslovaquia</option>
																			<option value="SI">Eslovenia</option>
																			<option value="ES" selected='selected'>
																				{{ __('España') }}</option>
																			<option value="US">Estados Unidos (EEUU)
																			</option>
																			<option value="EE">Estonia</option>
																			<option value="SZ">Esuatini</option>
																			<option value="ET">Etiopía</option>
																			<option value="PH">Filipinas</option>
																			<option value="FI">Finlandia</option>
																			<option value="FJ">Fiyi</option>
																			<option value="FR">Francia</option>
																			<option value="GA">Gabón</option>
																			<option value="GM">Gambia</option>
																			<option value="GE">Georgia</option>
																			<option value="GH">Ghana</option>
																			<option value="GI">Gibraltar</option>
																			<option value="GD">Granada</option>
																			<option value="GR">Grecia</option>
																			<option value="GL">Groenlandia</option>
																			<option value="GP">Guadalupe</option>
																			<option value="GU">Guam</option>
																			<option value="GT">Guatemala</option>
																			<option value="GF">Guayana Francesa</option>
																			<option value="GG">Guernsey</option>
																			<option value="GN">Guinea</option>
																			<option value="GQ">Guinea Ecuatorial
																			</option>
																			<option value="GW">Guinea-Bisáu</option>
																			<option value="GY">Guyana</option>
																			<option value="HT">Haití</option>
																			<option value="HN">Honduras</option>
																			<option value="HK">Hong Kong</option>
																			<option value="HU">Hungría</option>
																			<option value="IN">India</option>
																			<option value="ID">Indonesia</option>
																			<option value="IQ">Irak</option>
																			<option value="IR">Irán</option>
																			<option value="IE">Irlanda</option>
																			<option value="BV">Isla Bouvet</option>
																			<option value="IM">Isla de Man</option>
																			<option value="CX">Isla de Navidad</option>
																			<option value="NF">Isla Norfolk</option>
																			<option value="SH">Isla Santa Elena</option>
																			<option value="IS">Islandia</option>
																			<option value="AX">Islas Åland</option>
																			<option value="KY">Islas Caimán</option>
																			<option value="CC">Islas Cocos</option>
																			<option value="CK">Islas Cook</option>
																			<option value="UM">Islas de ultramar menores de Estados Unidos (EEUU)</option>
																			<option value="FO">Islas Feroe</option>
																			<option value="GS">Islas Georgias y Sandwich del Sur</option>
																			<option value="HM">Islas Heard y McDonald
																			</option>
																			<option value="FK">Islas Malvinas</option>
																			<option value="MP">Islas Marianas del Norte
																			</option>
																			<option value="MH">Islas Marshall</option>
																			<option value="SB">Islas Salomón</option>
																			<option value="TC">Islas Turcas y Caicos
																			</option>
																			<option value="VG">Islas Vírgenes (Británicas)</option>
																			<option value="VI">Islas Vírgenes (EEUU)
																			</option>
																			<option value="IL">Israel</option>
																			<option value="IT">Italia</option>
																			<option value="JM">Jamaica</option>
																			<option value="JP">Japón</option>
																			<option value="JE">Jersey</option>
																			<option value="JO">Jordania</option>
																			<option value="KZ">Kazajistán</option>
																			<option value="KE">Kenia</option>
																			<option value="KG">Kirguistán</option>
																			<option value="KI">Kiribati</option>
																			<option value="XK">Kosovo</option>
																			<option value="KW">Kuwait</option>
																			<option value="LA">Laos</option>
																			<option value="LS">Lesoto</option>
																			<option value="LV">Letonia</option>
																			<option value="LB">Líbano</option>
																			<option value="LR">Liberia</option>
																			<option value="LY">Libia</option>
																			<option value="LI">Liechtenstein</option>
																			<option value="LT">Lituania</option>
																			<option value="LU">Luxemburgo</option>
																			<option value="MO">Macao</option>
																			<option value="MK">Macedonia del Norte
																			</option>
																			<option value="MG">Madagascar</option>
																			<option value="MY">Malasia</option>
																			<option value="MW">Malaui</option>
																			<option value="MV">Maldivas</option>
																			<option value="ML">Malí</option>
																			<option value="MT">Malta</option>
																			<option value="MA">Marruecos</option>
																			<option value="MQ">Martinica</option>
																			<option value="MU">Mauricio</option>
																			<option value="MR">Mauritania</option>
																			<option value="YT">Mayotte</option>
																			<option value="MX">México</option>
																			<option value="FM">Micronesia</option>
																			<option value="MD">Moldavia</option>
																			<option value="MC">Mónaco</option>
																			<option value="MN">Mongolia</option>
																			<option value="ME">Montenegro</option>
																			<option value="MS">Montserrat</option>
																			<option value="MZ">Mozambique</option>
																			<option value="NA">Namibia</option>
																			<option value="NR">Nauru</option>
																			<option value="NP">Nepal</option>
																			<option value="NI">Nicaragua</option>
																			<option value="NE">Níger</option>
																			<option value="NG">Nigeria</option>
																			<option value="NU">Niue</option>
																			<option value="NO">Noruega</option>
																			<option value="NC">Nueva Caledonia</option>
																			<option value="NZ">Nueva Zelanda</option>
																			<option value="OM">Omán</option>
																			<option value="NL">Países Bajos</option>
																			<option value="PK">Pakistán</option>
																			<option value="PA">Panamá</option>
																			<option value="PG">Papúa Nueva Guinea
																			</option>
																			<option value="PY">Paraguay</option>
																			<option value="PE">Perú</option>
																			<option value="PN">Pitcairn</option>
																			<option value="PF">Polinesia Francesa
																			</option>
																			<option value="PL">Polonia</option>
																			<option value="PT">Portugal</option>
																			<option value="PR">Puerto Rico</option>
																			<option value="QA">Qatar</option>
																			<option value="GB">Reino Unido (UK)</option>
																			<option value="CF">República Centroafricana
																			</option>
																			<option value="CZ">República Checa</option>
																			<option value="DO">República Dominicana
																			</option>
																			<option value="RE">Reunión</option>
																			<option value="RW">Ruanda</option>
																			<option value="RO">Rumania</option>
																			<option value="RU">Rusia</option>
																			<option value="EH">Sahara Occidental
																			</option>
																			<option value="WS">Samoa</option>
																			<option value="AS">Samoa Americana</option>
																			<option value="BL">San Bartolomé</option>
																			<option value="KN">San Cristóbal y Nieves
																			</option>
																			<option value="SM">San Marino</option>
																			<option value="SX">San Martín (Países Bajos)
																			</option>
																			<option value="MF">San Martín (parte de Francia)</option>
																			<option value="PM">San Pedro y Miquelón
																			</option>
																			<option value="VC">San Vicente y las Granadinas</option>
																			<option value="LC">Santa Lucía</option>
																			<option value="ST">Santo Tomé y Príncipe
																			</option>
																			<option value="SN">Senegal</option>
																			<option value="RS">Serbia</option>
																			<option value="SC">Seychelles</option>
																			<option value="SL">Sierra Leona</option>
																			<option value="SG">Singapur</option>
																			<option value="SY">Siria</option>
																			<option value="SO">Somalia</option>
																			<option value="LK">Sri Lanka</option>
																			<option value="ZA">Sudáfrica</option>
																			<option value="SD">Sudán</option>
																			<option value="SS">Sudán del Sur</option>
																			<option value="SE">Suecia</option>
																			<option value="CH">Suiza</option>
																			<option value="SR">Surinam</option>
																			<option value="SJ">Svalbard y Jan Mayen
																			</option>
																			<option value="TH">Tailandia</option>
																			<option value="TW">Taiwán</option>
																			<option value="TZ">Tanzania</option>
																			<option value="TJ">Tayikistán</option>
																			<option value="IO">Territorio Británico del Océano Índico</option>
																			<option value="TF">Territorios australes franceses</option>
																			<option value="PS">Territorios Palestinos
																			</option>
																			<option value="TL">Timor Oriental</option>
																			<option value="TG">Togo</option>
																			<option value="TK">Tokelau</option>
																			<option value="TO">Tonga</option>
																			<option value="TT">Trinidad y Tobago
																			</option>
																			<option value="TN">Túnez</option>
																			<option value="TM">Turkmenistán</option>
																			<option value="TR">Turquía</option>
																			<option value="TV">Tuvalu</option>
																			<option value="UA">Ucrania</option>
																			<option value="UG">Uganda</option>
																			<option value="UY">Uruguay</option>
																			<option value="UZ">Uzbekistán</option>
																			<option value="VU">Vanuatu</option>
																			<option value="VE">Venezuela</option>
																			<option value="VN">Vietnam</option>
																			<option value="WF">Wallis y Futuna</option>
																			<option value="YE">Yemen</option>
																			<option value="ZM">Zambia</option>
																			<option value="ZW">Zimbabue</option>
																		</select><noscript><button type="submit"
																				name="woocommerce_checkout_update_totals"
																				value="Actualizar país/región">{{ __('Actualizar país/región') }}</button></noscript></span>
																</p>
																<p class="form-row form-row-wide address-field validate-required"
																	id="billing_address_1_field" data-priority="50">
																	<label for="billing_address_1"
																		class="required_field">{{ __('Dirección de la calle&nbsp;') }}<span class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="text" class="input-text "
																			name="billing_address_1"
																			id="billing_address_1"
																			placeholder="{{ __('Nombre de la calle y número de la casa') }}"
																			value="" aria-required="true"
																			autocomplete="section-billing billing address-line1" /></span>
																</p>
																<p class="form-row form-row-wide address-field"
																	id="billing_address_2_field" data-priority="60">
																	<label for="billing_address_2"
																		class="screen-reader-text">{{ __('Apartamento, habitación, escalera, etc.&nbsp;') }}<span
																			class="optional">{{ __('(opcional)') }}</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="text" class="input-text "
																			name="billing_address_2"
																			id="billing_address_2"
																			placeholder="{{ __('Apartamento, habitación, etc. (opcional)') }}"
																			value=""
																			autocomplete="section-billing billing address-line2" /></span>
																</p>
																<p class="form-row form-row-wide address-field validate-required validate-postcode"
																	id="billing_postcode_field" data-priority="65">
																	<label for="billing_postcode"
																		class="required_field">{{ __('Código postal / ZIP&nbsp;') }}<span class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="text" class="input-text "
																			name="billing_postcode"
																			id="billing_postcode" placeholder=""
																			value="" aria-required="true"
																			autocomplete="section-billing billing postal-code" /></span>
																</p>
																<p class="form-row form-row-wide address-field validate-required"
																	id="billing_city_field" data-priority="70"><label
																		for="billing_city"
																		class="required_field">{{ __('Población&nbsp;') }}<span
																			class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="text" class="input-text "
																			name="billing_city" id="billing_city"
																			placeholder="" value="" aria-required="true"
																			autocomplete="section-billing billing address-level2" /></span>
																</p>
																<p class="form-row form-row-wide address-field validate-required validate-state"
																	id="billing_state_field" data-priority="80"><label
																		for="billing_state"
																		class="required_field">{{ __('Provincia&nbsp;') }}<span
																			class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><select
																			name="billing_state" id="billing_state"
																			class="state_select " aria-required="true"
																			autocomplete="section-billing billing address-level1"
																			data-placeholder="{{ __('Elige una opción&hellip;') }}"
																			data-input-classes=""
																			data-label="Provincia">
																			<option value="">Elige una opción&hellip;
																			</option>
																			<option value="C">La Coruña</option>
																			<option value="VI">Álava</option>
																			<option value="AB">Albacete</option>
																			<option value="A">Alicante</option>
																			<option value="AL">Almería</option>
																			<option value="O">Asturias</option>
																			<option value="AV">Ávila</option>
																			<option value="BA">Badajoz</option>
																			<option value="PM">Baleares</option>
																			<option value="B" selected='selected'>
																				{{ __('Barcelona') }}</option>
																			<option value="BU">Burgos</option>
																			<option value="CC">Cáceres</option>
																			<option value="CA">Cádiz</option>
																			<option value="S">Cantabria</option>
																			<option value="CS">Castellón</option>
																			<option value="CE">Ceuta</option>
																			<option value="CR">Ciudad Real</option>
																			<option value="CO">Córdoba</option>
																			<option value="CU">Cuenca</option>
																			<option value="GI">Gerona</option>
																			<option value="GR">Granada</option>
																			<option value="GU">Guadalajara</option>
																			<option value="SS">Guipúzcoa</option>
																			<option value="H">Huelva</option>
																			<option value="HU">Huesca</option>
																			<option value="J">Jaén</option>
																			<option value="LO">La Rioja</option>
																			<option value="GC">Las Palmas</option>
																			<option value="LE">León</option>
																			<option value="L">Lérida</option>
																			<option value="LU">Lugo</option>
																			<option value="M">Madrid</option>
																			<option value="MA">Málaga</option>
																			<option value="ML">Melilla</option>
																			<option value="MU">Murcia</option>
																			<option value="NA">Navarra</option>
																			<option value="OR">Orense</option>
																			<option value="P">Palencia</option>
																			<option value="PO">Pontevedra</option>
																			<option value="SA">Salamanca</option>
																			<option value="TF">Santa Cruz de Tenerife
																			</option>
																			<option value="SG">Segovia</option>
																			<option value="SE">Sevilla</option>
																			<option value="SO">Soria</option>
																			<option value="T">Tarragona</option>
																			<option value="TE">Teruel</option>
																			<option value="TO">Toledo</option>
																			<option value="V">Valencia</option>
																			<option value="VA">Valladolid</option>
																			<option value="BI">Vizcaya</option>
																			<option value="ZA">Zamora</option>
																			<option value="Z">Zaragoza</option>
																		</select></span></p>
																<p class="form-row form-row-wide validate-required validate-phone"
																	id="billing_phone_field" data-priority="100"><label
																		for="billing_phone"
																		class="required_field">{{ __('Teléfono&nbsp;') }}<span
																			class="required"
																			aria-hidden="true">*</span></label><span
																		class="woocommerce-input-wrapper"><input
																			type="tel" class="input-text "
																			name="billing_phone" id="billing_phone"
																			placeholder="" value="" aria-required="true"
																			autocomplete="section-billing billing tel" /></span>
																</p>
															</div>

															<wc-order-attribution-inputs></wc-order-attribution-inputs>
														</div>

													</div>
												</div>
												<div class="elementor-element elementor-element-a57a1e5 wd-shipping-details wd-title-show elementor-widget elementor-widget-wd_checkout_shipping_details_from"
													data-id="a57a1e5" data-element_type="widget" data-e-type="widget"
													data-widget_type="wd_checkout_shipping_details_from.default">
													<div class="elementor-widget-container">
														<div class="woocommerce-shipping-fields">

															<h3 id="ship-to-different-address">
																<label
																	class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
																	<input id="ship-to-different-address-checkbox"
																		class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
																		type="checkbox" name="ship_to_different_address"
																		value="1" /> <span>{{ __('¿Enviar a una dirección diferente?') }}</span>
																</label>
															</h3>

															<div class="shipping_address">


																<div class="woocommerce-shipping-fields__field-wrapper">
																	<p class="form-row form-row-first validate-required"
																		id="shipping_first_name_field"
																		data-priority="10"><label
																			for="shipping_first_name"
																			class="required_field">{{ __('Nombre&nbsp;') }}<span
																				class="required"
																				aria-hidden="true">*</span></label><span
																			class="woocommerce-input-wrapper"><input
																				type="text" class="input-text "
																				name="shipping_first_name"
																				id="shipping_first_name" placeholder=""
																				value="" aria-required="true"
																				autocomplete="section-shipping shipping given-name" /></span>
																	</p>
																	<p class="form-row form-row-last validate-required"
																		id="shipping_last_name_field"
																		data-priority="20"><label
																			for="shipping_last_name"
																			class="required_field">{{ __('Apellidos&nbsp;') }}<span
																				class="required"
																				aria-hidden="true">*</span></label><span
																			class="woocommerce-input-wrapper"><input
																				type="text" class="input-text "
																				name="shipping_last_name"
																				id="shipping_last_name" placeholder=""
																				value="" aria-required="true"
																				autocomplete="section-shipping shipping family-name" /></span>
																	</p>
																	<p class="form-row form-row-wide"
																		id="shipping_company_field" data-priority="30">
																		<label for="shipping_company" class="">{{ __('Nombre de la empresa&nbsp;') }}<span
																				class="optional">{{ __('(opcional)') }}</span></label><span
																			class="woocommerce-input-wrapper"><input
																				type="text" class="input-text "
																				name="shipping_company"
																				id="shipping_company" placeholder=""
																				value=""
																				autocomplete="section-shipping shipping organization" /></span>
																	</p>
																	<p class="form-row form-row-wide address-field update_totals_on_change validate-required"
																		id="shipping_country_field" data-priority="40">
																		<label for="shipping_country"
																			class="required_field">{{ __('País / Región&nbsp;') }}<span class="required"
																				aria-hidden="true">*</span></label><span
																			class="woocommerce-input-wrapper"><select
																				name="shipping_country"
																				id="shipping_country"
																				class="country_to_state country_select "
																				aria-required="true"
																				autocomplete="section-shipping shipping country"
																				data-placeholder="{{ __('Selecciona un país/región&hellip;') }}"
																				data-label="País / Región">
																				<option value="">Selecciona un país/región&hellip;</option>
																				<option value="AF">Afganistán</option>
																				<option value="AL">Albania</option>
																				<option value="DE">Alemania</option>
																				<option value="AD">Andorra</option>
																				<option value="AO">Angola</option>
																				<option value="AI">Anguila</option>
																				<option value="AQ">Antártida</option>
																				<option value="AG">Antigua y Barbuda
																				</option>
																				<option value="SA">Arabia Saudita
																				</option>
																				<option value="DZ">Argelia</option>
																				<option value="AR">Argentina</option>
																				<option value="AM">Armenia</option>
																				<option value="AW">Aruba</option>
																				<option value="AU">Australia</option>
																				<option value="AT">Austria</option>
																				<option value="AZ">Azerbaijan</option>
																				<option value="BS">Bahamas</option>
																				<option value="BH">Bahrain</option>
																				<option value="BD">Bangladesh</option>
																				<option value="BB">Barbados</option>
																				<option value="PW">Belau</option>
																				<option value="BE">Bélgica</option>
																				<option value="BZ">Belize</option>
																				<option value="BJ">Benin</option>
																				<option value="BM">Bermuda</option>
																				<option value="BT">Bhutan</option>
																				<option value="BY">Bielorrusia</option>
																				<option value="MM">Birmania</option>
																				<option value="BO">Bolivia</option>
																				<option value="BQ">Bonaire, San Eustaquio y Saba</option>
																				<option value="BA">Bosnia y Herzegovina
																				</option>
																				<option value="BW">Botswana</option>
																				<option value="BR">Brasil</option>
																				<option value="BN">Brunéi</option>
																				<option value="BG">Bulgaria</option>
																				<option value="BF">Burkina Faso</option>
																				<option value="BI">Burundi</option>
																				<option value="CV">Cabo Verde</option>
																				<option value="KH">Camboya</option>
																				<option value="CM">Camerún</option>
																				<option value="CA">Canadá</option>
																				<option value="TD">Chad</option>
																				<option value="CL">Chile</option>
																				<option value="CN">China</option>
																				<option value="CY">Chipre</option>
																				<option value="VA">Ciudad del Vaticano
																				</option>
																				<option value="CO">Colombia</option>
																				<option value="KM">Comoras</option>
																				<option value="CG">Congo (Brazzaville)
																				</option>
																				<option value="CD">Congo (Kinshasa)
																				</option>
																				<option value="KP">Corea del Norte
																				</option>
																				<option value="KR">Corea del Sur
																				</option>
																				<option value="CI">Costa de Marfil
																				</option>
																				<option value="CR">Costa Rica</option>
																				<option value="HR">Croacia</option>
																				<option value="CU">Cuba</option>
																				<option value="CW">Cura&ccedil;ao
																				</option>
																				<option value="DK">Dinamarca</option>
																				<option value="DJ">Djibouti</option>
																				<option value="DM">Dominica</option>
																				<option value="EC">Ecuador</option>
																				<option value="EG">Egipto</option>
																				<option value="SV">El Salvador</option>
																				<option value="AE">Emiratos Árabes Unidos</option>
																				<option value="ER">Eritrea</option>
																				<option value="SK">Eslovaquia</option>
																				<option value="SI">Eslovenia</option>
																				<option value="ES" selected='selected'>
																					{{ __('España') }}</option>
																				<option value="US">Estados Unidos (EEUU)
																				</option>
																				<option value="EE">Estonia</option>
																				<option value="SZ">Esuatini</option>
																				<option value="ET">Etiopía</option>
																				<option value="PH">Filipinas</option>
																				<option value="FI">Finlandia</option>
																				<option value="FJ">Fiyi</option>
																				<option value="FR">Francia</option>
																				<option value="GA">Gabón</option>
																				<option value="GM">Gambia</option>
																				<option value="GE">Georgia</option>
																				<option value="GH">Ghana</option>
																				<option value="GI">Gibraltar</option>
																				<option value="GD">Granada</option>
																				<option value="GR">Grecia</option>
																				<option value="GL">Groenlandia</option>
																				<option value="GP">Guadalupe</option>
																				<option value="GU">Guam</option>
																				<option value="GT">Guatemala</option>
																				<option value="GF">Guayana Francesa
																				</option>
																				<option value="GG">Guernsey</option>
																				<option value="GN">Guinea</option>
																				<option value="GQ">Guinea Ecuatorial
																				</option>
																				<option value="GW">Guinea-Bisáu</option>
																				<option value="GY">Guyana</option>
																				<option value="HT">Haití</option>
																				<option value="HN">Honduras</option>
																				<option value="HK">Hong Kong</option>
																				<option value="HU">Hungría</option>
																				<option value="IN">India</option>
																				<option value="ID">Indonesia</option>
																				<option value="IQ">Irak</option>
																				<option value="IR">Irán</option>
																				<option value="IE">Irlanda</option>
																				<option value="BV">Isla Bouvet</option>
																				<option value="IM">Isla de Man</option>
																				<option value="CX">Isla de Navidad
																				</option>
																				<option value="NF">Isla Norfolk</option>
																				<option value="SH">Isla Santa Elena
																				</option>
																				<option value="IS">Islandia</option>
																				<option value="AX">Islas Åland</option>
																				<option value="KY">Islas Caimán</option>
																				<option value="CC">Islas Cocos</option>
																				<option value="CK">Islas Cook</option>
																				<option value="UM">Islas de ultramar menores de Estados Unidos (EEUU)
																				</option>
																				<option value="FO">Islas Feroe</option>
																				<option value="GS">Islas Georgias y Sandwich del Sur</option>
																				<option value="HM">Islas Heard y McDonald</option>
																				<option value="FK">Islas Malvinas
																				</option>
																				<option value="MP">Islas Marianas del Norte</option>
																				<option value="MH">Islas Marshall
																				</option>
																				<option value="SB">Islas Salomón
																				</option>
																				<option value="TC">Islas Turcas y Caicos
																				</option>
																				<option value="VG">Islas Vírgenes (Británicas)</option>
																				<option value="VI">Islas Vírgenes (EEUU)
																				</option>
																				<option value="IL">Israel</option>
																				<option value="IT">Italia</option>
																				<option value="JM">Jamaica</option>
																				<option value="JP">Japón</option>
																				<option value="JE">Jersey</option>
																				<option value="JO">Jordania</option>
																				<option value="KZ">Kazajistán</option>
																				<option value="KE">Kenia</option>
																				<option value="KG">Kirguistán</option>
																				<option value="KI">Kiribati</option>
																				<option value="XK">Kosovo</option>
																				<option value="KW">Kuwait</option>
																				<option value="LA">Laos</option>
																				<option value="LS">Lesoto</option>
																				<option value="LV">Letonia</option>
																				<option value="LB">Líbano</option>
																				<option value="LR">Liberia</option>
																				<option value="LY">Libia</option>
																				<option value="LI">Liechtenstein
																				</option>
																				<option value="LT">Lituania</option>
																				<option value="LU">Luxemburgo</option>
																				<option value="MO">Macao</option>
																				<option value="MK">Macedonia del Norte
																				</option>
																				<option value="MG">Madagascar</option>
																				<option value="MY">Malasia</option>
																				<option value="MW">Malaui</option>
																				<option value="MV">Maldivas</option>
																				<option value="ML">Malí</option>
																				<option value="MT">Malta</option>
																				<option value="MA">Marruecos</option>
																				<option value="MQ">Martinica</option>
																				<option value="MU">Mauricio</option>
																				<option value="MR">Mauritania</option>
																				<option value="YT">Mayotte</option>
																				<option value="MX">México</option>
																				<option value="FM">Micronesia</option>
																				<option value="MD">Moldavia</option>
																				<option value="MC">Mónaco</option>
																				<option value="MN">Mongolia</option>
																				<option value="ME">Montenegro</option>
																				<option value="MS">Montserrat</option>
																				<option value="MZ">Mozambique</option>
																				<option value="NA">Namibia</option>
																				<option value="NR">Nauru</option>
																				<option value="NP">Nepal</option>
																				<option value="NI">Nicaragua</option>
																				<option value="NE">Níger</option>
																				<option value="NG">Nigeria</option>
																				<option value="NU">Niue</option>
																				<option value="NO">Noruega</option>
																				<option value="NC">Nueva Caledonia
																				</option>
																				<option value="NZ">Nueva Zelanda
																				</option>
																				<option value="OM">Omán</option>
																				<option value="NL">Países Bajos</option>
																				<option value="PK">Pakistán</option>
																				<option value="PA">Panamá</option>
																				<option value="PG">Papúa Nueva Guinea
																				</option>
																				<option value="PY">Paraguay</option>
																				<option value="PE">Perú</option>
																				<option value="PN">Pitcairn</option>
																				<option value="PF">Polinesia Francesa
																				</option>
																				<option value="PL">Polonia</option>
																				<option value="PT">Portugal</option>
																				<option value="PR">Puerto Rico</option>
																				<option value="QA">Qatar</option>
																				<option value="GB">Reino Unido (UK)
																				</option>
																				<option value="CF">República Centroafricana</option>
																				<option value="CZ">República Checa
																				</option>
																				<option value="DO">República Dominicana
																				</option>
																				<option value="RE">Reunión</option>
																				<option value="RW">Ruanda</option>
																				<option value="RO">Rumania</option>
																				<option value="RU">Rusia</option>
																				<option value="EH">Sahara Occidental
																				</option>
																				<option value="WS">Samoa</option>
																				<option value="AS">Samoa Americana
																				</option>
																				<option value="BL">San Bartolomé
																				</option>
																				<option value="KN">San Cristóbal y Nieves</option>
																				<option value="SM">San Marino</option>
																				<option value="SX">San Martín (Países Bajos)</option>
																				<option value="MF">San Martín (parte de Francia)</option>
																				<option value="PM">San Pedro y Miquelón
																				</option>
																				<option value="VC">San Vicente y las Granadinas</option>
																				<option value="LC">Santa Lucía</option>
																				<option value="ST">Santo Tomé y Príncipe
																				</option>
																				<option value="SN">Senegal</option>
																				<option value="RS">Serbia</option>
																				<option value="SC">Seychelles</option>
																				<option value="SL">Sierra Leona</option>
																				<option value="SG">Singapur</option>
																				<option value="SY">Siria</option>
																				<option value="SO">Somalia</option>
																				<option value="LK">Sri Lanka</option>
																				<option value="ZA">Sudáfrica</option>
																				<option value="SD">Sudán</option>
																				<option value="SS">Sudán del Sur
																				</option>
																				<option value="SE">Suecia</option>
																				<option value="CH">Suiza</option>
																				<option value="SR">Surinam</option>
																				<option value="SJ">Svalbard y Jan Mayen
																				</option>
																				<option value="TH">Tailandia</option>
																				<option value="TW">Taiwán</option>
																				<option value="TZ">Tanzania</option>
																				<option value="TJ">Tayikistán</option>
																				<option value="IO">Territorio Británico del Océano Índico</option>
																				<option value="TF">Territorios australes franceses</option>
																				<option value="PS">Territorios Palestinos</option>
																				<option value="TL">Timor Oriental
																				</option>
																				<option value="TG">Togo</option>
																				<option value="TK">Tokelau</option>
																				<option value="TO">Tonga</option>
																				<option value="TT">Trinidad y Tobago
																				</option>
																				<option value="TN">Túnez</option>
																				<option value="TM">Turkmenistán</option>
																				<option value="TR">Turquía</option>
																				<option value="TV">Tuvalu</option>
																				<option value="UA">Ucrania</option>
																				<option value="UG">Uganda</option>
																				<option value="UY">Uruguay</option>
																				<option value="UZ">Uzbekistán</option>
																				<option value="VU">Vanuatu</option>
																				<option value="VE">Venezuela</option>
																				<option value="VN">Vietnam</option>
																				<option value="WF">Wallis y Futuna
																				</option>
																				<option value="YE">Yemen</option>
																				<option value="ZM">Zambia</option>
																				<option value="ZW">Zimbabue</option>
																			</select><noscript><button type="submit"
																					name="woocommerce_checkout_update_totals"
																					value="Actualizar país/región">{{ __('Actualizar país/región') }}</button></noscript></span>
																	</p>
																	<p class="form-row form-row-wide address-field validate-required"
																		id="shipping_address_1_field"
																		data-priority="50"><label
																			for="shipping_address_1"
																			class="required_field">{{ __('Dirección de la calle&nbsp;') }}<span class="required"
																				aria-hidden="true">*</span></label><span
																			class="woocommerce-input-wrapper"><input
																				type="text" class="input-text "
																				name="shipping_address_1"
																				id="shipping_address_1"
																				placeholder="{{ __('Nombre de la calle y número de la casa') }}"
																				value="" aria-required="true"
																				autocomplete="section-shipping shipping address-line1" /></span>
																	</p>
																	<p class="form-row form-row-wide address-field"
																		id="shipping_address_2_field"
																		data-priority="60"><label
																			for="shipping_address_2"
																			class="screen-reader-text">{{ __('Apartamento, habitación, escalera, etc.&nbsp;') }}<span
																				class="optional">{{ __('(opcional)') }}</span></label><span
																			class="woocommerce-input-wrapper"><input
																				type="text" class="input-text "
																				name="shipping_address_2"
																				id="shipping_address_2"
																				placeholder="{{ __('Apartamento, habitación, etc. (opcional)') }}"
																				value=""
																				autocomplete="section-shipping shipping address-line2" /></span>
																	</p>
																	<p class="form-row form-row-wide address-field validate-required validate-postcode"
																		id="shipping_postcode_field" data-priority="65">
																		<label for="shipping_postcode"
																			class="required_field">{{ __('Código postal / ZIP&nbsp;') }}<span class="required"
																				aria-hidden="true">*</span></label><span
																			class="woocommerce-input-wrapper"><input
																				type="text" class="input-text "
																				name="shipping_postcode"
																				id="shipping_postcode" placeholder=""
																				value="" aria-required="true"
																				autocomplete="section-shipping shipping postal-code" /></span>
																	</p>
																	<p class="form-row form-row-wide address-field validate-required"
																		id="shipping_city_field" data-priority="70">
																		<label for="shipping_city"
																			class="required_field">{{ __('Población&nbsp;') }}<span
																				class="required"
																				aria-hidden="true">*</span></label><span
																			class="woocommerce-input-wrapper"><input
																				type="text" class="input-text "
																				name="shipping_city" id="shipping_city"
																				placeholder="" value=""
																				aria-required="true"
																				autocomplete="section-shipping shipping address-level2" /></span>
																	</p>
																	<p class="form-row form-row-wide address-field validate-required validate-state"
																		id="shipping_state_field" data-priority="80">
																		<label for="shipping_state"
																			class="required_field">{{ __('Provincia&nbsp;') }}<span
																				class="required"
																				aria-hidden="true">*</span></label><span
																			class="woocommerce-input-wrapper"><select
																				name="shipping_state"
																				id="shipping_state"
																				class="state_select "
																				aria-required="true"
																				autocomplete="section-shipping shipping address-level1"
																				data-placeholder="{{ __('Elige una opción&hellip;') }}"
																				data-input-classes=""
																				data-label="Provincia">
																				<option value="">Elige una opción&hellip;</option>
																				<option value="C">La Coruña</option>
																				<option value="VI">Álava</option>
																				<option value="AB">Albacete</option>
																				<option value="A">Alicante</option>
																				<option value="AL">Almería</option>
																				<option value="O">Asturias</option>
																				<option value="AV">Ávila</option>
																				<option value="BA">Badajoz</option>
																				<option value="PM">Baleares</option>
																				<option value="B" selected='selected'>
																					{{ __('Barcelona') }}</option>
																				<option value="BU">Burgos</option>
																				<option value="CC">Cáceres</option>
																				<option value="CA">Cádiz</option>
																				<option value="S">Cantabria</option>
																				<option value="CS">Castellón</option>
																				<option value="CE">Ceuta</option>
																				<option value="CR">Ciudad Real</option>
																				<option value="CO">Córdoba</option>
																				<option value="CU">Cuenca</option>
																				<option value="GI">Gerona</option>
																				<option value="GR">Granada</option>
																				<option value="GU">Guadalajara</option>
																				<option value="SS">Guipúzcoa</option>
																				<option value="H">Huelva</option>
																				<option value="HU">Huesca</option>
																				<option value="J">Jaén</option>
																				<option value="LO">La Rioja</option>
																				<option value="GC">Las Palmas</option>
																				<option value="LE">León</option>
																				<option value="L">Lérida</option>
																				<option value="LU">Lugo</option>
																				<option value="M">Madrid</option>
																				<option value="MA">Málaga</option>
																				<option value="ML">Melilla</option>
																				<option value="MU">Murcia</option>
																				<option value="NA">Navarra</option>
																				<option value="OR">Orense</option>
																				<option value="P">Palencia</option>
																				<option value="PO">Pontevedra</option>
																				<option value="SA">Salamanca</option>
																				<option value="TF">Santa Cruz de Tenerife</option>
																				<option value="SG">Segovia</option>
																				<option value="SE">Sevilla</option>
																				<option value="SO">Soria</option>
																				<option value="T">Tarragona</option>
																				<option value="TE">Teruel</option>
																				<option value="TO">Toledo</option>
																				<option value="V">Valencia</option>
																				<option value="VA">Valladolid</option>
																				<option value="BI">Vizcaya</option>
																				<option value="ZA">Zamora</option>
																				<option value="Z">Zaragoza</option>
																			</select></span></p>
																	<p class="form-row form-row-wide validate-required validate-phone"
																		id="shipping_phone_field" data-priority="100">
																		<label for="shipping_phone"
																			class="required_field">{{ __('Teléfono&nbsp;') }}<span
																				class="required"
																				aria-hidden="true">*</span></label><span
																			class="woocommerce-input-wrapper"><input
																				type="tel" class="input-text "
																				name="shipping_phone"
																				id="shipping_phone" placeholder=""
																				value="" aria-required="true"
																				autocomplete="section-shipping shipping tel" /></span>
																	</p>
																</div>


															</div>

														</div>
														<div class="woocommerce-additional-fields">



															<div class="woocommerce-additional-fields__field-wrapper">
																<p class="form-row notes" id="order_comments_field"
																	data-priority=""><label for="order_comments"
																		class="">{{ __('Notas del pedido&nbsp;') }}<span
																			class="optional">{{ __('(opcional)') }}</span></label><span
																		class="woocommerce-input-wrapper"><textarea
																			name="customer_note" class="input-text "
																			id="order_comments"
																			placeholder="{{ __('Notas sobre tu pedido, por ejemplo, notas especiales para la entrega.') }}"
																			rows="2" cols="5"></textarea></span></p>
															</div>


															<wc-order-attribution-inputs></wc-order-attribution-inputs>
														</div>
													</div>
												</div>
											</div>
											<div class="elementor-element elementor-element-d2c3de2 e-con-full e-flex e-con e-child"
												data-id="d2c3de2" data-element_type="container" data-e-type="container"
												data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
												<div class="elementor-element elementor-element-273a195 wd-width-100 elementor-widget elementor-widget-wd_title"
													data-id="273a195" data-element_type="widget" data-e-type="widget"
													data-widget_type="wd_title.default">
													<div class="elementor-widget-container">
														<div
															class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


															<div class="liner-continer">
																<h4
																	class="woodmart-title-container title wd-fontsize-l">
																	{{ __('Payment information') }}</h4>
															</div>

														</div>
													</div>
												</div>
												<div class="elementor-element elementor-element-6a74495 wd-btn-align-full-width wd-payment-methods elementor-widget elementor-widget-wd_checkout_payment_methods"
													data-id="6a74495" data-element_type="widget" data-e-type="widget"
													data-widget_type="wd_checkout_payment_methods.default">
													<div class="elementor-widget-container">
														<div id="js-checkout-delivery-estimate"></div>
														<div id="payment" class="woocommerce-checkout-payment">
															<ul class="wc_payment_methods payment_methods methods"
																aria-label="{{ __('Métodos de pago') }}">
																<li class="wc_payment_method payment_method_bacs">
																	<input id="payment_method_bacs" type="radio"
																		class="input-radio" name="payment_method"
																		value="bacs" checked='checked'
																		data-order_button_text="" />

																	<label for="payment_method_bacs">
																		{{ __('Transferencia bancaria directa') }} </label>
																	<div class="payment_box payment_method_bacs">
																		<p>{{ __('Realiza tu pago mediante transferencia bancaria. Usa el número de tu pedido como concepto o referencia. Tu pedido se preparará y enviará una vez confirmemos la recepción del importe. Recibirás un email con todos los datos bancarios al finalizar la compra.') }}<br />
																			{{ __('⚠️ IMPORTANTE: debes indicar el NÚMERO DE TU PEDIDO como concepto o referencia de la transferencia. Sin esta referencia no podremos identificar tu pago y tu pedido se retrasará') }}</p>
																	</div>
																</li>
															</ul>
															<div class="form-row place-order">
																<noscript>
																	{{ __('Debido a que tu navegador no es compatible con JavaScript o lo tiene desactivado, por favor, asegúrate de hacer clic en el botón') }} <em>{{ __('Actualizar totales') }}</em> {{ __('antes de realizar tu pedido. De no hacerlo, se te podría cobrar más de la cantidad indicada arriba.') }} <br /><button type="submit"
																		class="button alt"
																		name="woocommerce_checkout_update_totals"
																		value="Actualizar totales">{{ __('Actualizar totales') }}</button>
																</noscript>

																<div class="woocommerce-terms-and-conditions-wrapper">
																	<div class="woocommerce-privacy-policy-text"></div>
																</div>


																<button type="submit" class="button alt"
																	name="woocommerce_checkout_place_order"
																	id="place_order" value="Realizar el pedido"
																	data-value="Realizar el pedido">{{ __('Realizar el pedido') }}</button>

																<input type="hidden"
																	id="woocommerce-process-checkout-nonce"
																	name="woocommerce-process-checkout-nonce"
																	value="558537b794" /><input type="hidden"
																	name="_wp_http_referer"
																	value="/finalizar-compra/" />
															</div>
														</div>
														<div id="wc-stripe-checkout-session-data"
															data-checkout-session="{&quot;session_id&quot;:&quot;&quot;,&quot;client_secret&quot;:&quot;&quot;,&quot;revision&quot;:&quot;&quot;,&quot;status&quot;:&quot;uninitialized&quot;,&quot;message&quot;:&quot;&quot;,&quot;save_payment_method_enabled&quot;:false}"
															hidden></div>
													</div>
												</div>
											</div>
										</div>
										<div class="wd-sticky-container-lg wd-sticky-container-md-sm elementor-element elementor-element-76471a0 e-con-full e-flex e-con e-child"
											data-id="76471a0" data-element_type="container" data-e-type="container"
											data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
											<div class="elementor-element elementor-element-50a6318 wd-width-100 elementor-widget elementor-widget-wd_title"
												data-id="50a6318" data-element_type="widget" data-e-type="widget"
												data-widget_type="wd_title.default">
												<div class="elementor-widget-container">
													<div
														class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


														<div class="liner-continer">
															<h4 class="woodmart-title-container title wd-fontsize-l">
																{{ __('Your order') }}</h4>
														</div>

													</div>
												</div>
											</div>
											<div class="elementor-element elementor-element-91face9 wd-order-table wd-manage-on elementor-widget elementor-widget-wd_checkout_order_review"
												data-id="91face9" data-element_type="widget" data-e-type="widget"
												data-widget_type="wd_checkout_order_review.default">
												<div class="elementor-widget-container">
													<table class="shop_table woocommerce-checkout-review-order-table">
														<thead>
															<tr>
																<th class="product-name">{{ __('Producto') }}</th>
																<th class="product-total">{{ __('Subtotal') }}</th>
															</tr>
														</thead>
														<tbody id="js-checkout-items">
														</tbody>
														<tfoot>

															<tr class="cart-subtotal">
																<th>{{ __('Subtotal') }}</th>
																<td><span class="woocommerce-Price-amount amount"><bdi><span
																				class="woocommerce-Price-currencySymbol"
																				translate="no">&euro;</span><span id="js-checkout-subtotal-amount">1.439.867,58</span></bdi></span>
																</td>
															</tr>




															<tr class="woocommerce-shipping-totals shipping">
																<th>{{ __('Envío') }}</th>
																<td data-title="{{ __('Envío') }}">
																	<ul id="shipping_method"
																		class="woocommerce-shipping-methods">
																		<li>
																			<input type="hidden"
																				name="shipping_method[0]" data-index="0"
																				id="shipping_method_0_free_shipping1"
																				value="free_shipping:1"
																				class="shipping_method" /><label
																				for="shipping_method_0_free_shipping1">{{ __('Envío gratuito') }}</label>
																		</li>
																	</ul>


																</td>
															</tr>






															<tr class="order-total">
																<th>{{ __('Total') }}</th>
																<td><strong><span
																			class="woocommerce-Price-amount amount"><bdi><span
																					class="woocommerce-Price-currencySymbol"
																					translate="no">&euro;</span><span id="js-checkout-total-amount">1.439.867,58</span></bdi></span></strong>
																</td>
															</tr>


														</tfoot>
													</table>
													<wc-order-attribution-inputs></wc-order-attribution-inputs>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</main>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form.woocommerce-checkout');
    var itemsBody = document.getElementById('js-checkout-items');
    var emptyNotice = document.getElementById('js-checkout-empty');

    var deliveryEstimateEl = document.getElementById('js-checkout-delivery-estimate');
    if (deliveryEstimateEl && window.Shop) {
        deliveryEstimateEl.innerHTML = window.Shop.deliveryEstimateHtml('pellets-delivery-checkout');
    }

    function renderCheckoutReview() {
        var items = window.Shop.readCart();

        if (emptyNotice) {
            emptyNotice.style.display = items.length ? 'none' : '';
        }
        if (form) {
            form.style.display = items.length ? '' : 'none';
        }

        if (!items.length) {
            return;
        }

        if (itemsBody) {
            itemsBody.innerHTML = items.map(function (item) {
                var lineTotal = window.Shop.formatPrice(item.price * item.qty);
                return '<tr class="cart_item">' +
                    '<td class="product-name">' + window.Shop.escapeHtml(item.name) + ' <strong class="product-quantity">&times; ' + item.qty + '</strong></td>' +
                    '<td class="product-total"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">&euro;</span>' + lineTotal + '</bdi></span></td>' +
                    '</tr>';
            }).join('');
        }

        var totals = window.Shop.totals(items);
        var subtotalEl = document.getElementById('js-checkout-subtotal-amount');
        var totalEl = document.getElementById('js-checkout-total-amount');
        if (subtotalEl) {
            subtotalEl.textContent = window.Shop.formatPrice(totals.subtotal);
        }
        if (totalEl) {
            totalEl.textContent = window.Shop.formatPrice(totals.total);
        }
    }

    renderCheckoutReview();
    document.addEventListener('cart:updated', renderCheckoutReview);

    if (!form) {
        return;
    }

    function showCheckoutError(html) {
        var box = document.getElementById('js-checkout-errors');
        if (!box) {
            box = document.createElement('div');
            box.id = 'js-checkout-errors';
            box.className = 'woocommerce-error';
            form.insertBefore(box, form.firstChild);
        }
        box.innerHTML = html;
    }

    function clearCheckoutError() {
        var box = document.getElementById('js-checkout-errors');
        if (box) {
            box.parentNode.removeChild(box);
        }
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        clearCheckoutError();

        var submitBtn = document.getElementById('place_order');
        var originalText = submitBtn ? submitBtn.textContent : '';
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Procesando...';
        }

        var stateField = form.elements['billing_state'];
        var noteField = document.getElementById('order_comments');
        var paymentField = form.querySelector('input[name="payment_method"]:checked');

        var payload = {
            billing_first_name: form.elements['billing_first_name'].value,
            billing_last_name: form.elements['billing_last_name'].value,
            billing_email: form.elements['billing_email'].value,
            billing_phone: form.elements['billing_phone'].value,
            billing_company: form.elements['billing_company'].value,
            billing_country: form.elements['billing_country'].value,
            billing_address_1: form.elements['billing_address_1'].value,
            billing_address_2: form.elements['billing_address_2'].value,
            billing_postcode: form.elements['billing_postcode'].value,
            billing_city: form.elements['billing_city'].value,
            billing_state: stateField ? stateField.value : '',
            customer_note: noteField ? noteField.value : '',
            payment_method: paymentField ? paymentField.value : 'bacs',
            items: window.Shop.readCart().map(function (item) {
                return { id: item.id, quantity: item.qty };
            }),
        };

        function restoreButton() {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        }

        fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify(payload),
        }).then(function (res) {
            return res.json().then(function (data) {
                return { ok: res.ok, data: data };
            });
        }).then(function (result) {
            if (result.ok && result.data && result.data.success) {
                window.Shop.clearCart();
                window.location.href = result.data.redirect;
                return;
            }

            restoreButton();

            if (result.data && result.data.errors) {
                var messages = [];
                Object.keys(result.data.errors).forEach(function (field) {
                    result.data.errors[field].forEach(function (msg) {
                        messages.push('<p>' + window.Shop.escapeHtml(msg) + '</p>');
                    });
                });
                showCheckoutError(messages.join(''));
            } else {
                showCheckoutError('<p>Ha ocurrido un error. Inténtalo de nuevo.</p>');
            }
        }).catch(function () {
            restoreButton();
            showCheckoutError('<p>Ha ocurrido un error. Inténtalo de nuevo.</p>');
        });
    });
});
</script>
@endpush

@endsection
