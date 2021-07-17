<header>
            <a href="#main-menu"
                id="main-menu-toggle"
                class="menu-toggle"
                aria-label="Open main menu">
                <span class="sr-only">Open main menu</span>
                <span class="fa fa-bars ml-auto mr-3" aria-hidden="true"></span>
            </a>
            
            <h5 class="logo text-white mt-3 text-center font-weight-bold ml-4 ">Testez votre niveau de culture generale</h5>
            
            <nav id="main-menu" class="main-menu" aria-label="Main menu">
                <a href="#main-menu-toggle"
                id="main-menu-close"
                class="menu-close"
                aria-label="Close main menu">
                <span class="sr-only">Close main menu</span>
                <span class="fa fa-close" aria-hidden="true"></span>
                </a>
                <ul>
                <li class="ml-
                auto mr-md-3 text-white"><a href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a></li>
                <li class="ddnone"><a href="<?= WEB_ROUTE.'?controlleurs=joueur&views=meilleurs' ?>">Meilleures scores</a></li>
                <li  class="ddnone"><a href="<?= WEB_ROUTE.'?controlleurs=joueur&views=jeu' ?>">retour</a></li>
                </ul>
            </nav>
            <a href="#main-menu-toggle"
                class="backdrop"
                tabindex="-1"
                aria-hidden="true" hidden></a>
            </header>
            <style>
                /* Screen reader only */
                @media  screen and (min-width: 800px){
                    .ddnone{
                        display: none;
                    }
                }
                @media  screen and (max-width: 800px){

                }
                @media  screen and (min-width: 770px){
                    .ddnone{
                        display: none;
                    }
                }
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0,0,0,0);
  border: 0;
}

/* Button styling */
.menu-toggle {
  display: inline-block;
  padding: .75em 15px;
  line-height: 1em;
  font-size: 1em;
  color: #333;
}

.menu-toggle:hover,
.menu-toggle:focus {
  color: #c00;
}

/*
 Default styles + Mobile first
 Offscreen menu style
*/
.main-menu {
  position: absolute;
  display: none;
  left: -200px;
  top: 0;
  height: 100%;
	overflow-y: scroll;
	overflow-x: visible;
	transition: left 0.3s ease,
				      box-shadow 0.3s ease;
	z-index: 999;
}

.main-menu ul {
  list-style: none;
  margin: 0;
  padding: 2.5em 0 0;
  /* Hide shadow w/ -8px while 'closed' */
  -webkit-box-shadow: -8px 0 8px rgba(0,0,0,.5);
     -moz-box-shadow: -8px 0 8px rgba(0,0,0,.5);
          box-shadow: -8px 0 8px rgba(0,0,0,.5);
  min-height: 100%;
  width: 200px;
  background: #1a1a1a;
}

.main-menu a {
  display: block;
  padding: .75em 15px;
  line-height: 1em;
  font-size: 1em;
  color: #fff;
  text-decoration: none;
  border-bottom: 1px solid #383838;
}

.main-menu li:first-child a {
  border-top: 1px solid #383838;
}

.main-menu a:hover,
.main-menu a:focus {
  background: #333;
  text-decoration: underline;
}

.main-menu .menu-close {
  position: absolute;
  right: 0;
  top: 0;
}

.main-menu:target,
.main-menu[aria-expanded="true"] {
  display: block;
  left: 0;
  outline: none;
  -moz-box-shadow: 3px 0 12px rgba(0,0,0,.25);
  -webkit-box-shadow: 3px 0 12px rgba(0,0,0,.25);
  box-shadow: 3px 0 12px rgba(0,0,0,.25);
}

.main-menu:target .menu-close,
.main-menu[aria-expanded="true"] .menu-close {
  z-index: 1001;
}

.main-menu:target ul,
.main-menu[aria-expanded="true"] ul {
  position: relative;
  z-index: 1000;
}


.main-menu:target + .backdrop,
.main-menu[aria-expanded="true"] + .backdrop{
  position: absolute;
  display: block;  
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 998;
  background: #000;
  background: rgba(0,0,0,.85);
  cursor: default;
}

@supports (position: fixed) {
  .main-menu,
  .main-menu:target + .backdrop,
  .main-menu[aria-expanded="true"] + .backdrop{
    position: fixed;
  }
}


@media (min-width: 768px) {
  .menu-toggle,
  .main-menu .menu-close {
    display: none;
  }
  
  /* Undo positioning of off-canvas menu */
  .main-menu {
    position: relative;
		left: auto;
		top: auto;
		height: auto;
    display: block;
  }
  
  .main-menu ul {
    display: flex;
    
    /* Undo off-canvas styling */
    padding: 0;
    -webkit-box-shadow: none;
       -moz-box-shadow: none;
            box-shadow: none;
    height: auto;
    width: auto;
    background: none;
  }
  
  .main-menu a {
    color: #06c;
    border: 0 !important; /* Remove borders from off-canvas styling */
  }
  
  .main-menu a:hover,
  .main-menu a:focus {
    background: none; /* Remove background from off-canvas styling */
    color: #c00;
  }
}

/*
 Demo purposes only
*/
*,
*:before,
*:after {
  box-sizing: border-box;
}

header {
  padding: 20px;
  display: flex;
  align-items: baseline;
}

article {
  padding: 30px;
  width: 55em;
  font-size: 16px;
  line-height: 1.5em;
}

article h2 {
  font-weight: 500;
  font-size: 28px;
}

.logo {
  margin: 0 30px 0 10px;
  font-size: 1.5em;
}


            </style>