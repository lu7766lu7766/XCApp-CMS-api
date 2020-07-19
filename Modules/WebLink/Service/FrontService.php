<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/26
 * Time: 下午 05:55
 */

namespace Modules\WebLink\Service;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\WebLink\Entities\CategoryOrm;
use Modules\WebLink\Entities\WebLinkOrm;
use Modules\WebLink\Http\Requests\GetWebLinkForFrontRequest;
use Modules\WebLink\Repository\FrontRepo;

class FrontService
{
    use Singleton;

    /**
     * @return Collection|CategoryOrm
     */
    public function getCategory()
    {
        return app(FrontRepo::class)->categoryList();
    }

    /**
     * @param GetWebLinkForFrontRequest $handle
     * @return Collection|WebLinkOrm
     */
    public function getWebLink(GetWebLinkForFrontRequest $handle)
    {
        return app(FrontRepo::class)->webLinkList(
            $handle->getCategoryId(),
            $handle->getAppId(),
            $handle->getPage(),
            $handle->getPerpage()
        );
    }

    /**
     * @param GetWebLinkForFrontRequest $handle
     * @return int
     */
    public function getTotal(GetWebLinkForFrontRequest $handle)
    {
        return app(FrontRepo::class)->total(
            $handle->getCategoryId(),
            $handle->getAppId()
        );
    }
}
