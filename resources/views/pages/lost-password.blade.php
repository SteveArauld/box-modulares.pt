@extends('layouts.app')

@section('title', 'Contraseña perdida | '.config('app.name'))

<style>
    .lost_reset_password .button {
  width:100%;
  padding:var(--btn-accented-padding, var(--btn-padding, 5px 20px));
  min-height:var(--btn-accented-height, var(--btn-height, 42px));
  font-size:var(--btn-accented-font-size, var(--btn-font-size, 13px));
  border-radius:var(--btn-accented-brd-radius);
  color:var(--btn-accented-color);
  box-shadow:var(--btn-accented-box-shadow);
  background-color:var(--btn-accented-bgcolor);
  text-transform:var(--btn-accented-transform, var(--btn-transform, uppercase));
  font-weight:var(--btn-accented-font-weight, var(--btn-font-weight, 600));
  font-family:var(--btn-accented-font-family, var(--btn-font-family, inherit));
  font-style:var(--btn-accented-font-style, var(--btn-font-style, unset))
}
.lost_reset_password .button:hover {
  color:var(--btn-accented-color-hover);
  box-shadow:var(--btn-accented-box-shadow-hover);
  background-color:var(--btn-accented-bgcolor-hover)
}
.lost_reset_password .button:active {
  box-shadow:var(--btn-accented-box-shadow-active);
  bottom:var(--btn-accented-bottom-active, 0)
}
.lost_reset_password .form-row {
  width:100%
}
.wd-builder-off .lost_reset_password {
  max-width:470px;
  margin-inline:auto
}

/*# sourceURL=/wp-content/themes/woodmart/css/parts/woo-page-lost-password.css */

</style>
@section('content')

		<div class="wd-page-content main-page-wrapper">

			<link rel="stylesheet" id="wd-page-title-css"
				href="..//wp-content/themes/woodmart/css/parts/page-title8833.css" type="text/css"
				media="all" />
			<div class="wd-page-title page-title  page-title-default title-size-small title-design-default color-scheme-light"
				style="">
				<div class="wd-page-title-bg wd-fill">
					<img width="1920" height="410" src="..//wp-content/uploads/2026/04/edc-hero-section-bg.jpg"
						class="attachment-full size-full" alt="" decoding="async" fetchpriority="high" />
				</div>
				<div class="container">
					<h1 class="entry-title title">
						{{ __('Contraseña perdida') }} </h1>


					<nav class="wd-breadcrumbs"><a href="/">{{ __('Inicio') }}</a><span
							class="wd-delimiter">•</span><span class="wd-last">{{ __('Mi cuenta') }}</span></nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-off"
				role="main">


				<div class="wd-content-area site-content">
					<article id="post-11" class="entry-content post-11 page type-page status-publish hentry">
						<div class="woocommerce">
							<div class="woocommerce-notices-wrapper">
								@if (session('status'))
									<p class="woocommerce-message">{{ session('status') }}</p>
								@endif
								@error('user_login')
									<p class="woocommerce-error">{{ $message }}</p>
								@enderror
							</div>
							<form method="post" action="{{ route('shop.lost-password.send') }}" class="woocommerce-ResetPassword lost_reset_password">
								@csrf

								<p>{{ __('¿Perdiste tu contraseña? Por favor, introduce tu nombre de usuario o correo electrónico. Recibirás un enlace para crear una contraseña nueva por correo electrónico.') }} </p>
								<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
									<label for="user_login">{{ __('Nombre de usuario o correo electrónico&nbsp;') }}<span
											class="required" aria-hidden="true">*</span><span
											class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="text"
										name="user_login" id="user_login" autocomplete="username" required
										aria-required="true" />
								</p>

								<div class="clear"></div>


								<p class="woocommerce-form-row form-row">
									<button type="submit" class="woocommerce-Button button"
										value="Restablecer contraseña">{{ __('Restablecer contraseña') }}</button>
								</p>
							</form>
						</div>


					</article>



				</div>



				<link rel="stylesheet" id="wd-widget-collapse-css"
					href="..//wp-content/themes/woodmart/css/parts/opt-widget-collapse8833.css"
					type="text/css" media="all" />
			</main>

		</div>
@endsection