/**
 * Podcast Core Studio: search overlay and hero slideshow.
 */
( function () {
	// Search overlay: any .pct-search-toggle opens the overlay it controls.
	document.querySelectorAll( '.pct-search-toggle' ).forEach( ( toggle ) => {
		const overlay = document.getElementById( toggle.getAttribute( 'aria-controls' ) );
		if ( ! overlay ) {
			return;
		}
		const input = overlay.querySelector( 'input[type="search"]' );
		const close = overlay.querySelector( '.pct-search-close' );

		const open = () => {
			overlay.hidden = false;
			toggle.setAttribute( 'aria-expanded', 'true' );
			document.body.classList.add( 'pct-search-open' );
			if ( input ) {
				input.focus();
			}
		};
		const hide = () => {
			overlay.hidden = true;
			toggle.setAttribute( 'aria-expanded', 'false' );
			document.body.classList.remove( 'pct-search-open' );
			toggle.focus();
		};

		toggle.addEventListener( 'click', open );
		if ( close ) {
			close.addEventListener( 'click', hide );
		}
		overlay.addEventListener( 'click', ( e ) => e.target === overlay && hide() );
		document.addEventListener( 'keydown', ( e ) => e.key === 'Escape' && ! overlay.hidden && hide() );
	} );

	// Hero slideshow: with more than one image in .pct-hero__media, crossfade them.
	const reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	document.querySelectorAll( '.pct-hero__media' ).forEach( ( media ) => {
		const slides = media.querySelectorAll( '.wp-block-image' );
		if ( slides.length < 2 ) {
			return;
		}
		media.classList.add( 'is-slideshow' );
		slides[ 0 ].classList.add( 'is-active' );
		if ( reduceMotion ) {
			return;
		}
		let current = 0;
		const interval = parseInt( media.dataset.interval || '4500', 10 );
		setInterval( () => {
			slides[ current ].classList.remove( 'is-active' );
			current = ( current + 1 ) % slides.length;
			slides[ current ].classList.add( 'is-active' );
		}, interval );
	} );
} )();
