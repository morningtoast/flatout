

	<!-- START: component -->
	<h1><em>FlatOut</em> Mini HTML Compiler</h1>
	<p>A simple PHP script that will output flat HTML files constructed of includes and partials.</p>
	<h2>What you need</h2>
	<ul>
		<li>Localhost instance of some sort, like Apache. Local file loading won't work b/c we need Ajax-ability</li>
		<li>PHP enabled. <em>Which is already included with OSX but needs turned on</em></li>
	</ul>
	<h2>Setup</h2>
	<p>
		Create a new folder for your project. For example, <code>myproject/</code>
	</p>
	<p>
		Create a sub-folder called <code>output</code>, so in the end you'll have <code>myproject/output</code>
	</p>
	<p>
		Copy the <code>flatout.php</code> file into the <code>myproject/</code> folder.
	</p>	
	<p>
		Your individual component pages will live in <code>myproject/</code>. You'll probably
		need to create sub-folders for your Javascript and CSS too, but not a requirment - this structure
		is up to you.
	</p>


	<h2>Make it go</h2>
	<p>
		Just include the <code>flatout.php</code> at the top of the page you're working on and
		make sure you save the file with a <code>.php</code> extension.
	</p>
	<code>&lt;? include("flatout.php"); ?></code>
	<p>
		You'll see a <strong>Compile</strong> in the top-right corner. Click that and a flat
		HTML file will be generated in the <code>output/</code> folder. 
	</p>
	<p>
		See the <code>example.php</code> file included
	</p>


	<h2>Using partials</h2>
	<p>
		The benefit of FlatOut is you can use partials/includes using basic PHP functions. Thus,
		you can create components independently, then include them in a master page.
	</p>
	<p>
		Your partials do not have to be PHP files, then can be normal HTML files. Your included files
		can also make use of basic variable replacement. (And if you want to get crazy, you can use PHP
		commands too.)
	</p>


	<h3>Include a static file</h3>
	<p>
		Use the following snippet to include a file in your page
	</p>
	<code>&lt;? inc_static("myfile.html"); ?></code>
	<p>
		Optionally, you can pass key/value pairs to your partial and they will be replaced
		in the output. Just use double-curly notation around each variable name.
	</p>
	<p>
		Your include statement:<br />
		<code>&lt;? inc_static("myfile.html", array("name"=>"Bob")); ?></code>
	</p>
	<p>
		Then in the partial <code>myfile.html</code><br />
		<code>Welcome back, {{name}}, it's great to see you</code>
	</p>
	<p>
		In the output, the <code>{{name}}</code> will get replaced by the value <strong>Bob</strong> 
		that you defined in the partial array.
	</p>
	<h3>Include dynamic file (PHP)</h3>
	<p>
		If you know basic PHP, you can use dynamic includes that allow the partials to use
		PHP code as well. This is advanced so don't worry if you don't know PHP.
	</p>
	<p>
		Your include statement:<br />
		<code>&lt;? inc_dynamic("myfile.php", array("name"=>"Bob")); ?></code>
	</p>
	<p>
		In the case of dynamic includes, your array key/value pairs are converted into
		variables that are then accessible in the partial. <strong><em>There is no double-curly bracket
		replacement in dynamic partials.</em></strong>
	</p>
