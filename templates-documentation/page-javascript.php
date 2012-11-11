<?php
/**
 * Template Name: Documentation - Javascript Guide
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.7
 *
 */
get_header();
wp_enqueue_script('prettify-js');
wp_enqueue_style('prettify-css');
wp_enqueue_style('docs-css');
?>
<?php while ( have_posts() ) : the_post(); ?>
<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>Javascript for BootstrapWP</h1>
    <p class="lead">Bring Bootstrap's components to life&mdash;now with 13 custom jQuery plugins.
  </div>
</header>

  <div class="container">

   <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="#overview"><i class="icon-chevron-right"></i> Overview</a></li>
          <li><a href="#transitions"><i class="icon-chevron-right"></i> Transitions</a></li>
          <li><a href="#modals"><i class="icon-chevron-right"></i> Modal</a></li>
          <li><a href="#dropdowns"><i class="icon-chevron-right"></i> Dropdown</a></li>
          <li><a href="#scrollspy"><i class="icon-chevron-right"></i> Scrollspy</a></li>
          <li><a href="#tabs"><i class="icon-chevron-right"></i> Tab</a></li>
          <li><a href="#tooltips"><i class="icon-chevron-right"></i> Tooltip</a></li>
          <li><a href="#popovers"><i class="icon-chevron-right"></i> Popover</a></li>
          <li><a href="#alerts"><i class="icon-chevron-right"></i> Alert</a></li>
          <li><a href="#buttons"><i class="icon-chevron-right"></i> Button</a></li>
          <li><a href="#collapse"><i class="icon-chevron-right"></i> Collapse</a></li>
          <li><a href="#carousel"><i class="icon-chevron-right"></i> Carousel</a></li>
          <li><a href="#typeahead"><i class="icon-chevron-right"></i> Typeahead</a></li>
          <li><a href="#affix"><i class="icon-chevron-right"></i> Affix</a></li>
        </ul>
      </div>
      <div class="span9">

        <!-- Overview
        ================================================== -->
        <section id="overview">
          <div class="page-header">
            <h1>JavaScript in Bootstrap</h1>
          </div>

          <h3>Individual or compiled</h3>
          <p>Plugins can be included individually (though some have required dependencies), or all at once. Both <strong>bootstrap.js</strong> and <strong>bootstrap.min.js</strong> contain all plugins in a single file.</p>

          <h3>Data attributes</h3>
          <p>You can use all Bootstrap plugins purely through the markup API without writing a single line of JavaScript. This is Bootstrap's first class API and should be your first consideration when using a plugin.</p>

          <p>That said, in some situations it may be desirable to turn this functionality off. Therefore, we also provide the ability to disable the data attribute API by unbinding all events on the body namespaced with `'data-api'`. This looks like this:
          <pre class="prettyprint linenums">$('body').off('.data-api')</pre>

          <p>Alternatively, to target a specific plugin, just include the plugin's name as a namespace along with the data-api namespace like this:</p>
          <pre class="prettyprint linenums">$('body').off('.alert.data-api')</pre>

          <h3>Programmatic API</h3>
          <p>We also believe you should be able to use all Bootstrap plugins purely through the JavaScript API. All public APIs are single, chainable methods, and return the collection acted upon.</p>
          <pre class="prettyprint linenums">$(".btn.danger").button("toggle").addClass("fat")</pre>
          <p>All methods should accept an optional options object, a string which targets a particular method, or nothing (which initiates a plugin with default behavior):</p>
<pre class="prettyprint linenums">
$("#myModal").modal()                       // initialized with defaults
$("#myModal").modal({ keyboard: false })   // initialized with no keyboard
$("#myModal").modal('show')                // initializes and invokes show immediately</p>
</pre>
          <p>Each plugin also exposes its raw constructor on a `Constructor` property: <code>$.fn.popover.Constructor</code>. If you'd like to get a particular plugin instance, retrieve it directly from an element: <code>$('[rel=popover]').data('popover')</code>.</p>

          <h3>Events</h3>
          <p>Bootstrap provides custom events for most plugin's unique actions. Generally, these come in an infinitive and past participle form - where the infinitive (ex. <code>show</code>) is triggered at the start of an event, and its past participle form (ex. <code>shown</code>) is trigger on the completion of an action.</p>
          <p>All infinitive events provide preventDefault functionality. This provides the ability to stop the execution of an action before it starts.</p>
<pre class="prettyprint linenums">
$('#myModal').on('show', function (e) {
    if (!data) return e.preventDefault() // stops modal from being shown
})
</pre>
        </section>



        <!-- Transitions
        ================================================== -->
        <section id="transitions">
          <div class="page-header">
            <h1>Transitions <small>bootstrap-transition.js</small></h1>
          </div>
          <h3>About transitions</h3>
          <p>For simple transition effects, include bootstrap-transition.js once alongside the other JS files. If you're using the compiled (or minified) bootstrap.js, there is no need to include this&mdash;it's already there.</p>
          <h3>Use cases</h3>
          <p>A few examples of the transition plugin:</p>
          <ul>
            <li>Sliding or fading in modals</li>
            <li>Fading out tabs</li>
            <li>Fading out alerts</li>
            <li>Sliding carousel panes</li>
          </ul>

        </section>



        <!-- Modal
        ================================================== -->
        <section id="modals">
          <div class="page-header">
            <h1>Modals <small>bootstrap-modal.js</small></h1>
          </div>


          <h2>Examples</h2>
          <p>Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</p>

          <h3>Static example</h3>
          <p>A rendered modal with header, body, and set of actions in the footer.</p>
          <div class="bs-docs-example" style="background-color: #f5f5f5;">
            <div class="modal" style="position: relative; top: auto; left: auto; right: auto; margin: 0 auto 20px; z-index: 1; max-width: 100%;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Modal header</h3>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <a href="#" class="btn">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
              </div>
            </div>
          </div>
<pre class="prettyprint linenums">
&lt;div class="modal hide fade"&gt;
  &lt;div class="modal-header"&gt;
    &lt;button type="button" class="close" data-dismiss="modal" aria-hidden="true"&gt;&amp;times;&lt;/button&gt;
    &lt;h3&gt;Modal header&lt;/h3&gt;
  &lt;/div&gt;
  &lt;div class="modal-body"&gt;
    &lt;p&gt;One fine body&hellip;&lt;/p&gt;
  &lt;/div&gt;
  &lt;div class="modal-footer"&gt;
    &lt;a href="#" class="btn"&gt;Close&lt;/a&gt;
    &lt;a href="#" class="btn btn-primary"&gt;Save changes&lt;/a&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>

          <h3>Live demo</h3>
          <p>Toggle a modal via JavaScript by clicking the button below. It will slide down and fade in from the top of the page.</p>
          <!-- sample modal content -->
          <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Modal Heading</h3>
            </div>
            <div class="modal-body">
              <h4>Text in a modal</h4>
              <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>

              <h4>Popover in a modal</h4>
              <p>This <a href="#" role="button" class="btn popover-test" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on click.</p>

              <h4>Tooltips in a modal</h4>
              <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> should have tooltips on hover.</p>

              <hr>

              <h4>Overflowing text to show optional scrollbar</h4>
              <p>We set a fixed <code>max-height</code> on the <code>.modal-body</code>. Watch it overflow with all this extra lorem ipsum text we've included.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large">Launch demo modal</a>
          </div>
<pre class="prettyprint linenums">
&lt!-- Button to trigger modal --&gt;
&lt;a href="#myModal" role="button" class="btn" data-toggle="modal"&gt;Launch demo modal&lt;/a&gt;

&lt!-- Modal --&gt;
&lt;div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"&gt;
  &lt;div class="modal-header"&gt;
    &lt;button type="button" class="close" data-dismiss="modal" aria-hidden="true"&gt;&times;&lt;/button&gt;
    &lt;h3 id="myModalLabel"&gt;Modal header&lt;/h3&gt;
  &lt;/div&gt;
  &lt;div class="modal-body"&gt;
    &lt;p&gt;One fine body&hellip;&lt;/p&gt;
  &lt;/div&gt;
  &lt;div class="modal-footer"&gt;
    &lt;button class="btn" data-dismiss="modal" aria-hidden="true"&gt;Close&lt;/button&gt;
    &lt;button class="btn btn-primary"&gt;Save changes&lt;/button&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>


          <hr class="bs-docs-separator">


          <h2>Usage</h2>

          <h3>Via data attributes</h3>
          <p>Activate a modal without writing JavaScript. Set <code>data-toggle="modal"</code> on a controller element, like a button, along with a <code>data-target="#foo"</code> or <code>href="#foo"</code> to target a specific modal to toggle.</p>
          <pre class="prettyprint linenums">&lt;button type="button" data-toggle="modal" data-target="#myModal"&gt;Launch modal&lt;/button&gt;</pre>

          <h3>Via JavaScript</h3>
          <p>Call a modal with id <code>myModal</code> with a single line of JavaScript:</p>
          <pre class="prettyprint linenums">$('#myModal').modal(options)</pre>

          <h3>Options</h3>
          <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name to <code>data-</code>, as in <code>data-backdrop=""</code>.</p>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 100px;">Name</th>
               <th style="width: 50px;">type</th>
               <th style="width: 50px;">default</th>
               <th>description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>backdrop</td>
               <td>boolean</td>
               <td>true</td>
               <td>Includes a modal-backdrop element. Alternatively, specify <code>static</code> for a backdrop which doesn't close the modal on click.</td>
             </tr>
             <tr>
               <td>keyboard</td>
               <td>boolean</td>
               <td>true</td>
               <td>Closes the modal when escape key is pressed</td>
             </tr>
             <tr>
               <td>show</td>
               <td>boolean</td>
               <td>true</td>
               <td>Shows the modal when initialized.</td>
             </tr>
             <tr>
               <td>remote</td>
               <td>path</td>
               <td>false</td>
               <td><p>If a remote url is provided, content will be loaded via jQuery's <code>load</code> method and injected into the <code>.modal-body</code>. If you're using the data api, you may alternatively use the <code>href</code> tag to specify the remote source. An example of this is shown below:</p>
              <pre class="prettyprint linenums"><code>&lt;a data-toggle="modal" href="remote.html" data-target="#modal"&gt;click me&lt;/a&gt;</code></pre></td>
             </tr>
            </tbody>
          </table>

          <h3>Methods</h3>
          <h4>.modal(options)</h4>
          <p>Activates your content as a modal. Accepts an optional options <code>object</code>.</p>
<pre class="prettyprint linenums">
$('#myModal').modal({
  keyboard: false
})
</pre>
          <h4>.modal('toggle')</h4>
          <p>Manually toggles a modal.</p>
          <pre class="prettyprint linenums">$('#myModal').modal('toggle')</pre>
          <h4>.modal('show')</h4>
          <p>Manually opens a modal.</p>
          <pre class="prettyprint linenums">$('#myModal').modal('show')</pre>
          <h4>.modal('hide')</h4>
          <p>Manually hides a modal.</p>
          <pre class="prettyprint linenums">$('#myModal').modal('hide')</pre>
          <h3>Events</h3>
          <p>Bootstrap's modal class exposes a few events for hooking into modal functionality.</p>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 150px;">Event</th>
               <th>Description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>show</td>
               <td>This event fires immediately when the <code>show</code> instance method is called.</td>
             </tr>
             <tr>
               <td>shown</td>
               <td>This event is fired when the modal has been made visible to the user (will wait for css transitions to complete).</td>
             </tr>
             <tr>
               <td>hide</td>
               <td>This event is fired immediately when the <code>hide</code> instance method has been called.</td>
             </tr>
             <tr>
               <td>hidden</td>
               <td>This event is fired when the modal has finished being hidden from the user (will wait for css transitions to complete).</td>
             </tr>
            </tbody>
          </table>
<pre class="prettyprint linenums">
$('#myModal').on('hidden', function () {
  // do something…
})
</pre>
        </section>



        <!-- Dropdowns
        ================================================== -->
        <section id="dropdowns">
          <div class="page-header">
            <h1>Dropdowns <small>bootstrap-dropdown.js</small></h1>
          </div>


          <h2>Examples</h2>
          <p>Add dropdown menus to nearly anything with this simple plugin, including the navbar, tabs, and pills.</p>

          <h3>Within a navbar</h3>
          <div class="bs-docs-example">
            <div id="navbar-example" class="navbar navbar-static">
              <div class="navbar-inner">
                <div class="container" style="width: auto;">
                  <a class="brand" href="#">Project Name</a>
                  <ul class="nav" role="navigation">
                    <li class="dropdown">
                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li><a tabindex="-1" href="http://google.com">Action</a></li>
                        <li><a tabindex="-1" href="#anotherAction">Another action</a></li>
                        <li><a tabindex="-1" href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="#">Separated link</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Dropdown 2 <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                        <li><a tabindex="-1" href="#">Action</a></li>
                        <li><a tabindex="-1" href="#">Another action</a></li>
                        <li><a tabindex="-1" href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="#">Separated link</a></li>
                      </ul>
                    </li>
                  </ul>
                  <ul class="nav pull-right">
                    <li id="fat-menu" class="dropdown">
                      <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Dropdown 3 <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                        <li><a tabindex="-1" href="#">Action</a></li>
                        <li><a tabindex="-1" href="#">Another action</a></li>
                        <li><a tabindex="-1" href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="#">Separated link</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div> <!-- /navbar-example -->
          </div>

          <h3>Within tabs</h3>
          <div class="bs-docs-example">
            <ul class="nav nav-pills">
              <li class="active"><a href="#">Regular link</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" id="drop4" role="button" data-toggle="dropdown" href="#">Dropdown <b class="caret"></b></a>
                <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
                  <li><a tabindex="-1" href="#">Action</a></li>
                  <li><a tabindex="-1" href="#">Another action</a></li>
                  <li><a tabindex="-1" href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" id="drop5" role="button" data-toggle="dropdown" href="#">Dropdown 2 <b class="caret"></b></a>
                <ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop5">
                  <li><a tabindex="-1" href="#">Action</a></li>
                  <li><a tabindex="-1" href="#">Another action</a></li>
                  <li><a tabindex="-1" href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" id="drop5" role="button" data-toggle="dropdown" href="#">Dropdown 3 <b class="caret"></b></a>
                <ul id="menu3" class="dropdown-menu" role="menu" aria-labelledby="drop5">
                  <li><a tabindex="-1" href="#">Action</a></li>
                  <li><a tabindex="-1" href="#">Another action</a></li>
                  <li><a tabindex="-1" href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
            </ul> <!-- /tabs -->
          </div>


          <hr class="bs-docs-separator">


          <h2>Usage</h2>

          <h3>Via data attributes</h3>
          <p>Add <code>data-toggle="dropdown"</code> to a link or button to toggle a dropdown.</p>
<pre class="prettyprint linenums">
&lt;div class="dropdown"&gt;
  &lt;a class="dropdown-toggle" data-toggle="dropdown" href="#"&gt;Dropdown trigger&lt;/a&gt;
  &lt;ul class="dropdown-menu" role="menu" aria-labelledby="dLabel"&gt;
    ...
  &lt;/ul&gt;
&lt;/div&gt;
</pre>
          <p>To keep URLs intact, use the <code>data-target</code> attribute instead of <code>href="#"</code>.</p>
<pre class="prettyprint linenums">
&lt;div class="dropdown"&gt;
  &lt;a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html"&gt;
    Dropdown
    &lt;b class="caret"&gt;&lt;/b&gt;
  &lt;/a&gt;
  &lt;ul class="dropdown-menu" role="menu" aria-labelledby="dLabel"&gt;
    ...
  &lt;/ul&gt;
&lt;/div&gt;
</pre>

          <h3>Via JavaScript</h3>
          <p>Call the dropdowns via JavaScript:</p>
          <pre class="prettyprint linenums">$('.dropdown-toggle').dropdown()</pre>

          <h3>Options</h3>
          <p><em>None</em></p>

          <h3>Methods</h3>
          <h4>$().dropdown('toggle')</h4>
          <p>A programmatic api for toggling menus for a given navbar or tabbed navigation.</p>
        </section>



        <!-- ScrollSpy
        ================================================== -->
        <section id="scrollspy">
          <div class="page-header">
            <h1>ScrollSpy <small>bootstrap-scrollspy.js</small></h1>
          </div>


          <h2>Example in navbar</h2>
          <p>The ScrollSpy plugin is for automatically updating nav targets based on scroll position. Scroll the area below the navbar and watch the active class change. The dropdown sub items will be highlighted as well.</p>
          <div class="bs-docs-example">
            <div id="navbarExample" class="navbar navbar-static">
              <div class="navbar-inner">
                <div class="container" style="width: auto;">
                  <a class="brand" href="#">Project Name</a>
                  <ul class="nav">
                    <li><a href="#fat">@fat</a></li>
                    <li><a href="#mdo">@mdo</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="#one">one</a></li>
                        <li><a href="#two">two</a></li>
                        <li class="divider"></li>
                        <li><a href="#three">three</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div data-spy="scroll" data-target="#navbarExample" data-offset="0" class="scrollspy-example">
              <h4 id="fat">@fat</h4>
              <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.</p>
              <h4 id="mdo">@mdo</h4>
              <p>Veniam marfa mustache skateboard, adipisicing fugiat velit pitchfork beard. Freegan beard aliqua cupidatat mcsweeney's vero. Cupidatat four loko nisi, ea helvetica nulla carles. Tattooed cosby sweater food truck, mcsweeney's quis non freegan vinyl. Lo-fi wes anderson +1 sartorial. Carles non aesthetic exercitation quis gentrify. Brooklyn adipisicing craft beer vice keytar deserunt.</p>
              <h4 id="one">one</h4>
              <p>Occaecat commodo aliqua delectus. Fap craft beer deserunt skateboard ea. Lomo bicycle rights adipisicing banh mi, velit ea sunt next level locavore single-origin coffee in magna veniam. High life id vinyl, echo park consequat quis aliquip banh mi pitchfork. Vero VHS est adipisicing. Consectetur nisi DIY minim messenger bag. Cred ex in, sustainable delectus consectetur fanny pack iphone.</p>
              <h4 id="two">two</h4>
              <p>In incididunt echo park, officia deserunt mcsweeney's proident master cleanse thundercats sapiente veniam. Excepteur VHS elit, proident shoreditch +1 biodiesel laborum craft beer. Single-origin coffee wayfarers irure four loko, cupidatat terry richardson master cleanse. Assumenda you probably haven't heard of them art party fanny pack, tattooed nulla cardigan tempor ad. Proident wolf nesciunt sartorial keffiyeh eu banh mi sustainable. Elit wolf voluptate, lo-fi ea portland before they sold out four loko. Locavore enim nostrud mlkshk brooklyn nesciunt.</p>
              <h4 id="three">three</h4>
              <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.</p>
              <p>Keytar twee blog, culpa messenger bag marfa whatever delectus food truck. Sapiente synth id assumenda. Locavore sed helvetica cliche irony, thundercats you probably haven't heard of them consequat hoodie gluten-free lo-fi fap aliquip. Labore elit placeat before they sold out, terry richardson proident brunch nesciunt quis cosby sweater pariatur keffiyeh ut helvetica artisan. Cardigan craft beer seitan readymade velit. VHS chambray laboris tempor veniam. Anim mollit minim commodo ullamco thundercats.
              </p>
            </div>
          </div>


          <hr class="bs-docs-separator">


          <h2>Usage</h2>

          <h3>Via data attributes</h3>
          <p>To easily add scrollspy behavior to your topbar navigation, just add <code>data-spy="scroll"</code> to the element you want to spy on (most typically this would be the body) and <code>data-target=".navbar"</code> to select which nav to use. You'll want to use scrollspy with a <code>.nav</code> component.</p>
          <pre class="prettyprint linenums">&lt;body data-spy="scroll" data-target=".navbar"&gt;...&lt;/body&gt;</pre>

          <h3>Via JavaScript</h3>
          <p>Call the scrollspy via JavaScript:</p>
          <pre class="prettyprint linenums">$('#navbar').scrollspy()</pre>

          <div class="alert alert-info">
            <strong>Heads up!</strong>
            Navbar links must have resolvable id targets. For example, a <code>&lt;a href="#home"&gt;home&lt;/a&gt;</code> must correspond to something in the dom like <code>&lt;div id="home"&gt;&lt;/div&gt;</code>.
          </div>

          <h3>Methods</h3>
          <h4>.scrollspy('refresh')</h4>
          <p>When using scrollspy in conjunction with adding or removing of elements from the DOM, you'll need to call the refresh method like so:</p>
<pre class="prettyprint linenums">
$('[data-spy="scroll"]').each(function () {
  var $spy = $(this).scrollspy('refresh')
});
</pre>

          <h3>Options</h3>
          <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name to <code>data-</code>, as in <code>data-offset=""</code>.</p>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 100px;">Name</th>
               <th style="width: 100px;">type</th>
               <th style="width: 50px;">default</th>
               <th>description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>offset</td>
               <td>number</td>
               <td>10</td>
               <td>Pixels to offset from top when calculating position of scroll.</td>
             </tr>
            </tbody>
          </table>

          <h3>Events</h3>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 150px;">Event</th>
               <th>Description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>activate</td>
               <td>This event fires whenever a new item becomes activated by the scrollspy.</td>
            </tr>
            </tbody>
          </table>
        </section>



        <!-- Tabs
        ================================================== -->
        <section id="tabs">
          <div class="page-header">
            <h1>Togglable tabs <small>bootstrap-tab.js</small></h1>
          </div>


          <h2>Example tabs</h2>
          <p>Add quick, dynamic tab functionality to transition through panes of local content, even via dropdown menus.</p>
          <div class="bs-docs-example">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
              <li><a href="#profile" data-toggle="tab">Profile</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#dropdown1" data-toggle="tab">@fat</a></li>
                  <li><a href="#dropdown2" data-toggle="tab">@mdo</a></li>
                </ul>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="home">
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
              </div>
              <div class="tab-pane fade" id="profile">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
              </div>
              <div class="tab-pane fade" id="dropdown1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
              </div>
              <div class="tab-pane fade" id="dropdown2">
                <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
              </div>
            </div>
          </div>


          <hr class="bs-docs-separator">


          <h2>Usage</h2>
          <p>Enable tabbable tabs via JavaScript (each tab needs to be activated individually):</p>
<pre class="prettyprint linenums">
$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})</pre>
          <p>You can activate individual tabs in several ways:</p>
<pre class="prettyprint linenums">
$('#myTab a[href="#profile"]').tab('show'); // Select tab by name
$('#myTab a:first').tab('show'); // Select first tab
$('#myTab a:last').tab('show'); // Select last tab
$('#myTab li:eq(2) a').tab('show'); // Select third tab (0-indexed)
</pre>

          <h3>Markup</h3>
          <p>You can activate a tab or pill navigation without writing any JavaScript by simply specifying <code>data-toggle="tab"</code> or <code>data-toggle="pill"</code> on an element. Adding the <code>nav</code> and <code>nav-tabs</code> classes to the tab <code>ul</code> will apply the Bootstrap tab styling.</p>
<pre class="prettyprint linenums">
&lt;ul class="nav nav-tabs"&gt;
  &lt;li&gt;&lt;a href="#home" data-toggle="tab"&gt;Home&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#profile" data-toggle="tab"&gt;Profile&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#messages" data-toggle="tab"&gt;Messages&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#settings" data-toggle="tab"&gt;Settings&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</pre>

          <h3>Methods</h3>
          <h4>$().tab</h4>
          <p>
            Activates a tab element and content container. Tab should have either a <code>data-target</code> or an <code>href</code> targeting a container node in the DOM.
          </p>
<pre class="prettyprint linenums">
&lt;ul class="nav nav-tabs" id="myTab"&gt;
  &lt;li class="active"&gt;&lt;a href="#home"&gt;Home&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#profile"&gt;Profile&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#messages"&gt;Messages&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#settings"&gt;Settings&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;

&lt;div class="tab-content"&gt;
  &lt;div class="tab-pane active" id="home"&gt;...&lt;/div&gt;
  &lt;div class="tab-pane" id="profile"&gt;...&lt;/div&gt;
  &lt;div class="tab-pane" id="messages"&gt;...&lt;/div&gt;
  &lt;div class="tab-pane" id="settings"&gt;...&lt;/div&gt;
&lt;/div&gt;

&lt;script&gt;
  $(function () {
    $('#myTab a:last').tab('show');
  })
&lt;/script&gt;
</pre>

          <h3>Events</h3>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 150px;">Event</th>
               <th>Description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>show</td>
               <td>This event fires on tab show, but before the new tab has been shown. Use <code>event.target</code> and <code>event.relatedTarget</code> to target the active tab and the previous active tab (if available) respectively.</td>
            </tr>
            <tr>
               <td>shown</td>
               <td>This event fires on tab show after a tab has been shown. Use <code>event.target</code> and <code>event.relatedTarget</code> to target the active tab and the previous active tab (if available) respectively.</td>
             </tr>
            </tbody>
          </table>
<pre class="prettyprint linenums">
$('a[data-toggle="tab"]').on('shown', function (e) {
  e.target // activated tab
  e.relatedTarget // previous tab
})
</pre>
        </section>


        <!-- Tooltips
        ================================================== -->
        <section id="tooltips">
          <div class="page-header">
            <h1>Tooltips <small>bootstrap-tooltip.js</small></h1>
          </div>


          <h2>Examples</h2>
          <p>Inspired by the excellent jQuery.tipsy plugin written by Jason Frame; Tooltips are an updated version, which don't rely on images, use CSS3 for animations, and data-attributes for local title storage.</p>
          <p>Hover over the links below to see tooltips:</p>
          <div class="bs-docs-example tooltip-demo">
            <p class="muted" style="margin-bottom: 0;">Tight pants next level keffiyeh <a href="#" rel="tooltip" title="Default tooltip">you probably</a> haven't heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel <a href="#" rel="tooltip" title="Another tooltip">have a</a> terry richardson vinyl chambray. Beard stumptown, cardigans banh mi lomo thundercats. Tofu biodiesel williamsburg marfa, four loko mcsweeney's cleanse vegan chambray. A really ironic artisan <a href="#" rel="tooltip" title="Another one here too">whatever keytar</a>, scenester farm-to-table banksy Austin <a href="#" rel="tooltip" title="The last tip!">twitter handle</a> freegan cred raw denim single-origin coffee viral.
            </p>
          </div>

          <h3>Four directions</h3>
          <div class="bs-docs-example tooltip-demo">
            <ul class="bs-docs-tooltip-examples">
              <li><a href="#" rel="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</a></li>
              <li><a href="#" rel="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</a></li>
              <li><a href="#" rel="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</a></li>
              <li><a href="#" rel="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</a></li>
            </ul>
          </div>


          <hr class="bs-docs-separator">


          <h2>Usage</h2>
          <p>Trigger the tooltip via JavaScript:</p>
          <pre class="prettyprint linenums">$('#example').tooltip(options)</pre>

          <h3>Options</h3>
          <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name to <code>data-</code>, as in <code>data-animation=""</code>.</p>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 100px;">Name</th>
               <th style="width: 100px;">type</th>
               <th style="width: 50px;">default</th>
               <th>description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>animation</td>
               <td>boolean</td>
               <td>true</td>
               <td>apply a css fade transition to the tooltip</td>
             </tr>
             <tr>
               <td>html</td>
               <td>boolean</td>
               <td>false</td>
               <td>Insert html into the tooltip. If false, jquery's <code>text</code> method will be used to insert content into the dom. Use text if you're worried about XSS attacks.</td>
             </tr>
             <tr>
               <td>placement</td>
               <td>string|function</td>
               <td>'top'</td>
               <td>how to position the tooltip - top | bottom | left | right</td>
             </tr>
             <tr>
               <td>selector</td>
               <td>string</td>
               <td>false</td>
               <td>If a selector is provided, tooltip objects will be delegated to the specified targets.</td>
             </tr>
             <tr>
               <td>title</td>
               <td>string | function</td>
               <td>''</td>
               <td>default title value if `title` tag isn't present</td>
             </tr>
             <tr>
               <td>trigger</td>
               <td>string</td>
               <td>'hover'</td>
               <td>how tooltip is triggered - click | hover | focus | manual</td>
             </tr>
             <tr>
               <td>delay</td>
               <td>number | object</td>
               <td>0</td>
               <td>
                <p>delay showing and hiding the tooltip (ms) - does not apply to manual trigger type</p>
                <p>If a number is supplied, delay is applied to both hide/show</p>
                <p>Object structure is: <code>delay: { show: 500, hide: 100 }</code></p>
               </td>
             </tr>
            </tbody>
          </table>
          <div class="alert alert-info">
            <strong>Heads up!</strong>
            Options for individual tooltips can alternatively be specified through the use of data attributes.
          </div>

          <h3>Markup</h3>
          <p>For performance reasons, the Tooltip and Popover data-apis are opt in. If you would like to use them just specify a selector option.</p>
          <pre class="prettyprint linenums">&lt;a href="#" rel="tooltip" title="first tooltip"&gt;hover over me&lt;/a&gt;</pre>

          <h3>Methods</h3>
          <h4>$().tooltip(options)</h4>
          <p>Attaches a tooltip handler to an element collection.</p>
          <h4>.tooltip('show')</h4>
          <p>Reveals an element's tooltip.</p>
          <pre class="prettyprint linenums">$('#element').tooltip('show')</pre>
          <h4>.tooltip('hide')</h4>
          <p>Hides an element's tooltip.</p>
          <pre class="prettyprint linenums">$('#element').tooltip('hide')</pre>
          <h4>.tooltip('toggle')</h4>
          <p>Toggles an element's tooltip.</p>
          <pre class="prettyprint linenums">$('#element').tooltip('toggle')</pre>
          <h4>.tooltip('destroy')</h4>
          <p>Hides and destroys an element's tooltip.</p>
          <pre class="prettyprint linenums">$('#element').tooltip('destroy')</pre>
        </section>



      <!-- Popovers
      ================================================== -->
      <section id="popovers">
        <div class="page-header">
          <h1>Popovers <small>bootstrap-popover.js</small></h1>
        </div>

        <h2>Examples</h2>
        <p>Add small overlays of content, like those on the iPad, to any element for housing secondary information. Hover over the button to trigger the popover. <strong>Requires <a href="#tooltips">Tooltip</a> to be included.</strong></p>

        <h3>Static popover</h3>
        <p>Four options are available: top, right, bottom, and left aligned.</p>
        <div class="bs-docs-example bs-docs-example-popover">
          <div class="popover top">
            <div class="arrow"></div>
            <h3 class="popover-title">Popover top</h3>
            <div class="popover-content">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
            </div>
          </div>

          <div class="popover right">
            <div class="arrow"></div>
            <h3 class="popover-title">Popover right</h3>
            <div class="popover-content">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
            </div>
          </div>

          <div class="popover bottom">
            <div class="arrow"></div>
            <h3 class="popover-title">Popover bottom</h3>
            <div class="popover-content">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
            </div>
          </div>

          <div class="popover left">
            <div class="arrow"></div>
            <h3 class="popover-title">Popover left</h3>
            <div class="popover-content">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
            </div>
          </div>

          <div class="clearfix"></div>
        </div>
        <p>No markup shown as popovers are generated from JavaScript and content within a <code>data</code> attribute.</p>

        <h3>Live demo</h3>
        <div class="bs-docs-example" style="padding-bottom: 24px;">
          <a href="#" class="btn btn-large btn-danger" rel="popover" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">Click to toggle popover</a>
        </div>

        <h4>Four directions</h4>
        <div class="bs-docs-example tooltip-demo">
          <ul class="bs-docs-tooltip-examples">
            <li><a href="#" class="btn" rel="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Popover on top">Popover on top</a></li>
            <li><a href="#" class="btn" rel="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Popover on right">Popover on right</a></li>
            <li><a href="#" class="btn" rel="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Popover on bottom">Popover on bottom</a></li>
            <li><a href="#" class="btn" rel="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Popover on left">Popover on left</a></li>
          </ul>
        </div>


        <hr class="bs-docs-separator">


        <h2>Usage</h2>
        <p>Enable popovers via JavaScript:</p>
        <pre class="prettyprint linenums">$('#example').popover(options)</pre>

        <h3>Options</h3>
        <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name to <code>data-</code>, as in <code>data-animation=""</code>.</p>
        <table class="table table-bordered table-striped">
          <thead>
           <tr>
             <th style="width: 100px;">Name</th>
             <th style="width: 100px;">type</th>
             <th style="width: 50px;">default</th>
             <th>description</th>
           </tr>
          </thead>
          <tbody>
           <tr>
             <td>animation</td>
             <td>boolean</td>
             <td>true</td>
             <td>apply a css fade transition to the tooltip</td>
           </tr>
           <tr>
             <td>html</td>
             <td>boolean</td>
             <td>false</td>
             <td>Insert html into the popover. If false, jquery's <code>text</code> method will be used to insert content into the dom. Use text if you're worried about XSS attacks.</td>
           </tr>
           <tr>
             <td>placement</td>
             <td>string|function</td>
             <td>'right'</td>
             <td>how to position the popover - top | bottom | left | right</td>
           </tr>
           <tr>
             <td>selector</td>
             <td>string</td>
             <td>false</td>
             <td>if a selector is provided, tooltip objects will be delegated to the specified targets</td>
           </tr>
           <tr>
             <td>trigger</td>
             <td>string</td>
             <td>'click'</td>
             <td>how popover is triggered - click | hover | focus | manual</td>
           </tr>
           <tr>
             <td>title</td>
             <td>string | function</td>
             <td>''</td>
             <td>default title value if `title` attribute isn't present</td>
           </tr>
           <tr>
             <td>content</td>
             <td>string | function</td>
             <td>''</td>
             <td>default content value if `data-content` attribute isn't present</td>
           </tr>
           <tr>
             <td>delay</td>
             <td>number | object</td>
             <td>0</td>
             <td>
              <p>delay showing and hiding the popover (ms) - does not apply to manual trigger type</p>
              <p>If a number is supplied, delay is applied to both hide/show</p>
              <p>Object structure is: <code>delay: { show: 500, hide: 100 }</code></p>
             </td>
           </tr>
          </tbody>
        </table>
        <div class="alert alert-info">
          <strong>Heads up!</strong>
          Options for individual popovers can alternatively be specified through the use of data attributes.
        </div>

        <h3>Markup</h3>
        <p>For performance reasons, the Tooltip and Popover data-apis are opt in. If you would like to use them just specify a selector option.</p>

        <h3>Methods</h3>
        <h4>$().popover(options)</h4>
        <p>Initializes popovers for an element collection.</p>
        <h4>.popover('show')</h4>
        <p>Reveals an elements popover.</p>
        <pre class="prettyprint linenums">$('#element').popover('show')</pre>
        <h4>.popover('hide')</h4>
        <p>Hides an elements popover.</p>
        <pre class="prettyprint linenums">$('#element').popover('hide')</pre>
        <h4>.popover('toggle')</h4>
        <p>Toggles an elements popover.</p>
        <pre class="prettyprint linenums">$('#element').popover('toggle')</pre>
        <h4>.popover('destroy')</h4>
        <p>Hides and destroys an element's popover.</p>
        <pre class="prettyprint linenums">$('#element').popover('destroy')</pre>
      </section>



      <!-- Alert
      ================================================== -->
      <section id="alerts">
        <div class="page-header">
          <h1>Alert messages <small>bootstrap-alert.js</small></h1>
        </div>


        <h2>Example alerts</h2>
        <p>Add dismiss functionality to all alert messages with this plugin.</p>
        <div class="bs-docs-example">
          <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
          </div>
        </div>

        <div class="bs-docs-example">
          <div class="alert alert-block alert-error fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Oh snap! You got an error!</h4>
            <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
            <p>
              <a class="btn btn-danger" href="#">Take this action</a> <a class="btn" href="#">Or do this</a>
            </p>
          </div>
        </div>


        <hr class="bs-docs-separator">


        <h2>Usage</h2>
        <p>Enable dismissal of an alert via JavaScript:</p>
        <pre class="prettyprint linenums">$(".alert").alert()</pre>

        <h3>Markup</h3>
        <p>Just add <code>data-dismiss="alert"</code> to your close button to automatically give an alert close functionality.</p>
        <pre class="prettyprint linenums">&lt;a class="close" data-dismiss="alert" href="#"&gt;&amp;times;&lt;/a&gt;</pre>

        <h3>Methods</h3>
        <h4>$().alert()</h4>
        <p>Wraps all alerts with close functionality. To have your alerts animate out when closed, make sure they have the <code>.fade</code> and <code>.in</code> class already applied to them.</p>
        <h4>.alert('close')</h4>
        <p>Closes an alert.</p>
        <pre class="prettyprint linenums">$(".alert").alert('close')</pre>


        <h3>Events</h3>
        <p>Bootstrap's alert class exposes a few events for hooking into alert functionality.</p>
        <table class="table table-bordered table-striped">
          <thead>
           <tr>
             <th style="width: 150px;">Event</th>
             <th>Description</th>
           </tr>
          </thead>
          <tbody>
           <tr>
             <td>close</td>
             <td>This event fires immediately when the <code>close</code> instance method is called.</td>
           </tr>
           <tr>
             <td>closed</td>
             <td>This event is fired when the alert has been closed (will wait for css transitions to complete).</td>
           </tr>
          </tbody>
        </table>
<pre class="prettyprint linenums">
$('#my-alert').bind('closed', function () {
  // do something…
})
</pre>
      </section>



          <!-- Buttons
          ================================================== -->
          <section id="buttons">
            <div class="page-header">
              <h1>Buttons <small>bootstrap-button.js</small></h1>
            </div>

            <h2>Example uses</h2>
            <p>Do more with buttons. Control button states or create groups of buttons for more components like toolbars.</p>

            <h4>Stateful</h4>
            <p>Add data-loading-text="Loading..." to use a loading state on a button.</p>
            <div class="bs-docs-example" style="padding-bottom: 24px;">
              <button type="button" id="fat-btn" data-loading-text="loading..." class="btn btn-primary">
                Loading state
              </button>
            </div>
            <pre class="prettyprint linenums">&lt;button type="button" class="btn btn-primary" data-loading-text="Loading..."&gt;Loading state&lt;/button&gt;</pre>

            <h4>Single toggle</h4>
            <p>Add data-toggle="button" to activate toggling on a single button.</p>
            <div class="bs-docs-example" style="padding-bottom: 24px;">
              <button type="button" class="btn btn-primary" data-toggle="button">Single Toggle</button>
            </div>
            <pre class="prettyprint linenums">&lt;button type="button" class="btn" data-toggle="button"&gt;Single Toggle&lt;/button&gt;</pre>

            <h4>Checkbox</h4>
            <p>Add data-toggle="buttons-checkbox" for checkbox style toggling on btn-group.</p>
            <div class="bs-docs-example" style="padding-bottom: 24px;">
              <div class="btn-group" data-toggle="buttons-checkbox">
                <button type="button" class="btn btn-primary">Left</button>
                <button type="button" class="btn btn-primary">Middle</button>
                <button type="button" class="btn btn-primary">Right</button>
              </div>
            </div>
<pre class="prettyprint linenums">
&lt;div class="btn-group" data-toggle="buttons-checkbox"&gt;
  &lt;button type="button" class="btn"&gt;Left&lt;/button&gt;
  &lt;button type="button" class="btn"&gt;Middle&lt;/button&gt;
  &lt;button type="button" class="btn"&gt;Right&lt;/button&gt;
&lt;/div&gt;
</pre>

            <h4>Radio</h4>
            <p>Add data-toggle="buttons-radio" for radio style toggling on btn-group.</p>
            <div class="bs-docs-example" style="padding-bottom: 24px;">
              <div class="btn-group" data-toggle="buttons-radio">
                <button type="button" class="btn btn-primary">Left</button>
                <button type="button" class="btn btn-primary">Middle</button>
                <button type="button" class="btn btn-primary">Right</button>
              </div>
            </div>
<pre class="prettyprint linenums">
&lt;div class="btn-group" data-toggle="buttons-radio"&gt;
  &lt;button type="button" class="btn"&gt;Left&lt;/button&gt;
  &lt;button type="button" class="btn"&gt;Middle&lt;/button&gt;
  &lt;button type="button" class="btn"&gt;Right&lt;/button&gt;
&lt;/div&gt;
</pre>


            <hr class="bs-docs-separator">


            <h2>Usage</h2>
            <p>Enable buttons via JavaScript:</p>
            <pre class="prettyprint linenums">$('.nav-tabs').button()</pre>

            <h3>Markup</h3>
            <p>Data attributes are integral to the button plugin. Check out the example code below for the various markup types.</p>

            <h3>Options</h3>
            <p><em>None</em></p>

            <h3>Methods</h3>
            <h4>$().button('toggle')</h4>
            <p>Toggles push state. Gives the button the appearance that it has been activated.</p>
            <div class="alert alert-info">
              <strong>Heads up!</strong>
              You can enable auto toggling of a button by using the <code>data-toggle</code> attribute.
            </div>
            <pre class="prettyprint linenums">&lt;button type="button" class="btn" data-toggle="button" &gt;…&lt;/button&gt;</pre>
            <h4>$().button('loading')</h4>
            <p>Sets button state to loading - disables button and swaps text to loading text. Loading text should be defined on the button element using the data attribute <code>data-loading-text</code>.
            </p>
            <pre class="prettyprint linenums">&lt;button type="button" class="btn" data-loading-text="loading stuff..." &gt;...&lt;/button&gt;</pre>
            <div class="alert alert-info">
              <strong>Heads up!</strong>
              <a href="https://github.com/twitter/bootstrap/issues/793">Firefox persists the disabled state across page loads</a>. A workaround for this is to use <code>autocomplete="off"</code>.
            </div>
            <h4>$().button('reset')</h4>
            <p>Resets button state - swaps text to original text.</p>
            <h4>$().button(string)</h4>
            <p>Resets button state - swaps text to any data defined text state.</p>
<pre class="prettyprint linenums">&lt;button type="button" class="btn" data-complete-text="finished!" &gt;...&lt;/button&gt;
&lt;script&gt;
  $('.btn').button('complete')
&lt;/script&gt;
</pre>
          </section>



          <!-- Collapse
          ================================================== -->
          <section id="collapse">
            <div class="page-header">
              <h1>Collapse <small>bootstrap-collapse.js</small></h1>
            </div>

            <h3>About</h3>
            <p>Get base styles and flexible support for collapsible components like accordions and navigation.</p>
            <p class="muted"><strong>*</strong> Requires the Transitions plugin to be included.</p>

            <h2>Example accordion</h2>
            <p>Using the collapse plugin, we built a simple accordion style widget:</p>

            <div class="bs-docs-example">
              <div class="accordion" id="accordion2">
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                      Collapsible Group Item #1
                    </a>
                  </div>
                  <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                      Collapsible Group Item #2
                    </a>
                  </div>
                  <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                      Collapsible Group Item #3
                    </a>
                  </div>
                  <div id="collapseThree" class="accordion-body collapse">
                    <div class="accordion-inner">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>
            </div>
<pre class="prettyprint linenums">
&lt;div class="accordion" id="accordion2"&gt;
  &lt;div class="accordion-group"&gt;
    &lt;div class="accordion-heading"&gt;
      &lt;a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"&gt;
        Collapsible Group Item #1
      &lt;/a&gt;
    &lt;/div&gt;
    &lt;div id="collapseOne" class="accordion-body collapse in"&gt;
      &lt;div class="accordion-inner"&gt;
        Anim pariatur cliche...
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class="accordion-group"&gt;
    &lt;div class="accordion-heading"&gt;
      &lt;a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo"&gt;
        Collapsible Group Item #2
      &lt;/a&gt;
    &lt;/div&gt;
    &lt;div id="collapseTwo" class="accordion-body collapse"&gt;
      &lt;div class="accordion-inner"&gt;
        Anim pariatur cliche...
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
...
</pre>
            <p>You can also use the plugin without the accordion markup. Make a button toggle the expanding and collapsing of another element.</p>
<pre class="prettyprint linenums">
&lt;button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo"&gt;
  simple collapsible
&lt;/button&gt;

&lt;div id="demo" class="collapse in"&gt; … &lt;/div&gt;
</pre>


            <hr class="bs-docs-separator">


            <h2>Usage</h2>

            <h3>Via data attributes</h3>
            <p>Just add <code>data-toggle="collapse"</code> and a <code>data-target</code> to element to automatically assign control of a collapsible element. The <code>data-target</code> attribute accepts a css selector to apply the collapse to. Be sure to add the class <code>collapse</code> to the collapsible element. If you'd like it to default open, add the additional class <code>in</code>.</p>
            <p>To add accordion-like group management to a collapsible control, add the data attribute <code>data-parent="#selector"</code>. Refer to the demo to see this in action.</p>

            <h3>Via JavaScript</h3>
            <p>Enable manually with:</p>
            <pre class="prettyprint linenums">$(".collapse").collapse()</pre>

            <h3>Options</h3>
            <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name to <code>data-</code>, as in <code>data-parent=""</code>.</p>
            <table class="table table-bordered table-striped">
              <thead>
               <tr>
                 <th style="width: 100px;">Name</th>
                 <th style="width: 50px;">type</th>
                 <th style="width: 50px;">default</th>
                 <th>description</th>
               </tr>
              </thead>
              <tbody>
               <tr>
                 <td>parent</td>
                 <td>selector</td>
                 <td>false</td>
                 <td>If selector then all collapsible elements under the specified parent will be closed when this collapsible item is shown. (similar to traditional accordion behavior)</td>
               </tr>
               <tr>
                 <td>toggle</td>
                 <td>boolean</td>
                 <td>true</td>
                 <td>Toggles the collapsible element on invocation</td>
               </tr>
              </tbody>
            </table>


            <h3>Methods</h3>
            <h4>.collapse(options)</h4>
            <p>Activates your content as a collapsible element. Accepts an optional options <code>object</code>.
<pre class="prettyprint linenums">
$('#myCollapsible').collapse({
  toggle: false
})
</pre>
            <h4>.collapse('toggle')</h4>
            <p>Toggles a collapsible element to shown or hidden.</p>
            <h4>.collapse('show')</h4>
            <p>Shows a collapsible element.</p>
            <h4>.collapse('hide')</h4>
            <p>Hides a collapsible element.</p>

            <h3>Events</h3>
            <p>Bootstrap's collapse class exposes a few events for hooking into collapse functionality.</p>
            <table class="table table-bordered table-striped">
              <thead>
               <tr>
                 <th style="width: 150px;">Event</th>
                 <th>Description</th>
               </tr>
              </thead>
              <tbody>
               <tr>
                 <td>show</td>
                 <td>This event fires immediately when the <code>show</code> instance method is called.</td>
               </tr>
               <tr>
                 <td>shown</td>
                 <td>This event is fired when a collapse element has been made visible to the user (will wait for css transitions to complete).</td>
               </tr>
               <tr>
                 <td>hide</td>
                 <td>
                  This event is fired immediately when the <code>hide</code> method has been called.
                 </td>
               </tr>
               <tr>
                 <td>hidden</td>
                 <td>This event is fired when a collapse element has been hidden from the user (will wait for css transitions to complete).</td>
               </tr>
              </tbody>
            </table>
<pre class="prettyprint linenums">
$('#myCollapsible').on('hidden', function () {
  // do something…
})</pre>
          </section>



           <!-- Carousel
          ================================================== -->
          <section id="carousel">
            <div class="page-header">
              <h1>Carousel <small>bootstrap-carousel.js</small></h1>
            </div>

            <h2>Example carousel</h2>
            <p>The slideshow below shows a generic plugin and component for cycling through elements like a carousel.</p>
            <div class="bs-docs-example">
              <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?php echo get_template_directory_uri();?>/img/bootstrap-mdo-sfmoma-01.jpg" alt="">
                    <div class="carousel-caption">
                      <h4>First Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo get_template_directory_uri();?>/img/bootstrap-mdo-sfmoma-02.jpg" alt="">
                    <div class="carousel-caption">
                      <h4>Second Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo get_template_directory_uri();?>/img/bootstrap-mdo-sfmoma-03.jpg" alt="">
                    <div class="carousel-caption">
                      <h4>Third Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
              </div>
            </div>
<pre class="prettyprint linenums">
&lt;div id="myCarousel" class="carousel slide"&gt;
  &lt;!-- Carousel items --&gt;
  &lt;div class="carousel-inner"&gt;
    &lt;div class="active item"&gt;…&lt;/div&gt;
    &lt;div class="item"&gt;…&lt;/div&gt;
    &lt;div class="item"&gt;…&lt;/div&gt;
  &lt;/div&gt;
  &lt;!-- Carousel nav --&gt;
  &lt;a class="carousel-control left" href="#myCarousel" data-slide="prev"&gt;&amp;lsaquo;&lt;/a&gt;
  &lt;a class="carousel-control right" href="#myCarousel" data-slide="next"&gt;&amp;rsaquo;&lt;/a&gt;
&lt;/div&gt;
</pre>

            <div class="alert alert-warning">
              <strong>Heads up!</strong>
              When implementing this carousel, remove the images we have provided and replace them with your own.
            </div>


            <hr class="bs-docs-separator">


            <h2>Usage</h2>

            <h3>Via data attributes</h3>
            <p>...</p>

            <h3>Via JavaScript</h3>
            <p>Call carousel manually with:</p>
            <pre class="prettyprint linenums">$('.carousel').carousel()</pre>

            <h3>Options</h3>
            <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name to <code>data-</code>, as in <code>data-interval=""</code>.</p>
            <table class="table table-bordered table-striped">
              <thead>
               <tr>
                 <th style="width: 100px;">Name</th>
                 <th style="width: 50px;">type</th>
                 <th style="width: 50px;">default</th>
                 <th>description</th>
               </tr>
              </thead>
              <tbody>
               <tr>
                 <td>interval</td>
                 <td>number</td>
                 <td>5000</td>
                 <td>The amount of time to delay between automatically cycling an item. If false, carousel will not automatically cycle.</td>
               </tr>
               <tr>
                 <td>pause</td>
                 <td>string</td>
                 <td>"hover"</td>
                 <td>Pauses the cycling of the carousel on mouseenter and resumes the cycling of the carousel on mouseleave.</td>
               </tr>
              </tbody>
            </table>

            <h3>Methods</h3>
            <h4>.carousel(options)</h4>
            <p>Initializes the carousel with an optional options <code>object</code> and starts cycling through items.</p>
<pre class="prettyprint linenums">
$('.carousel').carousel({
  interval: 2000
})
</pre>
            <h4>.carousel('cycle')</h4>
            <p>Cycles through the carousel items from left to right.</p>
            <h4>.carousel('pause')</h4>
            <p>Stops the carousel from cycling through items.</p>
            <h4>.carousel(number)</h4>
            <p>Cycles the carousel to a particular frame (0 based, similar to an array).</p>
            <h4>.carousel('prev')</h4>
            <p>Cycles to the previous item.</p>
            <h4>.carousel('next')</h4>
            <p>Cycles to the next item.</p>

            <h3>Events</h3>
            <p>Bootstrap's carousel class exposes two events for hooking into carousel functionality.</p>
            <table class="table table-bordered table-striped">
              <thead>
               <tr>
                 <th style="width: 150px;">Event</th>
                 <th>Description</th>
               </tr>
              </thead>
              <tbody>
               <tr>
                 <td>slide</td>
                 <td>This event fires immediately when the <code>slide</code> instance method is invoked.</td>
               </tr>
               <tr>
                 <td>slid</td>
                 <td>This event is fired when the carousel has completed its slide transition.</td>
               </tr>
              </tbody>
            </table>
          </section>



          <!-- Typeahead
          ================================================== -->
          <section id="typeahead">
            <div class="page-header">
              <h1>Typeahead <small>bootstrap-typeahead.js</small></h1>
            </div>


            <h2>Example</h2>
            <p>A basic, easily extended plugin for quickly creating elegant typeaheads with any form text input.</p>
            <div class="bs-docs-example" style="background-color: #f5f5f5;">
              <input type="text" class="span3" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
            </div>
            <pre class="prettyprint linenums">&lt;input type="text" data-provide="typeahead"&gt;</pre>


            <hr class="bs-docs-separator">


            <h2>Usage</h2>

            <h3>Via data attributes</h3>
            <p>Add data attributes to register an element with typeahead functionality as shown in the example above.</p>

            <h3>Via JavaScript</h3>
            <p>Call the typeahead manually with:</p>
            <pre class="prettyprint linenums">$('.typeahead').typeahead()</pre>

            <h3>Options</h3>
            <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name to <code>data-</code>, as in <code>data-source=""</code>.</p>
            <table class="table table-bordered table-striped">
              <thead>
               <tr>
                 <th style="width: 100px;">Name</th>
                 <th style="width: 50px;">type</th>
                 <th style="width: 100px;">default</th>
                 <th>description</th>
               </tr>
              </thead>
              <tbody>
                <tr>
                 <td>source</td>
                 <td>array, function</td>
                 <td>[ ]</td>
                 <td>The data source to query against. May be an array of strings or a function. The function is passed two arguments, the <code>query</code> value in the input field and the <code>process</code> callback. The function may be used synchronously by returning the data source directly or asynchronously via the <code>process</code> callback's single argument.</td>
               </tr>
               <tr>
                 <td>items</td>
                 <td>number</td>
                 <td>8</td>
                 <td>The max number of items to display in the dropdown.</td>
               </tr>
               <tr>
                 <td>minLength</td>
                 <td>number</td>
                 <td>1</td>
                 <td>The minimum character length needed before triggering autocomplete suggestions</td>
               </tr>
               <tr>
                 <td>matcher</td>
                 <td>function</td>
                 <td>case insensitive</td>
                 <td>The method used to determine if a query matches an item. Accepts a single argument, the <code>item</code> against which to test the query. Access the current query with <code>this.query</code>. Return a boolean <code>true</code> if query is a match.</td>
               </tr>
               <tr>
                 <td>sorter</td>
                 <td>function</td>
                 <td>exact match,<br> case sensitive,<br> case insensitive</td>
                 <td>Method used to sort autocomplete results. Accepts a single argument <code>items</code> and has the scope of the typeahead instance. Reference the current query with <code>this.query</code>.</td>
               </tr>
               <tr>
                 <td>updater</td>
                 <td>function</td>
                 <td>returns selected item</td>
                 <td>The method used to return selected item. Accepts a single argument, the <code>item</code> and has the scope of the typeahead instance.</td>
               </tr>
               <tr>
                 <td>highlighter</td>
                 <td>function</td>
                 <td>highlights all default matches</td>
                 <td>Method used to highlight autocomplete results. Accepts a single argument <code>item</code> and has the scope of the typeahead instance. Should return html.</td>
               </tr>
              </tbody>
            </table>

            <h3>Methods</h3>
            <h4>.typeahead(options)</h4>
            <p>Initializes an input with a typeahead.</p>
          </section>



          <!-- Affix
          ================================================== -->
          <section id="affix">
            <div class="page-header">
              <h1>Affix <small>bootstrap-affix.js</small></h1>
            </div>

            <h2>Example</h2>
            <p>The subnavigation on the left is a live demo of the affix plugin.</p>

            <hr class="bs-docs-separator">

            <h2>Usage</h2>

            <h3>Via data attributes</h3>
            <p>To easily add affix behavior to any element, just add <code>data-spy="affix"</code> to the element you want to spy on. Then use offsets to define when to toggle the pinning of an element on and off.</p>

            <pre class="prettyprint linenums">&lt;div data-spy="affix" data-offset-top="200"&gt;...&lt;/div&gt;</pre>

            <div class="alert alert-info">
              <strong>Heads up!</strong>
              You must manage the position of a pinned element and the behavior of its immediate parent. Position is controlled by <code>affix</code>, <code>affix-top</code>, and <code>affix-bottom</code>. Remember to check for a potentially collapsed parent when the affix kicks in as it's removing content from the normal flow of the page.
            </div>

            <h3>Via JavaScript</h3>
            <p>Call the affix plugin via JavaScript:</p>
            <pre class="prettyprint linenums">$('#navbar').affix()</pre>

            <h3>Methods</h3>
            <h4>.affix('refresh')</h4>
            <p>When using affix in conjunction with adding or removing of elements from the DOM, you'll want to call the refresh method:</p>
<pre class="prettyprint linenums">
$('[data-spy="affix"]').each(function () {
  $(this).affix('refresh')
});
</pre>
          <h3>Options</h3>
          <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name to <code>data-</code>, as in <code>data-offset-top="200"</code>.</p>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 100px;">Name</th>
               <th style="width: 100px;">type</th>
               <th style="width: 50px;">default</th>
               <th>description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>offset</td>
               <td>number | function | object</td>
               <td>10</td>
               <td>Pixels to offset from screen when calculating position of scroll. If a single number is provided, the offset will be applied in both top and left directions. To listen for a single direction, or multiple unique offsets, just provide an object <code>offset: { x: 10 }</code>. Use a function when you need to dynamically provide an offset (useful for some responsive designs).</td>
             </tr>
            </tbody>
          </table>
        </section>



      </div>
    </div>

  </div>

<?php endwhile; ?>
<?php get_footer(); ?>