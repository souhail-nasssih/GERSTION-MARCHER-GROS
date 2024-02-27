 <!-- BEGIN: Header-->
 <header class="page-topbar" id="header">
     <div class="navbar navbar-fixed">
         <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
             <div class="nav-wrapper">
                 <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                     <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Materialize" data-search="template-list">
                     <ul class="search-list collection display-none"></ul>
                 </div>
                 <ul class="navbar-list right">
                     <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="#" data-target="translation-dropdown"><span class="flag-icon flag-icon-gb"></span></a></li>
                     <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                     <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
                     <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">5</small></i></a></li>
                     <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="../s/app-assets/images/avatar/avatar-7.png" alt="avatar"><i></i></span></a></li>
                     <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
                 </ul>
                 <!-- translation-button-->
                 <ul class="dropdown-content" id="translation-dropdown">
                     <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="en"><i class="flag-icon flag-icon-gb"></i> English</a></li>
                     <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a></li>
                     <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></li>
                     <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a></li>
                 </ul>
                 <!-- notifications-dropdown-->
                 <ul class="dropdown-content" id="notifications-dropdown">
                     <li>
                         <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
                     </li>
                     <li class="divider"></li>
                     <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                         <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                     </li>
                     <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                         <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                     </li>
                     <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                         <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                     </li>
                     <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                         <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                     </li>
                     <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                         <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                     </li>
                 </ul>
                 <!-- profile-dropdown-->
                 <ul class="dropdown-content" id="profile-dropdown">
                     <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
                     <li><a class="grey-text text-darken-1" href="app-chat.html"><i class="material-icons">chat_bubble_outline</i> Chat</a></li>
                     <li><a class="grey-text text-darken-1" href="page-faq.html"><i class="material-icons">help_outline</i> Help</a></li>
                     <li class="divider"></li>
                     <li><a class="grey-text text-darken-1" href="user-lock-screen.html"><i class="material-icons">lock_outline</i> Lock</a></li>
                     <li><a class="grey-text text-darken-1" href="user-login.html"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                 </ul>
             </div>
             <nav class="display-none search-sm">
                 <div class="nav-wrapper">
                     <form id="navbarForm">
                         <div class="input-field search-input-sm">
                             <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                             <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                             <ul class="search-list collection search-list-sm display-none"></ul>
                         </div>
                     </form>
                 </div>
             </nav>
         </nav>
     </div>
 </header>
 <!-- END: Header-->
 <ul class="display-none" id="default-search-main">
     <li class="auto-suggestion-title"><a class="collection-item" href="#">
             <h6 class="search-title">FILES</h6>
         </a></li>
     <li class="auto-suggestion"><a class="collection-item" href="#">
             <div class="display-flex">
                 <div class="display-flex align-item-center flex-grow-1">
                     <div class="avatar"><img src="../s/app-assets/images/icon/pdf-image.png" width="24" height="30" alt="sample image"></div>
                     <div class="member-info display-flex flex-column"><span class="black-text">Two new item submitted</span><small class="grey-text">Marketing Manager</small></div>
                 </div>
                 <div class="status"><small class="grey-text">17kb</small></div>
             </div>
         </a></li>
     <li class="auto-suggestion"><a class="collection-item" href="#">
             <div class="display-flex">
                 <div class="display-flex align-item-center flex-grow-1">
                     <div class="avatar"><img src="../s/app-assets/images/icon/doc-image.png" width="24" height="30" alt="sample image"></div>
                     <div class="member-info display-flex flex-column"><span class="black-text">52 Doc file Generator</span><small class="grey-text">FontEnd Developer</small></div>
                 </div>
                 <div class="status"><small class="grey-text">550kb</small></div>
             </div>
         </a></li>
     <li class="auto-suggestion"><a class="collection-item" href="#">
             <div class="display-flex">
                 <div class="display-flex align-item-center flex-grow-1">
                     <div class="avatar"><img src="../s/app-assets/images/icon/xls-image.png" width="24" height="30" alt="sample image"></div>
                     <div class="member-info display-flex flex-column"><span class="black-text">25 Xls File Uploaded</span><small class="grey-text">Digital Marketing Manager</small></div>
                 </div>
                 <div class="status"><small class="grey-text">20kb</small></div>
             </div>
         </a></li>
     <li class="auto-suggestion"><a class="collection-item" href="#">
             <div class="display-flex">
                 <div class="display-flex align-item-center flex-grow-1">
                     <div class="avatar"><img src="../s/app-assets/images/icon/jpg-image.png" width="24" height="30" alt="sample image"></div>
                     <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small class="grey-text">Web Designer</small></div>
                 </div>
                 <div class="status"><small class="grey-text">37kb</small></div>
             </div>
         </a></li>
     <li class="auto-suggestion-title"><a class="collection-item" href="#">
             <h6 class="search-title">MEMBERS</h6>
         </a></li>
     <li class="auto-suggestion"><a class="collection-item" href="#">
             <div class="display-flex">
                 <div class="display-flex align-item-center flex-grow-1">
                     <div class="avatar"><img class="circle" src="../s/app-assets/images/avatar/avatar-7.png" width="30" alt="sample image"></div>
                     <div class="member-info display-flex flex-column"><span class="black-text">John Doe</span><small class="grey-text">UI designer</small></div>
                 </div>
             </div>
         </a></li>
     <li class="auto-suggestion"><a class="collection-item" href="#">
             <div class="display-flex">
                 <div class="display-flex align-item-center flex-grow-1">
                     <div class="avatar"><img class="circle" src="../s/app-assets/images/avatar/avatar-8.png" width="30" alt="sample image"></div>
                     <div class="member-info display-flex flex-column"><span class="black-text">Michal Clark</span><small class="grey-text">FontEnd Developer</small></div>
                 </div>
             </div>
         </a></li>
     <li class="auto-suggestion"><a class="collection-item" href="#">
             <div class="display-flex">
                 <div class="display-flex align-item-center flex-grow-1">
                     <div class="avatar"><img class="circle" src="../s/app-assets/images/avatar/avatar-10.png" width="30" alt="sample image"></div>
                     <div class="member-info display-flex flex-column"><span class="black-text">Milena Gibson</span><small class="grey-text">Digital Marketing</small></div>
                 </div>
             </div>
         </a></li>
     <li class="auto-suggestion"><a class="collection-item" href="#">
             <div class="display-flex">
                 <div class="display-flex align-item-center flex-grow-1">
                     <div class="avatar"><img class="circle" src="../s/app-assets/images/avatar/avatar-12.png" width="30" alt="sample image"></div>
                     <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small class="grey-text">Web Designer</small></div>
                 </div>
             </div>
         </a></li>
 </ul>
 <ul class="display-none" id="page-search-title">
     <li class="auto-suggestion-title"><a class="collection-item" href="#">
             <h6 class="search-title">PAGES</h6>
         </a></li>
 </ul>
 <ul class="display-none" id="search-not-found">
     <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
 </ul>



 <!-- BEGIN: SideNav-->
 <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
     <div class="brand-sidebar">
         <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down " src="../s/app-assets/images/logo/materialize-logo.png" alt="materialize logo"><img class="show-on-medium-and-down hide-on-med-and-up" src="../s/app-assets/images/logo/materialize-logo-color.png" alt="materialize logo"><span class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
     </div>
     <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
         <li class="active bold"><a class="c waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>

         </li>

         <li class="bold"><a class=" waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">meeting_room</i>
                 <span class="menu-title" data-i18n="Medias">Formulaire Entrer</span></a>
         </li>
         <li class="bold"><a class="waves-effect waves-cyan " href="https://pixinvent.com/materialize-material-design-admin-template/documentation/index.html" target="_blank"><i class="material-icons">storefront</i>


                 <span class="menu-title" data-i18n="Documentation">Liste Entrer</span></a>
         </li>


         </li>
         <li class="bold"><a class="waves-effect waves-cyan " href="form-layouts.html"><i class="material-icons">format_list_bulleted</i>
                 <span class="menu-title" data-i18n="Form Layouts">Liste Sortir</span></a>
         </li>
         <li class="bold"><a class="waves-effect waves-cyan " href="https://pixinvent.com/materialize-material-design-admin-template/documentation/index.html" target="_blank"><i class="material-icons">person</i>
                 <span class="menu-title" data-i18n="Documentation">Liste Client</span></a>
         </li>
         <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">shopping_cart</i>
                 <span class="menu-title" data-i18n="Forms">Produits</span></a>
             <div class="collapsible-body">
                 <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                     <li><a href="form-elements.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Details Produits</span></a>
                     </li>
                     <li><a href="form-select2.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Select2">Ajouter Prouduits</span></a>
                     </li>

                 </ul>
             </div>
         </li>


         <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">location_on</i>
                 <span class="menu-title" data-i18n="Menu levels">Places</span></a>
             <div class="collapsible-body">
                 <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                     <li><a href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Detail Place</span></a>
                     </li>
                     <li><a class=" waves-effect waves-cyan" href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level child">Ajoute Place</span></a>

                     </li>
                 </ul>
             </div>
         </li>

     </ul>
     <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
 </aside>
 <!-- END: SideNav-->
 <!-- BEGIN: Page Main-->
 
 <!--card stats end-->
 <!-- Theme Customizer -->

 <a href="#" data-target="theme-cutomizer-out" class="btn btn-customizer pink accent-2 white-text sidenav-trigger theme-cutomizer-trigger"><i class="material-icons">settings</i></a>

 <div id="theme-cutomizer-out" class="theme-cutomizer sidenav row">
     <div class="col s12">
         <a class="sidenav-close" href="#!"><i class="material-icons">close</i></a>
         <h5 class="theme-cutomizer-title">Theme Customizer</h5>
         <p class="medium-small">Customize & Preview in Real Time</p>
         <div class="menu-options">
             <h6 class="mt-6">Menu Options</h6>
             <hr class="customize-devider">
             <div class="menu-options-form row">
                 <div class="input-field col s12 menu-color mb-0">
                     <p class="mt-0">Menu Color</p>
                     <div class="gradient-color center-align">
                         <span class="menu-color-option gradient-45deg-indigo-blue" data-color="gradient-45deg-indigo-blue"></span>
                         <span class="menu-color-option gradient-45deg-purple-deep-orange" data-color="gradient-45deg-purple-deep-orange"></span>
                         <span class="menu-color-option gradient-45deg-light-blue-cyan" data-color="gradient-45deg-light-blue-cyan"></span>
                         <span class="menu-color-option gradient-45deg-purple-amber" data-color="gradient-45deg-purple-amber"></span>
                         <span class="menu-color-option gradient-45deg-purple-deep-purple" data-color="gradient-45deg-purple-deep-purple"></span>
                         <span class="menu-color-option gradient-45deg-deep-orange-orange" data-color="gradient-45deg-deep-orange-orange"></span>
                         <span class="menu-color-option gradient-45deg-green-teal" data-color="gradient-45deg-green-teal"></span>
                         <span class="menu-color-option gradient-45deg-indigo-light-blue" data-color="gradient-45deg-indigo-light-blue"></span>
                         <span class="menu-color-option gradient-45deg-red-pink" data-color="gradient-45deg-red-pink"></span>
                     </div>
                     <div class="solid-color center-align">
                         <span class="menu-color-option red" data-color="red"></span>
                         <span class="menu-color-option purple" data-color="purple"></span>
                         <span class="menu-color-option pink" data-color="pink"></span>
                         <span class="menu-color-option deep-purple" data-color="deep-purple"></span>
                         <span class="menu-color-option cyan" data-color="cyan"></span>
                         <span class="menu-color-option teal" data-color="teal"></span>
                         <span class="menu-color-option light-blue" data-color="light-blue"></span>
                         <span class="menu-color-option amber darken-3" data-color="amber darken-3"></span>
                         <span class="menu-color-option brown darken-2" data-color="brown darken-2"></span>
                     </div>
                 </div>
                 <div class="input-field col s12 menu-bg-color mb-0">
                     <p class="mt-0">Menu Background Color</p>
                     <div class="gradient-color center-align">
                         <span class="menu-bg-color-option gradient-45deg-indigo-blue" data-color="gradient-45deg-indigo-blue"></span>
                         <span class="menu-bg-color-option gradient-45deg-purple-deep-orange" data-color="gradient-45deg-purple-deep-orange"></span>
                         <span class="menu-bg-color-option gradient-45deg-light-blue-cyan" data-color="gradient-45deg-light-blue-cyan"></span>
                         <span class="menu-bg-color-option gradient-45deg-purple-amber" data-color="gradient-45deg-purple-amber"></span>
                         <span class="menu-bg-color-option gradient-45deg-purple-deep-purple" data-color="gradient-45deg-purple-deep-purple"></span>
                         <span class="menu-bg-color-option gradient-45deg-deep-orange-orange" data-color="gradient-45deg-deep-orange-orange"></span>
                         <span class="menu-bg-color-option gradient-45deg-green-teal" data-color="gradient-45deg-green-teal"></span>
                         <span class="menu-bg-color-option gradient-45deg-indigo-light-blue" data-color="gradient-45deg-indigo-light-blue"></span>
                         <span class="menu-bg-color-option gradient-45deg-red-pink" data-color="gradient-45deg-red-pink"></span>
                     </div>
                     <div class="solid-color center-align">
                         <span class="menu-bg-color-option red" data-color="red"></span>
                         <span class="menu-bg-color-option purple" data-color="purple"></span>
                         <span class="menu-bg-color-option pink" data-color="pink"></span>
                         <span class="menu-bg-color-option deep-purple" data-color="deep-purple"></span>
                         <span class="menu-bg-color-option cyan" data-color="cyan"></span>
                         <span class="menu-bg-color-option teal" data-color="teal"></span>
                         <span class="menu-bg-color-option light-blue" data-color="light-blue"></span>
                         <span class="menu-bg-color-option amber darken-3" data-color="amber darken-3"></span>
                         <span class="menu-bg-color-option brown darken-2" data-color="brown darken-2"></span>
                     </div>
                 </div>
                 <div class="input-field col s12">
                     <div class="switch">
                         Menu Dark
                         <label class="float-right"><input class="menu-dark-checkbox" type="checkbox"> <span class="lever ml-0"></span></label>
                     </div>
                 </div>
                 <div class="input-field col s12">
                     <div class="switch">
                         Menu Collapsed
                         <label class="float-right"><input class="menu-collapsed-checkbox" type="checkbox"> <span class="lever ml-0"></span></label>
                     </div>
                 </div>
                 <div class="input-field col s12">
                     <div class="switch">
                         <p class="mt-0">Menu Selection</p>
                         <label>
                             <input class="menu-selection-radio with-gap" value="sidenav-active-square" name="menu-selection" type="radio">
                             <span>Square</span>
                         </label>
                         <label>
                             <input class="menu-selection-radio with-gap" value="sidenav-active-rounded" name="menu-selection" type="radio">
                             <span>Rounded</span>
                         </label>
                         <label>
                             <input class="menu-selection-radio with-gap" value="" name="menu-selection" type="radio">
                             <span>Normal</span>
                         </label>
                     </div>
                 </div>
             </div>
         </div>
         <h6 class="mt-6">Navbar Options</h6>
         <hr class="customize-devider">
         <div class="navbar-options row">
             <div class="input-field col s12 navbar-color mb-0">
                 <p class="mt-0">Navbar Color</p>
                 <div class="gradient-color center-align">
                     <span class="navbar-color-option gradient-45deg-indigo-blue" data-color="gradient-45deg-indigo-blue"></span>
                     <span class="navbar-color-option gradient-45deg-purple-deep-orange" data-color="gradient-45deg-purple-deep-orange"></span>
                     <span class="navbar-color-option gradient-45deg-light-blue-cyan" data-color="gradient-45deg-light-blue-cyan"></span>
                     <span class="navbar-color-option gradient-45deg-purple-amber" data-color="gradient-45deg-purple-amber"></span>
                     <span class="navbar-color-option gradient-45deg-purple-deep-purple" data-color="gradient-45deg-purple-deep-purple"></span>
                     <span class="navbar-color-option gradient-45deg-deep-orange-orange" data-color="gradient-45deg-deep-orange-orange"></span>
                     <span class="navbar-color-option gradient-45deg-green-teal" data-color="gradient-45deg-green-teal"></span>
                     <span class="navbar-color-option gradient-45deg-indigo-light-blue" data-color="gradient-45deg-indigo-light-blue"></span>
                     <span class="navbar-color-option gradient-45deg-red-pink" data-color="gradient-45deg-red-pink"></span>
                 </div>
                 <div class="solid-color center-align">
                     <span class="navbar-color-option red" data-color="red"></span>
                     <span class="navbar-color-option purple" data-color="purple"></span>
                     <span class="navbar-color-option pink" data-color="pink"></span>
                     <span class="navbar-color-option deep-purple" data-color="deep-purple"></span>
                     <span class="navbar-color-option cyan" data-color="cyan"></span>
                     <span class="navbar-color-option teal" data-color="teal"></span>
                     <span class="navbar-color-option light-blue" data-color="light-blue"></span>
                     <span class="navbar-color-option amber darken-3" data-color="amber darken-3"></span>
                     <span class="navbar-color-option brown darken-2" data-color="brown darken-2"></span>
                 </div>
             </div>
             <div class="input-field col s12">
                 <div class="switch">
                     Navbar Dark
                     <label class="float-right"><input class="navbar-dark-checkbox" type="checkbox"> <span class="lever ml-0"></span></label>
                 </div>
             </div>
             <div class="input-field col s12">
                 <div class="switch">
                     Navbar Fixed
                     <label class="float-right"><input class="navbar-fixed-checkbox" type="checkbox" checked=""> <span class="lever ml-0"></span></label>
                 </div>
             </div>
         </div>
         <h6 class="mt-6">Footer Options</h6>
         <hr class="customize-devider">
         <div class="navbar-options row">
             <div class="input-field col s12">
                 <div class="switch">
                     Footer Dark
                     <label class="float-right"><input class="footer-dark-checkbox" type="checkbox"> <span class="lever ml-0"></span></label>
                 </div>
             </div>
             <div class="input-field col s12">
                 <div class="switch">
                     Footer Fixed
                     <label class="float-right"><input class="footer-fixed-checkbox" type="checkbox"> <span class="lever ml-0"></span></label>
                 </div>
             </div>
         </div>
     </div>
 </div>