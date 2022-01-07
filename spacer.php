<?php

namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;

/**
 * Class SpacerPlugin
 * @package Grav\Plugin
 */
class SpacerPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => [
                // Uncomment following line when plugin requires Grav < 1.7
                // ['autoload', 100000],
                ['onPluginsInitialized', 0]
            ]
        ];
    }

    /**
     * Composer autoload
     *
     * @return ClassLoader
     */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized(): void
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main events we are interested in
        $this->enable([
            // Put your main events here
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ]);
    }

    /**
     * Set needed variables to display
     */
    public function onTwigSiteVariables()
    {
        // Manage Assets
        $this->grav['assets']->add('plugin://spacer/js/spacer.min.js');

        $spacer_init = "let spacer = new Spacer({
	});
	spacer.spacePage();";
        if ($this->config->get('plugins.spacer.method') === 'css') {
            $this->grav['assets']->add('plugin://spacer/css/spacer.min.css');
            $spacer_init = "let spacer = new Spacer({
		wrapper: {
			open: '<spacer>',
			close: '</spacer>'
		},
		handleOriginalSpace: true,
		forceUnifiedSpacing: true,
		spacingContent: '&nbsp;'
	});
	spacer.spacePage();";
        }
        $this->grav['assets']->addInlineJs($spacer_init, ['group' => 'bottom']);
    }
}
