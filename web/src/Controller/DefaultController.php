<?php

declare(strict_types=1);

namespace App\Controller;

use App\DynamicPublisher\PublisherInterface;
use App\DynamicPublisher\RedisMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use SymfonyBundles\RedisBundle\Redis\ClientInterface;
use Symfony\Component\HttpFoundation\Request;
use App\DynamicPublisher\RedisChannel;

class DefaultController extends AbstractController
{


    /**
     * @var Client
     */
    private $client;
    /**
     * @var PublisherInterface
     */
    private $publisher;

    public function __construct(ClientInterface $client, PublisherInterface $publisher) {
        $this->client = $client;
        $this->publisher = $publisher;
    }


    /**
     * @Route("/", name="default", methods={"GET"})
     */
    public function index(Request $request): JsonResponse
    {
       # $message = $request->query->get('message') ?? '{ "notify": "me" }';
       #$this->client->publish('app:notifications', $message);

        $message = new RedisMessage('app:notifications');

        $message->setPeoples([ 'hans' , 'franz', 'paul' ]);

        $this->publisher->send($message);

        return JsonResponse::fromJsonString('{ "version": 1 }');
    }
}
