<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/31
 * Time: 下午 03:08
 */

namespace Modules\Comment\Service;

use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Comment\Http\Requests\GetMessageInfoRequest;
use Modules\Comment\Repository\ThemeRepo;
use Modules\Comment\Service\Assist\FormatAssist;

class ThemeService
{
    use Singleton;

    /**
     * @param GetMessageInfoRequest $handle
     * @return \Illuminate\Database\Eloquent\Collection|[]
     */
    public function themeInfo(GetMessageInfoRequest $handle)
    {
        $info = app(ThemeRepo::class)->findAndIncreaseViews($handle->getThemeId());

        return app(FormatAssist::class)->formatThemeInfo($info);
    }
}
