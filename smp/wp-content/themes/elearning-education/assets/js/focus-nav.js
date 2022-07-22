( function( window, document ) {
  function elearning_education_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const elearning_education_nav = document.querySelector( '.sidenav' );
      if ( ! elearning_education_nav || ! elearning_education_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...elearning_education_nav.querySelectorAll( 'input, a, button' )],
        elearning_education_lastEl = elements[ elements.length - 1 ],
        elearning_education_firstEl = elements[0],
        elearning_education_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && elearning_education_lastEl === elearning_education_activeEl ) {
        e.preventDefault();
        elearning_education_firstEl.focus();
      }
      if ( shiftKey && tabKey && elearning_education_firstEl === elearning_education_activeEl ) {
        e.preventDefault();
        elearning_education_lastEl.focus();
      }
    } );
  }
  elearning_education_keepFocusInMenu();
} )( window, document );