<?php

declare(strict_types=1);

namespace Horde\Http\Server;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * HTTP Server Runner
 *
 * Run a Request through the RequestHandler (and possibly a Middleware stack)
 * and output through the ResponseWriter
 */
class Runner
{
    protected RequestHandlerInterface $handler;
    protected ResponseWriterInterface $responseWriter;

    public function __construct(RequestHandlerInterface $handler, ResponseWriterInterface $responseWriter)
    {
        $this->handler = $handler;
        $this->responseWriter = $responseWriter;
    }

    public function run(ServerRequestInterface $request): void
    {
        $response = $this->handler->handle($request);
        // make sure no additional output is buffered at this point
        ob_end_clean();
        $this->responseWriter->writeResponse($response);
    }
}
