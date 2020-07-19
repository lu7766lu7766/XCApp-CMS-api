<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/14
 * Time: 下午 03:43
 */

namespace Modules\AppAutomation\Service;

use Illuminate\Support\Str;
use Modules\AppAutomation\Constants\StatusConstants;
use Modules\AppAutomation\Entities\AppAutomation;
use Modules\AppAutomation\Http\Requests\AppAutomationAddRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationCallbackRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationDelRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationDetailRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationListRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationPackageRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationUpdateRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationUploadRequest;
use Modules\AppAutomation\Repository\AppAutomationRepo;
use Modules\Base\Constants\ApiCode\AppAutomation90000\AppAutomationCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Files\Service\UploadFilesService;
use XC\Independent\Kit\Contract\IHttpResponse;
use XC\Independent\Kit\Network\Curl\Curl;

class AppAutomationService
{
    use Singleton;

    /**
     * 取得列表
     * @param AppAutomationListRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|\Modules\AppAutomation\Entities\AppAutomation[]
     */
    public function list(AppAutomationListRequest $request)
    {
        return app(AppAutomationRepo::class)->getList(
            $request->getStatus(),
            $request->getKeyword(),
            $request->getPage(),
            $request->getPerpage()
        );
    }

    /**
     * 取得列表總筆數
     * @param \Modules\AppAutomation\Http\Requests\AppAutomationListRequest $request
     * @return int
     */
    public function total(AppAutomationListRequest $request)
    {
        return app(AppAutomationRepo::class)->getTotal(
            $request->getStatus(),
            $request->getKeyword()
        );
    }

    /**
     * 取得明細資訊
     * @param AppAutomationDetailRequest $request
     * @return AppAutomation|null
     */
    public function detail(AppAutomationDetailRequest $request)
    {
        return app(AppAutomationRepo::class)->getDetail($request->getId());
    }

    /**
     * @param AppAutomationAddRequest $request
     * @return AppAutomation|null
     * @throws ApiErrorCodeException
     */
    public function add(AppAutomationAddRequest $request)
    {
        $params = [
            'uuid'           => Str::uuid(),
            'code'           => $request->getCode(),
            'name'           => $request->getName(),
            'package_name'   => $request->getPackageName(),
            'status'         => StatusConstants::PENDING,
            'platform'       => $request->getPlatform(),
            'notify_channel' => $request->getNotify(),
            'config'         => $request->getConfig()
        ];
        $result = app(AppAutomationRepo::class)->add($params, $request->getUploadId());
        if (is_null($result)) {
            throw new ApiErrorCodeException([AppAutomationCodeConstants::ADD_DATA_FAIL]);
        }

        return $result;
    }

    /**
     * @param AppAutomationUpdateRequest $request
     * @return AppAutomation|null
     * @throws ApiErrorCodeException
     */
    public function update(AppAutomationUpdateRequest $request)
    {
        $params = [
            'code'           => $request->getCode(),
            'name'           => $request->getName(),
            'package_name'   => $request->getPackageName(),
            'platform'       => $request->getPlatform(),
            'notify_channel' => $request->getNotify(),
            'config'         => $request->getConfig()
        ];
        $result = app(AppAutomationRepo::class)->update($request->getId(), $params, $request->getUploadId());
        if (is_null($result)) {
            throw new ApiErrorCodeException([AppAutomationCodeConstants::UPDATE_DATA_FAIL]);
        }

        return $result;
    }

    /**
     * @param AppAutomationDelRequest $request
     * @return array
     */
    public function del(AppAutomationDelRequest $request)
    {
        return ['count' => app(AppAutomationRepo::class)->del($request->getId())];
    }

    /**
     * @param \Modules\AppAutomation\Http\Requests\AppAutomationUploadRequest $request
     * @return \Modules\Files\Entities\Files|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function upload(AppAutomationUploadRequest $request)
    {
        return UploadFilesService::uploadFormHttp($request->getUploadFile())->getItem();
    }

    /**
     * @param AppAutomationPackageRequest $request
     * @return null|string
     * @throws ApiErrorCodeException
     */
    public function package(AppAutomationPackageRequest $request)
    {
        $result = false;
        $orm = app(AppAutomationRepo::class)->getDetail($request->getId());
        if (is_null($orm)) {
            throw new ApiErrorCodeException([AppAutomationCodeConstants::DATA_NOT_FOUND]);
        }
        $res = $this->send($orm);
        if ($res->isSuccess()) {
            $content = json_decode($res->body(), true);
            if ($content['code'] == 200) {
                $orm->fill(['status' => StatusConstants::DOING])->save();
                $result = true;
            }
        }

        return $result;
    }

    /**
     * @param AppAutomationCallbackRequest $request
     * @return AppAutomation|null
     */
    public function callback(AppAutomationCallbackRequest $request)
    {
        $result = null;
        $params = [
            'status'   => StatusConstants::COMPLETE,
            'platform' => []
        ];
        foreach ($request->getResult() as $item) {
            $params['platform'][$item['platform']] = $item['link'] ?? null;
        }

        return app(AppAutomationRepo::class)->updateByUuid($request->getUuid(), $params);
    }

    /**
     * @param AppAutomation $orm
     * @return IHttpResponse
     */
    private function send(AppAutomation $orm)
    {
        $curl = new Curl();
        $params = [
            'uuid'         => $orm->uuid,
            'url'          => $orm->firstFileUrl(),
            'platform'     => array_keys($orm->platform),
            'callback_url' => route('app_auto_callback')
        ];

        return $curl->post(\Config::get('AppAutomation.package.script_url'), $params);
    }
}
