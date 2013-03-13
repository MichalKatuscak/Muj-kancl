<?php //netteCache[01]001746a:2:{s:4:"time";s:21:"0.58897500 1363161558";s:9:"callbacks";a:10:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:67:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\config\config.neon";i:2;i:1363161178;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:66:"C:\Program Files (x86)\xampp\htdocs\mujkancl\libs\Nette\loader.php";i:2;i:1363161182;}i:2;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:73:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\models\Authenticator.php";i:2;i:1363161178;}i:3;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:67:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\models\Clients.php";i:2;i:1363161178;}i:4;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:67:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\models\Invoice.php";i:2;i:1363161178;}i:5;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:68:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\models\Projects.php";i:2;i:1363161178;}i:6;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:69:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\models\Suppliers.php";i:2;i:1363161178;}i:7;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:64:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\models\TODO.php";i:2;i:1363161178;}i:8;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:65:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\models\Users.php";i:2;i:1363161178;}i:9;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:69:"C:\Program Files (x86)\xampp\htdocs\mujkancl\app\models\Warehouse.php";i:2;i:1363161178;}}}?><?php
// source: C:\Program Files (x86)\xampp\htdocs\mujkancl\app/config/config.neon development

/**
 * @property Nette\Application\Application $application
 * @property Authenticator $authenticator
 * @property Nette\Caching\Storages\FileStorage $cacheStorage
 * @property Nette\Callback $clientsFactory
 * @property Nette\DI\NestedAccessor $constants
 * @property Nette\DI\Container $container
 * @property Nette\Database\Connection $database
 * @property Nette\Http\Request $httpRequest
 * @property Nette\Http\Response $httpResponse
 * @property Nette\Callback $invoicesFactory
 * @property SystemContainer_nette $nette
 * @property Nette\DI\NestedAccessor $php
 * @property Nette\Callback $projectsFactory
 * @property Nette\Application\Routers\RouteList $router
 * @property Nette\Http\Session $session
 * @property Nette\Callback $suppliersFactory
 * @property Nette\Callback $todoFactory
 * @property Nette\Security\User $user
 * @property Nette\Callback $usersFactory
 * @property Nette\Callback $warehouseFactory
 */
class SystemContainer extends Nette\DI\Container
{

	public $classes = array(
		'nette\\object' => FALSE, //: nette.cacheJournal, cacheStorage, nette.httpRequestFactory, httpRequest, httpResponse, nette.httpContext, session, nette.userStorage, user, application, router, nette.mailer, nette.database, authenticator, container,
		'nette\\caching\\storages\\ijournal' => 'nette.cacheJournal',
		'nette\\caching\\storages\\filejournal' => 'nette.cacheJournal',
		'nette\\caching\\istorage' => 'cacheStorage',
		'nette\\caching\\storages\\filestorage' => 'cacheStorage',
		'nette\\http\\requestfactory' => 'nette.httpRequestFactory',
		'nette\\http\\irequest' => 'httpRequest',
		'nette\\http\\request' => 'httpRequest',
		'nette\\http\\iresponse' => 'httpResponse',
		'nette\\http\\response' => 'httpResponse',
		'nette\\http\\context' => 'nette.httpContext',
		'nette\\http\\session' => 'session',
		'nette\\security\\iuserstorage' => 'nette.userStorage',
		'nette\\http\\userstorage' => 'nette.userStorage',
		'nette\\security\\user' => 'user',
		'nette\\application\\application' => 'application',
		'nette\\application\\ipresenterfactory' => 'nette.presenterFactory',
		'nette\\application\\presenterfactory' => 'nette.presenterFactory',
		'nette\\arraylist' => 'router',
		'traversable' => 'router',
		'iteratoraggregate' => 'router',
		'countable' => 'router',
		'arrayaccess' => 'router',
		'nette\\application\\irouter' => 'router',
		'nette\\application\\routers\\routelist' => 'router',
		'nette\\mail\\imailer' => 'nette.mailer',
		'nette\\mail\\sendmailmailer' => 'nette.mailer',
		'nette\\di\\nestedaccessor' => 'nette.database',
		'pdo' => 'nette.database.default',
		'nette\\database\\connection' => 'nette.database.default',
		'nette\\security\\iauthenticator' => 'authenticator',
		'authenticator' => 'authenticator',
		'nette\\freezableobject' => 'container',
		'nette\\ifreezable' => 'container',
		'nette\\di\\icontainer' => 'container',
		'nette\\di\\container' => 'container',
	);

	public $meta = array();


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => 'C:\\Program Files (x86)\\xampp\\htdocs\\mujkancl\\app',
			'wwwDir' => 'C:/Program Files (x86)/xampp/htdocs/mujkancl',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array(
				'class' => 'SystemContainer',
				'parent' => 'Nette\\DI\\Container',
			),
			'tempDir' => 'C:\\Program Files (x86)\\xampp\\htdocs\\mujkancl\\app/../temp',
			'database' => array(
				'driver' => 'mysql',
				'host' => 'localhost',
				'dbname' => 'mujkancl',
				'user' => 'root',
				'password' => NULL,
			),
		));
	}


	/**
	 * @return Nette\Application\Application
	 */
	protected function createServiceApplication()
	{
		$service = new Nette\Application\Application($this->getService('nette.presenterFactory'), $this->getService('router'), $this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->catchExceptions = FALSE;
		$service->errorPresenter = NULL;
		Nette\Application\Diagnostics\RoutingPanel::initializePanel($service);
		Nette\Diagnostics\Debugger::$bar->addPanel(new Nette\Application\Diagnostics\RoutingPanel($this->getService('router'), $this->getService('httpRequest')));
		return $service;
	}


	/**
	 * @return Authenticator
	 */
	protected function createServiceAuthenticator()
	{
		$service = new Authenticator($this->getService('database')->table('users'));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileStorage
	 */
	protected function createServiceCacheStorage()
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\\Program Files (x86)\\xampp\\htdocs\\mujkancl\\app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Clients
	 */
	public function createClients()
	{
		$service = new Clients($this->getService('nette.database.default'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceClientsFactory()
	{
		$service = new Nette\Callback($this, 'createClients');
		return $service;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServiceConstants()
	{
		$service = new Nette\DI\NestedAccessor($this, 'constants');
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	protected function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	protected function createServiceDatabase()
	{
		$service = $this->getService('nette.database.default');
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	protected function createServiceHttpRequest()
	{
		$service = $this->getService('nette.httpRequestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'httpRequest\', value returned by factory is not Nette\\Http\\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	protected function createServiceHttpResponse()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Invoices
	 */
	public function createInvoices()
	{
		$service = new Invoices($this->getService('nette.database.default'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceInvoicesFactory()
	{
		$service = new Nette\Callback($this, 'createInvoices');
		return $service;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServiceNette()
	{
		$service = new Nette\DI\NestedAccessor($this, 'nette');
		return $service;
	}


	/**
	 * @return Nette\Forms\Form
	 */
	public function createNette__basicForm()
	{
		$service = new Nette\Forms\Form;
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__basicFormFactory()
	{
		$service = new Nette\Callback($this, 'createNette__basicForm');
		return $service;
	}


	/**
	 * @return Nette\Caching\Cache
	 */
	public function createNette__cache($namespace = NULL)
	{
		$service = new Nette\Caching\Cache($this->getService('cacheStorage'), $namespace);
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__cacheFactory()
	{
		$service = new Nette\Callback($this, 'createNette__cache');
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileJournal
	 */
	protected function createServiceNette__cacheJournal()
	{
		$service = new Nette\Caching\Storages\FileJournal('C:\\Program Files (x86)\\xampp\\htdocs\\mujkancl\\app/../temp');
		return $service;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServiceNette__database()
	{
		$service = new Nette\DI\NestedAccessor($this, 'nette.database');
		return $service;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	protected function createServiceNette__database__default()
	{
		$service = new Nette\Database\Connection('mysql:host=localhost;dbname=mujkancl', 'root', NULL, NULL);
		$service->setCacheStorage($this->getService('cacheStorage'));
		Nette\Diagnostics\Debugger::$blueScreen->addPanel('Nette\\Database\\Diagnostics\\ConnectionPanel::renderException');
		$service->setDatabaseReflection(new Nette\Database\Reflection\DiscoveredReflection($this->getService('cacheStorage')));
		$service->onQuery[] = array(
			$this->getService('nette.database.defaultConnectionPanel'),
			'logQuery',
		);
		return $service;
	}


	/**
	 * @return Nette\Database\Diagnostics\ConnectionPanel
	 */
	protected function createServiceNette__database__defaultConnectionPanel()
	{
		$service = new Nette\Database\Diagnostics\ConnectionPanel;
		$service->explain = TRUE;
		Nette\Diagnostics\Debugger::$bar->addPanel($service);
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	protected function createServiceNette__httpContext()
	{
		$service = new Nette\Http\Context($this->getService('httpRequest'), $this->getService('httpResponse'));
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	protected function createServiceNette__httpRequestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setEncoding('UTF-8');
		return $service;
	}


	/**
	 * @return Nette\Latte\Engine
	 */
	public function createNette__latte()
	{
		$service = new Nette\Latte\Engine;
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__latteFactory()
	{
		$service = new Nette\Callback($this, 'createNette__latte');
		return $service;
	}


	/**
	 * @return Nette\Mail\Message
	 */
	public function createNette__mail()
	{
		$service = new Nette\Mail\Message;
		$service->setMailer($this->getService('nette.mailer'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__mailFactory()
	{
		$service = new Nette\Callback($this, 'createNette__mail');
		return $service;
	}


	/**
	 * @return Nette\Mail\SendmailMailer
	 */
	protected function createServiceNette__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Nette\Application\PresenterFactory
	 */
	protected function createServiceNette__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory('C:\\Program Files (x86)\\xampp\\htdocs\\mujkancl\\app', $this);
		return $service;
	}


	/**
	 * @return Nette\Templating\FileTemplate
	 */
	public function createNette__template()
	{
		$service = new Nette\Templating\FileTemplate;
		$service->registerFilter($this->createNette__latte());
		$service->registerHelperLoader('Nette\\Templating\\Helpers::loader');
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\PhpFileStorage
	 */
	protected function createServiceNette__templateCacheStorage()
	{
		$service = new Nette\Caching\Storages\PhpFileStorage('C:\\Program Files (x86)\\xampp\\htdocs\\mujkancl\\app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__templateFactory()
	{
		$service = new Nette\Callback($this, 'createNette__template');
		return $service;
	}


	/**
	 * @return Nette\Http\UserStorage
	 */
	protected function createServiceNette__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session'));
		return $service;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServicePhp()
	{
		$service = new Nette\DI\NestedAccessor($this, 'php');
		return $service;
	}


	/**
	 * @return Projects
	 */
	public function createProjects()
	{
		$service = new Projects($this->getService('nette.database.default'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceProjectsFactory()
	{
		$service = new Nette\Callback($this, 'createProjects');
		return $service;
	}


	/**
	 * @return Nette\Application\Routers\RouteList
	 */
	protected function createServiceRouter()
	{
		$service = new Nette\Application\Routers\RouteList;
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	protected function createServiceSession()
	{
		$service = new Nette\Http\Session($this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->setExpiration('+ 14 days');
		return $service;
	}


	/**
	 * @return Suppliers
	 */
	public function createSuppliers()
	{
		$service = new Suppliers($this->getService('nette.database.default'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceSuppliersFactory()
	{
		$service = new Nette\Callback($this, 'createSuppliers');
		return $service;
	}


	/**
	 * @return TODO
	 */
	public function createTodo()
	{
		$service = new TODO($this->getService('nette.database.default'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceTodoFactory()
	{
		$service = new Nette\Callback($this, 'createTodo');
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	protected function createServiceUser()
	{
		$service = new Nette\Security\User($this->getService('nette.userStorage'), $this);
		Nette\Diagnostics\Debugger::$bar->addPanel(new Nette\Security\Diagnostics\UserPanel($service));
		return $service;
	}


	/**
	 * @return Users
	 */
	public function createUsers()
	{
		$service = new Users($this->getService('nette.database.default'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceUsersFactory()
	{
		$service = new Nette\Callback($this, 'createUsers');
		return $service;
	}


	/**
	 * @return Warehouse
	 */
	public function createWarehouse()
	{
		$service = new Warehouse($this->getService('nette.database.default'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceWarehouseFactory()
	{
		$service = new Nette\Callback($this, 'createWarehouse');
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		Nette\Caching\Storages\FileStorage::$useDirectories = TRUE;

		$this->session->exists() && $this->session->start();
		header('X-Frame-Options: SAMEORIGIN');
	}

}



/**
 * @property Nette\Database\Connection $default
 * @property Nette\Database\Diagnostics\ConnectionPanel $defaultConnectionPanel
 */
class SystemContainer_nette_database
{



}



/**
 * @method Nette\Forms\Form createBasicForm()
 * @property Nette\Callback $basicFormFactory
 * @method Nette\Caching\Cache createCache()
 * @property Nette\Callback $cacheFactory
 * @property Nette\Caching\Storages\FileJournal $cacheJournal
 * @property SystemContainer_nette_database $database
 * @property Nette\Http\Context $httpContext
 * @property Nette\Http\RequestFactory $httpRequestFactory
 * @method Nette\Latte\Engine createLatte()
 * @property Nette\Callback $latteFactory
 * @method Nette\Mail\Message createMail()
 * @property Nette\Callback $mailFactory
 * @property Nette\Mail\SendmailMailer $mailer
 * @property Nette\Application\PresenterFactory $presenterFactory
 * @method Nette\Templating\FileTemplate createTemplate()
 * @property Nette\Caching\Storages\PhpFileStorage $templateCacheStorage
 * @property Nette\Callback $templateFactory
 * @property Nette\Http\UserStorage $userStorage
 */
class SystemContainer_nette
{



}
