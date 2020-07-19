<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/26
 * Time: 下午 04:10
 */

namespace Modules\Node\Repository;

use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Node\Entities\Node;

class NodeEditRepo
{
    /**
     * @param Node $orm
     * @return bool
     */
    public function save(Node $orm)
    {
        $result = false;
        try {
            $result = $orm->save();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return Node|null
     */
    public function find(int $id)
    {
        $result = null;
        try {
            $result = Node::find($id);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string $code
     * @return Node|null
     */
    public function findByCode(string $code)
    {
        $result = null;
        try {
            $result = Node::where('code', $code)->first();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
