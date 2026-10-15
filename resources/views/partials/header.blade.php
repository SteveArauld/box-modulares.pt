{{-- <div class="mm-top-bar">
	<div class="container mm-top-bar-inner">
		<span class="mm-top-bar-label">{{ __('Idioma') }}:</span>
		<ul class="mm-top-bar-langs">
			@foreach ($availableLocales as $code => $label)
				<li class="{{ $code === $currentLocale ? 'mm-top-bar-lang-active' : '' }}">
					<a href="{{ route('locale.switch', $code) }}">{{ $label }}</a>
				</li>
			@endforeach
		</ul>
	</div>
</div> --}}
<header class="whb-header whb-header_423087 whb-sticky-shadow whb-scroll-stick whb-sticky-real">
			<div class="whb-main-header">

				<div
					class="whb-row whb-general-header whb-not-sticky-row whb-without-bg whb-without-border whb-color-dark whb-flex-flex-middle">
					<div class="container">
						<div class="whb-flex-row whb-general-header-inner">
							<div class="whb-column whb-col-left whb-column8 whb-visible-lg">
								<div class="site-logo whb-jey7bav40wk7t8zxlr1t wd-switch-logo">
									<a href="/" class="wd-logo wd-main-logo" rel="home"
										aria-label="{{ __('Logotipo del sitio') }}">
										<img width="175" height="47" src="{{ asset('assets/images/logo/nova-terra-logo.svg') }}"
											class="attachment-full size-full" alt="{{ config('app.name') }}" style="max-width:175px;"
											decoding="async"/> </a>

								</div>
							</div>
							<div class="whb-column whb-col-center whb-column9 whb-visible-lg">
								<nav class="wd-header-nav wd-header-main-nav text-center whb-g5a42yquk75unrrcc76x"
									role="navigation" aria-label="{{ __('Navegación principal') }}">
									<ul id="menu-main-menu-edc"
										class="menu wd-nav wd-nav-header wd-nav-main wd-style-default wd-gap-m">
										<li id="menu-item-6034"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-120 menu-item-6034 item-level-0 menu-simple-dropdown wd-event-hover {{ request()->routeIs('home') ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ route('home') }}" class="woodmart-nav-link"><span
													class="nav-link-text">{{ __('Inicio') }}</span></a></li>
										@foreach ($navTree as $entry)
											<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat item-level-0 {{ $entry['children']->isNotEmpty() ? 'menu-item-has-children menu-simple-dropdown' : 'menu-simple-dropdown' }} wd-event-hover {{ $entry['active'] ? 'current-menu-item current_page_item' : '' }}">
												<a href="{{ $entry['href'] }}" class="woodmart-nav-link"><span
														class="nav-link-text">{{ $entry['label'] }}</span></a>
												@if ($entry['children']->isNotEmpty())
													<div class="color-scheme-dark wd-design-default wd-dropdown-menu wd-dropdown">
														<div class="container wd-entry-content">
															<ul class="wd-sub-menu color-scheme-dark">
																@foreach ($entry['children'] as $child)
																	<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat item-level-1 wd-event-hover {{ $child['active'] ? 'current-menu-item current_page_item' : '' }}">
																		<a href="{{ $child['href'] }}"
																			class="woodmart-nav-link">{{ $child['label'] }}</a>
																	</li>
																@endforeach
															</ul>
														</div>
													</div>
												@endif
											</li>
										@endforeach
										<li id="menu-item-6056"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6056 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="contactanos/" class="woodmart-nav-link"><span
													class="nav-link-text">{{ __('Contáctanos') }}</span></a></li>
									</ul>
								</nav>
							</div>
							<div class="whb-column whb-col-right whb-column10 whb-visible-lg">
								<div class="wd-header-search wd-tools-element wd-design-1 wd-style-icon wd-display-full-screen whb-uw84u23jz1337k4d87hh"
									title="{{ __('Buscar') }}">
									<a href="#" rel="nofollow">
										<span class="wd-tools-icon"></span>
									</a>
								</div>
								<div
									class="wd-header-my-account wd-tools-element wd-event-hover wd-design-1 wd-style-icon whb-2x15qwfhcl3o3ujdxh9z">
									<a href="mi-cuenta/" title="{{ __('Mi cuenta') }}">

										<span class="wd-tools-icon">
										</span>


									</a>

									<div class="wd-dropdown wd-dropdown-register  color-scheme-dark">
										<div class="login-dropdown-inner woocommerce">
											<span class="wd-heading">
												<span class="title">
													{{ __('Iniciar sesión') }} </span>
												<a class="create-account-link" href="{{ route('shop.my-account') }}">{{ __('Crear una cuenta') }} </a>
											</span>
											<form method="post" class="login woocommerce-form woocommerce-form-login"
												action="{{ route('login') }}">
												@csrf
												@error('login')<span class="woocommerce-error" style="display:block;color:#c0392b;font-size:12px;margin-bottom:8px;">{{ $message }}</span>@enderror



												<p
													class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
													<label for="username">{{ __('Nombre de usuario o correo electrónico') }}&nbsp;<span class="required"
															aria-hidden="true">*</span><span
															class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
													<input type="email"
														class="woocommerce-Input woocommerce-Input--text input-text"
														name="email" id="username" autocomplete="username"
														value="{{ old('email') }}" />
												</p>
												<p
													class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-password">
													<label for="password">{{ __('Contraseña') }}&nbsp;<span class="required"
															aria-hidden="true">*</span><span
															class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
													<input class="woocommerce-Input woocommerce-Input--text input-text"
														type="password" name="password" id="password"
														autocomplete="current-password" />
												</p>


												<p class="form-row form-row-btn">
													<button
														type="submit"
														class="button btn btn-accent woocommerce-button woocommerce-form-login__submit"
														name="login" value="{{ __('Iniciar sesión') }}">{{ __('Iniciar sesión') }}</button>
												</p>

												<p class="login-form-footer">
													<a href="{{ route('shop.lost-password') }}"
														class="woocommerce-LostPassword lost_password">{{ __('¿Ha olvidado su contraseña?') }}</a>
													<label
														class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
														<input
															class="woocommerce-form__input woocommerce-form__input-checkbox"
															name="remember" type="checkbox" value="1"
															title="{{ __('Recordarme') }}" aria-label="{{ __('Recordarme') }}" />
														<span>{{ __('Recordarme') }}</span>
													</label>
												</p>


											</form>

										</div>
									</div>
								</div>

								<div class="whb-space-element whb-2x1n4a0aisve7ytt1rt8 " style="width:10px;"></div>
								<div class="wd-header-divider whb-divider-default whb-m4vz99bnqdnhhaigz9ty">
									
								</div>

								<div class="whb-space-element whb-wbe46k9j7ph9c86j6g33 " style="width:10px;"></div>

								<div
									class="wd-header-cart wd-tools-element wd-design-7 cart-widget-opener wd-style-text wd-with-wrap whb-8buyjktpo4jp6c7oimzq">
									<link rel="stylesheet" id="wd-header-cart-css"
										href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-cart8833.css') }}
										type="text/css" media="all" /> <a href="carrito/"
										title="{{ __('Carrito de compra') }}">
										<span class="wd-tools-inner">

											<span class="wd-tools-icon">
												<span class="wd-cart-number wd-tools-count">0
													<span>{{ __('artículos') }}</span></span>
											</span>


											<span class="wd-tools-text">

												<span class="wd-cart-subtotal"><span
														class="woocommerce-Price-amount amount"><bdi><span
																class="woocommerce-Price-currencySymbol"
																translate="no">&euro;</span>0</bdi></span></span>
											</span>

										</span>
									</a>
								</div>
							</div>
							<div class="whb-column whb-mobile-left whb-column_mobile2 whb-hidden-lg">
								<div
									class="wd-tools-element wd-header-mobile-nav wd-style-icon wd-design-1 whb-340gzk4ac2oxval15pnh">
									<a href="#" rel="nofollow" aria-label="{{ __('Abrir menú móvil') }}">
										<span class="wd-tools-icon">
										</span>

									</a>
								</div>
							</div>
							<div class="whb-column whb-mobile-center whb-column_mobile3 whb-hidden-lg">
								<div class="site-logo whb-ep1ny3r4ky7wli5rao3g wd-switch-logo">
									<a href="/" class="wd-logo wd-main-logo" rel="home"
										aria-label="{{ __('Logotipo del sitio') }}">
										<img width="150" height="40" src="{{ asset('assets/images/logo/nova-terra-logo.svg') }}"
											class="attachment-full size-full" alt="{{ config('app.name') }}"
											decoding="async"
											/> </a>

								</div>
							</div>
							<div class="whb-column whb-mobile-right whb-column_mobile4 whb-hidden-lg">

								<div
									class="wd-header-cart wd-tools-element wd-design-1 cart-widget-opener wd-style-icon whb-bg41lzhdhceld7novk8u">
									<a href="carrito/" title="{{ __('Carrito de compra') }}">

										<span class="wd-tools-icon">
										</span>



									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>