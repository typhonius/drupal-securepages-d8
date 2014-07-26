<?php

/**
 * @file
 * Contains \Drupal\securepages\Controller\SecurepagesController.
 */

namespace Drupal\securepages\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Controller\TitleResolverInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Page\DefaultHtmlFragmentRenderer;
use Drupal\Core\Page\HtmlPage;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Controller routines for securepages.
 */
class SecurepagesController implements ContainerInjectionInterface {

  /**
   * The request.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $request;


  /**
   * @param Request $request
   */
  public function __construct(Request $request) {
    $this->request = $request;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('request')
    );
  }


  /**
   * @return Response
   */
  public function testPage() {
    $response = new Response();

    // If the site is not accessible over HTTPS become a teapot.
    // Otherwise allow a 200 response to be shown.
    $response->setStatusCode(Response::HTTP_I_AM_A_TEAPOT);
    return $response;

//    if ($is_https) {
//      header('HTTP/1.1 200 OK');
//    }
//    else {
//      header('HTTP/1.1 404 Not Found');
//    }

  }

}
