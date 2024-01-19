<?php

namespace Drupal\core_module\Plugin\Devel\Dumper;

use Drupal\devel\Plugin\Devel\Dumper\Kint;
use Kint\Parser\BlacklistPlugin;
use Kint\Renderer\RichRenderer;
use Psr\Container\ContainerInterface;

/**
 * @DevelDumper(
 *   id = "kint_methods",
 *   label = @Translation("Kint with methods"),
 *   description = @Translation("Extends base kint and adds available methods"),
 * )
 */
class KintWithMethods extends Kint {

  /**
   * Configures kint with more sane values.
   */
  protected function configure() {
    // Remove resource-hungry plugins.
    \Kint::$plugins = array_diff(\Kint::$plugins, [
      //'Kint\\Parser\\ClassMethodsPlugin',
      'Kint\\Parser\\ClassStaticsPlugin',
      'Kint\\Parser\\IteratorPlugin',
    ]);
    \Kint::$aliases = $this->getInternalFunctions();
    // RichRenderer::$theme = 'aante-light.css';
    RichRenderer::$folder = FALSE;
    BlacklistPlugin::$shallow_blacklist[] = ContainerInterface::class;
  }

}
