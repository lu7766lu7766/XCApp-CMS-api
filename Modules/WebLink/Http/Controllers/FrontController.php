<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/26
 * Time: 下午 05:48
 */

namespace Modules\WebLink\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Http\Controllers\BaseController;
use Modules\WebLink\Entities\CategoryOrm;
use Modules\WebLink\Entities\WebLinkOrm;
use Modules\WebLink\Http\Requests\GetWebLinkForFrontRequest;
use Modules\WebLink\Service\FrontService;

class FrontController extends BaseController
{
    /**
     * @return Collection|CategoryOrm
     */
    public function category()
    {
        return FrontService::getInstance()->getCategory();
    }

    /**
     * @param GetWebLinkForFrontRequest $request
     * @return Collection|WebLinkOrm
     */
    public function webLink(GetWebLinkForFrontRequest $request)
    {
        return FrontService::getInstance()->getWebLink($request);
    }

    /**
     * @param GetWebLinkForFrontRequest $request
     * @return int
     */
    public function total(GetWebLinkForFrontRequest $request)
    {
        return FrontService::getInstance()->getTotal($request);
    }
}
