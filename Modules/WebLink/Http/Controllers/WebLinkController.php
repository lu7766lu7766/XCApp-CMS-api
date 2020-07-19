<?php

namespace Modules\WebLink\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Files\Entities\Files;
use Modules\Files\Service\UploadFilesService;
use Modules\WebLink\Http\Requests\UploadRequest;
use Modules\WebLink\Http\Requests\WebLinkEditRequest;
use Modules\WebLink\Http\Requests\WebLinkGetIdRequest;
use Modules\WebLink\Http\Requests\WebLinkListRequest;
use Modules\WebLink\Service\WebLinkService;

class WebLinkController extends BaseController
{
    /**
     * @param WebLinkListRequest $request
     * @return array|\Illuminate\Support\Collection
     */
    public function list(WebLinkListRequest $request)
    {
        return app(WebLinkService::class)->list($request);
    }

    /**
     * @param WebLinkEditRequest $request
     * @return \Modules\WebLink\Entities\WebLinkOrm|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function store(WebLinkEditRequest $request)
    {
        return app(WebLinkService::class)->store($request);
    }

    /**
     * @param WebLinkEditRequest $request
     * @return \Modules\WebLink\Entities\WebLinkOrm|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function update(WebLinkEditRequest $request)
    {
        return app(WebLinkService::class)->update($request);
    }

    /**
     * @param WebLinkGetIdRequest $request
     * @return int
     */
    public function delete(WebLinkGetIdRequest $request)
    {
        return app(WebLinkService::class)->delete($request);
    }

    /**
     * @param WebLinkListRequest $request
     * @return int
     */
    public function total(WebLinkListRequest $request)
    {
        return app(WebLinkService::class)->total($request);
    }

    /**
     * @return array
     */
    public function options()
    {
        return app(WebLinkService::class)->options();
    }

    /**
     * @param UploadRequest $request
     * @return Files
     * @throws FileNotFoundException
     */
    public function upload(UploadRequest $request)
    {
        return UploadFilesService::uploadFormHttp($request->getUploadFile())->getItem();
    }
}
