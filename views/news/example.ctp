<?php // vim: set ts=4 sts=4 sw=4 si noet: ?>

<h1>Simple grid example</h1>
<div style='float: left; width: 100%;'>

	<div id=example1 style='float: left; padding: 10px;'>
	<pre><code>&lt;?php
// create a basic placeholder elements for jqgrid
echo $jqgrid->grid('news');

// since modelName is not specified, it will assume that the id is
// is a model class, and converted using Inflector::classify
echo $jqgrid->script('news', array(
    'width' => 600,
    'url' => 'news/get_news.json', // points to action using the Jqgrid 
                                   // component (with json extension)
    )
);
?&gt;</code></pre>
	</div>

	<div id=example1_grid style='float: left; clear: right;'>
<?php
// construct first grid with minimal required options

$gridId = 'news';

$url = Router::url(array(
	'controller' => 'news',
	'action' => 'get_news',
	'ext' => 'json',
	)
);

echo $jqgrid->grid($gridId);

echo $jqgrid->script($gridId, array(
	'width' => 600,
	'url' => $url,
	)
);

?>
	&nbsp;
	</div>
</div>

<h1>A more advanced example</h1>

<div style='float: left; width: 100%'>

	<div id=example2 style='float: left; padding: 10px;'>
	<h2>Jqgrid Helper</h2>
	<li>
		You can easily construct jqGrid's HTML element and javascript initialization block using Jqgrid helper
	</li>
<pre>
<code>&lt;?php
// APP/view/news/example.ctp
$gridId = 'a_second_grid';        // a different grid id, make sure
                                  // to specify the primary modelName in the
                                  // options of grid() call
echo $jqgrid->grid($gridId, array(
    'modelName' => 'News',        // specify the primary Model name
    'filterToolbar' => true,      // use jqGrid's filterToolbar feature
    'filterMode' => 'like',       // valid values are 'like'|'exact'
    'exportOptions' => array(     // export configuration
        'type' => 'csv',          // currently only 'csv' is supported
        'filename' => 'news.csv', // if not specified, defaults to 'report.csv'
        )
    )
);
echo $jqgrid->script($gridId, array('url' => 'news/get_news.json'));
?&gt;</code>
</pre>

	<h2>Jqgrid Component</h2>
	<li>Handle queries/filtering/searching from the grid and produce json response</li>

<pre><code>&lt;?php
// APP/controllers/news_controller.php
class NewsController extends AppController {
    function get_news() {
        $this->Jqgrid->find('News', array(
            'contain' => array('User.login'), // containable support
            'recursive' => 0,                 // recursive option
            'fields' => array(                // specifying fields in query
                'News.id', 'News.title',      // format: Modelname.fieldName
                'News.body', 'News.created', 
                'News.modified', 
                'User.login'                  // support Model relationships
                )
            )
        );
    }
}
?&gt;</code></pre>

	</div>

	<div id=example2_grid style='float: left;'>

<?php

// construct second grid with some addition options

$gridId = 'news2';

echo $jqgrid->grid($gridId, array(
	'modelName' => 'News', 
	'exportToExcel' => true, 
	'filterToolbar' => true,
	'filterMode' => 'like',
	'exportOptions' => array(
		'type' => 'csv',
		'filename' => 'news.csv',
		)
	)
);

// create the javascript to initialize the grid with some additional config:
// - 'width', 
// - date formatter within the colModel section 
// - callback handler for loadComplete event
// - display User.created_by to demonstrate relationship and Containable use
echo $jqgrid->script($gridId, array(
	'url' => $url,
	'width' => 500,
	'colModel' => array(
			array(
				'width' => 50,
				'index' => 'News.id',
				'name' => 'News.id',
				'label' => 'Id',
			),
			array(
				'index' => 'News.title',
				'name' => 'News.title',
				'label' => 'Title',
			),
			array(
				'index' => 'News.body',
				'name' => 'News.body',
				'label' => 'Body',
			),
			array(
				'index' => 'News.created',
				'name' => 'News.created',
				'label' => 'Created',
				'formatter' => 'date',
				'formatoptions' => array(
					'srcformat' => 'Y-m-d H:i:s',
					'newformat' => 'd-M-Y H:i:s',
					),
			),
			array(
				'index' => 'User.login',
				'name' => 'User.login',
				'label' => 'Created By',
			),
		),
	)
);

?>
	</div>
</div>
