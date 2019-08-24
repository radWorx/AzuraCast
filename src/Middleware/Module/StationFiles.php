<?php
namespace App\Middleware\Module;

use App\Http\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Module middleware for the file management pages.
 */
class StationFiles
{
    /**
     * @param ServerRequest $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function __invoke(ServerRequest $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $backend = $request->getStationBackend();

        if (!$backend::supportsMedia()) {
            throw new \Azura\Exception(__('This feature is not currently supported on this station.'));
        }

        $params = $request->getParams();
        $file = $params['file'] ?? '';
        $file_path = 'media://'.$file;

        $request = $request->withAttribute('file', $file)
            ->withAttribute('file_path', $file_path);

        return $handler->handle($request);
    }
}
