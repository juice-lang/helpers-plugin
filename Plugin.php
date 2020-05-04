<?php namespace JuiceLang\Helpers;

use Event;
use JuiceLang\Helpers\Classes\Markdown;
use October\Rain\Parse\MarkdownData;
use System\Classes\PluginBase;

/**
 * Helpers Plugin Class
 *
 * @package JuiceLang\Helpers
 */
class Plugin extends PluginBase {

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'juicelang.helpers::lang.plugin.name',
            'description' => 'juicelang.helpers::lang.plugin.description',
            'author'      => 'Josef Zoller',
            'icon'        => 'icon-plus-square',
            'homepage'    => 'https://github.com/juice-lang/helpers-plugin'
        ];
    }


    public function boot() {
        Event::listen('markdown.parse', function(string $original, MarkdownData $data) {
            Markdown::postMarkdownHook($data);
        });
    }
}
